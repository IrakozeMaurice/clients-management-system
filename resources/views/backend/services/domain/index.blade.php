@extends('layouts.app')
@section('pageTitle', 'Domains')
@section('content')
    <div class="col-lg-8">
        <a href="/domains/create" class="btn btn-dark btn-sm" style="float: right;"><i class="fas fa-plus text-white"></i>
            New domain</a>
        <h1 class="h4">Domains</h1>
        <hr>
        <div>
            <table id="tableSearch" class="table table-bordered table-hover table-lg small w-100">
                <thead>
                    <tr>
                        <th class="text-center">Id</th>
                        <th class="text-center">Extension</th>
                        <th class="text-center">Price</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($domains as $domain)
                        <tr>
                            <td class="text-center"><a href="/domains/{{ $domain->id }}">{{ $domain->id }}</a></td>
                            <td>{{ $domain->extension }}</td>
                            <td>{{ number_format($domain->price, 0, null, ',') }}</td>

                            <td class="text-center"><a href="/domains/{{ $domain->id }}/edit"><button
                                        class="btn btn-light btn-outline-success text-dark btn-sm">Edit</button></a>
                                <form action="/domains/{{ $domain->id }}" method="POST" style="display: inline;">
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
