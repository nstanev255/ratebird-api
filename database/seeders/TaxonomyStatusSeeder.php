<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TaxonomyStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('taxonomy_status')->insert([
            ['id' => 1, 'name' => 'airing', 'status_entity' => 1],
            ['id' => 2, 'name' => 'complete', 'status_entity' => 1],
            ['id' => 3, 'name' => 'upcoming', 'status_entity' => 1],
        ]);
    }
}
