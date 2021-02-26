@extends('layouts.app')
@section('pageTitle', 'client info')
@section('content')
    <div class="col-lg-9">
        <h1 class="h4">client information</h1>
        <hr>
        <h4>{{ $client->firstname }} {{ $client->lastname }}</h4>
        <small>email: {{ $client->email }}</small><br>
        <small>phone: {{ $client->phone }}</small><br>
        <small>city: {{ $client->city }}</small><br>
        <small>country: {{ $client->country }}</small><br>
        <br>
        <a href="/clients/{{ $client->id }}/edit"><button
                class="btn btn-light btn-outline-success text-dark btn-sm">Edit</button></a>
        <form action="/clients/{{ $client->id }}" method="POST" style="display: inline;">
            @csrf
            @method('DELETE')
            <a href="#"><button class="btn btn-light btn-outline-danger text-dark btn-sm">Delete</button></a>
        </form>
    </div>
@endsection
