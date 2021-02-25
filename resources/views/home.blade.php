@include('partials.header')
@include('partials.menu')
@section('pageTitle', 'Dashboard')
    <div class="row justify-content-center">
        @include('partials.sidenav')
        <div class="col-lg-9">
            {{-- cards section --}}
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card border-left-dark shadow h-100">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">
                                        clients
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        40
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-users fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card border-left-dark shadow h-100">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">
                                        orders
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        40
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-cart-plus fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card border-left-dark shadow h-100">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">
                                        services
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        3
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-cogs fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- end of cards section --}}

            {{-- content section --}}
            <div class="row">
                @yield('content')
            </div>
            {{-- end content section --}}
        </div>
    </div>
    @include('partials.footer')
