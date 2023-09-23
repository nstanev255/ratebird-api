<?php

namespace App\Services\Anime\impl;

use App\Services\Anime\AnimeServiceContract;
use App\Services\Anime\Dto\Jikan\Request\Seasonal\SeasonalRequest;
use App\Services\Anime\Dto\Jikan\Request\Top\TopAnimeFilter;
use App\Services\Anime\Dto\Jikan\Request\Top\TopAnimeRequest;
use App\Services\Anime\Dto\Ratebird\AnimeMinimal;
use App\Services\Anime\JikanServiceContract;

class AnimeService implements AnimeServiceContract
{
    public function __construct(
        private JikanServiceContract $jikanServiceContract
    )
    {
    }

    function getUpcomingAnime()
    {

    }
    private function getAllTrendingForSeasonNow(): array
    {
        $response = $this->jikanServiceContract->getSeasonalNow(new SeasonalRequest());
        $anime = [];
        $pages = $response['pagination']['last_visible_page'];
        if ($pages >= 2) {
            for ($page = 2; $page <= $pages; $page++) {
                $filter = new SeasonalRequest();
                $filter->setPage($page);
                $next_response = $this->jikanServiceContract->getSeasonalNow($filter);

                if (!isset($next_response['data'])) {
                    error_log(var_export($next_response, true));
                }
                $anime = array_merge($anime, $next_response['data']);
            }
        }

        return $anime;
    }

    function transformJikanToMinimalGenres(array $genres)
    {
        $genres_minimal = [];

        foreach ($genres as $genre) {
            $genres_minimal[] = $genre['name'];
        }

        return $genres_minimal;
    }

    private function transformJikanAnimeMinimal(array $animes) : array
    {
        $minimalAnimes = [];
        foreach ($animes as $anime) {
            $minimalAnime = new AnimeMinimal();
            $minimalAnime->id = $anime['mal_id'];
            $minimalAnime->description = $anime['synopsis'];
            $minimalAnime->title = $anime['title'];
            $minimalAnime->image = $anime['images']['jpg']['large_image_url'];
            $minimalAnime->rating = $anime['score'] / 2;
            $minimalAnime->genres = $this->transformJikanToMinimalGenres($anime['genres']);

            $minimalAnimes[] = $minimalAnime;
        }

        return $minimalAnimes;
    }

    function getTopFiveTrendingForSeasonNow()
    {
        // Get all the needed anime.
        $anime = $this->jikanServiceContract->getSeasonalNow(new SeasonalRequest())['data'];

        // Sort them by rank
        usort($anime, function ($a, $b) {
            return $a['rank'] <=> $b['rank'];
        });

        return $this->transformJikanAnimeMinimal(array_slice($anime, 0, 5));
    }

    function getTopFiveUpcoming() : array {
        $request = new TopAnimeRequest();
        $request->setFilter(TopAnimeFilter::UPCOMING);

        $anime = $this->jikanServiceContract->getTopAnime($request)['data'];

        return $this->transformJikanAnimeMinimal(array_slice($anime, 0, 5));
    }
}
