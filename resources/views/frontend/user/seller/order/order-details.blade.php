@extends('frontend.user.seller.seller-master')
@section('site-title')
    {{ __('Order Details') }}
@endsection
@section('content')
    
    <x-frontend.seller-buyer-preloader/>

    <!-- Dashboard area Starts -->
    <div class="body-overlay"></div>
    <div class="dashboard-area dashboard-padding">
        <div class="container-fluid">
            <div class="dashboard-contents-wrapper">
                <div class="dashboard-icon">
                    <div class="sidebar-icon">
                        <i class="las la-bars"></i>
                    </div>
                </div>
                @include('frontend.user.seller.partials.sidebar')
                <div class="dashboard-right">
                    @if(!empty($order_details))
                    <div class="row">

                        <div class="col-md-4">
                            <div class="single-flex-middle">
                                <div class="single-flex-middle-inner">
                                    <div class="line-charts-wrapper margin-top-40">

                                        <div class="line-top-contents">
                                            <h5 class="earning-title">{{ __('Buyer Details') }}</h5>
                                        </div>
                                        <div class="single-checbox">
                                            <div class="checkbox-inlines">
                                                <label><strong>{{ __('Name:') }} </strong>{{ $order_details->name }}</label>
                                            </div>
                                            <div class="checkbox-inlines">
                                                <label><strong>{{ __('Email:') }} </strong>{{ $order_details->email }}</label>
                                            </div>
                                            <div class="checkbox-inlines">
                                                <label><strong>{{ __('Phone:') }} </strong>{{ $order_details->phone }}</label>
                                            </div>
                                            @if($order_details->is_order_online !=1)
                                            <div class="checkbox-inlines">
                                                <label><strong>{{ __('Address:') }} </strong>{{ $order_details->address }}</label>
                                            </div>
                                            <div class="checkbox-inlines">
                                                <label><strong>{{ __('City:') }} </strong>{{ optional($order_details->service_city)->service_city }}</label>
                                            </div>
                                            <div class="checkbox-inlines">
                                                <label><strong>{{ __('Area:') }} </strong>{{ optional($order_details->service_area)->service_area  }}</label>
                                            </div>
                                            <div class="checkbox-inlines">
                                                <label><strong>{{ __('Post Code:') }} </strong>{{ $order_details->post_code }}</label>
                                            </div>
                                            <div class="checkbox-inlines">
                                                <label><strong>{{ __('Country:') }} </strong>{{ optional($order_details->service_country)->country }}</label>
                                            </div>
                                            @endif
                                        </div>

                                        @if($order_details->is_order_online !=1)
                                        <div class="line-top-contents">
                                            <h5 class="earning-title">{{ __('Date & Schedule') }}</h5>
                                        </div>
                                        <div class="single-checbox">
                                            <div class="checkbox-inlines">
                                                <label><strong>{{ __('Date:') }} </strong>{{ $order_details->date }}</label>
                                            </div>
                                            <div class="checkbox-inlines">
                                                <label><strong>{{ __('Schedule:') }} </strong>{{ $order_details->schedule }}</label>
                                            </div>
                                        </div>
                                        @endif

                                        <div class="line-top-contents">
                                            <h5 class="earning-title">{{ __('Amount Details') }}</h5>
                                        </div>
                                        <div class="single-checbox">
                                            <div class="checkbox-inlines">
                                                <label><strong>{{ __('Package Fee:') }} </strong>{{ float_amount_with_currency_symbol($order_details->package_fee) }}</label>
                                            </div>
                                            <div class="checkbox-inlines">
                                                <label><strong>{{ __('Extra Service:') }} </strong>{{ float_amount_with_currency_symbol($order_details->extra_service) }}</label>
                                            </div>
                                            <div class="checkbox-inlines">
                                                <label><strong>{{ __('Sub Total:') }} </strong>{{ float_amount_with_currency_symbol($order_details->sub_total) }}</label>
                                            </div>
                                            <div class="checkbox-inlines">
                                                <label><strong>{{ __('Tax:') }} </strong>{{ float_amount_with_currency_symbol($order_details->tax) }}</label>
                                            </div>
                                            @if(!empty($order_details->coupon_amount))
                                            <div class="checkbox-inlines">
                                                <label><strong>{{ __('Coupon Amount:') }} </strong>{{ float_amount_with_currency_symbol($order_details->coupon_amount) }}</label>
                                            </div>
                                            @endif
                                            <div class="checkbox-inlines">
                                                <label><strong>{{ __('Total:') }} </strong>{{ float_amount_with_currency_symbol($order_details->total) }}</label>
                                            </div>
                                            <div class="checkbox-inlines">
                                                <label><strong>{{ __('Admin Charge:') }} </strong>{{ float_amount_with_currency_symbol($order_details->commission_amount) }}</label>
                                            </div>
                                            <div class="checkbox-inlines">
                                                <label><strong>{{ __('Payment Gateway:') }} </strong>{{ __(ucwords(str_replace("_", " ", $order_details->payment_gateway))) }}</label>
                                            </div>
                                            <div class="checkbox-inlines">
                                                <label><strong>{{ __('Payment Status:') }} </strong>{{ __(ucfirst($order_details->payment_status)) }}</label>
                                            </div>
                                        </div>

                                        <div class="line-top-contents">
                                            <h5 class="earning-title">{{ __('Order Status') }}</h5>
                                        </div>
                                        <div class="single-checbox">
                                            <div class="checkbox-inlines">
                                                <label><strong>{{ __('Order Status:') }} </strong>
                                                    @if ($order_details->status == 0) <span>{{ __('Pending') }}</span>@endif
                                                    @if ($order_details->status == 1) <span>{{ __('Active') }}</span>@endif
                                                    @if ($order_details->status == 2) <span>{{ __('Completed') }}</span>@endif
                                                    @if ($order_details->status == 3) <span>{{ __('Delivered') }}</span>@endif
                                                    @if ($order_details->status == 4) <span>{{ __('Cancelled') }}</span>@endif
                                                </label>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-8">

                            <div class="single-flex-middle">
                                <div class="single-flex-middle-inner">
                                    <div class="line-charts-wrapper oreder_details_rtl margin-top-40">
                                        <div class="line-top-contents">
                                            <h5 class="earning-title">{{ __('Include Details') }}</h5>
                                        </div>
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>{{ __('Title') }}</th>
                                                    @if($order_details->is_order_online !=1)
                                                    <th>{{ __('Unit Price') }}</th>
                                                    <th>{{ __('Quantity') }}</th>
                                                    <th>{{ __('Total') }}</th>
                                                    @endif
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php $package_fee =0; @endphp
                                                @foreach($order_includes as $include)
                                                <tr>
                                                    <td>{{ $include->title }}</td>
                                                    @if($order_details->is_order_online !=1)
                                                    <td>{{ float_amount_with_currency_symbol($include->price) }}</td>
                                                    <td>{{ $include->quantity }}</td>
                                                    <td>{{ float_amount_with_currency_symbol($include->price * $include->quantity) }}</td>
                                                    @php $package_fee += $include->price * $include->quantity @endphp
                                                   @endif
                                                </tr>
                                                @endforeach
                                                <tr>
                                                    @if($order_details->is_order_online !=1)
                                                    <td colspan="3"><strong>{{ __('Package Fee') }}</strong></td>
                                                    <td><strong>{{ float_amount_with_currency_symbol($package_fee) }}</strong></td>
                                                    @else
                                                        <td colspan="3"><strong>{{ __('Package Fee') .float_amount_with_currency_symbol($order_details->package_fee)}}</strong></td>
                                                    @endif
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            
                            @if($order_additionals->count() >= 1)
                            <div class="single-flex-middle">
                                <div class="single-flex-middle-inner">
                                    <div class="line-charts-wrapper oreder_details_rtl margin-top-40">
                                        <div class="line-top-contents">
                                            <h5 class="earning-title">{{ __('Additional Details') }}</h5>
                                        </div>
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>{{ __('Title') }}</th>
                                                    <th>{{ __('Unit Price') }}</th>
                                                    <th>{{ __('Quantity') }}</th>
                                                    <th>{{ __('Total') }}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php $extra_service =0; @endphp
                                                @foreach($order_additionals as $additional)
                                                <tr>
                                                    <td>{{ $additional->title }}</td>
                                                    <td>{{ float_amount_with_currency_symbol($additional->price) }}</td>
                                                    <td>{{ $additional->quantity }}</td>
                                                    <td>{{ float_amount_with_currency_symbol($additional->price * $additional->quantity) }}</td>
                                                    @php $extra_service += $additional->price * $additional->quantity @endphp
                                                </tr>
                                                @endforeach
                                                <tr>
                                                    <td colspan="3"><strong>{{ __('Extra Service') }}</strong></td>
                                                    <td><strong>{{ float_amount_with_currency_symbol($extra_service) }}</strong></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            @endif
                            
                            @if(!empty($order_details->coupon_code))
                            <div class="single-flex-middle">
                                <div class="single-flex-middle-inner">
                                    <div class="line-charts-wrapper oreder_details_rtl margin-top-40">
                                        <div class="line-top-contents">
                                            <h5 class="earning-title">{{ __('Coupon Details') }}</h5>
                                        </div>
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>{{ __('Coupon Code') }}</th>
                                                    <th>{{ __('Coupon Type') }}</th>
                                                    <th>{{ __('Coupon Amount') }}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>{{ $order_details->coupon_code }}</td>
                                                    <td>{{ __($order_details->coupon_type) }}</td>
                                                    <td>
                                                        @if($order_details->coupon_amount >0)
                                                        {{ float_amount_with_currency_symbol($order_details->coupon_amount) }}
                                                        @endif
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            @endif

                        </div>

                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
