@extends('layouts.app')
@section('pageTitle', 'Dashboard')
@section('content')
    {{-- cards section --}}
    <div class="col-lg-3 col-md-4 mb-4">
        <div class="card border-left-dark shadow h-100">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">
                            clients
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            {{ getAllClients()->count() }}
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-users fa-2x text-primary-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-4 mb-4">
        <div class="card border-left-dark shadow h-100">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">
                            orders
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            {{ getAllOrders()->count() }}
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-cart-plus fa-2x text-primary-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-4 mb-4">
        <div class="card border-left-dark shadow h-100">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">
                            Projects
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            {{ getAllProjects()->count() }}
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-cogs fa-2x text-primary-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-4 mb-4">
        <div class="card border-left-dark shadow h-100">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">
                            hosting packages
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            {{ getHostingPackages()->count() }}
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-cogs fa-2x text-primary-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-4 mb-4">
        <div class="card border-left-dark shadow h-100">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">
                            domain extensions
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            {{ getDomainExtensions()->count() }}
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-cogs fa-2x text-primary-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-4 mb-4">
        <div class="card border-left-dark shadow h-100">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">
                            web packages
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            {{ getWebPackages()->count() }}
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-cogs fa-2x text-primary-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-4 mb-4">
        <div class="card border-left-dark shadow h-100">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">
                            Total Orders
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            {{ number_format(getOrdersTotal(), 0, null, ',') }}
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-euro-sign fa-2x text-primary-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-4 mb-4">
        <div class="card border-left-dark shadow h-100">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">
                            Current Month Total
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            {{ number_format(getMontlyOrdersTotal(), 0, null, ',') }}
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-euro-sign fa-2x text-primary-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    {{-- end of cards section --}}
    <div class="col-lg-12">
        <hr>
        <div class="row">
            <div class="col-lg-5">
                <ul class="list-group">
                    <li class="list-group-item bg-dark active">Expiring Domains Orders</li>
                    @foreach ($expiringDomains = getExpiringDomains() as $expiringDomain)
                        <li class="list-group-item text-left">
                            {{ $expiringDomain->expiration_date }} <span class="v-divider px-2">|</span>
                            <small><a
                                    href="/orders/{{ $expiringDomain->id }}">{{ $expiringDomain->domain_name }}{{ $expiringDomain->extension }}</a></small>
                            <span
                                class="badge badge-info badge-pill float-right px-3 py-1">{{ number_format($expiringDomain->price, 0, null, ',') }}</span>
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class="col-lg-7">
                <ul class="list-group">
                    <li class="list-group-item bg-dark active">Expiring Hosting Orders</li>
                    @foreach ($expiringHostings = getExpiringHosting() as $expiringHosting)
                        <li class="list-group-item text-left">
                            {{ $expiringHosting->expiration_date }} <span class="v-divider px-4">|</span>
                            <small><a
                                    href="/orders/{{ $expiringHosting->id }}">{{ $expiringHosting->client->firstname }}{{ $expiringHosting->client->lastname }}</a></small>
                            <span
                                class="badge badge-info badge-pill float-right px-3 py-1">{{ number_format($expiringHosting->price, 0, null, ',') }}</span>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection
