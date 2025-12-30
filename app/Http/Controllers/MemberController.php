<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class MemberController extends Controller
{
    public function index()
    {
        $students = Student::orderBy('nim', 'asc')->get();
        return view('member', compact('students'));
    }
}
