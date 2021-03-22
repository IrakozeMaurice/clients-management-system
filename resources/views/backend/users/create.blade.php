@extends('layouts.app')
@section('pageTitle', 'New user')
@section('content')
    <div class="col-lg-6">
        <h1 class="h4">new user</h1>
        <form action="/users" method="POST">
            @csrf
            <div>
                <label for="role">select role</label>
                <select name="role" id="role" class="form-control">
                    <option value="user">User</option>
                    <option value="admin">Administrator</option>
                    <option value="finance">Finance</option>
                    <option value="tech">Technical</option>
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
                <button type="submit" class="btn btn-dark btn-sm">Add user</button>
            </div>
        </form><br>
    </div>
@endsection
