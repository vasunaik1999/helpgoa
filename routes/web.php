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

// Route::get('/', function () {
//     return view('frontend.home');
// })->name('home');

//Home Route
Route::get('/', 'App\Http\Controllers\VisitorTrackerController@index')->name('home');
Route::get('/remover', 'App\Http\Controllers\VisitorTrackerController@remover');


Route::get('/requests', 'App\Http\Controllers\FrontendController@index');
Route::post('/requests', 'App\Http\Controllers\FrontendController@index')->name('request.viewrequestfrontend.search'); //search
Route::get('/you-are-banned', 'App\Http\Controllers\FrontendController@bannedpage');

Route::get('/completed', 'App\Http\Controllers\FrontendController@completed');
Route::post('/completed', 'App\Http\Controllers\FrontendController@completed')->name('request.completedfrontend.search');

// Resources
Route::get('/resources', 'App\Http\Controllers\ResourceController@index')->name('resources.index');
//Resources Types
Route::get('/resources/doctor-consultant', 'App\Http\Controllers\ResourceDoctorController@frontendview');
Route::get('/resources/ambulance', 'App\Http\Controllers\ResourceAmbulanceController@frontendview');
Route::get('/resources/oxygen', 'App\Http\Controllers\ResourceOxygenSuppliersController@frontendview');
Route::get('/resources/medicine', 'App\Http\Controllers\ResourceMedicineSupplierController@frontendview');
Route::get('/resources/hospitals', 'App\Http\Controllers\ResourceHospitalController@frontendview');
Route::get('/resources/food', 'App\Http\Controllers\ResourceFoodServicesController@frontendview');
Route::get('/resources/caretaker', 'App\Http\Controllers\ResourceCaretakingServicesController@frontendview');
Route::get('/resources/sanitization', 'App\Http\Controllers\ResourceDisinfectServicesController@frontendview');
Route::get('/resources/isolation-center', 'App\Http\Controllers\ResourceIsolationCenterController@frontendview');
Route::get('/resources/covid-testing', 'App\Http\Controllers\ResourceCovidTestingController@frontendview');

//Contact Form
Route::post('/contactform/submit', 'App\Http\Controllers\ContactFormController@store')->name('contactform.store');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/request-create', 'App\Http\Controllers\FrontendController@createreq');
    Route::post('store-request', 'App\Http\Controllers\HelpRequestController@store')->name('request.store');

    //Profile
    Route::get('myprofile', 'App\Http\Controllers\ProfileController@index')->name('myprofile.index');
    Route::post('myprofile/store', 'App\Http\Controllers\ProfileController@store')->name('myprofile.store');

    //My Requests
    Route::get('/myrequests', 'App\Http\Controllers\FrontendController@myrequests')->name('frontend.myrequest');
    Route::post('/myrequests-delete', 'App\Http\Controllers\FrontendController@deletemyrequest')->name('frontend.deletemyrequest');
    Route::post('/myrequests-edit', 'App\Http\Controllers\FrontendController@editmyrequest')->name('frontend.editmyrequest');
    Route::put('/myrequests-update', 'App\Http\Controllers\FrontendController@updatemyrequest')->name('frontend.updatemyrequest');
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
    Route::post('/dashboard/view-request/completed', 'App\Http\Controllers\HelpRequestController@requestCompleted')->name('request.mark.completed');
    Route::post('/dashboard/show-request', 'App\Http\Controllers\HelpRequestController@show')->name('request.viewrequestdashboard.search');
});


//for users
Route::group(['middleware' => ['auth', 'role:user']], function () {
    //Warrior Registration

    Route::post('/warrior-registration/store', 'App\Http\Controllers\WarriorController@storewarrior')->name('warriorregistration.store');
});

//for users and Warrior
Route::group(['middleware' => ['auth', 'role:user|warrior']], function () {

    //Warrior Registration
    Route::get('/warrior-registration/{volunteer_Detail}', 'App\Http\Controllers\WarriorController@warriorregistration')->name('warriorregistration.index');
    Route::get('/warrior-registration', 'App\Http\Controllers\WarriorController@displaylogin');
});


//for SuperAdmin
Route::group(['middleware' => ['auth', 'role:superadmin']], function () {
    Route::get('/dashboard/view-superadmin', 'App\Http\Controllers\SuperadminController@index')->name('superadmin.view');

    Route::get('/dashboard/add-superadmin', 'App\Http\Controllers\SuperadminController@add')->name('superadmin.add');
    Route::post('/dashboard/add-superadmin', 'App\Http\Controllers\SuperadminController@store')->name('superadmin.store');
    Route::get('/dashboard/view-superadmin/{user}/more-details', 'App\Http\Controllers\SuperadminController@moredetails')->name('admin.moredetails');
    Route::post('/dashboard/superadmin-ban', 'App\Http\Controllers\SuperadminController@banuser')->name('superadmin.ban');

    //View and Add admin
    Route::get('/dashboard/view-admin', 'App\Http\Controllers\AdminController@index')->name('admin.view');
    Route::get('/dashboard/add-admin', 'App\Http\Controllers\AdminController@add')->name('admin.add');
    Route::post('/dashboard/add-admin', 'App\Http\Controllers\AdminController@store')->name('admin.store');
    Route::get('/dashboard/view-admin/{user}/more-details', 'App\Http\Controllers\AdminController@moredetails')->name('admin.moredetails');
    Route::post('/dashboard/admin-ban', 'App\Http\Controllers\AdminController@banuser')->name('admin.ban');
    Route::post('/dashboard/admin-make-user', 'App\Http\Controllers\AdminController@admintouser')->name('admin.make.user');

    //View and Add Warrior
    Route::get('/dashboard/view-warrior', 'App\Http\Controllers\WarriorController@index')->name('warrior.view');
    Route::get('/dashboard/add-warrior', 'App\Http\Controllers\WarriorController@add')->name('warrior.add');
    Route::post('/dashboard/add-warrior', 'App\Http\Controllers\WarriorController@store')->name('warrior.store');
    Route::get('/dashboard/view-warrior/{user}/more-details', 'App\Http\Controllers\WarriorController@moredetails')->name('warrior.moredetails');
    Route::post('/dashboard/warrior-ban', 'App\Http\Controllers\WarriorController@banuser')->name('warrior.ban');
    Route::post('/dashboard/warrior-make-admin', 'App\Http\Controllers\WarriorController@makeadmin')->name('warrior.make.admin');

    //View and Add User
    Route::get('/dashboard/view-user', 'App\Http\Controllers\UserController@index')->name('user.view');
    Route::get('/dashboard/add-user', 'App\Http\Controllers\UserController@add')->name('user.add');
    Route::post('/dashboard/add-user', 'App\Http\Controllers\UserController@store')->name('user.store');
    Route::get('/dashboard/view-user/{user}/more-details', 'App\Http\Controllers\UserController@moredetails')->name('user.moredetails');
    Route::post('/dashboard/user-ban', 'App\Http\Controllers\UserController@banuser')->name('user.ban');
    Route::post('/dashboard/user-make-admin', 'App\Http\Controllers\UserController@makeadmin')->name('user.make.admin');

    //Contact form
    Route::get('/dashboard/contactform-responses', 'App\Http\Controllers\ContactFormController@index')->name('contactform.index');
    Route::post('/dashboard/contactform-responses/status', 'App\Http\Controllers\ContactFormController@updatestatus')->name('contactform.update.status');
});

//For SuperAdmin | Admin 
Route::group(['middleware' => ['auth', 'role:superadmin|admin']], function () {
    Route::get('/dashboard/manage-request', 'App\Http\Controllers\HelpRequestController@manageRequest')->name('request.manage');
    Route::get('/dashboard/{helprequest}/delete', 'App\Http\Controllers\HelpRequestController@destroy');

    //Verify Warrior
    Route::get('/dashboard/verify-warrior', 'App\Http\Controllers\WarriorController@verifyindex')->name('warrior.verifyindex');
    Route::get('/dashboard/verify-warrior/{id}', 'App\Http\Controllers\WarriorController@verifyview')->name('warrior.verifyview');
    Route::post('/dashboard/verify-warrior/agree', 'App\Http\Controllers\WarriorController@verifyagree')->name('warrior.verifyagree');
    Route::post('/dashboard/verify-warrior/disagree', 'App\Http\Controllers\WarriorController@verifydisagree')->name('warrior.verifydisagree');
    Route::post('/dashboard/verify-warrior/accept', 'App\Http\Controllers\WarriorController@verifyaccept')->name('warrior.verifyaccept');
    Route::post('/dashboard/verify-warrior/reject', 'App\Http\Controllers\WarriorController@verifyreject')->name('warrior.verifyreject');

    // Resources
    Route::get('/dashboard/resources', 'App\Http\Controllers\ResourceController@dashboardview');

    //doctor consultant
    Route::get('/dashboard/resources/doctor-consultant', 'App\Http\Controllers\ResourceDoctorController@index');
    Route::get('/dashboard/resources/doctor-consultant/create', 'App\Http\Controllers\ResourceDoctorController@create');
    Route::post('/dashboard/resources/doctor-consultant/store', 'App\Http\Controllers\ResourceDoctorController@store')->name('resource.doctor.store');
    Route::get('/dashboard/resources/doctor-consultant/{resourceDoctor}/edit', 'App\Http\Controllers\ResourceDoctorController@edit')->name('resource.doctor.edit');
    Route::post('/dashboard/resources/doctor-consultant/update', 'App\Http\Controllers\ResourceDoctorController@update')->name('resource.doctor.update');

    //Ambulance
    Route::get('/dashboard/resources/ambulance', 'App\Http\Controllers\ResourceAmbulanceController@index');
    Route::get('/dashboard/resources/ambulance/create', 'App\Http\Controllers\ResourceAmbulanceController@create');
    Route::post('/dashboard/resources/ambulance/store', 'App\Http\Controllers\ResourceAmbulanceController@store')->name('resource.ambulance.store');
    Route::get('/dashboard/resources/ambulance/{resourceAmbulance}/edit', 'App\Http\Controllers\ResourceAmbulanceController@edit')->name('resource.ambulance.edit');
    Route::post('/dashboard/resources/ambulance/update', 'App\Http\Controllers\ResourceAmbulanceController@update')->name('resource.ambulance.update');

    //OXYGEN
    Route::get('/dashboard/resources/oxygen', 'App\Http\Controllers\ResourceOxygenSuppliersController@index');
    Route::get('/dashboard/resources/oxygen/create', 'App\Http\Controllers\ResourceOxygenSuppliersController@create');
    Route::post('/dashboard/resources/oxygen/store', 'App\Http\Controllers\ResourceOxygenSuppliersController@store')->name('resource.oxygen.store');
    Route::get('/dashboard/resources/oxygen/{resourceOxygenSuppliers}/edit', 'App\Http\Controllers\ResourceOxygenSuppliersController@edit')->name('resource.oxygen.edit');
    Route::post('/dashboard/resources/oxygen/update', 'App\Http\Controllers\ResourceOxygenSuppliersController@update')->name('resource.oxygen.update');

    //Medical Supplier
    Route::get('/dashboard/resources/medicine', 'App\Http\Controllers\ResourceMedicineSupplierController@index');
    Route::get('/dashboard/resources/medicine/create', 'App\Http\Controllers\ResourceMedicineSupplierController@create');
    Route::post('/dashboard/resources/medicine/store', 'App\Http\Controllers\ResourceMedicineSupplierController@store')->name('resource.medicine.store');
    Route::get('/dashboard/resources/medicine/{resourceMedicineSupplier}/edit', 'App\Http\Controllers\ResourceMedicineSupplierController@edit')->name('resource.medicine.edit');
    Route::post('/dashboard/resources/medicine/update', 'App\Http\Controllers\ResourceMedicineSupplierController@update')->name('resource.medicine.update');

    //Hospital
    Route::get('/dashboard/resources/hospital', 'App\Http\Controllers\ResourceHospitalController@index');
    Route::get('/dashboard/resources/hospital/create', 'App\Http\Controllers\ResourceHospitalController@create');
    Route::post('/dashboard/resources/hospital/store', 'App\Http\Controllers\ResourceHospitalController@store')->name('resource.hospital.store');
    Route::get('/dashboard/resources/hospital/{resourceHospital}/edit', 'App\Http\Controllers\ResourceHospitalController@edit')->name('resource.hospital.edit');
    Route::post('/dashboard/resources/hospital/update', 'App\Http\Controllers\ResourceHospitalController@update')->name('resource.hospital.update');

    //Food Service
    Route::get('/dashboard/resources/food', 'App\Http\Controllers\ResourceFoodServicesController@index');
    Route::get('/dashboard/resources/food/create', 'App\Http\Controllers\ResourceFoodServicesController@create');
    Route::post('/dashboard/resources/food/store', 'App\Http\Controllers\ResourceFoodServicesController@store')->name('resource.food.store');
    Route::get('/dashboard/resources/food/{resourceFoodServices}/edit', 'App\Http\Controllers\ResourceFoodServicesController@edit')->name('resource.food.edit');
    Route::post('/dashboard/resources/food/update', 'App\Http\Controllers\ResourceFoodServicesController@update')->name('resource.food.update');

    //Care Taker
    Route::get('/dashboard/resources/caretaker', 'App\Http\Controllers\ResourceCaretakingServicesController@index');
    Route::get('/dashboard/resources/caretaker/create', 'App\Http\Controllers\ResourceCaretakingServicesController@create');
    Route::post('/dashboard/resources/caretaker/store', 'App\Http\Controllers\ResourceCaretakingServicesController@store')->name('resource.caretaker.store');
    Route::get('/dashboard/resources/caretaker/{resourceCaretakingServices}/edit', 'App\Http\Controllers\ResourceCaretakingServicesController@edit')->name('resource.caretaker.edit');
    Route::post('/dashboard/resources/caretaker/update', 'App\Http\Controllers\ResourceCaretakingServicesController@update')->name('resource.caretaker.update');

    //Disinfectant/Sanitization Service
    Route::get('/dashboard/resources/sanitization', 'App\Http\Controllers\ResourceDisinfectServicesController@index');
    Route::get('/dashboard/resources/sanitization/create', 'App\Http\Controllers\ResourceDisinfectServicesController@create');
    Route::post('/dashboard/resources/sanitization/store', 'App\Http\Controllers\ResourceDisinfectServicesController@store')->name('resource.sanitization.store');
    Route::get('/dashboard/resources/sanitization/{resourceDisinfectServices}/edit', 'App\Http\Controllers\ResourceDisinfectServicesController@edit')->name('resource.sanitization.edit');
    Route::post('/dashboard/resources/sanitization/update', 'App\Http\Controllers\ResourceDisinfectServicesController@update')->name('resource.sanitization.update');

    //Isolation Center
    Route::get('/dashboard/resources/isolation-center', 'App\Http\Controllers\ResourceIsolationCenterController@index');
    Route::get('/dashboard/resources/isolation-center/create', 'App\Http\Controllers\ResourceIsolationCenterController@create');
    Route::post('/dashboard/resources/isolation-center/store', 'App\Http\Controllers\ResourceIsolationCenterController@store')->name('resource.isolation-center.store');
    Route::get('/dashboard/resources/isolation-center/{resourceIsolationCenter}/edit', 'App\Http\Controllers\ResourceIsolationCenterController@edit')->name('resource.isolation-center.edit');
    Route::post('/dashboard/resources/isolation-center/update', 'App\Http\Controllers\ResourceIsolationCenterController@update')->name('resource.isolation-center.update');

    //Covid Testing
    Route::get('/dashboard/resources/covid-testing', 'App\Http\Controllers\ResourceCovidTestingController@index');
    Route::get('/dashboard/resources/covid-testing/create', 'App\Http\Controllers\ResourceCovidTestingController@create');
    Route::post('/dashboard/resources/covid-testing/store', 'App\Http\Controllers\ResourceCovidTestingController@store')->name('resource.covid-testing.store');
    Route::get('/dashboard/resources/covid-testing/{resourceCovidTesting}/edit', 'App\Http\Controllers\ResourceCovidTestingController@edit')->name('resource.covid-testing.edit');
    Route::post('/dashboard/resources/covid-testing/update', 'App\Http\Controllers\ResourceCovidTestingController@update')->name('resource.covid-testing.update');
});

require __DIR__ . '/auth.php';
