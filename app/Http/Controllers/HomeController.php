<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Schedule;
use App\Models\Gallery;
use App\Models\Assignment;
use App\Models\Student;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function index()
    {
        Carbon::setLocale('id');
        $today = Carbon::now()->translatedFormat('l');

        $schedules = Schedule::where('day', $today)
            ->orderBy('start_time', 'asc')
            ->get();

        $assignments = Assignment::where('deadline', '>=', Carbon::now())
            ->orderBy('deadline', 'asc')
            ->take(3)
            ->get();
        
        $students = Student::select('name', 'quote', 'photo')->get();

        $galleries = Gallery::latest()->get()->map(function($item) {
            $images = is_string($item->images) ? json_decode($item->images) : $item->images;
            return [
                'title' => $item->title,
                'image' => $images[0] ?? null,
            ];
        });

        return view('home', compact('schedules', 'assignments', 'students', 'galleries'));
    }
}
