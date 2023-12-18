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

Route::resource('reception', 'App\Http\Controllers\ReceptionController');
Route::resource('doctor', 'App\Http\Controllers\DoctorController');
Route::resource('dashboard', 'App\Http\Controllers\DashboardController');
//Route::resource('reception', 'ReceptionController');
// Route::resource('doctor', 'DoctorController');
// Route::resource('dashboard', 'DashboardController');

// Route::get('/', function () {
//     return view('listings');
// });
