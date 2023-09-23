<?php

namespace App\Services\Anime;

interface AnimeServiceContract
{

    function getTopFiveTrendingForSeasonNow(int $limit);
    function getTopFiveUpcoming(int $limit);
}
