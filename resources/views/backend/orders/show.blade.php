@extends('layouts.app')
@section('pageTitle', 'order info')
@section('content')
    <div class="col-lg-6">
        <h1 class="h4">order information</h1>
        <hr>
        <small>names: {{ $order->client->firstname }} {{ $order->client->lastname }}</small><br>
        <small>service: {{ $order->service }}</small><br>
        <small>package: {{ $order->package }}</small><br>
        <small>domain name: {{ $order->domain_name }}</small><br>
        <small>extension: {{ $order->extension }}</small><br>
        <small>name servers:
            <ol>
                <li>{{ $order->ns_one }}</li>
                <li>{{ $order->ns_two }}</li>
                <li>{{ $order->ns_three }}</li>
                <li>{{ $order->ns_four }}</li>
            </ol>
        </small><br>
        <small>price: {{ $order->price }}</small><br>
        <small>registration date: {{ $order->registration_date }}</small><br>
        <small>expiration date: {{ $order->expiration_date }}</small><br>
        <br>
        <a href="/orders/{{ $order->id }}/edit"><button
                class="btn btn-light btn-outline-success text-dark btn-sm">Edit</button></a>
        <form action="/orders/{{ $order->id }}" method="POST" style="display: inline;">
            @csrf
            @method('DELETE')
            <a href="#"><button class="btn btn-light btn-outline-danger text-dark btn-sm">Delete</button></a>
        </form>
    </div>
@endsection
