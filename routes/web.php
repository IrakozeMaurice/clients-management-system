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
    return view('auth.login');
})->middleware('guest');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('clients', 'ClientsController');

Route::resource('orders', 'OrdersController');

Route::resource('users', 'UsersController')->middleware(['auth', 'is_admin']);

Route::resource('hostings', 'HostingsController')->middleware(['auth', 'is_admin']);

Route::resource('domains', 'DomainsController')->middleware(['auth', 'is_admin']);

Route::resource('web', 'WebController')->middleware(['auth', 'is_admin']);
