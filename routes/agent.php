<?php

use App\Http\Controllers\Agent\AgentAuthenticatedSessionController;
use App\Http\Controllers\Agent\AgentRegisteredUserController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;

// Agent registration
Route::post('/agent/register', [AgentRegisteredUserController::class, 'store'])
    ->middleware('guest:agent')
    ->name('agent.register');

// Agent login
Route::post('/agent/login', [AgentAuthenticatedSessionController::class, 'store'])
    ->name('agent.login');

// Agent logout
Route::post('/agent/logout', [AgentAuthenticatedSessionController::class, 'destroy'])
    ->middleware('auth:agent')
    ->name('agent.logout');

Route::post('/agent/forgot-password', [PasswordResetLinkController::class, 'store'])
    ->middleware('guest')
    ->name('password.email');

Route::post('/agent/reset-password', [NewPasswordController::class, 'store'])
    ->middleware('guest')
    ->name('password.store');

Route::get('/agent/verify-email/{id}/{hash}', VerifyEmailController::class)
    ->middleware(['auth:sanctum', 'signed', 'throttle:6,1'])
    ->name('verification.verify');

Route::post('/agent/email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
    ->middleware(['auth:sanctum', 'throttle:6,1'])
    ->name('verification.send');
