<?php
namespace app\index\service;

use think\Db;
use think\Exception;
use app\index\model\Table;
use app\index\model\Column;
use app\index\model\DBConfig;

class DbInfoService{

    public function dbList($search,$limit = 10)
    {
        $where = [];
        if($search['database']) $where['database'] = ['like','%'.$search['database'].'%'];
        $query = DBConfig::where($where);
        $res = $limit ? $query->paginate($limit) : $query->get();
        return $res->toArray();
    }

    public function tableList($search,$limit = 10)
    {
        $where = [];
        if($search['name']) $where['name'] = ['like','%'.$search['name'].'%'];
        $query = Table::where($where);
        $res = $limit ? $query->paginate($limit) : $query->get();
        return $res->toArray();
    }

    public function columnList()
    {
        $where = [];
        if($search['field']) $where['field'] = ['like','%'.$search['field'].'%'];
        $query = Column::where($where);
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