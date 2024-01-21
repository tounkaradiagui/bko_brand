<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;

Route::get('/auth/register', [RegisterController::class, 'create'])
                ->middleware('guest')
                ->name('register');

Route::post('/auth/register', [RegisterController::class, 'store'])
                ->middleware('guest');

Route::get('/auth/login', [LoginController::class, 'create'])
                ->middleware('guest')
                ->name('login');

Route::post('/auth/login', [LoginController::class, 'authenticated'])
                ->middleware('guest');

Route::get('auth/google', [App\Http\Controllers\Auth\LoginController::class, 'redirectToProviderGoogle'])
            ->name('login.google-redirect');
Route::get('auth/google/callback', [App\Http\Controllers\Auth\LoginController::class, 'handleProviderCallbackGoogle'])
            ->name('login.google-callback');

Route::get('/forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('/reset-password/{token}', [ForgotPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('/reset-password', [ResetPasswordController::class, 'reset'])->name('password.update');

// Route::get('/auth/verify-email', [EmailVerificationPromptController::class, '__invoke'])
//                 ->middleware('auth')
//                 ->name('verification.notice');

// Route::get('/auth/verify-email/{id}/{hash}', [VerifyEmailController::class, '__invoke'])
//                 ->middleware(['auth', 'signed', 'throttle:6,1'])
//                 ->name('verification.verify');

// Route::post('/auth/email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
//                 ->middleware(['auth', 'throttle:6,1'])
//                 ->name('verification.send');

// Route::get('/auth/confirm-password', [ConfirmablePasswordController::class, 'show'])
//                 ->middleware('auth')
//                 ->name('password.confirm');

// Route::post('/auth/confirm-password', [ConfirmablePasswordController::class, 'store'])
//                 ->middleware('auth');
