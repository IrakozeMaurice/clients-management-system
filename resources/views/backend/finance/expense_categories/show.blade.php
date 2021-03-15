@extends('layouts.app')
@section('pageTitle', 'expense category info')
@section('content')
    <div class="col-lg-6">
        <h1 class="h4">Expense category information</h1>
        <hr>
        <small>Category Name: {{ $expenseCategory->categoryName }}</small><br>
        <small>Description: {{ $expenseCategory->description }}</small><br><br>
        <a href="/expenseCategories/{{ $expenseCategory->id }}/edit"><button
                class="btn btn-light btn-outline-success text-dark btn-sm">Edit</button></a>
        <form action="/expenseCategories/{{ $expenseCategory->id }}" method="POST" style="display: inline;">
            @csrf
            @method('DELETE')
            <a href="#"><button class="btn btn-light btn-outline-danger text-dark btn-sm">Delete</button></a>
        </form>
    </div>
@endsection
