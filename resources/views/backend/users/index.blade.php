@extends('layouts.app')
@section('pageTitle', 'Users')
@section('content')
    <div class="col-lg-12">
        <a href="/users/create" class="btn btn-dark btn-sm" style="float: right;"><i class="fas fa-plus text-white"></i>
            New user</a>
        <h1 class="h4">users</h1>
        <hr>
        <div>
            <table id="tableSearch" class="table table-bordered table-hover table-sm small w-100">
                <thead>
                    <tr>
                        <th class="text-center">Id</th>
                        <th class="text-center">Firstname</th>
                        <th class="text-center">Lastname</th>
                        <th class="text-center">Email</th>
                        <th class="text-center">Role</th>
                        <th class="text-center">Approved</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td><a href="/users/{{ $user->id }}">{{ $user->id }}</a></td>
                            <td>{{ $user->firstname }}</td>
                            <td>{{ $user->lastname }}</td>
                            <td>{{ $user->email }}</td>
                            <td class="text-center"><a href="/users/{{ $user->id }}">
                                    @if ($user->is_admin == 1)
                                        <span class="badge badge-danger badge-pill px-3 py-1">admin</span>
                                    @elseif ($user->is_finance == 1)
                                        <span class="badge badge-info badge-pill px-3 py-1">finance</span>
                                    @elseif ($user->is_tech == 1)
                                        <span class="badge badge-dark badge-pill px-3 py-1">tech</span>
                                    @else
                                        <span class="badge badge-primary badge-pill px-3 py-1">user</span>
                                    @endif
                                </a></td>
                            <td class="text-center">
                                @if ($user->approved == 1)
                                    Yes
                                @else
                                    No
                                @endif
                            </td>

                            <td class="text-center"><a href="/users/{{ $user->id }}/edit"><button
                                        class="btn btn-light btn-outline-success text-dark btn-sm">Edit</button></a>
                                <form action="/users/{{ $user->id }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" value="Delete"
                                        class="btn btn-light btn-outline-danger text-dark btn-sm">
                                </form>
                                <form action="/approve/{{ $user->id }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('PATCH')
                                    <input type="submit" value="Approve"
                                        class="btn btn-light btn-outline-primary text-dark btn-sm">
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
                </tfoot>
            </table>
        </div>
    </div>
    @include('partials.dataTableScripts')
@endsection
