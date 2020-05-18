<?php

namespace app\index\service;

use app\index\model\Column;
use app\index\model\DBConfig;
use app\index\model\Table;

class DbInfoService extends Service
{
    /**
     * @param $search
     * @param  int  $limit
     * @return bool|false|\PDOStatement|string|\think\Collection|\think\Paginator
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function dbList($search, $limit = 10)
    {
        $where = [];
        if ($search['database']) {
            $where['database'] = ['like', '%'.$search['database'].'%'];
        }
        $query = DBConfig::where($where);
        return $limit ? $query->paginate($limit) : $query->select();
    }

    /**
     * @param $search
     * @param  int  $limit
     * @return bool|false|\PDOStatement|string|\think\Collection|\think\Paginator
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function tableList($search, $limit = 10)
    {
        $where = [];
        if ($search['name']) {
            $where['name'] = ['like', '%'.$search['name'].'%'];
        }
        if ($search['db_id']) {
            $where['db_id'] = $search['db_id'];
        }
        $query = Table::where($where);
        return $limit ? $query->paginate($limit) : $query->select();
    }

    /**
     * @param $search
     * @param  int  $limit
     * @return bool|false|\PDOStatement|string|\think\Collection|\think\Paginator
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function columnList($search, $limit = 10)
    {
        $where = [];
        if ($search['field']) {
            $where['field'] = ['like', '%'.$search['field'].'%'];
        }
        if ($search['table_id']) {
            $where['table_id'] = $search['table_id'];
        }
        $query = Column::where($where);
        return $limit ? $query->paginate($limit) : $query->select();
    }
}
