<?php

namespace App\Models\Article;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Article\Traits\Attribute\ArticleAttribute;
use App\Models\Article\Traits\Relationship\ArticleRelationship;

class Article extends Model
{
    use SoftDeletes
        , ArticleAttribute
        , ArticleRelationship
        ;

    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
}
