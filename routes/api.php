<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\TokenController;
use \App\Http\Controllers\UserRequestLogController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::middleware('auth:token')->group(function () {

    Route::prefix('log')->group(function () {
        Route::get('/', [UserRequestLogController::class, 'index']);
        Route::get('/{id}', [UserRequestLogController::class, 'show']);
    });

    Route::prefix('token')->group(function () {
        Route::post('/create', [TokenController::class, 'create']);
        Route::delete('/delete/{token}', [TokenController::class, 'delete']);
    });
});
