<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UploadedFile extends Model
{
    use HasUuids;

    protected $table = 'uploaded_files';
    protected $fillable = [
        'service_id','client_id','document_request_id','storage_disk','path','filename',
        'original_name','mime_type','size_bytes','sha256','scan_status','uploaded_by_user_id',
        'client_user_id','uploaded_at',
    ];
    protected $casts = ['size_bytes' => 'integer', 'uploaded_at' => 'datetime'];
    public function uniqueIds(): array { return ['public_id']; }
    public function service(): BelongsTo { return $this->belongsTo(Service::class); }
    public function client(): BelongsTo { return $this->belongsTo(Client::class); }
    public function documentRequest(): BelongsTo { return $this->belongsTo(DocumentRequest::class); }
    public function uploader(): BelongsTo { return $this->belongsTo(User::class, 'uploaded_by_user_id'); }
    public function clientUploader(): BelongsTo { return $this->belongsTo(ClientUser::class); }
}
