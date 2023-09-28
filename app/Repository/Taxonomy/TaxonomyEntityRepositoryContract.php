<?php

namespace App\Repository\Taxonomy;

interface TaxonomyEntityRepositoryContract
{
    public function findOneByEntityName(string $entityName);
}
