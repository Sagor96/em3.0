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
    return view('index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

	//routes for guest
Route::group(['middleware'=>'guest'],function(){
Route::get('/admin/login','AdminAuthController@login')->name('admin.login');
Route::post('/admin/login','AdminAuthController@authenticate')->name('admin.auth');
Route::get('/admin/register','AdminAuthController@register')->name('admin.register');
Route::post('/admin/store','AdminAuthController@store')->name('admin.store');
});

	//routes for admin
Route::group(['prefix'=>'admin','middleware'=>'admin','as'=>'admin.'],function(){
Route::get('/home', 'AdminAuthController@home')->name('home');
Route::get('/dashboard', 'DashController@showAdmin')->name('dashboard');
Route::post('/logout','AdminAuthController@logoutAdmin')->name('logout');

	//Contact Zone
Route::resource('contacts', 'ContactController');
Route::apiResource('contacts', 'ContactController');

	//Venue Zone
Route::resource('venues', 'VenueController');
Route::apiResource('venues', 'VenueController');

});
