<?php if(Auth::guard('web')->check()): ?>
<div class="login-account">
    <li>
        <div class="info-bar-item-two">
            <div class="author-thumb">
                <?php if(!empty(Auth::guard('web')->user()->image)): ?>
                    <?php echo render_image_markup_by_attachment_id(Auth::guard('web')->user()->image); ?>

                <?php else: ?>
                    <i class="las la-user"></i>
                <?php endif; ?>
                
            </div>
            <a class="accounts loggedin" href="javascript:void(0)">
                <span class="title"> <?php echo e(Auth::guard('web')->user()->name); ?> </span>
            </a>
            <ul class="account-list-item mt-2">
                <li class="list"> 
                    <?php if(Auth::guard('web')->user()->user_type==0): ?>
                    <a href="<?php echo e(route('seller.dashboard')); ?>"> <?php echo e(__('Dashboard')); ?> </a> 
                    <?php else: ?> 
                    <a href="<?php echo e(route('buyer.dashboard')); ?>"> <?php echo e(__('Dashboard')); ?> </a> 
                    <?php endif; ?>
                </li>
                <li class="list"> <a href="<?php echo e(route('seller.logout')); ?>"> <?php echo e(__('Logout')); ?> </a> </li>
            </ul>
        </div>
    </li>
</div>
<?php else: ?>
    <div class="login-account">
        <a class="accounts" href="javascript:void(0)"> <span class="account"><?php echo e(__('Account')); ?></span> <i class="las la-user"></i> </a>
        <ul class="account-list-item mt-2">
            <li class="list"> <a href="<?php echo e(route('user.register')); ?>"> <?php echo e(__('Sign Up')); ?> </a> </li>
            <li class="list"> <a href="<?php echo e(route('user.login')); ?>"><?php echo e(__('Sign In')); ?> </a> </li>
        </ul>
    </div>
<?php endif; ?>


<?php /**PATH C:\xampp\htdocs\qixer-master\resources\views/components/frontend/user-menu.blade.php ENDPATH**/ ?>