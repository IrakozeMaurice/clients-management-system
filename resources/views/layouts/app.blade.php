@include('partials.header')
@include('partials.menu')
<div class="row justify-content-center">
    @auth
        @include('partials.sidenav')
    @endauth
    <div class="col-lg-9">
        @include('partials.errors')
        {{-- content section --}}
        <div class="row">
            @yield('content')
        </div>
        {{-- end content section --}}
    </div>
</div>
@include('partials.footer')
