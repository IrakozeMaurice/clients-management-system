@extends('layouts.app')
@section('pageTitle', 'update order')
@section('content')
    <div class="col-lg-12">
        <h1 class="h4">Edit Order</h1>
        <form action="/orders/{{ $order->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div>
                <select name="client_id" id="client" class="form-control">
                    <option value="{{ $order->client->id }}" selected>{{ $order->client->firstname }}
                        {{ $order->client->lastname }}> </option>
                </select>
            </div><br>
            <div>
                <select name="service" id="service" class="form-control">
                    <option value="{{ $order->service }}" selected>{{ $order->service }}</option>
                </select>
            </div>
            <hr>
            <div id="Hosting" style="display: none">
                <div>
                    <label for="package">package</label>
                    <select name="package_hosting" id="package" class="form-control">
                        @foreach ($packages = getHostingPackages() as $package)
                            <option value="{{ $package->package_name }}">{{ $package->package_name }}</option>
                        @endforeach
                    </select>
                </div><br>
                <div>
                    <input type="text" name="name_server_hosting" value="{{ $order->name_server }}" class="form-control">
                </div>
                <br>
            </div>
            <div id="Domain" style="display: none">
                <div>
                    <label for="extension">extension</label>
                    <select name="extension" id="extension" class="form-control">
                        @foreach ($extensions = getDomainExtensions() as $extension)
                            <option value="{{ $extension->extension }}">{{ $extension->extension }}</option>
                        @endforeach
                    </select>
                </div><br>
                <div>
                    <input type="text" name="domain_name" value="{{ $order->domain_name }}" class="form-control">
                </div>
                <br>
                <div>
                    <input type="text" name="name_server_domain" value="{{ $order->name_server }}" class="form-control">
                </div>
                <br>
            </div>
            <div id="Web" style="display: none">
                <div>
                    <label for="package_name">package</label>
                    <select name="package_web" id="package_name" class="form-control">
                        <option value="personal">Personal</option>
                        <option value="business">Business</option>
                    </select>
                </div><br>
            </div>
            <div>
                <button type="submit" class="btn btn-dark">Update Order</button>
            </div>
        </form><br>
    </div>
    <script type="application/javascript">
        var service = document.getElementById("service").value;
        document.getElementById(service).style.display = 'block';

    </script>
@endsection
