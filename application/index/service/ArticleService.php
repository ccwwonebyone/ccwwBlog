<?php

namespace app\index\service;

use app\index\model\Article;
use app\index\model\ArticleTag;
use app\index\model\Category;

class ArticleService extends Service
{
    /**
     * @param $data
     * @param $id
     * @return bool
     */
    public function update($data, $id)
    {
        $tags = $data['tag'];
        unset($data['tag']);
        Article::where('id', $id)->update($data);
        ArticleTag::where('article_id', $id)->delete();
        (new ArticleTag())->addArticle($tags, $id);    //添加标签
        return true;
    }

    /**
     * @param $data
     * @return int
     */
    public function store($data)
    {
        $data['author'] = json_decode(session('user'), true)['username'];
        $tags = $data['tag'];
        unset($data['tag']);
        $article = Article::create($data);
        if ($article) {
            (new ArticleTag())->addArticle($tags, $article->id);
        }    //添加标签
        return $article->id;
    }

    /**
     * @param $id
     * @return Article|array|null
     * @throws \think\Exception
     * @throws \think\exception\DbException
     */
    public function read($id)
    {
        $info = Article::get($id);
        if ($info) {
            $info = $info->toArray();
            $info = array_merge($info, $this->detail($info));
        } else {
            $info = [];
        }
        return $info;
    }

    /**
     * @param  array  $search
     * @param  int  $limit
     * @return array
     * @throws \think\exception\DbException
     */
    public function show($search = [], $limit = 10)
    {
        extract($search);
        $where = [];
        if (isset($title)) {
            $where[] = ['title', 'like', '%'.$search['title'].'%'];
        }
        if (isset($category_id)) {
            $where['category_id'] = $category_id;
        }
        if (isset($tag)) {
            $data = Article::alias('a')->join('one_article_tag at', 'a.id = at.article_id')
                ->where($where)->where('at.tag_id',
                    $tag)->order('sort desc')->order('create_time desc')->paginate($limit)->toArray();
        } else {
            $data = Article::where($where)->order('sort desc')->order('create_time desc')->paginate($limit)->toArray();
        }
        foreach ($data['data'] as &$article) {
            $article = array_merge($article, $this->detail($article));
        }
        return $data;
    }

    /**
     * @param $article
     * @return array
     * @throws \think\Exception
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function detail($article)
    {
        $category = Category::where('id', $article['category_id'])->field('name,pid')->find();
        if ($category) {
            $category = $category->toArray();
            $pcategory = $category['pid'] ? Category::where('id', $category['pid'])->value('name') : '';
            $category = $category['name'];
        } else {
            $category = '';
            $pcategory = '';
        }
        $tags = ArticleTag::field('id,name')->where('article_id', $article['id'])->alias('at')->join('one_tags t',
            'at.tag_id = t.id', 'LEFT')->select();
        $tags = $tags ? $tags->toArray() : [];
        $tag_name = implode(',', array_column($tags, 'name'));
        return compact('category', 'pcategory', 'tags', 'tag_name');
    }

    /**
     * @param $id
     * @return int
     */
    public function delete($id)
    {
        $res = Article::destroy($id);
        if ($res) {
            ArticleTag::where('article_id', $id)->delete();
        }
        return $res;
    }
}
