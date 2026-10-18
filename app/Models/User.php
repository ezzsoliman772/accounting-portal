<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class User extends Authenticatable
{
    use HasUuids, SoftDeletes;

    protected $fillable = [
        'organization_id', 
        'name','email','password','avatar_path','phone','status','last_login_at'
    ];
    
    protected $hidden = ['password','remember_token'];
    protected $casts = ['password' => 'hashed', 'last_login_at' => 'datetime'];

    public function uniqueIds(): array { return ['public_id']; }
    public function organization(): BelongsTo { return $this->belongsTo(Organization::class); }
    public function createdClients(): HasMany { return $this->hasMany(Client::class, 'created_by'); }
    public function assignedServices(): HasMany { return $this->hasMany(Service::class, 'assigned_to'); }
    public function createdServices(): HasMany { return $this->hasMany(Service::class, 'created_by'); }
    public function roles(): BelongsToMany { return $this->belongsToMany(Role::class); }
    public function teams(): BelongsToMany { return $this->belongsToMany(Team::class)->withPivot('team_role')->withTimestamps(); }
    public function scopeActive($query) { return $query->where('status', 'active'); }
}