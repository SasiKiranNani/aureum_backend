<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class NominationAnswer extends Model
{
    use HasFactory;

    protected $fillable = [
        'nomination_id',
        'nominee_question_id',
        'answer',
    ];

    // Relationships
    public function nomination(): BelongsTo
    {
        return $this->belongsTo(Nomination::class);
    }

    public function nomineeQuestion(): BelongsTo
    {
        return $this->belongsTo(NomineeQuestion::class);
    }
}
