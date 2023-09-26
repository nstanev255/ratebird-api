<?php

namespace App\Http\Controllers;

use App\Services\Anime\JikanServiceContract;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function __construct(JikanServiceContract $jikanServiceContract)
    {
    }

    public function searchTrendingUpcomingAnime(Request $request) {

    }

}
