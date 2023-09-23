<?php

namespace App\Services\Anime\Dto\Jikan\Anime;

class Aired
{
    private string $from = "";
    private string $to = "";

    public function getFrom(): string
    {
        return $this->from;
    }

    public function setFrom(string $from): void
    {
        $this->from = $from;
    }

    public function getTo(): string
    {
        return $this->to;
    }

    public function setTo(string $to): void
    {
        $this->to = $to;
    }


}
