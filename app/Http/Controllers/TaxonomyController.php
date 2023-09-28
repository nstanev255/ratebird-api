<?php

namespace App\Http\Controllers;

use App\Services\Taxonomy\TaxonomyServiceContract;
use Illuminate\Http\JsonResponse;

class TaxonomyController extends Controller
{
    public function __construct(protected TaxonomyServiceContract $taxonomyService)
    {
    }

    public function getTypes(string $entity): JsonResponse {
        return $this->taxonomyService->getTypes($entity);
    }

    public function getStatuses(string $entity): JsonResponse {
        $statuses = $this->taxonomyService->getStatuses($entity);

        return response()->json($statuses);
    }

    public function getRatings(string $entity) : JsonResponse {
        $ratings = $this->taxonomyService->getRatings($entity);

        return response()->json($ratings);
    }

    public function getGenres(string $entity) : JsonResponse {
        $genres = $this->taxonomyService->getGenres($entity);

        return response()->json($genres);
    }

    public function getSorts(string $entity) : JsonResponse {
        $sorts = $this->taxonomyService->getSorts($entity);

        return response()->json($sorts);
    }
}
