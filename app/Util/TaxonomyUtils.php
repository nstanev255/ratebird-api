<?php

namespace App\Util;

class TaxonomyUtils
{
    public static function normalizeJikanGenres(array $genres): array {
        $normalizedGenres = [];

        foreach ($genres as $genre) {
            $normalizedGenre['name'] = $genre['name'];
            $normalizedGenre['id'] = $genre['mal_id'];
            $normalizedGenres[] = $normalizedGenre;
        }

        return $normalizedGenres;
    }

    public static function normalizeTaxonomy(array $taxonomies): array {
        $normalizeds = [];

        foreach ($taxonomies as $taxonomy) {
            $normalized['name'] = $taxonomy['name'];
            $normalized['id'] = $taxonomy['id'];
            $normalizeds[] = $normalized;
        }

        return $normalizeds;
    }
}
