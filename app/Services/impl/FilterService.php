<?php

namespace App\Services\impl;

use App\Models\Dto\Entity;
use App\Services\FilterServiceContract;
use App\Services\TaxonomyServiceContract;
use Illuminate\Http\Request;

class FilterService implements FilterServiceContract
{

    public function __construct(
        protected TaxonomyServiceContract $taxonomyService
    )
    {
    }

    /**
     * @throws \Exception
     */
    function getJikanAnimeSearchFilter(Request $request): array
    {
        $page = $request->query('page', config('services.jikan.default_first_page'));
        $limit = $request->query('limit', config('services.jikan.default_page_limit'));
        $q = $request->query('title');
        $score = $request->query('score');
        $min_score = $request->query('min_score');
        $max_score = $request->query('max_score');
        $status = $request->query('status');
        $rating = $request->query('rating');
        $type = $request->query('type');
        $sfw = $request->query('sfw');
        $genres = $request->query('genres');
        $order_by = $request->query('order_by');
        $sort = $request->query('sort');
        $start_date = $request->query('start_date');
        $end_date = $request->query('end_date');

        $filter = ['page' => $page, 'limit' => $limit];
        if($q) {
            $filter['q'] = $q;
        }

        if($score) {
            $filter['score'] = $score;
        }

        if($min_score) {
            $filter['min_score'] = $min_score;
        }

        if($max_score) {
            $filter['max_score'] = $max_score;
        }

        if($status) {
            $statuses = $this->taxonomyService->getStatuses(Entity::ANIME->value);
            $found = $this->checkIfInTaxonomy($status, $statuses);
            if(!$found) {
                throw new \Exception('Status does not exist', 404);
            }

            $filter['status'] = $status;
        }

        if($rating) {
            $db_ratings = $this->taxonomyService->getRatings(Entity::ANIME->value);
            $found = $this->checkIfInTaxonomy($rating, $db_ratings);
            if(!$found) {
                throw new \Exception('Rating does not exits', 404);
            }

            $filter['rating'] = $rating;
        }

        if($type) {
            $db_types = $this->taxonomyService->getTypes(Entity::ANIME->value);
            $found = $this->checkIfInTaxonomy($type, $db_types);
            if(!$found) {
                throw new \Exception('Type does not exist', 404);
            }

            $filter['type'] = $type;
        }

        if($sfw !== 'false') {
            $filter['sfw'] = '';
        }

        if($genres) {
            $filter['genres'] = $genres;
        }

        if($order_by) {
            $filter['order_by'] = $order_by;
        }

        if($sort) {
            $db_sorts = $this->taxonomyService->getSorts(Entity::ANIME->value);
            $found = $this->checkIfInTaxonomy($sort, $db_sorts);
            if(!$found) {
                throw new \Exception('Sort does not exist', 404);
            }

            $filter['sort'] = $sort;
        }

        if($start_date) {
            $filter['start_date'] = $start_date;
        }

        if($end_date) {
            $filter['end_date'] = $end_date;
        }


        return $filter;
    }

    private function checkIfInTaxonomy(string $check, array $db_results): bool {
        if(!$db_results) {
            return false;
        }

        $found = false;
        foreach ($db_results as $result) {
            if($result['name'] === $check) {
                $found = true;
                break;
            }
        }

        return $found;
    }
}
