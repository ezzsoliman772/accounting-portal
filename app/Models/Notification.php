<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Notification extends Model
{
    use HasUuids;
    protected $fillable = [
        'client_id','client_user_id','service_id','type','channel','message','subject',
        'delivery_status','read_status','sent_at','read_at','attempt_count','next_attempt_at',
        'provider_message_id','failure_reason','triggered_by',
    ];
    protected $casts = ['sent_at' => 'datetime','read_at' => 'datetime','next_attempt_at' => 'datetime'];
    public function uniqueIds(): array { return ['public_id']; }
    public function client(): BelongsTo { return $this->belongsTo(Client::class); }
    public function clientUser(): BelongsTo { return $this->belongsTo(ClientUser::class); }
    public function service(): BelongsTo { return $this->belongsTo(Service::class); }
    public function triggerer(): BelongsTo { return $this->belongsTo(User::class, 'triggered_by'); }
}
