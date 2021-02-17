@extends('layouts.app')
@section('pageTitle', 'Clients')

@section('content')
    <div class="container">
        <a href="/clients/create" class="btn btn-primary" style="float: right;">New client</a>
        <h1>Clients</h1>
        <hr>
        <div class="row">
            <div class="col-lg-9">
                <div>
                    @foreach ($clients as $client)
                        <li><a href="/clients/{{ $client->id }}">{{ $client->firstname }}</a></li>
                        <a href="/clients/{{ $client->id }}/edit"><button class="btn btn-success">Edit</button></a>
                        <form action="/clients/{{ $client->id }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="Delete" class="btn btn-danger">
                        </form>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
