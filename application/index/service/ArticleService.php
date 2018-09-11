<?php
namespace app\index\service;

use app\index\model\Article;

class ArticleService{

    public function update($data, $id)
    {
        return Article::where('id', $id)->update($data);
    }

    public function store($data)
    {
        $article = Article::create($data);
        return $article->id;
    }

    public function read($id)
    {
        return $info = Article::get($id, 'category')->toArray();
    }

    public function show($search, $limit)
    {
        $data = Article::where('title','like','%'.$search['title'].'%')->paginate($limit)->toArray();
        return array_combine(array_column($data,'id'), $data);
    }
}