<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EvaluationCriterion extends Model
{
    protected $fillable = [
        'phase',
        'grade_letter',
        'label',
        'description',
        'min_score',
        'max_score',
        'is_rejection',
    ];

    public function scopeByPhase($query, $phase)
    {
        return $query->where('phase', $phase);
    }
}
