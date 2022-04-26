<?php

use Illuminate\Support\Facades\Route;
use \Illuminate\Support\Facades\URL;
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
    return view('Front.index');
});

Route::get('/details', function () {
    return view('Front.car');
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


Route::get('/admin/users', function () {
    return view('Admin.users');
});

Route::get('/admin/services', function () {
    return view('Admin.services');
});


Route::get('/admin/carSpecs/brands', function () {
    return view('Admin.brands');
})->name('carBrands');



Route::get('/admin/carSpecs/types', function () {
    return view('Admin.types');
})->name('carTypes');



Route::get('/user/profile/settings/changePassword', function () {
    return view('auth.changePassword');
});
Route::get('forgetPassword', function () {
    return view('auth.forgetPassword');
});

Route::get('/user/profile/settings', function () {
    return view('User.profileSettings');
});

Route::get('/user/profile', function () {
    return view('User.profile');
});

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
