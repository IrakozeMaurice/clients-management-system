@extends('layouts.app')
@section('pageTitle', 'approve account')
@section('content')
    <div class="col-lg-6">
        <h1 class="h4">register your account</h1>
        <small>Enter your email to register</small>
        <form action="/register" method="POST">
            @csrf
            <div>
                <input type="email" name="email" placeholder="email address" class="form-control">
            </div><br>
            <hr>
            <small>Update your password</small>
            <div>
                <input type="password" name="password" placeholder="password" class="form-control">
            </div>
            <br>
            <div>
                <button type="submit" class="btn btn-dark">register</button>
            </div>
        </form><br>
    </div>
@endsection
