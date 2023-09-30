<?php

namespace App\Repository\Taxonomy;

interface TaxonomyStatusRepositoryContract
{
    function findOneByEntityId(int $id);
}
