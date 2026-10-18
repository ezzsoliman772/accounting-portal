<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Client extends Model
{
    use HasUuids, SoftDeletes;

    protected $fillable = [
        'type','name','name_ar','email','phone','address','tax_id',
        'commercial_register','contact_person','status','notes','extra_data','created_by',
    ];

    protected $casts = ['extra_data' => 'array'];

    public function uniqueIds(): array { return ['public_id']; }
    public function creator(): BelongsTo { return $this->belongsTo(User::class, 'created_by'); }
    public function services(): HasMany { return $this->hasMany(Service::class); }
    public function payments(): HasMany { return $this->hasMany(Payment::class); }
    public function documentRequests(): HasMany { return $this->hasMany(DocumentRequest::class); }
    public function uploadedFiles(): HasMany { return $this->hasMany(UploadedFile::class); }
    public function portalUsers(): HasMany { return $this->hasMany(ClientUser::class); }
    public function scopeActive($query) { return $query->where('status', 'active'); }
}
