<?php

use Illuminate\Support\Facades\Auth;
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
    return view('welcome');
})->name('baseurl');

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('news', [App\Http\Controllers\NewsController::class, 'users_news'])->name('news');
Route::get('about_us', function() {return view('about_us');})->name('about_us');
Route::get('contact_us', function() {return view('contact_us');})->name('contact_us');

//End User Routes
Route::group(['middleware' => ['auth', 'is_customer']], function() {
    Route::get('profile', [App\Http\Controllers\EndUserController::class, 'profile'])->name('profile');
    Route::get('sea-transport', [App\Http\Controllers\EndUserController::class, 'sea_transport'])->name('sea-transport');
    Route::get('air-transport', [App\Http\Controllers\EndUserController::class, 'air_transport'])->name('air-transport');
    Route::get('arrived', [App\Http\Controllers\EndUserController::class, 'arrived'])->name('arrived');    
    Route::get('orders', [App\Http\Controllers\EndUserController::class, 'orders'])->name('arrived');    
});


//Admin Routes
Route::group(['prefix'=>'admin'], function() {
    Route::get('login', [App\Http\Controllers\Auth\AuthController::class, 'index'])->name('admin/login');
    Route::post('login', [App\Http\Controllers\Auth\AuthController::class, 'postLogin'])->name('admin/post/login');
    Route::get('logout', [App\Http\Controllers\Auth\AuthController::class, 'logout'])->name('admin/logout');
});
Route::group(['prefix'=>'admin', 'middleware' => ['auth', 'is_admin']], function() {
 
    Route::get('dashboard', [App\Http\Controllers\AdminController::class, 'dashboard'])->name('admin/dashboard');
    // Route::get('customers', [App\Http\Controllers\AdminController::class, 'customers'])->name('admin/customers');
    
    // Route::get('add-package', [App\Http\Controllers\AdminController::class, 'add_package'])->name('admin/add-package');
    // Route::get('arrived', [App\Http\Controllers\AdminController::class, 'arrived'])->name('admin/arrived');
    // Route::get('sea-transport', [App\Http\Controllers\AdminController::class, 'sea_transport'])->name('admin/sea-transport');
    // Route::get('air-transport', [App\Http\Controllers\AdminController::class, 'air_transport'])->name('admin/air-transport');
    Route::get('news', [App\Http\Controllers\NewsController::class, 'admin_news'])->name('admin/news');
    Route::get('add-news', function () { return view('admin.add_news'); })->name('news.add');
    Route::post('add-news', [App\Http\Controllers\NewsController::class, 'post_add'])->name('news.add');
    Route::get('edit-news/{id}', [App\Http\Controllers\NewsController::class, 'get_edit'])->name('news.edit');
    Route::post('edit-news/{id}', [App\Http\Controllers\NewsController::class, 'post_edit'])->name('news.edit');
    Route::get('delete-news/{id}', [App\Http\Controllers\NewsController::class, 'get_delete'])->name('news.delete');


    //Customers route ***** Start ******
    Route::get('customers', [App\Http\Controllers\CustomerController::class, 'index'])->name('customers.list');
    // Route::get('add-customer', [App\Http\Controllers\AdminController::class, 'add_customer'])->name('admin/add-customer');
    Route::get('add-customer', function () { return view('admin.add_customer'); })->name('admin.addC');

    Route::post('add-customer', [App\Http\Controllers\CustomerController::class, 'add'])->name('customers.add');
    Route::get('edit-customer/{id}', [App\Http\Controllers\CustomerController::class, 'getEdit'])->name('customer.edit');
    Route::post('edit-customer/{id}', [App\Http\Controllers\CustomerController::class, 'add'])->name('customer.editPost');
    Route::get('delete-customer/{id}', [App\Http\Controllers\CustomerController::class, 'getDelete'])->name('customer.delete');
    //Customer Route ##### End ####

    // Arrived route **** Start ********
    /*
    Route::get('arrived', [App\Http\Controllers\ShippingController::class, 'index'])->name('admin.arrived');
    Route::get('add-package', [App\Http\Controllers\ShippingController::class, 'addPackage'])->name('admin.addPackage');
    Route::post('add-package', [App\Http\Controllers\ShippingController::class, 'postAddPackage'])->name('admin.addPackage');
    */

    Route::get('arrived', [App\Http\Controllers\ShippingController::class, 'index'])->name('admin.arrived');
    Route::get('add-package', [App\Http\Controllers\ShippingController::class, 'addPackage'])->name('admin.addPackage');
    Route::post('add-package', [App\Http\Controllers\ShippingController::class, 'postAddPackage'])->name('admin.addPackage');

    Route::get('edit-package/{id}', [App\Http\Controllers\ShippingController::class, 'getEditPackage'])->name('package.edit');
    Route::post('edit-package/{id}', [App\Http\Controllers\ShippingController::class, 'postAddPackage'])->name('package.editPost');
    Route::get('delete-package/{id}', [App\Http\Controllers\ShippingController::class, 'deleteArrived'])->name('package.delete');

    Route::post('add-shipment', [App\Http\Controllers\ShippingController::class, 'addShipment'])->name('shipment.add');

    Route::get('sea-transport', [App\Http\Controllers\SeaTransportController::class, 'index'])->name('admin/sea-transport');
    Route::get('air-transport', [App\Http\Controllers\SeaTransportController::class, 'indexAir'])->name('admin/air-transport');
    Route::post('change-transport-status', [App\Http\Controllers\SeaTransportController::class, 'changeShipmentStatus'])->name('changeTransportBatchStatus');
    Route::get('delete-sea-transport/{type}/{id}/{sanitized_order_number}', [App\Http\Controllers\SeaTransportController::class, 'deleteTransport'])->name('transport.delete');
    Route::get('delete-air-transport/{type}/{id}', [App\Http\Controllers\SeaTransportController::class, 'deleteTransport'])->name('transportair.delete');
    // Arrived route **** end ********

    Route::get('orders', [App\Http\Controllers\OrderController::class, 'index'])->name('admin.orders');
    Route::get('add_orders', [App\Http\Controllers\OrderController::class, 'addOrder'])->name('admin.addOrders');
    Route::post('add_orders', [App\Http\Controllers\OrderController::class, 'postAddOrder'])->name('admin.postAddOrders');
    Route::get('edit_order/{id}', [App\Http\Controllers\OrderController::class, 'getEditOrder'])->name('admin.editOrder');
    Route::post('edit_order/{id}', [App\Http\Controllers\OrderController::class, 'postAddOrder'])->name('admin.postEditOrder');
    Route::get('delete_order/{id}', [App\Http\Controllers\OrderController::class, 'deleteOrder'])->name('admin.deleteOrder');

});

Route::get('lang/{lang}', [App\Http\Controllers\LanguageController::class, 'switchLang'])->name('lang.switch');

