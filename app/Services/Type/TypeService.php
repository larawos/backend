<?php

namespace App\Services\Type;

use App\Contracts\TypeRepositoryContract;

/**
 * Class TypeService
 * @package App\Services\Type
 */
class TypeService
{
    /**
     * @var TypeRepositoryContract
     **/
    protected $types;

    public function __construct(TypeRepositoryContract $types)
    {
        $this->types = $types;
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
        return call_user_func_array([$this->types, $method], $args);
    }

}
