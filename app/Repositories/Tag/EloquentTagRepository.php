<?php

namespace App\Repositories\Tag;

use App\Contracts\TagRepositoryContract;
use App\Models\Tag\Tag;
use App\Exceptions\GeneralException;

/**
 * Class EloquentTagRepository
 * @package App\Repositories\Tag
 */
class EloquentTagRepository implements TagRepositoryContract
{
    /**
     * @param  $id
     * @throws GeneralException
     * @return mixed
     */
    public function find($id)
    {
        return Tag::findOrFail($id);
    }

    /**
     * @param  $per_page
     * @param  string      $order_by
     * @param  string      $sort
     * @return \Illuminate\Pagination\Paginator
     */
    public function getPaginated($per_page, $order_by = 'id', $sort = 'asc')
    {
        return Tag::orderBy($order_by, $sort)
            ->paginate($per_page);
    }

    /**
     * @param  $per_page
     * @return \Illuminate\Pagination\Paginator
     */
    public function getDeletedPaginated($per_page)
    {
        return Tag::onlyTrashed()
            ->paginate($per_page);
    }

    /**
     * @param  string  $order_by
     * @param  string  $sort
     * @return mixed
     */
    public function getAll($order_by = 'id', $sort = 'asc')
    {
        return Tag::orderBy($order_by, $sort)
            ->get();
    }

    /**
     * @param  $input
     * @throws GeneralException
     * @return bool
     */
    public function create($input)
    {
        $tag = new Tag;

        if ($tag->save()) {
            return true;
        }

        throw new GeneralException('create tag failed.');
    }

    /**
     * @param $id
     * @param $input
     * @throws GeneralException
     * @return bool
     */
    public function update($id, $input)
    {
        $tag = $this->find($id);

        if ($tag->update($input)) {
            // For whatever reason this just wont work in the above call, so a second is needed for now

            // $tag->save();

            return true;
        }

        throw new GeneralException('update tag failed.');
    }

    /**
     * @param  $id
     * @throws GeneralException
     * @return bool
     */
    public function destroy($id)
    {
        $tag = $this->find($id);
        if ($tag->delete()) {
            return true;
        }

        throw new GeneralException('destroy tag failed.');
    }

    /**
     * @param  $id
     * @throws GeneralException
     * @return boolean|null
     */
    public function delete($id)
    {
        $tag = $this->find($id);

        // if this model associated with other models,there will throw an exception.
        try {
            $tag->forceDelete();
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
        $tag = $this->find($id);

        if ($tag->restore()) {
            return true;
        }

        throw new GeneralException('restore tag failed.');
    }

}
