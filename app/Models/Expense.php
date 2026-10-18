<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use App\Models\Traits\BelongsToOrganization;

class Expense extends Model
{
    use HasUuids, BelongsToOrganization;

    protected $fillable = [
        'organization_id', 'title', 'amount', 'currency_code', 
        'exchange_rate', 'category', 'expense_date', 
        'created_by', 'attachment_path'
    ];

    protected $casts = [
        'expense_date' => 'date',
        'exchange_rate' => 'decimal:12',
    ];

    public function uniqueIds(): array { return ['public_id']; }
    
    public function creator() { return $this->belongsTo(User::class, 'created_by'); }
}