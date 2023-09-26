<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('taxonomy_status', function(Blueprint $table) {
            $table->foreignId('status_entity')->constrained('taxonomy_entity');
        });

        Schema::table('taxonomy_rating', function(Blueprint $table) {
            $table->foreignId('rating_entity')->constrained('taxonomy_entity');
        });

        Schema::table('taxonomy_sort', function(Blueprint $table) {
            $table->foreignId('sort_entity')->constrained('taxonomy_entity');
        });

        Schema::table('taxonomy_type', function(Blueprint $table) {
            $table->foreignId('type_entity')->constrained(table: 'taxonomy_entity');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
