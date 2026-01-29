<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NominationEvaluation extends Model
{
    protected $fillable = [
        'nomination_id',
        'user_id',
        'phase_1_grade',
        'phase_2_grade',
        'phase_2_score',
        'phase_3_grade',
        'phase_3_score',
        'phase_4_grade',
        'phase_4_score',
        'phase_5_grade',
        'phase_5_score',
        'phase_6_grade',
        'phase_6_score',
        'remarks',
    ];

    public function nomination(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Nomination::class);
    }

    public function evaluator(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
