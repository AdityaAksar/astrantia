<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Schedule extends Model
{
    protected $guarded = ['id'];

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

    public function subscribers(): HasMany
    {
        return $this->hasMany(ScheduleSubscriber::class);
    }
}
