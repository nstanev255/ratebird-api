<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TaxonomyRatingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('taxonomy_rating')->insert([
            ['id' => 1, 'name' => 'g', 'rating_entity' => 1],
            ['id' => 2, 'name' => 'pg', 'rating_entity' => 1],
            ['id' => 3, 'name' => 'pg13', 'rating_entity' => 1],
            ['id' => 4, 'name' => 'r17', 'rating_entity' => 1],
            ['id' => 5, 'name' => 'r', 'rating_entity' => 1],
            ['id' => 6, 'name' => 'rx', 'rating_entity' => 1],
        ]);
    }
}
