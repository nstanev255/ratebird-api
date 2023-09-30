<?php

namespace App\Repository\Taxonomy\impl;

use App\Models\TaxonomySort;
use App\Repository\Taxonomy\TaxonomySortRepositoryContract;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class TaxonomySortRepository implements TaxonomySortRepositoryContract
{
    function findAllByEntityId(int $id): Collection
    {
        return TaxonomySort::query()->whereHas('entity', function (Builder $query) use ($id) {
            $query->where('id', '=', $id);
        })->get();
    }
}
