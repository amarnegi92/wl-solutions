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
Route::get('/profile', [App\Http\Controllers\EndUserController::class, 'profile'])->name('profile');
Route::get('/sea-transport', [App\Http\Controllers\EndUserController::class, 'sea_transport'])->name('sea-transport');
Route::get('/air-transport', [App\Http\Controllers\EndUserController::class, 'air_transport'])->name('air-transport');
Route::get('/arrived', [App\Http\Controllers\EndUserController::class, 'arrived'])->name('arrived');
