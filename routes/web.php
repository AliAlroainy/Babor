<?php

use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use App\Http\Controllers\Authentication\authcontroller;

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
    return view('welcome');
});
Route::group(['middleware'=>'auth'],function(){
    Route::group(['middleware'=>'role:Admin'],function(){

        Route::get('/admin/dashboard',[AuthController::class,'showAdminDash'])->name('adminDash');
        Route::get('/admin/change-password', [AuthController::class, 'changePasswordAdmin'])->name('change-password-admin');
        Route::post('/admin/change-password', [AuthController::class, 'updatePassword'])->name('update-password-admin');


    });
    Route::group(['middleware'=>'role:User'],function(){

        Route::get('/user/dashboard',[AuthController::class,'showUserDash'])->name('userDash');
        Route::get('/user/change-password', [AuthController::class, 'changePassword'])->name('change-password-user');
        Route::post('/user/change-password', [AuthController::class, 'updatePassword'])->name('update-password-user');



    });

       Route::get('/logout',[AuthController::class,'logout'])->name('logout');

});
Route::get('/admin/login',[AuthController::class,'showLogin'])->name('login');
Route::get('/user/signup',[AuthController::class,'singup'])->name('singup');
Route::get('/user/login',[AuthController::class,'showLogin'])->name('login');
Route::post('/do_login',[AuthController::class,'login'])->name('do_login');
Route::post('/save_user',[AuthController::class,'register'])->name('save_user');
Route::get('/home',[AuthController::class,'showhome'])->name('home');

