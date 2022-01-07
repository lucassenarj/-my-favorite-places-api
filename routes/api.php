<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PlacesController;
use App\Http\Controllers\UsersController;

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


Route::prefix('v0')->group(function() {
    Route::prefix('places')->group(function() {
        Route::get('/', [PlacesController::class, 'index']);
        Route::get('/{slug}', [PlacesController::class, 'show']);

        Route::middleware('jwt.auth')->group(function() {
            Route::post('/', [PlacesController::class, 'store']);
        });
    });

    Route::prefix('users')->group(function() {
        Route::post('/', [UsersController::class, 'store']);
        Route::get('/', [UsersController::class, 'index']);
        Route::get('/{username}', [UsersController::class, 'show']);
    });

    Route::prefix('auth')->middleware('api')->group(function() {
        Route::post('login', [AuthController::class, 'login']);
        Route::post('logout', [AuthController::class, 'logout']);
        Route::post('refresh', [AuthController::class, 'refresh']);
        Route::post('me', [AuthController::class, 'me']);
    });
});
