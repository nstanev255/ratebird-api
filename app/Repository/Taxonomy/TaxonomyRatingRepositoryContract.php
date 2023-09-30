<?php

namespace App\Repository\Taxonomy;

use Illuminate\Database\Eloquent\Collection;

interface TaxonomyRatingRepositoryContract
{
    function findAllByEntityId(int $id): Collection;
}
