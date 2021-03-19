@extends('layouts.app')
@section('pageTitle', 'Orders')
@section('content')
    <div class="col-lg-12">
        <a href="/orders/create" class="btn btn-dark btn-sm" style="float: right;"><i class="fas fa-plus text-white"></i>
            New order</a>
        <h1 class="h4">Orders</h1>
        <hr>
        <div>
            <table id="tableSearch" class="table table-responsive table-bordered table-hover table-sm small w-100">
                <thead>
                    <tr>
                        <th class="text-center">Id</th>
                        <th class="text-center">Client Names</th>
                        <th class="text-center">Service</th>
                        <th class="text-center">Package</th>
                        <th class="text-center">Extension</th>
                        <th class="text-center">Price</th>
                        <th class="text-center">Expiration date</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        <tr>
                            <td class="text-center"><a href="/orders/{{ $order->id }}">{{ $order->id }}</td>
                            <td>{{ $order->client->firstname }}
                                {{ $order->client->lastname }}</td>
                            <td>{{ $order->service }}</td>
                            <td>{{ $order->package }}</td>
                            <td>{{ $order->extension }}</td>
                            <td>{{ number_format($order->price, 0, null, ',') }}</td>
                            <td>{{ $order->expiration_date }}</td>
                            <td>
                                <a href="/orders/{{ $order->id }}/edit"
                                    class="btn btn-light btn-outline-success text-dark btn-sm">Edit</a>
                                <form action="/orders/{{ $order->id }}" method="POST" style="display: inline;"
                                    class="col-lg-6">
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
                    <th class="text-center"></th>
                    <th class="text-center"></th>
                    <th class="text-center"></th>
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
    @include('partials.dataTableScripts')
@endsection
