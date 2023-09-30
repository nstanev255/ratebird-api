<?php

namespace App\Services\Taxonomy;

use Illuminate\Http\JsonResponse;

interface TaxonomyServiceContract
{
    function getTypes(string $entity_name): array;
    function getStatuses(string $entity_name): array;
    function getRatings(string $entity_name): array;
    function getGenres(string $entity_name) : array;
    function getSorts(string $entity_name): array;
}
