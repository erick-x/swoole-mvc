<?php

/**
 * 
 */
class Module_Lib extends Controller {

    public function __construct() {
        parent::__construct();
        if ( !$this->checkPermission() ) {
            if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest') {
                //ajax请求
                $this->outputJson(-1000, '对不起，您没有此权限，请联系管理员开通权限！');
            } else {
                header("Location:/index/error");
                
            }
            exit();
        }
        $argvs = parse_url($_SERVER['REQUEST_URI']);
        $menu = Menu_Service::getMenusByCA($_GET['c'], $_GET['a'],$argvs['query']);
        $postion = !empty($menu['t_postion']) ? intval($menu['t_postion']) : 0;
        Helper_Lib::setCookie('postion',$postion);
    }

    /**
     * 返回检查结果
     * @param type $url 需要检查的权限
     * @return boolean
     */
    public function checkPermission($url = '') {
        if (empty($url)) {
            //白名单链接，所有人都可以通过
            $c = !empty($_GET['c']) ? strtolower($_GET['c']) : 'index';
            $a = !empty($_GET['a']) ? strtolower($_GET['a']) : 'index';
            $argvs = parse_url($_SERVER['REQUEST_URI']);
            $argv = $argvs['query'];
        } else {
            list($_url,$argv) = explode('?', $url);
            list($c, $a) = explode('/', $_url);
        }
        
        $c = strtolower($c);
        $a = strtolower($a);
        if (in_array($c . '/' . $a, $this->getWhitelist())) {
            return true;
        }
        //管理员 拥有所有权限
        if (!empty($_SESSION['isAdmin'])) {
            return true;
            }
        //用户权限
        if (!User_Service::checkLogin() || empty($_SESSION['udata'])) {
            return false;
        }
        $permission = $_SESSION['udata']['permission'];
        $argvlist = explode("&", $argv);
        foreach ($permission as $menu) {

            if (strtolower($menu['t_controller']) == $c && strtolower($menu['t_method']) == $a) { 
                if(!$argvlist[0] || !$menu['t_argv'] || $menu['t_argv'] == $argvlist[0]){
                    return true;
                }
            }
        }
        return false;
    }

    private function getWhitelist() {
        return array('index/index','index/socketerror', 'index/error', 'user/login', 'user/userlogin', 'user/register', 'user/userregister', 'user/loginout');
    }


    
}
