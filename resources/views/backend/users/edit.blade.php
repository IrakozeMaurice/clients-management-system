@extends('layouts.app')
@section('pageTitle', 'edit user')
@section('content')
    <div class="col-lg-6">
        <h1 class="h4">Edit user</h1>
        <form action="/users/{{ $user->id }}" method="POST">
            @csrf
            @method('PATCH')
            <div>
                <label for="role">role</label>
                <select name="role" id="role" class="form-control">
                    <option value="admin" @if ($user->is_admin == 1) selected @endif>Administrator</option>
                    <option value="user" @if ($user->is_admin == 0) selected @endif>User</option>
                    <option value="finance" @if ($user->is_finance == 1) selected @endif>Finance</option>
                </select>
            </div>
            <br>
            <div>
                <label for="firstname">First Name</label>
                <input type="text" name="firstname" id="firstname" value="{{ $user->firstname }}" class="form-control">
            </div>
            <br>
            <div>
                <label for="lastname">Last Name</label>
                <input type="text" name="lastname" id="lastname" value="{{ $user->lastname }}" class="form-control">
            </div>
            <br>
            <div>
                <label for="email">Email</label>
                <input type="email" name="email" id="email" value="{{ $user->email }}" class="form-control">
            </div>
            <br>
            <div>
                <input type="submit" class="btn btn-dark btn-sm" value="Update user">
            </div>
        </form><br>
    </div>
@endsection
