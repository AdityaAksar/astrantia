<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $guarded = [];

    protected $fillable = [
        'nim',
        'name',
        'email',
        'role',
        'bio',
        'quote',
        'photo',
        'instagram',
        'linkedin',
        'github',
    ];
}
