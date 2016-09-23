<?php

namespace App\Http\Controllers\Type;

use App\Http\Controllers\Controller;
use App\Http\Requests\Type\StoreTypeRequest;
use App\Http\Requests\Type\UpdateTypeRequest;
use App\Http\Requests\Type\DeleteTypeRequest;
use App\Http\Requests\Type\PermanentlyDeleteTypeRequest;
use App\Services\Type\TypeService;

/**
 * Class TypeController
 * @package App\Http\Controllers\Type
 */
class TypeController extends Controller
{
    /**
     * @var TypeService
     **/
    protected $types;

    public function __construct(TypeService $types)
    {
        $this->types = $types;
    }

    public function index()
    {
        $types = $this->types->getPaginated(50);

        return compact('types');
    }

    public function show($id)
    {
        $type = $this->types->find($id);

        return compact('type');
    }

    public function create()
    {
        //
    }

    public function edit($id)
    {
        $type = $this->types->find($id);

        return compact('type');
    }

    public function store(StoreTypeRequest $request)
    {
        if (!$this->types->create($request->all()))
        {
            return $this->types->error();
        }

        return $this->types->success();
    }

    public function update($id, UpdateTypeRequest $request)
    {
        if (!$this->types->update($id, $request->all()))
        {
            return $this->types->error();
        }

        return $this->types->success();
    }

    public function destroy($id, DeleteTypeRequest $request)
    {
        if (!$this->types->destroy($id))
        {
            return $this->types->error();
        }

        return $this->types->success();
    }

    public function delete($id, PermanentlyDeleteTypeRequest $request)
    {
        if (!$this->types->delete($id))
        {
            return $this->types->error();
        }

        return $this->types->success();
    }
}