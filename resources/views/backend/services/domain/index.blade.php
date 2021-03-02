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
                        <th>extension</th>
                        <th>price</th>
                        <th style="display: none">&nbsp;</th>
                        <th style="display: none">&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($domains as $domain)
                        <tr>
                            <td><a href="/domains/{{ $domain->id }}">{{ $domain->extension }}</td>
                            <td><a href="/domains/{{ $domain->id }}">{{ $domain->price }}</td>

                            <td class="text-center"><a href="/domains/{{ $domain->id }}/edit"><button
                                        class="btn btn-light btn-outline-success text-dark btn-sm btn-block">Edit</button></a>
                            </td>
                            <td class="text-center">
                                <form action="/domains/{{ $domain->id }}" method="POST" style="display: inline;">
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
                        <th>extension</th>
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
