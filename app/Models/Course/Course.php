<?php

namespace App\Models\Course;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Course\Traits\Attribute\CourseAttribute;
use App\Models\Course\Traits\Relationship\CourseRelationship;

class Course extends Model
{
    use SoftDeletes
        // , CourseAttribute
        // , CourseRelationship
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
