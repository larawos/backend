<?php

namespace App\Models\Article\Traits\Relationship;

/**
 * Class ArticleRelationship
 * @package App\Models\Article\Traits\Relationship
 */
trait ArticleRelationship
{
    public function types()
    {
        return $this->morphToMany('App\Models\Type\Type', 'typeable');
    }

    public function tags()
    {
        return $this->morphToMany('App\Models\Tag\Tag', 'tagable');
    }

    public function files()
    {
        return $this->morphToMany('App\Models\File\File', 'fileable');
    }
}