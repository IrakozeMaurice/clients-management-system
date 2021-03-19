<?php

namespace App\Http\Controllers;

use App\Project;
use App\Task;
use Illuminate\Http\Request;

class ProjectTasksController extends Controller
{

    public function update(Task $task)
    {
        $task->update([
            'completed' => request()->has('completed')
        ]);
        $project = $task->project;
        $this->updatePercentage($project);
        $this->updateStatus($project);
        return back();
    }

    public function store(Project $project)
    {
        Task::create([
            'project_id' => $project->id,
            'title' => request('title'),
            'description' => request('description')
        ]);
        $this->updatePercentage($project);
        $this->updateStatus($project);
        return back();
    }

    public function show(Task $task)
    {
        return view('backend.tasks.show', compact('task'));
    }

    public function edit(Task $task)
    {
        return view('backend.tasks.edit', compact('task'));
    }

    public function updateTask(Task $task)
    {
        $task->update([
            'title' => request('title'),
            'description' => request('description')
        ]);
        return redirect(route('projects.show', $task->project->id));
    }

    public function destroy(Task $task)
    {
        $task->delete();
        $this->updatePercentage($task->project);
        $this->updateStatus($task->project);
        return redirect(route('projects.show', $task->project->id));
    }

    protected function updatePercentage(Project $project)
    {
        $project->percentage = (int)number_format($project->tasks->where('completed', true)->count() / $project->tasks->count() * 100, 0);
        $project->save();
    }

    protected function updateStatus(Project $project)
    {
        if ($project->percentage > 0) {
            if ($project->percentage === 100) {
                $project->status = 'completed';
                $project->save();
            } else {
                $project->status = 'ongoing';
                $project->save();
            }
        } else {
            $project->status = 'todo';
            $project->save();
        }
    }
}
