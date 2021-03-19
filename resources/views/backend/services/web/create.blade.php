@extends('layouts.app')
@section('pageTitle', 'New web Package')
@section('content')
    <div class="col-lg-6">
        <h1 class="h4">new web package</h1>
        <form action="/web" method="POST" enctype="multipart/form-data">
            @csrf
            <div>
                <input type="text" name="package_name" placeholder="package name" class="form-control">
            </div>
            <br>
            <div>
                <input type="number" name="price" placeholder="price" class="form-control">
            </div>
            <br>
            <div>
                <button type="submit" class="btn btn-dark btn-sm">Add package</button>
            </div>
        </form><br>
    </div>
@endsection
