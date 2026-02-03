<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DummyWinner extends Model
{
    protected $fillable = [
        'name',
        'category_id',
        'award_id',
        'country',
        'badge_id',
        'image',
        'is_active',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function award()
    {
        return $this->belongsTo(Award::class);
    }

    public function badge()
    {
        return $this->belongsTo(Badge::class);
    }
}
