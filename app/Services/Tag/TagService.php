<?php

namespace App\Services\Tag;

use App\Contracts\TagRepositoryContract;

/**
 * Class TagService
 * @package App\Services\Tag
 */
class TagService
{
    /**
     * @var TagRepositoryContract
     **/
    protected $tags;

    public function __construct(TagRepositoryContract $tags)
    {
        $this->tags = $tags;
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
        return call_user_func_array([$this->tags, $method], $args);
    }

}
