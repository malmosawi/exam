<?php

use App\Http\Controllers\StudentAuth\VerifyMobileController;
use App\Http\Controllers\StudentAuth\AuthenticatedSessionController;
use App\Http\Controllers\StudentAuth\ConfirmablePasswordController;
use App\Http\Controllers\StudentAuth\EmailVerificationNotificationController;
use App\Http\Controllers\StudentAuth\EmailVerificationPromptController;
use App\Http\Controllers\StudentAuth\NewPasswordController;
use App\Http\Controllers\StudentAuth\PasswordResetLinkController;
use App\Http\Controllers\StudentAuth\RegisteredUserController;
use App\Http\Controllers\StudentAuth\VerifyEmailController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest:student')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])
                ->name('register');

    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
                ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
                ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
                ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
                ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
                ->name('password.update');
});

Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
            ->name('logout');
Route::view('verify-mobile','student.verify-mobile')->name('verification-mobile.notice');

Route::post('verify-mobile', [VerifyMobileController::class, '__invoke'])
            ->middleware(['throttle:6,1'])
            ->name('verification.verify-mobile');

Route::post('resend', [VerifyMobileController::class, 'resend'])->name('verification.resend');

        
