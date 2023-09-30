<?php

namespace App\Repository\Taxonomy\impl;

use App\Models\TaxonomyStatus;
use App\Repository\Taxonomy\TaxonomyStatusRepositoryContract;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class TaxonomyStatusRepository implements TaxonomyStatusRepositoryContract
{

    function findOneByEntityId(int $id): Collection
    {
        return TaxonomyStatus::query()->whereHas('entity', function (Builder $query) use ($id) {
            $query->where('id', '=', $id);
        })->get();
    }
}
