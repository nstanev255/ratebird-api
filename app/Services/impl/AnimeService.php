<?php

namespace App\Services\impl;

use App\Services\AnimeServiceContract;
use App\Services\Dto\Jikan\Request\Seasonal\SeasonalRequest;
use App\Services\Dto\Jikan\Request\Top\TopAnimeFilter;
use App\Services\Dto\Jikan\Request\Top\TopAnimeRequest;
use App\Services\Dto\Ratebird\AnimeMinimal;
use App\Services\JikanServiceContract;

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

                $anime = array_merge($anime, $next_response['data']);
            }
        }

        return $anime;
    }

    function transformJikanToMinimalGenres(array $genres, array $themes, array $demographics)
    {
        $genres_minimal = [];

        foreach ($genres as $genre) {
            $genres_minimal[] = $genre['name'];
        }

        foreach ($themes as $theme) {
            $genres_minimal[] = $theme['name'];
        }

        foreach ($demographics as $demographic) {
            $genres_minimal[] = $demographic['name'];
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
            $minimalAnime->genres = $this->transformJikanToMinimalGenres($anime['genres'], $anime['themes'], $anime['demographics']);

            $minimalAnimes[] = $minimalAnime;
        }

        return $minimalAnimes;
    }

    function getTopFiveTrendingForSeasonNow(int $limit): array
    {
        $request = new SeasonalRequest();
        $request->setLimit($limit);

        // Get all the needed anime.
        $anime = $this->jikanServiceContract->getSeasonalNow($request)['data'];

        // Sort them by rank
        usort($anime, function ($a, $b) {
            return $a['rank'] <=> $b['rank'];
        });

        return $this->transformJikanAnimeMinimal($anime);
    }

    function getTopUpcoming(int $limit) : array {
        $request = new TopAnimeRequest();
        $request->setFilter(TopAnimeFilter::UPCOMING);
        $request->setLimit($limit);

        $anime = $this->jikanServiceContract->getTopAnime($request)['data'];
        return $this->transformJikanAnimeMinimal($anime);
    }

    function search(array $filter): array
    {
        $response = $this->jikanServiceContract->searchAnime($filter);

        return [
            'data'=> $this->transformJikanAnimeMinimal($response['data']),
            'pagination' => $response['pagination']
        ];
    }
}
