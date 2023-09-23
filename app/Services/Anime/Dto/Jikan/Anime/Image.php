<?php

namespace App\Services\Anime\Dto\Jikan\Anime;

class Image
{
    private string $image_url = "";
    private string $small_image_url = "";
    private string $large_image_url = "";

    public function getImageUrl(): string
    {
        return $this->image_url;
    }

    public function setImageUrl(string $image_url): void
    {
        $this->image_url = $image_url;
    }

    public function getSmallImageUrl(): string
    {
        return $this->small_image_url;
    }

    public function setSmallImageUrl(string $small_image_url): void
    {
        $this->small_image_url = $small_image_url;
    }

    public function getLargeImageUrl(): string
    {
        return $this->large_image_url;
    }

    public function setLargeImageUrl(string $large_image_url): void
    {
        $this->large_image_url = $large_image_url;
    }


}
