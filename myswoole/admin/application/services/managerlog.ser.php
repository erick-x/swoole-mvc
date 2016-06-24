<?php
/* 
 * manager log 管理
 */

class ManagerLog_Service {
    
    /**
     * 
     * @param type $aWhere
     * @return type
     */
    public static function getManagerLog($aWhere = array(),$page=0,$pagesize=0) {
        $model = new ManagerLog_Model();
        $data = $model->getManagerLog($aWhere,$page,$pagesize);
        return $data;
    }
    
    /**
     * 获得管理员订单的总数量
     * @return type
     */
    public static function getTotal($aWhere = array()) {
        $model = new ManagerLog_Model();
        $total = $model->getTotal($aWhere);
        return $total;
    }

    public static function insertManagerLog($data,$type,$logParams) {
        empty($data['f_platform']) && $data['f_platform'] = Helper_Lib::getCookie('platform');
        empty($data['f_account']) && $data['f_account'] = $_SESSION['account'];
        (empty($data['f_addtime']) || false == strtotime($data['f_addtime'])) && $data['f_addtime'] = date("Y-m-d H:i:s", time());
        $data['f_desc'] = self::createLog($type, $logParams);
        $model = new ManagerLog_Model();
        $ret = $model->insert($data);
        return $ret;
    }
    
    /**
     * 生成log日志
     * 日志内容通过读取配置文件log.cfg.php获得
     * @param type $type 日志类型，通过type获得配置文件中的日志内容
     * @param type $logParams 日志内容需要的传参 eg:日志：XXX{$a}XXX{$b},$logParams = array('a'=>1,'b'=>2);
     * @return type
     */
    private static function createLog($type,$logParams) {
        $logTemplate = Config::get('log.template');
        $log = $logDesc = $logTemplate[$type];
        if($logDesc){
            $keys = array_keys($logParams);
            $search = array();
            if(!empty($keys)){
                foreach ($keys as $key) {
                    $search[] = '{$'.$key.'}';
                }
            }
            
            $log = str_replace($search, array_values($logParams), $logDesc);
        }
        $log = $type .' , '.$log;
        return $log;
    }
}

