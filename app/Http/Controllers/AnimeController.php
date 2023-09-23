<?php

namespace App\Http\Controllers;

use App\Services\Anime\AnimeServiceContract;
use Illuminate\Http\JsonResponse;

class AnimeController extends Controller
{
    public function __construct(private AnimeServiceContract $animeServiceContract)
    {}

    public function seasonNowTrending() : JsonResponse
    {
        $response = $this->animeServiceContract->getTopFiveTrendingForSeasonNow();
        return response()->json($response);
    }

    public function upcomingTrending() : JsonResponse {
        $response = $this->animeServiceContract->getTopFiveUpcoming();
        return response()->json($response);
    }
}
