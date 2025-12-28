<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $guarded = [];

    protected $fillable = [
        'day',
        'subject',
        'class',
        'room',
        'lecturers',
        'start_time',
        'end_time',
    ];

    protected $casts = [
        'start_time' => 'string',
        'end_time' => 'string',
        'lecturers' => 'array',
    ];
}
