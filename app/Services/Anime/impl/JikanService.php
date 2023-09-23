<?php

namespace App\Services\Anime\impl;

use App\Services\Anime\Dto\Jikan\Request\Seasonal\SeasonalFilter;
use App\Services\Anime\Dto\Jikan\Response\Seasonal\SeasonalResponse;
use App\Services\Anime\JikanServiceContract;
use Illuminate\Support\Facades\Http;

class JikanService implements JikanServiceContract
{

    private function get(string $endpoint, array $filters): array
    {
        $url = config('services.jikan.base_url');
        $response = Http::get($url . $endpoint, $filters);

        return $response->json();
    }

    private function format_seasonal_filter(SeasonalFilter $seasonalFilter) : array {
        $filter = [];

        if($seasonalFilter->getFilter() !== null) {
            $filter[]['filter'] = $seasonalFilter->getFilter()->entry_type();
        }

        if($seasonalFilter->getLimit() !== 0) {
            $filter[]['limit'] = $seasonalFilter->getLimit();
        }

        if($seasonalFilter->getPage() !== 0) {
            $filter[]['page'] = $seasonalFilter->getPage();
        }

        $filter[]['sfw'] = $seasonalFilter->isSfw();
        $filter[]['unapproved'] = $seasonalFilter->isUnapproved();

        return $filter;
    }

    function getNewest($records): array
    {
        // TODO: Implement getNewest() method.
    }

    function getTrending($records): array
    {
        // TODO: Implement getTrending() method.
    }

    function getSeasonalNow(SeasonalFilter $filter): array
    {
        $formatted_filter = $this->format_seasonal_filter($filter);
        return $this->get('/seasons/now', $formatted_filter);
    }

    function getUpcoming($records)
    {
        // TODO: Implement getUpcoming() method.
    }
}
