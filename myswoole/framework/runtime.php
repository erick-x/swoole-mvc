<?php

/*
 * Framework 框架内核默认初始化文件
 *
 * 此文件内只定义, 包含一些基础类库, 同时对一些运行期间必要的设置进行检查（@周桂宏）
 * ============================================================================
 *
 */


/*
 * 定义一些常量, 部分常量可以或需要在此文件包含之前定义
 * ============================================================================
 */

/* 核心框架的位置, 默认为当前目录, 可以在外部先定义 */
defined('FRAMEWORK_ROOT') || define('FRAMEWORK_ROOT', dirname(__FILE__) . DIRECTORY_SEPARATOR);

/* 是否处于调试模式, 可在外部定义 */
defined('APPLICATION_TRACE_MODE') || define('APPLICATION_TRACE_MODE', true);

/* 是否处于后台脚本模式, 如果是后台脚本模式, 则不会自动包含 dispatcher */
defined('APPLICATION_CLI') || define('APPLICATION_CLI', false);

/* 当前应用的程序文件路径, 需要在包含此文件之前定义, 注意尾部不要有 DIRECTORY_SEPARATOR */
if (!defined('PROJECT_ROOT')) {
    trigger_error('undefined constant PROJECT_ROOT, please define this constant before load runtime.php', E_USER_ERROR);
}

/* application文件夹路径，可以在外部定义 */
defined('APPLICATION_FOLDER') || define('APPLICATION_FOLDER', PROJECT_ROOT . 'application' . DIRECTORY_SEPARATOR);

/* 定义日志目录，可以在外部定义 */
defined('LOG_PATH') || define('LOG_PATH', PROJECT_ROOT . 'logs' . DIRECTORY_SEPARATOR);

/* 默认控制器 */
defined('DEFAULT_CONTROLLER') || define('DEFAULT_CONTROLLER', 'Index');

/* 默认方法 */
defined('DEFAULT_ACTION') || define('DEFAULT_ACTION', 'index');

/* 检测是否需要开启__autoload功能，默认为开启 */
defined('OPEN_AUTOLOAD') || define('OPEN_AUTOLOAD', true);

date_default_timezone_set("Asia/Shanghai");

/*
 * 载入基本模块
 * ============================================================================
 *
 */

/* 如果没有开启autoload 则手工加载 */
// if (!OPEN_AUTOLOAD) {
//    load_library('sys:controller');
//    load_library('sys:model');
//    load_library('sys:registry');
//    load_library('sys:database');
//    load_library('sys:config');
//    load_library('sys:event');
//    load_library('sys:debug');
//	load_library('sys:pb');
//}


 /* DB环境模块 */
load_config("pub:setdb");


if (APPLICATION_TRACE_MODE) {
    set_error_handler('__system_catch_exception');
    ini_set("error_log", LOG_PATH . 'phperror_' . date('Y-m-d') . '.txt');
}

load_library('sys:framework');
$framework = new FrameWork();
$framework->run_driver();
/* 用于后台脚本, 不载入 dispatcher 模块 */
if (APPLICATION_CLI ===false) {
    $framework->run();   
}
/*
 * 主框架的一些基本函数
 * ============================================================================
 *
 */


/*
 * 装载文件
 *
 * 负责system, public, application 的文件加载
 * 文件分隔标识符为冒号, 如 sys:debug 则会载入 core/system/debug.php 文件
 *
 * @param string $file			文件名, 可以包含tag标识，例如：pub:frame
 * @param string $subfolder		子目录
 * @param bool	 $return_file_fullpath	为true时，不加载文件，直接返回文件真实路径
 * @return mixed
 */

function __load_core($file, $sub_folder, $return_file_fullpath = false) {
    
    if (false !== ($pos = strpos($file, ':'))) {
        $path = substr($file, 0, $pos);
        $file = substr($file, $pos + 1);
        switch ($path) {
            case 'sys': $path = FRAMEWORK_ROOT . 'system' . DIRECTORY_SEPARATOR;
                break;
            case 'pub': $path = FRAMEWORK_ROOT . 'public' . DIRECTORY_SEPARATOR;
                break;
            default: $path = APPLICATION_FOLDER;
                break;
        }
    }  else {
        $path = APPLICATION_FOLDER;
    }
    
    $filepath = $path . $sub_folder . DIRECTORY_SEPARATOR . $file . '.php';
    if (strpos('//', $filepath)) {
        $filepath = str_replace('//', '/', $filepath);
    }
    if (!file_exists($filepath)) {
        if (!$return_file_fullpath) {
            trigger_error('file not found: ' . $filepath, E_USER_ERROR);
        }
        return false;
    }

    if ($return_file_fullpath) {
        return $filepath;
    }

    require_once $filepath;
    return true;
}

/*
 * 视图加载函数
 *
 * @param string $filename	视图文件名
 * @param mixed  $passed_data_array		导入视图的数据
 * @param bool   $output	是否直接输出, 为true时直接输出, 否则返回内容
 * @return mixed
 *
 */

function load_view($filename, $passed_data_array = null, $output = true, $layout = 'default') {
    if ($passed_data_array)
    {
        /* 数组, 对象, 直接 export 出来, export 后为local variable */
        if (is_array($passed_data_array)) {

            foreach ($passed_data_array as $k => $v) {
                if (!isset($$k))
                    $$k = $v;
            }
        } else if (is_object($passed_data_array)) {

            $passed_data_array = get_object_vars($passed_data_array);
        } else {

            trigger_error(__FUNCTION__ . ': unsupported variable type of data', E_USER_ERROR);
        }
    }

    ob_start();
    if (false !== ($pos = strpos($filename, ':'))) {
        $view_path = 'view';
    } else {
        $view_path = 'templates' . DIRECTORY_SEPARATOR . $layout;
    }
    if ($filename = __load_core(strtolower($filename) . '.view', $view_path, true)) {
        require $filename;
    }
    $buffer = ob_get_clean();

    if ($output) {
        echo $buffer;
    } else {
        return $buffer;
    }
}

/*
 * 基础库加载函数
 *
 * @param string $filename	文件名
 * @return true / false
 *
 */

function load_library($filename, $which = true) {
    return __load_core(strtolower($filename) . '.lib', 'libraries');
}

/*
 *  框架公共库加载函数
 *
 * @param string $filename	文件名
 * @param string $which		为true时加载plib的写法,false加载别的文件, 如framework/public/libraries/下文件
 * @return true / false
 *
 */
function load_pub_library($filename,$which=true,$return_url = false){
	$filename = strtolower($filename);
	$filename = $which?($filename.'.plib'):($filename);
    return __load_core('pub:'.$filename, 'libraries',$return_url);
}

/*
 * 控制器加载函数
 *
 * @param string $filename	文件名
 * @param string $subdirectory 子目录，二级目录
 * @return true / false
 *
 */

function load_controller($filename,$subdirectory=false) {
    $dir = "controllers";
    !empty($subdirectory) && $dir.='/'.$subdirectory;
    
    return __load_core(strtolower($filename) . '.ctl', $dir);
}

/*
 * 配置加载config文件
 *
 * @param string $filename  文件名
 * @return true / false
 *
 */

function load_config($filename, $return_url = false,$dir=false) {
    $dir || $dir = 'config';
    return __load_core(strtolower($filename) . '.cfg', $dir, $return_url);
}

/**
 * 	配置加载config文件，并获取其中的变量
 *  此函数通常用于在函数内加载配置文件，并能立即在函数中使用
 *  配置文件格式如下：
 *  return array(
 * 	'1'=>'xxx',
 * 	'2'=>'bbbb'
 * 	)
 */
function load_config_return($filename) {
    return include(__load_core(strtolower($filename) . '.cfg', 'config', true));
}

/**
 * 助手加载函数
 *
 * @param string $filename  文件名
 * @return true / false
 *
 */
function load_helper($filename) {
    return __load_core(strtolower($filename) . '.hlp', 'helper');
}

/**
 * 业务模型加载函数
 * load_model('user') 即加载application/models/user.mod.php
 *
 *
 * @param string $filename  文件名
 * @return true / false
 *
 */
function load_model($filename) {

    if (__load_core(strtolower($filename) . '.mod', 'models')) {

        if (false === ($pos = strrpos($filename, '/'))) {
            $model_name = $filename;
        } else {
            $model_name = substr($filename, $pos + 1, 100);
        }

        $class_name = $model_name . '_Model';
        if (!class_exists($class_name, false)) {
            trigger_error($class_name . '  undefined class: ' . $class_name, E_USER_ERROR);
            return false;
        }

        return true;
    }

    return false;
}

/**
 * 加载业务逻辑层
 * load_service('user') 即加载application/services/user.ser.php
 */
function load_service($filename) {

    if (__load_core(strtolower($filename) . '.ser', 'services')) {

        if (false === ($pos = strrpos($filename, '/'))) {
            $model_name = $filename;
        } else {
            $model_name = substr($filename, $pos + 1, 100);
        }

        $class_name = $model_name . '_Service';
        if (!class_exists($class_name, false)) {
            trigger_error($class_name . '  undefined class: ' . $class_name, E_USER_ERROR);
            return false;
        }

        return true;
    }

    return false;
}

/**
 * 加载由rsync同步的文件，一般用于后台
 *
 */
function load_syncfile($filename) {
    return __load_core($filename, 'syncfile');
}

/**
 * 扩展加载函数
 *
 * @param string $filename 文件名
 * @return true/false
 *
 */
function load_extend($filename) {
    //return __load_core($filename . '.ext', 'extend');
	return __load_core($filename , 'extends');
}

/**
 * 扩展加载函数
 *
 * @param string $filename 文件名
 * @return true/false
 *
 */
function load_event($filename) {
    return __load_core($filename, 'events');
}

function load_platform($filename) {
    return __load_core($filename . '.pf', 'platform');
}

/**
 * 加载app下面的其他目录文件
 * load_appfile('sdk','appinclude');
 */
function load_appfile($dir, $filename, $return_url = false) {
    return __load_core($filename, $dir, $return_url);
}

function M($name='') {
    static $_model  = array();
    if(strpos($name,':')) {
        list($class,$name)    =  explode(':',$name);
    }else{
        $class      =  $name;
    }
    
    if (!isset($_model[$class]))
        $_model[$class] = new $class();
    return $_model[$class];
}

/*
 * 捕捉错误
 *
 */

function __system_catch_exception($errno, $errstr, $errfile, $errline) {
    if (E_NOTICE == $errno)
        return;

    $err = "[$errno] $errstr<br /> $errline in file $errfile \n <br />";
    if (APPLICATION_TRACE_MODE) {
        __log_message($err);
    }
    return true;
}

/**
 * 打印日志
 * $dir 目录默认为空 'payment/pay' 即payment下的pay_201206.txt
 *
 */
function __log_message($message, $dir = '') {
    $filename = !empty($dir) ? (LOG_PATH . $dir . '_' . date('Y-m-d') . '.txt') : (LOG_PATH . 'common' . '_' . date('Y-m-d') . '.txt');
    $file = @fopen($filename, 'ab');
    if (is_array($message)) {
        @fwrite($file, date('Y-m-d H:i:s') . print_r($message, true) . " \n");
    } else {
        @fwrite($file, date('Y-m-d H:i:s') . " {$message} \n");
    }
    @fclose($file);
    return true;
}

//异常终止
function __dispatch_exit($msg) {
    echo $msg;
     trigger_error($msg, E_USER_ERROR);
    exit;
}

function __error404() {
    if (file_exists($_SERVER['DOCUMENT_ROOT'] . '/404.php')) {
       header("location:{$_SERVER['DOCUMENT_ROOT']}/404.php");
    } else {
        header('HTTP/1.0 404 Not Found');
    }
    exit;
}

?>
