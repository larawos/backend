<?php

namespace App\Services\Article;

use Storage;
use App\Contracts\ArticleRepositoryContract;
use App\Events\UploadFile;

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

    public function create($input)
    {

        $file = parse_base64($input['thumb']);

        event(new UploadFile($file));
        
        $input['thumb'] = encode_file_token($file->get('name'));

        preg_match_all('/"(data:[\w]+\/[\w\d_\-\.]+;base64,.*?)"/', $input['content'], $matchs);
        $matchs = collect($matchs)->filter()->toArray();
        $names = [];

        if (!empty($matchs)) {
            foreach ($matchs[1] as $key => $match) {
                $file = parse_base64($match);

                event(new UploadFile($file));

                $names[$key] = encode_file_token($file->get('name'));
            }

            $input['content'] = str_replace($matchs[1], $names, $input['content']);
        }

        return $this->articles->create($input);
    }

    public function getListWithAll()
    {
        $articles = $this->articles->getPaginatedWithAll(10, 'id', 'desc')->toArray();

        foreach ($articles['data'] as $key => $article) {
            $tags  = collect($article['tags'])->pluck('name');
            $types = collect($article['types'])->pluck('id');
            $articles['data'][$key]['tags']  = $tags;
            $articles['data'][$key]['types'] = $types;
        }

        return $articles;
    }

    public function __call($method, $args)
    {
        return call_user_func_array([$this->articles, $method], $args);
    }

}
