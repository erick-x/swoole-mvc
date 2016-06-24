<?php

header("Content-Type:text/html;charset=utf-8");

/* 设置网站项目目录 */
define('PROJECT_ROOT', dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR);

/* 设置框架路径 */
define('FRAMEWORK_ROOT', dirname(dirname(dirname(__FILE__))) . DIRECTORY_SEPARATOR . 'framework' . DIRECTORY_SEPARATOR);

/* 默认控制器 */
define('DEFAULT_CONTROLLER', 'Index');

/* 最后载入框架，逻辑里尽量不要EXIT */
require FRAMEWORK_ROOT . '/runtime.php';

?>