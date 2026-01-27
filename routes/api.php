<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\Api\AssignmentApiController;
use App\Http\Controllers\Api\StudentApiController;

Route::get('/jadwal', [ScheduleController::class, 'apiIndex']);

Route::get('/tugas', [AssignmentApiController::class, 'index']);

Route::get('/anggota', [StudentApiController::class, 'index']);
