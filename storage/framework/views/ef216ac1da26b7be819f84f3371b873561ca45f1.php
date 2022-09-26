<!DOCTYPE html>
<html lang="en">
<head>
    <title>Home | Qixer</title>
    <?php echo $__env->make('frontend_new.includes.partials.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <style>
        .body-image {
            background-image: url("../assets/frontend/bg/bg-asset-1.png");
            height: 100vh;
        }
        #navbarNav ul li a {
            color: white;
            font-size: 18px;
        }
    </style>
    <?php echo $__env->make('frontend_new.includes.partials.styles', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</head>
<body class="bg-image body-image" id="body-image">

<?php echo $__env->make('frontend_new.includes.partials.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="container">
    <?php echo $__env->yieldContent('content'); ?>
</div><!-- End #main -->
<?php echo $__env->make('frontend_new.includes.partials.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('frontend_new.includes.partials.scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>
</html>

<?php /**PATH C:\xampp\htdocs\qixer-master\resources\views/frontend_new/layouts/master.blade.php ENDPATH**/ ?>