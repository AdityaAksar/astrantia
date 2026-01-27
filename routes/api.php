<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\Api\AssignmentApiController;
use App\Http\Controllers\Api\StudentApiController;
use App\Http\Controllers\Api\SubscriptionController;
use App\Http\Controllers\Api\AutomationController;

Route::get('/jadwal', [ScheduleController::class, 'apiIndex']);

Route::get('/tugas', [AssignmentApiController::class, 'index']);

Route::get('/anggota', [StudentApiController::class, 'index']);

Route::post('/subscribe', [SubscriptionController::class, 'subscribe']);
Route::post('/unsubscribe', [SubscriptionController::class, 'unsubscribe']);
Route::get('/my-schedule', [SubscriptionController::class, 'mySchedule']);
Route::get('/my-courses', [SubscriptionController::class, 'myCourses']);

Route::get('/automation/subscribers/{id}', [AutomationController::class, 'getSubscribers']);
Route::get('/automation/assignments', [AutomationController::class, 'getUpcomingAssignments']);