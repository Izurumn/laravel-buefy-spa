<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['middleware' => 'auth:api'], function () {
    Route::post('logout', 'Auth\LoginController@logout');

    Route::get('/user', function (Request $request) {
        return $request->user();
    });


    Route::patch('settings/profile', 'Settings\ProfileController@update');
    Route::patch('settings/password', 'Settings\PasswordController@update');
});
Route::post('authenticate', 'Auth\ClientController@login');
Route::post('validate', 'ShopController@lalar');
Route::post('invalidate', 'ShopController@lalar');
Route::post('session/minecraft/join', 'ShopController@lalar');
Route::get('session/minecraft/hasJoined', 'ShopController@lalar2');
Route::get('session/minecraft/profile/{id}', 'ShopController@psps');
Route::post('refresh', 'ShopController@refresh');
Route::get('/', 'ShopController@kke');
Route::group(['middleware' => 'guest:api'], function () {
    Route::post('login', 'Auth\LoginController@login');

    Route::post('register', 'Auth\RegisterController@register');

    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
    Route::post('password/reset', 'Auth\ResetPasswordController@reset');

    Route::post('email/verify/{user}', 'Auth\VerificationController@verify')->name('verification.verify');
    Route::post('email/resend', 'Auth\VerificationController@resend');

    Route::post('oauth/{driver}', 'Auth\OAuthController@redirectToProvider');
    Route::get('oauth/{driver}/callback', 'Auth\OAuthController@handleProviderCallback')->name('oauth.callback');

});
    Route::get('/nexus', 'ShopController@server');
    Route::get('/posts', 'ShopController@posts');
    Route::get('/orders', 'OrdersController@orders')->middleware('role:admin');
    Route::get('/orders_status', 'OrdersController@orders_status');
    Route::get('/take_give', 'OrdersController@take_give');
    Route::post('/transfer', 'OrdersController@transfer');
    Route::post('/order', 'OrdersController@create');
    Route::get('/order/{id}', 'OrdersController@order_here');
    Route::post('/khanbank', 'OrdersController@giving_it');
    Route::get('/khanbank/take', 'OrdersController@take_out');
    Route::get('/item/{id}', 'ItemsController@item_id');
    Route::get('/servers', 'ServerController@index');
    Route::get('/status/{id}', 'OrdersController@changestatus');
    Route::get('/category/{id}', 'ItemsController@index');
    Route::get('/shop_server', 'ItemsController@shop_servers');
    Route::get('/shop_category', 'ItemsController@shop_category');
    Route::get('/admin/items', 'ItemsController@admin_index')->middleware('role:admin');
    Route::get('/admin/items/categories/{id}', 'ItemsController@categories')->middleware('role:admin');
    Route::post('/admin/items/update/', 'ItemsController@update')->middleware('role:admin');
    Route::post('/admin/items/delete/{id}', 'ItemsController@delete')->middleware('role:admin');
    Route::post('/admin/items/create/', 'ItemsController@create')->middleware('role:admin');
    Route::get('/admin/servers/', 'ServerController@admin_index')->middleware('role:admin');
    Route::post('/admin/servers/update/', 'ServerController@update')->middleware('role:admin');
    Route::post('/admin/servers/delete/{id}', 'ServerController@delete')->middleware('role:admin');
    Route::post('/admin/servers/create/', 'ServerController@create')->middleware('role:admin');
    Route::get('/admin/categories/{id}', 'CategoriesController@admin_index');
    Route::post('/admin/categories/update/', 'CategoriesController@update')->middleware('role:admin');
    Route::post('/admin/categories/delete/{id}', 'CategoriesController@delete')->middleware('role:admin');
    Route::post('/admin/categories/create/', 'CategoriesController@create')->middleware('role:admin');
    Route::put('/admin/posts/update/{id}', 'ShopController@postsupdate')->middleware('role:admin');
    Route::post('/admin/posts/delete/{id}', 'ShopController@postsdelete')->middleware('role:admin');
    Route::post('/admin/posts/create/', 'ShopController@postscreate')->middleware('role:admin');

    Route::get('/server', 'ShopController@server');
