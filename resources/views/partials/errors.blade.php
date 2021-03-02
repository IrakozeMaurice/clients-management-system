@if (session()->has('error'))
    <div class="alert alert-danger">
        <ul>
            <p>{{ session('error') }}</p>
        </ul>
    </div>
@endif
@if (session()->has('message'))
    <div class="alert alert-primary">
        <ul>
            <p>{{ session('message') }}</p>
        </ul>
    </div>
@endif
