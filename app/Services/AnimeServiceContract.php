<?php

namespace App\Services;

interface AnimeServiceContract
{
    function getTopFiveTrendingForSeasonNow(int $limit);
    function getTopUpcoming(int $limit);
    function search(array $filter);
}
