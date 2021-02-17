@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <h4>{{ $client->firstname }} {{ $client->lastname }}</h4>
                <small>{{ $client->email }}</small><br>
                <small>{{ $client->phone }}</small><br>
                <small>{{ $client->city }}</small><br>
                <small>{{ $client->country }}</small><br>
                <br>
                <a href="/clients/{{ $client->id }}/edit"><button class="btn btn-success">Edit</button></a>
                <form action="/clients/{{ $client->id }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <a href="#"><button class="btn btn-danger">Delete</button></a>
                </form>
            </div>
        </div>
    </div>
@endsection
