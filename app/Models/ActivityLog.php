<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class ActivityLog extends Model
{
    use HasUuids;

    public $timestamps = false;
    protected $fillable = [
        'user_id',
        'actor_type',
        'actor_public_id',
        'subject_type',
        'subject_id',
        'action',
        'changes',
        'ip_address',
        'user_agent',
        'request_id',
        'created_at'
    ];
    protected $casts = ['changes' => 'array','created_at' => 'datetime'];
    public function uniqueIds(): array { return ['public_id']; }
    public function user(): BelongsTo { return $this->belongsTo(User::class); }
    public function subject(): MorphTo { return $this->morphTo(); }
}
