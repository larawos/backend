<?php

namespace App\Models\File;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\File\Traits\Attribute\FileAttribute;
use App\Models\File\Traits\Relationship\FileRelationship;

class File extends Model
{
    use SoftDeletes
        // , FileAttribute
        // , FileRelationship
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
