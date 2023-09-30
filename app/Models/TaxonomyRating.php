<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TaxonomyRating extends Model
{
    protected $table = 'taxonomy_rating';
    protected $primaryKey = 'id';

    public function entity(): BelongsTo {
        return $this->belongsTo(TaxonomyEntity::class, 'rating_entity');
    }

}
