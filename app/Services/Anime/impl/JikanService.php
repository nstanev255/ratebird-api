<?php

namespace App\Services\Anime\impl;

use App\Services\Anime\Dto\Jikan\Request\EntryType;
use App\Services\Anime\Dto\Jikan\Request\Seasonal\SeasonalRequest;
use App\Services\Anime\Dto\Jikan\Request\Top\Rating;
use App\Services\Anime\Dto\Jikan\Request\Top\TopAnimeFilter;
use App\Services\Anime\Dto\Jikan\Request\Top\TopAnimeRequest;
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

    private function format_seasonal_filter(SeasonalRequest $seasonalFilter) : array {
        $filter = [];

        if($seasonalFilter->getFilter() !== EntryType::NONE) {
            $filter['filter'] = $seasonalFilter->getFilter()->entry_type();
        }

        if($seasonalFilter->getLimit() > 0) {
            $filter['limit'] = $seasonalFilter->getLimit();
        }

        if($seasonalFilter->getPage() > 0) {
            $filter['page'] = $seasonalFilter->getPage();
        }

        $filter['sfw'] = $seasonalFilter->isSfw();
        $filter['unapproved'] = $seasonalFilter->isUnapproved();

        return $filter;
    }

    private function format_top_filter(TopAnimeRequest $request): array {
        $filter = [];

        if($request->getRating() !== Rating::NONE) {
            $filter['rating'] = $request->getRating()->value;
        }

        if($request->getType() !== EntryType::NONE) {
            $filter['type'] = $request->getType()->entry_type();
        }

        if($request->getFilter() !== TopAnimeFilter::NONE) {
            $filter['filter'] = $request->getFilter()->value;
        }

        if ($request->getPage() > 0) {
            $filter['page'] = $request->getPage();
        }

        if($request->getLimit() > 0) {
            $filter['limit'] = $request->getLimit();
        }

        return $filter;
    }

    function getNewest($records): array
    {
        // TODO: Implement getNewest() method.
    }

    function getSeasonalNow(SeasonalRequest $filter): array
    {
        $formatted_filter = $this->format_seasonal_filter($filter);
        return $this->get('/seasons/now', $formatted_filter);
    }

    function getTopAnime(TopAnimeRequest $request): array
    {
        $formatted_filter = $this->format_top_filter($request);
        return $this->get('/top/anime', $formatted_filter);
    }

    public function getAnimeGenres(): array {
       return $this->get('/genres/anime', []);
    }
}
