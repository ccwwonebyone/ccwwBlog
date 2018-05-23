<?php
namespace app\index\service;

use think\Db;
use think\Exception;
use app\index\model\Api;

class ApiService{

    public function apiList($search,$limit = 10)
    {
        $where = [];
        if($search['url']) $where['url'] = ['like','%'.$search['url'].'%'];
        $query = Api::where($where);
        $res = $limit ? $query->paginate($limit) : $query->get();
        return $res->toArray();
    }

    public function save($data)
    {
        return Api::insert($data);
    }

    public function update($id,$data)
    {
        return Api::where('id',$id)->update($data);
    }

    public function delete($id)
    {
        return Api::where('id',$id)->delete();
    }

    public function read($id)
    {
        return User::where('id',$id)->find()->toArray();
    }
}