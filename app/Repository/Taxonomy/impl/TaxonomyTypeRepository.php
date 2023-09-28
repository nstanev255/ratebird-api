<?php

namespace App\Repository\Taxonomy\impl;

use App\Models\TaxonomyType;
use App\Repository\Taxonomy\TaxonomyTypeRepositoryContract;
use Illuminate\Database\Eloquent\Builder;

class TaxonomyTypeRepository implements TaxonomyTypeRepositoryContract
{
    public function findAllByEntityTypeId(int $id): \Illuminate\Database\Eloquent\Collection
    {
        return TaxonomyType::query()->whereHas('entity', function (Builder $query) use ($id) {
            $query->where('id', '=', $id);
        })->get();
    }
}
