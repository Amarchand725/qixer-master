<?php
use Illuminate\Support\Facades\Route;

Route::middleware(['setlang'])->group(function(){
    

/*----------------------------------------------------------------------------------------------------------------------------
                                                     ADMIN PANEL ROUTES
----------------------------------------------------------------------------------------------------------------------------*/
    Route::get('/', 'AdminDashboardController@adminIndex')->name('admin.home');
    Route::get('/dark-mode-toggle', 'AdminDashboardController@dark_mode_toggle')->name('admin.dark.mode.toggle');
  
    Route::get('/media-upload/page','MediaUploadController@all_upload_media_images_for_page')->name('admin.upload.media.images.page');
    Route::post('/media-upload/delete','MediaUploadController@delete_upload_media_file')->name('admin.upload.media.file.delete');

    /*--------------------------
      PAGE BUILDER
    --------------------------*/
    Route::post('/update', 'PageBuilderController@update_addon_content')->name('admin.page.builder.update');
    Route::post('/new', 'PageBuilderController@store_new_addon_content')->name('admin.page.builder.new');
    Route::post('/delete', 'PageBuilderController@delete')->name('admin.page.builder.delete');
    Route::post('/update-order', 'PageBuilderController@update_addon_order')->name('admin.page.builder.update.addon.order');
    Route::post('/get-admin-markup', 'PageBuilderController@get_admin_panel_addon_markup')->name('admin.page.builder.get.addon.markup');

    /*----------------------------------------------------------------------------------------------------------------------------
    |  BLOG AREA
    |----------------------------------------------------------------------------------------------------------------------------*/
    Route::group(['prefix'=>'blog'],function() {
        Route::get('/', 'BlogController@index')->name('admin.blog');
        Route::get('/new', 'BlogController@new_blog')->name('admin.blog.new');
        Route::post('/new', 'BlogController@store_new_blog');
        Route::get('/get/tags','BlogController@get_tags_by_ajax')->name('admin.get.tags.by.ajax');
        Route::get('/edit/{id}', 'BlogController@edit_blog')->name('admin.blog.edit');
        Route::post('/update/{id}', 'BlogController@update_blog')->name('admin.blog.update');
        Route::post('/clone', 'BlogController@clone_blog')->name('admin.blog.clone');
        Route::post('/delete/all/lang/{id}', 'BlogController@delete_blog_all_lang')->name('admin.blog.delete.all.lang');
        Route::post('/bulk-action', 'BlogController@bulk_action_blog')->name('admin.blog.bulk.action');
        Route::get('/blog-details-settings', 'BlogController@blog_details_settings')->name('admin.blog.details.settings');
        Route::post('/blog-details-settings-update', 'BlogController@blog_details_settings_update')->name('admin.blog.details.settings.update');

        //Trashed & Restore
        Route::get('/trashed', 'BlogController@trashed_blogs')->name('admin.blog.trashed');
        Route::get('/trashed/restore/{id}', 'BlogController@restore_trashed_blog')->name('admin.blog.trashed.restore');
        Route::post('/trashed/delete/{id}', 'BlogController@delete_trashed_blog')->name('admin.blog.trashed.delete');
        Route::post('/trashed/bulk-action', 'BlogController@trashed_bulk_action_blog')->name('admin.blog.trashed.bulk.action');

        //Single Page Settings
        Route::get('/single-settings', 'BlogController@blog_single_page_settings')->name('admin.blog.single.settings');
        Route::post('/single-settings', 'BlogController@update_blog_single_page_settings');

        //Others Page Settings
        Route::get('/others-settings', 'BlogController@blog_others_page_settings')->name('admin.blog.others.settings');
        Route::post('/others-settings', 'BlogController@update_blog_others_page_settings');

        Route::post('/blog-approve', 'BlogController@blog_approve')->name('admin.blog.approve');
    });

    //BACKEND BLOG CATEGORY AREA
    Route::group(['prefix'=>'blog-category'],function(){
        Route::get('/','BlogCategoryController@index')->name('admin.blog.category');
        Route::post('/store','BlogCategoryController@new_category')->name('admin.blog.category.store');
        Route::post('/update','BlogCategoryController@update_category')->name('admin.blog.category.update');
        Route::post('/delete/all/lang/{id}','BlogCategoryController@delete_category_all_lang')->name('admin.blog.category.delete.all.lang');
        Route::post('/bulk-action', 'BlogCategoryController@bulk_action')->name('admin.blog.category.bulk.action');
    });

    //BACKEND BLOG TAGS
    Route::group(['prefix'=>'blog-tags'],function(){
        Route::get('/','BlogTagsController@index')->name('admin.blog.tags');
        Route::post('/store','BlogTagsController@new_tags')->name('admin.blog.tags.store');
        Route::post('/update','BlogTagsController@update_tags')->name('admin.blog.tags.update');
        Route::post('/delete/all/lang/{id}','BlogTagsController@delete_tags_all_lang')->name('admin.blog.tags.delete.all.lang');
        Route::post('/bulk-action', 'BlogTagsController@bulk_action')->name('admin.blog.tags.bulk.action');
    });

/*----------------------------------------------------------------------------------------------------------------------------
| DYNAMIC PAGE ROUTES
|----------------------------------------------------------------------------------------------------------------------------*/
    Route::group(['prefix'=> 'dynamic-page'],function(){
        Route::get('/','PagesController@index')->name('admin.page');
        Route::get('/new','PagesController@new_page')->name('admin.page.new');
        Route::post('/new','PagesController@store_new_page');
        Route::get('/edit/{id}','PagesController@edit_page')->name('admin.page.edit');
        Route::post('/update/{id}','PagesController@update_page')->name('admin.page.update');
        Route::post('/delete/{id}','PagesController@delete_page')->name('admin.page.delete');
        Route::post('/delete/lang/all/{id}','PagesController@delete_page_lang_all')->name('admin.page.delete.lang.all');
        Route::post('/bulk-action','PagesController@bulk_action')->name('admin.page.bulk.action');
    });

/*----------------------------------------------------------------------------------------------------------------------------
| BRANDS ROUTES
|----------------------------------------------------------------------------------------------------------------------------*/
Route::group(['prefix'=>'brand'],function(){
    Route::get('/','BrandController@brand')->name('admin.brand');
    Route::match(['get','post'],'/add','BrandController@add_brand')->name('admin.brand.add');
    Route::match(['get','post'],'/edit-brand/{id?}','BrandController@edit_brand')->name('admin.brand.edit');
    Route::post('/delete/{id}','BrandController@delete_brand')->name('admin.brand.delete');
    Route::post('/bulk-action', 'BrandController@bulk_action_brand')->name('admin.brand.bulk.action');
});


    /*----------------------------------------------------------------------------------------------------------------------------
    | Slider Routes
    |----------------------------------------------------------------------------------------------------------------------------*/
    Route::group(['prefix'=>'slider'],function(){
        Route::match(['get','post'],'/add-new-slider','SliderController@add_new_slider')->name('admin.slider.new');
        Route::match(['get','post'],'/edit-slider/{id?}','SliderController@edit_slider')->name('admin.slider.edit');
        Route::post('/delete/{id}','SliderController@delete_slider')->name('admin.slider.delete');
        Route::post('/bulk-action', 'SliderController@bulk_action')->name('admin.slider.bulk.action');
    });

/*----------------------------------------------------------------------------------------------------------------------------
| PROJECT ROUTES
|----------------------------------------------------------------------------------------------------------------------------*/
Route::group(['prefix'=>'project'],function(){
    Route::get('/','ProjectController@index')->name('admin.project');
    Route::match(['get','post'],'/add-new-project','ProjectController@add_new_project')->name('admin.project.new');
    Route::match(['get','post'],'/edit-project/{id?}','ProjectController@edit_project')->name('admin.project.edit');
    Route::post('/change-status/{id}','ProjectController@change_status')->name('admin.project.status');
    Route::post('/delete/{id}','ProjectController@delete_project')->name('admin.project.delete');
    Route::post('/bulk-action', 'ProjectController@bulk_action')->name('admin.project.bulk.action');

    Route::get('/admin/project/ajax-new', 'ProjectController@ajaxNew')->name('admin.project.ajax-new');
});

Route::group(['prefix'=>'milestone_project'],function(){
    Route::get('/','MilestoneProjectController@index')->name('admin.milestone_project');
    Route::match(['get','post'],'/add-new-project','MilestoneProjectController@add_new_project')->name('admin.milestone_project.new');
    Route::match(['get','post'],'/edit-project/{id?}','MilestoneProjectController@edit_project')->name('admin.milestone_project.edit');
    Route::post('/change-status/{id}','MilestoneProjectController@change_status')->name('admin.milestone_project.status');
    Route::post('/delete/{id}','MilestoneProjectController@delete_project')->name('admin.milestone_project.delete');
    Route::post('/bulk-action', 'MilestoneProjectController@bulk_action')->name('admin.milestone_project.bulk.action');
});


/*----------------------------------------------------------------------------------------------------------------------------
| REQUIREMENTS ROUTES
|----------------------------------------------------------------------------------------------------------------------------*/
Route::group(['prefix'=>'requirement'],function(){
    Route::get('/','RequirementController@index')->name('admin.requirement');
    Route::match(['get','post'],'/add-new-requirement','RequirementController@add_new_requirement')->name('admin.requirement.new');
    Route::match(['get','post'],'/edit-requirement/{id?}','RequirementController@edit_requirement')->name('admin.requirement.edit');
    Route::post('/change-status/{id}','RequirementController@change_status')->name('admin.requirement.status');
    Route::post('/delete/{id}','RequirementController@delete_requirement')->name('admin.requirement.delete');
    Route::post('/bulk-action', 'RequirementController@bulk_action')->name('admin.requirement.bulk.action');
});


/*----------------------------------------------------------------------------------------------------------------------------
| CATEGORY ROUTES
|----------------------------------------------------------------------------------------------------------------------------*/
Route::group(['prefix'=>'category'],function(){
    Route::get('/','CategoryController@index')->name('admin.category');
    Route::match(['get','post'],'/add-new-category','CategoryController@add_new_category')->name('admin.category.new');
    Route::match(['get','post'],'/edit-category/{id?}','CategoryController@edit_category')->name('admin.category.edit');
    Route::post('/change-status/{id}','CategoryController@change_status')->name('admin.category.status');
    Route::post('/delete/{id}','CategoryController@delete_category')->name('admin.category.delete');
    Route::post('/bulk-action', 'CategoryController@bulk_action')->name('admin.category.bulk.action');
});


/*----------------------------------------------------------------------------------------------------------------------------
| SUB CATEGORY ROUTES
|----------------------------------------------------------------------------------------------------------------------------*/
Route::group(['prefix'=>'subcategory'],function(){
    Route::get('/','SubcategoryController@index')->name('admin.subcategory');
    Route::match(['get','post'],'/add-new-subcategory','SubcategoryController@add_new_subcategory')->name('admin.subcategory.new');
    Route::post('/edit-subcategory/{id?}','SubcategoryController@edit_subcategory')->name('admin.subcategory.edit');
    Route::post('/change-status/{id}','SubcategoryController@change_status')->name('admin.subcategory.status');
    Route::post('/delete/{id}','SubcategoryController@delete_subcategory')->name('admin.subcategory.delete');
    Route::post('/bulk-action', 'SubcategoryController@bulk_action')->name('admin.subcategory.bulk.action');
});


/*----------------------------------------------------------------------------------------------------------------------------
| COUNTRY ROUTES
|----------------------------------------------------------------------------------------------------------------------------*/
Route::group(['prefix'=>'country'],function(){
    Route::get('/','LocationController@country')->name('admin.country');
    Route::match(['get','post'],'/add','LocationController@add_country')->name('admin.country.add');
    Route::post('/edit-country/{id?}','LocationController@edit_country')->name('admin.country.edit');
    Route::post('/change-status/{id}','LocationController@change_status_country')->name('admin.country.status');
    Route::post('/delete/{id}','LocationController@delete_country')->name('admin.country.delete');
    Route::post('/bulk-action', 'LocationController@bulk_action_country')->name('admin.country.bulk.action');
});


/*----------------------------------------------------------------------------------------------------------------------------
| CITY ROUTES
|----------------------------------------------------------------------------------------------------------------------------*/
Route::group(['prefix'=>'city'],function(){
    Route::get('/','LocationController@service_city')->name('admin.city');
    Route::match(['get','post'],'/add','LocationController@add_city')->name('admin.city.add');
    Route::match(['get','post'],'/edit-city/{id?}','LocationController@edit_city')->name('admin.city.edit');
    Route::post('/change-status/{id}','LocationController@change_status_city')->name('admin.city.status');
    Route::post('/delete/{id}','LocationController@delete_city')->name('admin.city.delete');
    Route::post('/bulk-action', 'LocationController@bulk_action_city')->name('admin.city.bulk.action');
});


/*----------------------------------------------------------------------------------------------------------------------------
| AREA ROUTES
|----------------------------------------------------------------------------------------------------------------------------*/
Route::group(['prefix'=>'area'],function(){
    Route::get('/','LocationController@area')->name('admin.area');
    Route::match(['get','post'],'/add','LocationController@add_area')->name('admin.area.add');
    Route::match(['get','post'],'/edit-area/{id?}','LocationController@edit_area')->name('admin.area.edit');
    Route::post('/change-status/{id}','LocationController@change_status_area')->name('admin.area.status');
    Route::post('/delete/{id}','LocationController@delete_area')->name('admin.area.delete');
    Route::post('/bulk-action', 'LocationController@bulk_action_area')->name('admin.area.bulk.action');
});


/*----------------------------------------------------------------------------------------------------------------------------
| SERVICES ROUTES
|----------------------------------------------------------------------------------------------------------------------------*/
Route::group(['prefix'=>'services'],function(){
    Route::get('/','ServiceController@index')->name('admin.services');
    Route::get('/view-service-details/{id}','ServiceController@viewServiceDetails')->name('admin.service.view.details');
    Route::post('/tax-update','ServiceController@tax_update')->name('admin.service.tax.update');
    Route::post('/change-status/{id}','ServiceController@change_status')->name('admin.service.status');
    Route::post('/delete/{id}','ServiceController@delete_service')->name('admin.service.delete');
    Route::post('/bulk-action', 'ServiceController@bulk_action')->name('admin.service.bulk.action');
    Route::post('/service-featured/{id}', 'ServiceController@service_featured')->name('admin.service.featured');

    Route::get('/service-book-settings', 'ServiceController@service_book_settings')->name('admin.service.book.settings');
    Route::post('/service-book-settings-update', 'ServiceController@service_book_settings_update')->name('admin.service.book.settings.update');
    Route::get('/service-details-settings', 'ServiceController@service_details_settings')->name('admin.service.details.settings');
    Route::post('/service-details-settings-update', 'ServiceController@service_details_settings_update')->name('admin.service.details.settings.update');

    Route::get('/service-create-settings', 'ServiceController@service_create_settings')->name('admin.service.create.settings');
    Route::post('/service-create-settings-update', 'ServiceController@service_create_settings_update')->name('admin.service.create.settings.update');
    
    Route::get('/order-create-settings', 'ServiceController@order_create_settings')->name('admin.order.create.settings');
    Route::post('/order-create-settings-update', 'ServiceController@order_create_settings_update')->name('admin.order.create.settings.update');

    Route::get('/login-register-settings', 'ServiceController@login_register_settings')->name('admin.service.book.settings');
    Route::post('/login-register-settings-update', 'ServiceController@login_register_settings_update')->name('admin.login.register.settings.update');
});


/*----------------------------------------------------------------------------------------------------------------------------
| ORDERS ROUTES
|----------------------------------------------------------------------------------------------------------------------------*/
Route::group(['prefix'=>'orders'],function(){
    Route::get('/','OrdersController@index')->name('admin.orders');
    Route::post('/cancel-pending-order/{id?}','OrdersController@cancelPendingOrder')->name('admin.cancel.pending.order');
    Route::get('/cancel-orders','OrdersController@cancelOrders')->name('admin.orders.cancel');
    Route::post('/cancel-orders-money-return-status/{id}','OrdersController@cancelOrderMoneyReturn')->name('admin.orders.cancel.money.return');
    Route::post('/cancel/order-delete/{id}','OrdersController@cancelOrderDelete')->name('admin.order.cancel.delete');
    Route::match(['get','post'],'/order-request-complete/{id?}','OrdersController@orderCompleteRequest')->name('admin.order.complete.request');
    Route::get('/order-details/{id}','OrdersController@orderDetails')->name('admin.orders.details');
    Route::get('/order-success-settings', 'OrdersController@order_success_settings')->name('admin.order.success.settings');
    Route::post('/order-success-settings-update', 'OrdersController@order_success_settings_update')->name('admin.order.success.settings.update');
    Route::post('/change-manual-payment-status/{id}','OrdersController@change_payment_status')->name('admin.order.change.status');

    Route::get('/seller-buyer-report', 'OrdersController@seller_buyer_report')->name('admin.order.seller.buyer.report');
    Route::post('/report/delete/{id?}','OrdersController@delete_report')->name('admin.order.report.delete');
});


    /*----------------------------------------------------------------------------------------------------------------------------
    | ORDERS ROUTES
    |----------------------------------------------------------------------------------------------------------------------------*/
    Route::group(['prefix'=>'tickets'],function(){
        Route::get('/','AdminTicketViewController@tickets')->name('admin.tickets.all');
        Route::get('/details/{id}','AdminTicketViewController@ticketDetails')->name('admin.ticket.details');
        Route::post('/ticket-delete/{id}','AdminTicketViewController@ticketDelete')->name('admin.ticket.delete');
    });


/*----------------------------------------------------------------------------------------------------------------------------
| PAYOUT REQUEST ROUTES
|----------------------------------------------------------------------------------------------------------------------------*/
Route::group(['prefix'=>'seller-settings'],function(){
    Route::get('payout-request/all','PayoutRequestController@payout_request_all')->name('admin.payout.request.all');
    Route::post('payout-request/update', 'PayoutRequestController@payout_request_update')->name('admin.payout.request.update');
    Route::post('payout-request/delete/{id}','PayoutRequestController@delete_payout_request')->name('admin.payout.request.delete');
    Route::post('payout-request/bulk-action', 'PayoutRequestController@bulk_action_payout')->name('admin.payout.request.bulk.action');
    Route::get('payout-request/view/{id}','PayoutRequestController@view_request')->name('admin.payout.request.view');

    Route::get('admin-commission/all','AdminCommissionController@admin_commission_all')->name('admin.commission.all');
    Route::post('admin-commission/update/{id?}', 'AdminCommissionController@admin_commission_update')->name('admin.commission.update');

    Route::get('amount-settings/all','AmountSettingsController@amount_settings')->name('admin.amount.settings');
    Route::post('amount-settings/update/{id?}', 'AmountSettingsController@amount_settings_update')->name('admin.amount.settings.update');
});

/*===================================================
     PAGE BUILDER ROUTE
 ==================================================*/
Route::group(['prefix' => 'page-builder','middleware' => 'auth:admin','setlang'],function () {
    /*-------------------------
        HOME PAGE BUILDER
    -------------------------*/
    Route::get('/home-page', 'PageBuilderController@homepage_builder')->name('admin.home.page.builder');
    Route::post('/home-page', 'PageBuilderController@update_homepage_builder');
    /*-------------------------
         ABOUT PAGE BUILDER
    -------------------------*/
    Route::get('/about-page', 'PageBuilderController@aboutpage_builder')->name('admin.about.page.builder');
    Route::post('/about-page', 'PageBuilderController@update_aboutpage_builder');
    /*-------------------------
         CONTACT PAGE BUILDER
    -------------------------*/
    Route::get('/contact-page', 'PageBuilderController@contactpage_builder')->name('admin.contact.page.builder');
    Route::post('/contact-page', 'PageBuilderController@update_contactpage_builder');

    /*-------------------------
       DYNAMIC PAGE BUILDER
    -------------------------*/
    Route::get('/dynamic-page/{type}/{id}', 'PageBuilderController@dynamicpage_builder')->name('admin.dynamic.page.builder');
    Route::post('/dynamic-page', 'PageBuilderController@update_dynamicpage_builder')->name('admin.dynamic.page.builder.store');

});

/*----------------------------------------------------------------------------------------------------------------------------
| GENERAL SETTINGS MANAGE
|----------------------------------------------------------------------------------------------------------------------------*/
    Route::prefix('general-settings')->group(function (){
        Route::get('/regenerate','MediaUploadController@regenerate_media_images');


        //Reading
        Route::get('/reading','GeneralSettingsController@reading')->name('admin.general.reading');
        Route::post('/reading','GeneralSettingsController@update_reading');
        //Navbar Global Variant
        Route::get('/global-variant-navbar','GeneralSettingsController@global_variant_navbar')->name('admin.general.global.variant.navbar');
        Route::post('/global-variant-navbar','GeneralSettingsController@update_global_variant_navbar');
        //Footer Global Variant
        Route::get('/global-variant-footer','GeneralSettingsController@global_variant_footer')->name('admin.general.global.variant.footer');
        Route::post('/global-variant-footer','GeneralSettingsController@update_global_variant_footer');
        //payment gateway settings 
        Route::get('/payment-gateway-settings','GeneralSettingsController@payment_gateway_settings')->name('admin.general.global.payment.settings');

        //site-identity
        Route::get('/site-identity','GeneralSettingsController@site_identity')->name('admin.general.site.identity');
        Route::post('/site-identity','GeneralSettingsController@update_site_identity');
        //basic-settings
        Route::get('/basic-settings','GeneralSettingsController@basic_settings')->name('admin.general.basic.settings');
        Route::post('/basic-settings','GeneralSettingsController@update_basic_settings');
        //color-settings
        Route::get('/color-settings','GeneralSettingsController@color_settings')->name('admin.general.color.settings');
        Route::post('/color-settings','GeneralSettingsController@update_color_settings');
        //seo settings
        Route::get('/seo-settings','GeneralSettingsController@seo_settings')->name('admin.general.seo.settings');
        Route::post('/seo-settings','GeneralSettingsController@update_seo_settings');
        //scripts settings
        Route::get('/scripts','GeneralSettingsController@scripts_settings')->name('admin.general.scripts.settings');
        Route::post('/scripts','GeneralSettingsController@update_scripts_settings');
        //email template settings
        Route::get('/email-template','GeneralSettingsController@email_template_settings')->name('admin.general.email.template');
        Route::post('/email-template','GeneralSettingsController@update_email_template_settings');
        //email settings
        Route::get('/email-settings','GeneralSettingsController@email_settings')->name('admin.general.email.settings');
        Route::post('/email-settings','GeneralSettingsController@update_email_settings');
        //typography settings
        Route::get('/typography-settings','GeneralSettingsController@typography_settings')->name('admin.general.typography.settings');
        Route::post('/typography-settings','GeneralSettingsController@update_typography_settings');
        Route::post('typography-settings/single','GeneralSettingsController@get_single_font_variant')->name('admin.general.typography.single');
        //smtp settings
        Route::get('/smtp-settings','GeneralSettingsController@smtp_settings')->name('admin.general.smtp.settings');
        Route::post('/smtp-settings','GeneralSettingsController@update_smtp_settings');
        Route::post('/smtp-settings/test', 'GeneralSettingsController@test_smtp_settings')->name('admin.general.smtp.settings.test');
        //page settings
        Route::get('/page-settings','GeneralSettingsController@page_settings')->name('admin.general.page.settings');
        Route::post('/page-settings','GeneralSettingsController@update_page_settings');
        //payment gateway
        Route::get('/payment-settings', 'GeneralSettingsController@payment_settings')->name('admin.general.payment.settings');
        Route::post('/payment-settings', 'GeneralSettingsController@update_payment_settings');
        //custom css
        Route::get('/custom-css','GeneralSettingsController@custom_css_settings')->name('admin.general.custom.css');
        Route::post('/custom-css','GeneralSettingsController@update_custom_css_settings');
        //custom js
        Route::get('/custom-js','GeneralSettingsController@custom_js_settings')->name('admin.general.custom.js');
        Route::post('/custom-js','GeneralSettingsController@update_custom_js_settings');
        //gdpr-settings
        Route::get('/gdpr-settings','GeneralSettingsController@gdpr_settings')->name('admin.general.gdpr.settings');
        Route::post('/gdpr-settings','GeneralSettingsController@update_gdpr_cookie_settings');
        //license-setting
        Route::get('/license-setting','GeneralSettingsController@license_settings')->name('admin.general.license.settings');
        Route::post('/license-setting','GeneralSettingsController@update_license_settings');
        //cache settings
        Route::get('/cache-settings','GeneralSettingsController@cache_settings')->name('admin.general.cache.settings');
        Route::post('/cache-settings','GeneralSettingsController@update_cache_settings');
        //database upgrade
        Route::get('/database-upgrade', 'GeneralSettingsController@database_upgrade')->name('admin.general.database.upgrade');
        Route::post('/database-upgrade', 'GeneralSettingsController@database_upgrade_post');
    });


    //widget manage
    Route::get('/widgets','WidgetsController@index')->name('admin.widgets');
    Route::post('/widgets/create','WidgetsController@new_widget')->name('admin.widgets.new');
    Route::post('/widgets/markup','WidgetsController@widget_markup')->name('admin.widgets.markup');
    Route::post('/widgets/update','WidgetsController@update_widget')->name('admin.widgets.update');
    Route::post('/widgets/update/order','WidgetsController@update_order_widget')->name('admin.widgets.update.order');
    Route::post('/widgets/delete','WidgetsController@delete_widget')->name('admin.widgets.delete');


    //MENU MANAGE
    Route::get('/menu','MenuController@index')->name('admin.menu');
    Route::post('/new-menu','MenuController@store_new_menu')->name('admin.menu.new');
    Route::get('/menu-edit/{id}','MenuController@edit_menu')->name('admin.menu.edit');
    Route::post('/menu-update/{id}','MenuController@update_menu')->name('admin.menu.update');
    Route::post('/menu-delete/{id}','MenuController@delete_menu')->name('admin.menu.delete');
    Route::post('/menu-default/{id}','MenuController@set_default_menu')->name('admin.menu.default');
    Route::post('/mega-menu', 'MenuController@mega_menu_item_select_markup')->name('admin.mega.menu.item.select.markup');
    //404 page manage
    Route::get('404-page-manage','Error404PageManage@error_404_page_settings')->name('admin.404.page.settings');
    Route::post('404-page-manage','Error404PageManage@update_error_404_page_settings');
    // maintains page
    Route::get('/maintains-page/settings','MaintainsPageController@maintains_page_settings')->name('admin.maintains.page.settings');
    Route::post('/maintains-page/settings','MaintainsPageController@update_maintains_page_settings');

    /*----------------------------------------------------------------------------------------------------------------------------
    | ADMIN USER ROLE MANAGE
    |----------------------------------------------------------------------------------------------------------------------------*/
    Route::group(['prefix' => 'admin'], function () {
        Route::get('/all','AdminRoleManageController@all_user')->name('admin.all.user');
        Route::get('/new','AdminRoleManageController@new_user')->name('admin.new.user');
        Route::post('/new','AdminRoleManageController@new_user_add');
        Route::get('/user-edit/{id}','AdminRoleManageController@user_edit')->name('admin.user.edit');
        Route::post('/user-update','AdminRoleManageController@user_update')->name('admin.user.update');
        Route::post('/user-password-change','AdminRoleManageController@user_password_change')->name('admin.user.password.change');
        Route::post('/delete-user/{id}','AdminRoleManageController@new_user_delete')->name('admin.delete.user');
        /*----------------------------
         ALL ADMIN ROLE ROUTES
        -----------------------------*/
        Route::get('/role','AdminRoleManageController@all_admin_role')->name('admin.all.admin.role');
        Route::get('/role/new','AdminRoleManageController@new_admin_role_index')->name('admin.role.new');
        Route::post('/role/new','AdminRoleManageController@store_new_admin_role');
        Route::get('/role/edit/{id}','AdminRoleManageController@edit_admin_role')->name('admin.user.role.edit');
        Route::post('/role/update','AdminRoleManageController@update_admin_role')->name('admin.user.role.update');
        Route::post('/role/delete/{id}','AdminRoleManageController@delete_admin_role')->name('admin.user.role.delete');
    });


    //Frontend User  management    
    Route::get('/frontend/all-user','FrontendUserManageController@all_user')->name('admin.all.frontend.user');
    Route::post('/frontend/change-user-status/{id}','FrontendUserManageController@userStatus')->name('admin.frontend.user.status');
    Route::post('/frontend/delete-user/{id}','FrontendUserManageController@userDelete')->name('admin.frontend.user.delete');
    Route::post('/frontend/all-user/bulk-action','FrontendUserManageController@bulk_action')->name('admin.all.frontend.user.bulk.action');
    Route::get('/frontend/all-user/email-verify-code/{id?}','FrontendUserManageController@email_verify_code')->name('admin.frontend.user.email.verify.code');
    Route::post('/frontend/all-user/send-email-to-single-user','FrontendUserManageController@send_mail_to_single_user')->name('admin.frontend.user.email.send.single');
    Route::get('/frontend/deactive-users','FrontendUserManageController@deactive_user')->name('admin.all.frontend.deactive.user');

    Route::get('/frontend/seller-profile-view/{id}','FrontendUserManageController@sellerProfileView')->name('admin.frontend.seller.profile.view');
    Route::post('/frontend/verify-seller-profile/{id}','FrontendUserManageController@sellerVerify')->name('admin.frontend.seller.profile.verify');

    Route::get('/frontend/seller-verify/all','FrontendUserManageController@sellerAll')->name('admin.frontend.seller.all');

    //admin settings
    Route::get('/settings','AdminDashboardController@admin_settings')->name('admin.profile.settings');
    Route::get('/profile-update','AdminDashboardController@admin_profile')->name('admin.profile.update');
    Route::post('/profile-update','AdminDashboardController@admin_profile_update');
    Route::get('/password-change','AdminDashboardController@admin_password')->name('admin.password.change');
    Route::post('/password-change','AdminDashboardController@admin_password_chagne');

    //language
    Route::get('/languages','LanguageController@index')->name('admin.languages');
    Route::get('/languages/words/all/{id}','LanguageController@all_edit_words')->name('admin.languages.words.all');
    Route::post('/languages/words/update/{id}','LanguageController@update_words')->name('admin.languages.words.update');
    Route::post('/languages/new','LanguageController@store')->name('admin.languages.new');
    Route::post('/languages/update','LanguageController@update')->name('admin.languages.update');
    Route::post('/languages/delete/{id}','LanguageController@delete')->name('admin.languages.delete');
    Route::post('/languages/default/{id}','LanguageController@make_default')->name('admin.languages.default');
    Route::post('/languages/clone','LanguageController@clone_languages')->name('admin.languages.clone');
    Route::post('/languages/add-new-word','LanguageController@add_new_words')->name('admin.languages.add.new.word');
    Route::post('/languages/regenerate-source-text','LanguageController@regenerate_source_text')->name('admin.languages.regenerate.source.texts');

/*==============================================
       FORM BUILDER ROUTES
==============================================*/
Route::prefix('form-builder')->group(function () {

    /*-------------------------
        CUSTOM FORM BUILDER
    --------------------------*/
    Route::get('/all', 'CustomFormBuilderController@all')->name('admin.form.builder.all');
    Route::post('/new', 'CustomFormBuilderController@store')->name('admin.form.builder.store');
    Route::get('/edit/{id}', 'CustomFormBuilderController@edit')->name('admin.form.builder.edit');
    Route::post('/update', 'CustomFormBuilderController@update')->name('admin.form.builder.update');
    Route::post('/delete/{id}', 'CustomFormBuilderController@delete')->name('admin.form.builder.delete');
    Route::post('/bulk-action', 'CustomFormBuilderController@bulk_action')->name('admin.form.builder.bulk.action');

    /*-------------------------
     GET IN TOUCH FORM ROUTES
    --------------------------*/
    Route::get('/get-in-touch', 'FormBuilderController@get_in_touch_form_index')->name('admin.form.builder.get.in.touch');
    Route::post('/get-in-touch', 'FormBuilderController@update_get_in_touch_form');

    /*-------------------------
      CONTACT FORM ROUTES
      --------------------------*/
    Route::get('/contact-form', 'FormBuilderController@contact_form_index')->name('admin.form.builder.contact');
    Route::post('/contact-form', 'FormBuilderController@update_contact_form');

}); 

});

  //Chart Data
    Route::post('/visited-url', 'AdminDashboardController@get_visited_url_data')->name('admin.home.visited.url.data');
    Route::post('/visited/device', 'AdminDashboardController@get_chart_data_device')->name('admin.home.chart.data.by.device');
    Route::post('/visited/os', 'AdminDashboardController@get_chart_data_os')->name('admin.home.chart.data.by.os');
    Route::post('/visited/country', 'AdminDashboardController@get_chart_data_country')->name('admin.home.chart.data.by.country');
    Route::post('/visited/browser', 'AdminDashboardController@get_chart_data_browser')->name('admin.home.chart.data.by.browser');

    // media upload routes end
    Route::post('/media-upload/all','MediaUploadController@all_upload_media_file')->name('admin.upload.media.file.all');
    Route::post('/media-upload','MediaUploadController@upload_media_file')->name('admin.upload.media.file');
    Route::post('/media-upload/alt','MediaUploadController@alt_change_upload_media_file')->name('admin.upload.media.file.alt.change');


 // media upload routes for restrict user in demo mode
    Route::post('/media-upload/loadmore', 'MediaUploadController@get_image_for_loadmore')->name('admin.upload.media.file.loadmore');



