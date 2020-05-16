<?php

namespace app\index\service;

use app\index\model\Tag;
use app\index\model\ArticleTag;

class TagService extends Service
{
    /**
     * @param $data
     * @param $id
     * @return Tag
     */
    public function update($data, $id)
    {
        return Tag::where('id', $id)->update($data);
    }

    /**
     * @param $data
     * @return array|bool|float|int|mixed|object|\stdClass|null
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function store($data)
    {
        if (Tag::where('name', $data['name'])->find()) {
            return false;
        } else {
            $tag = Tag::create($data);
            return $tag->id;
        }
    }

    /**
     * @param $id
     * @return array
     * @throws \think\Exception
     * @throws \think\exception\DbException
     */
    public function read($id)
    {
        return Tag::get($id)->toArray();
    }

    /**
     * @param  string  $type
     * @return array
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function show($type = '')
    {
        $data = Tag::select()->toArray();
        return $data;
    }

    /**
     * @param $id
     * @return bool|int
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function delete($id)
    {
        if (ArticleTag::where('tag_id', $id)->find($id)) {
            return false;
        }
        return Tag::destroy($id);
    }

    /**
     * @return array
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function tagOfArticle()
    {
        $info = Tag::alias('t')->field('id,name,count(article_id) AS num')
            ->join('one_article_tag at', 't.id = at.tag_id', 'left')
            ->group('id')->order('num desc')->limit(5)->select();
        return $info ? $info->toArray() : [];
    }
}