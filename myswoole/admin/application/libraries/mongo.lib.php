<?php

class Mongo_Lib {

    private $mongo; //mongo对象
    private $db; //db mongodb对象数据库
    private $collection; //集合，相当于数据表 
    private $dbConfig; //mongodb 的配置文件
    private static $_instance;

    /**
     * 初始化Mongo
     * $config = array(
     * 'server' => ‘192.168.78.114' 服务器地址
     * ‘port’   => '27017' 端口地址
     * ‘option’ => array('connect' => true) 参数
     * 'db_name'=> 'test' 数据库名称
     * ‘username’=> 'root' 数据库用户名
     * ‘password’=> '123' 数据库密码
     * )
     * Enter description here ...
     * @param unknown_type $config
     */
    public static function load($const_table, $hash = null, $db_cfg = null, $method = null) {
        empty($db_cfg) && $db_cfg = 'Mongodb_Config';
        empty($method) && $method = 'Mongodb_callback_server';
        $config = Config::call_config_func($db_cfg, $method, array($const_table, $hash));
        if ($config === false) {
            return false;
        }
        $_key = $config['host'] . $config['port'] . '@' . $config['dbname'];
        if (!self::$_instance[$_key]) {
            self::$_instance[$_key] = new self();
        }

        self::$_instance[$_key]->dbConfig = $config;
        self::$_instance[$_key]->connect();

        return self::$_instance[$_key];
    }

    public function __construct() {
        
    }

    private function connect() {
        if (is_resource($this->mongo)) {
            return;
        }

        if (!is_array($this->dbConfig) || empty($this->dbConfig)) {
            return false;
        }

        try {
            $class = 'MongoClient';
            if (!class_exists($class)) {
                $class = 'Mongo';
            }

            $server = 'mongodb://'.$this->dbConfig['user'].':'.$this->dbConfig['pass'].'@' . $this->dbConfig['host'] . ':' . $this->dbConfig['port'];
           // $server = 'mongodb://'. $this->dbConfig['host'] . ':' . $this->dbConfig['port'];
            $this->mongo = new MongoClient($server, array('connect' => true));
            
            $this->db = $this->mongo->selectDB($this->dbConfig['dbname']);
            if ($this->dbConfig['user'] != '' && $this->dbConfig['pass'] != ''){
                $this->db->authenticate($this->dbConfig['user'], $this->dbConfig['pass']);
            }
        } catch (MongoConnectionException $e) {
            __log_message($e->getMessage(), 'mongodb');
            exit();
        }
    }

    /**
     * 选择一个集合，相当于选择一个数据表
     * @param string $collection 集合名称
     */
    public function selectCollection($collection) {
        return $this->collection = $this->db->selectCollection($collection);
    }

    /**
     * 新增数据
     * @param array $data 需要新增的数据 例如：array('title' => '1000', 'username' => 'xcxx')
     * @param array $option 参数
     */
    public function insert($data, $option = array()) {
        return $this->collection->insert($data, $option);
    }

    /**
     * 批量新增数据
     * @param array $data 需要新增的数据 例如：array(0=>array('title' => '1000', 'username' => 'xcxx'))
     * @param array $option 参数
     */
    public function batchInsert($data, $option = array()) {
        return $this->collection->batchInsert($data, $option);
    }

    /**
     * 保存数据，如果已经存在在库中，则更新，不存在，则新增
     * @param array $data 需要新增的数据 例如：array(0=>array('title' => '1000', 'username' => 'xcxx'))
     * @param array $option 参数
     */
    public function save($data, $option = array()) {
        return $this->collection->save($data, $option);
    }

    /**
     * 根据条件移除
     * @param array $query  条件 例如：array(('title' => '1000'))
     * @param array $option 参数
     */
    public function remove($query, $option = array()) {
        return $this->collection->remove($query, $option);
    }

    /**
     * 根据条件更新数据
     * @param array $query  条件 例如：array(('title' => '1000'))
     * @param array $data   需要更新的数据 例如：array(0=>array('title' => '1000', 'username' => 'xcxx'))
     * @param array $option 参数
     */
    public function update($query, $data, $option = array()) {
        return $this->collection->update($query, $data, $option);
    }

    /**
     * 根据条件查找一条数据
     * @param array $query  条件 例如：array(('title' => '1000'))
     * @param array $fields 参数
     */
    public function findOne($query, $fields = array()) {
        return $this->collection->findOne($query, $fields);
    }

    /**
     * 根据条件查找多条数据
     * @param array $query 查询条件
     * @param array $sort  排序条件 array('age' => -1, 'username' => 1)
     * @param int   $limit 页面
     * @param int   $limit 查询到的数据条数
     * @param array $fields返回的字段
     */
    public function find($query, $sort = array(), $skip = 0, $limit = 0, $fields = array()) {
        $cursor = $this->collection->find($query, $fields);
        if ($sort)
            $cursor->sort($sort);
        if ($skip)
            $cursor->skip($skip);
        if ($limit)
            $cursor->limit($limit);
        return iterator_to_array($cursor);
    }

    /**
     * 数据统计
     */
    public function count() {
        return $this->collection->count();
    }

    /**
     * 错误信息
     */
    public function error() {
        return $this->db->lastError();
    }

    /**
     * 获取集合对象
     */
    public function getCollection() {
        return $this->collection;
    }

    /**
     * 获取DB对象
     */
    public function getDb() {
        return $this->db;
    }

}
