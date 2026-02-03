<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DummyJudge extends Model
{
    protected $fillable = [
        'judge_name',
        'designation',
        'category_id',
        'country',
        'description',
        'image',
        'linkedin_url',
        'is_active',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
