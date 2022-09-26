
<?php $__env->startSection('styles'); ?>
    <style>
        .card {
            border: 10px solid;
            border-image-slice: 1;
            border-width: 5px;
            border-image-source: linear-gradient(to top, #743ad5, #d53a9d);
        }

        .img_style {
            height: 40px;
        }
    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-12 mt-3" style="text-align: center; color: white">
            <h2>Select your desired Service</h2>
        </div>
        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-md-3 mt-5">
                <div class="card">
                    <a href="<?php echo e(route('get_sub_categories', ['category' => $category->id])); ?>">
                        <div class="card-body add">
                            <div class="row" style="text-align: center">
                                <div class="col-md-12">
                                    <?php echo render_image_markup_by_attachment_id($category->image,'img_style','thumb'); ?>

                                </div>
                                <div class="col-md-12 mt-2">
                                    <h4><?php echo e($category->name); ?></h4>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend_new.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\qixer-master\resources\views/frontend_new/frontend-home.blade.php ENDPATH**/ ?>