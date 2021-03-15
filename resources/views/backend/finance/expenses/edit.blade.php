@extends('layouts.app')
@section('pageTitle', 'edit expense')
@section('content')
    <div class="col-lg-6">
        <h1 class="h4">Edit expense</h1>
        <form action="/expenses/{{ $expense->id }}" method="POST">
            @csrf
            @method('PATCH')
            <div>
                <label for="expenseCategory">Expense category</label>
                <select name="expense_category_id" id="expenseCategory" class="form-control">
                    <option value="{{ $expense->expenseCategory->id }}" selected>
                        {{ $expense->expenseCategory->categoryName }}
                    </option>
                </select>
            </div>
            <br>
            <div>
                <label for="name">Category Name</label>
                <input type="text" name="name" id="name" value="{{ $expense->name }}" class="form-control">
            </div>
            <br>
            <div>
                <textarea name="description" class="form-control">{{ $expense->description }}</textarea>
            </div>
            <br>
            <div>
                <label for="amount">Amount</label>
                <input type="number" name="amount" id="amount" value="{{ $expense->amount }}" class="form-control">
            </div>
            <br>
            <div>
                <input type="submit" class="btn btn-dark btn-sm" value="Update category">
            </div>
        </form><br>
    </div>
@endsection
