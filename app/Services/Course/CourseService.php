<?php

namespace App\Services\Course;

use App\Contracts\CourseRepositoryContract;

/**
 * Class CourseService
 * @package App\Services\Course
 */
class CourseService
{
    /**
     * @var CourseRepositoryContract
     **/
    protected $courses;

    public function __construct(CourseRepositoryContract $courses)
    {
        $this->courses = $courses;
    }

    public function __call($method, $args)
    {
        return call_user_func_array([$this->courses, $method], $args);
    }

}
