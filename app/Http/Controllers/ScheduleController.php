<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Schedule;

class ScheduleController extends Controller
{
    public function index(Request $request)
    {
        $query = Schedule::orderBy('start_time', 'asc');
        if ($request->filled('day')) {
            $query->where('day', $request->day);
        }
        if ($request->filled('class')) {
            $query->where('class', $request->class);
        }
        $schedules = $query->get();
        $groupedSchedules = $schedules->groupBy('day');
        $daysOrder = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'];
        $classes = Schedule::select('class')
                    ->distinct()
                    ->orderBy('class', 'asc')
                    ->pluck('class');

        return view('schedule', [
            'groupedSchedules' => $groupedSchedules,
            'daysOrder' => $daysOrder,
            'classes' => $classes,
        ]);
    }

    public function apiIndex(Request $request)
    {
        $query = Schedule::orderBy('start_time', 'asc');

        if ($request->filled('day')) {
            $query->where('day', $request->day);
        }

        if ($request->filled('class')) {
            $query->where('class', $request->class);
        }

        $schedules = $query->get();

        if ($schedules->isEmpty()) {
            return response()->json([
                'status' => 'empty',
                'message' => 'Tidak ada jadwal ditemukan untuk kriteria ini.',
                'data' => []
            ], 200);
        }

        return response()->json([
            'status' => 'success',
            'data' => $schedules
        ], 200);
    }
}