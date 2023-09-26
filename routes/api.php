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
 * Top trending seasonal.
 */
Route::get('anime/seasonal/trending', [\App\Http\Controllers\AnimeController::class, 'seasonNowTrending']);

/**
 * Top upcoming trending.
 */
Route::get('anime/upcoming/trending', [\App\Http\Controllers\AnimeController::class, 'upcomingTrending']);

/**
 * Get taxonomies
 */

Route::get('taxonomy/{entity}/ratings', [\App\Http\Controllers\TaxonomyController::class, 'getRatings']);
Route::get('taxonomy/{entity}/sort', [\App\Http\Controllers\TaxonomyController::class, 'getSorts']);
Route::get('taxonomy/{entity}/status', [\App\Http\Controllers\TaxonomyController::class, 'getStatuses']);
Route::get('taxonomy/{entity}/type', [\App\Http\Controllers\TaxonomyController::class, 'getTypes']);
