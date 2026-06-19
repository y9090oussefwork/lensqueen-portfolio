<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Artisan;

Route::get('/clear', function () {
    $output = new \Symfony\Component\Console\Output\BufferedOutput();
    Artisan::call('optimize:clear', array(), $output);
    return $output->fetch();
})->name('/clear');


Route::get('/user', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('/loginModal', 'Auth\LoginController@loginModal')->name('loginModal');



Route::get('queue-work', function () {
    return Illuminate\Support\Facades\Artisan::call('queue:work', ['--stop-when-empty' => true]);
})->name('queue.work');


Auth::routes(['verify' => true]);


Route::group(['middleware' => ['guest']], function () {
    Route::get('register/{sponsor?}', 'Auth\RegisterController@sponsor')->name('register.sponsor');
});


Route::group(['middleware' => ['auth'], 'prefix' => 'user', 'as' => 'user.'], function () {
    Route::get('/check', 'User\VerificationController@check')->name('check');
    Route::get('/resend_code', 'User\VerificationController@resendCode')->name('resendCode');
    Route::post('/mail-verify', 'User\VerificationController@mailVerify')->name('mailVerify');
    Route::post('/sms-verify', 'User\VerificationController@smsVerify')->name('smsVerify');
    Route::post('twoFA-Verify', 'User\VerificationController@twoFAverify')->name('twoFA-Verify');
    Route::middleware('userCheck')->group(function () {
        Route::get('/dashboard', 'User\HomeController@index')->name('home');
        //wishlist
        Route::get('wishlist', 'User\HomeController@wishlist')->name('wishlist');
        Route::delete('wishlist-delete/{id}', 'User\HomeController@deleteWishlist')->name('deleteWishlist');

        //purchase-plan
        Route::get('add/purchase/plan', 'User\HomeController@addPurchasePlan')->name('add.purchase.plan');
        Route::post('/purchase-plan', 'User\HomeController@purchasePlan')->name('purchase-plan');

        Route::post('purchase/plan/request', 'PaymentController@purchasePlanRequest')->name('purchase.plan.request');
        Route::get('purchase/plan/confirm', 'PaymentController@purchasePlanConfirm')->name('purchase.plan.request.confirm');

        //purchase-product
        Route::post('/purchase-product', 'User\HomeController@purchaseProduct')->name('purchase-product');
        Route::get('add/purchase/product', 'User\HomeController@addPurchaseProduct')->name('add.purchase.product');
        Route::post('purchase/product/request', 'PaymentController@purchaseProductRequest')->name('purchase.product.request');


        //My Plan
        Route::get('my-plans', 'User\HomeController@myPlans')->name('myPlans');

        //My Purchased Product Item
        Route::get('my-products', 'User\HomeController@myProducts')->name('myProducts');
        Route::get('my-product/download/{id}', 'User\HomeController@myProductDownload')->name('product.download');

        //Booking-From-Date
        Route::get('booking/date','User\HomeController@bookingDate')->name('bookingDate');
        Route::post('booking/request/form/submit', 'User\HomeController@userBookingRequestFormSubmit')->name('booking.request.form.submit');
        Route::get('my-booking', 'User\HomeController@myBooking')->name('myBooking');
        Route::get('my-booking/request/form/{id}', 'User\HomeController@myBookingRequestForm')->name('booking.request.form');

        Route::get('payment-history', 'User\HomeController@fundHistory')->name('fund-history');
        Route::get('payment-history/search', 'User\HomeController@fundHistorySearch')->name('fund-history.search');

        Route::get('/profile', 'User\HomeController@profile')->name('profile');
        Route::post('/updateProfile', 'User\HomeController@updateProfile')->name('updateProfile');
        Route::put('/updateInformation', 'User\HomeController@updateInformation')->name('updateInformation');
        Route::post('/updatePassword', 'User\HomeController@updatePassword')->name('updatePassword');

        // TWO-FACTOR SECURITY
        Route::get('/twostep-security', 'User\HomeController@twoStepSecurity')->name('twostep.security');
        Route::post('twoStep-enable', 'User\HomeController@twoStepEnable')->name('twoStepEnable');
        Route::post('twoStep-disable', 'User\HomeController@twoStepDisable')->name('twoStepDisable');

        Route::group(['prefix' => 'ticket', 'as' => 'ticket.'], function () {
            Route::get('/', 'User\SupportController@index')->name('list');
            Route::get('/create', 'User\SupportController@create')->name('create');
            Route::post('/create', 'User\SupportController@store')->name('store');
            Route::get('/view/{ticket}', 'User\SupportController@ticketView')->name('view');
            Route::put('/reply/{ticket}', 'User\SupportController@reply')->name('reply');
            Route::get('/download/{ticket}', 'User\SupportController@download')->name('download');
        });

        Route::get('push-notification-show', 'SiteNotificationController@show')->name('push.notification.show');
        Route::get('push.notification.readAll', 'SiteNotificationController@readAll')->name('push.notification.readAll');
        Route::get('push-notification-readAt/{id}', 'SiteNotificationController@readAt')->name('push.notification.readAt');

    });
});




Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/', 'Admin\LoginController@showLoginForm')->name('login');
    Route::post('/', 'Admin\LoginController@login')->name('login');
    Route::post('/logout', 'Admin\LoginController@logout')->name('logout');


    Route::get('/password/reset', 'Admin\Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('/password/email', 'Admin\Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('/password/reset/{token}', 'Admin\Auth\ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('/password/reset', 'Admin\Auth\ResetPasswordController@reset')->name('password.update');


    Route::group(['middleware' => ['auth:admin']], function () {
        Route::get('/dashboard', 'Admin\DashboardController@dashboard')->name('dashboard');


        Route::get('/profile', 'Admin\DashboardController@profile')->name('profile');
        Route::put('/profile', 'Admin\DashboardController@profileUpdate')->name('profileUpdate');
        Route::get('/password', 'Admin\DashboardController@password')->name('password');
        Route::put('/password', 'Admin\DashboardController@passwordUpdate')->name('passwordUpdate');

        Route::get('push-notification-show', 'SiteNotificationController@showByAdmin')->name('push.notification.show');
        Route::get('push.notification.readAll', 'SiteNotificationController@readAllByAdmin')->name('push.notification.readAll');
        Route::get('push-notification-readAt/{id}', 'SiteNotificationController@readAt')->name('push.notification.readAt');
        Route::match(['get', 'post'], 'pusher-config', 'SiteNotificationController@pusherConfig')->name('pusher.config');


        /*=====Payment Log=====*/
        Route::get('payment-methods', 'Admin\PaymentMethodController@index')->name('payment.methods');
        Route::post('payment-methods/deactivate', 'Admin\PaymentMethodController@deactivate')->name('payment.methods.deactivate');
        Route::get('payment-methods/deactivate', 'Admin\PaymentMethodController@deactivate')->name('payment.methods.deactivate');
        Route::post('sort-payment-methods', 'Admin\PaymentMethodController@sortPaymentMethods')->name('sort.payment.methods');
        Route::get('payment-methods/edit/{id}', 'Admin\PaymentMethodController@edit')->name('edit.payment.methods');
        Route::put('payment-methods/update/{id}', 'Admin\PaymentMethodController@update')->name('update.payment.methods');


        Route::get('payment/pending', 'Admin\PaymentLogController@pending')->name('payment.pending');
        Route::get('payment/log', 'Admin\PaymentLogController@index')->name('payment.log');
        Route::get('payment/search', 'Admin\PaymentLogController@search')->name('payment.search');



        /*====Manage Users ====*/
        Route::get('/users', 'Admin\UsersController@index')->name('users');
        Route::get('/users/search', 'Admin\UsersController@search')->name('users.search');
        Route::post('/users-active', 'Admin\UsersController@activeMultiple')->name('user-multiple-active');
        Route::post('/users-inactive', 'Admin\UsersController@inactiveMultiple')->name('user-multiple-inactive');
        Route::get('/user/edit/{id}', 'Admin\UsersController@userEdit')->name('user-edit');
        Route::post('/user/update/{id}', 'Admin\UsersController@userUpdate')->name('user-update');
        Route::post('/user/loginAccount/{id}', 'Admin\UsersController@loginAccount')->name('user-loginAccount');
        Route::post('/user/password/{id}', 'Admin\UsersController@passwordUpdate')->name('userPasswordUpdate');

        Route::get('/user/send-email/{id}', 'Admin\UsersController@sendEmail')->name('send-email');
        Route::post('/user/send-email/{id}', 'Admin\UsersController@sendMailUser')->name('user.email-send');
        Route::get('/user/transaction/{id}', 'Admin\UsersController@transaction')->name('user.transaction');
        Route::get('/user/fundLog/{id}', 'Admin\UsersController@funds')->name('user.fundLog');

        Route::get('/email-send', 'Admin\UsersController@emailToUsers')->name('email-send');
        Route::post('/email-send', 'Admin\UsersController@sendEmailToUsers')->name('email-send.store');



        /* ====== Transaction Log =====*/
        Route::get('/transaction', 'Admin\LogController@transaction')->name('transaction');
        Route::get('/transaction-search', 'Admin\LogController@transactionSearch')->name('transaction.search');


        Route::get('/logo-seo', 'Admin\BasicController@logoSeo')->name('logo-seo');
        Route::put('/logoUpdate', 'Admin\BasicController@logoUpdate')->name('logoUpdate');
        Route::put('/seoUpdate', 'Admin\BasicController@seoUpdate')->name('seoUpdate');
        Route::get('/breadcrumb', 'Admin\BasicController@breadcrumb')->name('breadcrumb');
        Route::put('/breadcrumb', 'Admin\BasicController@breadcrumbUpdate')->name('breadcrumbUpdate');
        Route::any('/basic-controls', 'Admin\BasicController@index')->name('basic-controls');
        Route::post('/basic-controls', 'Admin\BasicController@updateConfigure')->name('basic-controls.update');

        Route::any('/email-controls', 'Admin\EmailTemplateController@emailControl')->name('email-controls');
        Route::post('/email-controls', 'Admin\EmailTemplateController@emailConfigure')->name('email-controls.update');
        Route::post('/email-controls/action', 'Admin\EmailTemplateController@emailControlAction')->name('email-controls.action');
        Route::post('/email/test','Admin\EmailTemplateController@testEmail')->name('testEmail');


        Route::get('/email-template', 'Admin\EmailTemplateController@show')->name('email-template.show');
        Route::get('/email-template/edit/{id}', 'Admin\EmailTemplateController@edit')->name('email-template.edit');
        Route::post('/email-template/update/{id}', 'Admin\EmailTemplateController@update')->name('email-template.update');


        /*========Sms control ========*/
        Route::match(['get', 'post'], '/sms-controls', 'Admin\SmsTemplateController@smsConfig')->name('sms.config');
        Route::post('/sms-controls/action', 'Admin\SmsTemplateController@smsControlAction')->name('sms-controls.action');
        Route::get('/sms-template', 'Admin\SmsTemplateController@show')->name('sms-template');
        Route::get('/sms-template/edit/{id}', 'Admin\SmsTemplateController@edit')->name('sms-template.edit');
        Route::post('/sms-template/update/{id}', 'Admin\SmsTemplateController@update')->name('sms-template.update');


        Route::get('/notify-config', 'Admin\NotifyController@notifyConfig')->name('notify-config');
        Route::post('/notify-config', 'Admin\NotifyController@notifyConfigUpdate')->name('notify-config.update');

        Route::get('/notify-template', 'Admin\NotifyController@show')->name('notify-template.show');
        Route::get('/notify-template/edit/{id}', 'Admin\NotifyController@edit')->name('notify-template.edit');
        Route::post('/notify-template/update/{id}', 'Admin\NotifyController@update')->name('notify-template.update');


        /* ===== Support Ticket ====*/
        Route::get('tickets/{status?}', 'Admin\TicketController@tickets')->name('ticket');
        Route::get('tickets/view/{id}', 'Admin\TicketController@ticketReply')->name('ticket.view');
        Route::put('ticket/reply/{id}', 'Admin\TicketController@ticketReplySend')->name('ticket.reply');
        Route::get('ticket/download/{ticket}', 'Admin\TicketController@ticketDownload')->name('ticket.download');
        Route::post('ticket/delete', 'Admin\TicketController@ticketDelete')->name('ticket.delete');


        /*====== Booking Form =======*/
        Route::match(['get', 'post'], '/booking-form', 'Admin\PlanController@bookingForm')->name('bookingForm');

        /*====== Booking Request =======*/
        Route::get('booking/request/pending', 'Admin\PlanController@showBookingRequestPending')->name('all.bookingRequest');
        Route::get('booking/request/history', 'Admin\PlanController@showBookingRequestNonPending')->name('all.bookingRequest.nonPending');
        Route::get('/show/booking/request/{id}', 'Admin\PlanController@showBookingRequestForm')->name('show.booking.request.form');
        Route::put('/booking-request/form/update/{id}', 'Admin\PlanController@bookingRequestFormUpdate')->name('booking.request.form.update');
        Route::put('/reject/booking/request/{id}', 'Admin\PlanController@rejectBookingRequestForm')->name('booking.form.reject');
        Route::put('/approve/booking/request/{id}', 'Admin\PlanController@approveBookingRequestForm')->name('booking.form.approve');
        Route::delete('/delete/booking/request/{id}', 'Admin\PlanController@deleteBookingRequestForm')->name('booking.form.delete');


        /*====== Manage Plan =======*/
        Route::get('/plan-list', 'Admin\PlanController@plan')->name('planList');
        Route::get('/plan-create', 'Admin\PlanController@planCreate')->name('planCreate');
        Route::post('/plan-store/{language?}', 'Admin\PlanController@planStore')->name('planStore');
        Route::delete('/plan-delete/{id}', 'Admin\PlanController@planDelete')->name('planDelete');
        Route::get('/plan-edit/{id}', 'Admin\PlanController@planEdit')->name('planEdit');
        Route::put('/plan-update/{id}/{language?}', 'Admin\PlanController@planUpdate')->name('planUpdate');

        /*====== Purchased Plan =======*/
        Route::get('/planList/sold', 'Admin\PlanController@purchasedPlanList')->name('purchased.planList');
        Route::get('/show/booking/form/{trx}', 'Admin\PlanController@showBookingForm')->name('show.booking.form');
        Route::put('/booking-form/update/{trx}', 'Admin\PlanController@bookingFormUpdate')->name('booking.form.update');


        /*====== Manage Shop/Product =======*/
        Route::get('/product-list', 'Admin\ProductController@productList')->name('productList');
        Route::get('/product-create', 'Admin\ProductController@productCreate')->name('productCreate');
        Route::post('/product-store/{language?}', 'Admin\ProductController@productStore')->name('productStore');
        Route::delete('/product-delete/{id}', 'Admin\ProductController@productDelete')->name('productDelete');
        Route::get('/product-edit/{id}', 'Admin\ProductController@productEdit')->name('productEdit');
        Route::put('/product-update/{id}/{language?}', 'Admin\ProductController@productUpdate')->name('productUpdate');
        Route::delete('/product-image-delete/{id}/{imgDelete}', 'Admin\ProductController@productImageDelete')->name('productImageDelete');

        Route::get('/product-review/{id}', 'Admin\ProductController@productReview')->name('productReview');
        Route::get('/productDownload/{id}', 'Admin\ProductController@productDownload')->name('productDownload');
        Route::delete('/review-delete/{id}', 'Admin\ProductController@reviewDelete')->name('reviewDelete');


        /*====== Purchased Product =======*/
        Route::get('/product/sold', 'Admin\ProductController@purchasedProductList')->name('purchased.productList');


        /*====== Manage Gallery =======*/
        Route::get('/gallery-tag-manage', 'Admin\ManageGalleryController@tagManage')->name('tagManage');
        Route::post('/gallery-tag-create', 'Admin\ManageGalleryController@storeTag')->name('store.tags');
        Route::put('/gallery-tag-update/{id}', 'Admin\ManageGalleryController@updateTag')->name('update.tags');
        Route::delete('/gallery-tag-delete/{id}', 'Admin\ManageGalleryController@tagDelete')->name('delete.tags');

        Route::get('/gallery-list', 'Admin\ManageGalleryController@galleryList')->name('galleryList');
        Route::get('/gallery-create', 'Admin\ManageGalleryController@galleryCreate')->name('galleryCreate');
        Route::post('/gallery-create', 'Admin\ManageGalleryController@galleryStore')->name('galleryStore');
        Route::get('/gallery-edit/{id}', 'Admin\ManageGalleryController@galleryEdit')->name('galleryEdit');
        Route::put('/gallery-edit/{id}', 'Admin\ManageGalleryController@galleryUpdate')->name('galleryUpdate');
        Route::delete('/gallery-delete/{id}', 'Admin\ManageGalleryController@galleryDelete')->name('galleryDelete');



        /* ===== ADMIN Language SETTINGS ===== */
        Route::get('language', 'Admin\LanguageController@index')->name('language.index');
        Route::get('language/create', 'Admin\LanguageController@create')->name('language.create');
        Route::post('language/create', 'Admin\LanguageController@store')->name('language.store');
        Route::get('language/{language}', 'Admin\LanguageController@edit')->name('language.edit');
        Route::put('language/{language}', 'Admin\LanguageController@update')->name('language.update');
        Route::delete('language/{language}', 'Admin\LanguageController@delete')->name('language.delete');
        Route::get('/language/keyword/{id}', 'Admin\LanguageController@keywordEdit')->name('language.keywordEdit');
        Route::put('/language/keyword/{id}', 'Admin\LanguageController@keywordUpdate')->name('language.keywordUpdate');
        Route::post('/language/importJson', 'Admin\LanguageController@importJson')->name('language.importJson');
        Route::post('store-key/{id}', 'Admin\LanguageController@storeKey')->name('language.storeKey');
        Route::put('update-key/{id}', 'Admin\LanguageController@updateKey')->name('language.updateKey');
        Route::delete('delete-key/{id}', 'Admin\LanguageController@deleteKey')->name('language.deleteKey');


        /* ===== ADMIN TEMPLATE SETTINGS ===== */
        Route::get('template/{section}', 'Admin\TemplateController@show')->name('template.show');
        Route::put('template/{section}/{language}', 'Admin\TemplateController@update')->name('template.update');
        Route::get('contents/{content}', 'Admin\ContentController@index')->name('content.index');
        Route::get('content-create/{content}', 'Admin\ContentController@create')->name('content.create');
        Route::put('content-create/{content}/{language?}', 'Admin\ContentController@store')->name('content.store');
        Route::get('content-show/{content}/{name?}', 'Admin\ContentController@show')->name('content.show');
        Route::put('content-update/{content}/{language?}', 'Admin\ContentController@update')->name('content.update');
        Route::delete('contents/{id}', 'Admin\ContentController@contentDelete')->name('content.delete');
    });


});



//Product-Rating
Route::post('product/rating/{id}', 'WishlistController@productRating')->name('user.product.rating');

Route::get('user/booking-form/{trx}', 'PaymentController@userBookingForm')->name('booking.form');
Route::post('user/booking-form/submit/{trx}', 'PaymentController@userBookingFormSubmit')->name('user.booking.form.submit');

Route::match(['get', 'post'], 'success', 'PaymentController@success')->name('success');
Route::match(['get', 'post'], 'failed', 'PaymentController@failed')->name('failed');
Route::match(['get', 'post'], 'payment/{code}/{trx?}/{type?}', 'PaymentController@gatewayIpn')->name('ipn');



Route::get('/language/{code?}', 'FrontendController@language')->name('language');


Route::get('/blog-details/{id}/{slug}', 'FrontendController@blogDetails')->name('blogDetails');
Route::get('/blog', 'FrontendController@blog')->name('blog');

Route::get('/', 'FrontendController@index')->name('home');
Route::get('/about', 'FrontendController@about')->name('about');
Route::get('/services', 'FrontendController@services')->name('services');
Route::get('/gallery', 'FrontendController@gallery')->name('gallery');
Route::get('/shop', 'FrontendController@shop')->name('product');
Route::get('/shop/details/{slug?}/{id}', 'FrontendController@shopDetails')->name('shopDetails');

Route::get('add/wishlist/{product_id}','WishlistController@updateWishlist');

Route::get('/contact', 'FrontendController@contact')->name('contact');
Route::post('/contact', 'FrontendController@contactSend')->name('contact.send');





