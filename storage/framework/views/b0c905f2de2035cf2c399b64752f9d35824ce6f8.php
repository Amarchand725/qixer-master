<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link href="https://fonts.cdnfonts.com/css/gilroy-bold" rel="stylesheet">
<style>
    * {
        font-family: 'Gilroy-Medium';
    }
</style>
<?php
    $site_favicon = get_attachment_image_by_id(get_static_option('site_favicon'),"full",false);
?>
<?php if(!empty($site_favicon)): ?>
    <link rel="icon" href="<?php echo e($site_favicon['img_url']); ?>" type="image/png">
<?php endif; ?>
<!-- CSRF Token -->
<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
<?php /**PATH C:\xampp\htdocs\qixer-master\resources\views/frontend_new/includes/partials/head.blade.php ENDPATH**/ ?>