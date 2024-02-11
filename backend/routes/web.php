<?php

use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Cookie;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\BalanceController;
use App\Http\Controllers\Api\Helper\ApiKeyController;

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

/* API Routes */
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

/* Backend Documentation Routes */
Route::get('/', function () {
    return view('index');
});

/* JQuery to Controller path */
Route::post('/question', [ApiKeyController::class, 'generateApiKey'])->name('question');
Route::get('/cookie-delete', [ApiKeyController::class, 'deleteCookie'])->name('cookie-delete');

