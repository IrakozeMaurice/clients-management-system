@extends('layouts.app')
@section('pageTitle', 'Hosting')
@section('content')
    <div class="col-lg-12">
        <a href="/hostings/create" class="btn btn-dark btn-sm" style="float: right;"><i class="fas fa-plus text-white"></i>
            New package</a>
        <h1 class="h4">Hosting</h1>
        <hr>
        <div>
            <table id="tableSearch" class="table table-responsive table-bordered table-hover table-sm small w-100">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Package</th>
                        <th>Space</th>
                        <th>Bandwidth</th>
                        <th>Email Accounts</th>
                        <th>Subdomains</th>
                        <th>FTP Accounts</th>
                        <th>Price</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($hostings as $hosting)
                        <tr>
                            <td><a href="/hostings/{{ $hosting->id }}">{{ $hosting->id }}</a></td>
                            <td>{{ $hosting->package_name }}</td>
                            <td>{{ $hosting->disc_space }}</td>
                            <td>{{ $hosting->bandwidth }}</td>
                            <td>{{ $hosting->email_accounts }}</td>
                            <td>{{ $hosting->subdomain }}</td>
                            <td>{{ $hosting->ftp_accounts }}</td>
                            <td>{{ number_format($hosting->price, 0, null, ',') }}</td>

                            <td class="text-center"><a href="/hostings/{{ $hosting->id }}/edit"><button
                                        class="btn btn-light btn-outline-success text-dark btn-sm">Edit</button></a>
                                <form action="/hostings/{{ $hosting->id }}" method="POST" style="display: inline;">
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
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
    @include('partials.dataTableScripts')
@endsection
