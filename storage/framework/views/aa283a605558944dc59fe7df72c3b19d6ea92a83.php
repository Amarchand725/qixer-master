<?php $__env->startSection('site-title'); ?>
    <?php echo e(__('Activity')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('style'); ?>
<link rel="stylesheet" href="<?php echo e(asset('assets/common/css/flatpickr.min.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
  
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.frontend.seller-buyer-preloader','data' => []]); ?>
<?php $component->withName('frontend.seller-buyer-preloader'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

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
                <?php echo $__env->make('frontend.user.buyer.partials.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <div class="dashboard-right">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="dashboard-settings margin-top-40">
                                <h2 class="dashboards-title"> <?php echo e(__('Your Projects')); ?> </h2>
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
                                            <?php $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>     
                                                <tr>
                                                    <td><?php echo e($project->id); ?>.</td>
                                                    <td><?php echo e(Str::ucfirst($project->hasRequirement->requirement_name)); ?></td>
                                                    <td>
                                                        <?php if($project->convert_type=='single-project'): ?>
                                                            <span class="badge badge-info">Single</span>
                                                        <?php else: ?> 
                                                            <span class="badge badge-info">Milestone</span>
                                                        <?php endif; ?>
                                                    </td>
                                                    <td><?php echo e($project->hasRequirement->priority); ?></td>
                                                    <td>$<?php echo e(number_format($project->haveProjectDetails->sum('total_cost'), 2)); ?></td>
                                                    <td><?php echo e($project->haveProjectDetails->sum('timeframe')); ?> days</td>
                                                    <td><?php echo e(date('d, M-Y', strtotime($project->created_at))); ?></td>
                                                    <td>
                                                        <?php if($project->status!=0): ?>
                                                            <?php echo e(date('d, M-Y', strtotime($project->updated_at))); ?>

                                                        <?php else: ?> 
                                                            --
                                                        <?php endif; ?>
                                                    </td>
                                                    <td>
                                                        <?php if($project->status==0): ?>
                                                            <span class="badge badge-warning">Pending</span>
                                                        <?php elseif($project->status==1): ?>
                                                            <span class="badge badge-info">Started</span>
                                                        <?php elseif($project->status==2): ?>
                                                            <span class="badge badge-success">Completed</span>
                                                        <?php elseif($project->status==2): ?>
                                                            <span class="badge badge-danger">Cancelled</span>
                                                        <?php endif; ?>
                                                    </td>
                                                    <td>
                                                        <button class="btn btn-success btn-sm show-project-details-btn" value="<?php echo e($project->id); ?>"><i class="fa fa-eye"></i> Show</button>
                                                    </td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="mt-5"> <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.msg.error','data' => []]); ?>
<?php $component->withName('msg.error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?> </div>
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
                <form action="<?php echo e(route('buyer.go-to-payment')); ?>" method="GET" enctype="multipart/form-data">
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
                                    <img src="<?php echo e(asset('assets/frontend/img/visacard.png')); ?>" width="500px" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="payment-gateway">Payment Gateways</label>
                                    <select name="payment_gateway" id="payment-gateway" class="form-control">
                                        <option value="" selected>Select Payment Gateway</option>
                                        <?php $__currentLoopData = $payment_gateways; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment_gateway): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($payment_gateway->option_name); ?>"><?php echo e(Str::ucfirst(str_replace("_", " ", $payment_gateway->option_name))); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success send-payment-btn">Go to Payment</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
<?php $__env->stopSection(); ?>  

<?php $__env->startSection('scripts'); ?>
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
            url : "<?php echo e(route('buyer.payment')); ?>",
            data : {
                _token:"<?php echo e(csrf_token()); ?>",
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
            url : "<?php echo e(route('buyer.get_project_details')); ?>",
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
            url : "<?php echo e(route('buyer.project-status')); ?>",
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
        var client_id = '<?php echo e(Auth::user()->id); ?>';
        var status = '';
        if($(this).attr('data-status')){
            status = $(this).attr('data-status');
        }

        $.ajax({
            url : "<?php echo e(route('buyer.client-projects')); ?>",
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
        fd.append('_token',"<?php echo e(csrf_token()); ?>");
        fd.append('delivery_id', delivery_id);
        fd.append('status', status);
        fd.append('describe', describe);

        $.ajax({
            url : "<?php echo e(route('buyer.delivery.store')); ?>",
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
            url : "<?php echo e(route('buyer.delivery')); ?>",
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
            url : "<?php echo e(route('buyer.timeline')); ?>",
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
            url : "<?php echo e(route('buyer.chat')); ?>",
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
         fd.append('_token',"<?php echo e(csrf_token()); ?>");
         fd.append('attachment', files[0]);
         fd.append('project_details_id', project_details_id);
         fd.append('message', message);

        $.ajax({
            url : "<?php echo e(route('buyer.chat.store')); ?>",
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
            url : "<?php echo e(route('buyer.chat.all')); ?>",
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
            url : "<?php echo e(route('buyer.get_more_details')); ?>",
            data : {'project_id' : project_id},
            type : 'GET',
            success : function(response){
                $('.dashboard-right').html(response);
            }
        });
    }); */
    
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.user.buyer.buyer-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\qixer-master\resources\views/frontend/user/buyer/activity/activity.blade.php ENDPATH**/ ?>