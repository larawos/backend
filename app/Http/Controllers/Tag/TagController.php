<?php

namespace App\Http\Controllers\Tag;

use App\Http\Controllers\Controller;
use App\Http\Requests\Tag\StoreTagRequest;
use App\Http\Requests\Tag\UpdateTagRequest;
use App\Http\Requests\Tag\DeleteTagRequest;
use App\Http\Requests\Tag\PermanentlyDeleteTagRequest;
use App\Services\Tag\TagService;

/**
 * Class TagController
 * @package App\Http\Controllers\Tag
 */
class TagController extends Controller
{
    /**
     * @var TagService
     **/
    protected $tags;

    public function __construct(TagService $tags)
    {
        $this->tags = $tags;
    }

    public function index()
    {
        $tags = $this->tags->getPaginated(50);

        return compact('tags');
    }

    public function show($id)
    {
        $tag = $this->tags->find($id);

        return compact('tag');
    }

    public function create()
    {
        //
    }

    public function edit($id)
    {
        $tag = $this->tags->find($id);

        return compact('tag');
    }

    public function store(StoreTagRequest $request)
    {
        if (!$this->tags->create($request->all()))
        {
            return $this->tags->error();
        }

        return $this->tags->success();
    }

    public function update($id, UpdateTagRequest $request)
    {
        if (!$this->tags->update($id, $request->all()))
        {
            return $this->tags->error();
        }

        return $this->tags->success();
    }

    public function destroy($id, DeleteTagRequest $request)
    {
        if (!$this->tags->destroy($id))
        {
            return $this->tags->error();
        }

        return $this->tags->success();
    }

    public function delete($id, PermanentlyDeleteTagRequest $request)
    {
        if (!$this->tags->delete($id))
        {
            return $this->tags->error();
        }

        return $this->tags->success();
    }
}