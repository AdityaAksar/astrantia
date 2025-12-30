<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    protected $guarded = [];

    protected $casts = [
        'file_path' => 'array',
    ];
}
