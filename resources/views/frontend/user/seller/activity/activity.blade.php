@extends('frontend.user.seller.seller-master')
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
                @include('frontend.user.seller.partials.sidebar')
                <div class="dashboard-right">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="dashboard-settings margin-top-40">
                                <h2 class="dashboards-title"> {{__('Project Details')}} </h2>
                                <h5 style="text-align: center">Current Project <span class="text-danger"> (In Progress)</span></h5>

                                <h5 style="text-align: center">Milestones</h5>
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
    
@endsection  

@section('scripts')
<script>
    $(document).on('click', '.save-changes-btn', function(){
        var client_id = $('#client-id').val();
        var project_id = $('#project-id').val();
        var status = $('#project-status').val();
        var description = $('#project-description').val();
        $.ajax({
            url : "{{ route('seller.project-status') }}",
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
        var client_id = $(this).attr('data-client-id');
        $.ajax({
            url : "{{ route('seller.client-projects') }}",
            data : {client_id:client_id},
            type : 'GET',
            success : function(response){
                $('.dashboard-right').html(response);
            }
        });
    });
    
    $(document).on('click', '.deliver-btn', function(){
        var project_details_id = $(this).val();
        var status = $('#status').val();
        var describe = $('#describe').val();

        var files = $('#attachment')[0].files;
        var fd = new FormData();
        fd.append('_token',"{{ csrf_token() }}");
        fd.append('attachment', files[0]);
        fd.append('project_details_id', project_details_id);
        fd.append('status', status);
        fd.append('describe', describe);

        $.ajax({
            url : "{{ route('seller.delivery.store') }}",
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
            url : "{{ route('seller.delivery') }}",
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
            url : "{{ route('seller.timeline') }}",
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
            url : "{{ route('seller.chat') }}",
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
            url : "{{ route('seller.chat.store') }}",
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
            url : "{{ route('seller.chat.all') }}",
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
            url : "{{ route('seller.get_more_details') }}",
            data : {'project_id' : project_id},
            type : 'GET',
            success : function(response){
                $('.dashboard-right').html(response);
            }
        });
    }); */
    
</script>
@endsection