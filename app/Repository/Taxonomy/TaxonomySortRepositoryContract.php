<?php

namespace App\Repository\Taxonomy;

use Illuminate\Database\Eloquent\Collection;

interface TaxonomySortRepositoryContract
{
    function findAllByEntityId(int $id): Collection;
}
