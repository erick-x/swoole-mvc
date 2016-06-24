<?php

/**
 * Description of exception
 *
 * @author Marco
 */
final class Exception_Lib extends Exception {

    private $_msg = array(
        1000 => '未设置必要的值',
        1001 => '不存在该数据',
        1002 => '操作失败'
        
    );

    public function __construct($code = 0, $append_msg = '') {
        //$_msg = array_merge($this->_msg, $this->_msg_cmc, $this->_msg_hua);
        $_msg = $this->_msg;
        //$msg = $this->_msg[$code] . $append_msg;
        $msg = $_msg[$code] . $append_msg;
        //MTstat_Lib::statLogMsg($code, $msg);
        parent::__construct($msg, $code);
    }

}
