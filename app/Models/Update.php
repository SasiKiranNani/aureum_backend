<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Update extends Model
{
    protected $fillable = [
        'title',
        'content',
        'image_path',
        'is_active',
    ];
}
