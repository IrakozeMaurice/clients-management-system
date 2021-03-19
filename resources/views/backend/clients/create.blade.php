@extends('layouts.app')
@section('pageTitle', 'New client')
@section('content')
    <div class="col-lg-6">
        <h1 class="h4">new client</h1>
        <form action="/clients" method="POST" enctype="multipart/form-data">
            @csrf
            <div>
                <input type="text" name="firstname" placeholder="firstname" class="form-control">
            </div>
            <br>
            <div>
                <input type="text" name="lastname" placeholder="lastname" class="form-control">
            </div>
            <br>
            <div>
                <input type="email" name="email" placeholder="email address" class="form-control">
            </div>
            <br>
            <div>
                <input type="text" name="phone" placeholder="phone number" class="form-control">
            </div>
            <br>
            <div>
                <input type="text" name="address" placeholder="address" class="form-control">
            </div>
            <br>
            <div>
                <input type="text" name="district" placeholder="district" class="form-control">
            </div>
            <br>
            <div>
                <input type="text" name="city" placeholder="city" class="form-control">
            </div>
            <br>
            <div>
                <input type="text" name="country" placeholder="country" class="form-control">
            </div>
            <br>
            <div>
                <button type="submit" class="btn btn-dark btn-sm">Add Client</button>
            </div>
        </form><br>
    </div>
@endsection
