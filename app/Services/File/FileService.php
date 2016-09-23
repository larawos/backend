<?php

namespace App\Services\File;

use App\Contracts\FileRepositoryContract;

/**
 * Class FileService
 * @package App\Services\File
 */
class FileService
{
    /**
     * @var FileRepositoryContract
     **/
    protected $files;

    public function __construct(FileRepositoryContract $files)
    {
        $this->files = $files;
    }

    public function success($message = 'SUCCESS')
    {
        $code = 200;
        return compact('message', 'code');
    }

    public function error($code = 500, $message = 'FAILED')
    {
        return compact('message', 'code');
    }

    public function __call($method, $args)
    {
        return call_user_func_array([$this->files, $method], $args);
    }

}
