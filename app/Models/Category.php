<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
        'short_description',
        'description',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function awards(): HasMany
    {
        return $this->hasMany(Award::class);
    }

    public function nomineeQuestions(): HasMany
    {
        return $this->hasMany(NomineeQuestion::class);
    }

    public function judgeQuestions(): HasMany
    {
        return $this->hasMany(CategoryJudgeQuestion::class);
    }

    public function judgeApplications(): HasMany
    {
        return $this->hasMany(JudgeApplication::class);
    }
}
