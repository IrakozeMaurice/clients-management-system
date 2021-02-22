@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <h4>client: {{ $order->client->firstname }} {{ $order->client->lastname }}</h4>
                <small>service: {{ $order->service }}</small><br>
                <small>package: {{ $order->package }}</small><br>
                <small>domain name: {{ $order->domain_name }}</small><br>
                <small>extension: {{ $order->extension }}</small><br>
                <small>name server: {{ $order->name_server }}</small><br>
                <small>price: {{ $order->price }}</small><br>
                <small>registration date: {{ $order->registration_date }}</small><br>
                <br>
                <a href="/orders/{{ $order->id }}/edit"><button class="btn btn-success">Edit</button></a>
                <form action="/orders/{{ $order->id }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <a href="#"><button class="btn btn-danger">Delete</button></a>
                </form>
            </div>
        </div>
    </div>
@endsection
