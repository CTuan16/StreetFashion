<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\client\HomeController;
use App\Http\Controllers\client\detallController;
use App\Http\Controllers\Client\ManagerUser;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VerifyOTP;
use App\Http\Controllers\VerifyOtpController;
use App\Http\Controllers\VirfyOTP;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\LoginGoogleController;

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
Route::get('/',[HomeController::class,'index'])->name('home');
Route::get('/forgot', [ManagerUser::class, 'Forgot'])->name('forgotView');
Route::post('/forgotpassword', [UserController::class, 'sendOtp'])->name('forgotpassword');
Route::get('/verify_otp', [UserController::class, 'showVerifyOtpForm'])->name('verifyOtpForm');
Route::post('/verify_otp', [VerifyOtpController::class, 'verifyOtpForm'])->name('verifyOtpForm'); 
Route::get('/reset_password', [UserController::class, 'showResetPasswordForm'])->name('resetPasswordForm');
Route::post('/reset_password', [UserController::class, 'resetPassword'])->name('resetPassword');

Route::get('login/google', [LoginGoogleController::class, 'redirectToGoogle'])->name('google-login');
Route::get('login/google/callback', [LoginGoogleController::class, 'handleGoogleCallback']);
