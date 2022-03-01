<?php


Route::get('/','AuthController@home');

Route::get('/login','AuthController@login');
Route::post('/login_check','AuthController@login_check')->name('login_check');
Route::get('/register','AuthController@register');
Route::post('/register_check','AuthController@register_check')->name('register_check');

Route::group(['prefix'=> 'admin'], function(){

    Route::get('/home','AdminController@home')->name('admin_home');
    Route::get('/items','AdminController@items')->name('admin_items');
    Route::get('/create-item','AdminController@create_item')->name('admin_create_item');
    Route::post('/create-item','AdminController@create_item_check')->name('admin_create_item_check');
    Route::get('/edit-item/{id}','AdminController@edit_item')->name('admin_edit_item');
    Route::post('/update-item/{id}','AdminController@update_item')->name('admin_update_item');
    Route::get('/edit-history/{id}','AdminController@history_item')->name('admin_history_item');
    Route::get('/users','AdminController@users')->name('admin_users');
    Route::get('/message','AdminController@message')->name('admin_message');
    Route::get('/message/{id}','AdminController@message_get')->name('message_get');
    Route::post('/message','AdminController@message_check')->name('admin_message_check');
    Route::get('/logout','AdminController@logout')->name('admin_logout');
    Route::get('/orders','AdminController@orders')->name('admin_orders');
    Route::get('/orders-approve-ship/{id}','AdminController@orders_approve_ship')->name('admin_orders_approve_ship');

    //AJAX ITEM
    Route::post('/update-item-stock','AdminController@update_item_stock')->name('admin_update_item_stock');
    Route::post('/update-item-stock-check','AdminController@update_item_stock_check')->name('admin_update_item_stock_check');

    //AJAX ITEM
    Route::post('/update-item-discount','AdminController@update_item_discount')->name('admin_update_item_discount');
    Route::post('/update-item-discount-check','AdminController@update_item_discount_check')->name('admin_update_item_discount_check');
});

Route::group(['prefix'=> 'user'], function(){

    Route::get('/home','UserController@home')->name('user_home');
    Route::get('/logout','UserController@logout')->name('user_logout');
    Route::get('/items','UserController@items')->name('user_items');
    Route::get('/message','UserController@message')->name('user_message');
    Route::post('/message','UserController@message_check')->name('message_check');

    //cart
    Route::get('/add-cart/{id}','UserController@add_cart')->name('add_cart');   
    Route::get('/cancel-cart/{id}','UserController@cancel_cart')->name('cancel_cart');  
    Route::get('/checkout-cart/{id}','UserController@checkout_cart')->name('checkout_cart');  
    Route::get('/received-item/{id}','UserController@received_item')->name('received_item'); 
});

