<?php

/**
 * memcached
 *
 */
class MC {

    private static $connectionarray = array();

    private static function getconnect($mcsetting) {
        if (!self::$connectionarray[$mcsetting]) {
            $mcservers = Config::get($mcsetting);
            $memcache = new Memcache();
            if (is_array($mcservers) && count($mcservers) > 0)
                foreach ($mcservers as $mcserver) {
                    $memcache->addServer($mcserver['host'], $mcserver['port'], FALSE);
                }
            self::$connectionarray[$mcsetting] = &$memcache;
        }
        return self::$connectionarray[$mcsetting];
    }

    public static function close($mcsetting = 'local.memcache') {
        $obj = self::getconnect($mcsetting);
        if ($obj) {
            $obj->close();
        }
    }

    /**
     * memcache
     *
     * @param string $key
     * @param mixed $value
     * @return bool
     */
    public static function set($key, $value, $expire = 0, $mcsetting = 'local.memcache') {
        $obj = self::getconnect($mcsetting);
        if ($obj and is_string($key)) {

            $result = $obj->replace($key, $value, false, $expire);
            if (!$result) {
                $result = $obj->set($key, $value, false, $expire);
            }
            return $result;
        }

        return false;
    }

    public static function get($key, $mcsetting = 'local.memcache') {
        $obj = self::getconnect($mcsetting);
        if ($obj and is_string($key)) {
            $result = $obj->get($key);
            return $result;
        }
        return false;
    }

    /**
     * memcache
     *
     * @param string $key
     * @return bool
     */
    public static function delete($key, $mcsetting = 'local.memcache') {
        $obj = self::getconnect($mcsetting);
        if ($obj and $key) {
            return $obj->delete($key);
        }
        return false;
    }

    /**
     * memcache increment a value
     * if key not exist, set the value
     *
     * @param string $key
     * @return bool
     */
    public static function increment($key, $start, $expire = 1728000, $mcsetting = 'local.memcache') {
        $obj = self::getconnect($mcsetting);
        if ($obj and is_string($key)) {
            if (empty($start)) {
                $start = 1;
            }
            $result = $obj->increment($key, $start);
            if ($result === false) {
                $result = $obj->set($key, $start, false, $expire);
            }
            return $result;
        }
    }

    /**
     * memcache decrement a value
     * if key not exist, set the value
     *
     * @param string $key
     * @return bool
     */
    public static function decrement($key, $start, $expire, $mcsetting = 'local.memcache') {
        $obj = self::getconnect($mcsetting);
        if ($obj and is_string($key)) {
            $result = $obj->decrement($key);
            if ($result === false) {
                $result = $obj->set($key, $start, false, $expire);
            }
            return $result;
        }
    }

    /**
     * Acquire a semaphore
     *
     * @param string $key
     * @return bool
     */
    public static function lock($key, $expire = 10, $mcsetting = 'local.memcache') {
        $obj = self::getconnect($mcsetting);
        return $obj->add($key, 0, false, $expire);
    }

    /**
     * Release a semaphore
     *
     * @param string $key
     * @return bool
     */
    public static function unlock($key, $mcsetting = 'local.memcache') {
        $obj = self::getconnect($mcsetting);
        return $obj->delete($key);
    }

    public static function getStats($mcsetting = 'local.memcache') {
        $obj = self::getconnect($mcsetting);
        return $obj->getStats();
    }

}

?>
