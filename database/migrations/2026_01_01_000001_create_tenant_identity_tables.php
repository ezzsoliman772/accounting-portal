<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->foreignId('organization_id')->constrained('organizations')->cascadeOnDelete(); 
            $table->uuid('public_id')->unique();
            $table->string('name');
            $table->string('email'); 
            $table->string('password');
            $table->string('avatar_path')->nullable();
            $table->string('phone', 32)->nullable()->index();
            $table->string('status', 24)->default('active')->index();
            $table->timestamp('last_login_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();            
            $table->unique(['email', 'organization_id']); 
            $table->index(['organization_id', 'status', 'name']);
        });

        Schema::create('teams', function (Blueprint $table) {
            $table->id();
            $table->foreignId('organization_id')->index(); // ضفنا ده عشان نعزل الفرق
            $table->uuid('public_id')->unique();
            $table->string('name');
            $table->text('description')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('team_user', function (Blueprint $table) {
            $table->foreignId('team_id')->constrained('teams')->cascadeOnDelete();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->string('team_role', 32)->default('member');
            $table->timestamps();
            $table->primary(['team_id', 'user_id']);
            $table->index(['user_id', 'team_id']);
        });

        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('organization_id')->index(); // الأدوار بتتحدد جوه الشركة
            $table->string('name');
            $table->string('label');
            $table->timestamps();
            $table->unique(['name', 'organization_id']); 
        });

        Schema::create('permissions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('organization_id')->index();
            $table->string('name');
            $table->string('label');
            $table->timestamps();
            $table->unique(['name', 'organization_id']);
        });

        Schema::create('role_user', function (Blueprint $table) {
            $table->foreignId('role_id')->constrained('roles')->cascadeOnDelete();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->primary(['role_id', 'user_id']);
            $table->index(['user_id', 'role_id']);
        });

        
        Schema::create('permission_role', function (Blueprint $table) {
            $table->foreignId('permission_id')->constrained('permissions')->cascadeOnDelete();
            $table->foreignId('role_id')->constrained('roles')->cascadeOnDelete();
            $table->primary(['permission_id', 'role_id']);
            $table->index(['role_id', 'permission_id']);
        });
    }

    public function down(): void
    {
        foreach (['permission_role','role_user','permissions','roles','team_user','teams','users'] as $table) {
            Schema::dropIfExists($table); 
        }
    }
};