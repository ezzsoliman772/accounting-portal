<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo; 
use App\Models\Traits\BelongsToOrganization; 

class ServiceCatalog extends Model
{
    use HasUuids, SoftDeletes, BelongsToOrganization; 

    protected $fillable = [
        'organization_id', 
        'name','name_ar','description','description_ar','category','default_cost',
        'currency_code','frequency','required_documents','is_active','extra_data'
    ];
    
    protected $casts = [
        'default_cost' => 'decimal:4', 
        'required_documents' => 'array', 
        'extra_data' => 'array', 
        'is_active' => 'boolean'
    ];

    public function uniqueIds(): array { return ['public_id']; }
    
    public function organization(): BelongsTo { return $this->belongsTo(Organization::class); }
    public function services(): HasMany { return $this->hasMany(Service::class, 'catalog_id'); }
    public function scopeActive($query) { return $query->where('is_active', true); }
}