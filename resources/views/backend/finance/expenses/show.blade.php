@extends('layouts.app')
@section('pageTitle', 'expense info')
@section('content')
    <div class="col-lg-6">
        <h1 class="h4">Expense information</h1>
        <hr>
        <small>Expense Category: {{ $expense->expenseCategory->categoryName }}</small><br>
        <small>Expense name: {{ $expense->name }}</small><br>
        <small>Description: {{ $expense->description }}</small><br>
        <small>Amount: {{ $expense->amount }}</small><br>
        <br>
        <a href="/expenses/{{ $expense->id }}/edit"><button
                class="btn btn-light btn-outline-success text-dark btn-sm">Edit</button></a>
        <form action="/expenses/{{ $expense->id }}" method="POST" style="display: inline;">
            @csrf
            @method('DELETE')
            <a href="#"><button class="btn btn-light btn-outline-danger text-dark btn-sm">Delete</button></a>
        </form>
    </div>
@endsection
