<?php

namespace App\Providers;

use App\Services\Anime\AnimeServiceContract;
use App\Services\Anime\impl\AnimeService;
use App\Services\Anime\impl\JikanService;
use App\Services\Anime\JikanServiceContract;
use Illuminate\Support\ServiceProvider;

class AnimeServiceProvider extends ServiceProvider
{
    public array $bindings = [
        JikanServiceContract::class => JikanService::class
    ];


    public function register()
    {
        $this->app->bind('App\Services\Anime\AnimeServiceContract', function() {
            $jikanService = $this->app->make(JikanServiceContract::class);

            return new AnimeService($jikanService);
        });
    }
}
