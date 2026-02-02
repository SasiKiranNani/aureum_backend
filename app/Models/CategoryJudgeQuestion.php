<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryJudgeQuestion extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'question_text',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function judgeAnswers()
    {
        return $this->hasMany(JudgeApplicationAnswer::class);
    }
}
