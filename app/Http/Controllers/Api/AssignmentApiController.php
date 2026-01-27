<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Assignment; 

class AssignmentApiController extends Controller
{
    public function index()
    {
        $assignments = Assignment::where('deadline', '>=', now())
            ->orderBy('deadline', 'asc')
            ->get();

        if ($assignments->isEmpty()) {
            return response()->json([
                'status' => 'empty',
                'message' => 'Tidak ada tugas aktif.'
            ], 200);
        }

        return response()->json([
            'status' => 'success',
            'data' => $assignments
        ], 200);
    }
}
