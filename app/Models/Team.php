<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Team extends Model
{
    use HasUuids, SoftDeletes;
    protected $fillable = ['name','description'];
    public function uniqueIds(): array { return ['public_id']; }
    public function users(): BelongsToMany { return $this->belongsToMany(User::class)->withPivot('team_role')->withTimestamps(); }
}
