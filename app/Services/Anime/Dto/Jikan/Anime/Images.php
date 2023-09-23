<?php

namespace App\Services\Anime\Dto\Jikan\Anime;

class Images
{
    private Image $jpg;
    private Image $webp;

    public function getJpg(): Image
    {
        return $this->jpg;
    }

    public function setJpg(Image $jpg): void
    {
        $this->jpg = $jpg;
    }

    public function getWebp(): Image
    {
        return $this->webp;
    }

    public function setWebp(Image $webp): void
    {
        $this->webp = $webp;
    }


}
