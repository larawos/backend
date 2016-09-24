<?php

namespace App\Models\Article\Traits\Attribute;

/**
 * Class ArticleAttribute
 * @package App\Models\Article\Traits\Attribute
 */
trait ArticleAttribute
{
    public function getThumbAttribute($value)
    {
        return decode_file_token($value);
    }

    public function getContentAttribute($value)
    {
        return decode_file_token($value);
    }
}
