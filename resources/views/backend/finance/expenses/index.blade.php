@extends('layouts.app')
@section('pageTitle', 'Expenses')
@section('content')
    <div class="col-lg-8">
        <a href="expenses/create" class="btn btn-dark btn-sm" style="float: right;"><i class="fas fa-plus text-white"></i>
            New</a>
        <h1 class="h4">Expenses</h1>
        <hr>
        <div>
            <table id="tableSearch" class="table table-bordered table-hover table-sm small w-100">
                <thead>
                    <tr>
                        <th>Category</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Amount</th>
                        <th style="display: none">&nbsp;</th>
                        <th style="display: none">&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($expenses as $expense)
                        <tr>
                            <td><a href="/expenses/{{ $expense->id }}">{{ $expense->expenseCategory->categoryName }}</a>
                            </td>

                            <td><a href="/expenses/{{ $expense->id }}">{{ $expense->name }}</a></td>

                            <td><a href="/expenses/{{ $expense->id }}">{{ $expense->description }}</a></td>

                            <td><a href="/expenses/{{ $expense->id }}">{{ $expense->amount }}</a></td>

                            <td class="text-center"><a href="/expenses/{{ $expense->id }}/edit"><button
                                        class="btn btn-light btn-outline-success text-dark btn-sm">Edit</button></a>
                            </td>
                            <td class="text-center">
                                <form action="/expenses/{{ $expense->id }}" method="POST" style="display: inline;">
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
                        <th>Category</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Amount</th>
                        <th style="display: none">&nbsp;</th>
                        <th style="display: none">&nbsp;</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
    @include('partials.dataTableScripts')
@endsection
