<?php

namespace App\Services\Taxonomy\impl;

use App\Repository\Taxonomy\TaxonomyEntityRepositoryContract;
use App\Repository\Taxonomy\TaxonomyRatingRepositoryContract;
use App\Repository\Taxonomy\TaxonomySortRepositoryContract;
use App\Repository\Taxonomy\TaxonomyStatusRepositoryContract;
use App\Repository\Taxonomy\TaxonomyTypeRepositoryContract;
use App\Services\Anime\JikanServiceContract;
use App\Services\Taxonomy\TaxonomyServiceContract;
use Exception;
use Illuminate\Http\JsonResponse;

class TaxonomyService implements TaxonomyServiceContract
{

    public function __construct(
        protected JikanServiceContract             $jikanService,
        protected TaxonomyEntityRepositoryContract $entityRepository,
        protected TaxonomyTypeRepositoryContract   $typeRepository,
        protected TaxonomyStatusRepositoryContract $statusRepository,
        protected TaxonomyRatingRepositoryContract $ratingRepository,
        protected TaxonomySortRepositoryContract $sortRepository,
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
     * @param string $entity_name
     * @return array
     * @throws Exception
     */
    public function getTypes(string $entity_name): array
    {
        $entity = $this->entityRepository->findOneByEntityName(strtolower($entity_name));
        if (!$entity) {
            throw new Exception('could not find', 404);
        }

        $types = $this->typeRepository->findAllByEntityTypeId($entity->id);
        if ($types->isEmpty()) {
            throw new Exception('could not find', 404);
        }

        return $this->normalizeTaxonomy($types->all());
    }

    /**
     * Gets all the anime statuses.
     *
     * @param string $entity_name
     * @return array
     * @throws Exception
     */
    public function getStatuses(string $entity_name): array
    {
        $entity = $this->entityRepository->findOneByEntityName(strtolower($entity_name));
        if(!$entity) {
            throw new Exception('could not find', 404);
        }

        $statuses = $this->statusRepository->findAllByEntityId($entity->id);
        if($statuses->isEmpty()) {
            throw new Exception('could not find', 404);
        }

        return $statuses->all();
    }

    /**
     * Gets all the anime ratings.
     *
     * @param string $entity_name
     * @return array
     * @throws Exception
     */
    public function getRatings(string $entity_name): array
    {
        $entity = $this->entityRepository->findOneByEntityName(strtolower($entity_name));
        if(!$entity) {
            throw new Exception('could not find', 404);
        }

        $statuses = $this->ratingRepository->findAllByEntityId($entity->id);
        if($statuses->isEmpty()) {
            throw new Exception('could not find', 404);
        }

        return $statuses->all();
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
     * @throws Exception
     */
    public function getSorts(string $entity_name): array
    {
        $entity = $this->entityRepository->findOneByEntityName(strtolower($entity_name));
        if(!$entity) {
            throw new Exception('could not find', 404);
        }

        $statuses = $this->sortRepository->findAllByEntityId($entity->id);
        if($statuses->isEmpty()) {
            throw new Exception('could not find', 404);
        }

        return $statuses->all();
    }
}
