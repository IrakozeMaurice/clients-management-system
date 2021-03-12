@extends('layouts.app')
@section('pageTitle', 'Clients Report')
@section('content')
    <div class="col-lg-10">
        <h1 class="h5">Clients Report</h1>
        <form action="/reports/clients" method="post" class="row">
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
            <a class="btn btn-primary" href="{{ URL::to('/reports/clients/pdf') }}">Export to PDF</a><br><br>
            <table id="tableSearch" class="table table-bordered table-hover table-sm small w-100">
                <thead>
                    <tr>
                        <th class="text-center">Id</th>
                        <th class="text-center">Firstname</th>
                        <th class="text-center">Lastname</th>
                        <th class="text-center">Email</th>
                        <th class="text-center">Phone</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($clients as $client)
                        <tr>
                            <td><a href="/clients/{{ $client->id }}">{{ $client->id }}</a></td>
                            <td>{{ $client->firstname }}</td>
                            <td>{{ $client->lastname }}</td>
                            <td>{{ $client->email }}</td>
                            <td>{{ $client->phone }}</td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th class="text-center"></th>
                        <th class="text-center"></th>
                        <th class="text-center"></th>
                        <th class="text-center"></th>
                        <th class="text-center"></th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
    @include('partials.datePickerScript')
    @include('partials.dataTableScripts')
@endsection
