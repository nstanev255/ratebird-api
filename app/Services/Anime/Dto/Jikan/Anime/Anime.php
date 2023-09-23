<?php

namespace App\Services\Anime\Dto\Jikan\Anime;

class Anime
{
    private int $mal_id = 0;
    private string $url = "";
    private Images $images;
    private bool $approved = true;
    private array $titles = [];
    private Type $type = Type::TV;
    private string $source = "";
    private int $episodes = 0;
    private string $status = "";
    private bool $airing = true;
    private Aired $aired;
    private string $duration = "";
    private string $rating = "";
    private float $score = 0.0;
    private int $scored_by = 0;
    private int $rank = 0;
    private int $popularity = 0;
    private int $members = 0;
    private int $favorites = 0;
    private string $synopsis = "";
    private string $background = "";
    private string $season = "";
    private int $year = 0;
    private array $producers = [];
    private array $licensors = [];
    private array $studios = [];
    private array $genres = [];
    private array $explicit_genres = [];
    private array $themes = [];
    private array $demographics = [];

    public function getMalId(): int
    {
        return $this->mal_id;
    }

    public function setMalId(int $mal_id): void
    {
        $this->mal_id = $mal_id;
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    public function setUrl(string $url): void
    {
        $this->url = $url;
    }

    public function getImages(): Images
    {
        return $this->images;
    }

    public function setImages(Images $images): void
    {
        $this->images = $images;
    }

    public function isApproved(): bool
    {
        return $this->approved;
    }

    public function setApproved(bool $approved): void
    {
        $this->approved = $approved;
    }

    public function getTitles(): array
    {
        return $this->titles;
    }

    public function setTitles(array $titles): void
    {
        $this->titles = $titles;
    }

    public function getType(): Type
    {
        return $this->type;
    }

    public function setType(Type $type): void
    {
        $this->type = $type;
    }

    public function getSource(): string
    {
        return $this->source;
    }

    public function setSource(string $source): void
    {
        $this->source = $source;
    }

    public function getEpisodes(): int
    {
        return $this->episodes;
    }

    public function setEpisodes(int $episodes): void
    {
        $this->episodes = $episodes;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function setStatus(string $status): void
    {
        $this->status = $status;
    }

    public function isAiring(): bool
    {
        return $this->airing;
    }

    public function setAiring(bool $airing): void
    {
        $this->airing = $airing;
    }

    public function getAired(): Aired
    {
        return $this->aired;
    }

    public function setAired(Aired $aired): void
    {
        $this->aired = $aired;
    }

    public function getDuration(): string
    {
        return $this->duration;
    }

    public function setDuration(string $duration): void
    {
        $this->duration = $duration;
    }

    public function getRating(): string
    {
        return $this->rating;
    }

    public function setRating(string $rating): void
    {
        $this->rating = $rating;
    }

    public function getScore(): float
    {
        return $this->score;
    }

    public function setScore(float $score): void
    {
        $this->score = $score;
    }

    public function getScoredBy(): int
    {
        return $this->scored_by;
    }

    public function setScoredBy(int $scored_by): void
    {
        $this->scored_by = $scored_by;
    }

    public function getRank(): int
    {
        return $this->rank;
    }

    public function setRank(int $rank): void
    {
        $this->rank = $rank;
    }

    public function getPopularity(): int
    {
        return $this->popularity;
    }

    public function setPopularity(int $popularity): void
    {
        $this->popularity = $popularity;
    }

    public function getMembers(): int
    {
        return $this->members;
    }

    public function setMembers(int $members): void
    {
        $this->members = $members;
    }

    public function getFavorites(): int
    {
        return $this->favorites;
    }

    public function setFavorites(int $favorites): void
    {
        $this->favorites = $favorites;
    }

    public function getSynopsis(): string
    {
        return $this->synopsis;
    }

    public function setSynopsis(string $synopsis): void
    {
        $this->synopsis = $synopsis;
    }

    public function getBackground(): string
    {
        return $this->background;
    }

    public function setBackground(string $background): void
    {
        $this->background = $background;
    }

    public function getSeason(): string
    {
        return $this->season;
    }

    public function setSeason(string $season): void
    {
        $this->season = $season;
    }

    public function getYear(): int
    {
        return $this->year;
    }

    public function setYear(int $year): void
    {
        $this->year = $year;
    }

    public function getProducers(): array
    {
        return $this->producers;
    }

    public function setProducers(array $producers): void
    {
        $this->producers = $producers;
    }

    public function getLicensors(): array
    {
        return $this->licensors;
    }

    public function setLicensors(array $licensors): void
    {
        $this->licensors = $licensors;
    }

    public function getStudios(): array
    {
        return $this->studios;
    }

    public function setStudios(array $studios): void
    {
        $this->studios = $studios;
    }

    public function getGenres(): array
    {
        return $this->genres;
    }

    public function setGenres(array $genres): void
    {
        $this->genres = $genres;
    }

    public function getExplicitGenres(): array
    {
        return $this->explicit_genres;
    }

    public function setExplicitGenres(array $explicit_genres): void
    {
        $this->explicit_genres = $explicit_genres;
    }

    public function getThemes(): array
    {
        return $this->themes;
    }

    public function setThemes(array $themes): void
    {
        $this->themes = $themes;
    }

    public function getDemographics(): array
    {
        return $this->demographics;
    }

    public function setDemographics(array $demographics): void
    {
        $this->demographics = $demographics;
    }


}
