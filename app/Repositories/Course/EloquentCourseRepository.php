<?php

namespace App\Repositories\Course;

use App\Contracts\CourseRepositoryContract;
use App\Models\Course\Course;
use App\Exceptions\GeneralException;

/**
 * Class EloquentCourseRepository
 * @package App\Repositories\Course
 */
class EloquentCourseRepository implements CourseRepositoryContract
{
    /**
     * @param  $id
     * @throws GeneralException
     * @return mixed
     */
    public function find($id)
    {
        return Course::findOrFail($id);
    }

    /**
     * @param  $per_page
     * @param  string      $order_by
     * @param  string      $sort
     * @return \Illuminate\Pagination\Paginator
     */
    public function getPaginated($per_page, $order_by = 'id', $sort = 'asc')
    {
        return Course::orderBy($order_by, $sort)
            ->paginate($per_page);
    }

    /**
     * @param  $per_page
     * @return \Illuminate\Pagination\Paginator
     */
    public function getDeletedPaginated($per_page)
    {
        return Course::onlyTrashed()
            ->paginate($per_page);
    }

    /**
     * @param  string  $order_by
     * @param  string  $sort
     * @return mixed
     */
    public function getAll($order_by = 'id', $sort = 'asc')
    {
        return Course::orderBy($order_by, $sort)
            ->get();
    }

    /**
     * @param  $input
     * @throws GeneralException
     * @return bool
     */
    public function create($input)
    {
        $course = new Course;

        if ($course->save()) {
            return true;
        }

        throw new GeneralException('create course failed.');
    }

    /**
     * @param $id
     * @param $input
     * @throws GeneralException
     * @return bool
     */
    public function update($id, $input)
    {
        $course = $this->find($id);

        if ($course->update($input)) {
            // For whatever reason this just wont work in the above call, so a second is needed for now

            // $course->save();

            return true;
        }

        throw new GeneralException('update course failed.');
    }

    /**
     * @param  $id
     * @throws GeneralException
     * @return bool
     */
    public function destroy($id)
    {
        $course = $this->find($id);
        if ($course->delete()) {
            return true;
        }

        throw new GeneralException('destroy course failed.');
    }

    /**
     * @param  $id
     * @throws GeneralException
     * @return boolean|null
     */
    public function delete($id)
    {
        $course = $this->find($id);

        // if this model associated with other models,there will throw an exception.
        try {
            $course->forceDelete();
        } catch (\Exception $e) {
            throw new GeneralException($e->getMessage());
        }
    }

    /**
     * @param  $id
     * @throws GeneralException
     * @return bool
     */
    public function restore($id)
    {
        $course = $this->find($id);

        if ($course->restore()) {
            return true;
        }

        throw new GeneralException('restore course failed.');
    }

}
