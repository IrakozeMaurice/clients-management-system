@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="col-lg-6">
            <form action="/orders" method="POST" enctype="multipart/form-data">
                @csrf
                <div>
                    <select name="client_id" id="client" class="form-control">
                        <option>select client</option>
                        @foreach ($clients as $client)
                            <option value="{{ $client->id }}">{{ $client->firstname }} {{ $client->lastaname }}
                            </option>
                        @endforeach
                    </select>
                </div><br>
                <div>
                    <select name="service" id="service" class="form-control" onchange="displayForm()">
                        <option>select service</option>
                        @foreach ($services as $service)
                            <option value="{{ $service->name }}">{{ $service->name }}</option>
                        @endforeach
                    </select>
                </div>
                <hr>
                <div id="Hosting" style="display: none">
                    <div>
                        <label for="package">package</label>
                        <select name="package_hosting" id="package" class="form-control">
                            <option value="Bronze">Bronze</option>
                            <option value="Gold">Gold</option>
                            <option value="Diamond">Diamond</option>
                            <option value="Crystal">Crystal</option>
                            <option value="Unlimited">Unlimited</option>
                        </select>
                    </div><br>
                    <div>
                        <input type="text" name="name_server_hosting" placeholder="name server" class="form-control">
                    </div>
                    <br>
                </div>
                <div id="Domain" style="display: none">
                    <div>
                        <label for="extension">extension</label>
                        <select name="extension" id="extension" class="form-control">
                            <option value=".com">.com</option>
                            <option value=".rw">.rw</option>
                            <option value=".org">.org</option>
                            <option value=".net">.net</option>
                            <option value=".biz">.biz</option>
                            <option value=".co.rw">.co.rw</option>
                            <option value=".ac.rw">.ac.rw</option>
                            <option value=".org.rw">.org.rw</option>
                            <option value=".ai">.ai</option>
                            <option value=".tv">.tv</option>
                            <option value=".africa">.africa</option>
                            <option value=".xyz">.xyz</option>
                            <option value=".io">.io</option>
                        </select>
                    </div><br>
                    <div>
                        <input type="text" name="domain_name" placeholder="domain name" class="form-control">
                    </div>
                    <br>
                    <div>
                        <input type="text" name="name_server_domain" placeholder="name server" class="form-control">
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
                    <button type="submit" class="btn btn-primary">Save Order</button>
                </div>
            </form>
        </div>
    </div>
    <script type="application/javascript">
        function displayForm() {
            var service = document.getElementById("service").value;
            document.getElementById(service).style.display = 'block';
        }

    </script>
@endsection
