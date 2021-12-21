<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\v1\AuthController;
use App\Http\Controllers\Api\v1\CommiteeController;

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
                Route::post('logout',  [AuthController::class, 'logout']);
                Route::get('me',  [AuthController::class, 'me']);
                Route::post('refresh',  [AuthController::class, 'refresh']);
            });
            Route::post('login', [AuthController::class, 'login']);
        });

        Route::group(['middleware' => 'jwt.verify'], function () {
            Route::get('commitee', [CommiteeController::class, 'getAll']);
            Route::put('commitee', [CommiteeController::class, 'create']);
            Route::get('commitee/{id}', [CommiteeController::class, 'getById']);
            Route::post('commitee/{id}', [CommiteeController::class, 'updateById']);
            Route::delete('commitee/{id}', [CommiteeController::class, 'deleteById']);
        });
    });
});
