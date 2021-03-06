@extends('layouts.app')
@section('pageTitle', 'package info')
@section('content')
    <div class="col-lg-6">
        <h1 class="h4">package information</h1>
        <hr>
        <small>extension name: {{ $extension->extension }}</small><br>
        <small>price: {{ number_format($extension->price, 0, null, ',') }}</small><br>
        <br>
        <a href="/domains/{{ $extension->id }}/edit"><button
                class="btn btn-light btn-outline-success text-dark btn-sm">Edit</button></a>
        <form action="/domains/{{ $extension->id }}" method="POST" style="display: inline;">
            @csrf
            @method('DELETE')
            <a href="#"><button class="btn btn-light btn-outline-danger text-dark btn-sm">Delete</button></a>
        </form>
    </div>
@endsection
