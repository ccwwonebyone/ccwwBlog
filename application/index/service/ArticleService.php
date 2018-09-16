<?php
namespace app\index\service;

use app\index\model\Article;
use app\index\model\Category;
use app\index\model\Tag;

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
        $info = Article::get($id)->toArray();
        $info = array_merge($info, $this->detail($info));
        return $info;
    }

    public function show($search = [], $limit = 10)
    {
        extract($search);
        $where = [];
        if(isset($title)) $where[] = ['title', 'like', '%'.$search['title'].'%'];
        $data = Article::where($where)->paginate($limit)->toArray();
        foreach ($data['data'] as &$article) {
            $article = array_merge($article, $this->detail($article));
        }
        return $data;
    }

    public function detail($article)
    {
        $pname    = '';
        $category = Category::where('id', $article['category_id'])->field('name,pid')->find()->toArray();
        if($category['pid']) $pname = Category::where('id', $category['pid'])->value('name').' > ';
        $category = $pname.$category['name'];
        $tags     = implode(',', Tag::whereIn('id', $article['tag'])->column('name'));
        return compact('category', 'tags');
    }
}