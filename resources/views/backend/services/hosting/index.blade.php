@extends('layouts.app')
@section('pageTitle', 'Hosting')
@section('content')
    <div class="col-lg-12">
        <a href="/hostings/create" class="btn btn-dark btn-sm" style="float: right;"><i class="fas fa-plus text-white"></i>
            New package</a>
        <h1 class="h4">Hosting</h1>
        <hr>
        <div>
            <table class="table table-bordered table-hover table-sm small">
                <tr>
                    <th>package</th>
                    <th>disc space</th>
                    <th>bandwidth</th>
                    <th>email accounts</th>
                    <th>parked domains</th>
                    <th>subdomains</th>
                    <th>ftp accounts</th>
                    <th>price</th>
                    <th colspan="2" class="text-center">Action</th>
                </tr>
                @foreach ($hostings as $hosting)
                    <tr>
                        <td><a href="/hostings/{{ $hosting->id }}">{{ $hosting->package_name }}</td>
                        <td><a href="/hostings/{{ $hosting->id }}">{{ $hosting->disc_space }}</td>
                        <td><a href="/hostings/{{ $hosting->id }}">{{ $hosting->bandwidth }}</td>
                        <td><a href="/hostings/{{ $hosting->id }}">{{ $hosting->email_accounts }}</td>
                        <td><a href="/hostings/{{ $hosting->id }}">{{ $hosting->parked_domains }}</td>
                        <td><a href="/hostings/{{ $hosting->id }}">{{ $hosting->subdomain }}</td>
                        <td><a href="/hostings/{{ $hosting->id }}">{{ $hosting->ftp_accounts }}</td>
                        <td><a href="/hostings/{{ $hosting->id }}">{{ $hosting->price }}</td>

                        <td class="text-center"><a href="/hostings/{{ $hosting->id }}/edit"><button
                                    class="btn btn-light btn-outline-success text-dark btn-sm btn-block">Edit</button></a>
                        </td>
                        <td class="text-center">
                            <form action="/hostings/{{ $hosting->id }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <input type="submit" value="Delete"
                                    class="btn btn-light btn-outline-danger text-dark btn-sm btn-block">
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection
