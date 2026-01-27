<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Assignment; 

class AssignmentApiController extends Controller
{
    public function index(Request $request)
    {
        $query = Assignment::query();

        if ($request->filled('weeks')) {
            $weeks = (int) $request->weeks;
            $query->whereBetween('deadline', [
                now(), 
                now()->addWeeks($weeks)->endOfDay()
            ]);
        } else {
            $query->where('deadline', '>=', now());
        }

        $assignments = $query->orderBy('deadline', 'asc')->get();

        if ($assignments->isEmpty()) {
            return response()->json([
                'status' => 'empty',
                'message' => 'Tidak ada tugas aktif.',
                'data' => []
            ]);
        }

        return response()->json([
            'status' => 'success',
            'data' => $assignments
        ]);
    }

    public function show($id)
    {
        $assignment = Assignment::find($id);

        if (!$assignment) {
            return response()->json([
                'status' => 'error',
                'message' => 'Tugas tidak ditemukan'
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'data' => $assignment
        ]);
    }
}
