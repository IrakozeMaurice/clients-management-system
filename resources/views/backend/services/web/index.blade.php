@extends('layouts.app')
@section('pageTitle', 'web packages')
@section('content')
    <div class="col-lg-8">
        <a href="/web/create" class="btn btn-dark btn-sm" style="float: right;"><i class="fas fa-plus text-white"></i>
            New package</a>
        <h1 class="h4">web packages</h1>
        <hr>
        <div>
            <table id="tableSearch" class="table table-bordered table-hover table-lg small w-100">
                <thead>
                    <tr>
                        <th class="text-center">Id</th>
                        <th class="text-center">Package</th>
                        <th class="text-center">Price</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($webs as $web)
                        <tr>
                            <td><a href="/web/{{ $web->id }}">{{ $web->id }}</a></td>
                            <td>{{ $web->package_name }}</td>
                            <td>{{ number_format($web->price, 0, null, ',') }}</td>

                            <td class="text-center"><a href="/web/{{ $web->id }}/edit"><button
                                        class="btn btn-light btn-outline-success text-dark btn-sm">Edit</button></a>
                                <form action="/web/{{ $web->id }}" method="POST" style="display: inline;">
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
