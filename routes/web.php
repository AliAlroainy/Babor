<?php

use App\Models\Bid;
use App\Models\User;
use App\Models\Auction;
use Illuminate\Http\Request;
use \Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Password;
use App\Http\Controllers\user\BidController;
use App\Http\Controllers\admin\BidsController;
use App\Http\Controllers\admin\BrandsController;
use App\Http\Controllers\admin\SeriesController;
use App\Http\Controllers\Admin\AcutionController;
use App\Http\Controllers\Admin\QustionController;
use App\Http\Controllers\user\ProfilesController;
// use \Illuminate\Support\Facades\URL;
use App\Http\Controllers\admin\AccountsController;
use App\Http\Controllers\Admin\ServicesController;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\user\UserAuctionController;
use App\Http\Controllers\Authentication\authcontroller;
use App\Http\Controllers\admin\PaymentController;
use App\Http\Controllers\Admin\CarCharacteristicsController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Http\Controllers\Authentication\ResetPasswordController;
use App\Http\Controllers\Authentication\ForgotPasswordController;

Route::get('/bill', function () {
    return view('Front.addtions.bill');
});

Route::get('/noConnection', function () {
    return view('Front.noconnection');
});

Route::get('/confirm', function () {
    return view('Front.addtions.confirmBuy');
});

Route::get('/failed', function () {
    return view('Front.addtions.failed');
});

Route::get('/nomoney', function () {
    return view('Front.addtions.nomoney');
});

Route::get('/success', function () {
    return view('Front.addtions.success');
});

Route::get('/chat', function () {
    return view('Front.addtions.chat');
});



Route::get('/FAQ', function () {
    return view('Front.FAQ');
});

Route::get('/sell', function () {
    return view('Front.sell');
});
Route::get('/services', function () {
    return view('Front.services');
});

Route::get('/offer', function () {
    return view('Front.offer');
});

Route::get('/about', function () {
    return view('Front.about');
});

Route::get('/findcar', function () {
    return view('Front.findcar');
});
Route::get('/chata', function () {
    return view('chat.chat');
});
Route::get('/services', [SiteController::class, 'ServicesShow']);
Route::get('/', [SiteController::class, 'home'])->name('/');
Route::get('/FAQ', [SiteController::class, 'questionShow']);
Route::get('/auctions/available', [SiteController::class, 'availableAuctions'])->name('site.available.auction');
Route::get('/auction/{id}', [SiteController::class, 'auctionShow'])->name('site.auction.details');

Route::view('/soon', 'Front.soon');
Route::view('/contact', 'Front.contact');
Route::view('/favorite', 'Front.favorite');
Route::view('/buy', 'Front.buy');
Route::view('/privacy', 'Front.privcey');

Route::get('/user/profile/settings/changePassword', function () {
    return view('auth.changePassword');
});
Route::get('forgetPassword', function () {
    return view('user.email.forgetPassword');
});

Route::get('/verifyEmail', function () {
    return view('user.email.welcome');
});
Route::get('/invalidToken', function () {
    return view('auth.invalidToken');
});

Route::group(['middleware'=>'auth'],function(){
    Route::group(['prefix' => 'admin', 'middleware'=>'role:super_admin|admin'],function(){
        Route::get('/accounts', [AccountsController::class, 'index'])->name('admin.dashboard');
        Route::post('/accounts/{id}', [AccountsController::class, 'destroy'])->name('admin.account.destroy');

        Route::resource('/service', ServicesController::class, ['names' => 'admin.service']);
        Route::resource('/cars/brands', BrandsController::class, ['names' => 'admin.brand']);
        Route::resource('/cars/series', SeriesController::class, ['names' => 'admin.series']);
        Route::resource('/question', QustionController::class, ['names' => 'admin.question']);
        Route::resource('/category', CategoriesController::class, ['names' => 'admin.category']);
        Route::get('/auction', [AcutionController::class, 'index'])->name('admin.auction.index');
        Route::post('/auction/filter', [AcutionController::class, 'indexWithFilter'])->name('admin.auction.indexFilter');
        Route::post('/auction/action/{id}', [AcutionController::class, 'action'])->name('admin.auction.action');
        Route::get('/auction/details/{id}', [AcutionController::class, 'showDetails'])->name('admin.auction.details');
        Route::get('/bids', [BidsController::class, 'index'])->name('admin.bid.index');

        Route::get('/change-password', [AuthController::class, 'changePasswordAdmin'])->name('change-password-admin');
        Route::post('/change-password', [AuthController::class, 'updatePassword'])->name('update-password-admin');
    });
    Route::group(['prefix' => 'user', 'middleware'=>'role:user'],function(){

        Route::get('/dashboard/profile', [ProfilesController::class,'show'])->name('user.profile') ;
        Route::get('/dashboard/profile/{id}', [ProfilesController::class,'visit'])->name('user.visit.profile') ;
        Route::group(['middleware'=>'is_verify_email'],function(){
            Route::get('/dashboard/settings/psw', [ProfilesController::class,'index'])->name('change-password-user');

            Route::post('/dashboard/settings/info-update', [ProfilesController::class, 'info_save'])->name('info.save');
            Route::post('/dashboard/settings/avatar-update', [ProfilesController::class, 'avatar_change'])->name('avatar.change');

            Route::get('/dashboard/settings/info',[ProfilesController::class,'index'])->name('user.dashboard');
            // Route::get('/auctions', [UserAuctionController::class, 'index'])->name('user.auctions');
            Route::get('/auctions/add_auction', [UserAuctionController::class, 'create'])->name('user.add.auction');
            Route::get('/get_series', [UserAuctionController::class, 'getSeries'])->name('getSeries');
            Route::post('/auctions/save_auction', [UserAuctionController::class, 'store'])->name('user.save.auction');
            Route::get('/auctions/in-progress', [UserAuctionController::class, 'showMyAuctions'])->name('user.show.progress.auction');
            Route::get('/auctions/completed', [UserAuctionController::class, 'showMyAuctions'])->name('user.show.completed.auction');
            Route::get('/auctions/uncompleted', [UserAuctionController::class, 'showMyAuctions'])->name('user.show.uncompleted.auction');
            Route::get('/auctions/pending', [UserAuctionController::class, 'showMyAuctions'])->name('user.show.pending.auction');
            Route::post('/auctions/pending/delete/{id}', [UserAuctionController::class, 'showMyAuctions'])->name('user.delete.pending.auction');
            Route::get('/auctions/disapproved', [UserAuctionController::class, 'showMyAuctions'])->name('user.show.disapproved.auction');
            Route::get('/auctions/canceled', [UserAuctionController::class, 'showMyAuctions'])->name('user.show.canceled.auction');
            Route::get('/auction/details/{id}', [UserAuctionController::class, 'showDetails'])->name('user.auction.details');
            Route::post('/auctions/in-progress/action/{id}', [UserAuctionController::class, 'action'])->name('user.progress.action.auction');
            Route::get('/bids', [BidController::class, 'index'])->name('user.show.bids');
            Route::post('/bid/{id}', [BidController::class, 'create'])->name('user.place.bid');
            Route::post('/auction/{id}/buy', [PaymentController::class, 'buy'])->name('user.buy.auction');
        });
        // Route::get('/change-password', [AuthController::class, 'changePasswordUser'])->name('change-password-user');
        Route::post('/change-password', [AuthController::class, 'updatePassword'])->name('update-password-user');

    });
    Route::get('/logout',[AuthController::class,'logout'])->name('logout');
});

Route::get('/admin/login',[AuthController::class,'showLogin'])->name('adminLogin');
Route::view('/register', 'auth.register')->name('register');
Route::get('/login',[AuthController::class,'showLogin'])->name('login');
Route::post('/do_login',[AuthController::class,'login'])->name('do_login');
Route::post('/save_user',[AuthController::class,'register'])->name('save_user');
Route::get('/forget-password',  [ForgotPasswordController::class,'getEmail']);
Route::post('/forget-password', [ForgotPasswordController::class,'postEmail'])->name('forget-password');
Route::get('/reset-password/{token}', [ResetPasswordController::class,'getPassword']);
Route::post('/reset-password', [ResetPasswordController::class,'updatePassword']);
Route::get('/verify_account/{token}',[AuthController::class,'verifyAccount'])->name('verify_account');

//fallback route
Route::fallback(function () {
    return view('Front.404');
});

Route::get('/wallet', function (){
    $admin = User::find(1);
    $auctioneer_abrar = User::find(2);
    $bidder_ali = User::find(3);
    $auction = Auction::where('id', 1)->get();
    $bid = Bid::where('id', 1)->get();
    // dd($bid);
    $admin->deposit(1200);
    $auctioneer_abrar->deposit(600);
    $bidder_ali->deposit(700);
    return $admin->balance;

});
Route::view('/hihi', 'Front.addtions.bill');
//API Response
Route::get('/payment/success/{id}/{e}', [PaymentController::class, 'success'])->name('payment.success');
Route::get('/payment/failed/{e}', [PaymentController::class, 'failed'])->name('payment.failed');




Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/private',[ App\Http\Controllers\HomeController::class, 'private'])->name('private');
Route::get('/users', [App\Http\Controllers\HomeController::class, 'users'])->name('users');

Route::get('messages', [App\Http\Controllers\MessageController::class, 'fetchMessages']);
Route::post('messages', [App\Http\Controllers\MessageController::class, 'sendMessage']);
Route::get('/private-messages/{user}', [App\Http\Controllers\MessageController::class, 'privateMessages'])->name('privateMessages');
Route::post('/private-messages/{user}',  [App\Http\Controllers\MessageController::class, 'sendPrivateMessage'])->name('privateMessages.store');
