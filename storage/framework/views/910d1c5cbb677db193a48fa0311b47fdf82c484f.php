<?php $__env->startSection('site-title'); ?>
    <?php echo e(__('User Login')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="signup-area padding-top-70 padding-bottom-100">
    <div class="container">
        <div class="signup-wrapper">
            <div class="signup-contents">
                <h3 class="signup-title"> <?php echo e(get_static_option('login_form_title') ?? __('Login to your account')); ?></h3>

                <?php if(Session::has('msg')): ?>
                <p class="alert alert-<?php echo e(Session::get('type') ?? 'success'); ?>"><?php echo e(Session::get('msg')); ?></p>
                <?php endif; ?>
                <div class="error-message"></div>

                <form class="signup-forms" action="<?php echo e(route('user.login')); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <div class="single-signup margin-top-30">
                        <label class="signup-label"> <?php echo e('Username or Email *'); ?> </label>
                        <input class="form--control" type="text" name="username" id="username" placeholder="<?php echo e(__('Username or Email')); ?>">
                    </div>
                    <div class="single-signup margin-top-30">
                        <label class="signup-label"> <?php echo e(__('Password*')); ?> </label>
                        <input class="form--control" type="password" name="password" id="password" placeholder="<?php echo e(__('Password')); ?>">
                    </div>
                    <div class="signup-checkbox">
                        <div class="checkbox-inlines">
                            <input class="check-input" name="remember" id="remember" type="checkbox" id="check8">
                            <label class="checkbox-label" for="remember"> <?php echo e(__('Remember me ')); ?></label>
                        </div>
                        <div class="forgot-btn">
                            <a href="<?php echo e(route('user.forget.password')); ?>" class="forgot-pass"> <?php echo e(__('Forgot Password ')); ?></a>
                        </div>
                    </div>
                    <button id="signin_form" type="submit"><?php echo e(__('Login Now')); ?></button>
                    <span class="bottom-register"> <?php echo e(__('Do not have Account?')); ?> <a class="resgister-link" href="<?php echo e(route('user.register')); ?>"> Register </a> </span>
                </form>

                <div class="social-login-wrapper">
                    <?php if(get_static_option('enable_google_login') || get_static_option('enable_facebook_login')): ?>
                    <div class="bar-wrap">
                        <span class="bar"></span>
                        <p class="or"><?php echo e(__('or')); ?></p>
                        <span class="bar"></span>
                    </div>
                    <?php endif; ?>

                    <div class="sin-in-with">
                        <?php if(get_static_option('enable_google_login')): ?>
                        <a href="<?php echo e(route('login.google.redirect')); ?>" class="sign-in-btn">
                            <img src="<?php echo e(asset('assets/frontend/img/static/google.png')); ?>" alt="icon">
                            <?php echo e(__('Sign in with Google')); ?>

                        </a>
                        <?php endif; ?>
                        <?php if(get_static_option('enable_facebook_login')): ?>
                        <a href="<?php echo e(route('login.facebook.redirect')); ?>" class="sign-in-btn">
                            <img src="<?php echo e(asset('assets/frontend/img/static/facebook.png')); ?>" alt="icon">
                            <?php echo e(__('Sign in with Facebook')); ?>

                        </a>
                        <?php endif; ?>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <script>
        "use strict";
        $(document).ready(function () {
            $(document).on('click','#signin_form',function (e){
                e.preventDefault();
                var el = $(this);
                var erContainer = $(".error-message");
                erContainer.html('');
                el.text('<?php echo e(__('Please Wait..')); ?>');
                $.ajax({
                    url: "<?php echo e(route('user.login')); ?>",
                    type: "POST",
                    data: {
                        username : $('#username').val(),
                        password : $('#password').val(),
                        remember : $('#remember').val(),
                    },
                    error:function(data){
                        var errors = data.responseJSON;
                        erContainer.html('<div class="alert alert-danger"></div>');
                        $.each(errors.errors, function(index,value){
                            erContainer.find('.alert.alert-danger').append('<p>'+value+'</p>');
                        });
                        el.text('<?php echo e(__('Login')); ?>');
                    },
                    success:function (data){
                        $('.alert.alert-danger').remove();
                        if (data.status == 'seller-login'){
                            el.text('<?php echo e(__('Redirecting')); ?>..');
                            erContainer.html('<div class="alert alert-'+data.type+'">'+data.msg+'</div>');
                            window.location = "<?php echo e(route('seller.dashboard')); ?>";
                        }else if (data.status == 'buyer-login'){
                            el.text('<?php echo e(__('Redirecting')); ?>..');
                            erContainer.html('<div class="alert alert-'+data.type+'">'+data.msg+'</div>');
                            window.location = "<?php echo e(route('buyer.dashboard')); ?>";
                        }
                        else{
                            erContainer.html('<div class="alert alert-'+data.type+'">'+data.msg+'</div>');
                            el.text('<?php echo e(__('Login')); ?>');
                        }
                    }
                });
            });
           
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.frontend-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\qixer-master\resources\views/frontend/user/login.blade.php ENDPATH**/ ?>