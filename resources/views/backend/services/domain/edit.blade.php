@extends('layouts.app')
@section('pageTitle', 'update package')
@section('content')
    <div class="col-lg-6">
        <h1 class="h4">Edit package</h1>
        <form action="/domains/{{ $extension->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div>
                <input type="text" name="extension" value="{{ $extension->extension }}" class="form-control">
            </div>
            <br>
            <div>
                <input type="number" name="price" value="{{ $extension->price }}" class="form-control">
            </div>
            <br>
            <div>
                <button type="submit" class="btn btn-dark btn-sm">Update package</button>
            </div>
        </form><br>
    </div>
@endsection
