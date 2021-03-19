@extends('layouts.app')
@section('pageTitle', 'user info')
@section('content')
    <div class="col-lg-6">
        <h1 class="h4">user information</h1>
        <hr>
        <h4>{{ $user->firstname }} {{ $user->lastname }}</h4>
        <small>email: {{ $user->email }}</small><br>
        <h6 class="mt-1">role: @if ($user->is_admin == 1)
                <span class="badge badge-danger badge-pill px-3 py-1">admin</span>
            @elseif ($user->is_finance == 1)
                <span class="badge badge-success badge-pill px-3 py-1">finance</span>
            @else
                <span class="badge badge-primary badge-pill px-3 py-1">user</span>
            @endif
        </h6><br>
        <a href="/users/{{ $user->id }}/edit"><button
                class="btn btn-light btn-outline-success text-dark btn-sm">Edit</button></a>
        <form action="/users/{{ $user->id }}" method="POST" style="display: inline;">
            @csrf
            @method('DELETE')
            <a href="#"><button class="btn btn-light btn-outline-danger text-dark btn-sm">Delete</button></a>
        </form>
    </div>
@endsection
