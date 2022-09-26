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
                            <div class="col-sm-6">
                                <div class="card card-default">
                                    <div class="card-header">
                                        <h5><b><img src="{{ asset('assets/frontend/payment-logos/paypal-logo.png') }}" height="30px" width="50px" alt="">  Payment by PayPal Payment Gateway</b></h5>
                                    </div>
                                    <input type="hidden" id="project_details-id" value="{{ $project_details->id }}">
                                    <div class="card-body">
                                        <div id="paypal-button-container"></div>
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
    <script src="https://www.paypal.com/sdk/js?client-id=ARGPGmeK4eC62SzCywu89ttnlcVufwsgRmBpQrhcRy4EFPeYscBt12fQXxgp7XRn9QQiuAhhWf8pSVTP"></script>
    <script src="https://www.paypalobjects.com/api/checkout.js"></script>
    <script>
        paypal.Buttons({
        // Sets up the transaction when a payment button is clicked
        createOrder: (data, actions) => {
          return actions.order.create({
            purchase_units: [{
              amount: {
                value: '{{ $project_details->total_cost }}' // Can also reference a variable or function
              }
            }]
          });
        },
        // Finalize the transaction after payer approval
        onApprove: (data, actions) => {
          return actions.order.capture().then(function(orderData) {
            // Successful capture! For dev/demo purposes:
            console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
            const transaction = orderData.purchase_units[0].payments.captures[0];
            // alert(`Transaction ${transaction.status}: ${transaction.id}\n\nSee console for all available details`);
            // When ready to go live, remove the alert and show a success message within this page. For example:
            // const element = document.getElementById('paypal-button-container');
            // element.innerHTML = '<h3>Thank you for your payment!</h3>';
            // Or go to another URL:  actions.redirect('thank_you.html');
            
            var project_details_id = $('#project_details-id').val();
            $.ajax({
               type:'POST',
               url:'{{ route("stripe.post") }}',
               data:{token:csrf_token(),type:'paypal', transaction_status:transaction.status, transaction_id:transaction.id, project_details_id:project_details_id },
               success:function(data) {
                Swal.fire(
                    'Good job!',
                    'You have paid payment successfully!',
                    'success'
                )
               }
            });
          });
        }
      }).render('#paypal-button-container');
    </script>
@endsection