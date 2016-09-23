<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\StoreCategoryRequest;
use App\Http\Requests\Category\UpdateCategoryRequest;
use App\Http\Requests\Category\DeleteCategoryRequest;
use App\Http\Requests\Category\PermanentlyDeleteCategoryRequest;
use App\Services\Category\CategoryService;

/**
 * Class CategoryController
 * @package App\Http\Controllers\Category
 */
class CategoryController extends Controller
{
    /**
     * @var CategoryService
     **/
    protected $categorys;

    public function __construct(CategoryService $categorys)
    {
        $this->categorys = $categorys;
    }

    public function index()
    {
        return $this->categorys->getAllWithTypes();
    }

    public function show($id)
    {
        $category = $this->categorys->find($id);

        return compact('category');
    }

    public function create()
    {
        //
    }

    public function edit($id)
    {
        $category = $this->categorys->find($id);

        return compact('category');
    }

    public function store(StoreCategoryRequest $request)
    {
        if (!$this->categorys->create($request->all()))
        {
            return $this->categorys->error();
        }

        return $this->categorys->success();
    }

    public function update($id, UpdateCategoryRequest $request)
    {
        if (!$this->categorys->update($id, $request->all()))
        {
            return $this->categorys->error();
        }

        return $this->categorys->success();
    }

    public function destroy($id, DeleteCategoryRequest $request)
    {
        if (!$this->categorys->destroy($id))
        {
            return $this->categorys->error();
        }

        return $this->categorys->success();
    }

    public function delete($id, PermanentlyDeleteCategoryRequest $request)
    {
        if (!$this->categorys->delete($id))
        {
            return $this->categorys->error();
        }

        return $this->categorys->success();
    }
}