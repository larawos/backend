<?php

namespace App\Models\Category\Traits\Relationship;

/**
 * Class CategoryRelationship
 * @package App\Models\Category\Traits\Relationship
 */
trait CategoryRelationship
{
    public function types()
    {
        return $this->hasMany('App\Models\Type\Type');
    }
}