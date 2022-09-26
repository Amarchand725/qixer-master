<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;


// frontend starts
Route::group(['middleware' => ['globalVariable', 'maintains_mode','setlang']], function () {

    Route::get('/', 'FrontendController@new_homepage')->name('new_homepage');
    Route::get('/sub-categories/{category}', 'FrontendController@get_sub_categories')->name('get_sub_categories');
    Route::get('/schedule-meeting/{subcategory}', 'FrontendController@get_schedule_meeting')->name('get_schedule_meeting');

    Route::get('/old-homepage', 'FrontendController@index')->name('homepage');
    Route::get('/home-search', 'FrontendController@home_search')->name('frontend.home.search');
    Route::get('/home-search-two', 'FrontendController@home_search_two')->name('frontend.home.search.two');
    Route::get('/home-search/single-page', 'FrontendController@home_search_single_page')->name('frontend.home.search.single');

    //  blog routes
    $blog_page_slug = getSlugFromReadingSetting('blog_page') ?? 'blog';
    Route::group(['prefix' => $blog_page_slug, 'namespace' => 'Frontend'], function () {
        Route::get('/{slug}', 'BlogController@blog_single')->name('frontend.blog.single');
        Route::post('/post-blog-comment', 'BlogController@blog_comment')->name('frontend.blog.comment');
        Route::post('/sign-in-for-blog-comment', 'BlogController@signin_for_blog_comment')->name('frontend.blog.comment.signin');
        Route::get('/category/{slug?}', 'BlogController@category_wise_blog_page')->name('frontend.blog.category');
        Route::get('/tags/{tag_name?}', 'BlogController@tags_wise_blog_page')->name('frontend.blog.tags');
    });

    //user login register forget password
    Route::match(['get', 'post'], '/register', 'Auth\RegisterController@userRegister')->name('user.register');
    Route::match(['get', 'post'], '/email-verify', 'Auth\RegisterController@emailVerify')->name('email.verify')->middleware('auth:web');
    Route::get('/resend-verify-code-again', 'Auth\RegisterController@resendCode')->name('resend.verify.code')->middleware('auth:web');
    Route::post('/get-city-by-country', 'Auth\RegisterController@getCity')->name('user.country.city');
    Route::post('/get-area-by-city', 'Auth\RegisterController@getAarea')->name('user.city.area');
    Route::match(['get', 'post'], '/login', 'Auth\LoginController@userLogin')->name('user.login');
    Route::post( '/login-for-online', 'Auth\LoginController@userLoginOnline')->name('user.login.online');
    Route::match(['get', 'post'], 'user/forget-password', 'Auth\LoginController@userForgetPassword')->name('user.forget.password');

    //social login 
    Route::group(['prefix' => 'facebook'], function () {
        Route::get('callback', 'Frontend\SocialLoginController@facebook_callback')->name('facebook.callback');
        Route::get('redirect', 'Frontend\SocialLoginController@facebook_redirect')->name('login.facebook.redirect');
    });
    Route::group(['prefix' => 'google'], function () {
        Route::get('callback', 'Frontend\SocialLoginController@google_callback')->name('google.callback');
        Route::get('redirect', 'Frontend\SocialLoginController@google_redirect')->name('login.google.redirect');
    });


    Route::group(['prefix' => 'service-list'], function () {
        Route::get('/{slug}', 'Frontend\ServiceListController@serviceDetails')->name('service.list.details');
        Route::get('book-now/{slug}', 'Frontend\ServiceListController@serviceBook')->name('service.list.book');

        Route::post('book-now/get-city-by-country', 'Frontend\ServiceListController@serviceBookGetCity')->name('service.list.book.city');
        Route::post('book-now/get-area-by-city', 'Frontend\ServiceListController@serviceBookGetArea')->name('service.list.book.area');

        Route::post('book-now/get-schedules-by-day', 'Frontend\ServiceListController@scheduleByDay')->name('service.schedule.by.day');
        Route::post('book-now/create-order', 'Frontend\ServiceListController@createOrder')->name('service.create.order');

        Route::get('book-now/coupon/coupon-apply', 'Frontend\ServiceListController@couponApply')->name('service.coupon.apply');

        Route::post('service-review-add', 'Frontend\ServiceListController@serviceReviewAdd')->name('service.review.add');
        Route::get('seller/all-services/{seller_id?}', 'Frontend\ServiceListController@sellerAllServices')->name('seller.service.all');
        
        //all service search
        Route::get('all-services/search-by-category', 'Frontend\ServiceListController@allSearchByCategory')->name('all.service.search.category');
        Route::get('all-services/search-by-subcategory', 'Frontend\ServiceListController@allSearchBySubcategory')->name('all.service.search.subcategory');
        Route::get('all-services/search-by-rating', 'Frontend\ServiceListController@allSearchByRating')->name('all.service.search.rating');
        Route::get('all-services/search-by-sorting', 'Frontend\ServiceListController@allSearchBySorting')->name('all.service.search.sorting');


        //seller service search
        Route::get('seller-all-services/search-by-category', 'Frontend\ServiceListController@searchByCategory')->name('service.search.category');
        Route::get('seller-all-services/search-by-subcategory', 'Frontend\ServiceListController@searchBySubcategory')->name('service.search.subcategory');
        Route::get('seller-all-services/search-by-rating', 'Frontend\ServiceListController@searchByRating')->name('service.search.rating');
        Route::get('seller-all-services/search-by-sorting', 'Frontend\ServiceListController@searchBySorting')->name('service.search.sorting');
        
        //all featured service
        Route::get('featured-service/all', 'Frontend\ServiceListController@allfeaturedService')->name('service.all.featured');
        //all popular service
        Route::get('popular-service/all', 'Frontend\ServiceListController@allPopularService')->name('service.all.popular');
        //category wise service 
        Route::get('category/{slug?}', 'Frontend\ServiceListController@categoryServices')->name('service.list.category');
    });

    //all category
    Route::get('category-and-subcategory/all', 'Frontend\ServiceListController@allCategory')->name('all.category.subcategory');

    //payment status route
    Route::get('/order-success/{id}','Frontend\ServiceListController@order_payment_success')->name('frontend.order.payment.success');
    Route::get('/order-cancel/{id}','FrontendController@order_payment_cancel')->name('frontend.order.payment.cancel');
    Route::get('/order-cancel-static','Frontend\ServiceListController@order_payment_cancel_static')->name('frontend.order.payment.cancel.static');
    
    //stripe
    Route::post('stripe', 'StripePaymentController@stripePost')->name('stripe.post');

    //paypal
    Route::get('payment', 'PayPalController@payment')->name('payment');
    Route::get('cancel', 'PayPalController@cancel')->name('payment.cancel');
    Route::get('payment/success', 'PayPalController@success')->name('payment.success');

    //razorpay
    // Route::get('razorpay-payment', [RazorpayPaymentController::class, 'index']);
    Route::post('razorpay-payment', 'RazorpayPaymentController@store')->name('razorpay.payment.store');

    //order payment routes 
    Route::get('/paypal/ipn','ServicePaymentController@paypal_ipn')->name('frontend.paypal.ipn');
    Route::post('/paytm/ipn','ServicePaymentController@paytm_ipn')->name('frontend.paytm.ipn');
    Route::get('/paystack/ipn','ServicePaymentController@paystack_ipn')->name('frontend.paystack.ipn');
    Route::get('/mollie/ipn','ServicePaymentController@mollie_ipn')->name('frontend.mollie.ipn');
    Route::get('/stripe/ipn','ServicePaymentController@stripe_ipn')->name('frontend.stripe.ipn');
    Route::post('/razorpay/ipn','ServicePaymentController@razorpay_ipn')->name('frontend.razorpay.ipn');
    Route::get('/flutterwave/ipn','ServicePaymentController@flutterwave_ipn')->name('frontend.flutterwave.ipn');
    Route::get('/midtrans/ipn','ServicePaymentController@midtrans_ipn')->name('frontend.midtrans.ipn');
    Route::post('/payfast/ipn','ServicePaymentController@payfast_ipn')->name('frontend.payfast.ipn');
    Route::post('/cashfree/ipn','ServicePaymentController@cashfree_ipn')->name('frontend.cashfree.ipn');
    Route::get('/instamojo/ipn','ServicePaymentController@instamojo_ipn')->name('frontend.instamojo.ipn');
    Route::get('/marcadopago/ipn','ServicePaymentController@marcadopago_ipn')->name('frontend.marcadopago.ipn');
    
});

// frontend ends


// frontend custom form builders
Route::post('submit-custom-form', 'FrontendFormController@custom_form_builder_message')->name('frontend.form.builder.custom.submit');


// admin login
Route::middleware(['setlang'])->group(function () {
    Route::get('/login/admin', 'Auth\LoginController@showAdminLoginForm')->name('admin.login');
    Route::get('/login/admin/forget-password', 'FrontendController@showAdminForgetPasswordForm')->name('admin.forget.password');
    Route::get('/login/admin/reset-password/{user}/{token}', 'FrontendController@showAdminResetPasswordForm')->name('admin.reset.password');
    Route::post('/login/admin/reset-password', 'FrontendController@AdminResetPassword')->name('admin.reset.password.change');
    Route::post('/login/admin/forget-password', 'FrontendController@sendAdminForgetPasswordMail');
    Route::get('/logout/admin', 'AdminDashboardController@adminLogout')->name('admin.logout');
    Route::post('/login/admin', 'Auth\LoginController@adminLogin');
});

Route::group(['middleware' => ['setlang', 'globalVariable', 'maintains_mode']], function () {
    Route::get('/{slug}', 'FrontendController@dynamic_single_page')->name('frontend.dynamic.page');
    Route::get('/{username?}', 'FrontendController@dynamic_single_page')->name('about.seller.profile');
});

Route::group(['middleware'=>['auth','inactiveuser']],function(){

    // media upload routes for User
    Route::group(['namespace'=>'User'],function(){
        Route::post('/media-upload/all','MediaUploadController@all_upload_media_file')->name('web.upload.media.file.all');
        Route::post('/media-upload','MediaUploadController@upload_media_file')->name('web.upload.media.file');
        Route::post('/media-upload/alt','MediaUploadController@alt_change_upload_media_file')->name('web.upload.media.file.alt.change');
        Route::post('/media-upload/delete','MediaUploadController@delete_upload_media_file')->name('web.upload.media.file.delete');
        Route::post('/media-upload/loadmore', 'MediaUploadController@get_image_for_loadmore')->name('web.upload.media.file.loadmore');
    });

});


require_once __DIR__ . '/seller.php';
require_once __DIR__ . '/buyer.php';
