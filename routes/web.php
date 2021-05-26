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
})->name('home');
Route::get('/requests', 'App\Http\Controllers\FrontendController@index');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/request-create', 'App\Http\Controllers\FrontendController@createreq');
    Route::post('store-request', 'App\Http\Controllers\HelpRequestController@store')->name('request.store');

    //Profile
    Route::get('myprofile', 'App\Http\Controllers\ProfileController@index')->name('myprofile.index');
    Route::post('myprofile/store', 'App\Http\Controllers\ProfileController@store')->name('myprofile.store');
});

//Auth Route for Warrior | Admin | Superadmin
Route::group(['middleware' => ['auth', 'role:warrior|admin|superadmin']], function () {
    Route::get('/dashboard', 'App\Http\Controllers\DashboardController@index')->name('dashboard');
    //Requests from dashboard
    Route::get('/dashboard/create-request', 'App\Http\Controllers\HelpRequestController@index')->name('request.create');
    Route::get('/dashboard/show-request', 'App\Http\Controllers\HelpRequestController@show')->name('request.show');
    Route::get('/dashboard/{helpRequest}/view-request', 'App\Http\Controllers\HelpRequestController@view')->name('request.view');
    Route::get('/dashboard/{helpRequest}/view-request/{user}/accept', 'App\Http\Controllers\HelpRequestController@acceptRequest');
    Route::post('/dashboard/{helpRequest}/view-request/{user}/decline', 'App\Http\Controllers\HelpRequestController@declineRequest');
});


//for users
Route::group(['middleware' => ['auth', 'role:user']], function () {
    // Route::get('/dashboard/myprofile', 'App\Http\Controllers\DashboardController@myprofile')->name('dashboard.myprofile');

    //Warrior Registration
    Route::get('/warrior-registration/{volunteer_Detail}', 'App\Http\Controllers\WarriorController@warriorregistration')->name('warriorregistration.index');
    Route::post('/warrior-registration/store', 'App\Http\Controllers\WarriorController@storewarrior')->name('warriorregistration.store');
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
    // Route::get('/dashboard/create-request', 'App\Http\Controllers\HelpRequestController@index')->name('request.create');
    // Route::post('store-request', 'App\Http\Controllers\HelpRequestController@store')->name('request.store');
    Route::get('/dashboard/manage-request', 'App\Http\Controllers\HelpRequestController@manageRequest')->name('request.manage');
    Route::get('/dashboard/{helprequest}/delete', 'App\Http\Controllers\HelpRequestController@destroy');

    //Verify Warrior
    Route::get('/dashboard/verify-warrior', 'App\Http\Controllers\WarriorController@verifyindex')->name('warrior.verifyindex');
});

require __DIR__ . '/auth.php';
