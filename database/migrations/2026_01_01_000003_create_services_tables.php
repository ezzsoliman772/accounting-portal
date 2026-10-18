<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        // 1. كتالوج الخدمات (الخدمات اللي بتقدمها الشركة)
        Schema::create('service_catalogs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('organization_id')->constrained('organizations')->cascadeOnDelete();
            $table->uuid('public_id')->unique();
            $table->string('name');
            $table->string('name_ar')->nullable();
            $table->text('description')->nullable();
            $table->text('description_ar')->nullable();
            $table->string('category', 100)->index();
            $table->decimal('default_cost', 19, 4)->default(0);
            $table->char('currency_code', 3)->default('EGP');
            $table->string('frequency', 20)->default('one_time'); // one_time, monthly, etc.
            $table->json('required_documents')->nullable();
            $table->boolean('is_active')->default(true)->index();
            $table->json('extra_data')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->index(['organization_id', 'is_active', 'category']);
        });

        // 2. الخدمات المتفق عليها مع العملاء (الفواتير/الخدمات الفعلية)
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->foreignId('organization_id')->constrained('organizations')->cascadeOnDelete();
            $table->uuid('public_id')->unique();
            $table->foreignId('client_id')->constrained('clients')->restrictOnDelete();
            $table->foreignId('catalog_id')->nullable()->constrained('service_catalogs')->nullOnDelete();
            $table->string('name');
            $table->string('name_ar')->nullable();
            $table->string('category', 100)->nullable()->index();
            $table->string('status', 32)->default('pending_documents')->index();
            $table->decimal('total_amount', 19, 4);
            $table->decimal('paid_amount', 19, 4)->default(0); 
            $table->char('currency_code', 3)->default('EGP');
            $table->string('frequency', 20)->default('one_time');
            $table->date('start_date')->nullable();
            $table->date('due_date')->nullable();
            $table->foreignId('assigned_to')->nullable()->constrained('users')->nullOnDelete();
            $table->foreignId('created_by')->nullable()->constrained('users')->nullOnDelete();
            $table->foreignId('recurrence_parent_id')->nullable()->constrained('services')->nullOnDelete();
            $table->string('recurrence_rule', 255)->nullable();
            $table->text('notes')->nullable();
            $table->json('extra_data')->nullable();
            $table->timestamp('completed_at')->nullable();
            $table->timestamp('cancelled_at')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->index(['organization_id', 'client_id', 'status']);
            $table->index(['organization_id', 'assigned_to', 'status']);
            $table->index(['organization_id', 'status', 'due_date']);
            $table->index(['organization_id', 'created_at', 'id']);
        });

        // 3. حزم الخدمات (Bundles)
        Schema::create('service_bundles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('organization_id')->constrained('organizations')->cascadeOnDelete();
            $table->uuid('public_id')->unique();
            $table->string('name');
            $table->string('name_ar')->nullable();
            $table->text('description')->nullable();
            $table->decimal('bundle_price', 19, 4)->default(0);
            $table->char('currency_code', 3)->default('EGP');
            $table->boolean('is_active')->default(true)->index();
            $table->timestamps();
            $table->softDeletes();
            $table->index(['organization_id', 'is_active']);
        });

        // 4. عناصر حزم الخدمات
        Schema::create('service_bundle_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('organization_id')->constrained('organizations')->cascadeOnDelete();
            $table->foreignId('service_bundle_id')->constrained('service_bundles')->cascadeOnDelete();
            $table->foreignId('service_catalog_id')->nullable()->constrained('service_catalogs')->nullOnDelete();
            $table->string('custom_name')->nullable();
            $table->unsignedInteger('quantity')->default(1);
            $table->decimal('unit_price', 19, 4)->default(0);
            $table->timestamps();
            $table->index(['organization_id', 'service_bundle_id', 'service_catalog_id'], 'sbi_org_bundle_catalog_idx');

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('service_bundle_items');
        Schema::dropIfExists('service_bundles');
        Schema::dropIfExists('services');
        Schema::dropIfExists('service_catalogs');
    }
};