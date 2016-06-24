<?php

/**
 * 模型基类
 * 
 */
class Model {
    public function __construct() {
        ;
    }
    
     public function _checkField($data) {
        if (!is_array($data) || count($data) < 1)
            return false;

        $aField = explode(",", $this->FIELDS);
        $aKey = array_keys($data);
        foreach ($aKey as $key) {
            if (!in_array($key, $aField)) {
                return false;
            }
        }

        return true;
    }
}

?>