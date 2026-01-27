<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Schedule;
use App\Models\ScheduleSubscriber;

class SubscriptionController extends Controller
{
    public function subscribe(Request $request)
    {
        $request->validate([
            'phone_number' => 'required',
            'schedule_id' => 'required|exists:schedules,id',
        ]);

        $exists = ScheduleSubscriber::where('schedule_id', $request->schedule_id)
                    ->where('phone_number', $request->phone_number)
                    ->exists();

        if ($exists) {
            return response()->json([
                'status' => 'error',
                'message' => 'Anda sudah terdaftar di mata kuliah ini.',
            ], 409);
        }

        ScheduleSubscriber::create([
            'schedule_id' => $request->schedule_id,
            'phone_number' => $request->phone_number,
        ]);

        $schedule = Schedule::find($request->schedule_id);

        return response()->json([
            'status' => 'success',
            'message' => "Berhasil mendaftar ke mata kuliah: {$schedule->subject} ({$schedule->day})",
            'data' => $schedule
        ]);
    }

    public function unsubscribe(Request $request)
    {
        $request->validate([
            'phone_number' => 'required',
            'schedule_id' => 'required',
        ]);

        $deleted = ScheduleSubscriber::where('schedule_id', $request->schedule_id)
                    ->where('phone_number', $request->phone_number)
                    ->delete();

        if ($deleted) {
            return response()->json([
                'status' => 'success',
                'message' => 'Berhasil berhenti berlangganan dari mata kuliah tersebut.',
            ]);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Anda belum terdaftar atau ID salah.',
            ], 404);
        }
    }

    public function mySchedule(Request $request)
    {
        $phoneNumber = $request->query('phone_number');
        $day = $request->query('day');

        if (!$phoneNumber) {
            return response()->json(['status' => 'error', 'message' => 'Nomor wajib diisi'], 400);
        }

        $query = Schedule::whereHas('subscribers', function($q) use ($phoneNumber) {
            $q->where('phone_number', $phoneNumber);
        });

        if ($day) {
            $query->where('day', $day);
        }

        $schedules = $query->orderBy('day')->orderBy('start_time')->get();

        if ($schedules->isEmpty()) {
            return response()->json([
                'status' => 'empty',
                'message' => 'Tidak ada jadwal kuliah untuk hari ini.',
                'data' => []
            ]);
        }

        return response()->json([
            'status' => 'success',
            'data' => $schedules
        ]);
    }
    
    public function myCourses(Request $request)
    {
        $phoneNumber = $request->query('phone_number');

        if (!$phoneNumber) {
            return response()->json(['status' => 'error', 'message' => 'Nomor HP wajib diisi'], 400);
        }

        $courses = Schedule::whereHas('subscribers', function($q) use ($phoneNumber) {
            $q->where('phone_number', $phoneNumber);
        })->select('id', 'subject', 'day', 'class', 'start_time')->get();

        return response()->json([
            'status' => 'success',
            'data' => $courses
        ]);
    }
}
