<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'user_id',
        'contact',
        'gender',
        'bio',
        'profile_picture',
        'province',
        'district',
        'municipality',
        'ward',
        'skills_to_teach',
        'skills_to_learn',
    ];

    protected $casts = [
        'skills_to_teach' => 'array',
        'skills_to_learn' => 'array',
    ];
}
