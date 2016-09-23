<?php

namespace App\Models\Type;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Type\Traits\Attribute\TypeAttribute;
use App\Models\Type\Traits\Relationship\TypeRelationship;

class Type extends Model
{
    use SoftDeletes
        // , TypeAttribute
        , TypeRelationship
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
