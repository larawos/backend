<?php

namespace App\Models\Admin\Traits\Attribute;

/**
 * Class AdminAttribute
 * @package App\Models\Admin\Traits\Attribute
 */
trait AdminAttribute
{
    public function getAvatarAttribute($value)
    {
        return empty($value) ? 'http://gravatar.duoshuo.com/avatar/' . md5($this->email) : '';
    }
}
