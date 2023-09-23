<?php

namespace App\Http\Controllers;

use App\Services\Anime\AnimeServiceContract;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AnimeController extends Controller
{
    public function __construct(private AnimeServiceContract $animeServiceContract)
    {
    }

    public function seasonNowTrending(Request $request): JsonResponse
    {
        $limit = $request->query('limit');
        if($limit === null) {
            $limit = 0;
        }

        $response = $this->animeServiceContract->getTopFiveTrendingForSeasonNow($limit);
        return response()->json($response);
    }

    public function upcomingTrending(Request $request): JsonResponse
    {
        $limit = $request->query('limit');
        if ($limit === null) {
            $limit = 0;
        }

        $response = $this->animeServiceContract->getTopFiveUpcoming($limit);
        return response()->json($response);
    }
}
