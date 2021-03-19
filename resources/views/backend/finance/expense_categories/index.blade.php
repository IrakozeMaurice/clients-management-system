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
                        <th class="text-center">Id</th>
                        <th class="text-center">Category Name</th>
                        <th class="text-center">Description</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($expenseCategories as $expenseCategory)
                        <tr>
                            <td class="text-center"><a
                                    href="/expenseCategories/{{ $expenseCategory->id }}">{{ $expenseCategory->id }}</a>
                            </td>
                            <td>{{ $expenseCategory->categoryName }}</td>
                            <td>{{ $expenseCategory->description }}</td>
                            <td class="text-center"><a href="/expenseCategories/{{ $expenseCategory->id }}/edit"><button
                                        class="btn btn-light btn-outline-success text-dark btn-sm">Edit</button></a>
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
