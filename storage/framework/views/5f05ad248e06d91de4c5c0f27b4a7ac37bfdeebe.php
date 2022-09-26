<style>
    .list-group.panel > .list-group-item {
    border-bottom-right-radius: 4px;
    border-bottom-left-radius: 4px
    }
    .list-group-submenu {
    margin-left:20px;
    }
</style>
<div class="dashboard-left-content">
    <div class="dashboard-close-main">
        <div class="close-bars"> <i class="las la-times"></i> </div>
        <div class="dashboard-top padding-top-40">
            <div class="thumb">
                <?php if(!is_null(Auth::guard('web')->user()->image)): ?>
                <?php echo render_image_markup_by_attachment_id(Auth::guard('web')->user()->image); ?>

                <?php else: ?>
                    <img src="<?php echo e(asset('assets/frontend/img/static/user_profile.png')); ?>" alt="No Image"> 
                <?php endif; ?>
            </div>
            <div class="author-content">
                <h4 class="title"> <?php echo e(Auth::guard('web')->user()->name); ?> </h4>
                <strong><a href="<?php echo e(route('homepage')); ?>"><?php echo e(__('Visit Site')); ?></a></strong>
            </div>
        </div>
        <div class="dashboard-bottom margin-top-35 margin-bottom-50">
            <ul class="dashboard-list ">
                <li class="list <?php if(request()->is('seller/dashboard*')): ?> active <?php endif; ?>">
                    <a href="<?php echo e(route('seller.dashboard')); ?>"> <i class="las la-th"></i> <?php echo e(__('Dashboard')); ?> </a>
                </li>
                <li class="list <?php if(request()->is('seller/activity*')): ?> active <?php endif; ?>">
                    <a href="<?php echo e(route('seller.activity')); ?>"> <i class="las la-th"></i> <?php echo e(__('Activity')); ?> </a>
                    <?php if(request()->is('seller/activity*')): ?>
                        <?php 
                            $projects = App\Project::where('service_provider_id', Auth::user()->id)->where('status', 1)->get();
                        ?>
                        <div id="MainMenu">
                            <div class="list-group">
                                <a href="#activity" class="list-group-item list-group-item-success" data-toggle="collapse" data-parent="#MainMenu"><i class="las la-user"></i> <?php echo e(__('Clients')); ?></a>
                                <div class="collapse" id="activity">
                                    <?php $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project_key=>$project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <a href="#project" class="list-group-item list-group-item-success client-projects" data-client-id="<?php echo e($project->client_id); ?>" data-toggle="collapse" data-parent="#MainMenu"> <?php echo e(Str::ucfirst($project->client->name)); ?></a>
                                        <div class="collapse" id="project">
                                            <?php if($project->status == 1): ?>
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
                                                                ->where('is_seller_read', 0)
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
                                            <?php endif; ?>
                                            <a href="#past-project" class="list-group-item list-group-item-success client-projects" data-client-id="<?php echo e($project->client_id); ?>" data-toggle="collapse" data-parent="#past-project">Past Project </a>
                                            <div class="collapse list-group-submenu" id="past-project">
                                                <?php if($project->status == 2 || $project->status == 3): ?>
                                                    <a href="#" class="list-group-item list-group-item-success"><?php echo e(Str::ucfirst($project->hasRequirement->requirement_name)); ?></a>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                </li>

                <li class="list <?php if(request()->is('seller/coupons*')): ?> active <?php endif; ?>">
                    <a href="<?php echo e(route('seller.service.coupon')); ?>"> <i class="las la-gifts"></i> <?php echo e(__('Service Coupons')); ?> </a>
                </li>
                <li class="list <?php if(request()->is('seller/services*') || request()->is('seller/add-services*') || request()->is('seller/service-attributes*') || request()->is('seller/edit-services*') || request()->is('seller/edit-service-attributes*') || request()->is('seller/add-service-attributes-by-id*')): ?> active <?php endif; ?>">
                    <a href="<?php echo e(route('seller.services')); ?>"> <i class="las la-cogs"></i><?php echo e(__('Services')); ?> </a>
                </li>
                <li class="list <?php if(request()->is('seller/days*') || request()->is('seller/add-day*')): ?> active <?php endif; ?>">
                    <a href="<?php echo e(route('seller.days')); ?>"> <i class="las la-calendar-week"></i><?php echo e(__('Create Day')); ?> </a>
                </li>
                <li class="list <?php if(request()->is('seller/schedules*') || request()->is('seller/add-schedule*')): ?> active <?php endif; ?>">
                    <a href="<?php echo e(route('seller.schedules')); ?>"> <i class="las la-clock"></i><?php echo e(__('Create Schedule')); ?> </a>
                </li>
                <li class="list <?php if(request()->is('seller/pending-orders')): ?> active <?php endif; ?>">
                    <a href="<?php echo e(route('seller.pending.orders')); ?>"> <i class="las la-tasks"></i> <?php echo e(__('Order Pending')); ?> </a>
                </li>
                <li class="list <?php if(request()->is('seller/orders*')): ?> active <?php endif; ?>">
                    <a href="<?php echo e(route('seller.orders')); ?>"> <i class="las la-list-alt"></i> <?php echo e(__('All Orders')); ?> </a>
                </li>
                <li class="list <?php if(request()->is('seller/notification/all-notifications*')): ?> active <?php endif; ?>">
                    <a href="<?php echo e(route('seller.notification.all')); ?>"> <i class="las la-bell"></i> <?php echo e(__('All Notifications')); ?> </a>
                </li>
                <li class="list <?php if(request()->is('seller/payout-request*')): ?> active <?php endif; ?>">
                    <a href="<?php echo e(route('seller.payout')); ?>"> <i class="las la-dollar-sign"></i><?php echo e(__('Payout History')); ?> </a>
                </li>
                <li class="list <?php if(request()->is('seller/service-reviews*')): ?> active <?php endif; ?>">
                    <a href="<?php echo e(route('seller.service.review')); ?>"> <i class="lar la-star"></i><?php echo e(__('Review')); ?></a>
                </li>
                <li class="list <?php if(request()->is('seller/all-tickets*')): ?> active <?php endif; ?>">
                    <a href="<?php echo e(route('seller.support.ticket')); ?>"> <i class="las la-headset"></i><?php echo e(__('Support Ticket')); ?></a>
                </li>
                <li class="list <?php if(request()->is('seller/to-do-list*')): ?> active <?php endif; ?>">
                    <a href="<?php echo e(route('seller.todolist')); ?>"> <i class="las la-list"></i><?php echo e(__('Todo List')); ?></a>
                </li>
                <li class="list <?php if(request()->is('seller/profile*')): ?> active <?php endif; ?>">
                    <a href="<?php echo e(route('seller.profile')); ?>"> <i class="las la-user"></i> <?php echo e(__('Profile')); ?> </a>
                </li>
                <li class="list <?php if(request()->is('seller/seller-profile-verify*')): ?> active <?php endif; ?>">
                    <a href="<?php echo e(route('seller.profile.verify')); ?>"> <i class="las la-user"></i> <?php echo e(__('Profile Verify')); ?> </a>
                </li>
                <li class="list <?php if(request()->is('seller/account-settings*')): ?> active <?php endif; ?>">
                    <a href="<?php echo e(route('seller.account.settings')); ?>"> <i class="las la-cog"></i> <?php echo e(__('Settings')); ?> </a>
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
            url : "<?php echo e(route('seller.get_project_details')); ?>",
            data : {'project_id' : project_id},
            type : 'GET',
            success : function(response){
                $('.dashboard-right').html(response);
            }
        });
    });
</script><?php /**PATH C:\xampp\htdocs\qixer-master\resources\views/frontend/user/seller/partials/sidebar.blade.php ENDPATH**/ ?>