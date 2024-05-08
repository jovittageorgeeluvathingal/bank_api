<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;


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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Insert data
Route::post('/customers', [CustomerController::class, 'store']);

// View all data
Route::get('/customers', [CustomerController::class, 'index']);

// View data by ID
Route::get('/customers/{id}', [CustomerController::class, 'show']);

// Update data
Route::put('/customers/{id}', [CustomerController::class, 'update']);