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
                        <th>package</th>
                        <th>price</th>
                        <th style="display: none">&nbsp;</th>
                        <th style="display: none">&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($webs as $web)
                        <tr>
                            <td><a href="/web/{{ $web->id }}">{{ $web->package_name }}</td>
                            <td><a href="/web/{{ $web->id }}">{{ $web->price }}</td>

                            <td class="text-center"><a href="/web/{{ $web->id }}/edit"><button
                                        class="btn btn-light btn-outline-success text-dark btn-sm btn-block">Edit</button></a>
                            </td>
                            <td class="text-center">
                                <form action="/web/{{ $web->id }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" value="Delete"
                                        class="btn btn-light btn-outline-danger text-dark btn-sm btn-block">
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>package</th>
                        <th>price</th>
                        <th style="display: none">&nbsp;</th>
                        <th style="display: none">&nbsp;</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
    @include('partials.dataTableScripts')
@endsection
