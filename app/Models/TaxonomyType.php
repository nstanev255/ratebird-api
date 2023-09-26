<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TaxonomyType extends Model
{
    use HasFactory;

    protected $table = 'taxonomy_type';
    protected $primaryKey = 'id';

    public function entity(): BelongsTo {
        return $this->belongsTo(TaxonomyEntity::class, 'entity_type');
    }
}
