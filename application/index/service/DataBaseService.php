<?php
namespace app\index\service;

use think\Db;
use think\Exception;
use app\index\model\Table;
use app\index\model\Column;
use app\index\model\DBConfig;

class DataBaseService{

    protected $connection = [
        // 数据库类型
        'type'        => 'mysql',
        // 数据库连接DSN配置
        'dsn'         => '',
        // 服务器地址
        'hostname'    => '127.0.0.1',
        // 数据库名
        'database'    => 'manpro',
        // 数据库用户名
        'username'    => 'root',
        // 数据库密码
        'password'    => 'root',
        // 数据库连接端口
        'hostport'    => '3306',
        // 数据库连接参数
        'params'      => [],
        // 数据库编码默认采用utf8
        'charset'     => 'utf8',
        // 数据库表前缀
        'prefix'      => '',
    ];
    //think\Db
    protected $db;
    //数据表
    protected $tables = [];
    //数据库ID
    protected $dbID = 0;

    function __construct($connection)
    {
        $this->connection = array_merge($this->connection,$connection);
        $this->db = Db::connect($this->connection);
        $this->DBConfig = new DBConfig;
        $this->table = new Table;
    }

    public function getTables()
    {
        $this->tables = $this->db->select('show table status');
        return $this->tables;
    }

    public function saveDbConfig()
    {
        $this->DBConfig->data($this->connection)->save();
        $this->dbID = $this->DBConfig->id;
        return $this->dbID;
    }
    /**
     * 保存数据表
     * @param  array   $tables 数据表信息
     * @param  integer $dbID   保存数据库时的ID
     * @return boolean\Exception    是否保存成功
     */
    public function saveTables($tables=[],$dbID=0)
    {
        $this->tables = array_merage($this->tables,$tables);
        $dbID = $dbID == 0 ? $this->dbID : $dbID;
        if($dbID == 0) throw new Exception('数据库ID不合法',301);
        foreach ($this->tables as &$tab) {
            $this->table->data($tab)->save();
            $tab['table_id'] = $this->table->id;
        }
    }

    /**
     * 获取数据表字段信息
     * @param  array $table 数据表
     * @return array
     */
    public function getColums($table)
    {
        if(is_array($table)){
            foreach ($table as $tab) {
                $this->columns[$tab['Name']] = $this->db->select('show full columns from '.$tab['Name']);
            }
        }else{
            $this->columns[$table['Name']] = $this->db->select('show full columns from '.$table['Name']);
        }
        return $this->columns;
    }

    /**
     * 保存字段信息
     * @param  array   $columns 字段信息
     * @return boolean
     */
    public function saveColums($columns=[])
    {
        return $this->column->saveAll(array_merge($this->columns,$columns));
    }

    /**
     * 初始化基本数据库
     * @return boolean 
     */
    public function initDb()
    {
        $this->saveDbConfig();
        $this->saveTables();
        $this->saveColums();
        return true;
    }
}