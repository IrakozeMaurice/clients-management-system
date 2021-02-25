@extends('layouts.app')
@section('pageTitle', 'Orders')
@section('assets')
    <link href="{{ asset('css/myStyles.css') }}" rel="stylesheet">
@endsection
@section('content')
    <div class="container">
        <a href="/orders/create" class="btn btn-primary" style="float: right;">New order</a>
        <h1>Orders</h1>
        <hr>
        <div class="row">
            <div>
                <table class="table">
                    <tr>
                        <th>order ID</th>
                        <th>client names</th>
                        <th>service</th>
                        <th>package</th>
                        <th>extension</th>
                        <th>domain name</th>
                        <th>name server</th>
                        <th>price</th>
                        <th>registration date</th>
                        <th>expiration date</th>
                        <th colspan="2">Action</th>
                    </tr>
                    @foreach ($orders as $order)
                        {{-- <a href="/orders/{{ $order->id }}"> --}}
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
                            <td><a href="/orders/{{ $order->id }}">{{ $order->registration_date }}</td>
                            <td><a href="/orders/{{ $order->id }}">{{ $order->expiration_date }}</td>
                            <td><a href="/orders/{{ $order->id }}/edit"><button
                                        class="btn btn-success">Edit</button></a>
                            </td>
                            <td>
                                <form action="/orders/{{ $order->id }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" value="Delete" class="btn btn-danger">
                                </form>
                            </td>
                        </tr>
                        {{-- </a> --}}
                        {{-- <li><a href="/orders/{{ $order->id }}">{{ $order->id }} by
                                    {{ $order->client->firstname }}</a>
                            </li> --}}

                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection
