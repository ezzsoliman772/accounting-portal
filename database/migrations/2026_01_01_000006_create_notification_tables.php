<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('organization_id')->constrained('organizations')->cascadeOnDelete();
            $table->uuid('public_id')->unique();
            $table->foreignId('client_id')->nullable()->constrained('clients')->nullOnDelete();
            $table->foreignId('client_user_id')->nullable()->constrained('client_users')->nullOnDelete();
            $table->foreignId('service_id')->nullable()->constrained('services')->nullOnDelete();
            $table->string('type', 32)->index();
            $table->string('channel', 16)->default('email'); // email, sms, push
            $table->text('message');
            $table->string('subject')->nullable();
            $table->string('delivery_status', 20)->default('pending')->index();
            $table->string('read_status', 12)->default('unread')->index();
            $table->timestamp('sent_at')->nullable();
            $table->timestamp('read_at')->nullable();
            $table->unsignedSmallInteger('attempt_count')->default(0);
            $table->timestamp('next_attempt_at')->nullable()->index();
            $table->string('provider_message_id')->nullable();
            $table->text('failure_reason')->nullable();
            $table->foreignId('triggered_by')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamps();
            $table->index(['organization_id', 'client_id', 'read_status', 'created_at'], 'notifications_client_read_idx');
            $table->index(['organization_id', 'type', 'created_at'], 'notifications_type_idx');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('notifications');
    }
};