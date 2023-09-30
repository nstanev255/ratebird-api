<?php

namespace App\Http\Controllers;

use App\Services\Taxonomy\TaxonomyServiceContract;
use Illuminate\Http\JsonResponse;

class TaxonomyController extends Controller
{
    public function __construct(protected TaxonomyServiceContract $taxonomyService)
    {
    }

    public function getTypes(string $entity): JsonResponse
    {
        try {
            return response()->json($this->taxonomyService->getTypes($entity));
        } catch (\Exception $exception) {
            return response()->json(['message' => $exception->getMessage()], $exception->getCode());
        }
    }

    public function getStatuses(string $entity): JsonResponse
    {
        try {
            return response()->json($this->taxonomyService->getStatuses($entity));
        } catch (\Exception $exception) {
            return response()->json(['message' => $exception->getMessage()], $exception->getCode());
        }
    }
    public function getRatings(string $entity): JsonResponse
    {
        try {
            return response()->json($this->taxonomyService->getRatings($entity));
        } catch (\Exception $exception) {
            return response()->json(['message' => $exception->getMessage()], $exception->getCode());
        }
    }

    public function getGenres(string $entity): JsonResponse
    {
        try {
            return response()->json($this->taxonomyService->getGenres($entity));
        } catch (\Exception $exception) {
            return response()->json(['message' => $exception->getMessage()], $exception->getCode());
        }
    }

    public function getSorts(string $entity): JsonResponse
    {
        try {
            return response()->json($this->taxonomyService->getSorts($entity));
        } catch (\Exception $exception) {
            return response()->json(['message' => $exception->getMessage()], $exception->getCode());
        }
    }
}
