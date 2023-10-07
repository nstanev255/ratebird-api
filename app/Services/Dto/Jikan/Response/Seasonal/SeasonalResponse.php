<?php

namespace App\Services\Dto\Jikan\Response\Seasonal;

use App\Services\Dto\Jikan\Pagination\Pagination;

class SeasonalResponse
{
    private Pagination $pagination;
    private array $data;

    public function getPagination(): Pagination
    {
        return $this->pagination;
    }

    public function setPagination(Pagination $pagination): void
    {
        $this->pagination = $pagination;
    }

    public function getData(): array
    {
        return $this->data;
    }

    public function setData(array $data): void
    {
        $this->data = $data;
    }


}
