<?php

namespace App\Http\Controllers;

use App\Providers\AnimeServiceProvider;
use App\Services\Anime\AnimeServiceContract;
use Illuminate\Http\Request;

class AnimeController extends Controller
{
    public function __construct(private AnimeServiceContract $animeServiceContract)
    {}

    public function findAnime() : \Illuminate\Http\JsonResponse
    {
        $response = $this->animeServiceContract->getAnime();
        return response()->json($response);
    }
}
