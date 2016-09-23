<?php

namespace App\Services\Category;

use App\Contracts\CategoryRepositoryContract;

/**
 * Class CategoryService
 * @package App\Services\Category
 */
class CategoryService
{
    /**
     * @var CategoryRepositoryContract
     **/
    protected $categorys;

    public function __construct(CategoryRepositoryContract $categorys)
    {
        $this->categorys = $categorys;
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
        return call_user_func_array([$this->categorys, $method], $args);
    }

}
