<?php

namespace App\Models\Type\Traits\Relationship;

/**
 * Class TypeRelationship
 * @package App\Models\Type\Traits\Relationship
 */
trait TypeRelationship
{
    public function category()
    {
        return $this->belongsTo('App\Models\Category\Category');
    }

    public function articles()
    {
        return $this->morphedByMany('App\Models\Article\Article', 'typeable');
    }
}