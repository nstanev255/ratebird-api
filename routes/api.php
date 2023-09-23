<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

/**
 * Top 5 trending seasonal.
 */
Route::get('anime/seasonal/trending', [\App\Http\Controllers\AnimeController::class, 'seasonNowTrending']);

/**
 * Top 5 upcoming trending.
 */
Route::get('anime/upcoming/trending', [\App\Http\Controllers\AnimeController::class, 'upcomingTrending']);
