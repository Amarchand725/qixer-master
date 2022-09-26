<li class="@if(request()->is('seller/orders/active-orders')) active @endif">
    <a href="{{ route('seller.active.orders') }}">{{ __('Active') }}
        <span class="numbers">
            @if (!empty($active_orders)){{ $active_orders->count() }}@endif
        </span>
    </a>
</li>

<li class="@if(request()->is('seller/orders/deliver-orders')) active @endif">
    <a href="{{ route('seller.deliver.orders') }}">{{ __('Delivered') }}
        <span class="numbers">
            @if (!empty($deliver_orders)){{ $deliver_orders->count() }}@endif
        </span>
    </a>
</li>

<li class="@if(request()->is('seller/orders/complete-orders')) active @endif">
    <a href="{{ route('seller.complete.orders') }}">{{ __('Completed') }}
        <span class="numbers">
            @if (!empty($complete_orders)){{ $complete_orders->count() }}@endif
        </span>
    </a>
</li>

<li class="@if(request()->is('seller/orders/cancel-orders')) active @endif">
    <a href="{{ route('seller.cancel.orders') }}">{{ __('Cancelled') }}
        <span class="numbers">
            @if (!empty($cancel_orders)){{ $cancel_orders->count() }}@endif
        </span>
    </a>
</li>

<li class="@if(request()->is('seller/orders')) active @endif">
    <a href="{{ route('seller.orders') }}">{{ __('All') }}
        <span class="numbers">
            @if (!empty($orders)){{ $orders->count() }}@endif
        </span>
    </a>
</li>