<?php

namespace App\Providers;

use App\Services\impl\AnimeService;
use App\Services\impl\FilterService;
use App\Services\impl\JikanService;
use App\Services\JikanServiceContract;
use App\Services\TaxonomyServiceContract;
use Illuminate\Support\ServiceProvider;

class AnimeServiceProvider extends ServiceProvider
{
    public array $bindings = [
        JikanServiceContract::class => JikanService::class
    ];


    public function register()
    {
        $this->app->bind('App\Services\AnimeServiceContract', function() {
            $jikanService = $this->app->make(JikanServiceContract::class);

            return new AnimeService($jikanService);
        });

        $this->app->bind('App\Services\FilterServiceContract', function() {
            $taxonomyService = $this->app->make(TaxonomyServiceContract::class);

            return new FilterService($taxonomyService);
        });


    }
}
