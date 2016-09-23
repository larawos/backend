<?php

namespace App\Models\Category;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Category\Traits\Attribute\CategoryAttribute;
use App\Models\Category\Traits\Relationship\CategoryRelationship;

class Category extends Model
{
    use SoftDeletes
        // , CategoryAttribute
        , CategoryRelationship
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
