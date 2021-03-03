@extends('layouts.app')
@section('pageTitle', 'New user')
@section('content')
    <div class="col-lg-6">
        <h1 class="h4">new user</h1>
        <form action="/users" method="POST">
            @csrf
            <div>
                <label for="role">select role</label>
                <select name="is_admin" id="role" class="form-control">
                    <option value="0">Normal User</option>
                    <option value="1">Administrator</option>
                </select>
            </div>
            <br>
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
                <input type="password" name="password" placeholder="password" class="form-control">
            </div>
            <br>
            <div>
                <button type="submit" class="btn btn-dark">Add user</button>
            </div>
        </form><br>
    </div>
@endsection
