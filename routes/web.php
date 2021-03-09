<?php

Route::get('/', function () {
    return view('auth.login');
})->middleware('guest');


Auth::routes(['register' => false]);


Route::get('/home', 'HomeController@index')->name('home');


Route::resource('clients', 'ClientsController');


Route::resource('orders', 'OrdersController');


Route::post('/users', 'UsersController@store')->middleware(['auth', 'is_admin']);

Route::get('/users', 'UsersController@index')->middleware(['auth', 'is_admin']);

Route::get('/users/create', 'UsersController@create')->middleware(['auth', 'is_admin']);

Route::delete('/users/{user}', 'UsersController@destroy')->middleware(['auth', 'is_admin']);

Route::patch('/users/{user}', 'UsersController@update')->middleware('auth');

Route::get('/users/{user}', 'UsersController@show')->middleware(['auth', 'is_admin']);

Route::get('/users/{user}/edit', 'UsersController@edit')->middleware('auth');


Route::resource('hostings', 'HostingsController')->middleware(['auth', 'is_admin']);


Route::resource('domains', 'DomainsController')->middleware(['auth', 'is_admin']);


Route::resource('web', 'WebController')->middleware(['auth', 'is_admin']);


Route::get('/register', 'UsersController@showRegisterForm')->middleware('guest');

Route::post('/register', 'UsersController@register')->middleware('guest');

Route::patch('/approve/{user}', 'UsersController@approve')->middleware(['auth', 'is_admin']);


Route::get('/profile/{profile}', 'ProfilesController@show')->middleware('auth')->name('showProfile');

Route::get('/profile/{id}/edit', 'ProfilesController@edit')->middleware('auth');

Route::patch('/profile/{profile}', 'ProfilesController@update')->middleware('auth');
