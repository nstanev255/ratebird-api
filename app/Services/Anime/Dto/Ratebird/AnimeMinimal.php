<?php

namespace App\Services\Anime\Dto\Ratebird;

class AnimeMinimal
{
    public int $id = 0;
    public string $title = "";
    public string $description = "";
    public string $image = "";
    public array $genres;
    public float $rating;

}
