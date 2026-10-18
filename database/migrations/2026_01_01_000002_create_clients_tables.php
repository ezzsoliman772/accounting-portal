<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        // 1. جدول العملاء
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->foreignId('organization_id')->constrained('organizations')->cascadeOnDelete();
            $table->uuid('public_id')->unique();
            $table->string('type', 20)->index(); // company, individual
            $table->string('name')->index();
            $table->string('name_ar')->nullable();
            $table->string('email')->nullable()->index();
            $table->string('phone', 32)->nullable()->index();
            $table->text('address')->nullable();
            $table->string('tax_id')->nullable()->index();
            $table->string('commercial_register')->nullable();
            $table->string('contact_person')->nullable();
            $table->string('status', 24)->default('active')->index(); // active, deactivated
            $table->text('notes')->nullable();
            $table->json('extra_data')->nullable();
            $table->foreignId('created_by')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamps();
            $table->softDeletes();
            
            // Indexes لتحسين سرعة البحث
            $table->index(['organization_id', 'status', 'name']);
            $table->index(['organization_id', 'type', 'status']);
        });

        // 2. جدول مستخدمي العملاء (للموبايل أب)
        Schema::create('client_users', function (Blueprint $table) {
            $table->id();
            $table->foreignId('organization_id')->constrained('organizations')->cascadeOnDelete();
            $table->uuid('public_id')->unique();
            $table->foreignId('client_id')->constrained('clients')->restrictOnDelete();
            $table->string('name');
            $table->string('email');
            $table->string('password');
            $table->string('phone', 32)->nullable();
            $table->string('status', 20)->default('invited')->index(); // invited, active, locked
            $table->timestamp('email_verified_at')->nullable();
            $table->timestamp('last_login_at')->nullable();
            $table->rememberToken();
            $table->json('fcm_tokens')->nullable(); // للإشعارات
            $table->string('otp_code', 10)->nullable(); // للدخول السريع
            $table->timestamp('otp_expires_at')->nullable();
            $table->timestamps();
            $table->softDeletes();
            
            // الإيميل فريد جوه الشركة بس
            $table->unique(['email', 'organization_id']);
            $table->index(['organization_id', 'client_id', 'status']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('client_users');
        Schema::dropIfExists('clients');
    }
};