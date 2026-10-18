<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('organization_id')->constrained('organizations')->cascadeOnDelete();
            $table->uuid('public_id')->unique();
            $table->foreignId('service_id')->constrained('services')->restrictOnDelete();
            $table->foreignId('client_id')->constrained('clients')->restrictOnDelete();
            $table->decimal('amount', 19, 4);
            $table->char('currency_code', 3)->default('EGP');
            $table->decimal('exchange_rate', 24, 12)->nullable(); // ضفنا سعر الصرف
            $table->string('method', 24);
            $table->string('status', 16)->default('posted')->index();
            $table->date('payment_date')->index();
            $table->string('reference')->nullable()->index();
            $table->string('attachment_path')->nullable();
            $table->string('attachment_name')->nullable();
            $table->text('notes')->nullable();
            $table->string('idempotency_key', 100)->nullable();
            $table->foreignId('created_by')->nullable()->constrained('users')->nullOnDelete();
            $table->foreignId('voided_by')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamp('voided_at')->nullable();
            $table->string('void_reason')->nullable();
            $table->timestamps();
            $table->unique(['idempotency_key', 'organization_id']); // unique جوه الشركة
            $table->index(['organization_id', 'service_id', 'status']);
            $table->index(['organization_id', 'client_id', 'payment_date']);
        });

        Schema::create('document_requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('organization_id')->constrained('organizations')->cascadeOnDelete();
            $table->uuid('public_id')->unique();
            $table->foreignId('service_id')->constrained('services')->restrictOnDelete();
            $table->foreignId('client_id')->constrained('clients')->restrictOnDelete();
            $table->string('document_name');
            $table->string('document_name_ar')->nullable();
            $table->string('status', 20)->default('pending')->index();
            $table->foreignId('requested_by')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamp('requested_at');
            $table->timestamp('fulfilled_at')->nullable();
            $table->foreignId('fulfilled_by')->nullable()->constrained('users')->nullOnDelete();
            $table->text('notes')->nullable();
            $table->timestamps();
            $table->index(['organization_id', 'service_id', 'status']);
            $table->index(['organization_id', 'client_id', 'status']);
        });

        Schema::create('uploaded_files', function (Blueprint $table) {
            $table->id();
            $table->foreignId('organization_id')->constrained('organizations')->cascadeOnDelete();
            $table->uuid('public_id')->unique();
            $table->foreignId('service_id')->constrained('services')->restrictOnDelete();
            $table->foreignId('client_id')->constrained('clients')->restrictOnDelete();
            $table->foreignId('document_request_id')->nullable()->constrained('document_requests')->nullOnDelete();
            $table->string('storage_disk')->default('private');
            $table->string('path');
            $table->string('filename');
            $table->string('original_name');
            $table->string('mime_type', 150);
            $table->unsignedBigInteger('size_bytes');
            $table->char('sha256', 64)->nullable()->index();
            $table->string('scan_status', 20)->default('pending')->index();
            $table->foreignId('uploaded_by_user_id')->nullable()->constrained('users')->nullOnDelete();
            $table->foreignId('client_user_id')->nullable()->constrained('client_users')->nullOnDelete();
            $table->timestamp('uploaded_at');
            $table->timestamps();
            $table->index(['organization_id', 'service_id', 'uploaded_at']);
            $table->index(['organization_id', 'client_id', 'uploaded_at']);
        });

        Schema::create('exchange_rates', function (Blueprint $table) {
            $table->id();
            $table->foreignId('organization_id')->constrained('organizations')->cascadeOnDelete();
            $table->char('base_currency', 3);
            $table->char('quote_currency', 3);
            $table->decimal('rate', 24, 12);
            $table->date('effective_date');
            $table->string('source')->nullable();
            $table->timestamps();
            $table->unique(['organization_id', 'base_currency', 'quote_currency', 'effective_date'], 'exchange_rates_unique_idx');
            $table->index(['organization_id', 'effective_date', 'base_currency'], 'exchange_rates_date_idx');            
        });
    }

    public function down(): void
    {
        foreach (['exchange_rates','uploaded_files','document_requests','payments'] as $table) {
            Schema::dropIfExists($table);
        }
    }
};