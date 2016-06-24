<?php

class RedisExt {

    //static public $redis = array();
    static public $instance = array();
    private $config = null;

    private function __construct() {
        
    }

    /**
     * 
     * 连接Redis
     * @param string $key
     * @param string $conf_key
     */
    private function &Connect($key = '') {
        if (empty($key))
            return false;

        $server = Config::call_config_func('Redis_Config', 'mydb_callback_server', $key);
        $server['timeout'] = 3;

        if (empty($server['host'])) {
            return false;
        }

        $redis = new Redis();
        $connect_ret = $redis->connect($server['host'], $server['port'], $server['timeout']);
        if ($connect_ret === false)
            return false;

        $redis->setOption(Redis::OPT_SCAN, Redis::SCAN_RETRY);
        $redis->select($server['db']);
        return $redis;
    }

    /**
     * 
     * 获取wlredis实例
     */
    static public function &GetInstance($config = null) {

        return new RedisExt($config);
    }

    /**
     * [setTimeout 设置过期时间]
     * @param [type] $key  [description]
     * @param [type] $time [description]
     */
    public function setTimeout($key, $time) {
        $redis = $this->Connect($key);
        if ($redis === false)
            return false;

        $redis->expire($key, $time);
        $redis->close();
    }

    /**
     * [setTimeout 设置过期时间]
     * @param [type] $key  [description]
     * @param [type] $time [description] 绝对时间
     */
    public function setTimeoutAt($key, $time) {
        $redis = $this->Connect($key);
        if ($redis === false)
            return false;

        $redis->expireAt($key, $time);
        $redis->close();
    }

    /**
     * [ttl 查看缓存过期时间]
     * @param  [type] $key [description]
     * @return [type]      [description]
     */
    public function ttl($key) {
        $redis = $this->Connect($key);
        if ($redis === false)
            return false;

        $ret = $redis->ttl($key);
        $redis->close();
        return $ret;
    }

    public function exists($key) {

        $redis = $this->Connect($key);
        if ($redis === false)
            return false;

        return $redis->exists($key);
    }

    /**
     * 带无生存时间
     *
     * @param mixed $key
     * @param mixed $data
     * @return bool
     */
    public function Set($key, $value, $json_encode = TRUE) {
        $redis = $this->Connect($key);
        if ($redis === false)
            return false;

        if ($json_encode) {
            $value = json_encode($value);
        }
        $ret = $redis->set($key, $value);
        $redis->close();
        return $ret;
    }

    /**
     * 带生存时间的写入值
     *
     * @param mixed $key
     * @param int $timeout
     * @param mixed $data
     * @return bool
     */
    public function Setex($key, $value, $timeout = 3600, $json_encode = TRUE) {
        $redis = $this->Connect($key);
        if ($redis === false)
            return false;

        if (!is_numeric($timeout)) {
            $timeout = 3600;
        }

        if ($json_encode) {
            $value = json_encode($value);
        }
        for ($i = 0; $i < 3; $i++) {
            $ret = $redis->setex($key, $timeout, $value);
            if ($ret !== false) {
                break;
            }
            usleep(4000);
        }
        $redis->close();
        return $ret;
    }

    /**
     * 写入值 存在则不覆盖
     *
     * @param mixed $key
     * @param int $timeout
     * @param mixed $data
     * @return bool
     */
    public function Setnx($key, $value, $json_encode = TRUE) {
        $redis = $this->Connect($key);
        if ($redis === false)
            return false;

        if ($json_encode) {
            $value = json_encode($value);
        }
        $ret = $redis->setnx($key, $value);
        $redis->close();
        return $ret;
    }

    /**
     * 带生存时间的写入值
     *
     * @param mixed $key
     * @param int $timeout
     * @param mixed $data
     * @return bool
     */
    public function SetnxExpire($key, $value, $timeout = 3600, $json_encode = TRUE) {
        $redis = $this->Connect($key);
        if ($redis === false)
            return false;

        if (!is_numeric($timeout)) {
            $timeout = 3600;
        }

        if ($json_encode) {
            $value = json_encode($value);
        }
        $ret = $redis->setnx($key, $value);
        $ret && $redis->expireAt($key, time() + $time);
        $redis->close();
        return $ret;
    }

    /**
     * get 得到某个key的值（string值）
     * @param mixed $key
     * @return mixed|false
     */
    public function Get($key, $json_decode = TRUE) {
        $redis = $this->Connect($key);
        if ($redis === false)
            return false;

        $value = $redis->get($key);
        $redis->close();
        if ($value) {
            if ($json_decode) {
                return json_decode($value, TRUE);
            } else {
                return $value;
            }
        } else {
            return false;
        }
    }

    //这个仅适合在一台机器上，要注意！！！
    public function MGet($aKey) {
        if (!is_array($aKey) || count($aKey) < 1) {
            return false;
        }

        $redis = $this->Connect($aKey);
        if ($redis === false)
            return false;

        $value = $redis->mGet($aKey);
        $redis->close();
        return $value;
    }

    public function MGet4Merge($aKey) {

        if (!is_array($aKey) || count($aKey) < 1) {
            return false;
        }

        $redis = $this->Connect($aKey);
        if ($redis === false)
            return false;

        $count = count($aKey);
        $aData = array();
        for ($i = 0; $i < ceil($count / 50); $i = $i + 50) {
            $_arr = array_slice($aKey, $i, 50);
            if (count($_arr) < 1) {
                return false;
            }

            $data = $redis->mGet($_arr);
            if (is_array($data) && count($data) > 0) {
                $aData = array_merge($data, $aData);
            }
            usleep(4000);
        }
        return $aData;
    }

    /**
     * 删除指定key的值
     *
     * @param mixed array | string $keys
     * @return int|true - Long Number of keys deleted.
     */
    public function Delete($key,$checkExists=true) {
        $redis = $this->Connect($key);
        if (!$redis->exists($key) && $checkExists) {
            return true;
        }
        for ($i = 0; $i < 3; $i++) {
            $ret = $redis->delete($key);
            if ($ret) {
                break;
            }
            usleep(5000);
        }
        $redis->close();
        return $ret;
    }

    /**
     * key中的值进行自增1
     *
     * @param mixed $key
     * @return int|true - the new value
     */
    public function Incr($key, $timeout = 0) {
        $redis = $this->Connect($key);
        if (!$redis) {
            return false;
        }

        $ret = $redis->incr($key);
        if ($ret && $timeout > 0) {
            $redis->expire($key, $timeout);
        }
        $redis->close();
        return $ret;
    }

    /**
     * key中的值进行自增N
     *
     * @param mixed $key
     * @param mixed $value
     * @param mixed $timeout 过期时间，秒
     * @return int|true - the new value
     */
    public function IncrBy($key, $value, $timeout = 0) {
        $redis = $this->Connect($key);
        if (!$redis) {
            return false;
        }

        $value = intval($value);

        if (!is_numeric($value)) {
            $value = 1;
        }

        $ret = $redis->incrBy($key, $value);
        if ($ret && $timeout > 0) {
            $redis->expire($key, $timeout);
        }
        $redis->close();
        return $ret;
    }

    /**
     * key中的值进行递减1
     *
     * @param mixed $key
     * @return int|true - the new value
     */
    public function Decr($key) {
        $redis = $this->Connect($key);

        $ret = $redis->decr($key);
        $redis->close();
        return $ret;
    }

    /**
     * key中的值进行递减N
     *
     * @param mixed $key
     * @param mixed $value
     * @return int|true - the new value
     */
    public function DecrBy($key, $value) {
        $redis = $this->Connect($key);
        $value = intval($value);
        if (!is_numeric($value)) {
            $value = 1;
        }
        $ret = $redis->decrBy($key, $value);
        $redis->close();
        return $ret;
    }

    /**
     * Lpush 升级版，用于解决批量问题（@周桂宏） 
     *
     */
    public function LPushBatch($key, &$aValue) {
        $redis = $this->Connect($key);

        if (!is_array($aValue) || count($aValue) < 1) {
            return 0;
        }

        if ($key && $aValue) {
            $redis->multi(Redis::PIPELINE);
            foreach ($aValue as $v) {
                if (is_array($v))
                    $v = json_encode($v);
                $redis->lPush($key, $v);
            }
            $redis->exec();
            $iSize = $redis->lSize($key);
            $redis->close();
            return $iSize;
        }
        return 0;
    }

    //List相关操作
    /**
     * 
     * 在名称为key的list左边（头）添加一个值为value的 元素
     * @param string $key
     * @param array | string $value
     */
    public function LPush($key, $value) {
        $redis = $this->Connect($key);
        if ($redis === false)
            return false;

        if (is_array($value)) {
            $value = json_encode($value);
        }
        if ($key && $value) {
            $ret = $redis->lPush($key, $value);
            $redis->close();
            return $ret;
        }
        return 0;
    }

    /**
     * 
     * 在名称为key的list右边（尾）添加一个值为value的 元素
     * @param string $key
     * @param array | string $value
     */
    public function RPush($key, $value) {
        $redis = $this->Connect($key);
        if ($redis === false)
            return false;

        if (is_array($value)) {
            $value = json_encode($value);
        }
        if ($key && $value) {
            $ret = $redis->rPush($key, $value);
            $redis->close();
            return $ret;
        }
        return 0;
    }

    /**
     * 
     * 在名称为key的list左边（头）添加一个值为value的 元素,存在不再添加
     * @param string $key
     * @param array | string $value
     */
    public function LPushx($key, $value) {
        $redis = $this->Connect($key);
        if ($redis === false)
            return false;

        if ($key && $value) {
            $ret = $redis->lPushx($key, json_encode($value));
            $redis->close();
            return $ret;
        }
        return 0;
    }

    /**
     * 
     * 在名称为key的list右边（尾）添加一个值为value的 元素,存在不再添加
     * @param string $key
     * @param array | string $value
     */
    public function RPushx($key, $value) {
        $redis = $this->Connect($key);
        if ($redis === false)
            return false;

        if ($key && $value) {
            $ret = $redis->rPushx($key, json_encode($value));
            $redis->close();
            return $ret;
        }
        return 0;
    }

    /**
     * 
     * 输出名称为key的list左(头)起的第一个元素，删除该元素
     * @param string $key
     */
    public function LPop($key) {
        $redis = $this->Connect($key);
        if ($redis === false)
            return false;
        $ret = $redis->lPop($key);
        $redis->close();
        return $ret;
    }

    /**
     * 
     * 
     * 输出名称为key的list右(头)尾的第一个元素，删除该元素
     * @param string $key
     */
    public function RPop($key) {
        $redis = $this->Connect($key);
        if ($redis === false)
            return false;
        $ret = $redis->rPop($key);
        $redis->close();
        return $ret;
    }

    /**
     * 
     * 返回名称为key的list中start至end之间的元素（end为 -1 ，返回所有）
     * @param string $key
     * @param int $start
     * @param int $end
     */
    public function LRange($key, $start = 0, $end = -1) {
        if (!is_numeric($start) || $start < 0) {
            $start = 0;
        }
        if (!is_numeric($end) || $end < -1) {
            $end = -1;
        }

        $redis = $this->Connect($key);
        if ($redis === false)
            return false;
        $data = $redis->lRange($key, $start, $end);
        $redis->close();
        return $data;
    }

    /**
     * 
     * 截取名称为key的list，保留start至end之间的元素
     * @param string $key
     * @param int $start
     * @param int $end
     */
    public function LTrim($key, $start = 0, $end = 15) {
        $redis = $this->Connect($key);
        if ($redis === false)
            return false;
        $ret = $redis->lTrim($key, $start, $end);
        $redis->close();
        return $ret;
    }

    /**
     * 
     * 删除值
     * @param string $key
     * @param string $value
     * @param int $count
     * 
     * count为0，删除所有值为value的元素，count>0从头至尾删除count个值为value的元素，count<0从尾到头删除|count|个值为value的元素
     */
    public function LRem($key, $value, $count = 0) {
        $redis = $this->Connect($key);
        if ($redis === false)
            return false;
        $ret = $redis->LRem($key, $value, $count);
        $redis->close();
        return $ret;
    }

    /**
     * [LSize 取列表长度]
     * @param [type] $key [description]
     */
    public function LSize($key) {
        $redis = $this->Connect($key);
        $ret = $redis->lSize($key);
        $redis->close();
        return $ret;
    }

    //SET操作相关
    /**
     * 
     * 向名称为key的set中添加元素value,如果value存在，不写入，return false
     * @param string $key
     * @param string $value
     */
    public function SAdd($key, $value) {
        if (is_array($value)) {
            $value = json_encode($value);
        }
        $redis = $this->Connect($key);
        $ret = $redis->sAdd($key, $value);
        $redis->close();
        return $ret;
    }

    public function SAddBatch($key, $aValue) {
        if (!is_array($aValue) || count($aValue) < 1) {
            return false;
        }
        $redis = $this->Connect($key);
        if (!$redis)
            return false;

        array_unshift($aValue, $key);
        $ret = call_user_func_array(array($redis, "sAdd"), $aValue);

        $redis->close();

        return $ret;
    }

    public function SScan($key, $cursor = null, $match = '', $limit = 50) {
        if (empty($key)) {
            return false;
        }
        $redis = $this->Connect($key);
        if (!$redis) {
            return false;
        }
        $data = array();
        while (($arr_keys = $redis->sscan($key, $cursor, $match, $limit)) !== false) {
            $data = array_merge($data, $arr_keys);
        }
        $redis->close();
        return $data;
    }

    //SET操作相关
    /**
     * 
     * Returns the members of the set resulting from the difference between the first set and all the successive sets.
     * @param string $key
     * @param string $key2
     */
    public function SDiff($key1, $key2) {
        $redis = $this->Connect($key1);
        if (!$redis) {
            return false;
        }
        $ret = $redis->sDiff($key1, $key2);
        $redis->close();
        return $ret;
    }

    /*
     *  获得名称为key的集合里面的一个值
     * @param string $key
     * @return string $value
     */

    public function SPop($key) {
        $redis = $this->Connect($key);
        if (!$redis) {
            return false;
        }
        $value = $redis->sPop($key);
        $redis->close();
        return $value;
    }

    /**
     * 
     * 删除名称为key的set中的元素value
     * @param string $key
     * @param string $value
     */
    public function SRem($key, $value) {

        if (!$key || !$value)
            return false;

        $redis = $this->Connect($key);
        if (!$redis)
            return false;

        if (is_array($value) && count($value) > 0) {
            array_unshift($value, $key);
            $ret = call_user_func_array(array($redis, "sRem"), $value);
        } else {
            if (!$redis->sIsMember($key, $value)) {
                $ret = true;
            } else {
                $ret = $redis->sRem($key, $value);
            }
        }
        $redis->close();
        return $ret;
    }

    /**
     * 
     * 判断值是否存在
     * @param string $key
     * @param string/array $value
     */
    public function SIsMember($key, $value) {
        if (is_array($value)) {
            $value = json_encode($value);
        }
        $redis = $this->Connect($key);
        $ret = $redis->sIsMember($key, $value);
        $redis->close();
        return $ret;
    }

    /**
     * 
     * 返回名称为key的set的元素个数
     * @param string $key
     */
    public function SSize($key) {
        if (empty($key))
            return false;

        $redis = $this->Connect($key);
        if (!$redis)
            return false;

        $ret = $redis->sSize($key);
        $redis->close();
        return $ret;
    }

    public function SCard($key) {
        if (empty($key))
            return false;

        $redis = $this->Connect($key);
        if (!$redis)
            return false;

        $ret = $redis->sSize($key);
        $redis->close();
        return $ret;
    }

    /**
     * 
     * 取名称为key的value
     * @param string $key
     * @param string $value
     */
    public function SMembers($key) {
        if (empty($key))
            return false;

        $redis = $this->Connect($key);
        if (!$redis)
            return false;

        $ret = $redis->sMembers($key);
        $redis->close();
        return $ret;
    }

    /**
     * 
     * 求交集
     * @param string/array $keys
     */
    public function Sinter($keys) {
        $redis = $this->Connect($keys);
        $ret = $redis->sinter($keys);
        $redis->close();
        return $ret;
    }

    /**
     * 
     * 排序分页等
     * 参数
     * 	'by' => 'some_pattern_*',
     * 	'limit' => array(0, 1),
     * 	'get' => 'some_other_pattern_*' or an array of patterns,
     * 	'sort' => 'asc' or 'desc',
     * 	'alpha' => TRUE,
     * 	'store' => 'external-key'
     * @param string $key
     * @param array $params 默认取一个值
     */
    public function Sort($key, $params = array()) {
        $redis = $this->Connect($key);
        if ($params) {
            $data = $redis->sort($key, $params);
        } else {
            $data = $redis->sort($key);
        }
        $redis->close();
        return $data;
    }

    //hash操作
    /**
     * 
     * 将哈希表key中的域field的值设为value。
     * 如果域field已经存在于哈希表中，旧值将被覆盖。
     * @param string $key
     * @param string $value
     */
    public function HSet($key, $field, $value) {
        $redis = $this->Connect($key);
        if (!$redis) {
            return false;
        }
        if (is_array($value)) {
            $value = json_encode($value);
        }
        $ret = $redis->hSet($key, $field, $value);
        $redis->close();
        Registry::increment("redis_hset", 1);
        return $ret;
    }

    /**
     * 
     * 若域field已经存在，该操作无效。
     * @param string $key
     * @param string $value
     */
    public function HSetNx($key, $field, $value) {
        $redis = $this->Connect($key);
        if (!$redis) {
            return false;
        }
        if (is_array($value)) {
            $value = json_encode($value);
        }
        $ret = $redis->hSetNx($key, $field, $value);
        $redis->close();
        return $ret;
    }

    /**
     * 
     * 返回哈希表key中给定域field的值。
     * @param string $key
     * @param string $field
     */
    public function HGet($key, $field) {
        $redis = $this->Connect($key);
        if (!$redis) {
            return false;
        }
        $ret = $redis->hGet($key, $field);
        $redis->close();
        Registry::increment("redis_hget", 1);
        return $ret;
    }

    /**
     * 
     * 返回哈希表key中，一个或多个给定域的值。
     * @param string $key
     * @param array $field
     */
    public function HMGet($key, $fields) {

        if (is_string($fields)) {
            $fields = array($fields);
        }
        $redis = $this->Connect($key);
        if (!$redis) {
            return false;
        }
        $ret = false;
        if ($redis->exists($key)) {
            $ret = $redis->hMGet($key, $fields);
        }
        $redis->close();
        Registry::increment("redis_hmget", 1);
        return $ret;
    }

    /**
     * 
     * @param type $key
     * @param type $value=array('1'=>'','abc'=>'')
     * @return boolean
     */
    public function HMSet($key, $value) {
        if (!is_array($value))
            return false;
        $redis = $this->Connect($key);
        $ret = $redis->hMSet($key, $value);
        $redis->close();
        return $ret;
    }

    /**
     * 
     * 返回哈希表key中，所有的域和值。
     * @param string $key
     */
    public function HGetAll($key) {
        $redis = $this->Connect($key);
        $ret = $redis->hGetAll($key);
        Registry::increment("redis_hgetall", 1);
        $redis->close();
        return $ret;
    }

    /**
     * 
     * 删除哈希表key中的一个或多个指定域，不存在的域将被忽略。
     * @param string $key
     */
    public function HDel($key, $fields) {
        $redis = $this->Connect($key);
        $ret = $redis->hDel($key, $fields);
        $redis->close();
        return $ret;
    }

    /**
     * 
     * 返回哈希表key中域的数量。
     * @param string $key
     */
    public function HLen($key) {
        $redis = $this->Connect($key);
        $ret = $redis->hLen($key);
        $redis->close();
        return $ret;
    }

    /**
     * 
     * 查看哈希表key中，给定域field是否存在。
     * @param string $key
     * @param string $filed
     */
    public function HExists($key, $filed) {
        $redis = $this->Connect($key);
        $ret = $redis->hExists($key, $filed);
        $redis->close();
        return $ret;
    }

    /**
     * 
     * 为哈希表key中的域field的值加上增量increment。
     * @param string $key
     * @param string $field
     * @param int $step
     */
    public function HIncrBy($key, $field, $step = 1) {
        $redis = $this->Connect($key);
        $ret = $redis->hIncrBy($key, $field, $step);
        $redis->close();
        return $ret;
    }

    /**
     * 
     * 返回哈希表key中的所有域。
     * @param string $key
     */
    public function Hkeys($key) {
        $redis = $this->Connect($key);
        $ret = $redis->hKeys($key);
        $redis->close();
        return $ret;
    }

    public function keys($key) {
        $redis = $this->Connect($key);
        $ret = $redis->keys($key);
        $redis->close();
        return $ret;
    }

    /**
     * 
     * 返回哈希表key中的所有值。
     * @param string $key
     */
    public function HVals($key) {
        $redis = $this->Connect($key);
        $ret = $redis->hVals($key);
        $redis->close();
        return $ret;
    }

    public function HScan($key, $cursor = null, $match = '', $limit = 50) {
        if (empty($key)) {
            return false;
        }
        $redis = $this->Connect($key);
        if (!$redis) {
            return false;
        }
        $data = array();
        while ($arr_keys = $redis->hscan($key, $cursor, $match, $limit)) {
            $data = array_merge($data, $arr_keys);
        }
        $redis->close();
        return $data;
    }

    public function ZAdd($key, $score, $val) {
        $redis = $this->Connect($key);
        $ret = $redis->zAdd($key, $score, $val);
        $redis->close();
        return $ret;
    }

    public function ZRange($key, $start, $stop) {
        $redis = $this->Connect($key);
        $ret = $redis->zrange($key, $start, $stop, 'true');
        $redis->close();
        return $ret;
    }

    public function ZRangeByScore($key, $start, $stop) {
        $redis = $this->Connect($key);
        $ret = $redis->zrangebyscore($key, $start, $stop, array('withscores' => TRUE));
        $redis->close();
        return $ret;
    }

    public function ZRevrank($key, $start, $stop) {
        $redis = $this->Connect($key);
        $ret = $redis->zrevrank($key, $start, $stop);
        $redis->close();
        return $ret;
    }

    public function ZCard($key) {
        $redis = $this->Connect($key);
        $ret = $redis->zcard($key);
        $redis->close();
        return $ret;
    }

    public function ZScore($key, $member) {
        $redis = $this->Connect($key);
        $ret = $redis->zScore($key, $member);
        $redis->close();
        return $ret;
    }

    public function ZRevrange($key, $start, $stop) {
        $redis = $this->Connect($key);
        $ret = $redis->zrevrange($key, $start, $stop, true);
        $redis->close();
        return $ret;
    }

    public function ZIncrby($key, $score, $member) {
        $redis = $this->Connect($key);
        $ret = $redis->zincrby($key, $score, $member);
        $redis->close();
        return $ret;
    }

    public function ZRem($key, $member) {
        $redis = $this->Connect($key);
        $ret = $redis->zrem($key, $member);
        $redis->close();
        return $ret;
    }

}
