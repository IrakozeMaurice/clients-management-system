@extends('layouts.app')
@section('pageTitle', 'New Project')
@section('content')
    <div class="col-lg-6">
        <form action="/projects" method="POST" enctype="multipart/form-data">
            @csrf
            <div>
                <select name="client_id" id="client" class="form-control">
                    <option>select client</option>
                    @foreach ($clients as $client)
                        <option value="{{ $client->id }}">{{ $client->id }}. {{ $client->firstname }}
                            {{ $client->lastname }}
                        </option>
                    @endforeach
                </select>
            </div><br>
            <div>
                <input type="text" name="title" placeholder="Project title" class="form-control">
            </div>
            <br>
            <div>
                <textarea name="description" placeholder="project description" class="form-control"></textarea>
            </div>
            <br>
            <div>
                <button type="submit" class="btn btn-dark btn-sm">Add project</button>
            </div>
        </form>
    </div>
@endsection
