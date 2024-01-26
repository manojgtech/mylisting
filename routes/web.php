<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginRegisterController;
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
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/list/{slug}', [App\Http\Controllers\HomeController::class, 'view']);
Route::get('/result', [App\Http\Controllers\HomeController::class, 'alllists']);
Route::get('/category/{category}', [App\Http\Controllers\HomeController::class, 'viewcategory']);
Route::get('/city/{city}', [App\Http\Controllers\HomeController::class, 'viewcity']);
Route::get('/getStarted', [App\Http\Controllers\HomeController::class, 'register'])->name('getstarted');
Route::post('/register_step1', [App\Http\Controllers\HomeController::class, 'register_step1'])->name('register_step1');
Route::get('/dashboard', [App\Http\Controllers\UserController::class, 'userdashboard'])->name('dashboard');
Route::get('/profile', [App\Http\Controllers\UserController::class, 'profile'])->name('profile');
Route::post('/updateprofile', [App\Http\Controllers\UserController::class, 'updateprofile']);
Route::get('/add-listing', [App\Http\Controllers\UserController::class, 'addListing']);
Route::post('/add-listing', [App\Http\Controllers\UserController::class, 'saveListing']);
Route::get('/signup', [App\Http\Controllers\CustomerController::class, 'signup']);
Route::post('/signupnow', [App\Http\Controllers\CustomerController::class, 'signupnow']);
Route::get('/customer/account', [App\Http\Controllers\CustomerController::class, 'account']);
Route::post('/uploadimg',  [App\Http\Controllers\UserController::class, 'uploadimg']);
Route::get('/user/listings',  [App\Http\Controllers\UserController::class, 'listings']);
Route::get('/user/editlist/{id}',  [App\Http\Controllers\UserController::class, 'editlist']);
Route::post('/edit-listing', [App\Http\Controllers\UserController::class, 'updateListing']);
Route::get('/deletelist/{id}', [App\Http\Controllers\UserController::class, 'deletelist']);
Route::get('/search', [App\Http\Controllers\HomeController::class, 'search']);
Route::post('/getcitydata', [App\Http\Controllers\HomeController::class, 'getcitydata']);
Route::post('/registernow', [App\Http\Controllers\HomeController::class, 'registernow']);
Route::get('/categories', [App\Http\Controllers\HomeController::class, 'categories']);
Route::get('/categoriesdata', [App\Http\Controllers\HomeController::class, 'categoriesdata']);
Route::post('/userlogin',[App\Http\Controllers\Auth\LoginController::class, 'userlogin']);

// Route::controller(LoginRegisterController::class)->group(function() {
//     Route::get('/register', 'register')->name('register');
//     Route::post('/store', 'store')->name('store');
//     Route::get('/login', 'login')->name('login');
//     Route::post('/authenticate', 'authenticate')->name('authenticate');
//     Route::get('/dashboard', 'dashboard')->name('dashboard');
//     Route::post('/logout', 'logout')->name('logout');
// });
