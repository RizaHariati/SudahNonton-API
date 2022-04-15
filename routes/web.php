<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\DashboardMovieController;
use App\Http\Controllers\DashboardTvShowController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\TvShowController;
use Illuminate\Support\Facades\Route;



Route::get('/', [FavoriteController::class, 'index']);
Route::get('/search', [FavoriteController::class, 'search']);
Route::get('/result', [FavoriteController::class, 'result']);

Route::resource('/movies', MovieController::class);
Route::resource('/tvshows', TvShowController::class);

Route::get('/auth/login', [LoginController::class, 'index'])->middleware('guest')->name('login');
Route::post('/auth/login', [LoginController::class, 'login']);
Route::get('/auth/logout', [LoginController::class, 'logout']);
Route::get('/auth/register', [LoginController::class, 'register']);


Route::resource('/dashboard/movies', DashboardMovieController::class);
Route::resource('/dashboard/tvshows', DashboardTvShowController::class);

Route::get('/searchMovie', [Controller::class, 'searchMovie']);
Route::post('/searchMovie', [Controller::class, 'selectMovie']);

Route::get('/searchTvShows', [Controller::class, 'searchTvShows']);
Route::post('/searchTvShows', [Controller::class, 'selectTvShows']);

Route::get('/dashboard/home', [Controller::class, 'dashboard']);
