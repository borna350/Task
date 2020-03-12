<?php

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

Auth::routes();

Route::resource('profile','ProfileController');
Route::get('/borna/password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/cv-create','ProfileController@cvFormat');
Route::get('/download','ProfileController@downloadCv')->name('download');
