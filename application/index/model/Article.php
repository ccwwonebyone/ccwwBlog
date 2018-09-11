<?php

namespace app\index\model;

use think\Model;

class Article extends Model
{
    protected $table = 'one_articles';

    public function category()
    {
        return $this->belongsTo('Category')->bind('name');
    }
}
