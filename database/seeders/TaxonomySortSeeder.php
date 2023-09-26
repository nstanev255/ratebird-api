<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TaxonomySortSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('taxonomy_sort')->insert([
            ['id' => 1, 'name' => 'asc', 'sort_entity' => 1],
            ['id' => 2, 'name' => 'desc', 'sort_entity' => 1],
        ]);
    }
}
