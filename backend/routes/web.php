<?php

use App\Http\Controllers\Api\BalanceController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('api.auth')->group(function () {

    /* API Route For Users */
    Route::group(['prefix' => '/dev/api'], function () {
        Route::get('/users', [UserController::class, 'index']);
        Route::get('/user/{id}', [UserController::class, 'show']);
        Route::post('/user', [UserController::class, 'store']);
        Route::put('user/{id}',[UserController::class, 'update']);
        Route::delete('user/{id}',[UserController::class, 'destroy']);
    });

    /* API Route For Balance */
    Route::group(['prefix' => '/dev/api'], function () {
        Route::get('/balances', [BalanceController::class, 'index']);
        Route::post('/balance', [BalanceController::class, 'store']);
        Route::put('/balance/{id}',[BalanceController::class, 'update']);
        Route::delete('/balance/{id}',[BalanceController::class, 'destroy']);
    });

});

