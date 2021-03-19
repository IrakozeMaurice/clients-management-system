@extends('layouts.app')
@section('pageTitle', 'Clients')
@section('content')
    <div class="col-lg-12">
        <a href="/clients/create" class="btn btn-dark btn-sm" style="float: right;"><i class="fas fa-plus text-white"></i>
            New client</a>
        <h1 class="h4">Clients</h1>
        <hr>
        <div>
            <table id="tableSearch" class="table table-responsive table-bordered table-hover table-sm small w-100">
                <thead>
                    <tr>
                        <th class="text-center">Client Id</th>
                        <th class="text-center">Firstname</th>
                        <th class="text-center">Lastname</th>
                        <th class="text-center">Email</th>
                        <th class="text-center">Phone</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($clients as $client)
                        <tr>
                            <td class="text-center"><a href="/clients/{{ $client->id }}">{{ $client->id }}</td>
                            <td>{{ $client->firstname }}</td>
                            <td>{{ $client->lastname }}</td>
                            <td>{{ $client->email }}</td>
                            <td>{{ $client->phone }}</td>
                            <td><a href="/clients/{{ $client->id }}/edit"><button
                                        class="btn btn-light btn-outline-success text-dark btn-sm">Edit</button></a>
                                <form action="/clients/{{ $client->id }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" value="Delete"
                                        class="btn btn-light btn-outline-danger text-dark btn-sm">
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th class="text-center"></th>
                        <th class="text-center"></th>
                        <th class="text-center"></th>
                        <th class="text-center"></th>
                        <th style="display: none"></th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
    @include('partials.dataTableScripts')
@endsection
