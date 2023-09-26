<?php

namespace App\Services\Anime\impl;

use App\Services\Anime\TaxonomyServiceContract;
use App\Services\Anime\JikanServiceContract;

class TaxonomyService implements TaxonomyServiceContract
{

    public function __construct(protected JikanServiceContract $jikanService)
    {
    }

    /**
     * Gets all the anime types.
     *
     * @return array
     */
    public function getTypes(): array
    {
        // TODO: Implement getType() method.
    }

    /**
     * Gets all the anime statuses.
     *
     * @return array
     */
    public function getStatuses(): array
    {
        // TODO: Implement getStatus() method.
    }

    /**
     * Gets all the anime ratings.
     *
     * @return array
     */
    public function getRatings(): array
    {
        // TODO: Implement getRating() method.
    }

    /**
     * Gets all the anime genres.
     *
     * @return array
     */
    public function getGenres(): array
    {
        // TODO: Implement getGenres() method.
    }

    /**
     * Gets all the sort types.
     *
     * @return array
     */
    public function getSorts(): array
    {
        // TODO: Implement getSort() method.
    }
}
