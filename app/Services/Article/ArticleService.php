<?php

namespace App\Services\Article;

use App\Contracts\ArticleRepositoryContract;

/**
 * Class ArticleService
 * @package App\Services\Article
 */
class ArticleService
{
    /**
     * @var ArticleRepositoryContract
     **/
    protected $articles;

    public function __construct(ArticleRepositoryContract $articles)
    {
        $this->articles = $articles;
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
        return call_user_func_array([$this->articles, $method], $args);
    }

}
