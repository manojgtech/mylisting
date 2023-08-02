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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/getStarted', [App\Http\Controllers\HomeController::class, 'register'])->name('getstarted');
Route::post('/register_step1', [App\Http\Controllers\HomeController::class, 'register_step1'])->name('register_step1');
Route::get('/dashboard', [App\Http\Controllers\UserController::class, 'userdashboard'])->name('dashboard');
Route::get('/profile', [App\Http\Controllers\UserController::class, 'profile'])->name('profile');
Route::get('/add-listing', [App\Http\Controllers\UserController::class, 'addListing']);
Route::post('/add-listing', [App\Http\Controllers\UserController::class, 'saveListing']);
Route::post('/uploadimg',  [App\Http\Controllers\UserController::class, 'uploadimg']);
Route::get('/user/listings',  [App\Http\Controllers\UserController::class, 'listings']);