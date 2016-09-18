<?php

namespace App\Models\Course;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Course\Traits\Attribute\CourseVideoAttribute;
use App\Models\Course\Traits\Relationship\CourseVideoRelationship;

class CourseVideo extends Model
{
    use SoftDeletes
        // , CourseVideoAttribute
        // , CourseVideoRelationship
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
