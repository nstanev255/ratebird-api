<?php

namespace App\Repository\Taxonomy\impl;

use App\Models\TaxonomyRating;
use App\Repository\Taxonomy\TaxonomyRatingRepositoryContract;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class TaxonomyRatingRepository implements TaxonomyRatingRepositoryContract
{

    function findAllByEntityId(int $id): Collection
    {
        return TaxonomyRating::query()->whereHas('entity', function (Builder $query) use ($id) {
            $query->where('id', '=', $id);
        })->get();
    }
}
