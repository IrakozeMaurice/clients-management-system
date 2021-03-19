@extends('layouts.app')
@section('pageTitle', 'Expenses Report')
@section('content')
    <div class="col-lg-10">
        <h1 class="h5">Expenses Report</h1>
        <form action="/reports/expenses" method="post" class="row">
            @csrf
            <div class="col-lg-5 align-self-center">
                <label for="from">From</label>
                <input type="text" name="from" id="from" class="date form-control">
            </div>
            <div class="col-lg-5 align-self-center">
                <label for="to">To</label>
                <input type="text" name="to" id="to" class="date form-control">
            </div>
            <div class="col-lg-2 align-self-center">
                <button type="submit" class="btn btn-primary btn-sm btn-block mt-4">Go</button>
            </div>
        </form>
        <hr>
        <div>
            <a class="btn btn-primary btn-sm" href="{{ URL::to('/reports/expenses/pdf') }}">Export to PDF</a><br><br>
            <table id="tableSearch" class="table table-bordered table-hover table-sm small w-100">
                <thead>
                    <tr>
                        <th class="text-center">Id</th>
                        <th class="text-center">Category</th>
                        <th class="text-center">Name</th>
                        <th class="text-center">Description</th>
                        <th class="text-center">Amount</th>
                        <th class="text-center">Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($expenses as $expense)
                        <tr>
                            <td><a href="/expenses/{{ $expense->id }}">{{ $expense->id }}</a></td>
                            <td>{{ $expense->expenseCategory->categoryName }}</td>
                            <td>{{ $expense->name }}</td>
                            <td>{{ $expense->description }}</td>
                            <td>{{ number_format($expense->amount, 0, null, ',') }}</td>
                            <td>{{ $expense->created_at }}</td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr style="display: none">
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
    @include('partials.datePickerScript')
    @include('partials.dataTableScripts')
@endsection
