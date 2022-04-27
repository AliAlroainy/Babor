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
use App\Http\Controllers\Authentication\authcontroller;
use App\Http\Controllers\Authentication\ForgotPasswordController;
use App\Http\Controllers\Authentication\ResetPasswordController;
use App\Http\Controllers\Admin\CarCharacteristicsController;
// use \Illuminate\Support\Facades\URL;
/*
|--------------------------------
=======
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Http\Controllers\Authentication\ResetPasswordController;
use App\Http\Controllers\Authentication\ForgotPasswordController;

*/

Route::get('/', function () {
    return view('Front.index');
});

// Route::get('/admin/users', function () {
//     return view('Admin.users');
// });

// Route::get('/admin/services', function () {
//     return view('Admin.services');
// });
Route::get('/details', function () {
    return view('Front.car');
});

Route::get('/soon', function () {
    return view('Front.soon');
});

Route::get('/contact', function () {
    return view('Front.contact');
});

Route::get('/profile', function () {
    return view('Front.profile');
});

Route::get('/favorite', function () {
    return view('Front.favorite');
});

Route::get('/buy', function () {
    return view('Front.buy');
});


Route::get('/user/profile/settings/changePassword', function () {
    return view('auth.changePassword');
});
Route::get('forgetPassword', function () {
    return view('user.email.forgetPassword');
    return view('auth.forgetPassword');
});

// Route::get('/user/profile', function () {
//     return view('User.profile');
// });

Route::get('/login', function () {
    return view('auth.login');
});

Route::get('/register', function () {
    return view('auth.register');
});
Route::get('/verifyEmail', function () {
    return view('auth.verifyEmail');
});
Route::get('/invalidToken', function () {
    return view('auth.invalidToken');
});


// Route::get('/login', function () {
//     return view('auth.login');
// });

// Route::get('/register', function () {
//     return view('auth.register');
// });
Route::group(['middleware'=>'auth'],function(){
    Route::group(['prefix' => 'admin', 'middleware'=>'role:super_admin|admin'],function(){
        Route::get('/accounts', [AccountsController::class, 'index'])->name('admin.dashboard');

        Route::resource('/service', ServicesController::class, ['names' => 'admin.service']);
        Route::resource('/cars/brands', BrandsController::class, ['names' => 'admin.brand']);
        Route::resource('/cars/series', SeriesController::class, ['names' => 'admin.series']);
        Route::get('/auctions', function (){
            return view('Admin.auctions.auctions');
        },['names'=>'admin.auctions']);
        Route::get('/bids', function (){
            return view('Admin.auctions.bids');
        },['names'=>'admin.auctions']);

        Route::get('/change-password', [AuthController::class, 'changePasswordAdmin'])->name('change-password-admin');
        Route::post('/change-password', [AuthController::class, 'updatePassword'])->name('update-password-admin');
    });
    Route::group(['prefix' => 'user', 'middleware'=>'role:user'],function(){
        Route::get('/dashboard/profile', [ProfilesController::class,'show'])->name('user.profile');
        Route::get('/dashboard/settings/info',[ProfilesController::class,'index'])->name('user.dashboard');
        Route::get('/dashboard/settings/psw', [ProfilesController::class,'index'])->name('change-password-user');
        Route::post('/dashboard/settings/info-update', [ProfilesController::class, 'info_save'])->name('info.save');
        Route::post('/dashboard/settings/avatar-update', [ProfilesController::class, 'avatar_change'])->name('avatar.change');

        Route::get('/auctions', function (){
            return view('user.auction.auctions');
        })->name('user.auction');
        Route::get('/auctions/add_auction', function (){
            return view('user.auction.addAuction');
        })->name('user.addAuction');

        // Route::get('/change-password', [AuthController::class, 'changePasswordUser'])->name('change-password-user');
        Route::post('/change-password', [AuthController::class, 'updatePassword'])->name('update-password-user');
    });
    Route::get('/logout',[AuthController::class,'logout'])->name('logout');
});
// Login and singup Routing
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

