@extends('layouts.app')
@section('pageTitle', 'Orders Report')
@section('content')
    <div class="col-lg-12">
        <h1 class="h4">Orders Report</h1>
        <hr>
        <form action="/reports/orders" method="post" class="row">
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
            <a class="btn btn-primary btn-sm" href="{{ URL::to('/reports/orders/pdf') }}">Export to PDF</a><br><br>
            <table id="tableSearch" class="table table-bordered table-hover table-sm small w-100">
                <thead>
                    <tr>
                        <th>order ID</th>
                        <th>client names</th>
                        <th>service</th>
                        <th>package</th>
                        <th>extension</th>
                        <th>domain name</th>
                        <th>price</th>
                        <th>expiration date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        <tr>
                            <td><a href="/orders/{{ $order->id }}">{{ $order->id }}</td>
                            <td>{{ $order->client->firstname }}
                                {{ $order->client->lastname }}</td>
                            <td>{{ $order->service }}</td>
                            <td>{{ $order->package }}</td>
                            <td>{{ $order->extension }}</td>
                            <td>{{ $order->domain_name }}</td>
                            <td>{{ number_format($order->price, 0, null, ',') }}</td>
                            <td>{{ $order->expiration_date }}</td>
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
