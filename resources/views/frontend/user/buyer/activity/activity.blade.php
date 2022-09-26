@extends('frontend.user.buyer.buyer-master')
@section('site-title')
    {{__('Activity')}}
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
                                <h2 class="dashboards-title"> {{__('Your Projects')}} </h2>
                                <div class="dashboard-service-single-item border-1 margin-top-40">
                                    <div class="row">
                                        <table class="table">
                                            <tr>
                                                <th>Project ID</th>
                                                <th>Project Name</th>
                                                <th>Type</th>
                                                <th>Priority</th>
                                                <th>Badget</th>
                                                <th>Delivery (days)</th>
                                                <th>Assigned</th>
                                                <th>Started</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                            @foreach ($projects as $project)     
                                                <tr>
                                                    <td>{{ $project->id }}.</td>
                                                    <td>{{ Str::ucfirst($project->hasRequirement->requirement_name) }}</td>
                                                    <td>
                                                        @if($project->convert_type=='single-project')
                                                            <span class="badge badge-info">Single</span>
                                                        @else 
                                                            <span class="badge badge-info">Milestone</span>
                                                        @endif
                                                    </td>
                                                    <td>{{ $project->hasRequirement->priority }}</td>
                                                    <td>${{ number_format($project->haveProjectDetails->sum('total_cost'), 2) }}</td>
                                                    <td>{{ $project->haveProjectDetails->sum('timeframe') }} days</td>
                                                    <td>{{ date('d, M-Y', strtotime($project->created_at)) }}</td>
                                                    <td>
                                                        @if($project->status!=0)
                                                            {{ date('d, M-Y', strtotime($project->updated_at)) }}
                                                        @else 
                                                            --
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if($project->status==0)
                                                            <span class="badge badge-warning">Pending</span>
                                                        @elseif($project->status==1)
                                                            <span class="badge badge-info">Started</span>
                                                        @elseif($project->status==2)
                                                            <span class="badge badge-success">Completed</span>
                                                        @elseif($project->status==2)
                                                            <span class="badge badge-danger">Cancelled</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <button class="btn btn-success btn-sm show-project-details-btn" value="{{ $project->id }}"><i class="fa fa-eye"></i> Show</button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="mt-5"> <x-msg.error/> </div>
                    <div class="dashboard-service-single-item border-1 margin-top-40">
                        <div class="rows dash-single-inner">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="start-reject-btn-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Project Status</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="project-id" value="">
                    <input type="hidden" id="client-id" value="">
                    <div class="form-group">
                        <label for="project-status">Status</label>
                        <select name="project_status" id="project-status" class="form-control">
                            <option value="1">Start</option>
                            <option value="3">Reject</option>
                        </select>
                    </div>
                    <div class="form-group mt-2">
                        <label for="project-description">Describe</label>
                        <textarea name="project_description" id="project-description" placeholder="describe if want" class="form-control"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-success save-changes-btn">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="payment-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Payment</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('buyer.go-to-payment') }}" method="GET" enctype="multipart/form-data">
                    <div class="modal-body">
                        <input type="hidden" name="payment_project_details_id" id="payment-project-details-id" value="">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" id="credit_debit_card" value="1" checked>
                                        <label class="form-check-label" for="credit_debit_card">
                                        Credit & Debit Cards
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <img src="{{ asset('assets/frontend/img/visacard.png') }}" width="500px" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="payment-gateway">Payment Gateways</label>
                                    <select name="payment_gateway" id="payment-gateway" class="form-control">
                                        <option value="" selected>Select Payment Gateway</option>
                                        @foreach ($payment_gateways as $payment_gateway)
                                            <option value="{{ $payment_gateway->option_name }}">{{ Str::ucfirst(str_replace("_", " ", $payment_gateway->option_name)) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="first-name">First Name</label>
                                    <input type="text" class="form-control" name="first_name" id="first-name" placeholder="Enter first name">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="last-name">Last Name</label>
                                    <input type="text" class="form-control" name="last_name" id="last-name" placeholder="Enter last name">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="expiration_date">Expiration Date</label>
                                    <input type="text" class="form-control" name="expiration_date" id="expiration_date" placeholder="MM/YY">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="security_code">Security Code</label>
                                    <input type="text" class="form-control" name="security_code" id="security_code" placeholder="Enter security code">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <label for="amount">Payable Amount</label>
                                <input type="text" id="payment-amount" readonly name="amount" value="" class="form-control">
                            </div>
                        </div> --}}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success send-payment-btn">Go to Payment</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
@endsection  

@section('scripts')
<script>
    /* $(document).on('click', '.send-payment-btn', function(){
        var project_id = $('#payment-project-id').val();
        var project_details_id = $('#payment-project-details-id').val();
        var credit_debit_card = $('#credit_debit_card').val();
        var first_name = $('#first-name').val();
        var last_name = $('#last-name').val();
        var expiration_date = $('#expiration_date').val();
        var security_code = $('#security_code').val();
        var payable_amount = $('#payment-amount').val();
        var payment_gateway = $('#payment-gateway').val();
        $.ajax({
            url : "{{ route('buyer.payment') }}",
            data : {
                _token:"{{ csrf_token() }}",
                project_id:project_id,project_details_id:project_details_id,
                credit_debit_card:credit_debit_card,first_name:first_name,
                last_name:last_name,expiration_date:expiration_date,
                security_code:security_code,payable_amount:payable_amount,payment_gateway:payment_gateway,
            },
            type : 'POST',
            success : function(response){
                $('#payment-modal').modal('hide');
                $('.dashboard-right').html(response);
            }
        });
    }); */
    $(document).on('click', '.fund-btn', function(){
        var project_id = $(this).attr('data-project-id');
        var project_details_id = $(this).val();
        var amount = $(this).attr('data-amount');
        $('#payment-amount').val(amount);
        $('#payment-project-id').val(project_id);
        $('#payment-project-details-id').val(project_details_id);
        $('#payment-modal').modal('show');
    });
    $(document).on('click', '.show-project-details-btn', function(){
        var project_id = $(this).val();
        $.ajax({
            url : "{{ route('buyer.get_project_details') }}",
            data : {project_id:project_id},
            type : 'GET',
            success : function(response){
                $('.dashboard-right').html(response);
            }
        });
    });
    $(document).on('click', '.save-changes-btn', function(){
        var client_id = $('#client-id').val();
        var project_id = $('#project-id').val();
        var status = $('#project-status').val();
        var description = $('#project-description').val();
        $.ajax({
            url : "{{ route('buyer.project-status') }}",
            data : {client_id:client_id, project_id:project_id, status:status, description:description},
            type : 'GET',
            success : function(response){
                var description = $('#project-description').val('');
                $('#start-reject-btn-modal').modal('hide');
                $('.dashboard-right').html(response);
            }
        });
    });
    $(document).on('click', '.start-reject-btn', function(){
        var client_id = $(this).attr('data-client-id');
        var project_id = $(this).val();
        $('#project-id').val(project_id);
        $('#client-id').val(client_id);
        $('#start-reject-btn-modal').modal('show');
    });
    $(document).on('click', '.client-projects', function(){
        var client_id = '{{ Auth::user()->id }}';
        var status = '';
        if($(this).attr('data-status')){
            status = $(this).attr('data-status');
        }

        $.ajax({
            url : "{{ route('buyer.client-projects') }}",
            data : {status:status, client_id:client_id},
            type : 'GET',
            success : function(response){
                $('.dashboard-right').html(response);
            }
        });
    });

    $(document).on('click', '.deliver-btn', function(){
        var delivery_id = $(this).val();
        var status = $('#status').val();
        var describe = $('#describe').val();

        var fd = new FormData();
        fd.append('_token',"{{ csrf_token() }}");
        fd.append('delivery_id', delivery_id);
        fd.append('status', status);
        fd.append('describe', describe);

        $.ajax({
            url : "{{ route('buyer.delivery.store') }}",
            data : fd,
            type : 'POST',
            cache: false,
            contentType: false,
            processData: false,
            globalError: false,
            success : function(response){
                $('.dashboard-right').html(response);
            }
        });
    });
    $(document).on('click', '.activity-delivery', function(e){
        e.preventDefault();
        var milestone_id = $(this).attr('data-milestone-id');
        $.ajax({
            url : "{{ route('buyer.delivery') }}",
            data : {'milestone_id' : milestone_id},
            type : 'GET',
            success : function(response){
                $('.dashboard-right').html(response);
            }
        });
    });
    $(document).on('click', '.activity-timeline', function(){
        var project_id = $(this).attr('data-project-id');
        $.ajax({
            url : "{{ route('buyer.timeline') }}",
            data : {'project_id' : project_id},
            type : 'GET',
            success : function(response){
                $('.dashboard-right').html(response);
            }
        });
    });
    $(document).on('click', '.activity-chat', function(){
        var milestone_id = $(this).attr('data-milestone-id');
        $.ajax({
            url : "{{ route('buyer.chat') }}",
            data : {'milestone_id' : milestone_id},
            type : 'GET',
            success : function(response){
                $('#unread-counter').remove();
                $('.dashboard-right').html(response);
                var objDiv = document.getElementById("msg_history");
                objDiv.scrollTop = objDiv.scrollHeight;
            }
        });
    });
    $(document).on('click', '.send-msg-btn', function(){
        var project_details_id = $(this).val();
        var message = $('#write_msg').val();

        var files = $('#attachment')[0].files;
        var fd = new FormData();
         fd.append('_token',"{{ csrf_token() }}");
         fd.append('attachment', files[0]);
         fd.append('project_details_id', project_details_id);
         fd.append('message', message);

        $.ajax({
            url : "{{ route('buyer.chat.store') }}",
            data : fd,
            type : 'POST',
            cache: false,
            contentType: false,
            processData: false,
            globalError: false,
            success : function(response){
                $('#attachment').val('');
                $('#write_msg').val('');
                $('.msg_history').html(response);
                var objDiv = document.getElementById("msg_history");
                objDiv.scrollTop = objDiv.scrollHeight;
            }
        });
    });

    

    /* setInterval(function(){
        var reciever_id = $('.active_chat').attr('data-user-id');
        var project_details_id = $('.active_chat').attr('data-project-detials-id');
        fatchChat(project_details_id, reciever_id);
    }, 10000); */

    function fatchChat(project_details_id, reciever_id){
        $.ajax({
            url : "{{ route('buyer.chat.all') }}",
            data : {'reciever_id' : reciever_id, 'project_details_id' : project_details_id},
            type : 'GET',
            success : function(response){
                $('.msg_history').html(response);
            }
        });
    }

    $(document).on('click', '.chat_list', function(){
        $(this).parents('.inbox_chat').find('.active_chat').removeClass('active_chat');
        $(this).addClass('active_chat');
        var reciever_id = $('.active_chat').attr('data-user-id');
        var project_details_id = $('.active_chat').attr('data-project-detials-id');
        fatchChat(project_details_id, reciever_id);
        var objDiv = document.getElementById("msg_history");
        objDiv.scrollTop = objDiv.scrollHeight;
    });

    

    /* $(document).on('click', '.view-details-btn', function(){
        var project_id = $(this).val();
        $.ajax({
            url : "{{ route('buyer.get_more_details') }}",
            data : {'project_id' : project_id},
            type : 'GET',
            success : function(response){
                $('.dashboard-right').html(response);
            }
        });
    }); */
    
</script>
@endsection