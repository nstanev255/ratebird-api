<?php

namespace App\Http\Controllers;

use App\Services\Anime\TaxonomyServiceContract;
use App\Services\Anime\impl\TaxonomyService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TaxonomyController extends Controller
{
    public function __construct(protected TaxonomyServiceContract $taxonomyService)
    {
    }

    public function getTypes(): JsonResponse {
        $types = $this->taxonomyService->getTypes();

        return response()->json($types);
    }

    public function getStatuses(): JsonResponse {
        $statuses = $this->taxonomyService->getStatuses();

        return response()->json($statuses);
    }

    public function getRatings() : JsonResponse {
        $ratings = $this->taxonomyService->getRatings();

        return response()->json($ratings);
    }

    public function getGenres() : JsonResponse {
        $genres = $this->taxonomyService->getGenres();

        return response()->json($genres);
    }

    public function getSorts() : JsonResponse {
        $sorts = $this->taxonomyService->getSorts();

        return response()->json($sorts);
    }
}
