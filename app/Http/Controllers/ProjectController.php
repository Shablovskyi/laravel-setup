<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    // Показати всі проєкти (GET /api/projects)
    public function index()
    {
        return Project::with('user', 'tasks')->get();
    }

    // Додати новий проєкт (POST /api/projects)
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'user_id' => 'required|exists:users,id',
        ]);

        $project = Project::create($validated);

        return response()->json($project, 201);
    }

    // Додатково: показати 1 проект
    public function show(Project $project)
    {
        return $project->load('user', 'tasks');
    }
}
