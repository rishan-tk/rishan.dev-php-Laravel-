<?php

namespace App\Http\Controllers;

class ProjectController extends Controller
{
    public function show(string $slug)
    {
        $projectsPath = resource_path('data/projects.json');

        if (! file_exists($projectsPath)) {
            abort(404);
        }

        $projects = json_decode(file_get_contents($projectsPath), true);
        $project = collect($projects)->firstWhere('slug', $slug);

        if (! $project) {
            abort(404);
        }

        return view('pages.project-detail', compact('project'));
    }
}
