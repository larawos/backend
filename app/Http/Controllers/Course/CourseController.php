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
        $courses = $this->courses->getPaginated(50);
        return compact('courses');
    }

    public function show($id)
    {
        $course = $this->courses->find($id);

        return compact('course');        
    }

    public function create()
    {
        //
    }

    public function edit($id)
    {
        $course = $this->courses->find($id);

        return compact('course');
    }

    public function store(StoreCourseRequest $request)
    {
        if (!$this->courses->create($request->all())) {
            return $this->courses->error();
        }

        return $this->courses->success();
    }

    public function update($id, UpdateCourseRequest $request)
    {
        if (!$this->courses->update($id, $request->all())) {
            return $this->courses->error();
        }

        return $this->courses->success();
    }

    public function destroy($id, DeleteCourseRequest $request)
    {
        if (!$this->courses->destroy($id)) {
            return $this->courses->error();
        }

        return $this->courses->success();
    }

    public function delete($id, PermanentlyDeleteCourseRequest $request)
    {
        if (!$this->courses->delete($id)) {
            return $this->courses->error();
        }

        return $this->courses->success();
    }
}