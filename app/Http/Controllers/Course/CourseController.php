<?php

namespace App\Http\Controllers\Course;

use App\Http\Controllers\Controller;
use App\Http\Requests\Course\StoreCourseRequest;
use App\Http\Requests\Course\UpdateCourseRequest;
use App\Http\Requests\Course\DeleteCourseRequest;
use App\Http\Requests\Course\PermanentlyDeleteCourseRequest;
use App\Services\Course\CourseService;

/**
 * Class CourseController
 * @package App\Http\Controllers\Course
 */
class CourseController extends Controller
{
    /**
     * @var CourseService
     **/
    protected $courses;

    public function __construct(CourseService $courses)
    {
        $this->courses = $courses;
    }

    public function index()
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function create()
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function store(StoreCourseRequest $request)
    {
        //
    }

    public function update($id, UpdateCourseRequest $request)
    {
        //
    }

    public function destroy($id, DeleteCourseRequest $request)
    {
        //
    }

    public function delete($id, PermanentlyDeleteCourseRequest $request)
    {
        //
    }
}