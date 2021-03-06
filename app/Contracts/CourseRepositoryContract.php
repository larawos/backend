<?php

namespace App\Contracts;

/**
 * Interface CourseRepositoryContract
 * @package App\Contracts
 */
interface CourseRepositoryContract
{
    /**
     * @param  $id
     * @return mixed
     */
    public function find($id);

    /**
     * @param  $per_page
     * @param  string      $order_by
     * @param  string      $sort
     * @return \Illuminate\Pagination\Paginator
     */
    public function getPaginated($per_page, $order_by = 'id', $sort = 'asc');

    /**
     * @param  $per_page
     * @return \Illuminate\Pagination\Paginator
     */
    public function getDeletedPaginated($per_page);

    /**
     * @param  string  $order_by
     * @param  string  $sort
     * @return mixed
     */
    public function getAll($order_by = 'id', $sort = 'asc');

    /**
     * @param $input
     * @throws GeneralException
     * @return mixed
     */
    public function create($input);

    /**
     * @param $id
     * @param $input
     * @throws GeneralException
     * @return mixed
     */
    public function update($id, $input);

    /**
     * @param  $id
     * @throws GeneralException
     * @return mixed
     */
    public function destroy($id);

    /**
     * @param  $id
     * @throws GeneralException
     * @return mixed
     */
    public function delete($id);

    /**
     * @param  $id
     * @throws GeneralException
     * @return mixed
     */
    public function restore($id);
}
