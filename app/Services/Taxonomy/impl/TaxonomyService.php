<?php

namespace App\Services\Taxonomy\impl;

use App\Repository\Taxonomy\TaxonomyEntityRepositoryContract;
use App\Repository\Taxonomy\TaxonomyTypeRepositoryContract;
use App\Services\Anime\JikanServiceContract;
use App\Services\Taxonomy\TaxonomyServiceContract;
use Illuminate\Http\JsonResponse;

class TaxonomyService implements TaxonomyServiceContract
{

    public function __construct(
        protected JikanServiceContract             $jikanService,
        protected TaxonomyEntityRepositoryContract $entityRepository,
        protected TaxonomyTypeRepositoryContract   $typeRepository
    )
    {
    }

    /**
     * Gets all the anime types.
     *
     * @return JsonResponse
     */
    public function getTypes(string $entity_name): JsonResponse
    {
        $entity = $this->entityRepository->findOneByEntityName(strtolower($entity_name));
        if (!$entity) {
            return response()->json(['error' => 'could not find'], 404);
        }

        $types = $this->typeRepository->findAllByEntityTypeId($entity->id);
        if ($types->isEmpty()) {
            return response()->json(['error' => 'could not find'], 404);
        }

        return response()->json($types->all());
    }

    /**
     * Gets all the anime statuses.
     *
     * @return array
     */
    public function getStatuses(string $entity_name): array
    {

    }

    /**
     * Gets all the anime ratings.
     *
     * @return array
     */
    public function getRatings(string $entity_name): array
    {
        // TODO: Implement getRating() method.
    }

    /**
     * Gets all the anime genres.
     *
     * @return array
     */
    public function getGenres(string $entity_name): array
    {
        // TODO: Implement getGenres() method.
    }

    /**
     * Gets all the sort types.
     *
     * @return array
     */
    public function getSorts(string $entity_name): array
    {
        // TODO: Implement getSort() method.
    }
}
