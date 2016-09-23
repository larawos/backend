<?php

namespace App\Http\Controllers\File;

use App\Http\Controllers\Controller;
use App\Http\Requests\File\StoreFileRequest;
use App\Http\Requests\File\UpdateFileRequest;
use App\Http\Requests\File\DeleteFileRequest;
use App\Http\Requests\File\PermanentlyDeleteFileRequest;
use App\Services\File\FileService;

/**
 * Class FileController
 * @package App\Http\Controllers\File
 */
class FileController extends Controller
{
    /**
     * @var FileService
     **/
    protected $files;

    public function __construct(FileService $files)
    {
        $this->files = $files;
    }

    public function index()
    {
        $files = $this->files->getPaginated(50);

        return compact('files');
    }

    public function show($id)
    {
        $file = $this->files->find($id);

        return compact('file');
    }

    public function create()
    {
        //
    }

    public function edit($id)
    {
        $file = $this->files->find($id);

        return compact('file');
    }

    public function store(StoreFileRequest $request)
    {
        if (!$this->files->create($request->all()))
        {
            return $this->files->error();
        }

        return $this->files->success();
    }

    public function update($id, UpdateFileRequest $request)
    {
        if (!$this->files->update($id, $request->all()))
        {
            return $this->files->error();
        }

        return $this->files->success();
    }

    public function destroy($id, DeleteFileRequest $request)
    {
        if (!$this->files->destroy($id))
        {
            return $this->files->error();
        }

        return $this->files->success();
    }

    public function delete($id, PermanentlyDeleteFileRequest $request)
    {
        if (!$this->files->delete($id))
        {
            return $this->files->error();
        }

        return $this->files->success();
    }
}