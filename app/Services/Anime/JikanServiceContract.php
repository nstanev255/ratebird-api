<?php

namespace App\Services\Anime;

use App\Services\Anime\Dto\Jikan\Request\Seasonal\SeasonalFilter;

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
     * Gets the trending anime.
     *
     * @param $records
     *   The count of the records to be returned.
     * @return array
     *   Response from the jikan api.
     */
    function getTrending($records): array;

    /**
     * Gets the trending for a specific season.
     *
     * @param $filter
     *   The count of the records to be returned.
     * @return array
     */
    function getSeasonalNow(SeasonalFilter $filter): array;

    /**
     * Gets the upcoming anime.
     *
     * @param $records
     *   The count of records to be returned.
     * @return mixed
     *   The api response.
     */
    function getUpcoming($records);
}
