<?php
namespace app\index\service;

use think\Db;
use think\Exception;
use app\index\model\Api;

class ApiService{
    /**
     * @param $search
     * @param  int  $limit
     * @return Api|array|bool|float|int|mixed|object|\stdClass|\think\Paginator|null
     * @throws \think\exception\DbException
     */
    public function apiList($search,$limit = 10)
    {
        $where = [];
        if($search['url']) $where['url'] = ['like','%'.$search['url'].'%'];
        $query = Api::where($where);
        $res = $limit ? $query->paginate($limit) : $query->get();
        $data = $limit ? $res['data'] : $res;
        foreach ($data as &$v) {
            $v = $this->strtoarr($v);
        }
        $limit ? $res['data'] = $data : $res = $data;
        return $res;
    }

    /**
     * @param $data
     * @return int|string
     */
    public function save($data)
    {
        return Api::insert($data);
    }

    /**
     * @param $id
     * @param $data
     * @return Api
     */
    public function update($id,$data)
    {
        return Api::where('id',$id)->update($data);
    }

    /**
     * @param $id
     * @return bool|int
     */
    public function delete($id)
    {
        return Api::where('id',$id)->delete();
    }

    /**
     * @param $id
     * @return array
     * @throws Exception
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function read($id)
    {
        return $this->strtoarr(Api::where('id',$id)->find()->toArray());
    }

    /**
     * 将API数据参数，消息头，url的参数变更为数组
     * @param  array $data 单条api记录
     * @return array       转换之后的数据
     */
    public function strtoarr($data)
    {
        foreach (['params','url_params','headers'] as $v) {
            $data[$v] = json_decode($data[$v],true);
        }
        return $data;
    }
}