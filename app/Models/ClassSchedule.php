<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClassSchedule extends Model
{
    protected $fillable = [
        'requester_id',
        'teacher_id',
        'skill_name',
        'starts_at',
        'duration_minutes',
        'mode',
        'status',
        'notes',
    ];

    protected $casts = [
        'starts_at' => 'datetime',
    ];

    public function requester()
    {
        return $this->belongsTo(User::class, 'requester_id');
    }

    public function teacher()
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }
}