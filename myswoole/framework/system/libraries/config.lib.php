<?php

class Config {

    private static $instance;
    private static $class_ret;

    public function __construct() {
        
    }

    /**
     * get config value
     *
     * @param string $cfgtype: config type, value: local, remote
     * @param string $tag
     * @return mixed
     */
    public static function get($tag, $pub = false) {
        $obj = self::getInstance();
        if (!isset($obj->$tag)) {
            if ($pub) {
                $url = load_config('pub:' . substr($tag, 0, strpos($tag, '.')), true);
            } else {
                if(strpos($tag, '.')!==false){
                    $url = load_config(substr($tag, 0, strpos($tag, '.')), true);
                }else{
                    $url = load_config($tag, true);
                }
            }
            $url = trim($url);
            if (empty($url))
                return false;
            include_once($url);
            if (is_array($config) && count($config) > 0) {
                foreach ($config as $configname => $configvalue) {
                    $obj->$configname = $configvalue;
                }
            }
        }

        return $obj->$tag;
    }
    
    /**
     * Beta版
     */
     public static function get2($tag,$dir='config', $pub = false) {
        $obj = self::getInstance();
        if (!isset($obj->$tag)) {
            if ($pub) {
                $url = load_config('pub:' . substr($tag, 0, strpos($tag, '.')), true);
            } else {
                if(strpos($tag, '.')!==false){
                    $url = load_config(substr($tag, 0, strpos($tag, '.')), true,$dir);
                }else{
                    $url = load_config($tag, true,$dir);
                }
            }
            $url = trim($url);
            if (empty($url))
                return false;
            include($url);
            if(isset($config[$tag])){
                $obj->$tag = $config[$tag];
            }
           
        }
            return $obj->$tag;
        
    }

    private static function getInstance() {
        if (!is_object(self::$instance)) {
            self::$instance = new Config();
        }

        return self::$instance;
    }

    /**
     * Overloading function, can't call direct
     */
    public function __set($tag, $value) {
        $this->$tag = $value;
    }

    public function __get($tag) {
        return $this->$tag;
    }

    public static function call_config_func($className, $method, $params) {
        if (empty($className) || !$method)
            return false;

        //$cfg = eval("$className")::$method($params);
        $cfg = M($className)->$method($params);
        if (!is_array($cfg)) {
            return false;
        }
        return $cfg;
    }

}

?>
