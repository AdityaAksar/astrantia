<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Schedule;
use App\Models\Assignment;
use Carbon\Carbon;

class AutomationController extends Controller
{
    public function getSubscribers($scheduleId)
    {
        $schedule = Schedule::with('subscribers')->find($scheduleId);

        if (!$schedule) {
            return response()->json(['status' => 'error', 'message' => 'ID Mata Kuliah tidak ditemukan.'], 404);
        }

        $phones = $schedule->subscribers->pluck('phone_number')->toArray();

        return response()->json([
            'status' => 'success',
            'subject' => $schedule->subject,
            'phones' => $phones
        ]);
    }

    public function getUpcomingAssignments()
    {
        $tomorrow = Carbon::now()->addDay()->format('Y-m-d');
        $threeDays = Carbon::now()->addDays(3)->format('Y-m-d');

        $assignments = Assignment::whereDate('deadline', $tomorrow)
            ->orWhereDate('deadline', $threeDays)
            ->orderBy('deadline', 'asc')
            ->get();

        if ($assignments->isEmpty()) {
            return response()->json(['status' => 'empty', 'data' => []]);
        }

        return response()->json([
            'status' => 'success',
            'data' => $assignments
        ]);
    }
}
