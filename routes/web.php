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
Route::get('/you-are-banned', 'App\Http\Controllers\FrontendController@bannedpage');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/request-create', 'App\Http\Controllers\FrontendController@createreq');
    Route::post('store-request', 'App\Http\Controllers\HelpRequestController@store')->name('request.store');

    //Profile
    Route::get('myprofile', 'App\Http\Controllers\ProfileController@index')->name('myprofile.index');
    Route::post('myprofile/store', 'App\Http\Controllers\ProfileController@store')->name('myprofile.store');

    //My Requests
    Route::get('myrequests', 'App\Http\Controllers\FrontendController@myrequests')->name('frontend.myrequest');
    Route::post('myrequests-delete', 'App\Http\Controllers\FrontendController@deletemyrequest')->name('frontend.deletemyrequest');
    Route::post('myrequests-edit', 'App\Http\Controllers\FrontendController@editmyrequest')->name('frontend.editmyrequest');
    Route::put('myrequests-update', 'App\Http\Controllers\FrontendController@updatemyrequest')->name('frontend.updatemyrequest');
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
    // Route::get('/warrior-registration/{volunteer_Detail}', 'App\Http\Controllers\WarriorController@warriorregistration')->name('warriorregistration.index');
    Route::post('/warrior-registration/store', 'App\Http\Controllers\WarriorController@storewarrior')->name('warriorregistration.store');
});
//for users and Warrior
Route::group(['middleware' => ['auth', 'role:user|warrior']], function () {

    //Warrior Registration
    Route::get('/warrior-registration/{volunteer_Detail}', 'App\Http\Controllers\WarriorController@warriorregistration')->name('warriorregistration.index');
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
    Route::get('/dashboard/view-warrior/{user}/more-details', 'App\Http\Controllers\WarriorController@moredetails')->name('warrior.moredetails');
    Route::post('/dashboard/warrior-ban', 'App\Http\Controllers\WarriorController@banuser')->name('warrior.ban');

    //View and Add User
    Route::get('/dashboard/view-user', 'App\Http\Controllers\UserController@index')->name('user.view');
    Route::get('/dashboard/add-user', 'App\Http\Controllers\UserController@add')->name('user.add');
    Route::post('/dashboard/add-user', 'App\Http\Controllers\UserController@store')->name('user.store');
    Route::get('/dashboard/view-user/{user}/more-details', 'App\Http\Controllers\UserController@moredetails')->name('user.moredetails');
    Route::post('/dashboard/user-ban', 'App\Http\Controllers\UserController@banuser')->name('user.ban');
});

//For SuperAdmin | Admin 
Route::group(['middleware' => ['auth', 'role:superadmin|admin']], function () {
    // Route::get('/dashboard/create-request', 'App\Http\Controllers\HelpRequestController@index')->name('request.create');
    // Route::post('store-request', 'App\Http\Controllers\HelpRequestController@store')->name('request.store');
    Route::get('/dashboard/manage-request', 'App\Http\Controllers\HelpRequestController@manageRequest')->name('request.manage');
    Route::get('/dashboard/{helprequest}/delete', 'App\Http\Controllers\HelpRequestController@destroy');

    //Verify Warrior
    Route::get('/dashboard/verify-warrior', 'App\Http\Controllers\WarriorController@verifyindex')->name('warrior.verifyindex');
    Route::get('/dashboard/verify-warrior/{id}', 'App\Http\Controllers\WarriorController@verifyview')->name('warrior.verifyview');
    Route::post('/dashboard/verify-warrior/agree', 'App\Http\Controllers\WarriorController@verifyagree')->name('warrior.verifyagree');
    Route::post('/dashboard/verify-warrior/disagree', 'App\Http\Controllers\WarriorController@verifydisagree')->name('warrior.verifydisagree');
    Route::post('/dashboard/verify-warrior/accept', 'App\Http\Controllers\WarriorController@verifyaccept')->name('warrior.verifyaccept');
    Route::post('/dashboard/verify-warrior/reject', 'App\Http\Controllers\WarriorController@verifyreject')->name('warrior.verifyreject');
});

require __DIR__ . '/auth.php';
