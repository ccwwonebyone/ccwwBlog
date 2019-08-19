<?php
namespace app\index\service;

use app\index\model\Category;
use app\index\model\Article;

class CategoryService
{
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

    public function show($type = '')
    {
        $data   = Category::order('pid')->order('sort')->select()->toArray();
        $data   = array_combine(array_column($data, 'id'), $data);
        foreach ($data as $k => &$info) {
            $info['has_sub'] = false;
            $info['select']  = true;
            if (isset($data[$info['pid']])) {
                $info['pname'] = $data[$info['pid']]['name'];    //父分类
                $data[$info['pid']]['has_sub'][] = $info;
                unset($data[$k]);
            }
        }
        if ($type == 'admin') {
            $res = [];
            foreach ($data as $val) {
                $temp = $val;
                if ($temp['has_sub']) {
                    $temp['select'] = false;
                }
                unset($temp['has_sub']);
                $res[] = $temp;
                if ($val['has_sub']) {
                    foreach ($val['has_sub'] as $v) {
                        unset($v['has_sub']);
                        $res[] = $v;
                    }
                }
            }
            $data = $res;
        }
        return $data;
    }

    public function delete($id)
    {
        $sub_category = Category::where('pid', $id)->column('id');
        if ($sub_category) {
            if (Article::whereIn('category_id', $sub_category)->find()) {
                return false;
            }
        }
        if (Article::where('category_id', $id)->find()) {
            return false;
        }
        return Category::destroy($id);
    }
}
