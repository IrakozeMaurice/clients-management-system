@extends('layouts.app')
@section('pageTitle', 'Users')
@section('content')
    <div class="col-lg-8">
        <a href="/users/create" class="btn btn-dark btn-sm" style="float: right;"><i class="fas fa-plus text-white"></i>
            New user</a>
        <h1 class="h4">users</h1>
        <hr>
        <div>
            <table id="tableSearch" class="table table-bordered table-hover table-sm small w-100">
                <thead>
                    <tr>
                        <th>Firstname</th>
                        <th>Lastname</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Approved</th>
                        <th style="display: none">&nbsp;</th>
                        <th style="display: none">&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td><a href="/users/{{ $user->id }}">{{ $user->firstname }}</td>
                            <td><a href="/users/{{ $user->id }}">{{ $user->lastname }}</td>
                            <td><a href="/users/{{ $user->id }}">{{ $user->email }}</td>
                            <td class="text-center"><a href="/users/{{ $user->id }}">
                                    @if ($user->is_admin == 1)
                                        <span class="badge badge-danger badge-pill">admin</span>
                                    @elseif ($user->is_finance == 1)
                                        <span class="badge badge-info badge-pill">finance</span>
                                    @else
                                        <span class="badge badge-primary badge-pill">user</span>
                                    @endif
                                </a></td>
                            <td><a href="/users/{{ $user->id }}">
                                    @if ($user->approved == 1)
                                        Yes
                                    @else
                                        No
                                    @endif
                            </td>

                            <td class="text-center"><a href="/users/{{ $user->id }}/edit"><button
                                        class="btn btn-light btn-outline-success text-dark btn-sm">Edit</button></a>
                            </td>
                            <td class="text-center">
                                <form action="/users/{{ $user->id }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" value="Delete"
                                        class="btn btn-light btn-outline-danger text-dark btn-sm">
                                </form>
                            </td>
                            <td class="text-center">
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
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>Email</th>
                    <th>role</th>
                    <th>Approved</th>
                    <th style="display: none">&nbsp;</th>
                    <th style="display: none">&nbsp;</th>
                </tfoot>
            </table>
        </div>
    </div>
    @include('partials.dataTableScripts')
@endsection
