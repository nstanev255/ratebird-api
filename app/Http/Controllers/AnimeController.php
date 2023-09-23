<?php

namespace App\Http\Controllers;

use App\Providers\AnimeServiceProvider;
use App\Services\Anime\AnimeServiceContract;
use Illuminate\Http\Request;

class AnimeController extends Controller
{
    public function __construct(private AnimeServiceContract $animeServiceContract)
    {}

    public function seasonNowTrending() : \Illuminate\Http\JsonResponse
    {
        $response = $this->animeServiceContract->getTopFiveTrendingForSeasonNow();
        return response()->json($response);
    }
}
