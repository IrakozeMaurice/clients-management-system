<div class="col-lg-3">
    <ul class="list-group">
        <li class="list-group-item text-center"><a href="#"><strong>Orders</strong></a></li>
        {{-- @if (auth()->user()->is_admin == 1) --}}
        <li class="list-group-item text-center"><a href="#"><strong>Services</strong></a></li>
        <li class="list-group-item text-center"><a href="/clients"><strong>Clients</strong></a></li>
        {{-- @endif --}}
    </ul>
</div>
