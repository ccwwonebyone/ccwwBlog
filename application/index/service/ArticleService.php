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
        $data['author'] = json_decode(session('user'),true)['username'];
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
        $data = Article::where($where)->field('id,title,tag,category_id,author,create_time,update_time')
                        ->paginate($limit)->toArray();
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
        $tags     = Tag::whereIn('id', $article['tag'])->field('id,name')->select()->toArray();
        $tag_name = implode(',', array_column($tags, 'name'));
        return compact('category', 'tags', 'tag_name');
    }

    public function delete($id)
    {
        return Article::destroy($id);
    }
}