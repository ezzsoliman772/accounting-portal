<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StatusHistory extends Model
{
    use HasUuids;

    protected $fillable = ['service_id','from_status','to_status','changed_by','changed_at','note'];
    protected $casts = ['changed_at' => 'datetime'];
    public function uniqueIds(): array { return ['public_id']; }
    public function service(): BelongsTo { return $this->belongsTo(Service::class); }
    public function changer(): BelongsTo { return $this->belongsTo(User::class, 'changed_by'); }
}
