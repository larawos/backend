<?php

namespace App\Http\Controllers\Article;

use App\Http\Controllers\Controller;
use App\Http\Requests\Article\StoreArticleRequest;
use App\Http\Requests\Article\UpdateArticleRequest;
use App\Http\Requests\Article\DeleteArticleRequest;
use App\Http\Requests\Article\PermanentlyDeleteArticleRequest;
use App\Services\Article\ArticleService;

/**
 * Class ArticleController
 * @package App\Http\Controllers\Article
 */
class ArticleController extends Controller
{
    /**
     * @var ArticleService
     **/
    protected $articles;

    public function __construct(ArticleService $articles)
    {
        $this->articles = $articles;
    }

    public function index()
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function create()
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function store(StoreArticleRequest $request)
    {
        //
    }

    public function update($id, UpdateArticleRequest $request)
    {
        //
    }

    public function destroy($id, DeleteArticleRequest $request)
    {
        //
    }

    public function delete($id, PermanentlyDeleteArticleRequest $request)
    {
        //
    }
}