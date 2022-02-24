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

Route::get('/login','AuthController@login');
Route::post('/login_check','AuthController@login_check')->name('login_check');
Route::get('/register','AuthController@register');
Route::post('/register_check','AuthController@register_check')->name('register_check');

Route::group(['prefix'=> 'admin'], function(){

    Route::get('/home','AdminController@home')->name('admin_home');
    Route::get('/items','AdminController@items')->name('admin_items');
    Route::get('/users','AdminController@users')->name('admin_users');
    Route::get('/message','AdminController@message')->name('admin_message');
    Route::get('/message/{id}','AdminController@message_get')->name('message_get');
    Route::post('/message','AdminController@message_check')->name('admin_message_check');
    Route::get('/logout','AdminController@logout')->name('admin_logout');
});

Route::group(['prefix'=> 'user'], function(){

    Route::get('/home','UserController@home')->name('user_home');
    Route::get('/logout','UserController@logout')->name('user_logout');
    Route::get('/items','UserController@items')->name('user_items');
    Route::get('/message','UserController@message')->name('user_message');
    Route::post('/message','UserController@message_check')->name('message_check');
    
});
