<?php

use App\Http\Controllers\Api\AgentController;
use App\Http\Controllers\Api\InquiryController;
use App\Http\Controllers\Api\PreferencesController;
use App\Http\Controllers\Api\PropertyController;
use App\Http\Controllers\Api\UserController;
use App\Mail\testmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware(['auth:sanctum'])->group(function () {
    Route::resource('users', UserController::class);
    Route::resource('agents', AgentController::class);
    Route::resource('properties', PropertyController::class);
    Route::resource('inquiries', InquiryController::class);
    Route::resource('preferences', PreferencesController::class);
});
Route::get('/send-test-mail', function () {
    Mail::to('afas200030@gmail.com')->send(new TestMail());
    return 'Email sent!';
});

Route::get('/userss2', [UserController::class, 'index']);

// require __DIR__ . '/auth.php';
