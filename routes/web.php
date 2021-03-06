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

Route::get('/reports/clients', 'ReportsController@showClientsReport')->middleware('auth');

Route::get('/reports/orders', 'ReportsController@showOrdersReport')->middleware('auth');

Route::get('/reports/expenses', 'ReportsController@showExpensesReport')->middleware('auth');

Route::post('/reports/clients', 'ReportsController@reportClients')->middleware('auth');

Route::post('/reports/orders', 'ReportsController@reportOrders')->middleware('auth');

Route::post('/reports/expenses', 'ReportsController@reportExpenses')->middleware('auth');

Route::get('/reports/clients/pdf', 'ReportsController@clients_export_pdf')->middleware('auth');

Route::get('/reports/orders/pdf', 'ReportsController@orders_export_pdf')->middleware('auth');

Route::get('/reports/expenses/pdf', 'ReportsController@expenses_export_pdf')->middleware('auth');

Route::resource('expenseCategories', 'ExpenseCategoryController')->middleware(['auth', 'is_finance']);

Route::resource('expenses', 'ExpensesController')->middleware(['auth', 'is_finance']);

Route::resource('projects', 'ProjectsController')->names([
    'show' => 'projects.show'
])->middleware(['auth', 'is_tech']);

Route::post('/projects/{project}/tasks', 'ProjectTasksController@store')->middleware(['auth', 'is_tech']);

Route::patch('/tasks/{task}', 'ProjectTasksController@update')->middleware(['auth', 'is_tech']);

Route::get('/tasks/{task}', 'ProjectTasksController@show')->middleware(['auth', 'is_tech']);

Route::get('/tasks/{task}/edit', 'ProjectTasksController@edit')->middleware(['auth', 'is_tech']);

Route::patch('/edittask/{task}', 'ProjectTasksController@updateTask')->middleware(['auth', 'is_tech']);

Route::delete('/tasks/{task}', 'ProjectTasksController@destroy')->middleware(['auth', 'is_tech']);
