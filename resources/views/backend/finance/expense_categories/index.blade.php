@extends('layouts.app')
@section('pageTitle', 'Expense Categories')
@section('content')
    <div class="col-lg-8">
        <a href="expenseCategories/create" class="btn btn-dark btn-sm" style="float: right;"><i
                class="fas fa-plus text-white"></i>
            New</a>
        <h1 class="h4">Expense Categories</h1>
        <hr>
        <div>
            <table id="tableSearch" class="table table-bordered table-hover table-sm small w-100">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Category Name</th>
                        <th>Description</th>
                        <th style="display: none">&nbsp;</th>
                        <th style="display: none">&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($expenseCategories as $expenseCategory)
                        <tr>
                            <td><a href="/expenseCategories/{{ $expenseCategory->id }}">{{ $expenseCategory->id }}</a>
                            </td>
                            <td><a
                                    href="/expenseCategories/{{ $expenseCategory->id }}">{{ $expenseCategory->categoryName }}</a>
                            </td>
                            <td><a
                                    href="/expenseCategories/{{ $expenseCategory->id }}">{{ $expenseCategory->description }}</a>
                            </td>
                            <td class="text-center"><a href="/expenseCategories/{{ $expenseCategory->id }}/edit"><button
                                        class="btn btn-light btn-outline-success text-dark btn-sm">Edit</button></a>
                            </td>
                            <td class="text-center">
                                <form action="/expenseCategories/{{ $expenseCategory->id }}" method="POST"
                                    style="display: inline;">
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
                        <th>Id</th>
                        <th>Category Name</th>
                        <th>Description</th>
                        <th style="display: none">&nbsp;</th>
                        <th style="display: none">&nbsp;</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
    @include('partials.dataTableScripts')
@endsection
