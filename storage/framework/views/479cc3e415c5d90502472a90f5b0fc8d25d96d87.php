
<?php $__env->startSection('site-title'); ?>
    <?php echo e(__('Buyer Dashboard')); ?>

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
                            <div class="dashboard-flex-title">
                                <div class="dashboard-settings margin-top-40">
                                    <h2 class="dashboards-title"><?php echo e(__('Dashboard')); ?></h2>
                                </div>
                                <div class="info-bar-item">
                                    <?php if(Auth::guard('web')->check() && Auth::guard('web')->user()->user_type==1): ?>
                                        <div class="notification-icon icon">
                                            <?php if(Auth::guard('web')->check()): ?>
                                                <span class="bell-icon"> <?php echo e(__("New Tickets")); ?> <i class="las la-bell"></i> </span>
                                                <span class="notification-number">
                                                    <?php echo e(Auth::user()->unreadNotifications->count()); ?>

                                                </span>
                                            <?php endif; ?>
                                            <div class="notification-list-item mt-2">
                                                <h5 class="notification-title"><?php echo e(__('Notifications')); ?></h5>
                                                <div class="list">
                                                    <?php if(Auth::guard('web')->check() && Auth::guard('web')->user()->unreadNotifications->count() >=1): ?>
                                                        <span>
                                                        <?php $__currentLoopData = Auth::guard('web')->user()->unreadNotifications->take(10); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <a class="list-order" href="<?php echo e(route('buyer.support.ticket.view',$notification->data['last_ticket_id'])); ?>">
                                                                <span class="order-icon"> <i class="las la-check-circle"></i> </span>
                                                                <?php echo e($notification->data['order_ticcket_message']); ?> #<?php echo e($notification->data['last_ticket_id']); ?>

                                                            </a>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </span>
                                                    <?php else: ?>
                                                        <p class="text-center padding-3" style="color:#111;"><?php echo e(__('No New Notification')); ?></p>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-3 col-md-6 margin-top-30 orders-child">
                            <div class="single-orders">
                                <div class="orders-shapes">
                                    <img src="<?php echo e(asset('assets/frontend/img/static/orders-shapes.png')); ?>" alt="">
                                </div>
                                <div class="orders-flex-content">
                                    <div class="icon">
                                        <i class="las la-tasks"></i>
                                    </div>
                                    <div class="contents">
                                        <h2 class="order-titles"> <?php echo e($pending_order); ?> </h2>
                                        <span class="order-para"><?php echo e(__('Order Pending')); ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 margin-top-30 orders-child">
                            <div class="single-orders">
                                <div class="orders-shapes">
                                    <img src="<?php echo e(asset('assets/frontend/img/static/orders-shapes2.png')); ?>" alt="">
                                </div>
                                <div class="orders-flex-content">
                                    <div class="icon">
                                        <i class="las la-handshake"></i>
                                    </div>
                                    <div class="contents">
                                        <h2 class="order-titles"> <?php echo e($active_order); ?> </h2>
                                        <span class="order-para"><?php echo e(__('Order Active')); ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 margin-top-30 orders-child">
                            <div class="single-orders">
                                <div class="orders-shapes">
                                    <img src="<?php echo e(asset('assets/frontend/img/static/orders-shapes3.png')); ?>" alt="">
                                </div>
                                <div class="orders-flex-content">
                                    <div class="icon">
                                        <i class="las la-dollar-sign"></i>
                                    </div>
                                    <div class="contents">
                                        <h2 class="order-titles"> <?php echo e($complete_order); ?> </h2>
                                        <span class="order-para"><?php echo e(__('Order Completed')); ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 margin-top-30 orders-child">
                            <div class="single-orders">
                                <div class="orders-shapes">
                                    <img src="<?php echo e(asset('assets/frontend/img/static/orders-shapes4.png')); ?>" alt="">
                                </div>
                                <div class="orders-flex-content">
                                    <div class="icon">
                                        <i class="las la-file-invoice-dollar"></i>
                                    </div>
                                    <div class="contents">
                                        <h2 class="order-titles"><?php echo e($total_order); ?> </h2>
                                        <span class="order-para"> <?php echo e(__('Order Total')); ?> </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="dashboard-middle-flex style-02">
                        <?php if($last_10_order->count() >= 1): ?>
                            <div class="single-flex-middle margin-top-40">
                                <div class="line-charts-wrapper oreder_details_rtl">
                                    <div class="table-responsive table-responsive--md">
                                        <h5><?php echo e(__('Last 10 Orders')); ?></h5>
                                        <table class="custom--table">
                                            <thead>
                                                <tr>
                                                    <th> <?php echo e(__('Seller Name')); ?> </th>
                                                    <th><?php echo e(__('Status')); ?></th>
                                                    <th> <?php echo e(__('Location')); ?> </th>
                                                    <th><?php echo e(__('Price')); ?> </th>
                                                    <th><?php echo e(__('View')); ?> </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $__currentLoopData = $last_10_order; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr>
                                                        <td data-label="Seller Name"><?php echo e(optional($order->seller)->name); ?> </td>
                                                        <?php if($order->status == 0): ?> <td data-label="Status" class="pending"><span><?php echo e(__('Pending')); ?></span></td><?php endif; ?>
                                                        <?php if($order->status == 1): ?> <td data-label="Status" class="order-active"><span><?php echo e(__('Active')); ?></span></td><?php endif; ?>
                                                        <?php if($order->status == 2): ?> <td data-label="Status" class="completed"><span><?php echo e(__('Completed')); ?></span></td><?php endif; ?>
                                                        <?php if($order->status == 3): ?> <td data-label="Status" class="order-deliver"><span><?php echo e(__('Delivered')); ?></span></td><?php endif; ?>
                                                        <?php if($order->status == 4): ?> <td data-label="Status" class="canceled"><span><?php echo e(__('Cancelled')); ?></span></td><?php endif; ?>
                                                        <td data-label="Location"><?php echo e(optional(optional($order->seller)->city)->service_city); ?></td>
                                                        <td data-label="Price"> <?php echo e(float_amount_with_currency_symbol($order->total)); ?> </td>
                                                        <td data-label="View"> 
                                                            <a href="<?php echo e(route('buyer.order.details', $order->id)); ?>">
                                                                <span class="icon eye-icon">
                                                                    <i class="las la-eye"></i>
                                                                </span>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                        <?php if($last_10_tickets->count() >= 1): ?>
                            <div class="single-flex-middle margin-top-40">
                                <div class="line-charts-wrapper oreder_details_rtl">
                                    <div class="table-responsive table-responsive--md">
                                        <h5><?php echo e(__('Last 10 Tickets')); ?></h5>
                                        <table class="custom--table">
                                            <thead>
                                                <tr>
                                                    <th class="text-left"> <?php echo e(__('Ticket')); ?> </th>
                                                    <th><?php echo e(__('Ticket Details')); ?></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $__currentLoopData = $last_10_tickets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ticket): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr>
                                                        <td data-label="<?php echo e(__('Ticket')); ?>" class="text-left"><?php echo e(__('Order Id')); ?> #<?php echo e($ticket->order_id); ?>, <?php echo e($ticket->title); ?> </td>
                                                        <td data-label="<?php echo e(__('Ticket Details')); ?>">
                                                            <a href="<?php echo e(route('buyer.support.ticket.view', $ticket->id)); ?>">
                                                                <span class="icon eye-icon"><i class="las la-eye"></i></span>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Dashboard area end -->
    <?php $__env->stopSection(); ?>
    <?php $__env->startSection('scripts'); ?>
        <script>
            "use strict";
            $(document).ready(function () {
               
            });
        </script>
    <?php $__env->stopSection(); ?>    
<?php echo $__env->make('frontend.user.buyer.buyer-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\qixer-master\resources\views/frontend/user/buyer/dashboard/dashboard.blade.php ENDPATH**/ ?>