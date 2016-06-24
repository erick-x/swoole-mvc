<?php

/**
 * 框架装载器
 *
 */
final class FrameWork {

    private $controllername = '';
    private $methodname = '';
    private $argumentarray = array();
	private $controllerDir='';

    /* static public function &instance() {
      static $obj;
      if (!is_object($obj)) {
      $obj = new FrameWork();
      }
      return $obj;
      }
     */

    public function __construct() {
        
    }

    private function dispatch() {
        $class = ucfirst($this->controllername) . '_Controller';
        if (OPEN_AUTOLOAD === false) {
            load_controller($this->controllername,'controllers/'.$this->controllerDir);
            if (!class_exists($class, false))
                throw new NotFoundException(0, "{$class};控制器类不存在");
        }

        $obj = new $class;
        if (!is_object($obj))
            throw new NotFoundException(0, "控制器类初始化失败");

        if (method_exists($obj, $this->methodname)) {
            $res = call_user_func(array($obj, $this->methodname));
            if ($res === false) {
                throw new NotFoundException(0, "{$this->methodname};控制器方法调用失败");
            }
        } else {
            $this->methodname = DEFAULT_ACTION;
            if (method_exists($obj, $this->methodname)) {
                $res = call_user_func(array($obj, $this->methodname));
                if ($res === false) {
                    throw new NotFoundException(0, "{$this->methodname};控制器方法调用失败");
                }
            }
            throw new NotFoundException(0, "{$this->methodname};控制器方法不存在");
        }
    }

    private function autoload($class) {
        if (class_exists($class, false))
            return;

        if ($class) {
            $name = strtolower(substr($class, 0, 2));
            if ($name == 'pb') {
                $res = load_extend("pb_proto_" . $class);
                if ($res === false) {
                    throw new NotFoundException(0, "autoload加载的pb: {$class} 不存在");
                }
                return;
            }
        }

        if ($pos = strrpos($class, '_')) {
            
            $name = strtolower(substr($class, 0, $pos));
            $case = strtolower(substr($class, $pos + 1));

            switch ($case) {
                case 'controller':
                    $res = load_controller($name,$this->controllerDir);
                    if ($res === false) {
                        throw new NotFoundException(0, "autoload加载的控制器 {$name} 不存在");
                    }
                    break;
                case 'event':
                    $res = load_event($name);
                    break;
                case 'lib':
                    $res = load_library($name);
                    break;
                case 'model' :
                    $res = load_model($name);
                    break;
                case 'config':
                    $res = load_config($name);
                    break;
                case 'service':
                    $res = load_service($name);
                    break;
                case 'plib':
                    $res = load_pub_library($name);
                    break;
                case 'platform':
                    $res = load_platform($name);
                    break;
                default :
                    $res = load_library("sys:" . strtolower($class));
                    $case = $class;
                    break;
            }
        } else {
            $res = load_library("sys:" . strtolower($class));
            $case = $class;
        }
        if ($res === false) {
            throw new NotFoundException(1, "autoload加载的{$case}不存在【{$name}】");
        }
    }

    public function run($argumentarray = array()) {

		$_getC=isset($_GET['c']) ? trim($_GET['c']) : '';
		if (false !==($pos = strrpos($_getC, '-'))) {
				list($this->controllerDir, $this->controllername) = explode("-",$_getC);
		}else{
				$this->controllername = $_getC;
		}
		
        
        $this->methodname = isset($_GET['a']) ? trim($_GET['a']) : '';
        $this->argumentarray = $argumentarray;

        try {
            if ('' == $this->controllername) {
                if (defined('DEFAULT_CONTROLLER')) {
                    $this->controllername = DEFAULT_CONTROLLER;
                    $_GET['c'] = DEFAULT_CONTROLLER;
                } else {
                    throw new NotFoundException(1, '未指定默认的控制器，请在入口文件中配置.');
                }
            } else {
                if (false === mb_eregi('^[a-z0-9_-]+$', $this->controllername)) {
                    throw new NotFoundException(0, '传入一个非法的控制器名.');
                }
                //$this->controllername = str_replace(array('-'), array('/'), $this->controllername);
            }

            if (empty($this->methodname)) {
                if (defined('DEFAULT_ACTION'))
                    $this->methodname = DEFAULT_ACTION;
                $_GET['a'] = DEFAULT_CONTROLLER;
            } else {
                if (false === mb_eregi('^[a-z0-9_]+$', $this->methodname))
                    throw new NotFoundException(0, '传入一个非法的动作名.'.$this->methodname);

                if ($this->methodname{0} == '_')
                    throw new NotFoundException(0, '方法首字母不能为下划线.');
            }

            $this->controllername = addslashes($this->controllername);
            $this->methodname = addslashes($this->methodname);

            $this->dispatch();
        } catch (NotFoundException $e) {

            switch ($e->getCode()) {
                case 0:
                    __error404();
                    break;
                case 1:
                    __dispatch_exit($e->getMessage());
                    break;
            }
        }
    }

    public function run_driver() {
        if (OPEN_AUTOLOAD === true) {
            $res = spl_autoload_register(array($this, 'autoload'));
            if ($res === false)
                throw new NotFoundException(1, 'Autoload开启失败');
        }
    }

}

?>
