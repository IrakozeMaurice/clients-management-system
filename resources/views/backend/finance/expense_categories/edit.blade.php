@extends('layouts.app')
@section('pageTitle', 'edit expense category')
@section('content')
    <div class="col-lg-6">
        <h1 class="h4">Edit expense category</h1>
        <form action="/expenseCategories/{{ $expenseCategory->id }}" method="POST">
            @csrf
            @method('PATCH')
            <div>
                <label for="categoryName">Category Name</label>
                <input type="text" name="categoryName" id="categoryName" value="{{ $expenseCategory->categoryName }}"
                    class="form-control">
            </div>
            <br>
            <div>
                <textarea name="description" class="form-control">{{ $expenseCategory->description }}</textarea>
            </div>
            <br>
            <div>
                <input type="submit" class="btn btn-dark btn-sm" value="Update category">
            </div>
        </form><br>
    </div>
@endsection
