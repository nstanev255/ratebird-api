<?php

namespace App\Services\Taxonomy\impl;

use App\Repository\Taxonomy\TaxonomyEntityRepositoryContract;
use App\Repository\Taxonomy\TaxonomyStatusRepositoryContract;
use App\Repository\Taxonomy\TaxonomyTypeRepositoryContract;
use App\Services\Anime\JikanServiceContract;
use App\Services\Taxonomy\TaxonomyServiceContract;
use Illuminate\Http\JsonResponse;

class TaxonomyService implements TaxonomyServiceContract
{

    public function __construct(
        protected JikanServiceContract             $jikanService,
        protected TaxonomyEntityRepositoryContract $entityRepository,
        protected TaxonomyTypeRepositoryContract   $typeRepository,
        protected TaxonomyStatusRepositoryContract $statusRepository,
    )
    {
    }

    public function normalizeTaxonomy(array $taxonomies): array {
        $normalizeds = [];

        foreach ($taxonomies as $taxonomy) {
            $normalized['name'] = $taxonomy->name;
            $normalized['id'] = $taxonomy->id;
            $normalizeds[][] = $normalized;
        }

        return $normalizeds;
    }

    /**
     * Gets all the anime types.
     *
     * @return array
     * @throws \Exception
     */
    public function getTypes(string $entity_name): array
    {
        $entity = $this->entityRepository->findOneByEntityName(strtolower($entity_name));
        if (!$entity) {
            throw new \Exception('could not find', 404);
        }

        $types = $this->typeRepository->findAllByEntityTypeId($entity->id);
        if ($types->isEmpty()) {
            throw new \Exception('could not find', 404);
        }

        return $this->normalizeTaxonomy($types->all());
    }

    /**
     * Gets all the anime statuses.
     *
     * @return array
     * @throws \Exception
     */
    public function getStatuses(string $entity_name): array
    {
        $entity = $this->entityRepository->findOneByEntityName(strtolower($entity_name));
        if(!$entity) {
            throw new \Exception('could not find', 404);
        }

        $statuses = $this->typeRepository->findAllByEntityTypeId($entity->id);
        if($statuses->isEmpty()) {
            throw new \Exception('could not find', 404);
        }

        return $statuses->all();
    }

    /**
     * Gets all the anime ratings.
     *
     * @return JsonResponse
     */
    public function getRatings(string $entity_name): array
    {
        // TODO: Implement getRating() method.
    }

    /**
     * Gets all the anime genres.
     *
     * @return JsonResponse
     */
    public function getGenres(string $entity_name): array
    {
        // TODO: Implement getGenres() method.
    }

    /**
     * Gets all the sort types.
     *
     * @return JsonResponse
     */
    public function getSorts(string $entity_name): array
    {
        // TODO: Implement getSort() method.
    }
}
