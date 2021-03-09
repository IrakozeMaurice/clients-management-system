@extends('layouts.app')
@section('pageTitle', 'user profile')
@section('content')
    <div class="col-lg-12">
        <hr>
        <div class="row">
            <div class="col-lg-9">
                <div class="card">
                    <div class="card-header bg-dark text-white lead"><strong>user profile</strong></div>
                    <div class="card-body">
                        <div>
                            <strong>Email</strong><br>
                            <small>{{ $profile->user->email }}</small>
                        </div><br>
                        <div>
                            <strong>Firstname</strong><br>
                            <small>{{ $profile->user->firstname }}</small>
                        </div><br>
                        <div>
                            <strong>Lastname</strong><br>
                            <small>{{ $profile->user->lastname }}</small>
                        </div><br>
                        <div>
                            <strong>Phone</strong><br>
                            <small>{{ $profile->phone }}</small>
                        </div><br>
                        <div>
                            <strong>Address</strong><br>
                            <small>{{ $profile->address }}</small>
                        </div><br>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                @if (auth()->user()->is_admin == 1)
                    <h6 class="text-default lead">System administrator</h6><br>
                @else
                    <h6 class="text-default text-center">{{ auth()->user()->firstname }}
                        {{ auth()->user()->lastname }}</h6><br>
                @endif
                <img class="img-fluid img-thumbnail img-profile rounded-circle"
                    src="{{ asset('img/undraw_profile.svg') }}"><br><br>
                <a href="/profile/{{ $profile->id }}/edit" class="btn btn-dark btn-sm btn-block text-white">Edit
                    profile</a>
            </div>
        </div>
    </div>
@endsection
