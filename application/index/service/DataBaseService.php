<?php

namespace app\index\service;

use think\Db;
use think\Exception;
use app\index\model\Table;
use app\index\model\Column;
use app\index\model\DBConfig;

class DataBaseService extends Service
{
    /**
     * @var array
     */
    protected $connection = [
        // 数据库类型
        'type' => 'mysql',
        // 数据库连接DSN配置
        'dsn' => '',
        // 服务器地址
        'hostname' => '127.0.0.1',
        // 数据库名
        'database' => 'manpro',
        // 数据库用户名
        'username' => 'root',
        // 数据库密码
        'password' => 'root',
        // 数据库连接端口
        'hostport' => '3306',
        // 数据库连接参数
        'params' => [\PDO::ATTR_CASE => \PDO::CASE_LOWER],
        // 数据库编码默认采用utf8
        'charset' => 'utf8',
        // 数据库表前缀
        'prefix' => '',
    ];
    //think\Db
    protected $db;
    //数据表
    protected $tables = [];
    //数据库ID
    protected $dbID = 0;
    //字段
    protected $columns = [];

    /**
     * DataBaseService constructor.
     * @param $connection
     * @throws Exception
     */
    public function __construct($connection)
    {
        if (isset($connection['id'])) {
            $this->dbID = $connection['id'];
            unset($connection['id']);
        }
        $this->connection = array_merge($this->connection, $connection);
        $this->db = Db::connect($this->connection);
        $this->DBConfig = new DBConfig;
        $this->table = new Table;
        $this->column = new Column;
    }

    /**
     * @return array|bool|mixed|\PDOStatement
     * @throws \think\exception\PDOException
     */
    public function getTables()
    {
        $this->tables = $this->db->query('show table status');
        return $this->tables;
    }

    /**
     * @return array|bool|float|int|mixed|object|\stdClass|null
     */
    public function saveDbConfig()
    {
        $connection = $this->connection;
        $connection['params'] = json_encode($connection['params']);
        $this->DBConfig->data($connection)->save();
        $this->dbID = $this->DBConfig->id;
        return $this->dbID;
    }


    /**
     * 保存数据表
     * @param  array  $tables  数据表信息
     * @param  integer  $dbID  保存数据库时的ID
     * @return array   原数据并给数据添加数据表ID
     */
    public function saveTables($tables = [], $dbID = 0)
    {
        foreach ($tables as &$tab) {
            $tab = array_intersect_key($tab, ['name' => '', 'comment' => '', 'engine' => '',]);
            $tab['db_id'] = $dbID;
            $this->table->data($tab)->isUpdate(false)->save();  // 第二次开始必须使用下面的方式新增
            $tab['table_id'] = $this->table->id;
        }
        return $tables;
    }

    /**
     * 获取数据表字段信息
     * @param  array  $table  数据表
     * @return array
     */
    public function getColums($table)
    {
        if (!isset($table['name'])) {          //判断是否为数据表的数组
            foreach ($table as $tab) {
                $this->getColums($tab);
            }
        } else {
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
     * @param  array  $columns  字段信息
     * @return boolean
     */
    public function saveColums($columns = [])
    {
        $allColumns = [];
        foreach ($columns as $columns) {
            $allColumns = array_merge($allColumns, $columns);
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
        $this->saveTables($this->tables, $this->dbID);
        $this->getColums($this->tables);
        $this->saveColums($this->columns);
        return true;
    }

    /**
     * 更新字段表
     * @param  array  $columns  字段信息
     * @param  int  $table_id  数据表ID
     * @return boolean
     */
    public function updateTable($columns, $table_id)
    {
        //由于不知道是否更改字段名，只能做全删除后重新插入
        $this->column->where('table_id', $table_id)->delete();
        return $this->saveColums($columns);
    }

    /**
     * 更新数据表，若存在的数据表有变化请使用 updateTable
     * @param  int  $db_id  数据库字段
     * @return boolean
     */
    public function updateDb($db_id)
    {
        $oldTables = $this->table->field('id', 'name')->where('db_id', $db_id)->select();
        $fullTables = $this->getTables();
        $tables = array_column('name', $fullTables);
        $delTables = array_diff($oldTables, $tables);    //删除的数据表
        $addTables = array_diff($tables, $oldTables);    //新增的数据表
        $oldTablesNameToId = array_flip($oldTables);
        foreach ($delTables as $table) {
            $this->table_id->where(['db_id' => $db_id, 'name' => $table])->delete();
            $this->column->where(['table_id' => $oldTablesNameToId[$table]])->delete();
        }
        $saveTables = [];
        foreach ($addTables as $table) {
            $saveTables[] = $fullTables[$table];
        }
        $newSaveTables = $this->saveTables($saveTables, $db_id);
        $columns = $this->getColums($newSaveTables);
        return $this->saveColums($columns);
    }

    /**
     * 删除数据库相关信息
     *
     * @param  int  $db_id  数据库ID
     * @return boolean
     */
    public function delDB($db_id)
    {
        $this->DBConfig->where('id', $db_id)->delete();
        $tableIDs = $this->table->where('db_id', $db_id)->column('id');
        $this->table->where('db_id', $db_id)->delete();
        foreach ($tableIDs as $table_id) {
            $this->column->where('table_id', $table_id)->delete();
        }
        return true;
    }
}