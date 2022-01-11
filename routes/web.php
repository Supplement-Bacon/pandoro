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

use App\Http\Controllers\Web\HomeController;
use App\Http\Controllers\Web\Auth\UserController;
use App\Http\Controllers\Web\Auth\LoginController;
use App\Http\Controllers\Web\Auth\RegisterController;

use App\Http\Controllers\Web\Auth\ResetPasswordController;

Route::group(['prefix' => 'auth'], function()
{
    // Authentication Routes...
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [LoginController::class, 'login']);

    // Registration Routes...
    Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('register', [RegisterController::class, 'register']);

    Route::post('logout', [LoginController::class, 'logout'])->name('logout');

    // Forgot password
    Route::get('forgot-password', [ResetPasswordController::class, 'showForgotPasswordForm'])->middleware('guest')->name('password.request');
    Route::post('forgot-password', [ResetPasswordController::class, 'sendResetPasswordLink'])->middleware('guest')->name('password.email');
    Route::get('reset-password/{token}', [ResetPasswordController::class, 'showResetPasswordForm'])->middleware('guest')->name('password.reset');
    Route::post('reset-password', [ResetPasswordController::class, 'updatePassword'])->middleware('guest')->name('password.update');
});



Route::group(['middleware' => ['auth:web', 'verified']], function() {

    Route::get('/', [HomeController::class, 'home'])->name('home');
    Route::get('licenses', [HomeController::class, 'licenses'])->name('licenses');
    Route::get('changelog', [HomeController::class, 'changelog'])->name('changelog');
    
    Route::get('profile', [UserController::class, 'profile'])->name('profile');   
    
    Route::resource('users', UserController::class)->only([
        'update',
    ]);

});
