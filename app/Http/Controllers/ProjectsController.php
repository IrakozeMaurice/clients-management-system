<?php

namespace App\Http\Controllers;

use App\Project;
use App\Client;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{

    public function index()
    {
        $projects = Project::all();
        return view('backend.projects.index', compact('projects'));
    }

    public function create()
    {
        $clients = Client::all();
        return view('backend.projects.create', compact('clients'));
    }

    public function store()
    {
        $attributes = $this->validateProject();
        $attributes['assignedTo'] = auth()->id();
        $project = Project::create($attributes);
        return redirect('/projects');
    }

    public function show(Project $project)
    {
        return view('backend.projects.show', compact('project'));
    }

    public function edit(Project $project)
    {
        return view('backend.projects.edit', compact('project'));
    }

    public function update(Project $project)
    {
        $attributes = $this->validateProject();
        $project->update($attributes);
        return redirect('/projects');
    }

    public function destroy(Project $project)
    {
        $project->delete();
        return redirect('/projects');
    }

    function validateProject()
    {
        return request()->validate([
            'client_id' => 'required',
            'title' => ['required', 'min:3'],
            'description' => ['required', 'min:3'],
        ]);
    }
}
