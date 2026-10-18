<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use App\Models\Traits\BelongsToOrganization;

class CrmTask extends Model
{
    use HasUuids, BelongsToOrganization;

    protected $fillable = [
        'organization_id', 'title', 'description', 'type', 
        'client_id', 'lead_id', 'service_id', 'document_request_id', 
        'status', 'assigned_to', 'due_date', 'completed_at', 'created_by'
    ];

    protected $casts = [
        'due_date' => 'datetime',
        'completed_at' => 'datetime',
    ];

    public function uniqueIds(): array { return ['public_id']; }
    
    public function client() { return $this->belongsTo(Client::class); }
  //  public function lead() { return $this->belongsTo(Lead::class); }
    public function assignee() { return $this->belongsTo(User::class, 'assigned_to'); }
}