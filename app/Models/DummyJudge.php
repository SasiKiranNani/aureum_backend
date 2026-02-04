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
        'is_judge',
        'is_panel_member',
        'has_details_page',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'is_judge' => 'boolean',
        'is_panel_member' => 'boolean',
        'has_details_page' => 'boolean',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
