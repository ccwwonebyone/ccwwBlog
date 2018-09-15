<?php
namespace app\index\service;

use app\index\model\Category;
use Manpro\Manpro;

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
        $manpro = new Manpro();
        $data   = Category::order('pid')->order('sort')->select()->toArray();
        $data   = $manpro->indexArrKey($data, 'id');
        foreach ($data as $k => &$info) {
            $info['has_sub'] = false;
            $info['show']    = true;
            if(isset($data[$info['pid']])){
                $data[$info['pid']]['has_sub'][] = $info;
                $info['show'] = false;
            }
        }
        return $data;
    }

    public function delete($id)
    {
        return Category::delete($id);
    }
}