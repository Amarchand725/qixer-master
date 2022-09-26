<?php $__env->startSection('site-title'); ?>
    <?php echo e(__('Orders')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('style'); ?>
    <style>
        .table-td-padding {
            border-collapse: separate;
            border-spacing: 10px 20px;
        }
    </style>
<link rel="stylesheet" href="<?php echo e(asset('assets/common/css/themify-icons.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('assets/frontend/css/font-awesome.min.css')); ?>">
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
                <?php if($orders->count() >= 1): ?>
                    <div class="dashboard-right">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="dashboard-settings margin-top-40">
                                    <h2 class="dashboards-title"><?php echo e(__('All Orders')); ?></h2>
                                </div>
                                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.msg.success','data' => []]); ?>
<?php $component->withName('msg.success'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
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
<?php endif; ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 margin-top-40">
                                <div>
                                    <div class="table-responsive table-responsive--md">
                                        <table id="all_order_table" class="custom--table table-td-padding">
                                            <thead>
                                                <tr>
                                                    <th> <?php echo e(__('Order ID')); ?> </th>
                                                    <th> <?php echo e(__('Customer Name')); ?> </th>
                                                    <th> <?php echo e(__('Service Date')); ?> </th>
                                                    <th> <?php echo e(__('Service Time')); ?> </th>
                                                    <th> <?php echo e(__('Order Pricing')); ?> </th>
                                                    <th> <?php echo e(__('Order Status')); ?> </th>
                                                    <th> <?php echo e(__('Order Type')); ?> </th>
                                                    <th> <?php echo e(__('Order Complete Request')); ?> </th>
                                                    <th> <?php echo e(__('Action')); ?> </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr>
                                                        <td data-label="<?php echo e(__('Order ID')); ?>"> <?php echo e($order->id); ?> </td>
                                                        <td data-label="<?php echo e(__('Customer Name')); ?>"> <?php echo e($order->name); ?> </td>
                                                        <td data-label="<?php echo e(__('Service Date')); ?>"> <?php echo e(Carbon\Carbon::parse($order->date)->format('d/m/y')); ?></td>
                                                        <td data-label="<?php echo e(__('Service Time')); ?>"> <?php echo e($order->schedule); ?></td>
                                                        <td data-label="<?php echo e(__('Order Pricing')); ?>"> <?php echo e(float_amount_with_currency_symbol($order->total)); ?></td>

                                                        <?php if($order->status == 0): ?> <td data-label="<?php echo e(__('Order Status')); ?>" class="pending"><span><?php echo e(__('Pending')); ?></span></td><?php endif; ?>
                                                        <?php if($order->status == 1): ?> <td data-label="<?php echo e(__('Order Status')); ?>" class="order-active"><span><?php echo e(__('Active')); ?></span></td><?php endif; ?>
                                                        <?php if($order->status == 2): ?> <td data-label="<?php echo e(__('Order Status')); ?>" class="completed"><span><?php echo e(__('Completed')); ?></span></td><?php endif; ?>
                                                        <?php if($order->status == 3): ?> <td data-label="<?php echo e(__('Order Status')); ?>" class="order-deliver"><span><?php echo e(__('Delivered')); ?></span></td><?php endif; ?>
                                                        <?php if($order->status == 4): ?> <td data-label="<?php echo e(__('Order Status')); ?>" class="canceled"><span><?php echo e(__('Cancelled')); ?></span></td><?php endif; ?>

                                                        <td data-label="Order Pricing">
                                                            <?php if($order->is_order_online==1): ?>
                                                                <span class="btn btn-success"><?php echo e(__('Online')); ?></span>
                                                            <?php else: ?>
                                                                <span class="btn btn-info"><?php echo e(__('OffLine')); ?></span>
                                                            <?php endif; ?>
                                                        </td>

                                                        <?php if($order->order_complete_request == 0): ?> <td data-label="<?php echo e(__('Order Status')); ?>" class="pending"><span><?php echo e(__('No Request Create')); ?></span></td><?php endif; ?>
                                                        <?php if($order->order_complete_request == 1): ?> 
                                                        <td data-label="Order Status" class="pending">
                                                            <span><?php echo e(__('Complete Request')); ?></span>
                                                            <span><?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.order-complete-request-approve','data' => ['url' => route('buyer.order.complete.request.approve',$order->id)]]); ?>
<?php $component->withName('order-complete-request-approve'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['url' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('buyer.order.complete.request.approve',$order->id))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?></span>
                                                        </td>
                                                        <?php endif; ?>
                                                        <?php if($order->order_complete_request == 2): ?>
                                                            <td data-label="<?php echo e(__('Order Status')); ?>" class="completed"><span><?php echo e(__('Completed')); ?></span></td>
                                                        <?php endif; ?>

                                                        <td data-label="Action">
                                                            <?php if($order->status == 2): ?>
                                                            <a href="#"
                                                               data-toggle="modal"
                                                               data-target="#reviewModal"
                                                                data-seller_id="<?php echo e($order->seller_id); ?>"
                                                                data-service_id="<?php echo e($order->service_id); ?>"
                                                                data-order_id="<?php echo e($order->id); ?>"
                                                               class="review_add_modal"
                                                            >
                                                                <span class="icon eye-icon" data-toggle="tooltip" data-placement="top" title="<?php echo e(__('Review')); ?>">
                                                                    <i class="las la-star"></i>
                                                                </span>
                                                            </a>
                                                            <?php endif; ?>
                                                            <a href="<?php echo e(route('buyer.order.details', $order->id)); ?>">
                                                                <span class="icon eye-icon" data-toggle="tooltip" data-placement="top" title="<?php echo e(__('View Details')); ?>">
                                                                    <i class="las la-eye"></i>
                                                                </span>
                                                            </a>
                                                            <?php if($order->is_order_online != 1): ?>
                                                                 <?php if($order->buyer_id != NULL): ?>
                                                                    <a href="<?php echo e(route('buyer.support.ticket.new', $order->id)); ?>">
                                                                        <span class="icon eye-icon" data-toggle="tooltip" data-placement="top" title="<?php echo e(__('New Ticket')); ?>">
                                                                            <i class="las la-ticket-alt"></i>
                                                                        </span>
                                                                    </a>
                                                                <?php endif; ?>
                                                            <?php else: ?> 
                                                                <?php if(!empty($order->online_order_ticket->id)): ?>
                                                                 <a href="<?php echo e(route('buyer.support.ticket.view',optional($order->online_order_ticket)->id)); ?>">
                                                                    <span class="icon eye-icon" data-toggle="tooltip" data-placement="top" title="<?php echo e(__('View Ticket')); ?>">
                                                                        <i class="las la-eye-slash"></i>
                                                                    </span>
                                                                </a>
                                                                <?php endif; ?>
                                                            <?php endif; ?>
                                                            <a href="<?php echo e(route('buyer.order.invoice.details',$order->id)); ?>">
                                                                <span class="icon print-icon" data-toggle="tooltip" data-placement="top" title="<?php echo e(__('Print Pdf')); ?>"> 
                                                                    <i class="las la-print"></i>
                                                                </span>
                                                            </a>
                                                            <?php if($order->status != 2): ?>
                                                            <a href="#"
                                                               data-toggle="modal"
                                                               data-target="#reportModal"
                                                               data-seller_id="<?php echo e($order->seller_id); ?>"
                                                               data-service_id="<?php echo e($order->service_id); ?>"
                                                               data-order_id="<?php echo e($order->id); ?>"
                                                               class="report_add_modal">
                                                                <span class="icon print-icon" data-toggle="tooltip" data-placement="top" title="<?php echo e(__('Report')); ?>">
                                                                    <i class="las la-file"></i>
                                                                </span>
                                                            </a>
                                                            <?php endif; ?>
                                                        </td>    
                                                    </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="blog-pagination margin-top-55">
                                        <div class="custom-pagination mt-4 mt-lg-5">
                                            <?php echo $orders->links(); ?>

                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                <?php else: ?> 
                <h2 class="no_data_found"><?php echo e(__('No Orders Found')); ?></h2>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <!--Status Modal -->
    <div class="modal fade" id="reviewModal" tabindex="-1" role="dialog" aria-labelledby="editModal"
         aria-hidden="true">
        <form action="<?php echo e(route('service.review.from.dashboard')); ?>" method="post">
            <?php echo csrf_field(); ?>
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModal"><?php echo e(__('Review')); ?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="comments-flex-item">
                            <div class="single-commetns" style="font-size: 1em;">
                                <label class="comment-label"> <?php echo e(__('Ratings*')); ?> </label>
                                <div id="review"></div>
                            </div>
                            <input type="hidden" id="rating" name="rating" class="form-control form-control-sm">
                            <input type="hidden" id="seller_id" name="seller_id" class="form-control form-control-sm">
                            <input type="hidden" id="service_id" name="service_id" class="form-control form-control-sm">
                            <input type="hidden" id="order_id" name="order_id" class="form-control form-control-sm">
                        </div>
                        <div class="form-group">
                            <label class="payout-request-note d-block pt-4" for="amount"><?php echo e(__('Comments')); ?></label>
                            <textarea id="message" rows="5" name="message" class="form-control form--message" placeholder="<?php echo e(__('Post Comments')); ?>"></textarea>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo e(__('Close')); ?></button>
                        <button type="submit" class="btn btn-primary"><?php echo e(__('Send Review')); ?></button>
                    </div>
                </div>
            </div>
        </form>
    </div>

   
    <div class="modal fade" id="reportModal" tabindex="-1" role="dialog" aria-labelledby="editReportModal"
         aria-hidden="true">
        <form action="<?php echo e(route('buyer.order.report')); ?>" method="post">
            <?php echo csrf_field(); ?>
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModal"><?php echo e(__('Report')); ?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="comments-flex-item">
                            <input type="hidden" id="seller_id" name="seller_id" class="form-control form-control-sm">
                            <input type="hidden" id="service_id" name="service_id" class="form-control form-control-sm">
                            <input type="hidden" id="order_id" name="order_id" class="form-control form-control-sm">
                        </div>
                        <div class="form-group">
                            <label class="payout-request-note d-block pt-4" for="amount"><?php echo e(__('Report Us')); ?></label>
                            <textarea id="report" rows="5" name="report" class="form-control form--message" placeholder="<?php echo e(__('Report Here')); ?>"></textarea>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo e(__('Close')); ?></button>
                        <button type="submit" class="btn btn-primary"><?php echo e(__('Send Report')); ?></button>
                    </div>
                </div>
            </div>
        </form>
    </div>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('scripts'); ?>
    <script src="<?php echo e(asset('assets/backend/js/sweetalert2.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/frontend/js/rating.js')); ?>"></script>
    <script>
        (function($) {
            "use strict";

            $(document).ready(function() {
            //order complete status approve
            $(document).on('click','.swal_status_change',function(e){
                e.preventDefault();
                    Swal.fire({
                    title: '<?php echo e(__("Are you sure to change status? Once you done you can not revert this !!")); ?>',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: "<?php echo e(__('Yes, change it!')); ?>"
                    }).then((result) => {
                    if (result.isConfirmed) {
                        $(this).next().find('.swal_form_submit_btn').trigger('click');
                    }
                    });
                });

                $(document).on('click', '.review_add_modal', function () {
                    let el = $(this);
                    let seller_id = el.data('seller_id');
                    let service_id = el.data('service_id');
                    let order_id = el.data('order_id');
                    let form = $('#reviewModal');
                    form.find('#seller_id').val(seller_id);
                    form.find('#service_id').val(service_id);
                    form.find('#order_id').val(order_id);
                });

                $("#review").rating({
                    "value": 5,
                    "click": function (e) {
                        $("#rating").val(e.stars);
                    }
                });

                //report us
                $(document).on('click', '.report_add_modal', function () {
                    let el = $(this);
                    let seller_id = el.data('seller_id');
                    let service_id = el.data('service_id');
                    let order_id = el.data('order_id');
                    let form = $('#reportModal');
                    form.find('#seller_id').val(seller_id);
                    form.find('#service_id').val(service_id);
                    form.find('#order_id').val(order_id);
                });

            });

        })(jQuery);
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.user.buyer.buyer-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\qixer-master\resources\views/frontend/user/buyer/order/orders.blade.php ENDPATH**/ ?>