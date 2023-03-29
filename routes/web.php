<?php

use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Route;
use PHPUnit\Framework\Constraint\IsEmpty;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('frontend.index');
})->name('home');




Auth::routes(['verify' => true]);



// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/requests', [App\Http\Controllers\HomeController::class, 'reqPage'])->name('front.reqPage');
Route::get('/request/service/{id}', [App\Http\Controllers\HomeController::class, 'serReq'])->name('serReq');
Route::get('/request/status/{id}', [App\Http\Controllers\HomeController::class, 'statusReq'])->name('statusReq');
Route::get('/request/requester/{id}', [App\Http\Controllers\HomeController::class, 'requesterReq'])->name('requesterReq');
Route::get('/service/details/{id}', [App\Http\Controllers\HomeController::class, 'reqDetails'])->name('requestDetails');
Route::post('add/qoute', [App\Http\Controllers\HomeController::class, 'addQuote'])->name('addQuote');
Route::post('accept/provider', [App\Http\Controllers\HomeController::class, 'acceptProv'])->name('acceptProv');
Route::get('/terms/conditions', [App\Http\Controllers\HomeController::class, 'terms_conditions'])->name('terms_conditions');


Route::get('/chatify/{id}', [App\Http\Controllers\HomeController::class, 'chat'])->name('chatbox');

Route::get('/register/provider', [App\Http\Controllers\HomeController::class, 'provRegister'])->name('provRegister');
Route::get('/register/requester', [App\Http\Controllers\HomeController::class, 'reqRegister'])->name('reqRegister');


Route::get('/thank/you', [App\Http\Controllers\PaymentController::class, 'thankyou'])->name('thankYou');
Route::get('/amount', [App\Http\Controllers\PaymentController::class, 'amount'])->name('amount');







    Route::group(['middleware' => ['check']], function() {

    Route::group(['prefix'=>'a' ,  'middleware'=>['auth','admin']], function(){

    Route::get('dashboard', [App\Http\Controllers\Roles\Admin::class, 'index'])->name('admin.dashboard');
    Route::get('profile', [App\Http\Controllers\Roles\Admin::class, 'profilePage'])->name('admin.profile');
    Route::get('edit/profile', [App\Http\Controllers\Roles\Admin::class, 'editProfile'])->name('admin.editProfile');
    Route::post('update/profile', [App\Http\Controllers\Roles\Admin::class, 'updateProfile'])->name('admin.update.profile');
    Route::get('change/password', [App\Http\Controllers\Roles\Admin::class, 'changePass'])->name('admin.changePassword');
    Route::post('update/password', [App\Http\Controllers\Roles\Admin::class, 'UpdatePassword'])->name('admin.change');
    Route::get('logout', [App\Http\Controllers\Roles\Admin::class, 'destroy'])->name('admin.logout');
    Route::get('admins', [App\Http\Controllers\Roles\Admin::class, 'allUsers'])->name('allUsers');
    Route::get('requesters', [App\Http\Controllers\Roles\Admin::class, 'rallUsers'])->name('rallUsers');
    Route::get('providers', [App\Http\Controllers\Roles\Admin::class, 'pallUsers'])->name('pallUsers');
    Route::get('add/user', [App\Http\Controllers\Roles\Admin::class, 'addUserpage'])->name('addUser');
    Route::get('edit/user/{id}', [App\Http\Controllers\Roles\Admin::class, 'editUser'])->name('admin.editUser');
     Route::post('update/user', [App\Http\Controllers\Roles\Admin::class, 'updateUser'])->name('admin.updateUser');
    Route::get('delete/user/{id}', [App\Http\Controllers\Roles\Admin::class, 'deleteUser'])->name('admin.deleteUser');

    Route::post('add/new/user', [App\Http\Controllers\Roles\Admin::class, 'addUser'])->name('admin.addnewUser');

    Route::get('requests', [App\Http\Controllers\Roles\Admin::class, 'adminAllReq'])->name('admin.allReq');
    Route::get('edit/request/{id}', [App\Http\Controllers\Roles\Admin::class, 'editReq'])->name('editReq');
    Route::post('update/request', [App\Http\Controllers\Roles\Admin::class, 'updateReq'])->name('updateReq');

   Route::get('delete/request/{id}', [App\Http\Controllers\Roles\Admin::class, 'deleteReq'])->name('deleteReq');




   Route::get('request/services', [App\Http\Controllers\Roles\Admin::class, 'allReqServices'])->name('allReqServices');
   Route::get('delete/request/service/{id}', [App\Http\Controllers\Roles\Admin::class, 'deleteReqService'])->name('admin.deleteReqService');
   Route::post('update/service', [App\Http\Controllers\Roles\Admin::class, 'updateSer'])->name('updateSer');

   Route::post('add/request/service', [App\Http\Controllers\Roles\Admin::class, 'addReqService'])->name('admin.addReqService');





//------------------------------ Home Page Control ---------------------------------
//----------------------------------------------------------------------------------


    Route::get('hero/banner', [App\Http\Controllers\Roles\Admin::class, 'openheroBanner'])->name('openheroBanner');

     Route::post('update/hero/banner', [App\Http\Controllers\Roles\Admin::class, 'updateHeroBanner'])->name('updateHeroBanner');

     Route::get('about', [App\Http\Controllers\Roles\Admin::class, 'openAboutUs'])->name('openAboutUs');

     Route::post('update/about/us', [App\Http\Controllers\Roles\Admin::class, 'updateAboutUs'])->name('updateAboutUs');

     Route::get('steps', [App\Http\Controllers\Roles\Admin::class, 'openHDIW'])->name('openHDIW');

     Route::post('update/steps', [App\Http\Controllers\Roles\Admin::class, 'updateHDIW'])->name('updateHDIW');

      Route::get('requesters/section', [App\Http\Controllers\Roles\Admin::class, 'forRequesters'])->name('forRequesters');

     Route::post('update/requesters/section', [App\Http\Controllers\Roles\Admin::class, 'updateforRequesters'])->name('updateforRequesters');

     Route::get('providers/section', [App\Http\Controllers\Roles\Admin::class, 'forProviders'])->name('forProviders');

     Route::post('update/providers/section', [App\Http\Controllers\Roles\Admin::class, 'updateforProviders'])->name('updateforProviders');

     Route::get('cta', [App\Http\Controllers\Roles\Admin::class, 'cta'])->name('cta');

     Route::post('update/cta', [App\Http\Controllers\Roles\Admin::class, 'updatecta'])->name('updatecta');

     Route::get('socials', [App\Http\Controllers\Roles\Admin::class, 'social'])->name('social');

     Route::post('update/social', [App\Http\Controllers\Roles\Admin::class, 'updatesocial'])->name('updatesocial');


     //-------------------------------------------------------------------------------
//------------------------ services ---------------------------------------------------
     //--------------------------------------------------------------------------------


     Route::get('services', [App\Http\Controllers\Roles\Admin::class, 'services'])->name('a.allServices');

     Route::get('new/service', [App\Http\Controllers\Roles\Admin::class, 'NewService'])->name('NewService');

     Route::post('add/new/service', [App\Http\Controllers\Roles\Admin::class, 'addService'])->name('addNewService');


     Route::get('edit/service/{id}', [App\Http\Controllers\Roles\Admin::class, 'editService'])->name('editService');
    Route::get('delete/service/{id}', [App\Http\Controllers\Roles\Admin::class, 'deleteService'])->name('deleteService');


        //-------------------------------------------------------------------------------
//------------------------ Faqs ---------------------------------------------------
     //--------------------------------------------------------------------------------


Route::get('faqs', [App\Http\Controllers\Roles\Admin::class, 'faqs'])->name('allFaqs');

     Route::get('new/faqs', [App\Http\Controllers\Roles\Admin::class, 'NewFaqs'])->name('NewFaqs');

     Route::post('add/new/faqs', [App\Http\Controllers\Roles\Admin::class, 'addFaqs'])->name('addNewFaqs');


     Route::get('edit/faqs/{id}', [App\Http\Controllers\Roles\Admin::class, 'editFaqs'])->name('editFaqs');
     Route::post('update/faqs', [App\Http\Controllers\Roles\Admin::class, 'updateFaqs'])->name('updateFaqs');

    Route::get('delete/faqs/{id}', [App\Http\Controllers\Roles\Admin::class, 'deleteFaqs'])->name('deleteFaqs');


    Route::get('terms/conditions', [App\Http\Controllers\Roles\Admin::class, 'addTerms'])->name('addTerms');
    Route::post('update/terms/conditions', [App\Http\Controllers\Roles\Admin::class, 'updateTerms'])->name('updateTerms');


            //-------------------------------------------------------------------------------
//------------------------ Refund & withdraw ---------------------------------------------------
     //--------------------------------------------------------------------------------



    Route::get('compeleted/requests', [App\Http\Controllers\Roles\Admin::class, 'compeletedReq'])->name('compeletedReq');
    Route::get('cancelled/requests', [App\Http\Controllers\Roles\Admin::class, 'cancelledReq'])->name('cancelledReq');



    Route::get('edit/request/services/{id}', [App\Http\Controllers\Roles\Admin::class, 'editReqSer'])->name('admin.editReqService');
    Route::post('update/request/services', [App\Http\Controllers\Roles\Admin::class, 'adminUpdateService'])->name('adminUpdateService');


    Route::get('user/balance/{id}', [App\Http\Controllers\Roles\Admin::class, 'charge'])->name('chargeBalance');
    Route::post('add/requester/balance', [App\Http\Controllers\Roles\Admin::class, 'raddBAlance'])->name('raddBAlance');
    Route::post('add/provider/balance', [App\Http\Controllers\Roles\Admin::class, 'paddBAlance'])->name('paddBAlance');






    Route::get('rate', [App\Http\Controllers\Roles\Admin::class, 'rate'])->name('rate');
    Route::post('update/rate', [App\Http\Controllers\Roles\Admin::class, 'update_rate'])->name('update_rate');



    Route::get('withdraw', [App\Http\Controllers\Roles\Admin::class, 'withdrawTable'])->name('withdrawTable');
    Route::get('update/withdraw/{id}', [App\Http\Controllers\Roles\Admin::class, 'withdrawUpdate'])->name('withdrawUpdate');

    Route::get('all/orders', [App\Http\Controllers\Roles\Admin::class, 'orders'])->name('orders');
    Route::get('delete/order/{id}', [App\Http\Controllers\Roles\Admin::class, 'deleteOrder'])->name('adminDeleteOrder');

    Route::get('email/check', [App\Http\Controllers\Roles\Admin::class, 'check'])->name('check');
    Route::get('update/check', [App\Http\Controllers\Roles\Admin::class, 'updateCheck'])->name('updateCheck');


});




Route::group(['prefix'=>'r' ,  'middleware'=>['auth','requester']], function(){

    Route::get('dashboard', [App\Http\Controllers\Roles\Requester::class, 'index'])->name('requester.dashboard');
     Route::get('profile', [App\Http\Controllers\Roles\Requester::class, 'profilePage'])->name('requester.profile');
    Route::get('edit/profile', [App\Http\Controllers\Roles\Requester::class, 'editProfile'])->name('requester.editProfile');
    Route::post('update/profile', [App\Http\Controllers\Roles\Requester::class, 'updateProfile'])->name('requester.update.profile');
    Route::get('change/password', [App\Http\Controllers\Roles\Requester::class, 'changePass'])->name('requester.changePassword');
    Route::post('update/password', [App\Http\Controllers\Roles\Requester::class, 'UpdatePassword'])->name('requester.change');
    Route::get('logout', [App\Http\Controllers\Roles\Requester::class, 'destroy'])->name('requester.logout');

    Route::get('bank/account/page', [App\Http\Controllers\Roles\Requester::class, 'addBankAcc'])->name('requester.addBankAcc');
    Route::get('edit/bank/account', [App\Http\Controllers\Roles\Requester::class, 'editBankAcc'])->name('requester.editBankAcc');
    Route::post('update/bank/account', [App\Http\Controllers\Roles\Requester::class, 'updateBankAcc'])->name('requester.updateBankAcc');



    Route::post('add/bank/account', [App\Http\Controllers\Roles\Requester::class, 'saveBankAcc'])->name('requester.saveBankAcc');


    Route::get('add/request', [App\Http\Controllers\Roles\Requester::class, 'reqPage'])->name('addReqPage');

    Route::get('all/services', [App\Http\Controllers\Roles\Requester::class, 'allServices'])->name('r.allServices');

    Route::post('save/service', [App\Http\Controllers\Roles\Requester::class, 'addService'])->name('addReqService');


    Route::get('edit/service/{id}', [App\Http\Controllers\Roles\Requester::class, 'editService'])->name('editReqService');
    Route::post('update/service', [App\Http\Controllers\Roles\Requester::class, 'updateService'])->name('updateReqService');

   Route::get('delete/service/{id}', [App\Http\Controllers\Roles\Requester::class, 'deleteService'])->name('deleteReqService');

   Route::post('compelete/request/{id}', [App\Http\Controllers\Roles\Requester::class, 'compeleteReq'])->name('compeleteReq');
   Route::post('cancel/request/{id}', [App\Http\Controllers\Roles\Requester::class, 'cancelReq'])->name('cancelReq');


   Route::post('withdraw', [App\Http\Controllers\Roles\Requester::class, 'withdraw'])->name('r.withdraw');
   Route::get('withdraw/History', [App\Http\Controllers\Roles\Requester::class, 'withdrawHistory'])->name('reqWithdrawHistory');


   Route::get('all/providers', [App\Http\Controllers\Roles\Requester::class, 'allProvider'])->name('allProvider');
   Route::get('add/order/{id}', [App\Http\Controllers\Roles\Requester::class, 'addOrder'])->name('addOrder');
   Route::post('hiring', [App\Http\Controllers\Roles\Requester::class, 'hiring'])->name('hiring');

   Route::get('delete/order/{id}', [App\Http\Controllers\Roles\Requester::class, 'deleteOrder'])->name('deleteOrder');

   Route::post('compelete/order/{id}', [App\Http\Controllers\Roles\Requester::class, 'CompeleteOrder'])->name('CompeleteOrder');
   Route::post('cancel/order/{id}', [App\Http\Controllers\Roles\Requester::class, 'CancelOrder'])->name('CancelOrder');

   Route::get('credit/card', [App\Http\Controllers\Roles\Requester::class, 'creditCard'])->name('r.creditCard');


});




Route::group(['prefix'=>'p' ,  'middleware'=>['auth','provider']], function(){

    Route::get('dashboard', [App\Http\Controllers\Roles\Provider::class, 'index'])->name('provider.dashboard');
     Route::get('profile', [App\Http\Controllers\Roles\Provider::class, 'profilePage'])->name('provider.profile');
    Route::get('edit/profile', [App\Http\Controllers\Roles\Provider::class, 'editProfile'])->name('provider.editProfile');
    Route::post('update/profile', [App\Http\Controllers\Roles\Provider::class, 'updateProfile'])->name('provider.update.profile');
    Route::get('change/password', [App\Http\Controllers\Roles\Provider::class, 'changePass'])->name('provider.changePassword');
    Route::post('update/password', [App\Http\Controllers\Roles\Provider::class, 'UpdatePassword'])->name('provider.change');
    Route::get('logout', [App\Http\Controllers\Roles\Provider::class, 'destroy'])->name('provider.logout');


    Route::get('bank/account/page', [App\Http\Controllers\Roles\Provider::class, 'paddBankAcc'])->name('provider.addBankAcc');
    Route::get('edit/bank/account', [App\Http\Controllers\Roles\Provider::class, 'peditBankAcc'])->name('provider.editBankAcc');
    Route::post('update/bank/account', [App\Http\Controllers\Roles\Provider::class, 'pupdateBankAcc'])->name('provider.updateBankAcc');



    Route::post('add/bank/account', [App\Http\Controllers\Roles\Provider::class, 'psaveBankAcc'])->name('provider.saveBankAcc');

// --------------------------------------------- all quotations and accepted quotes ------------------------------------------------------------

    Route::get('all/quotes', [App\Http\Controllers\Roles\Provider::class, 'provierQuotations'])->name('provierQuotations');
    Route::get('delete/quote/{id}', [App\Http\Controllers\Roles\Provider::class, 'deleteQuote'])->name('deleteQuote');
    Route::get('edit/quote/{id}', [App\Http\Controllers\Roles\Provider::class, 'editQuote'])->name('provider.editQuote');
    Route::post('update/quote', [App\Http\Controllers\Roles\Provider::class, 'updateQuote'])->name('provider.updateQuote');

    Route::post('compelete/request/{id}', [App\Http\Controllers\Roles\Provider::class, 'compeleteReq'])->name('provider_compeleteReq');

    Route::post('withdraw', [App\Http\Controllers\Roles\Provider::class, 'withdraw'])->name('p.withdraw');
    Route::get('withdraw/History', [App\Http\Controllers\Roles\Provider::class, 'withdrawHistory'])->name('provierWithdrawHistory');


    Route::post('update/description', [App\Http\Controllers\Roles\Provider::class, 'provDesc'])->name('provDesc');
    Route::get('provider/orders', [App\Http\Controllers\Roles\Provider::class, 'providerOrders'])->name('providerOrders');

    Route::post('accept/order', [App\Http\Controllers\Roles\Provider::class, 'acceptOrder'])->name('acceptOrder');
    Route::post('provider/compelete/order', [App\Http\Controllers\Roles\Provider::class, 'provCompelete'])->name('provCompelete');
    Route::post('cancel/order', [App\Http\Controllers\Roles\Provider::class, 'rejOrder'])->name('rejOrder');

    Route::get('credit/card', [App\Http\Controllers\Roles\Provider::class, 'creditCard'])->name('p.creditCard');

    Route::get('provider/bio', [App\Http\Controllers\Roles\Provider::class, 'provDescPage'])->name('provDescPage');

});
});


