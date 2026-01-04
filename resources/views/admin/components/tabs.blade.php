<ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item" role="presentation">
        <a class="nav-link @if (request()->routeIs('admin.register.merchant.page')) active @endif"
            href="{{ route('admin.register.merchant.page') }}">Merchant</a>
    </li>

    <li class="nav-item" role="presentation">
        <a class="nav-link @if (request()->is('*merchant-fullfillment*')) active @endif"
            href="{{ route('admin.register.merchant.fullfillment.page') }}">Fullfillment</a>
    </li>

    <li class="nav-item" role="presentation">
        <a class="nav-link @if (request()->is('*store-admin*')) active @endif"
            href="{{ route('admin.register.store.admin.page') }}">Store Admin</a>
    </li>

    <li class="nav-item" role="presentation">
        <a class="nav-link @if (request()->is('*hub-incharge*')) active @endif"
            href="{{ route('admin.register.hub.incharge.page') }}">Hub In-charge</a>
    </li>

    <li class="nav-item" role="presentation">
        <a class="nav-link @if (request()->is('*store-incharge*')) active @endif"
            href="{{ route('admin.register.store.incharge.page') }}">Store In-charge</a>
    </li>

    <li class="nav-item" role="presentation">
        <a class="nav-link @if (request()->is('*dispatch-incharge*')) active @endif"
            href="{{ route('admin.register.dispatch.incharge.page') }}">Dispatch In-charge</a>
    </li>
</ul>
