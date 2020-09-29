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

/**
 * Admin Route
 */

Route::prefix('admin')->group(function(){

    Route::middleware('auth:admin')->group(function () {

        Route::get('/', 'DashboardController@index')->name('admin');
        //Products
        Route::resource('/products','ProductsController');
        //Orders
        Route::get('/pending/{id}','OrdersController@pending')->name('order.pending');
        Route::get('/confirmed/{id}','OrdersController@confirmed')->name('order.confirmed');
        Route::resource('/orders','OrdersController');
        //Users
        Route::resource('/users','UsersController');
        Route::get('/block/{id}', 'UsersController@block')->name('user.block');
        Route::get('/unblock/{id}', 'UsersController@unblock')->name('user.unblock');
        Route::get('/details/{id}', 'UsersController@show')->name('user.details');

         //Logout
         Route::get('/logout', 'AdminUserController@logout');
            
        });

         //Login
         Route::get('/login', 'AdminUserController@index')->name('login');
         Route::post('/login', 'AdminUserController@store')->name('admin.login');
    
});

/**
 * Front Route
 */

 Route::get('/', 'Front\HomeController@index')->name('home');
 // User Registration
Route::get('/user/register','Front\RegistrationController@index');
Route::post('/user/register','Front\RegistrationController@store');
//User Login
Route::get('/user/login', 'Front\SessionController@index');
Route::post('/user/login','Front\SessionController@store');
//User Logout
Route::get('/user/logout', 'Front\SessionController@logout');
//User profile
 Route::get('user/profile', 'Front\UserProfileController@index');
 Route::get('user/order/{id}', 'Front\UserProfileController@show')->name('user.order');
 //cart
 Route::get('/cart', 'Front\CartController@index');
 Route::post('/cart', 'Front\CartController@store')->name('cart');
 Route::patch('/cart/update/{product}', 'Front\CartController@update')->name('cart.update');
 Route::delete('/cart/remove/{product}', 'Front\CartController@destroy')->name('remove.product');
 Route::post('/cart/saveforlater/{product}', 'Front\CartController@saveforlater')->name('saveforlater');

 // Save for later
Route::delete('/saveLater/destroy/{product}','Front\SaveLaterController@destroy')->name('saveLater.destroy');
Route::post('/cart/moveToCart/{product}','Front\SaveLaterController@moveToCart')->name('moveToCart');
 Route::get('/empty', function(){
    Cart::instance('default')->destroy();
 });
 //Checkout
 Route::get('/checkout', 'Front\CheckoutController@index')->name('checkout');
 Route::post('/checkout', 'Front\CheckoutController@store')->name('checkout.store');
