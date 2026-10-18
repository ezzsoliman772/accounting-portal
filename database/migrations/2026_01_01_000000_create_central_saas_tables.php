<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('plans', function (Blueprint $table) {
            $table->id();
            $table->uuid('public_id')->unique();
            $table->string('name');
            $table->string('code')->unique();
            $table->text('description')->nullable();
            $table->decimal('price', 19, 4)->default(0);
            $table->char('currency_code', 3)->default('EGP');
            $table->unsignedInteger('billing_interval_days')->default(30);
            $table->json('limits')->nullable();
            $table->boolean('is_active')->default(true)->index();
            $table->timestamps();
        });

        // تغيير الاسم من tenants لـ organizations
        Schema::create('organizations', function (Blueprint $table) {
            $table->id();
            $table->uuid('public_id')->unique();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('status', 24)->default('active')->index(); // active, suspended, archived
            $table->string('timezone', 64)->default('Africa/Cairo');
            $table->char('default_currency', 3)->default('EGP');
            $table->string('contact_email')->nullable()->index();
            $table->timestamp('trial_ends_at')->nullable();
            $table->timestamp('activated_at')->nullable();
            $table->json('settings')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('subscriptions', function (Blueprint $table) {
            $table->id();
            $table->uuid('public_id')->unique();
            $table->foreignId('organization_id')->constrained('organizations')->restrictOnDelete(); // تعديل الاسم
            $table->foreignId('plan_id')->constrained('plans')->restrictOnDelete();
            $table->string('status', 24)->default('trialing')->index();
            $table->timestamp('starts_at');
            $table->timestamp('ends_at')->nullable();
            $table->timestamp('trial_ends_at')->nullable();
            $table->timestamp('cancelled_at')->nullable();
            $table->string('billing_provider')->nullable();
            $table->string('provider_customer_id')->nullable()->index();
            $table->string('provider_subscription_id')->nullable()->index();
            $table->json('metadata')->nullable();
            $table->timestamps();
            $table->index(['organization_id', 'status']);
        });
        
        // شيلنا جدول tenant_databases خلاص ملهوش لازمة
    }

    public function down(): void
    {
        Schema::dropIfExists('subscriptions');
        Schema::dropIfExists('organizations');
        Schema::dropIfExists('plans');
    }
};