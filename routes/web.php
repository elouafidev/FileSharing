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

Route::get('/', function () {
    return \Illuminate\Support\Facades\Redirect::route('home');
});


Route::get('/home', [App\Http\Controllers\Front\HomeController::class, 'index'])->name('home');
Route::get('/FileManager', [App\Http\Controllers\Front\FileManagerController::class, 'index'])->name('file_manager');
Route::get('/FileManager/Sheet', [App\Http\Controllers\Front\SheetController::class, 'index'])->name('file_manager.sheet');
Route::get('/contact-us', [App\Http\Controllers\Front\ContactController::class, 'index'])->name('contact');
Route::post('/contact-us', [App\Http\Controllers\Front\ContactController::class, 'store'])->name('contact.store');
Route::group(['middleware' => 'auth.visitor'], function () {
    Route::get('profile', [App\Http\Controllers\Front\ProfileController::class, 'index'])->name('profile');
    Route::put('profile', [App\Http\Controllers\Front\ProfileController::class, 'update'])->name('profile.update');
});
Route::get('DoNotHaveAccess',[\App\Http\Controllers\Front\AccessController::class,'index'])->name('noaccess');
Route::get('login', [App\Http\Controllers\Front\Auth\LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [App\Http\Controllers\Front\Auth\LoginController::class, 'login']);
Route::post('logout', [App\Http\Controllers\Front\Auth\LoginController::class, 'logout'])->name('logout');
Route::get('register', [App\Http\Controllers\Front\Auth\RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [App\Http\Controllers\Front\Auth\RegisterController::class, 'register']);
Route::get('auth/google', [App\Http\Controllers\Front\Auth\GoogleAuthController::class, 'redirectToGoogle'])->name('auth.google');
Route::get('auth/google/callback', [App\Http\Controllers\Front\Auth\GoogleAuthController::class, 'handleGoogleCallback']);


