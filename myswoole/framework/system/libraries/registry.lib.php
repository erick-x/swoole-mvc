<?php
/**
 * 注册表，存放全局变量，相当于hash表，在任何地方都可以存取值
 */
class Registry {
    private static $instance;

    /**
     * 设置tag值
     *
     * @param string $tag
     * @param mixed $value
     * @return none
     */
    public static function set($tag, $value) {
        $obj = self::getInstance();
        $obj->$tag = $value;
    }

    /**
     * 取值
     *
     * @param string $tag
     * @return mixed
     */
    public static function get($tag) {
        $obj = self::getInstance();
        if (isset ($obj->$tag)) {
            return $obj->$tag;
        }
    }
    
    public static function increment($tag,$value){
        $obj = self::getInstance();
        if(isset($obj->$tag)){
            $obj->$tag += $value;
        }else{
            $obj->$tag = $value;
        }
        return $obj->$tag;
    }

    /**
     * 取得 Registry静态实例
     * @return object $this
     */
    private static function getInstance() {
        if(!is_object(self::$instance))
            self::$instance = new Registry();

        return self::$instance ;
    }

    private function __construct() {

    }

    public function __set($tag, $value) {
        $this->$tag = $value;
    }

    public function __get($tag) {
        return $this->$tag;
    }
}
?>