<?php

namespace App\Services\Anime;

interface TaxonomyServiceContract
{
    public function getTypes(): array;
    public function getStatuses(): array;
    public function getRatings(): array;
    public function getGenres() : array;
    public function getSorts(): array;
}
