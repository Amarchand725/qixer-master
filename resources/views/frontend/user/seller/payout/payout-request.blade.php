@extends('frontend.user.seller.seller-master')
@section('site-title')
    {{ __('Payout Request') }}
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
                        <div class="col-xl-3 col-md-6 margin-top-30 orders-child">
                            <div class="single-orders">
                                <div class="orders-shapes">
                                    <img src="{{ asset('assets/frontend/img/static/orders-shapes.png') }}" alt="">
                                </div>
                                <div class="orders-flex-content">
                                    <div class="icon">
                                        <i class="las la-tasks"></i>
                                    </div>
                                    <div class="contents">
                                        <h2 class="order-titles"> {{ $pending_order }} </h2>
                                        <span class="order-para">{{ __('Order Pending') }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 margin-top-30 orders-child">
                            <div class="single-orders">
                                <div class="orders-shapes">
                                    <img src="{{ asset('assets/frontend/img/static/orders-shapes2.png') }}" alt="">
                                </div>
                                <div class="orders-flex-content">
                                    <div class="icon">
                                        <i class="las la-handshake"></i>
                                    </div>
                                    <div class="contents">
                                        <h2 class="order-titles"> {{ $complete_order }} </h2>
                                        <span class="order-para">{{ __('Order Completed ') }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 margin-top-30 orders-child">
                            <div class="single-orders">
                                <div class="orders-shapes">
                                    <img src="{{ asset('assets/frontend/img/static/orders-shapes3.png') }}" alt="">
                                </div>
                                <div class="orders-flex-content">
                                    <div class="icon">
                                        <i class="las la-dollar-sign"></i>
                                    </div>
                                    <div class="contents">
                                        <h2 class="order-titles"> {{ float_amount_with_currency_symbol($total_earnings) }} </h2>
                                        <span class="order-para">{{ __('Total Withdraw') }} </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 margin-top-30 orders-child">
                            <div class="single-orders">
                                <div class="orders-shapes">
                                    <img src="{{ asset('assets/frontend/img/static/orders-shapes4.png') }}" alt="">
                                </div>
                                <div class="orders-flex-content">
                                    <div class="icon">
                                        <i class="las la-file-invoice-dollar"></i>
                                    </div>
                                    <div class="contents">
                                        <h2 class="order-titles"> {{ float_amount_with_currency_symbol($remaning_balance-$total_earnings) }} </h2>
                                        <span class="order-para">{{ __('Remaining Balance') }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-lg-12">
                            <div class="dashboard-settings">
                                <div class="mt-3"> <x-msg.error/></div>
                            </div>
                        </div>
                        
                        <div class="col-lg-6">
                            <div class="dashboard-settings margin-top-55">
                                <h2 class="dashboards-title">{{ __('Payout History') }} </h2>
                                <small class="text-danger">{{ __('You can create a request for withdraw your earnings.') }}</small>

                            </div>
                        </div>
                        <div class="col-lg-6 text-right">
                            <div class="dashboard-settings margin-top-55">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#payoutRequestModal">{{ __('Request A Payment') }}</button>
                            </div>
                        </div>
                        <div class="col-lg-12 margin-top-20">
                            <div class="single-dashboard-order">
                                <div class="table-responsive table-responsive--md">
                                    <table class="custom--table">
                                        <thead>
                                            <tr>
                                                <th> {{ __('ID') }}</th>
                                                <th> {{ __('Payment Gateway') }} </th>
                                                <th> {{ __('Request Date') }} </th>
                                                <th> {{ __('Request Amount') }} </th>
                                                <th> {{ __('Request Status') }} </th>
                                                <th> {{ __('Downloads') }} </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($all_payout_request as $pay_request)
                                            <tr>
                                                <td data-label="{{ __('ID') }}">{{ $pay_request->id }} </td>
                                                <td data-label="{{ __('Payment Gateway') }}">{{ $pay_request->payment_gateway }}</td>
                                                <td data-label="{{ __('Request Date') }}">{{ $pay_request->created_at->diffForHumans() }} </td>
                                                <td data-label="{{ __('Request Amount') }}"> {{ float_amount_with_currency_symbol($pay_request->amount) }} </td>
                                                <td data-label="{{ __('Request Status') }}">
                                                    @if($pay_request->status==0) <span class="text-danger">{{ __('Pending') }}</span>@endif
                                                    @if($pay_request->status==1) <span class="text-primary">{{ __('Completed') }}</span>@endif
                                                 </td>
                                                <td data-label="{{ __('Downloads') }}"> 
                                                    <a href="{{ route('seller.payout.request.details', $pay_request->id) }}">
                                                        <span class="icon eye-icon"><i class="las la-eye"></i></span>
                                                    </a>
                                                    <a href="{{ route('seller.payout.invoice.details',$pay_request->id) }}"><span class="icon color-three"> <i class="las la-file-pdf"></i> </span>{{ __('Download PDF') }}</a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                                <div class="blog-pagination margin-top-55">
                                    <div class="custom-pagination mt-4 mt-lg-5">
                                        {!! $all_payout_request->links() !!}
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
    <div class="modal fade" id="payoutRequestModal" tabindex="-1" role="dialog" aria-labelledby="editModal"
        aria-hidden="true">
        <form action="{{ route('seller.create.payout.request') }}" method="post">
            @csrf
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModal">{{ __('Payout Request') }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="amount">{{ __('Amount') }}</label>
                            <input type="number" class="form-control" name="amount" id="amount">
                        </div>
                        <div class="form-group">
                            <label for="payment_gateway">{{ __('Payment Gateway') }}</label>
                            <select name="payment_gateway" id="payment_gateway" class="form-control nice-select">
                                <option value="">{{ __('Select Payment gateway') }}</option>
                                <option value="manual_payment">{{ __('Manual payment') }}</option>
                                <option value="paypal">{{ __('Paypal') }}</option>
                                <option value="mollie">{{ __('Mollie') }}</option>
                                <option value="paytm">{{ __('Paytm') }}</option>
                                <option value="stripe">{{ __('Stripe') }}</option>
                                <option value="razorpay">{{ __('Razorpay') }}</option>
                                <option value="flutterwave">{{ __('Flutterwave') }}</option>
                                <option value="Paystack">{{ __('Paystack') }}</option>
                                <option value="midtrans">{{ __('Midtrans') }}</option>
                                <option value="payfast">{{ __('Payfast') }}</option>
                                <option value="payfast">{{ __('Cashfree') }}</option>
                                <option value="instamojo">{{ __('Instamojo') }}</option>
                                <option value="mercadopago">{{ __('Mercadopago') }}</option>
                            </select>
                        </div>
                        <div class="form-group mt-5">
                            <label class="payout-request-note d-block pt-4" for="amount">{{ __('Note (your payment account details)') }}</label>
                            <small style="color:red">{{__('You can make a request only if your remaining balance in a range set by the site admin. Like admin set minimum request amount 50 and maximum request amount 500. than you can request a payment between 50 to 500.')}}</small>
                            <textarea class="form-control" name="seller_note" id="seller_note" cols="30" rows="7"></textarea>
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

                $(document).on('click', '.edit_status_modal', function(e) {
                    e.preventDefault();
                    let order_id = $(this).data('id');
                    let status = $(this).data('status');

                    $('#order_id').val(order_id);
                    $('#status').val(status);
                    $('.nice-select').niceSelect('update');
                });

            });

        })(jQuery);
    </script>
@endsection
