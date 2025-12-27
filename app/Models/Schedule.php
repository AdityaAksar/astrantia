<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $guarded = [];

    protected $casts = [
        'start_time' => 'timestamp',
        'end_time' => 'timestamp',
    ];
}
