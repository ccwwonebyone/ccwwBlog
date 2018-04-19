<?php

namespace app\index\model;

use think\Model;

class DBConfig extends Model
{
    // 设置当前模型对应的完整数据表名称
    protected $table = 'mp_db';

    /**
     * 数据库配置信息
     * @param  int $id 数据ID
     * @return array     tp的数据库配置数组
     */
    public function dbConfig($id)
    {
    	$config = ['type','dsn','hostname','database','username','password','hostport','params','charset','prefix'];
    	$connection = $this->select(implode(',', $config))->where('id',$id)->find();
    	$connection['params'] = unserialize($connection['params']);
    	return $connection;
    }
    
    /**
     * 保存数据库配置信息
     * @param  array $connection 数据库连接信息
     * @return int             插入的ID
     */
    public function saveConfig($connection)
    {
    	$connection['params'] = serialize($connection['params']);
        $this->data($connection)->save();
        return $this->id;
    }
    /**
     * (搜索)显示列表
     *
     * @param array $where 查询数组
     * @param int   $page    查询页数
     * @param int   $pageSize  页数大小
     * @return array 结果集
     */
    public function search($where,$page=1,$pageSize=10)
    {
        return $this->page($page,$pageSize)->where($where)->get();
    }
}
