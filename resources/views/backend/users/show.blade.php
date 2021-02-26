@extends('layouts.app')
@section('pageTitle', 'user info')
@section('content')
    <div class="col-lg-9">
        <h1 class="h4">user information</h1>
        <hr>
        <h4>{{ $user->firstname }} {{ $user->lastname }}</h4>
        <small>email: {{ $user->email }}</small><br>
        <small>role: @if ($user->is_admin == 1)
                Administrator
            @else
                Normal user
            @endif</small><br>
        <br>
        <a href="/users/{{ $user->id }}/edit"><button
                class="btn btn-light btn-outline-success text-dark btn-sm">Edit</button></a>
        <form action="/users/{{ $user->id }}" method="POST" style="display: inline;">
            @csrf
            @method('DELETE')
            <a href="#"><button class="btn btn-light btn-outline-danger text-dark btn-sm">Delete</button></a>
        </form>
    </div>
@endsection
