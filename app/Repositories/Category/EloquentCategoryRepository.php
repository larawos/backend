<?php

namespace App\Repositories\Category;

use App\Contracts\CategoryRepositoryContract;
use App\Models\Category\Category;
use App\Exceptions\GeneralException;

/**
 * Class EloquentCategoryRepository
 * @package App\Repositories\Category
 */
class EloquentCategoryRepository implements CategoryRepositoryContract
{
    /**
     * @param  $id
     * @throws GeneralException
     * @return mixed
     */
    public function find($id)
    {
        return Category::findOrFail($id);
    }

    /**
     * @param  $per_page
     * @param  string      $order_by
     * @param  string      $sort
     * @return \Illuminate\Pagination\Paginator
     */
    public function getPaginated($per_page, $order_by = 'id', $sort = 'asc')
    {
        return Category::orderBy($order_by, $sort)
            ->paginate($per_page);
    }

    /**
     * @param  $per_page
     * @return \Illuminate\Pagination\Paginator
     */
    public function getDeletedPaginated($per_page)
    {
        return Category::onlyTrashed()
            ->paginate($per_page);
    }

    /**
     * @param  string  $order_by
     * @param  string  $sort
     * @return mixed
     */
    public function getAll($order_by = 'id', $sort = 'asc')
    {
        return Category::orderBy($order_by, $sort)
            ->get();
    }

    /**
     * @param  string  $order_by
     * @param  string  $sort
     * @return mixed
     */
    public function getAllWithTypes($order_by = 'id', $sort = 'asc')
    {
        return Category::orderBy($order_by, $sort)
            ->with('types')
            ->get();
    }

    /**
     * @param  $input
     * @throws GeneralException
     * @return bool
     */
    public function create($input)
    {
        $category = new Category;

        if ($category->save()) {
            return true;
        }

        throw new GeneralException('create category failed.');
    }

    /**
     * @param $id
     * @param $input
     * @throws GeneralException
     * @return bool
     */
    public function update($id, $input)
    {
        $category = $this->find($id);

        if ($category->update($input)) {
            // For whatever reason this just wont work in the above call, so a second is needed for now

            // $category->save();

            return true;
        }

        throw new GeneralException('update category failed.');
    }

    /**
     * @param  $id
     * @throws GeneralException
     * @return bool
     */
    public function destroy($id)
    {
        $category = $this->find($id);
        if ($category->delete()) {
            return true;
        }

        throw new GeneralException('destroy category failed.');
    }

    /**
     * @param  $id
     * @throws GeneralException
     * @return boolean|null
     */
    public function delete($id)
    {
        $category = $this->find($id);

        // if this model associated with other models,there will throw an exception.
        try {
            $category->forceDelete();
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
        $category = $this->find($id);

        if ($category->restore()) {
            return true;
        }

        throw new GeneralException('restore category failed.');
    }

}
