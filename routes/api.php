<?php

use App\Http\Controllers\Api\AgentController;
use App\Http\Controllers\Api\AgentPropertyController;
use App\Http\Controllers\Api\InquiryController;
use App\Http\Controllers\Api\PreferencesController;
use App\Http\Controllers\Api\PropertyController;
use App\Http\Controllers\Api\PropertyImageController;
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
Route::resource('properties', PropertyController::class);

Route::middleware(['auth:sanctum'])->group(function () {
    Route::resource('users', UserController::class);
    Route::resource('agents', AgentController::class);
    Route::resource('inquiries', InquiryController::class);
    Route::resource('preferences', PreferencesController::class);
    Route::post('preferences/{preference}', [PreferencesController::class, "add"]);


    //Agent Properties
    Route::get('loggedInUser', [AgentController::class, 'loggedInUser']);
    Route::get('agent/properties', [AgentPropertyController::class, 'index']);
    Route::get('agent/properties/{property}', [AgentPropertyController::class, 'show']);
    Route::post('agent/properties', [AgentPropertyController::class, 'store']);
    Route::put('agent/properties/{property}', [AgentPropertyController::class, 'update']);
    Route::delete('agent/properties/{property}', [AgentPropertyController::class, 'destroy']);


    //Property Images
    // Route::get('agent/properties/{property}/images', [PropertyImageController::class, 'index']);
    Route::get('properties/{property}/images', [PropertyImageController::class, 'index']);
    Route::post('properties/{property}/images', [PropertyImageController::class, 'store']);
    Route::delete('images/{propertyImage}', [PropertyImageController::class, 'destroy']);
});
Route::get('/send-test-mail', function () {
    Mail::to('afas200030@gmail.com')->send(new TestMail());
    return 'Email sent!';
});

Route::get('/userss2', [UserController::class, 'index']);

// require __DIR__ . '/auth.php';
