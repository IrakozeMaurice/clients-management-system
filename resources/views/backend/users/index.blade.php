@extends('layouts.app')
@section('pageTitle', 'Users')
@section('content')
    <div class="col-lg-12">
        <a href="/users/create" class="btn btn-dark btn-sm" style="float: right;"><i class="fas fa-plus text-white"></i>
            New user</a>
        <h1 class="h4">users</h1>
        <hr>
        <div>
            <table class="table table-bordered table-hover table-sm small">
                <tr>
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>Email</th>
                    <th>role</th>
                    <th colspan="2" class="text-center">Action</th>
                </tr>
                @foreach ($users as $user)
                    <tr>
                        <td><a href="/users/{{ $user->id }}">{{ $user->firstname }}</td>
                        <td><a href="/users/{{ $user->id }}">{{ $user->lastname }}</td>
                        <td><a href="/users/{{ $user->id }}">{{ $user->email }}</td>
                        <td><a href="/users/{{ $user->id }}">
                                @if ($user->is_admin == 1)
                                    Admin
                                @else
                                    Normal
                                @endif
                        </td>

                        <td class="text-center"><a href="/users/{{ $user->id }}/edit"><button
                                    class="btn btn-light btn-outline-success text-dark btn-sm btn-block">Edit</button></a>
                        </td>
                        <td class="text-center">
                            <form action="/users/{{ $user->id }}" method="POST" style="display: inline;">
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
