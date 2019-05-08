<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
})->middleware('guest');

Auth::routes();

// Route::get('/home', 'HomeController@index');

Route::resource('/employee', 'EmployeeController', ['except' => ['create','edit','show','destroy']]);
Route::post('/employee/destroy', 'EmployeeController@destroy')->name('employee.destroy');
