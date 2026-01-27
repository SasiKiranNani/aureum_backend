<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;

class NominationEvidence extends Model
{
    use HasFactory;

    protected $table = 'nomination_evidence';

    protected $fillable = [
        'nomination_id',
        'type',
        'file_path',
        'file_name',
        'file_size',
        'file_type',
        'reference_url',
        'description',
    ];

    // Relationships
    public function nomination(): BelongsTo
    {
        return $this->belongsTo(Nomination::class);
    }

    // Accessors
    public function getFileUrlAttribute(): ?string
    {
        if ($this->type === 'file' && $this->file_path) {
            return Storage::url($this->file_path);
        }
        return null;
    }

    // Scopes
    public function scopeFiles($query)
    {
        return $query->where('type', 'file');
    }

    public function scopeLinks($query)
    {
        return $query->where('type', 'link');
    }
}
