<?php

use Illuminate\Support\Facades\Route;

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


