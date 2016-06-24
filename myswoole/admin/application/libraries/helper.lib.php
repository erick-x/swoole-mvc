<?php

/**
 * Description of helper
 *
 * @author Marco
 */
class Helper_Lib {

    public static function getPostData() {
        //$postdata = file_get_contents("php://input");
        if (!$postdata) {
            $postdata = $GLOBALS['HTTP_RAW_POST_DATA'];
        }
        if (!$postdata) {
            $arr = array_values($_POST);
            $postdata = $arr[0];
        }
        return $postdata;
    }

    /**
     * 
     * @return 32位字符串
     */
    public static function createUUID() {

        time_nanosleep(0, 1000);

        list($msec) = explode(" ", microtime());

        $timetick = date("ymdHis") . trim($msec, '0.');
        $timelen = strlen($timetick);
        if ($timelen < 1) {
            throw new Exception_Lib(15);
            return false;
        }

        $timelen < 20 && $timetick = str_pad($timetick, 20, 0);

        $baseid = mt_rand(0, 99999);
        
        strlen((string) $baseid) < 5 && $baseid = str_pad((string) $baseid, 5, 0, STR_PAD_LEFT);

        $ret = (string) $timetick . $baseid;

        return $ret;
    }
    
    /**
     * 
     * @param type $sid     区服id
     * @param type $platform 平台
     * @return 32位字符串
     */
    public static function createUUID2($sid=0, $platform = 0) {
        $sid || $sid = Registry::get('sid');
        $platform || $platform = Registry::get("platform");
            
        if (empty($sid)) {
            return false;
        }

        time_nanosleep(0, 1000);

        list($msec) = explode(" ", microtime());
        
        $timetick = date("ymdHis").trim($msec,'0.');
        $timelen = strlen($timetick);
        if ($timelen < 1) {
            throw new Exception_Lib(15);
            return false;
        }

        $timelen < 20 && $timetick = str_pad($timetick, 20, 0);

        if ($platform < 999) {
            strlen((string) $platform) < 3 && $platform = str_pad((string) $platform, 3, 0, STR_PAD_LEFT);
        } else {
            $platform = '999';
        }

        if ($sid < 9999) {
            strlen((string) $sid) < 4 && $sid = str_pad((string) $sid, 4, 0, STR_PAD_LEFT);
        } else {
            $sid = '99999';
        }
        
        $baseid = mt_rand(0, 99999);
        
        strlen((string) $baseid) < 5 && $baseid = str_pad((string) $baseid, 5, 0, STR_PAD_LEFT);

        $ret = (string) $timetick . $platform . $sid . $baseid;
        
        return $ret;
    }
    
    /**
     * 对密码进行加密
     * @param type $pass 需要加密的密码
     * @return type string 加密之后的密码
     */
    public static function encodePass($pass) {
        return md5(xxtea_lib::encode($pass, true));
    }


    /**
     * 格式化数据
     * @param type $data 需要格式化的数据
     * @param type $key  格式化中作为key的字段名
     * @return boolean 返回格式化后的数据
     */
    public static function formatData($data, $key) {
        $result = array();
        if (!empty($data) && is_array($data)) {
            foreach ($data as $v) {
                if (empty($v[$key])) {
                    __log_message(json_encode($data) . "中不存在key值{$key}", 'common');
                    return false;
                }

                $result[$v[$key]] = $v;
            }
        }
        return $result;
    }

    /**
     * 分页
     * @param type $total
     * @param type $page
     * @param type $pagesize
     * @param type $url
     * @return string
     */
    public static function getPageHtml($total, $page = 1, $pagesize = 10, $url = '') {
        if ($total == 0) {
            return '';
        }
        if (empty($url)) {
            $url = $_SERVER['REQUEST_URI'];
        }
        $url = rtrim( preg_replace(array("/(&)p=(\d+)(&{0,1})/", "/(\?)p=(\d+)(&{0,1})/"), array('${3}', '${1}'), $url), '?');
        $url .= strpos( rtrim($url, '?'), '?') > -1 ? '&p=' : '?p=';
        
        $pagehtml = '<div class="pagination alternate"><ul>';
        $pagehtml .='<li><a href="'. $url. '1 ">首页</a></li>';
        $totalpage = ceil($total / $pagesize);
        
        if ($page == 1) {
            if($totalpage >5)
            $pagehtml .= '<li class="disabled"><a href="#">没啦！</a></li>';
        }else{
            $pagehtml .= '<li><a href="' . $url . ($page - 1) . '">上一页</a></li>';
        } 
        
        for ($i = $page; $i < ($page + 6); $i++) {
            
            $class = '';
            if ($page == $i) {
                $class = ' class="active"';
            }
            
            $pagehtml .= '<li' . $class . '><a href="' . $url . $i . '">' . $i . '</a></li>';
            if($i == $totalpage)
            {
                break;
            }
        }
        if ($page == $totalpage) {
            $pagehtml .= '<li class="disabled"><a href="#">尾页</a></li>';
        } else {
            $pagehtml .= '<li><a href="' . $url . ($page + 1) . '">下一页</a></li>';
        }
        
        $pagehtml .='<li><a href="'. $url  .$totalpage. '">共'.$totalpage.'页</a></li>';
        $pagehtml .= '</ul></div>';
        return $pagehtml;
    }

    /**
     * 分页
     * @param type $total
     * @param type $page
     * @param type $pagesize
     * @param type $url
     * @return string
     */
    public static function getPageHtml2($total, $page = 1, $pagesize = 10) {

        $pagehtml = '<div class="pagination alternate"><ul>';
        $totalpage = ceil($total / $pagesize);

        if ($page == 1) {
            $pagehtml .= '<li class="disabled"><a href="javascript:;">&laquo;</a></li>';
        } else {
            $pagehtml .= '<li data-page="' . ($page - 1) . '"><a href="javascript:;">&laquo;</a></li>';
        }
        for ($i = 1; $i < $totalpage + 1; $i++) {
            $class = '';
            if ($page == $i) {
                $class = ' class="active"';
            }
            $pagehtml .= '<li' . $class . ' data-page="' . $i . '"><a href="javascript:;">' . $i . '</a></li>';
        }
        if ($page == $pagesize) {
            $pagehtml .= '<li class="disabled"><a href="javascript:;">&raquo;</a></li>';
        } else {
            $pagehtml .= '<li data-page="' . ($page + 1) . '"><a href="javascript:;">&raquo;</a></li>';
        }
        $pagehtml .= '</ul></div>';
        return $pagehtml;
    }

    /**
     * 设置cookie
     * @param type $name        cookie名
     * @param type $value       cookie值
     * @param type $expire      过期时间
     * @param type $path        cookie路径
     * @param type $domain      cookie域名
     */
    public static function setCookie($name, $value, $expire = 0, $path = '/', $domain = '') {
        $expire = time() + 3600 * 24;
        setcookie($name, $value, $expire, $path, $domain, false);
        $_COOKIE[$name] = $value;
    }

    /**
     * 获得cookie
     * @param type $name
     * @return type
     */
    public static function getCookie($name) {
        $value = isset($_COOKIE[$name]) ? $_COOKIE[$name] : '';
        return $value;
    }

    public static function delCookie($name) {
        setcookie($name, "", time() - 3600);
    }

    /**
     * 注册区服ID和平台ID
     * @param type $platform 平台ID
     * @param type $sid      区服ID
     * @return boolean
     */
    public static function registyPtSid($platform, $sid) {
        if (empty($platform) || empty($sid)) {
            throw new Exception_Lib(-1,'平台或者区服为空!');
            return false;
        }
        $aPlatform = Platform_Model::getPlatformByID($platform); 
        if (!isset($aPlatform)) {
            throw new Exception_Lib(-2,'平台异常!');
            return false;
        }
        $aServer = Server_Service::getServerByPtAndId($platform,$sid,$aPlatform);
        if (empty($aServer)) {
            throw new Exception_Lib(-2,'区服异常!');
            return false;
        }

        Registry::set('platformid', $platform);
        Registry::set('sid', $sid);

        return true;
    }

    /**
     * 获得post值
     * @param type $name 参数名称
     * @param type $type 参数类型
     * @param type $default 参数默认值
     * @param type $return 是否返回，还是抛异常
     * @return int|string
     * @throws Exception_Lib
     */
    public static function getPost($name, $type = 'string', $default = '', $return = true) {
        if (empty($_POST[$name])) {
            if ($return) {
                switch ($type) {
                    case 'string':
                        return $default ? $default : '';
                    case 'int':
                        return $default ? $default : 0;
                    case 'array':
                        return $default ? $default : array();
                    case 'date':
                        return $default ? $default : date('Y-m-d H:i:s', time());
                    default:
                        return '';
                }
            }
            throw new Exception_Lib(-1, $name . '不能为空！');
        }
        return $_POST[$name];
    }

    /**
     * 获得get值
     * @param type $name 参数名称
     * @param type $type 参数类型
     * @param type $default 参数默认值
     * @param type $return 是否返回，还是抛异常
     * @return int|string
     * @throws Exception_Lib
     */
    public static function getGet($name, $type = 'string', $default = '', $return = true) {
        if (empty($_GET[$name])) {
            if ($return) {
                switch ($type) {
                    case 'string':
                        return $default ? $default : '';
                    case 'int':
                        return $default ? $default : 0;
                    case 'array':
                        return $default ? $default : array();
                    case 'date':
                        return $default ? $default : date('Y-m-d H:i:s', time());
                    default:
                        return '';
                }
            }
            throw new Exception_Lib(-1, $name . '不能为空！');
        }
        return $_GET[$name];
    }
    
    public static function getDbCfg($sid,$platform){
        if(empty($sid) || empty($platform))
            return false;
        
        $tag = "dbserver.{$platform}";
        $ret = Config::get($tag);
        if(!is_array($ret) || count($ret)<1)
            return false;
        
        return $ret[$sid];
    }

    public static function checkFilename($pathname) {
        
        $ext = pathinfo($pathname, PATHINFO_EXTENSION|PATHINFO_FILENAME); 
        
        if(trim($ext) != "xls" && trim($ext)  != "xlsx")
        {
            return false;
        }
        return true;
    }
}
