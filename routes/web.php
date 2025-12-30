<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\MemberController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\MaterialController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/anggota', [MemberController::class, 'index'])->name('member');
Route::get('/jadwal', [ScheduleController::class, 'index'])->name('schedules');
Route::get('/materi', [MaterialController::class, 'index'])->name('materials');