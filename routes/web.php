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

Route::group([
    'prefix'=>'admin', 
    'namespace'=>'Admin'
], function () {
    Route::resource('/company', 'CompanyController', ['as'=>'admin']);
    Route::resource('/employee', 'EmployeeController', ['as'=>'admin']);
    Route::resource('/transferlog', 'TransferLogController', ['as'=>'admin']);
    Route::get('/abusers', 'AbusersController@index', ['as'=>'admin'])->name('admin.abusers.index');

    
});

Route::get('/', 'Admin\DashboardController@dashboard');


