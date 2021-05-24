<?php

use Illuminate\Support\Facades\Route;

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
    return view('frontend.home');
});

//Auth Route for both
Route::group(['middleware' => ['auth']], function () {
    Route::get('/dashboard', 'App\Http\Controllers\DashboardController@index')->name('dashboard');
});


//for users
Route::group(['middleware' => ['auth', 'role:user']], function () {
    Route::get('/dashboard/myprofile', 'App\Http\Controllers\DashboardController@myprofile')->name('dashboard.myprofile');
});

//for SuperAdmin
Route::group(['middleware' => ['auth', 'role:superadmin']], function () {
    Route::get('/dashboard/view-superadmin', 'App\Http\Controllers\SuperadminController@index')->name('superadmin.view');

    Route::get('/dashboard/add-superadmin', 'App\Http\Controllers\SuperadminController@add')->name('superadmin.add');
    Route::post('/dashboard/add-superadmin', 'App\Http\Controllers\SuperadminController@store')->name('superadmin.store');

    //View and Add admin
    Route::get('/dashboard/view-admin', 'App\Http\Controllers\AdminController@index')->name('admin.view');
    Route::get('/dashboard/add-admin', 'App\Http\Controllers\AdminController@add')->name('admin.add');
    Route::post('/dashboard/add-admin', 'App\Http\Controllers\AdminController@store')->name('admin.store');

    //View and Add Warrior
    Route::get('/dashboard/view-warrior', 'App\Http\Controllers\WarriorController@index')->name('warrior.view');
    Route::get('/dashboard/add-warrior', 'App\Http\Controllers\WarriorController@add')->name('warrior.add');
    Route::post('/dashboard/add-warrior', 'App\Http\Controllers\WarriorController@store')->name('warrior.store');

    //View and Add Warrior
    Route::get('/dashboard/view-user', 'App\Http\Controllers\UserController@index')->name('user.view');
    Route::get('/dashboard/add-user', 'App\Http\Controllers\UserController@add')->name('user.add');
    Route::post('/dashboard/add-user', 'App\Http\Controllers\UserController@store')->name('user.store');
});

//For SuperAdmin | Admin 
Route::group(['middleware' => ['auth', 'role:superadmin|admin']], function () {
    Route::get('/dashboard/create-request', 'App\Http\Controllers\HelpRequestController@index')->name('request.create');
    Route::post('/dashboard/store-request', 'App\Http\Controllers\HelpRequestController@store')->name('request.store');
    Route::get('/dashboard/show-request', 'App\Http\Controllers\HelpRequestController@show')->name('request.show');
    Route::get('/dashboard/{helprequest}/delete', 'App\Http\Controllers\HelpRequestController@destroy');
});

require __DIR__ . '/auth.php';
