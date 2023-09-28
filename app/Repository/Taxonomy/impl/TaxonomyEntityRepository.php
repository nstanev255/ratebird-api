<?php

namespace App\Repository\Taxonomy\impl;

use App\Models\TaxonomyEntity;
use App\Repository\Taxonomy\TaxonomyEntityRepositoryContract;

class TaxonomyEntityRepository implements TaxonomyEntityRepositoryContract
{
    public function findOneByEntityName(string $entityName)
    {
        return TaxonomyEntity::query()->where('entity_type', $entityName)->first();
    }
}
