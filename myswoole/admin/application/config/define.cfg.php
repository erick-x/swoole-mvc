<?php

//所有define 都放在这个文件
//当前平台
define('DEFAULT_PASS','123456'); //默认密码

if (defined('SETDB') && 0 === SETDB) {
    define('PROTOBUF_DEBUG', 'debug');
} else {
    define('PROTOBUF_DEBUG', '');
}
