@include('partials.header')
@auth
    @include('partials.sidenav')
@endauth
<div class="row">
    @include('partials.menu')
    <div class="col-lg-12 container">
        <div class="container">
            @include('partials.errors')
        </div>
        {{-- content section --}}
        <div class="row container-fluid">
            @yield('content')
        </div>
        {{-- end content section --}}
    </div>
</div>
@include('partials.footer')
