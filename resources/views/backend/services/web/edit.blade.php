@extends('layouts.app')
@section('pageTitle', 'update package')
@section('content')
    <div class="col-lg-12">
        <h1 class="h4">Edit package</h1>
        <form action="/web/{{ $package->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div>
                <input type="text" name="package_name" value="{{ $package->package_name }}" class="form-control">
            </div>
            <br>
            <div>
                <input type="number" name="price" value="{{ $package->price }}" class="form-control">
            </div>
            <br>
            <div>
                <button type="submit" class="btn btn-dark">Update package</button>
            </div>
        </form><br>
    </div>
@endsection
