<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Student;

class StudentApiController extends Controller
{
    public function index(Request $request)
    {
        $query = Student::query();

        if ($request->filled('query')) {
            $keyword = $request->input('query');
            
            $query->where(function($q) use ($keyword) {
                $q->where('name', 'like', "%{$keyword}%")
                ->orWhere('nim', 'like', "%{$keyword}%");
            });
        } 
        else {
            $query->select('id', 'name', 'nim'); 
        }

        $students = $query->get();

        if ($students->isEmpty()) {
            return response()->json([
                'status' => 'empty',
                'message' => 'Data mahasiswa tidak ditemukan.'
            ], 200);
        }

        return response()->json([
            'status' => 'success',
            'total' => $students->count(),
            'data' => $students
        ], 200);
    }
}