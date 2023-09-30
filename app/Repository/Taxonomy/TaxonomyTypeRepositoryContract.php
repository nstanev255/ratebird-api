<?php

namespace App\Repository\Taxonomy;

use Illuminate\Database\Eloquent\Collection;

interface TaxonomyTypeRepositoryContract
{
    public function findAllByEntityTypeId(int $id): Collection | null;
}
