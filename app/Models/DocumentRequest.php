<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class DocumentRequest extends Model
{
    use HasUuids;

    protected $fillable = ['service_id','client_id','document_name','document_name_ar','status','requested_by','requested_at','fulfilled_at','fulfilled_by','notes'];
    protected $casts = ['requested_at' => 'datetime', 'fulfilled_at' => 'datetime'];
    public function uniqueIds(): array { return ['public_id']; }
    public function service(): BelongsTo { return $this->belongsTo(Service::class); }
    public function client(): BelongsTo { return $this->belongsTo(Client::class); }
    public function requester(): BelongsTo { return $this->belongsTo(User::class, 'requested_by'); }
    public function fulfiller(): BelongsTo { return $this->belongsTo(User::class, 'fulfilled_by'); }
    public function files(): HasMany { return $this->hasMany(UploadedFile::class); }
}
