<?php

namespace App\Services\Anime\Dto\Jikan\Request\Seasonal;

use App\Services\Anime\Dto\Jikan\Request\EntryType;

class SeasonalRequest
{
    private EntryType $filter = EntryType::NONE;
    private bool $sfw = true;
    private bool $unapproved = false;
    private int $page = 0;
    private int $limit = 0;

    public function getFilter(): EntryType
    {
        return $this->filter;
    }

    public function setFilter(EntryType $filter): void
    {
        $this->filter = $filter;
    }

    public function isSfw(): bool
    {
        return $this->sfw;
    }

    public function setSfw(bool $sfw): void
    {
        $this->sfw = $sfw;
    }

    public function isUnapproved(): bool
    {
        return $this->unapproved;
    }

    public function setUnapproved(bool $unapproved): void
    {
        $this->unapproved = $unapproved;
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
