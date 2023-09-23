<?php

namespace App\Services\Anime\impl;

use App\Services\Anime\AnimeServiceContract;
use App\Services\Anime\Dto\SeasonalFilter;
use App\Services\Anime\JikanServiceContract;

class AnimeService implements AnimeServiceContract
{

    public function __construct(
        private JikanServiceContract $jikanServiceContract
    )
    {
    }

    function getUpcomingAnime() {

    }

    function getAnime(): array
    {
        return $this->jikanServiceContract->getSeasonalNow(new SeasonalFilter());
    }
}
