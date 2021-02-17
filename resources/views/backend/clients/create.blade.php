@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="col-lg-6">
            <h2>Create Client</h2><br>
            <form action="/clients" method="POST" enctype="multipart/form-data">
                @csrf
                <div>
                    <input type="text" name="firstname" placeholder="firstname" class="form-control">
                </div>
                <br>
                <div>
                    <input type="text" name="lastname" placeholder="lastname" class="form-control">
                </div>
                <br>
                <div>
                    <input type="email" name="email" placeholder="email address" class="form-control">
                </div>
                <br>
                <div>
                    <input type="text" name="phone" placeholder="phone number" class="form-control">
                </div>
                <br>
                <div>
                    <input type="text" name="address" placeholder="address" class="form-control">
                </div>
                <br>
                <div>
                    <input type="text" name="district" placeholder="district" class="form-control">
                </div>
                <br>
                <div>
                    <input type="text" name="city" placeholder="city" class="form-control">
                </div>
                <br>
                <div>
                    <input type="text" name="country" placeholder="country" class="form-control">
                </div>
                <br>
                <div>
                    <button type="submit" class="btn btn-primary">Add Client</button>
                </div>
            </form><br>
        </div>
    </div>
@endsection
