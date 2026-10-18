<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\SoftDeletes;

class Organization extends Model
{
    use HasUuids, SoftDeletes;

    protected $fillable = [
        'public_id', 'name', 'slug', 'status', 'timezone', 
        'default_currency', 'contact_email', 'trial_ends_at', 
        'activated_at', 'settings'
    ];

    protected $casts = [
        'settings' => 'array',
        'trial_ends_at' => 'datetime',
        'activated_at' => 'datetime',
    ];

    public function uniqueIds(): array { return ['public_id']; }
}