<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Builder;
use App\Models\Traits\BelongsToOrganization;

class Service extends Model
{
    use HasUuids, SoftDeletes, BelongsToOrganization; 

    public const WORKFLOW_STATUSES = [
        'pending_documents', 'in_progress', 'under_review', 'completed', 'on_hold', 'cancelled',
    ];

    protected $fillable = [
        'organization_id',
        'client_id','catalog_id','name','name_ar','category','status','total_amount','paid_amount',
        'currency_code','frequency','start_date','due_date','assigned_to','created_by',
        'recurrence_parent_id','recurrence_rule','notes','extra_data','completed_at','cancelled_at',
    ];

    protected $casts = [
        'total_amount' => 'decimal:4',
        'paid_amount' => 'decimal:4',
        'start_date' => 'date',
        'due_date' => 'date',
        'completed_at' => 'datetime',
        'cancelled_at' => 'datetime',
        'extra_data' => 'array',
    ];

    public function uniqueIds(): array { return ['public_id']; }
    
    public function organization(): BelongsTo { return $this->belongsTo(Organization::class); }
    public function client(): BelongsTo { return $this->belongsTo(Client::class); }
    public function catalog(): BelongsTo { return $this->belongsTo(ServiceCatalog::class, 'catalog_id'); }
    public function assignee(): BelongsTo { return $this->belongsTo(User::class, 'assigned_to'); }
    public function creator(): BelongsTo { return $this->belongsTo(User::class, 'created_by'); }
    public function payments(): HasMany { return $this->hasMany(Payment::class); }

    // public function documentRequests(): HasMany { return $this->hasMany(DocumentRequest::class); }
    // public function uploadedFiles(): HasMany { return $this->hasMany(UploadedFile::class); }
    // public function statusHistories(): HasMany { return $this->hasMany(StatusHistory::class); }
   
    public function recurrenceParent(): BelongsTo { return $this->belongsTo(self::class, 'recurrence_parent_id'); }
    public function recurrences(): HasMany { return $this->hasMany(self::class, 'recurrence_parent_id'); }
    public function getRemainingAmountAttribute(): string
    {
        return bcsub((string) $this->total_amount, (string) $this->paid_amount, 4);
    }

    public function getIsOverdueAttribute(): bool
    {
        return $this->due_date !== null
            && $this->due_date->lt(today())
            && ! in_array($this->status, ['completed', 'cancelled'], true);
    }

    public function scopeOverdue(Builder $query): Builder
    {
        return $query->whereNotNull('due_date')
            ->whereDate('due_date', '<', today())
            ->whereNotIn('status', ['completed', 'cancelled']);
    }

    public function scopeOpen(Builder $query): Builder
    {
        return $query->whereNotIn('status', ['completed', 'cancelled']);
    }
}