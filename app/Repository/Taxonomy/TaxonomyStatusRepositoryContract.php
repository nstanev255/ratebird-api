<?php

namespace App\Repository\Taxonomy;

interface TaxonomyStatusRepositoryContract
{
    function findAllByEntityId(int $id);
}
