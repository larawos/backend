<?php

namespace App\Repositories\Type;

use App\Contracts\TypeRepositoryContract;
use App\Models\Type\Type;
use App\Exceptions\GeneralException;

/**
 * Class EloquentTypeRepository
 * @package App\Repositories\Type
 */
class EloquentTypeRepository implements TypeRepositoryContract
{
    /**
     * @param  $id
     * @throws GeneralException
     * @return mixed
     */
    public function find($id)
    {
        return Type::findOrFail($id);
    }

    /**
     * @param  $per_page
     * @param  string      $order_by
     * @param  string      $sort
     * @return \Illuminate\Pagination\Paginator
     */
    public function getPaginated($per_page, $order_by = 'id', $sort = 'asc')
    {
        return Type::orderBy($order_by, $sort)
            ->paginate($per_page);
    }

    /**
     * @param  $per_page
     * @return \Illuminate\Pagination\Paginator
     */
    public function getDeletedPaginated($per_page)
    {
        return Type::onlyTrashed()
            ->paginate($per_page);
    }

    /**
     * @param  string  $order_by
     * @param  string  $sort
     * @return mixed
     */
    public function getAll($order_by = 'id', $sort = 'asc')
    {
        return Type::orderBy($order_by, $sort)
            ->get();
    }

    /**
     * @param  $input
     * @throws GeneralException
     * @return bool
     */
    public function create($input)
    {
        $type = new Type;

        if ($type->save()) {
            return true;
        }

        throw new GeneralException('create type failed.');
    }

    /**
     * @param $id
     * @param $input
     * @throws GeneralException
     * @return bool
     */
    public function update($id, $input)
    {
        $type = $this->find($id);

        if ($type->update($input)) {
            // For whatever reason this just wont work in the above call, so a second is needed for now

            // $type->save();

            return true;
        }

        throw new GeneralException('update type failed.');
    }

    /**
     * @param  $id
     * @throws GeneralException
     * @return bool
     */
    public function destroy($id)
    {
        $type = $this->find($id);
        if ($type->delete()) {
            return true;
        }

        throw new GeneralException('destroy type failed.');
    }

    /**
     * @param  $id
     * @throws GeneralException
     * @return boolean|null
     */
    public function delete($id)
    {
        $type = $this->find($id);

        // if this model associated with other models,there will throw an exception.
        try {
            $type->forceDelete();
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
        $type = $this->find($id);

        if ($type->restore()) {
            return true;
        }

        throw new GeneralException('restore type failed.');
    }

}
