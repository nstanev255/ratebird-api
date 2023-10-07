<?php

namespace App\Services\Dto\Jikan\Request\Top;

use App\Services\Dto\Jikan\Request\EntryType;

class TopAnimeRequest
{
    private EntryType $type = EntryType::NONE;
    private TopAnimeFilter $filter = TopAnimeFilter::NONE;
    private Rating $rating = Rating::NONE;
    private bool $sfw = true;
    private int $page = 0;
    private int $limit = 0;

    public function getType(): EntryType
    {
        return $this->type;
    }

    public function setType(EntryType $type): void
    {
        $this->type = $type;
    }

    public function getFilter(): TopAnimeFilter
    {
        return $this->filter;
    }

    public function setFilter(TopAnimeFilter $filter): void
    {
        $this->filter = $filter;
    }

    public function getRating(): Rating
    {
        return $this->rating;
    }

    public function setRating(Rating $rating): void
    {
        $this->rating = $rating;
    }

    public function isSfw(): bool
    {
        return $this->sfw;
    }

    public function setSfw(bool $sfw): void
    {
        $this->sfw = $sfw;
    }

    public function getPage(): int
    {
        return $this->page;
    }

    public function setPage(int $page): void
    {
        $this->page = $page;
    }

    public function getLimit(): int
    {
        return $this->limit;
    }

    public function setLimit(int $limit): void
    {
        $this->limit = $limit;
    }



}
