<?php $__env->startSection('site-title'); ?>
    <?php echo e(__('Stripe Gateway Payment')); ?>

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
                                <h2 class="dashboards-title"> <?php echo e(__('Payment Details')); ?> </h2>
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
                            <div class="col-sm-6">
                                <div class="card card-default">
                                    <div class="card-header">
                                        <h5><b><img src="<?php echo e(asset('assets/frontend/payment-logos/paypal-logo.png')); ?>" height="30px" width="50px" alt="">  Payment by PayPal Payment Gateway</b></h5>
                                    </div>
        
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
                                        <h5 class="card-title">Milestone (<?php echo e($project_details->name); ?>)</h5>
                                        <table class="table">
                                            <tr>
                                                <td>Milestone Cost</td>
                                                <td>$<?php echo e(number_format($project_details->total_cost, 2)); ?></td>
                                            </tr>
                                            <tr>
                                                <td>Timeframe</td>
                                                <td>(<?php echo e($project_details->timeframe); ?> days)</td>
                                            </tr>
                                            <tr>
                                                <td>Status</td>
                                                <td>
                                                    <?php if($project_details->status==0): ?>
                                                        <span class="badge badge-warning" style="color:white">Pending</span>
                                                    <?php elseif($project_details->status==1): ?>
                                                        <span class="badge badge-info" style="color:white">Started</span>
                                                    <?php elseif($project_details->status==2): ?>
                                                        <span class="badge badge-success" style="color:white">Completed</span>
                                                    <?php elseif($project_details->status==3): ?>
                                                        <span class="badge badge-danger" style="color:white">Rejected</span>
                                                    <?php endif; ?>
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
<?php $__env->stopSection(); ?>  

<?php $__env->startSection('scripts'); ?>
    <script src="https://www.paypal.com/sdk/js?client-id=ARGPGmeK4eC62SzCywu89ttnlcVufwsgRmBpQrhcRy4EFPeYscBt12fQXxgp7XRn9QQiuAhhWf8pSVTP"></script>
    <script src="https://www.paypalobjects.com/api/checkout.js"></script>
    <script>
        paypal.Buttons({
        // Sets up the transaction when a payment button is clicked
        createOrder: (data, actions) => {
          return actions.order.create({
            purchase_units: [{
              amount: {
                value: '<?php echo e($project_details->total_cost); ?>' // Can also reference a variable or function
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

            $.ajax({
               type:'POST',
               url:'<?php echo e(route("stripe.post")); ?>',
               data:'_token = <?php echo csrf_token() ?>',
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.user.buyer.buyer-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\qixer-master\resources\views/frontend/user/buyer/activity/payment/paypal_gateway.blade.php ENDPATH**/ ?>