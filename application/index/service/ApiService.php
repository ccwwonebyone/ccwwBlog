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
        $res = $res->toArray();
        $data = $limit ? $res['data'] : $res;
        foreach ($data as &$v) {
            $v = $this->strtoarr($v);
        }
        $limit ? $res['data'] = $data : $res = $data;
        return $res;
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
        return $this->strtoarr(Api::where('id',$id)->find()->toArray());
    }

    public function strtoarr($data)
    {
        foreach (['params','url_params','headers'] as $v) {
            $data[$v] = json_decode($data[$v],true);
        }
        return $data;
    }
}