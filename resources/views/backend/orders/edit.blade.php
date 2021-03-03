@extends('layouts.app')
@section('pageTitle', 'update order')
@section('content')
    <div class="col-lg-6">
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
                    <label for="ns_one_hosting">name server one</label>
                    <input type="text" id="ns_one_hosting" name="ns_one_hosting" value="{{ $order->ns_one }}"
                        class="form-control">
                </div>
                <br>
                <div>
                    <label for="ns_two_hosting">name server two</label>
                    <input type="text" id="ns_two_hosting" name="ns_two_hosting" value="{{ $order->ns_two }}"
                        class="form-control">
                </div>
                <br>
                <div>
                    <label for="ns_three_hosting">name server three</label>
                    <input type="text" id="ns_three_hosting" name="ns_three_hosting" value="{{ $order->ns_three }}"
                        class="form-control">
                </div>
                <br>
                <div>
                    <label for="ns_four_hosting">name server four</label>
                    <input type="text" id="ns_four_hosting" name="ns_four_hosting" value="{{ $order->ns_four }}"
                        class="form-control">
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
                    <label for="ns_one_domain">name server one</label>
                    <input type="text" id="ns_one_domain" name="ns_one_domain" value="{{ $order->ns_one }}"
                        class="form-control">
                </div>
                <br>
                <div>
                    <label for="ns_two_domain">name server two</label>
                    <input type="text" id="ns_two_domain" name="ns_two_domain" value="{{ $order->ns_two }}"
                        class="form-control">
                </div>
                <br>
                <div>
                    <label for="ns_three_domain">name server three</label>
                    <input type="text" id="ns_three_domain" name="ns_three_domain" value="{{ $order->ns_three }}"
                        class="form-control">
                </div>
                <br>
                <div>
                    <label for="ns_four_domain">name server four</label>
                    <input type="text" id="ns_four_domain" name="ns_four_domain" value="{{ $order->ns_four }}"
                        class="form-control">
                </div>
                <br>
            </div>
            <div id="Web" style="display: none">
                <div>
                    <label for="package_name">package</label>
                    <select name="package_web" id="package_name" class="form-control">
                        @foreach ($packages = getWebPackages() as $package)
                            <option value="{{ $package->package_name }}">{{ $package->package_name }}</option>
                        @endforeach
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
