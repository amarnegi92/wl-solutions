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
    return view('welcome');
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//End User Routes
Route::get('/profile', [App\Http\Controllers\EndUserController::class, 'profile'])->name('profile');
Route::get('/sea-transport', [App\Http\Controllers\EndUserController::class, 'sea_transport'])->name('sea-transport');
Route::get('/air-transport', [App\Http\Controllers\EndUserController::class, 'air_transport'])->name('air-transport');
Route::get('/arrived', [App\Http\Controllers\EndUserController::class, 'arrived'])->name('arrived');

//Admin Routes
Route::get('/admin/dashboard', [App\Http\Controllers\AdminController::class, 'dashboard'])->name('admin/dashboard');
Route::get('/admin/customers', [App\Http\Controllers\AdminController::class, 'customers'])->name('admin/customers');
Route::get('/admin/add-customer', [App\Http\Controllers\AdminController::class, 'add_customer'])->name('admin/add-customer');
Route::get('/admin/add-package', [App\Http\Controllers\AdminController::class, 'add_package'])->name('admin/add-package');
Route::get('/admin/arrived', [App\Http\Controllers\AdminController::class, 'arrived'])->name('admin/arrived');
Route::get('/admin/sea-transport', [App\Http\Controllers\AdminController::class, 'sea_transport'])->name('admin/sea-transport');
Route::get('/admin/air-transport', [App\Http\Controllers\AdminController::class, 'air_transport'])->name('admin/air-transport');
Route::get('/admin/news', [App\Http\Controllers\AdminController::class, 'news'])->name('admin/news');


