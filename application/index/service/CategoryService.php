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

    public function show($type = '')
    {
        $manpro = new Manpro();
        $data   = Category::order('pid')->order('sort')->select()->toArray();
        $data   = $manpro->indexArrKey($data, 'id');
        $sort   = [];
        foreach ($data as $k => &$info) {
            $info['has_sub'] = false;
            if(isset($data[$info['pid']])){
                $info['pname'] = $data[$info['pid']]['name'];    //父分类
                $data[$info['pid']]['has_sub'][] = $info;
                unset($data[$k]);
            }
        }
        if($type == 'admin'){
            $res = [];
            foreach ($data as $val) {
                $temp = $val;
                unset($temp['has_sub']);
                $res[] = $temp;
                if($val['has_sub']){
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
        return Category::destroy($id);
    }
}