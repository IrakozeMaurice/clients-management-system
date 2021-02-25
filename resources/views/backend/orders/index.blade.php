@extends('home')
@section('pageTitle', 'Orders')
@section('content')
    <div class="col-lg-12">
        <a href="/orders/create" class="btn btn-dark btn-sm" style="float: right;"><i class="fas fa-plus text-white"></i>
            New order</a>
        <h1 class="h4">Orders</h1>
        <hr>
        <div>
            <table class="table table-hover table-sm small">
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
                                    class="btn btn-light btn-outline-success text-dark btn-sm">Edit</button></a>
                        </td>
                        <td>
                            <form action="/orders/{{ $order->id }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <input type="submit" value="Delete"
                                    class="btn btn-light btn-outline-danger text-dark btn-sm">
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
@endsection
