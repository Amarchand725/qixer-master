@extends('frontend.user.seller.seller-master')
@section('site-title')
    {{ __('Cancelled Orders') }}
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
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="dashboard-settings margin-top-40">
                                <h2 class="dashboards-title">{{ __('Order Status') }}</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 margin-top-40">
                            <div class="dashboard-status-list">
                                <ul class="tabs status-order-list margin-bottom-10">
                                    
                                    @include('frontend.user.seller.partials.tab-list')

                                </ul>
                            </div>
                            <div>
                                <div class="table-responsive table-responsive--md">
                                    <table id="cancel_order_table" class="custom--table">
                                        <thead>
                                            <tr>
                                                <th> {{ __('Order ID') }} </th>
                                                <th> {{ __('Customer Name') }} </th>
                                                <th> {{ __('Service Date') }} </th>
                                                <th> {{ __('Service Time') }} </th>
                                                <th> {{ __('Order Pricing') }} </th>
                                                <th> {{ __('Order Status') }} </th>
                                                <th> {{ __('Action') }} </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($cancel_orders as $order)
                                                <tr>
                                                    <td> {{ $order->id }} </td>
                                                    <td> {{ $order->name }} </td>
                                                    <td> {{ Carbon\Carbon::parse($order->date)->format('d/m/y') }} </td>
                                                    <td> {{ $order->schedule }}</td>
                                                    <td> {{ float_amount_with_currency_symbol($order->total) }}</td>
                                                    @if ($order->status == 4) <td class="canceled"><span>{{ __('Cancelled') }}</span></td>@endif

                                                    <td data-label="Action">
                                                        <a href="{{ route('seller.order.details', $order->id) }}">
                                                            <span class="icon eye-icon" data-toggle="tooltip" data-placement="top" title="{{ __('View Details') }}">
                                                                <i class="las la-eye"></i>
                                                            </span>
                                                        </a>
                                                        <a href="#0" class="edit_status_modal" data-toggle="modal"
                                                            data-target="#editStatusModal" data-id="{{ $order->id }}">
                                                            <span class="dash-icon color-1" data-toggle="tooltip" data-placement="top" title="{{ __('Change Status') }}"> 
                                                                <i class="las la-edit"></i>
                                                            </span>
                                                        </a>
                                                        <a href="{{ route('seller.order.invoice.details',$order->id) }}">
                                                            <span class="icon print-icon" data-toggle="tooltip" data-placement="top" title="{{ __('Print Pdf') }}"> 
                                                                <i class="las la-print"></i>
                                                            </span>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="blog-pagination margin-top-55">
                                    <div class="custom-pagination mt-4 mt-lg-5">
                                        {!! $cancel_orders->links() !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--Status Modal -->
    <div class="modal fade" id="editStatusModal" tabindex="-1" role="dialog" aria-labelledby="editModal"
        aria-hidden="true">
        <form action="{{ route('seller.order.status') }}" method="post">
            <input type="hidden" id="order_id" name="order_id" >
            @csrf
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModal">{{ __('Change Status') }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="up_day_id">{{ __('Select Status') }}</label>
                            <select name="status" id="status" class="form-control nice-select">
                                <option value="">{{ __('Select Status') }}</option>
                                <option value="0">{{ __('Pending') }}</option>
                                <option value="1">{{ __('Active') }}</option>
                                <option value="2">{{ __('Completed') }}</option>
                                <option value="3">{{ __('Delivered') }}</option>
                                <option value="4">{{ __('Cancelled') }}</option>
                            </select>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Close') }}</button>
                        <button type="submit" class="btn btn-primary">{{ __('Save changes') }}</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

@endsection


@section('scripts')
    <script src="{{ asset('assets/backend/js/sweetalert2.js') }}"></script>
    <script>
        (function($) {
            "use strict";

            $(document).ready(function() {

                $(document).on('click','.edit_status_modal',function(e){
                    e.preventDefault();
                    let order_id = $(this).data('id');
                    $('#order_id').val(order_id);
                    $('.nice-select').niceSelect('update');
                });

            });

        })(jQuery);
    </script>
@endsection
