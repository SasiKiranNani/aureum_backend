<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class JudgeApplicationAnswer extends Model
{
    protected $fillable = [
        'judge_application_id',
        'category_judge_question_id',
        'answer',
    ];

    public function judgeApplication(): BelongsTo
    {
        return $this->belongsTo(JudgeApplication::class);
    }

    public function categoryJudgeQuestion(): BelongsTo
    {
        return $this->belongsTo(CategoryJudgeQuestion::class);
    }
}
