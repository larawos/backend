<?php

namespace App\Models\Tag\Traits\Relationship;

/**
 * Class TagRelationship
 * @package App\Models\Tag\Traits\Relationship
 */
trait TagRelationship
{
    public function articles()
    {
        $this->morphedByMany('App\Models\Article\Article', 'tagable');
    }
}