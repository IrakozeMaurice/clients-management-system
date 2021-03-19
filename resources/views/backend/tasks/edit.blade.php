@extends('layouts.app')
@section('pageTitle', 'Edit task')
@section('content')
    <div class="col-lg-6">
        <h1 class="h4">Edit task</h1>
        <form action="/edittask/{{ $task->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div>
                <label for="title">Title</label>
                <input type="text" name="title" id="title" value="{{ $task->title }}" class="form-control">
            </div>
            <br>
            <div>
                <label for="description">Description</label>
                <textarea name="description" class="form-control">{{ $task->description }}</textarea>
            </div>
            <br>
            <div>
                <button type="submit" class="btn btn-dark btn-sm">Update task</button>
            </div>
        </form>
    </div>
@endsection
