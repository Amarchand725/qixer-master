<?php 
use Illuminate\Support\Facades\Route;


Route::group(['prefix'=>'buyer','middleware'=>['auth','inactiveuser','UserRoleCheck','userEmailVerify','setlang']],function(){

    Route::get('/dashboard', 'Frontend\BuyerController@buyerDashboard')->name('buyer.dashboard');
    Route::get('/profile','Frontend\BuyerController@buyerProfile')->name('buyer.profile');
    Route::match(['get','post'],'/profile-edit','Frontend\BuyerController@buyerProfileEdit')->name('buyer.profile.edit');
    Route::match(['get','post'],'/account-settings','Frontend\BuyerController@buyerAccountSetting')->name('buyer.account.settings');
    Route::get('/logout', 'Frontend\BuyerController@buyerLogout')->name('buyer.logout');

     //all orders 
     Route::get('/orders','Frontend\BuyerController@buyerOrders')->name('buyer.orders');
     Route::get('/orders-details/{id}','Frontend\BuyerController@orderDetails')->name('buyer.order.details');
     Route::post('/approve-order-complete-request/{id}','Frontend\BuyerController@orderCompleteRequestApprove')->name('buyer.order.complete.request.approve');

     Route::get('order-invoice-details/{id?}','Frontend\InvoiceController@orderInvoiceBuyer')->name('buyer.order.invoice.details');
     Route::post('order/report-us','Frontend\BuyerController@reportUs')->name('buyer.order.report');

     //tickets
    Route::get('all-tickets','Frontend\BuyerController@allTickets')->name('buyer.support.ticket');
    Route::match(['get','post'],'add-new-ticket/{id?}','Frontend\BuyerController@addNewTicket')->name('buyer.support.ticket.new');
    Route::post('support-ticket-delete/{id}','Frontend\BuyerController@ticketDelete')->name('buyer.support.ticket.delete');
    Route::post('support-ticket/priority-change/','Frontend\BuyerController@priorityChange')->name('buyer.support.ticket.priority.change');
    Route::post('support-ticket/status-change/{id?}','Frontend\BuyerController@statusChange')->name('buyer.support.ticket.status.change');
    Route::get('ticket-view/{id}','Frontend\BuyerController@view_ticket')->name('buyer.support.ticket.view');
    Route::post('support-ticket/message-send', 'Frontend\BuyerController@support_ticket_message')->name('buyer.support.ticket.message.send');

    Route::post('service-review-from-dashboard', 'Frontend\BuyerController@serviceReviewfromDashboard')->name('service.review.from.dashboard');

    //new routes
    Route::get('/activity','Frontend\SellerController@sellerActivity')->name('buyer.activity');
    Route::get('/get_project_details','Frontend\SellerController@getProjectDetails')->name('buyer.get_project_details');
    Route::get('/get_more_details','Frontend\SellerController@getProjectMoreDetails')->name('buyer.get_more_details');
    Route::get('/chat','Frontend\SellerController@chat')->name('buyer.chat');
    Route::get('/timeline','Frontend\SellerController@timeline')->name('buyer.timeline');
    
    Route::post('/chat/store','ChatController@store')->name('buyer.chat.store');
    Route::get('/chat/all','ChatController@index')->name('buyer.chat.all');
    Route::get('/buyer/delivery','ProjectDeliveryController@delivery')->name('buyer.delivery');
    Route::post('/buyer/delivery/store','ProjectDeliveryController@store')->name('buyer.delivery.store');

    Route::get('/buyer/client-projects','ProjectController@clientProjects')->name('buyer.client-projects');
    Route::get('/buyer/project-status','ProjectController@projectStatus')->name('buyer.project-status');
    Route::get('/buyer/go-to-payment','ProjectController@goToPayment')->name('buyer.go-to-payment');
    Route::post('/buyer/payment','ProjectController@payment')->name('buyer.payment');

    Route::get('/buyer/requirement','Frontend\BuyerController@requirements')->name('buyer.requirement');
    Route::get('/buyer/show/{id}','Frontend\BuyerController@showRequirement')->name('buyer.show');

});