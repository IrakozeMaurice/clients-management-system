@extends('layouts.app')
@section('pageTitle', 'update client')
@section('content')
    <div class="col-lg-6">
        <h1 class="h4">Edit client</h1>
        <form action="/clients/{{ $client->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div>
                <input type="text" name="firstname" value="{{ $client->firstname }}" class="form-control">
            </div>
            <br>
            <div>
                <input type="text" name="lastname" value="{{ $client->lastname }}" class="form-control">
            </div>
            <br>
            <div>
                <input type="email" name="email" value="{{ $client->email }}" class="form-control">
            </div>
            <br>
            <div>
                <input type="text" name="phone" value="{{ $client->phone }}" class="form-control">
            </div>
            <br>
            <div>
                <input type="text" name="address" value="{{ $client->address }}" class="form-control">
            </div>
            <br>
            <div>
                <input type="text" name="district" value="{{ $client->district }}" class="form-control">
            </div>
            <br>
            <div>
                <input type="text" name="city" value="{{ $client->city }}" class="form-control">
            </div>
            <br>
            <div>
                <input type="text" name="country" value="{{ $client->country }}" class="form-control">
            </div>
            <br>
            <div>
                <button type="submit" class="btn btn-dark">Update Client</button>
            </div>
        </form><br>
    </div>
@endsection
