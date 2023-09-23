<?php

namespace App\Services\Anime;

interface AnimeServiceContract
{

    function getTopFiveTrendingForSeasonNow();
    function getTopFiveUpcomong();
}
