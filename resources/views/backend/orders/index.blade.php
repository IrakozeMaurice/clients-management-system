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
                        <th>order ID</th>
                        <th>client names</th>
                        <th>service</th>
                        <th>package</th>
                        <th>extension</th>
                        <th>domain name</th>
                        <th>name server</th>
                        <th>price</th>
                        {{-- <th>registration date</th> --}}
                        <th>expiration date</th>
                        <th style="display: none">&nbsp;</th>
                        <th style="display: none">&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        <tr>
                            <td><a href="/orders/{{ $order->id }}">{{ $order->id }}</td>
                            <td><a href="/orders/{{ $order->id }}">{{ $order->client->firstname }}
                                    {{ $order->client->lastname }}</td>
                            <td><a href="/orders/{{ $order->id }}">{{ $order->service }}</td>
                            <td><a href="/orders/{{ $order->id }}">{{ $order->package }}</td>
                            <td><a href="/orders/{{ $order->id }}">{{ $order->extension }}</td>
                            <td><a href="/orders/{{ $order->id }}">{{ $order->domain_name }}</td>
                            <td><a href="/orders/{{ $order->id }}">{{ $order->name_server }}</td>
                            <td><a href="/orders/{{ $order->id }}">{{ $order->price }}</td>
                            {{-- <td><a href="/orders/{{ $order->id }}">{{ $order->registration_date }}</td> --}}
                            <td><a href="/orders/{{ $order->id }}">{{ $order->expiration_date }}</td>
                            <td>
                                <a href="/orders/{{ $order->id }}/edit"
                                    class="btn btn-light btn-outline-success text-dark btn-sm">Edit</a>
                            </td>
                            <td>
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
                    <th>order ID</th>
                    <th>client names</th>
                    <th>service</th>
                    <th>package</th>
                    <th>extension</th>
                    <th>domain name</th>
                    <th>name server</th>
                    <th>price</th>
                    {{-- <th>registration date</th> --}}
                    <th>expiration date</th>
                    <th style="display: none">&nbsp;</th>
                    <th style="display: none">&nbsp;</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
    @include('partials.dataTableScripts')
@endsection
