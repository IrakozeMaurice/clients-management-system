@extends('layouts.app')
@section('pageTitle', 'Clients')
@section('content')
    <div class="col-lg-12">
        <a href="/clients/create" class="btn btn-dark btn-sm" style="float: right;"><i class="fas fa-plus text-white"></i>
            New client</a>
        <h1 class="h4">Clients</h1>
        <hr>
        <div>
            <table id="clientsTable" class="table table-bordered table-hover table-sm small">
                <thead>
                    <tr>
                        <th class="text-center">Firstname</th>
                        <th class="text-center">Lastname</th>
                        <th class="text-center">Email</th>
                        <th class="text-center">Phone</th>
                        <th class="text-center">Address</th>
                        <th class="text-center" class="text-center">Action</th>
                        <th style="display: none">&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
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
                </tbody>
                <tfoot>
                    <tr>
                        <th class="text-center">Firstname</th>
                        <th class="text-center">Lastname</th>
                        <th class="text-center">Email</th>
                        <th class="text-center">Phone</th>
                        <th class="text-center">Address</th>
                        <th class="text-center" class="text-center">Action</th>
                        <th style="display: none">&nbsp;</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
    {{-- <script src="{{ asset('js/popper.min.js') }}"></script> --}}
    <script type="application/javascript" src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>
    <script type="application/javascript" src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script type="application/javascript" src="{{ asset('js/dataTables.bootstrap4.min.js') }}"></script>
    <script type="application/javascript">
        $(document).ready(function() {
            $.noConflict();
            $('#clientsTable').DataTable();
            // $('.dataTables_length').addClass('bs-select');
        });

    </script>
@endsection
