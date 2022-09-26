<div class="dashboard-left-content">
    <div class="dashboard-close-main">
        <div class="close-bars"> <i class="las la-times"></i> </div>
        <div class="dashboard-top padding-top-40">
            <div class="thumb">
                <?php if(!is_null(Auth::guard('web')->user()->image)): ?>
                <?php echo render_image_markup_by_attachment_id(Auth::guard('web')->user()->image); ?>

                <?php else: ?>
                <img src="<?php echo e(asset('assets/frontend/img/static/user_profile.png')); ?>" alt="<?php echo e(__('No Image')); ?>"> 
                <?php endif; ?>
            </div>
            <div class="author-content">
                <h4 class="title"> <?php echo e(Auth::guard('web')->user()->name); ?> </h4>
                <strong><a href="<?php echo e(route('homepage')); ?>"><?php echo e(__('Visit Site')); ?></a></strong>
            </div>
        </div>
        <div class="dashboard-bottom margin-top-35 margin-bottom-50">
            <ul class="dashboard-list ">
                <li class="list <?php if(request()->is('buyer/dashboard*')): ?> active <?php endif; ?>">
                    <a href="<?php echo e(route('buyer.dashboard')); ?>"> <i class="las la-th"></i> <?php echo e(__('Dashboard')); ?> </a>
                </li>
                <li class="list <?php if(request()->is('buyer/orders*')): ?> active <?php endif; ?>">
                    <a href="<?php echo e(route('buyer.orders')); ?>"> <i class="las la-tasks"></i><?php echo e(__('All Orders')); ?></a>
                </li>
                <li class="list <?php if(request()->is('buyer/activity*')): ?> active <?php endif; ?>">
                    <a href="<?php echo e(route('buyer.activity')); ?>"> <i class="las la-th"></i> <?php echo e(__('Activity')); ?> </a>
                    <?php if(request()->is('buyer/activity*')): ?>
                        <?php 
                            $project = App\Project::where('client_id', Auth::user()->id)->where('status', 1)->first();
                        ?>
                        <div id="MainMenu">
                            <div class="list-group">
                                <a href="#activity" class="list-group-item list-group-item-success client-projects" data-toggle="collapse" data-parent="#MainMenu"><i class="las la-task"></i> <?php echo e(__('Projects')); ?></a>
                                <div class="collapse" id="activity">
                                    <a href="#current-project" id="current-project-label" class="list-group-item list-group-item-success current-project" data-project-id="<?php echo e($project->id); ?>" data-toggle="collapse" data-parent="#current-project">Current Project (<?php echo e(Str::ucfirst($project->hasRequirement->requirement_name)); ?>) <i class="fa fa-caret-down"></i></a>
                                    <div class="collapse list-group-submenu" id="current-project">
                                        <a class="list-group-item list-group-item-success activity-timeline" data-project-id="<?php echo e($project->id); ?>" data-toggle="collapse" data-parent="#timeline"><i class="fa fa-clock-o"></i> Timeline</a>
                                        <?php if($project->convert_type=='single-project'): ?>
                                            <a href="#" class="list-group-item list-group-item-success"><?php echo e(Str::ucfirst($project->hasProjectDetail->name)); ?></a>
                                        <?php else: ?> 
                                            <?php $counter=1 ?> 
                                            <?php $__currentLoopData = $project->haveProjectDetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $milestone_key=>$milestone_project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <a href="#Subcurrent-project-<?php echo e($milestone_key); ?>" class="list-group-item list-group-item-success" data-toggle="collapse" data-parent="#Subcurrent-project-<?php echo e($milestone_key); ?>">
                                                    <?php echo e($counter++); ?>. <?php echo e(Str::ucfirst($milestone_project->name)); ?> <i class="fa fa-caret-down"></i>
                                                </a>
                                                <div class="collapse list-group-submenu list-group-submenu-1" id="Subcurrent-project-<?php echo e($milestone_key); ?>">
                                                    <?php 
                                                        $unread_messages_count = App\Chat::where('reciever_id', Auth::user()->id)
                                                        ->where('project_details_id', $milestone_project->id)
                                                        ->where('is_read', 0)
                                                        ->count();

                                                        $pending_deliveries_count = App\ProjectDelivery::where('project_detial_id', $milestone_project->id)
                                                        ->where('is_client_read', 0)
                                                        ->count();
                                                    ?> 
                                                    <a class="list-group-item list-group-item-success activity-chat" data-milestone-id="<?php echo e($milestone_project->id); ?>" data-parent="#Subcurrent-project-<?php echo e($milestone_key); ?>">Inbox 
                                                        <?php if($unread_messages_count>0): ?>
                                                            <span class="badge badge-danger" id="unread-counter"><?php echo e($unread_messages_count); ?></span>
                                                        <?php endif; ?>
                                                    </a>
                                                    <a class="list-group-item list-group-item-success activity-delivery" data-milestone-id="<?php echo e($milestone_project->id); ?>" data-parent="#Subcurrent-project-<?php echo e($milestone_key); ?>">Delivery
                                                        <?php if($pending_deliveries_count>0): ?>
                                                            <span class="badge badge-danger" id="unread-delivery-counter"><?php echo e($pending_deliveries_count); ?></span>
                                                        <?php endif; ?>
                                                    </a>
                                                </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </div>
                                    <a href="#past-project" class="list-group-item list-group-item-success client-projects" data-status="other-project" data-toggle="collapse" data-parent="#past-project">Past Projects</a>
                                    <div class="collapse list-group-submenu" id="past-project">
                                        <?php if($project->status == 2 || $project->status == 3): ?>
                                            <a href="#" class="list-group-item list-group-item-success"><?php echo e(Str::ucfirst($project->hasRequirement->requirement_name)); ?></a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                </li>
                <li class="list <?php if(request()->is('buyer/all-tickets*')): ?> active <?php endif; ?>">
                    <a href="<?php echo e(route('buyer.support.ticket')); ?>"> <i class="lar la-star"></i><?php echo e(__('Support Ticket')); ?></a>
                </li>
                <li class="list <?php if(request()->is('buyer/requirement*')): ?> active <?php endif; ?>">
                    <a href="<?php echo e(route('buyer.requirement')); ?>"> <i class="lar la-star"></i><?php echo e(__('Requirements')); ?></a>
                </li>
                <li class="list <?php if(request()->is('buyer/profile*')): ?> active <?php endif; ?>">
                    <a href="<?php echo e(route('buyer.profile')); ?>"> <i class="las la-user"></i> <?php echo e(__('Profile')); ?> </a>
                </li>
                <li class="list <?php if(request()->is('buyer/account-settings*')): ?> active <?php endif; ?>">
                    <a href="<?php echo e(route('buyer.account.settings')); ?>"> <i class="las la-cog"></i> <?php echo e(__('Password Change')); ?> </a>
                </li>
                <li class="list">
                    <a href="<?php echo e(route('seller.logout')); ?>"> <i class="las la-sign-out-alt"></i> <?php echo e(__('Log Out' )); ?> </a>
                </li>
            </ul>
        </div>
        <div class="dashboard-logo padding-top-100">
            <a href="<?php echo e(route('homepage')); ?>" class="logo"> 
                <?php echo render_image_markup_by_attachment_id(get_static_option('site_logo')); ?>

            </a>
        </div>
    </div>
</div>
<script>
    $(document).on('click', '#current-project-label', function(){
        var project_id = $(this).attr('data-project-id');

        $.ajax({
            url : "<?php echo e(route('buyer.get_project_details')); ?>",
            data : {'project_id' : project_id},
            type : 'GET',
            success : function(response){
                $('.dashboard-right').html(response);
            }
        });
    });
</script><?php /**PATH C:\xampp\htdocs\qixer-master\resources\views/frontend/user/buyer/partials/sidebar.blade.php ENDPATH**/ ?>