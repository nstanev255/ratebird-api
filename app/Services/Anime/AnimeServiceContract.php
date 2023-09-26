<?php

namespace App\Services\Anime;

interface AnimeServiceContract
{

    function getTopFiveTrendingForSeasonNow(int $limit);
    function getTopUpcoming(int $limit);
}
