<?php

namespace App\Models\Tag;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Tag\Traits\Attribute\TagAttribute;
use App\Models\Tag\Traits\Relationship\TagRelationship;

class Tag extends Model
{
    use SoftDeletes
        // , TagAttribute
        // , TagRelationship
        ;

    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
}
