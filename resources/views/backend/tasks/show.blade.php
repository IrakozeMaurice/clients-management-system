@extends('layouts.app')
@section('pageTitle', 'task info')
@section('content')
    <div class="col-lg-6">
        <h1 class="h4">Task information</h1>
        <hr>
        <h4>{{ $task->title }}</h4>
        <small>project: {{ $task->project->title }}</small><br>
        <small>description: {{ $task->description }}</small><br><br>
        <a href="/tasks/{{ $task->id }}/edit"><button
                class="btn btn-light btn-outline-success text-dark btn-sm">Edit</button></a>
        <form action="/tasks/{{ $task->id }}" method="POST" style="display: inline;">
            @csrf
            @method('DELETE')
            <a href="#"><button class="btn btn-light btn-outline-danger text-dark btn-sm">Delete</button></a>
        </form>
    </div>
@endsection
