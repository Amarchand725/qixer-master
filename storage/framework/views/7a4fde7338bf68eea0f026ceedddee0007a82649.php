
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
                <?php echo $__env->make('frontend.user.seller.partials.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <div class="dashboard-right">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="dashboard-settings margin-top-40">
                                <h2 class="dashboards-title"> <?php echo e(__('Client Projects')); ?> </h2>
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
                        <div class="row">
                            <table class="table">
                                <tr>
                                    <th>Project ID</th>
                                    <th>Project Name</th>
                                    <th>Type</th>
                                    
                                    <th>Delivery (days)</th>
                                    <th>Assigned</th>
                                    <th>Started</th>
                                    <th>Status</th>
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
                                                <?php if(!empty($project->hasPayment)): ?>
                                                    <button class="btn btn-success btn-sm start-reject-btn" data-client-id="<?php echo e($project->client_id); ?>" value="<?php echo e($project->id); ?>">Start/Reject</button>
                                                <?php else: ?> 
                                                    <span class="badge badge-warning">Waiting for fund</span>
                                                <?php endif; ?>
                                            <?php elseif($project->status==1): ?>
                                                <span class="badge badge-info">Started</span>
                                            <?php elseif($project->status==2): ?>
                                                <span class="badge badge-success">Completed</span>
                                            <?php elseif($project->status==2): ?>
                                                <span class="badge badge-danger">Cancelled</span>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </table>
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
    
<?php $__env->stopSection(); ?>  

<?php $__env->startSection('scripts'); ?>
<script>
    $(document).on('click', '.save-changes-btn', function(){
        var client_id = $('#client-id').val();
        var project_id = $('#project-id').val();
        var status = $('#project-status').val();
        var description = $('#project-description').val();
        $.ajax({
            url : "<?php echo e(route('seller.project-status')); ?>",
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
        var status = '';
        if($(this).attr('data-status')){
            status = $(this).attr('data-status');
        }
        $.ajax({
            url : "<?php echo e(route('seller.client-projects')); ?>",
            data : {status:status, client_id:client_id},
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
        fd.append('_token',"<?php echo e(csrf_token()); ?>");
        fd.append('attachment', files[0]);
        fd.append('project_details_id', project_details_id);
        fd.append('status', status);
        fd.append('describe', describe);

        $.ajax({
            url : "<?php echo e(route('seller.delivery.store')); ?>",
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
            url : "<?php echo e(route('seller.delivery')); ?>",
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
            url : "<?php echo e(route('seller.timeline')); ?>",
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
            url : "<?php echo e(route('seller.chat')); ?>",
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
            url : "<?php echo e(route('seller.chat.store')); ?>",
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
            url : "<?php echo e(route('seller.chat.all')); ?>",
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
            url : "<?php echo e(route('seller.get_more_details')); ?>",
            data : {'project_id' : project_id},
            type : 'GET',
            success : function(response){
                $('.dashboard-right').html(response);
            }
        });
    }); */
    
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.user.seller.seller-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\qixer-master\resources\views/frontend/user/seller/activity/activity.blade.php ENDPATH**/ ?>