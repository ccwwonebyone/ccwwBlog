<?php
namespace app\index\service;

use app\index\model\Category;

class CategoryService{

    public function update($data, $id)
    {
        return Category::where('id', $id)->update($data);
    }

    public function store($data)
    {
        $category = Category::create($data);
        return $category->id;
    }

    public function read($id)
    {
        return Category::get($id)->toArray();
    }

    public function show()
    {
        $data = Category::order('pid')->order('sort')->select()->toArray();
        return array_combine(array_column($data,'id'), $data);
    }

    public function delete($id)
    {
        return Category::delete($id);
    }
}