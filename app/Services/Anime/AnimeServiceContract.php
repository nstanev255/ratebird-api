<?php

namespace App\Services\Anime;

interface AnimeServiceContract
{
    function getAnime() : array;

    function getTopFiveTrendingForSeasonNow();
}
