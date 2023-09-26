<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TaxonomyTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('taxonomy_type')->insert([
            ['id' => 1, 'name' => 'tv', 'type_entity' => 1],
            ['id' => 2, 'name' => 'movie', 'type_entity' => 1],
            ['id' => 3, 'name' => 'ova', 'type_entity' => 1],
            ['id' => 4, 'name' => 'special', 'type_entity' => 1],
            ['id' => 5, 'name' => 'ona', 'type_entity' => 1],
            ['id' => 6, 'name' => 'music', 'type_entity' => 1],
        ]);
    }
}
