<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JudgeApplication extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'present_designation',
        'years_of_experience',
        'working_company_name',
        'address',
        'state',
        'country',
        'city',
        'postal',
        'phone',
        'email',
        'bio',
        'category_id',
        'profile_pic',
        'documents',
        'document_urls',
        'linkedin',
        'answers',
        'status',
        'remarks',
    ];

    protected $casts = [
        'documents' => 'array',
        'document_urls' => 'array',
        'answers' => 'array',
        'years_of_experience' => 'integer',
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
