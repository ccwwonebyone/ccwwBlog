<?php
namespace app\index\service;

use app\index\model\Tag;
use app\index\model\ArticleTag;

class TagService{

    public function update($data, $id)
    {
        return Tag::where('id', $id)->update($data);
    }

    public function store($data)
    {
        if(Tag::where('name', $data['name'])->find()){
            return false;
        }else{
            $tag = Tag::create($data);
            return $tag->id;
        }
    }

    public function read($id)
    {
        return Tag::get($id)->toArray();
    }

    public function show($type = '')
    {
        $data   = Tag::select()->toArray();
        return $data;
    }

    public function delete($id)
    {
        return Tag::destroy($id);
    }

    public function tagOfArticle()
    {
        $info = Tag::alias('t')->field('id,name,count(article_id) AS num')
                   ->join('one_article_tag at', 't.id = at.tag_id', 'left')
                   ->group('id')->order('num desc')->select();
        return $info ? $info->toArray() : [];
    }
}