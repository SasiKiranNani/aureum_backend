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
    public function getThumbnailUrlAttribute(): string
    {
        if ($this->type === 'file' && \Illuminate\Support\Str::contains($this->file_name, ['.jpg', '.jpeg', '.png', '.webp', '.gif'])) {
            return $this->file_url;
        }

        if ($this->type === 'video' || ($this->type === 'link' && \Illuminate\Support\Str::contains($this->reference_url, ['youtube', 'vimeo']))) {
            return 'https://ui-avatars.com/api/?name=VIDEO&background=000&color=fff&size=512&font-size=0.33';
        }

        if ($this->type === 'link') {
            return 'https://ui-avatars.com/api/?name=LINK&background=0284c7&color=fff&size=512&font-size=0.33';
        }

        // Documents / Others
        return 'https://ui-avatars.com/api/?name=DOC&background=ef4444&color=fff&size=512&font-size=0.33';
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
