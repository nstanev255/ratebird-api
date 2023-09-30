<?php

namespace App\Repository\Taxonomy\impl;

use App\Models\TaxonomyEntity;
use App\Repository\Taxonomy\TaxonomyEntityRepositoryContract;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class TaxonomyEntityRepository implements TaxonomyEntityRepositoryContract
{
    public function findOneByEntityName(string $entityName) : Model | null
    {
        return TaxonomyEntity::query()->where('entity_type', $entityName)->first();
    }
}
