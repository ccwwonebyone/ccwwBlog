<?php

namespace app\index\model;

use think\Model;

class ArticleTag extends Model
{
    protected $table = 'one_article_tag';

    protected $autoWriteTimestamp = false;

    public function addArticle($tags, $article_id)
    {
        $list = [];

        foreach ($tags as $tag) {
            $list[] = ['article_id' => $article_id, 'tag_id' => $tag];
        }
        return $this->insertAll($list);
    }
}
