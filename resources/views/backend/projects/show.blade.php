@extends('layouts.app')
@section('pageTitle', 'project info')
@section('content')
    <div class="col-lg-4">
        <hr>
        <h1 class="h4 text-center">Project information</h1>
        <hr>
        <h1 class="h5">{{ $project->title }}</h1>
        <small>Description: {{ $project->description }}</small><br>
        <small>Client: <a href="/clients/{{ $project->client->id }}">{{ $project->client->firstname }}
                {{ $project->client->lastname }}</a></small><br>
        <small>Assigned to: <a href="/users/{{ $project->assigned_To->id }}">{{ $project->assigned_To->firstname }}
                {{ $project->assigned_To->lastname }}</a></small><br>
        <small>Created: {{ $project->created_at->diffForHumans() }}</small><br>
        <small>Status: @if ($project->status == 'todo')
                <span class="badge px-4 py-1 text-uppercase badge-warning badge-pill">{{ $project->status }}</span>
            @elseif ($project->status == 'ongoing')
                <span class="badge px-4 py-1 text-uppercase badge-info badge-pill">{{ $project->status }}</span>
            @else
                <span class="badge px-4 py-1 text-uppercase badge-success badge-pill">{{ $project->status }}</span>
            @endif</small><br><br>
        <a href="/projects/{{ $project->id }}/edit"><button
                class="btn btn-light btn-outline-success text-dark btn-sm">Edit</button></a>
        <form action="/projects/{{ $project->id }}" method="POST" style="display: inline;">
            @csrf
            @method('DELETE')
            <a href="/projects/{{ $project->id }}"><button
                    class="btn btn-light btn-outline-danger text-dark btn-sm">Delete</button></a>
        </form><br><br>
    </div>
    <div class="col-lg-8">
        <hr>
        <h1 class="h4 text-center">Tasks</h1>
        <hr>
        <table class="table table-bordered table-hover table-sm small w-100">
            <tr class="text-center">
                <th>Title</th>
                <th>Status</th>
                <th colspan="2">Action</th>
            </tr>
            @foreach ($project->tasks as $task)
                <tr>
                    <td class="text-center"><a href="/tasks/{{ $task->id }}"
                            style="{{ $task->completed ? 'text-decoration:line-through' : '' }}">{{ $task->title }}</a>
                    </td>
                    <td class="text-center">
                        <form method="POST" action="/tasks/{{ $task->id }}">
                            @method('PATCH')
                            @csrf
                            <input type="checkbox" name="completed" {{ $task->completed ? 'checked' : '' }}
                                onchange="this.form.submit()">
                        </form>
                    </td>
                    <td class="text-center">
                        <form action="/tasks/{{ $task->id }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="Delete"
                                class="btn btn-light btn-outline-danger text-dark btn-sm btn-block">
                        </form>
                    </td>
                </tr>
            @endforeach
        </table><br>
        {{-- Add a new task form --}}
        <form method="POST" action="/projects/{{ $project->id }}/tasks">
            @csrf
            <div class="mb-1">
                <input type="text" name="title" class="form-control" placeholder="Add new task">
            </div>
            <div class="mb-1">
                <textarea name="description" placeholder="description" class="form-control"></textarea>
            </div>
            <div>
                <button type="submit" class="btn btn-dark btn-sm">Add task</button>
            </div>
        </form>
    </div>
@endsection
