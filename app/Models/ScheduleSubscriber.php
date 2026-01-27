<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ScheduleSubscriber extends Model
{
    protected $fillable = ['schedule_id', 'phone_number'];

    public function schedule(): BelongsTo
    {
        return $this->belongsTo(Schedule::class);
    }
}
