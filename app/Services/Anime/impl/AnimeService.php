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
            if($anime['mal_id'] !== null) {
                $minimalAnime->id = $anime['mal_id'];
            }
            if($anime['synopsis'] !== null) {
                $minimalAnime->description = $anime['synopsis'];
            }
            if($anime['title'] !== null) {
                $minimalAnime->title = $anime['title'];
            }
            if($anime['images'] !== null && $anime['images']['jpg'] !== null && $anime['images']['jpg']['large_image_url'] !== null) {
                $minimalAnime->image = $anime['images']['jpg']['large_image_url'];
            }
            if($anime['score'] !== null) {
                $minimalAnime->rating = $anime['score'] / 2;
            }
            $minimalAnime->genres = $this->transformJikanToMinimalGenres($anime['genres']);

            $minimalAnimes[] = $minimalAnime;
        }

        return $minimalAnimes;
    }

    function getTopFiveTrendingForSeasonNow(int $limit)
    {
        $request = new SeasonalRequest();
        $request->setLimit($limit);

        // Get all the needed anime.
        $anime = $this->jikanServiceContract->getSeasonalNow($request)['data'];

        // Sort them by rank
        usort($anime, function ($a, $b) {
            return $a['rank'] <=> $b['rank'];
        });

        return $this->transformJikanAnimeMinimal(array_slice($anime, 0, 8));
    }

    function getTopFiveUpcoming(int $limit) : array {
        $request = new TopAnimeRequest();
        $request->setFilter(TopAnimeFilter::UPCOMING);
        $request->setLimit($limit);

        $anime = $this->jikanServiceContract->getTopAnime($request)['data'];
        return $this->transformJikanAnimeMinimal($anime);
    }
}
