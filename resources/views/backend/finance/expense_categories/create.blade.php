@extends('layouts.app')
@section('pageTitle', 'New Expense Category')
@section('content')
    <div class="col-lg-6">
        <h1 class="h4">New Expense Category</h1>
        <form action="/expenseCategories" method="POST">
            @csrf
            <div>
                <input type="text" name="categoryName" placeholder="category name" class="form-control">
            </div>
            <br>
            <div>
                <textarea name="description" placeholder="description" class="form-control"></textarea>
            </div>
            <br>
            <div>
                <button type="submit" class="px-4 btn btn-dark btn-sm">Add</button>
            </div>
        </form><br>
    </div>
@endsection
