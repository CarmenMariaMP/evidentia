<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\v1\AuthController;
use Illuminate\Support\Facades\Auth;

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

Route::group(['prefix' => '{instance}'], function () {
    Route::group(['prefix' => 'v1'], function () {
        Route::group(['prefix' => 'auth'], function () {
            Route::group(['middleware' => 'jwt.verify'], function () {
                Route::post('logout',  [AuthController::class, "logout"]);
                Route::post('me',  [AuthController::class, "me"]);
                Route::post('refresh',  [AuthController::class, "refresh"]);
            });
            Route::post('login', [AuthController::class, "login"]);
        });
    });
});