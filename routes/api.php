<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\MovieAPIController;
use App\Http\Controllers\API\TvShowAPIController;
use App\Http\Controllers\TvShowController;
use Illuminate\Http\Request;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
Route::apiResource('movies', MovieAPIController::class)->middleware('auth:api')->except('index', 'show');
Route::apiResource('movies', MovieAPIController::class)->only('index', 'show');
Route::apiResource('tvshows', TvShowAPIController::class)->middleware('auth:api')->except('index', 'show');
Route::apiResource('tvshows', TvShowAPIController::class)->only('index', 'show');
