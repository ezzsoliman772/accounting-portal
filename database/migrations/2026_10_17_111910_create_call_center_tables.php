<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('leads', function (Blueprint $table) {
            $table->id();
            $table->foreignId('organization_id')->constrained('organizations')->cascadeOnDelete();
            $table->uuid('public_id')->unique();
            $table->string('name');
            $table->string('phone', 32)->index();
            $table->string('source')->nullable(); 
            $table->string('status', 32)->default('new')->index(); 
            $table->foreignId('assigned_to')->nullable()->constrained('users')->nullOnDelete(); 
            $table->text('notes')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->index(['organization_id', 'status', 'phone']);
        });

        Schema::create('crm_tasks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('organization_id')->constrained('organizations')->cascadeOnDelete();
            $table->uuid('public_id')->unique();
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('type', 32)->default('follow_up'); 
            $table->foreignId('client_id')->nullable()->constrained('clients')->nullOnDelete();
            $table->foreignId('lead_id')->nullable()->constrained('leads')->nullOnDelete();
            $table->foreignId('service_id')->nullable()->constrained('services')->nullOnDelete();
            $table->foreignId('document_request_id')->nullable()->constrained('document_requests')->nullOnDelete();
            $table->string('status', 20)->default('pending')->index(); 
            $table->foreignId('assigned_to')->nullable()->constrained('users')->nullOnDelete(); 
            $table->timestamp('due_date')->nullable(); 
            $table->timestamp('completed_at')->nullable();
            $table->foreignId('created_by')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamps();
            $table->index(['organization_id', 'assigned_to', 'status']);
            $table->index(['organization_id', 'client_id', 'status']);
        });

        Schema::create('crm_interactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('organization_id')->constrained('organizations')->cascadeOnDelete();
            $table->uuid('public_id')->unique();
            $table->foreignId('user_id')->constrained('users'); 
            $table->foreignId('task_id')->nullable()->constrained('crm_tasks')->nullOnDelete(); 
            $table->foreignId('client_id')->nullable()->constrained('clients')->nullOnDelete();
            $table->foreignId('lead_id')->nullable()->constrained('leads')->nullOnDelete();
            $table->string('channel', 20)->default('call'); 
            $table->string('direction', 10)->default('outbound'); 
            $table->integer('duration_seconds')->default(0);
            $table->string('outcome', 32); 
            $table->text('notes')->nullable();
            $table->timestamps();
            $table->index(['organization_id', 'user_id', 'created_at']);
            $table->index(['organization_id', 'client_id', 'created_at']);
        });
    }

    public function down(): void
    {
        foreach (['crm_interactions', 'crm_tasks', 'leads'] as $table) {
            Schema::dropIfExists($table);
        }
    }
};