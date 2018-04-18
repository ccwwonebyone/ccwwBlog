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
        'params'      => [\PDO::ATTR_CASE => \PDO::CASE_LOWER],
        // 数据库编码默认采用utf8
        'charset'     => 'utf8',
        // 数据库表前缀
        'prefix'      => '',
    ];
    //think\Db
    protected $db;
    //数据表
    protected $tables  = [];
    //数据库ID
    protected $dbID    = 0;
    //字段
    protected $columns = [];

    function __construct($connection)
    {
        $this->connection = array_merge($this->connection,$connection);
        $this->db = Db::connect($this->connection);
        $this->DBConfig = new DBConfig;
        $this->table = new Table;
        $this->column = new Column;
    }

    public function getTables()
    {
        $this->tables = $this->db->query('show table status');
        return $this->tables;
    }

    public function saveDbConfig()
    {
        $connection = $this->connection;
        $connection['params'] = serialize($connection['params']);
        $this->DBConfig->data($connection)->save();
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
        $this->tables = array_merge($this->tables,$tables);

        $dbID = $dbID == 0 ? $this->dbID : $dbID;
        if($dbID == 0) throw new Exception('数据库ID不合法',301);
        foreach ($this->tables as &$tab) {
            $tab = array_intersect_key($tab,['name'=>'','comment'=>'','engine'=>'',]);
            $tab['db_id'] = $this->dbID;
            $this->table->data($tab)->isUpdate(false)->save();  // 第二次开始必须使用下面的方式新增
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
        if(!isset($table['name'])){          //判断是否为数据表的数组
            foreach ($table as $tab) {
                $this->getColums($tab);   
            }
        }else{
            $columns = $this->db->query('show full columns from '.$table['name']);
            foreach ($columns as &$column) {
                $column['table_id'] = $table['table_id'];
                unset($column['privileges']);
            }
            $this->columns[$table['name']] = $columns;
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
        $allColumns = [];
        foreach (array_merge($this->columns,$columns) as $columns) {
            $allColumns = array_merge($allColumns,$columns);
        }
        return $this->column->saveAll($allColumns);
    }

    /**
     * 初始化基本数据库
     * @return boolean 
     */
    public function initDb()
    {
        $this->saveDbConfig();
        $this->getTables();
        $this->saveTables();
        $this->getColums($this->tables);
        $this->saveColums();
        return true;
    }
}