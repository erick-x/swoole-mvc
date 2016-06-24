<?php

class DB {
    
    protected static $instance = null;

    /**
     * 配置信息加载
     * 
     * @param type $const_table
     * @param type $hash
     * @param string $db_cfg
     * @return object
     */
    static public function &load($const_table, $hash = null, $db_cfg = null, $dbconfig = null) {
        if (empty($dbconfig)) {
            $db_cfg || $db_cfg = 'Db_Config';
            $dbconfig = Config::call_config_func($db_cfg, 'mydb_callback_server', array($const_table, $hash));
            if ($dbconfig === false)
                return false;
        }
        $_key = $dbconfig['host'] . $dbconfig['port'] . '@' . $dbconfig['dbname'];
        if (!self::$instance[$_key]) {
            self::$instance[$_key] = new Mysql();
        }

        self::$instance[$_key]->dbconfig = $dbconfig;
        self::$instance[$_key]->dbhKey = $_key;
        self::$instance[$_key]->connect();

        return self::$instance[$_key];
        //return new self($dbconfig);
    }

}

/**
 * 数据库类
 *
 */
class Mysql {

    private $dbh;
    private $dbhKey;
    private $statement;
    private $dbconfig;
    private $isInTransation;
    
    public static $counter = 0;
    public static $all_query;

    private function __construct() {
        // $this->dbconfig = $dbconfig;
        //$this->connect();
    }

    /**
     * 
     * @return types
     */
    private function connect() {
        if ($this->dbh) {
            return;
        }

        if (!is_array($this->dbconfig))
            return false;

        $_dsn = 'mysql:host=' . $this->dbconfig['host'] . ';port=' . $this->dbconfig['port'] . ';dbname=' . $this->dbconfig['dbname'] . ';charset=utf8';
        //$dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);//可以确保SQL语句和相应的值在传递到mysql服务器之前是不会被PHP解析的
        try {
            $dbh = new PDO($_dsn, $this->dbconfig['user'], $this->dbconfig['pass'], array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8';"));
            $dbh->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true);
        } catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
            exit;
        }
        $this->dbh = $dbh;
    }

    public function close() {
        if (is_object($this->dbh)) {
            $this->dbh = null;
        }
    }

    /**
     * sql查询
     *
     * @param string $sql
     * @param array $prepare_array
     * @return bool $this
     */
    public function query($sql, $prepare_array = array()) {
        return $this->_query($sql, $prepare_array);
    }

    /**
     * 条件查询
     *
     * @param string $table 表名
     * @param string $select select字段
     * @param string $where where 语句
     * @param array $prepare
     * @param string $condition 附加条件, order by , limit 等
     * @return bool on execute result
     */
    public function select($table, $select = '*', $where = '', $prepare = array(), $condition = '') {
        $where = $where ? ("WHERE {$where}") : '';
        $sql = " SELECT {$select} FROM {$table} $where {$condition}";
        return $this->_query($sql, $prepare);
    }

    /**
     * 删除数据
     *
     *
     * @param string $table 表名
     * @param string $where where 语句，不能为空，避免删除全表数据，
     * @param array $prepare
     * @return none
     */
    public function delete($table, $where = '', $prepare = array()) {
        if (!$where)
            return false;
        $sql = "DELETE FROM {$table} WHERE {$where}";
        return $this->_query($sql, $prepare);
    }

    /**
     * 插入数据库
     *
     * @param string $table
     * @param array $arr
     * @return bool on execute result
     */
    public function insert($table, $array = array()) {
        $sql = " INSERT INTO {$table} ";
        $fields = array_keys($array);
        $values = array_values($array);
        $condition = array_fill(1, count($fields), '?');
        $sql .= "(`" . implode('`,`', $fields) . "`) VALUES (" . implode(',', $condition) . ")";
        return $this->_query($sql, $values);
    }

    public function get_insertlastid() {
        if (is_object($this->dbh)) {
            return $this->dbh->lastInsertId();
        }
    }

    /**
     * 更新操作
     *
     * @param string $table 表名
     * @param array $array 更新的数据，键 值对
     * @param string $condition 条件
     * @return bool false on execute fail or rowcount on success;
     */
    //public function update($table, $array=array(), $condition=null)
    public function update($table, $set = '', $where = '', $prepare = array()) {
        if (!$where)
            return false;
        $sql = " UPDATE {$table} SET {$set} WHERE {$where}";
        return $this->_query($sql, $prepare);
    }

    /**
     * 取得多行记录集
     *
     * @return array 结果集
     */
    public function fetch_all() {
        return $this->statement->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * 取得单行记录
     *
     * @return array
     */
    public function fetch_row() {
        return $this->statement->fetch(PDO::FETCH_ASSOC);
    }

    public function rowcount() {
        return $this->statement->rowCount();
    }

    /**
     * 查询数据表,所有的数据表的查询操作，最终都到这里处理
     *
     * @param string $sql
     * @param array $prepare
     * @return $this
     */
    private function _query($sql, $prepare = array()) {
        if ($this->dbh == null) {
            $this->connect();
        }

        if ($this->dbconfig['table_alias']) {
            $sql = preg_replace(
                    '/(from|update|insert|replace into|insert into|delete|delete from)\s+' . $this->dbconfig['table_alias'] . ' ?/is', ' \1 ' . $this->dbconfig['table'] . ' ', $sql, 1
            );
        }

        $statement = $this->dbh->prepare($sql);

        if (!is_object($statement)) {
            __log_message("statement is not object", 'db');
            __log_message($sql, 'db');
            __log_message($this->dbh->errorInfo(), 'db');
            return false;
        }
        $res = $statement->execute($prepare);
        // print_r($statement->errorInfo());
        if (!$res) {
            __log_message($sql, 'db');
            $prepare && __log_message($prepare, 'db');
            __log_message($this->getcfg(), 'db');

            __log_message($statement->errorInfo(), 'db');

            return false;
        }
        $this->statement = &$statement;
        return true;
    }

    public function beginTransaction() {
        if ($this->isInTransation)
            return true;

        if (is_object($this->dbh)) {
            return $this->isInTransation = $this->dbh->beginTransaction();
        }
    }

    public function commitTransaction() {
        if (!$this->isInTransation)
            return true;

        if (is_object($this->dbh)) {
            $ret = $this->dbh->commit();
            if ($ret) {
                $this->isInTransation = false;
                return true;
            }
            return false;
        }
    }

    public function rollBackTransaction() {

        if (!$this->isInTransation)
            return true;

        if (is_object($this->dbh)) {
            $ret = $this->dbh->rollBack();
            if ($ret) {
                $this->isInTransation = false;
                return true;
            } else {
                return false;
            }
        }
    }

    public function getcfg() {
        return $this->dbconfig;
    }

    public function getAttrb() {
        $attributes = array(
            "AUTOCOMMIT", "ERRMODE", "CASE", "CLIENT_VERSION", "CONNECTION_STATUS",
            "ORACLE_NULLS", "PERSISTENT", "PREFETCH", "SERVER_INFO", "SERVER_VERSION",
            "TIMEOUT"
        );

        foreach ($attributes as $val) {
            echo "PDO::ATTR_$val: ";
            echo $this->dbh->getAttribute(constant("PDO::ATTR_$val")) . "\n";
        }
    }

    static public function profiler() {
        return array(
            'counter' => self::$counter
            , 'all_query' => self::$all_query
        );
    }

}

?>
