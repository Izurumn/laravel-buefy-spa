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

    Route::get('/shop/server/{id}', 'ShopController@serverlist');
    Route::get('/shop/item/{id}', 'ShopController@items');
    Route::get('/posts', 'ShopController@posts');
    Route::post('/order', 'ShopController@Order');
    Route::get('/orders', 'ShopController@orders')->middleware('role:admin');
    Route::get('/servers', 'ShopController@servers');
    Route::get('/admin/servers/', 'ShopController@serverswithkey')->middleware('role:admin');
    Route::put('/admin/servers/update/{id}', 'ShopController@serverupdate')->middleware('role:admin');
    Route::post('/admin/servers/delete/{id}', 'ShopController@serverdelete')->middleware('role:admin');
    Route::post('/admin/servers/create/', 'ShopController@servercreate')->middleware('role:admin');
    Route::put('/admin/posts/update/{id}', 'ShopController@postsupdate')->middleware('role:admin');
    Route::post('/admin/posts/delete/{id}', 'ShopController@postsdelete')->middleware('role:admin');
    Route::post('/admin/posts/create/', 'ShopController@postscreate')->middleware('role:admin');
    Route::post('/admin/ranks/create/', 'ShopController@rankcreate')->middleware('role:admin');
    Route::post('/admin/ranks/delete/{id}', 'ShopController@rankdelete')->middleware('role:admin');
    Route::post('/order/move/{id}', 'ShopController@deleteorder')->middleware('role:admin');
    Route::get('/completes', 'ShopController@completes')->middleware('role:admin');
    Route::get('/ranks', 'ShopController@ranks')->middleware('role:admin');
    Route::put('/rank/{id}', 'ShopController@rankupdate')->middleware('role:admin');
    Route::get('/server', 'ShopController@server');
