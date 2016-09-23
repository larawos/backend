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
        return $this->articles->getListWithAll();
    }

    public function show($id)
    {
        return $this->articles->find($id);        
    }

    public function create()
    {
        //
    }

    public function edit($id)
    {
        $article = $this->articles->find($id);

        return compact('article');
    }

    public function store(StoreArticleRequest $request)
    {
        if (!$this->articles->create($request->all())) {
            return $this->articles->error();
        }

        return $this->articles->success();
    }

    public function update($id, UpdateArticleRequest $request)
    {
        if (!$this->articles->update($id, $request->all())) {
            return $this->articles->error();
        }

        return $this->articles->success();
    }

    public function destroy($id, DeleteArticleRequest $request)
    {
        if (!$this->articles->destroy($id)) {
            return $this->articles->error();
        }

        return $this->articles->success();
    }

    public function delete($id, PermanentlyDeleteArticleRequest $request)
    {
        if (!$this->articles->delete($id)) {
            return $this->articles->error();
        }

        return $this->articles->success();
    }
}