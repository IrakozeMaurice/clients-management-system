@extends('layouts.app')
@section('pageTitle', 'New Expense')
@section('content')
    <div class="col-lg-6">
        <h1 class="h4">New Expense</h1>
        <form action="/expenses" method="POST">
            @csrf
            <div>
                <label for="expenseCategory">select expense category</label>
                <select name="expense_category_id" id="expenseCategory" class="form-control">
                    @foreach ($expenseCategories = getExpenseCategories() as $expenseCategory)
                        <option value="{{ $expenseCategory->id }}">{{ $expenseCategory->categoryName }}</option>
                    @endforeach
                </select>
            </div>
            <br>
            <div>
                <input type="text" name="name" placeholder="expense name" class="form-control">
            </div>
            <br>
            <div>
                <textarea name="description" placeholder="description" class="form-control"></textarea>
            </div>
            <br>
            <div>
                <input type="number" name="amount" placeholder="amount" class="form-control">
            </div>
            <br>
            <div>
                <button type="submit" class="btn btn-dark">Add</button>
            </div>
        </form><br>
    </div>
@endsection
