<?php 
use Illuminate\Support\Facades\Route;

 
Route::group(['prefix'=>'seller','middleware'=>['auth','inactiveuser','BuyerCheck','userEmailVerify','setlang']],function(){
    
    Route::get('/dashboard','Frontend\SellerController@sellerDashboard')->name('seller.dashboard');
    Route::get('/profile','Frontend\SellerController@sellerProfile')->name('seller.profile');
    Route::match(['get','post'],'/profile-edit','Frontend\SellerController@sellerProfileEdit')->name('seller.profile.edit');
    Route::match(['get','post'],'/account-settings','Frontend\SellerController@sellerAccountSetting')->name('seller.account.settings');
    Route::post('/account-deactive','Frontend\SellerController@accountDeactive')->name('seller.account.deactive');
    Route::get('/account-deactive/cancel/{id}','Frontend\SellerController@accountDeactiveCancel')->name('seller.account.deactive.cancel');
    Route::get('/logout','Frontend\SellerController@sellerLogout')->name('seller.logout');

    Route::get('/activity','Frontend\SellerController@sellerActivity')->name('seller.activity');
    Route::get('/get_project_details','Frontend\SellerController@getProjectDetails')->name('seller.get_project_details');
    Route::get('/get_more_details','Frontend\SellerController@getProjectMoreDetails')->name('seller.get_more_details');
    Route::get('/chat','Frontend\SellerController@chat')->name('seller.chat');
    Route::get('/timeline','Frontend\SellerController@timeline')->name('seller.timeline');
    
    
    Route::post('/chat/store','ChatController@store')->name('seller.chat.store');
    Route::get('/chat/all','ChatController@index')->name('seller.chat.all');
    Route::get('/seller/delivery','ProjectDeliveryController@delivery')->name('seller.delivery');
    Route::post('/seller/delivery/store','ProjectDeliveryController@store')->name('seller.delivery.store');

    Route::get('/seller/client-projects','ProjectController@clientProjects')->name('seller.client-projects');
    Route::get('/seller/project-status','ProjectController@projectStatus')->name('seller.project-status');



    //service coupons
    Route::get('/coupons','Frontend\SellerController@serviceCoupon')->name('seller.service.coupon');
    Route::post('/coupons/add-coupon','Frontend\SellerController@addServiceCoupon')->name('seller.service.coupon.add');
    Route::post('/coupons/update-coupon','Frontend\SellerController@updateServiceCoupon')->name('seller.service.coupon.update');
    Route::post('/coupons/change-status/{id}','Frontend\SellerController@changeCouponStatus')->name('seller.service.coupon.status');
    Route::post('/coupons/delete/{id}','Frontend\SellerController@couponDelete')->name('seller.service.coupon.delete');

    Route::get('/services','Frontend\SellerController@sellerServices')->name('seller.services');
    Route::post('/get-dependent-subcategory','Frontend\SellerController@getSubcategory')->name('seller.subcategory');
    Route::match(['get','post'],'/add-services','Frontend\SellerController@addServices')->name('seller.add.services');

    Route::get('/service-attributes','Frontend\SellerController@serviceAttributes')->name('seller.services.attributes');
    Route::post('/add-service-attributes','Frontend\SellerController@addServiceAttributes')->name('seller.services.attributes.add');
    Route::match(['get','post'],'/add-service-attributes-by-id/{id?}','Frontend\SellerController@addServiceAttributesById')->name('seller.services.attributes.add.byid');
    Route::post('/service-on-of','Frontend\SellerController@ServiceOnOf')->name('seller.services.on.of');
    Route::get('/show-service-attributes-by-id/{id?}','Frontend\SellerController@showServiceAttributesById')->name('seller.services.attributes.show.byid');
    Route::post('/delete-include-service/{id?}','Frontend\SellerController@deleteIncludeService')->name('seller.services.includeservice.delete');
    Route::post('/delete-additional-service/{id?}','Frontend\SellerController@deleteAdditionalService')->name('seller.services.additionalservice.delete');
    Route::post('/delete-service-benifit/{id?}','Frontend\SellerController@deleteBenifit')->name('seller.services.benifit.delete');
    Route::post('/service-delete/{id}','Frontend\SellerController@ServiceDelete')->name('seller.services.delete');

    Route::match(['get','post'],'/edit-services/{id?}','Frontend\SellerController@editServices')->name('seller.edit.services');
    Route::match(['get','post'],'/edit-service-attributes/{id?}','Frontend\SellerController@editServiceAttribute')->name('seller.edit.service.attribute');

    //day
    Route::get('/days','Frontend\SellerController@days')->name('seller.days');
    Route::post('/add-day','Frontend\SellerController@addDay')->name('seller.add.day');
    Route::post('/day-delete/{id}','Frontend\SellerController@dayDelete')->name('seller.day.delete');
    Route::post('/update-total-day','Frontend\SellerController@updateTotalDay')->name('seller.update.totalday');

    //schedules
    Route::get('/schedules','Frontend\SellerController@schedules')->name('seller.schedules');
    Route::post('/add-schedule','Frontend\SellerController@addSchedule')->name('seller.add.schedule');
    Route::post('/edit-schedule','Frontend\SellerController@editSchedule')->name('seller.edit.schedule');
    Route::post('/schedules-delete/{id}','Frontend\SellerController@scheduleDelete')->name('seller.schedule.delete');

    //all orders 
    Route::get('/orders','Frontend\SellerController@sellerOrders')->name('seller.orders');
    Route::get('/orders-details/{id}','Frontend\SellerController@orderDetails')->name('seller.order.details');
    Route::post('/order-status-change','Frontend\SellerController@orderStatus')->name('seller.order.status');
    Route::post('/order-payment-status-change','Frontend\SellerController@orderPaymentStatus')->name('seller.order.payment.status');

    Route::get('orders/active-orders','Frontend\SellerController@activeOrders')->name('seller.active.orders');
    Route::get('orders/complete-orders','Frontend\SellerController@completeOrders')->name('seller.complete.orders');
    Route::get('orders/deliver-orders','Frontend\SellerController@deliverOrders')->name('seller.deliver.orders');
    Route::get('orders/cancel-orders','Frontend\SellerController@cancelOrders')->name('seller.cancel.orders');

    Route::get('pending-orders','Frontend\SellerController@pendingOrders')->name('seller.pending.orders');
    Route::post('/order-delete/{id}','Frontend\SellerController@orderDelete')->name('seller.order.delete');

    Route::post('order/report-us','Frontend\SellerController@reportUs')->name('seller.order.report');

    //notifications 
    Route::get('notification/all-notifications','Frontend\SellerController@allNotification')->name('seller.notification.all');

    //payout request 
    Route::get('payout-request','Frontend\SellerController@payoutRequest')->name('seller.payout');
    Route::post('create-payout-request','Frontend\SellerController@createPayoutRequest')->name('seller.create.payout.request');
    Route::get('payout-request-details/{id?}','Frontend\SellerController@PayoutRequestDetails')->name('seller.payout.request.details');

    Route::get('payout-invoice-details/{id?}','Frontend\InvoiceController@PayoutInvoice')->name('seller.payout.invoice.details');
    Route::get('order-invoice-details/{id?}','Frontend\InvoiceController@orderInvoiceSeller')->name('seller.order.invoice.details');

    //reviews
    Route::get('service-reviews','Frontend\SellerController@serviceReview')->name('seller.service.review');
    Route::get('service-all-reviews/{id}','Frontend\SellerController@serviceReviewAll')->name('service.review.all');
    Route::post('review-delete/{id}','Frontend\SellerController@reviewDelete')->name('service.review.delete');

    //tickets
    Route::get('all-tickets','Frontend\SellerController@allTickets')->name('seller.support.ticket');
    Route::match(['get','post'],'add-new-ticket/{id?}','Frontend\SellerController@addNewTicket')->name('seller.support.ticket.new');
    Route::post('support-ticket-delete/{id}','Frontend\SellerController@ticketDelete')->name('seller.support.ticket.delete');
    Route::post('support-ticket/priority-change/','Frontend\SellerController@priorityChange')->name('seller.support.ticket.priority.change');
    Route::get('support-ticket/status-change/{id?}','Frontend\SellerController@statusChange')->name('seller.support.ticket.status.change');
    Route::get('ticket-view/{id?}','Frontend\SellerController@view_ticket')->name('seller.support.ticket.view');
    Route::post('support-ticket/message-send', 'Frontend\SellerController@support_ticket_message')->name('seller.support.ticket.message.send');

    //service coupons
     Route::get('/to-do-list','Frontend\SellerController@toDoList')->name('seller.todolist');
     Route::post('/to-do-list/add','Frontend\SellerController@addTodolist')->name('seller.todolist.add');
     Route::post('/to-do-list/update','Frontend\SellerController@updateTodolist')->name('seller.todolist.update');
     Route::post('/to-do-list/delete/{id}','Frontend\SellerController@deleteTodolist')->name('seller.todolist.delete');
     Route::post('/to-do-list/status-change/{id?}','Frontend\SellerController@changeTodoStatus')->name('seller.todolist.status');

    //seller profile verify 
    Route::match(['get','post'],'/seller-profile-verify','Frontend\SellerController@sellerVerify')->name('seller.profile.verify');
    Route::match(['get','post'],'/account-settings','Frontend\SellerController@sellerAccountSetting')->name('seller.account.settings');


});