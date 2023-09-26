<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaxonomyEntity extends Model
{
    use HasFactory;

    protected $table = 'taxonomy_entity';
    protected $primaryKey = 'id';
}
