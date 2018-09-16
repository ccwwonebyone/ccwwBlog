<?php
namespace app\index\service;

use app\index\model\Tag;

class TagService{

    public function update($data, $id)
    {
        return Tag::where('id', $id)->update($data);
    }

    public function store($data)
    {
        $tag = Tag::create($data);
        return $tag->id;
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
}