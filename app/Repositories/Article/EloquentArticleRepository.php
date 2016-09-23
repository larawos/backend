<?php

namespace App\Repositories\Article;

use App\Contracts\ArticleRepositoryContract;
use App\Models\Article\Article;
use App\Exceptions\GeneralException;

/**
 * Class EloquentArticleRepository
 * @package App\Repositories\Article
 */
class EloquentArticleRepository implements ArticleRepositoryContract
{
    /**
     * @param  $id
     * @throws GeneralException
     * @return mixed
     */
    public function find($id)
    {
        return Article::findOrFail($id);
    }

    /**
     * @param  $id
     * @throws GeneralException
     * @return mixed
     */
    public function findWithAll($id)
    {
        return Article::with('types')
            ->with('tags')
            ->findOrFail($id);
    }

    /**
     * @param  $per_page
     * @param  string      $order_by
     * @param  string      $sort
     * @return \Illuminate\Pagination\Paginator
     */
    public function getPaginated($per_page, $order_by = 'id', $sort = 'asc')
    {
        return Article::orderBy($order_by, $sort)
            ->paginate($per_page);
    }

    /**
     * @param  $per_page
     * @param  string      $order_by
     * @param  string      $sort
     * @return \Illuminate\Pagination\Paginator
     */
    public function getPaginatedWithAll($per_page, $order_by = 'id', $sort = 'asc')
    {
        return Article::orderBy($order_by, $sort)
            ->with('types')
            ->with('tags')
            ->paginate($per_page);
    }

    /**
     * @param  $per_page
     * @return \Illuminate\Pagination\Paginator
     */
    public function getDeletedPaginated($per_page)
    {
        return Article::onlyTrashed()
            ->paginate($per_page);
    }

    /**
     * @param  string  $order_by
     * @param  string  $sort
     * @return mixed
     */
    public function getAll($order_by = 'id', $sort = 'asc')
    {
        return Article::orderBy($order_by, $sort)
            ->get();
    }

    /**
     * @param  $input
     * @throws GeneralException
     * @return bool
     */
    public function create($input)
    {
        $article = new Article;

        $article->name        = $input['name'];
        $article->thumb       = 'http://lorempixel.com/640/480/?43700';
        $article->description = $input['description'];
        $article->content     = $input['content'];
        $article->source      = $input['source'];
        $article->payment     = $input['payment'];

        if ($article->save()) {
            foreach ($input['types'] as $type_id) {
                $article->types()->attach($type_id);
            }

            foreach (explode(',', $input['tags']) as $name) {
                $article->tags()->create(compact('name'));
            }

            return true;
        }

        throw new GeneralException('create article failed.');
    }

    /**
     * @param $id
     * @param $input
     * @throws GeneralException
     * @return bool
     */
    public function update($id, $input)
    {
        $article = $this->find($id);

        if ($article->update($input)) {
            // For whatever reason this just wont work in the above call, so a second is needed for now

            // $article->save();

            return true;
        }

        throw new GeneralException('update article failed.');
    }

    /**
     * @param  $id
     * @throws GeneralException
     * @return bool
     */
    public function destroy($id)
    {
        $article = $this->find($id);
        if ($article->delete()) {
            return true;
        }

        throw new GeneralException('destroy article failed.');
    }

    /**
     * @param  $id
     * @throws GeneralException
     * @return boolean|null
     */
    public function delete($id)
    {
        $article = $this->find($id);

        // if this model associated with other models,there will throw an exception.
        try {
            $article->forceDelete();
        } catch (\Exception $e) {
            throw new GeneralException($e->getMessage());
        }
    }

    /**
     * @param  $id
     * @throws GeneralException
     * @return bool
     */
    public function restore($id)
    {
        $article = $this->find($id);

        if ($article->restore()) {
            return true;
        }

        throw new GeneralException('restore article failed.');
    }

}
