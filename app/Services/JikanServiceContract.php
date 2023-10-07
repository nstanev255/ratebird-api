<?php

namespace App\Services;

use App\Services\Dto\Jikan\Request\Seasonal\SeasonalRequest;
use App\Services\Dto\Jikan\Request\Top\TopAnimeRequest;

interface JikanServiceContract
{
    /**
     * Gets the newest updated anime.
     *
     * @param $records
     *   The count of the records.
     * @return array
     *   Response from the jikan api.
     */
    function getNewest($records): array;

    /**
     * Gets the trending for a specific season.
     *
     * @param SeasonalRequest $filter
     *   The count of the records to be returned.
     * @return array
     */
    function getSeasonalNow(SeasonalRequest $filter): array;

    /**
     * Gets top anime.
     *
     * @param TopAnimeRequest $request
     *   The request.
     * @return mixed
     *   The api response.
     */
    function getTopAnime(TopAnimeRequest $request): array;

    /**
     * Gets the all the genres for anime.
     *
     * @return array
     */
    function getAnimeGenres(): array;

    /**
     * Search anime by filter.
     *
     * @param array $filter
     *   The search filter.
     *   TODO: Describe the search params & how to use them.
     * @return array
     *   The response from the api.
     */
    function searchAnime(array $filter): array;
}
