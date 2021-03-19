@extends('layouts.app')
@section('pageTitle', 'New order')
@section('content')
    <div class="col-lg-6">
        <form action="/orders" method="POST" enctype="multipart/form-data">
            @csrf
            <div>
                <select name="client_id" id="client" class="form-control">
                    <option>select client</option>
                    @foreach ($clients as $client)
                        <option value="{{ $client->id }}">{{ $client->id }}. {{ $client->firstname }}
                            {{ $client->lastaname }}
                        </option>
                    @endforeach
                </select>
            </div><br>
            <div>
                <select name="service" id="service" class="form-control" onchange="displayForm()">
                    <option>select service</option>
                    @foreach ($services = getAllServices() as $service)
                        <option value="{{ $service->name }}">{{ $service->name }}</option>
                    @endforeach
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
                    <input type="text" name="domain_name_hosting" placeholder="domain name" class="form-control">
                </div>
                <br>
                <div>
                    <input type="text" name="ns_one_hosting" placeholder="name server one" class="form-control">
                </div>
                <br>
                <div>
                    <input type="text" name="ns_two_hosting" placeholder="name server two" class="form-control">
                </div>
                <br>
                <div>
                    <input type="text" name="ns_three_hosting" placeholder="name server three" class="form-control">
                </div>
                <br>
                <div>
                    <input type="text" name="ns_four_hosting" placeholder="name server four" class="form-control">
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
                    <input type="text" name="domain_name_domain" placeholder="domain name" class="form-control">
                </div>
                <br>
                <div>
                    <input type="text" name="ns_one_domain" placeholder="name server one" class="form-control">
                </div>
                <br>
                <div>
                    <input type="text" name="ns_two_domain" placeholder="name server two" class="form-control">
                </div>
                <br>
                <div>
                    <input type="text" name="ns_three_domain" placeholder="name server three" class="form-control">
                </div>
                <br>
                <div>
                    <input type="text" name="ns_four_domain" placeholder="name server four" class="form-control">
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
                <button type="submit" class="btn btn-dark btn-sm">Save Order</button>
            </div>
        </form>
    </div>
    <script type="application/javascript">
        function displayForm() {
            document.getElementById("Hosting").style.display = 'none';
            document.getElementById("Domain").style.display = 'none';
            document.getElementById("Web").style.display = 'none';
            var service = document.getElementById("service").value;
            document.getElementById(service).style.display = 'block';
        }

    </script>
@endsection
