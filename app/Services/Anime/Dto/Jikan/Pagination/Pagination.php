<?php

namespace App\Services\Anime\Dto\Jikan\Pagination;

class Pagination
{
    public function getLastVisiblePage(): int
    {
        return $this->last_visible_page;
    }

    public function setLastVisiblePage(int $last_visible_page): void
    {
        $this->last_visible_page = $last_visible_page;
    }

    public function isHasNextPage(): bool
    {
        return $this->has_next_page;
    }

    public function setHasNextPage(bool $has_next_page): void
    {
        $this->has_next_page = $has_next_page;
    }

    public function getCurrentPage(): int
    {
        return $this->current_page;
    }

    public function setCurrentPage(int $current_page): void
    {
        $this->current_page = $current_page;
    }
    private int $last_visible_page = 0;
    private bool $has_next_page = false;
    private int $current_page = 0;


}
