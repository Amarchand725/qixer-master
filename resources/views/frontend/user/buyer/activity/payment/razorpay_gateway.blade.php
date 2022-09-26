@extends('frontend.user.buyer.buyer-master')
@section('site-title')
    {{__('Razorpay Gateway Payment')}}
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
                    
                    <div class="mt-2"> <x-msg.error/> </div>
                    <div class="dashboard-service-single-item border-1">
                        <div id="app">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-6">
                                        <input type="hidden" id="project_details-id" value="{{ $project_details->id }}">
                                        @if($message = Session::get('error'))
                                            <div class="alert alert-danger alert-dismissible fade in" role="alert">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                                <strong>Error!</strong> {{ $message }}
                                            </div>
                                        @endif
                                            <div class="alert alert-success success-alert alert-dismissible fade show" role="alert" style="display: none;">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                                <strong>Success!</strong> <span class="success-message"></span>
                                            </div>
                                        {{ Session::forget('success') }}
                                        <div class="card card-default">
                                            <div class="card-header">
                                                <h5><b><img src="{{ asset('assets/frontend/payment-logos/razorpay-logo.png') }}" height="30px" width="70px" alt=""> Razorpay by Razorpay Payment Gateway</b></h5>
                                            </div>
                
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label for="name">Name <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" name="name" required id="name" placeholder="Enter your name">
                                                </div>
                                                <div class="form-group">
                                                    <label for="email">Email <span class="text-danger">*</span></label>
                                                    <input type="email" class="form-control" name="email" required id="email" placeholder="Enter your razorpay email">
                                                </div>
                                                <div class="form-group">
                                                    <label for="contact">Contact <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" name="contact" required id="contact" placeholder="Enter your razorpay contact number">
                                                </div>
                                                <div class="form-group">
                                                    <label for="description">Description</label>
                                                    <textarea name="description" id="description" class="form-control" placeholder="Enter description"></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="address">Address (optional)</label>
                                                    <textarea name="address" id="address" class="form-control" placeholder="Enter your address"></textarea>
                                                </div>
                                                <div class="form-group mt-1 mb-1">
                                                    <label for="amount">Payable Amount</label>
                                                    <input type="text" name="amount" value="{{ $project_details->total_cost }}" readonly class="form-control amount" placeholder="Enter Amount">
                                                </div>
                                                <div class="form-group">
                                                    <button id="rzp-button1" class="btn btn-success btn-lg">Pay ${{ $project_details->total_cost }}</button>
                                                </div>
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
        </div>
    </div>
@endsection  

@section('scripts')
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <script>
        $(document).on('click','#rzp-button1',function(e){
            e.preventDefault();
            var project_details_id = $('#project_details-id').val();
            var amount = $('.amount').val();
            var total_amount = amount * 100;
            var options = {
                "key": "{{ env('RAZORPAY_API_KEY') }}", // Enter the Key ID generated from the Dashboard
                "amount": total_amount, // Amount is in currency subunits. Default currency is INR. Hence, 10 refers to 1000 paise
                "currency": "USD",
                "name": $('#name').val(),
                "description": $('#description').val(),
                // "image": "https://www.nicesnippets.com/image/imgpsh_fullsize.png",
                "order_id": "", //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
                "handler": function (response){
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        type:'POST',
                        url:'{{ route("stripe.post") }}',
                        data:{razorpay_payment_id:response.razorpay_payment_id, razorpay_status:response.status,amount:amount, project_details_id:project_details_id},
                        success:function(data){
                            $('.success-message').text(data.success);
                            $('.success-alert').fadeIn('slow', function(){
                               $('.success-alert').delay(5000).fadeOut(); 
                            });
                            $('.amount').val('');
                        }
                    });
                },
                "prefill": {
                    "name": $('#name').val(),
                    "email": $('#email').val(),
                    "contact": $('#contact').val()
                },
                "notes": {
                    "address": $('#address').val()
                },
                "theme": {
                    "color": "#F37254"
                }
            };
            var rzp1 = new Razorpay(options);
            rzp1.open();
        });
    </script>
@endsection