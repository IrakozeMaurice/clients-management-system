@extends('layouts.app')
@section('pageTitle', 'update package')
@section('content')
    <div class="col-lg-12">
        <h1 class="h4">Edit package</h1>
        <form action="/hostings/{{ $package->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div>
                <input type="text" name="package_name" value="{{ $package->package_name }}" class="form-control">
            </div>
            <br>
            <div>
                <input type="text" name="disc_space" value="{{ $package->disc_space }}" class="form-control">
            </div>
            <br>
            <div>
                <input type="text" name="bandwidth" value="{{ $package->bandwidth }}" class="form-control">
            </div>
            <br>
            <div>
                <input type="number" name="email_accounts" value="{{ $package->email_accounts }}" class="form-control">
            </div>
            <br>
            <div>
                <input type="number" name="parked_domains" value="{{ $package->parked_domains }}" class="form-control">
            </div>
            <br>
            <div>
                <input type="number" name="subdomain" value="{{ $package->subdomain }}" class="form-control">
            </div>
            <br>
            <div>
                <input type="number" name="ftp_accounts" value="{{ $package->ftp_accounts }}" class="form-control">
            </div>
            <br>
            <div>
                <input type="number" name="price" value="{{ $package->price }}" class="form-control">
            </div>
            <br>
            <div>
                <button type="submit" class="btn btn-dark">Update package</button>
            </div>
        </form><br>
    </div>
@endsection
