<?php

namespace App\Repositories\File;

use App\Contracts\FileRepositoryContract;
use App\Models\File\File;
use App\Exceptions\GeneralException;

/**
 * Class EloquentFileRepository
 * @package App\Repositories\File
 */
class EloquentFileRepository implements FileRepositoryContract
{
    /**
     * @param  $id
     * @throws GeneralException
     * @return mixed
     */
    public function find($id)
    {
        return File::findOrFail($id);
    }

    /**
     * @param  $per_page
     * @param  string      $order_by
     * @param  string      $sort
     * @return \Illuminate\Pagination\Paginator
     */
    public function getPaginated($per_page, $order_by = 'id', $sort = 'asc')
    {
        return File::orderBy($order_by, $sort)
            ->paginate($per_page);
    }

    /**
     * @param  $per_page
     * @return \Illuminate\Pagination\Paginator
     */
    public function getDeletedPaginated($per_page)
    {
        return File::onlyTrashed()
            ->paginate($per_page);
    }

    /**
     * @param  string  $order_by
     * @param  string  $sort
     * @return mixed
     */
    public function getAll($order_by = 'id', $sort = 'asc')
    {
        return File::orderBy($order_by, $sort)
            ->get();
    }

    /**
     * @param  $input
     * @throws GeneralException
     * @return bool
     */
    public function create($input)
    {
        $file = new File;

        if ($file->save()) {
            return true;
        }

        throw new GeneralException('create file failed.');
    }

    /**
     * @param $id
     * @param $input
     * @throws GeneralException
     * @return bool
     */
    public function update($id, $input)
    {
        $file = $this->find($id);

        if ($file->update($input)) {
            // For whatever reason this just wont work in the above call, so a second is needed for now

            // $file->save();

            return true;
        }

        throw new GeneralException('update file failed.');
    }

    /**
     * @param  $id
     * @throws GeneralException
     * @return bool
     */
    public function destroy($id)
    {
        $file = $this->find($id);
        if ($file->delete()) {
            return true;
        }

        throw new GeneralException('destroy file failed.');
    }

    /**
     * @param  $id
     * @throws GeneralException
     * @return boolean|null
     */
    public function delete($id)
    {
        $file = $this->find($id);

        // if this model associated with other models,there will throw an exception.
        try {
            $file->forceDelete();
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
        $file = $this->find($id);

        if ($file->restore()) {
            return true;
        }

        throw new GeneralException('restore file failed.');
    }

}
