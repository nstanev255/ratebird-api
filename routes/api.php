<?php

use App\Http\Controllers\AnimeController;
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
 * Search anime.
 */
Route::get('anime/search', [AnimeController::class, 'searchAnime']);

/**
 * Get taxonomies
 */
Route::get('taxonomy/{entity}/ratings', [\App\Http\Controllers\TaxonomyController::class, 'getRatings']);
Route::get('taxonomy/{entity}/sorts', [\App\Http\Controllers\TaxonomyController::class, 'getSorts']);
Route::get('taxonomy/{entity}/statuses', [\App\Http\Controllers\TaxonomyController::class, 'getStatuses']);
Route::get('taxonomy/{entity}/types', [\App\Http\Controllers\TaxonomyController::class, 'getTypes']);
Route::get('taxonomy/{entity}/genres', [\App\Http\Controllers\TaxonomyController::class, 'getGenres']);
