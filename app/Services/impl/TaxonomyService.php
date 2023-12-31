<?php

namespace App\Services\impl;

use App\Models\Dto\Entity;
use App\Repository\Taxonomy\TaxonomyEntityRepositoryContract;
use App\Repository\Taxonomy\TaxonomyRatingRepositoryContract;
use App\Repository\Taxonomy\TaxonomySortRepositoryContract;
use App\Repository\Taxonomy\TaxonomyStatusRepositoryContract;
use App\Repository\Taxonomy\TaxonomyTypeRepositoryContract;
use App\Services\JikanServiceContract;
use App\Services\TaxonomyServiceContract;
use App\Util\TaxonomyUtils;
use Exception;

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

        return TaxonomyUtils::normalizeTaxonomy($types->all());
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
     * @param string $entity_name
     * @return array
     * @throws Exception
     */
    public function getGenres(string $entity_name): array
    {
        $entity = Entity::tryFrom(strtolower($entity_name));
        if(!$entity) {
            throw new Exception('not found', 404);
        }

        $genres = [];
        switch ($entity) {
            case Entity::ANIME:
                $genres = $this->jikanService->getAnimeGenres()['data'];
                break;
            case Entity::MANGA:
                // TODO: Implement manga handling for genres.
                break;
        }

        if(count($genres) === 0) {
            throw new Exception('not found', 404);
        }

        return $genres;
    }

    /**
     * Gets all the sort types.
     *
     * @param string $entity_name
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
