@extends('layouts.app')
@section('pageTitle', 'Edit Project')
@section('content')
    <div class="col-lg-6">
        <form action="/projects/{{ $project->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div>
                <label for="client">Client</label>
                <select name="client_id" id="client" class="form-control">
                    <option value="{{ $project->client->id }}" selected>{{ $project->client->id }}.
                        {{ $project->client->firstname }}
                        {{ $project->client->lastname }}
                    </option>
                </select>
            </div><br>
            <div>
                <input type="text" name="title" value="{{ $project->title }}" class="form-control">
            </div>
            <br>
            <div>
                <textarea name="description" class="form-control">{{ $project->description }}</textarea>
            </div>
            <br>
            <div>
                <button type="submit" class="btn btn-dark btn-sm">Update project</button>
            </div>
        </form>
    </div>
@endsection
