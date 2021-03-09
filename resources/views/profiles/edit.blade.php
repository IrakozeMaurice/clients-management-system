@extends('layouts.app')
@section('pageTitle', 'edit profile')
@section('content')
    <div class="col-lg-6">
        <h1 class="h4">Edit profile</h1>
        <form action="/profile/{{ $profile->id }}" method="POST">
            @csrf
            @method('PATCH')
            <div>
                <label for="phone">Phone</label>
                <input type="text" name="phone" id="phone" value="{{ $profile->phone }}" class="form-control">
            </div>
            <br>
            <div>
                <label for="address">Address</label>
                <input type="text" name="address" id="address" value="{{ $profile->address }}" class="form-control">
            </div>
            <br>
            <div>
                <input type="submit" class="btn btn-dark btn-sm" value="save changes">
            </div>
        </form><br>
    </div>
@endsection
