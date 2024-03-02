<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\MedicationController;

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
Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/user', function () {
        return $request->user();
    });
    Route::get('/medication-delete/{id}', 'App\http\Controllers\MedicationController@forceDelete');
    Route::resource('medication', MedicationController::class);
    Route::get('/customer-delete/{id}', 'App\http\Controllers\CustomerController@forceDelete');
    Route::resource('customer', CustomerController::class);

});
