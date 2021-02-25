@extends('home')
@section('pageTitle', 'Clients')
@section('content')
    <div class="col-lg-12">
        <a href="/clients/create" class="btn btn-dark btn-sm" style="float: right;"><i class="fas fa-plus text-white"></i>
            New client</a>
        <h1 class="h4">Clients</h1>
        <hr>
        <div>
            <table class="table table-hover table-sm small">
                <tr>
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th colspan="2">Action</th>
                </tr>
                @foreach ($clients as $client)
                    <tr>
                        <td><a href="/clients/{{ $client->id }}">{{ $client->firstname }}</td>
                        <td><a href="/clients/{{ $client->id }}">{{ $client->lastname }}</td>
                        <td><a href="/clients/{{ $client->id }}">{{ $client->email }}</td>
                        <td><a href="/clients/{{ $client->id }}">{{ $client->phone }}</td>
                        <td><a href="/clients/{{ $client->id }}">{{ $client->address }}</td>
                        <td><a href="/clients/{{ $client->id }}/edit"><button
                                    class="btn btn-light btn-outline-success text-dark btn-sm">Edit</button></a>
                        </td>
                        <td>
                            <form action="/clients/{{ $client->id }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <input type="submit" value="Delete"
                                    class="btn btn-light btn-outline-danger text-dark btn-sm">
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection
