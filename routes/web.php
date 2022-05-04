<?php

use Illuminate\Http\Request;
use \Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Password;
use App\Http\Controllers\admin\BrandsController;
use App\Http\Controllers\admin\SeriesController;
use App\Http\Controllers\user\ProfilesController;
use App\Http\Controllers\admin\AccountsController;
use App\Http\Controllers\Admin\ServicesController;
use App\Http\Controllers\user\UserAuctionController;
use App\Http\Controllers\Authentication\authcontroller;
use App\Http\Controllers\Admin\CarCharacteristicsController;
use App\Http\Controllers\Admin\AcutionController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
// use \Illuminate\Support\Facades\URL;
use App\Http\Controllers\Admin\CategoriesController;

/*
|--------------------------------
=======
*/
use App\Http\Controllers\Authentication\ResetPasswordController;
use App\Http\Controllers\Authentication\ForgotPasswordController;
Route::get('/notfound', function () {
    return view('Front.404');
});

Route::get('/FAQ', function () {
    return view('Front.FAQ');
});
Route::get('/services', function () {
    return view('Front.services');
});

Route::get('/offer', function () {
    return view('Front.offer');
});

Route::get('/auctions', function () {
    return view('Front.auctions');
});

/////category
Route::view('/categories', 'Admin.categories.category');


Route::view('/', 'Front.index');
Route::view('/details', 'Front.car');
Route::view('/soon', 'Front.soon');
Route::view('/contact', 'Front.contact');
Route::view('/favorite', 'Front.favorite');
Route::view('/buy', 'Front.buy');
Route::get('/user/profile/settings/changePassword', function () {
    return view('auth.changePassword');
});
Route::get('forgetPassword', function () {
    return view('user.email.forgetPassword');
});

Route::get('/verifyEmail', function () {
    return view('auth.verifyEmail');
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
        Route::resource('/category', CategoriesController::class, ['names' => 'admin.category']);
        Route::resource('/auction', AcutionController::class, ['names' => 'admin.auction']);

        // Route::get('/auctions', function (){
        //     return view('Admin.auctions.auctions');
        // },['names'=>'admin.auctions']);
        Route::get('/bids', function (){
            return view('Admin.auctions.bids');
        },['names'=>'admin.auctions']);


        Route::get('/change-password', [AuthController::class, 'changePasswordAdmin'])->name('change-password-admin');
        Route::post('/change-password', [AuthController::class, 'updatePassword'])->name('update-password-admin');
    });
    Route::group(['prefix' => 'user', 'middleware'=>'role:user'],function(){

        Route::get('/dashboard/profile', [ProfilesController::class,'show'])->name('user.profile') ;

        Route::get('/dashboard/settings/info',[ProfilesController::class,'index'])->name('user.dashboard');
        Route::get('/auctions/auctionId', function (){
            return view('user.auction.auctionDetails');
        })->name('user.auctionDetails');


    Route::group([ 'middleware'=>'is_verify_email'],function(){
            Route::get('/dashboard/settings/psw', [ProfilesController::class,'index'])->name('change-password-user');

            Route::post('/dashboard/settings/info-update', [ProfilesController::class, 'info_save'])->name('info.save');
            Route::post('/dashboard/settings/avatar-update', [ProfilesController::class, 'avatar_change'])->name('avatar.change');
            Route::get('/auctions', [UserAuctionController::class, 'index'])->name('user.auctions');
            Route::get('/auctions/add_auction', [UserAuctionController::class, 'create'])->name('user.add.auction');
            Route::get('/get_series', [UserAuctionController::class, 'getSeries'])->name('getSeries');
            Route::post('/auctions/save_auction', [UserAuctionController::class, 'store'])->name('user.save.auction');
            Route::get('/auctions/current_auction', [UserAuctionController::class, 'CurrentAuction'])->name('user.show.current.auction');
        });
        // Route::get('/change-password', [AuthController::class, 'changePasswordUser'])->name('change-password-user');
        Route::post('/change-password', [AuthController::class, 'updatePassword'])->name('update-password-user');

    });
    Route::get('/logout',[AuthController::class,'logout'])->name('logout');
});
//
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the AuthController within a group which
| contains the "web" middleware group. Now create something great!
|
*/
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

Route::view('/categories', 'Admin.categories.category');


Route::view('/auc', 'Admin.auctions.auctions');



// Route::get('/dashboard/profile', [ProfilesController::class,'show'])->name('user.profile');
// Route::get('/dashboard/settings/info',[ProfilesController::class,'index'])->name('user.dashboard');
// Route::get('/dashboard/settings/psw', [ProfilesController::class,'index'])->name('change-password-user');
// Route::post('/dashboard/settings/info-update', [ProfilesController::class, 'info_save'])->name('info.save');
// Route::post('/dashboard/settings/avatar-update', [ProfilesController::class, 'avatar_change'])->name('avatar.change');

// Route::get('/auctions', [UserAuctionController::class, 'index'])->name('user.auctions');
// Route::get('/auctions/add_auction', [UserAuctionController::class, 'create'])->name('user.add.auction');
// Route::get('/get_series', [UserAuctionController::class, 'getSeries'])->name('getSeries');
// Route::post('/auctions/save_auction', [UserAuctionController::class, 'store'])->name('user.save.auction');

// Route::get('/admin/login',[AuthController::class,'showLogin'])->name('adminLogin');
// Route::view('/register', 'auth.register')->name('register');
// Route::get('/login',[AuthController::class,'showLogin'])->name('login');
// Route::post('/do_login',[AuthController::class,'login'])->name('do_login');
// Route::post('/save_user',[AuthController::class,'register'])->name('save_user');
// Route::get('/forget-password',  [ForgotPasswordController::class,'getEmail']);
// Route::post('/forget-password', [ForgotPasswordController::class,'postEmail'])->name('forget-password');
// Route::get('/reset-password/{token}', [ResetPasswordController::class,'getPassword']);
// Route::post('/reset-password', [ResetPasswordController::class,'updatePassword']);
// Route::get('/verify_account/{token}',[AuthController::class,'verifyAccount'])->name('verify_account');



// Route::get('/accounts', [AccountsController::class, 'index'])->name('admin.dashboard');
// Route::post('/accounts/{id}', [AccountsController::class, 'destroy'])->name('admin.account.destroy');

// Route::resource('/service', ServicesController::class, ['names' => 'admin.service']);
// Route::resource('/cars/brands', BrandsController::class, ['names' => 'admin.brand']);
// Route::resource('/cars/series', SeriesController::class, ['names' => 'admin.series']);
// Route::resource('/category', CategoriesController::class, ['names' => 'admin.category']);
// Route::resource('/auction', AcutionController::class, ['names' => 'admin.auction']);


Route::get('/ser', function () {
    return view('Admin.services.service');
});

