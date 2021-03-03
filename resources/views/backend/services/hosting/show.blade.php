@extends('layouts.app')
@section('pageTitle', 'package info')
@section('content')
    <div class="col-lg-6">
        <h1 class="h4">package information</h1>
        <hr>
        <h4>package name: {{ $package->package_name }}</h4>
        <small>disc space: {{ $package->disc_space }}</small><br>
        <small>bandwidth: {{ $package->bandwidth }}</small><br>
        <small>email accounts: {{ $package->email_accounts }}</small><br>
        <small>parked domains: {{ $package->parked_domains }}</small><br>
        <small>subdomains: {{ $package->subdomain }}</small><br>
        <small>ftp accounts: {{ $package->ftp_accounts }}</small><br>
        <small>price: {{ $package->price }}</small><br>
        <br>
        <a href="/hostings/{{ $package->id }}/edit"><button
                class="btn btn-light btn-outline-success text-dark btn-sm">Edit</button></a>
        <form action="/hostings/{{ $package->id }}" method="POST" style="display: inline;">
            @csrf
            @method('DELETE')
            <a href="#"><button class="btn btn-light btn-outline-danger text-dark btn-sm">Delete</button></a>
        </form>
    </div>
@endsection
