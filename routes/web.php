<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/')->name('login')->uses('App\Http\Controllers\Auth\LoginController@showLoginForm');
Route::post('/')->uses('App\Http\Controllers\Auth\LoginController@login');
Auth::routes(['login' => false]);

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile');
Route::post('/change-password', [App\Http\Controllers\ProfileController::class, 'store'])->name('change.password');
Route::put('/upload-photo/{id}', [App\Http\Controllers\ProfileController::class, 'uploadPhoto'])->name('upload.photo');


