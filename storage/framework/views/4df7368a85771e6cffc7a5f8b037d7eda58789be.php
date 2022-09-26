
<?php
$footer_variant = !is_null(get_footer_style()) ? get_footer_style() : '02';
?>
<?php echo $__env->make('frontend.partials.pages-portion.footers.footer-'.$footer_variant, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php if(preg_match('/(bytesed)/',url('/'))): ?>
<script type="text/javascript"> adroll_adv_id = "GXM5SRU2XZE7JOKGHSZPSZ"; adroll_pix_id = "WP43YTLBS5BQXDP6XUEIC7"; adroll_version = "2.0";  (function(w, d, e, o, a) { w.__adroll_loaded = true; w.adroll = w.adroll || []; w.adroll.f = [ 'setProperties', 'identify', 'track' ]; var roundtripUrl = "https://s.adroll.com/j/" + adroll_adv_id + "/roundtrip.js"; for (a = 0; a < w.adroll.f.length; a++) { w.adroll[w.adroll.f[a]] = w.adroll[w.adroll.f[a]] || (function(n) { return function() { w.adroll.push([ n, arguments ]) } })(w.adroll.f[a]) }  e = d.createElement('script'); o = d.getElementsByTagName('script')[0]; e.async = 1; e.src = roundtripUrl; o.parentNode.insertBefore(e, o); })(window, document); adroll.track("pageView"); </script>
    <div class="buy-now-wrap">
        <ul class="buy-list">
            <li><a target="_blank"href="https://bytesed.com/docs-category/quixer-on-demand-service-marketplace-and-service-finder/" data-container="body" data-toggle="popover" data-placement="left" data-content="<?php echo e(__('Documentation')); ?>"><i class="lar la-file-alt"></i></a></li>
            <li><a target="_blank"href="https://codecanyon.net/item/qixer-multivendor-on-demand-service-marketplace-and-service-finder/36475708"><i class="las la-shopping-cart"></i></a></li>
            <li><a target="_blank"href="https://xgenious51.freshdesk.com/"><i class="las la-headset"></i></a></li>
        </ul>
    </div>
<?php endif; ?>

<!-- back to top area start -->
<div class="back-to-top <?php echo e($page_post->back_to_top ?? ''); ?>">
    <span class="back-top"><i class="las la-angle-up"></i></span>
</div>
<!-- back to top area end -->


<script src="<?php echo e(asset('assets/frontend/js/slick.js')); ?>"></script>
<script src="<?php echo e(asset('assets/frontend/js/bootstrap.bundle.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/frontend/js/wow.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/frontend/js/jquery.magnific-popup.js')); ?>"></script>
<script src="<?php echo e(asset('assets/frontend/js/jquery.nice-select.js')); ?>"></script>
<script src="<?php echo e(asset('assets/frontend/js/main.js')); ?>"></script>
<script src="<?php echo e(asset('assets/frontend/js/dynamic-script.js')); ?>"></script>
<script src="<?php echo e(asset('assets/frontend/js/jquery.ihavecookies.min.js')); ?>"></script>
<script>
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>'
    }
});
</script>

<?php echo $__env->make('frontend.pages.services.partials.service-search', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('frontend.partials.home-search', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('frontend.partials.inline-scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('frontend.partials.gdpr-cookie', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php if(!empty( get_static_option('tawk_api_key'))): ?>
 <?php echo get_static_option('tawk_api_key'); ?>

 <?php endif; ?>

<?php if(!empty(get_static_option('site_google_captcha_v3_site_key'))  ): ?>
    <script src="https://www.google.com/recaptcha/api.js?render=<?php echo e(get_static_option('site_google_captcha_v3_site_key')); ?>"></script>
    <script>
        (function() {
            "use strict";
            grecaptcha.ready(function () {
                grecaptcha.execute("<?php echo e(get_static_option('site_google_captcha_v3_site_key')); ?>", {action: 'homepage'}).then(function (token) {
                    if(document.getElementById('gcaptcha_token') != null){
                        document.getElementById('gcaptcha_token').value = token;
                    }
                });
            });

        })(jQuery);
    </script>
<?php endif; ?>


<script src="<?php echo e(asset('assets/common/js/toastr.min.js')); ?>"></script>
<?php echo Toastr::message(); ?>



<script>
    $('[data-toggle="tooltip"]').tooltip()
</script>
<?php if(request()->routeIs('frontend.order.payment.success')): ?>
<script>
    var myCalendar = createCalendar({
        options: {
            class: 'my-class',
            // You can pass an ID. If you don't, one will be generated for you
            id: 'my-id'
        },
        data: {
            // Event title
            title: "<?php echo e(optional($order_details->service)->title); ?>",

            // Event start date
            start: new Date('<?php echo e(Carbon\Carbon::parse($order_details->date)->format('F d, Y H:i')); ?>'),

            // Event duration (IN MINUTES)
            Minutes: 120,

            // You can also choose to set an end time
            // If an end time is set, this will take precedence over duration
            end: new Date('<?php echo e(Carbon\Carbon::parse($order_details->date)->format('F d, Y H:i')); ?>'),

            // Event Address
            address: "<?php echo e(optional($order_details->buyer)->address); ?>",

            // Event Description
            description: 'Order Sucessfully Created'
        }
    });

    document.querySelector('.new-cal').appendChild(myCalendar);
</script>
<?php endif; ?>

<?php echo $__env->yieldContent('scripts'); ?>

</body>
</html>
<?php /**PATH C:\xampp\htdocs\qixer-master\resources\views/frontend/partials/footer.blade.php ENDPATH**/ ?>