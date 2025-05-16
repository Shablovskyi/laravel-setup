<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;

class FileController extends Controller
{
    public function index()
    {
        return File::all();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'entity' => 'required|string|in:user,project,task',
            'entity_id' => 'required|integer',
            'file_path' => 'required|string',
            'original_name' => 'required|string',
        ]);
        $file = File::create($validated);
        return response()->json($file, 201);
    }
}
