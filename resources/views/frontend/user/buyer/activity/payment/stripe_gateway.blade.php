@extends('frontend.user.buyer.buyer-master')
@section('site-title')
    {{__('Stripe Gateway Payment')}}
@endsection
@section('style')
<link rel="stylesheet" href="{{asset('assets/common/css/flatpickr.min.css')}}">
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
                @include('frontend.user.buyer.partials.sidebar')
                <div class="dashboard-right">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="dashboard-settings margin-top-40">
                                <h2 class="dashboards-title"> {{__('Payment Details')}} </h2>
                            </div>
                        </div>
                    </div>
                    
                    <div class="mt-5"> <x-msg.error/> </div>
                    <div class="dashboard-service-single-item border-1 margin-top-40">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card card-default">
                                    <div class="card-header">
                                        <h5><b><img src="{{ asset('assets/frontend/payment-logos/stripe-logo-white-on-blue.png') }}" width="50px" alt=""> Payment by Stripe Payment Gateway</b></h5>
                                    </div>
        
                                    <div class="card-body">
                                        @if (Session::has('success'))
                                            <div class="alert alert-success text-center">
                                                <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                                                <p>{{ Session::get('success') }}</p>
                                            </div>
                                        @endif
                        
                                        <form 
                                                role="form" 
                                                action="{{ route('stripe.post') }}" 
                                                method="post" 
                                                class="require-validation"
                                                data-cc-on-file="false"
                                                data-stripe-publishable-key="{{ env('STRIPE_KEY') }}"
                                                id="payment-form">
                                            @csrf

                                            <input type="hidden" class="project_details_id" name="project_details_id" id="project_details_id" value="{{ $project_details->id }}">
                        
                                            <div class='form-row row'>
                                                <div class='col-md-12 form-group required'>
                                                    <label class='control-label'>Name on Card <span class="text-danger">*</span></label> 
                                                    <input class='form-control' size='4' type='text' placeholder="Enter name on card" required>
                                                </div>
                                            </div>
                        
                                            <div class='form-row row'>
                                                <div class='col-md-12 form-group required'>
                                                    <label class='control-label'>Card Number <span class="text-danger">*</span></label> 
                                                    <input type='text' autocomplete='off' class='form-control card-number' required size='20' placeholder="Enter card number">
                                                </div>
                                            </div>
                        
                                            <div class='form-row row'>
                                                <div class='col-xs-12 col-md-4 form-group cvc required'>
                                                    <label class='control-label'>CVC <span class="text-danger">*</span></label> 
                                                    <input autocomplete='off' class='form-control card-cvc' placeholder='ex. 311' size='4' required type='text'>
                                                </div>
                                                <div class='col-xs-12 col-md-4 form-group expiration required'>
                                                    <label class='control-label'>Expiration Month <span class="text-danger">*</span></label> 
                                                    <input class='form-control card-expiry-month' placeholder='MM' size='2' required type='text'>
                                                </div>
                                                <div class='col-xs-12 col-md-4 form-group expiration required'>
                                                    <label class='control-label'>Expiration Year <span class="text-danger">*</span></label> 
                                                    <input class='form-control card-expiry-year' placeholder='YYYY' size='4' required type='text'>
                                                </div>
                                            </div>
                        
                                            <div class='form-row row'>
                                                <div class='col-md-12 error form-group hide'>
                                                    <div class='alert-danger alert'>Please correct the errors and try
                                                        again.</div>
                                                </div>
                                            </div>
                        
                                            <div class='form-row row'>
                                                <div class='col-xs-12 form-group expiration required'>
                                                    <button class="btn btn-success btn-lg btn-block" type="submit">Pay Now (${{ $project_details->total_cost }})</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>      
                            </div>
                            <div class="col-md-6">
                                <div class="card card-default">
                                    <div class="card-header">
                                        <h5><b>Project Details</b></h5>
                                    </div>
        
                                    <div class="card-body">
                                        <h5 class="card-title">Milestone ({{ $project_details->name }})</h5>
                                        <table class="table">
                                            <tr>
                                                <td>Milestone Cost</td>
                                                <td>${{ number_format($project_details->total_cost, 2) }}</td>
                                            </tr>
                                            <tr>
                                                <td>Timeframe</td>
                                                <td>({{ $project_details->timeframe }} days)</td>
                                            </tr>
                                            <tr>
                                                <td>Status</td>
                                                <td>
                                                    @if($project_details->status==0)
                                                        <span class="badge badge-warning" style="color:white">Pending</span>
                                                    @elseif($project_details->status==1)
                                                        <span class="badge badge-info" style="color:white">Started</span>
                                                    @elseif($project_details->status==2)
                                                        <span class="badge badge-success" style="color:white">Completed</span>
                                                    @elseif($project_details->status==3)
                                                        <span class="badge badge-danger" style="color:white">Rejected</span>
                                                    @endif
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection  

@section('scripts')
    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
    <script>
        $(function() {
            var $form = $(".require-validation");
            
            $('form.require-validation').bind('submit', function(e) {
                var $form         = $(".require-validation"),
                inputSelector = ['input[type=email]', 'input[type=password]',
                                    'input[type=text]', 'input[type=file]',
                                    'textarea'].join(', '),
                $inputs       = $form.find('.required').find(inputSelector),
                $errorMessage = $form.find('div.error'),
                valid         = true;
                $errorMessage.addClass('hide');
            
                $('.has-error').removeClass('has-error');
                $inputs.each(function(i, el) {
                    var $input = $(el);
                    if ($input.val() === '') {
                    $input.parent().addClass('has-error');
                    $errorMessage.removeClass('hide');
                    e.preventDefault();
                    }
                });
            
                if (!$form.data('cc-on-file')) {
                    e.preventDefault();
                    Stripe.setPublishableKey($form.data('stripe-publishable-key'));
                    Stripe.createToken({
                    number: $('.card-number').val(),
                    cvc: $('.card-cvc').val(),
                    exp_month: $('.card-expiry-month').val(),
                    exp_year: $('.card-expiry-year').val(),
                    }, stripeResponseHandler);
                }
            });
            
            function stripeResponseHandler(status, response) {
                if (response.error) {
                    $('.error')
                        .removeClass('hide')
                        .find('.alert')
                        .text(response.error.message);
                } else {
                    /* token contains id, last4, and card type */
                    var token = response['id'];
                    var project_details_id = $('.project_details_id').val()
                        
                    $form.find('input[type=text]').empty();
                    $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
                    $form.append("<input type='hidden' name='project_details_id' value='" + project_details_id + "'/>");
                    $form.get(0).submit();
                }
            }    
        });
    </script>
@endsection