@extends('layouts.app')
@section('pageTitle', 'New Hosting Package')
@section('content')
    <div class="col-lg-6">
        <h1 class="h4">new hosting package</h1>
        <form action="/hostings" method="POST" enctype="multipart/form-data">
            @csrf
            <div>
                <input type="text" name="package_name" placeholder="package name" class="form-control">
            </div>
            <br>
            <div>
                <input type="text" name="disc_space" placeholder="disk space" class="form-control">
            </div>
            <br>
            <div>
                <input type="text" name="bandwidth" placeholder="bandwidth" class="form-control">
            </div>
            <br>
            <div>
                <input type="number" name="email_accounts" placeholder="email accounts" class="form-control">
            </div>
            <br>
            <div>
                <input type="number" name="parked_domains" placeholder="parked domains" class="form-control">
            </div>
            <br>
            <div>
                <input type="number" name="subdomain" placeholder="subdomains" class="form-control">
            </div>
            <br>
            <div>
                <input type="number" name="ftp_accounts" placeholder="ftp accounts" class="form-control">
            </div>
            <br>
            <div>
                <input type="number" name="price" placeholder="price" class="form-control">
            </div>
            <br>
            <div>
                <button type="submit" class="btn btn-dark btn-sm">Add package</button>
            </div>
        </form><br>
    </div>
@endsection
