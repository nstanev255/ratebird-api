<?php

namespace App\Providers;

use App\Repository\Taxonomy\impl\TaxonomyEntityRepository;
use App\Repository\Taxonomy\impl\TaxonomyStatusRepository;
use App\Repository\Taxonomy\impl\TaxonomyTypeRepository;
use App\Repository\Taxonomy\TaxonomyEntityRepositoryContract;
use App\Repository\Taxonomy\TaxonomyStatusRepositoryContract;
use App\Repository\Taxonomy\TaxonomyTypeRepositoryContract;
use App\Services\Anime\JikanServiceContract;
use App\Services\Taxonomy\impl\TaxonomyService;
use Illuminate\Support\ServiceProvider;

class TaxonomyServiceProvider extends ServiceProvider
{

    public array $bindings = [
        TaxonomyEntityRepositoryContract::class => TaxonomyEntityRepository::class,
        TaxonomyTypeRepositoryContract::class => TaxonomyTypeRepository::class,
        TaxonomyStatusRepositoryContract::class => TaxonomyStatusRepository::class,
    ];
    /**
     * Register services.
     */
    public function register()
    {
        $this->app->bind('App\Services\Taxonomy\TaxonomyServiceContract', function() {
            $jikan = $this->app->make(JikanServiceContract::class);
            $repo = $this->app->make(TaxonomyEntityRepositoryContract::class);
            $repo_type = $this->app->make(TaxonomyTypeRepositoryContract::class);
            $repo_status = $this->app->make(TaxonomyStatusRepositoryContract::class);

            return new TaxonomyService($jikan, $repo, $repo_type, $repo_status);
        });
    }
}
