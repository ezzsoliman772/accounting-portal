<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Traits\BelongsToOrganization;

class Payment extends Model
{
    use HasUuids, BelongsToOrganization;

    protected $fillable = [
        'organization_id', // ضفنا دي
        'service_id','client_id','amount','currency_code','exchange_rate','method','status','payment_date',
        'reference','attachment_path','attachment_name','notes','idempotency_key',
        'created_by','voided_by','voided_at','void_reason',
    ];
    
    protected $casts = [
        'amount' => 'decimal:4', 
        'exchange_rate' => 'decimal:12',
        'payment_date' => 'date', 
        'voided_at' => 'datetime'
    ];

    public function uniqueIds(): array { return ['public_id']; }
    
    public function organization(): BelongsTo { return $this->belongsTo(Organization::class); }
    public function service(): BelongsTo { return $this->belongsTo(Service::class); }
    public function client(): BelongsTo { return $this->belongsTo(Client::class); }
    public function creator(): BelongsTo { return $this->belongsTo(User::class, 'created_by'); }
    public function voider(): BelongsTo { return $this->belongsTo(User::class, 'voided_by'); }
    public function scopePosted($query) { return $query->where('status', 'posted'); }
}