<?php

/*
 * 平台信息统计
 */

class RegRate_Controller extends Module_Lib {
    
    /**
     * 展示统计信息
     */
    public function DataShow() {
                
        $beginTime = empty($_GET['beginTime'])?"": $_GET['beginTime'];
        $endTime = empty($_GET['endTime'])?"": $_GET['endTime'];
        $iplatform = Helper_Lib::getCookie("zoneid");
       $stServer =  Platform_Model::getPlatformByID($iplatform);  //暂时平台id为设置
       if(empty($stServer))
       {
          echo '<script>alert("没有服务器选择！");</script>';
          header("Location:/gameuser/loadserverinfo");
          exit();
          
       }
        $RegDataResult = RegRate_Service::getDataByTime($stServer,$beginTime,$endTime );
        $data = array();
        $i = 0;
        if(!empty($RegDataResult))
        {
            foreach ($RegDataResult as $result) {
                $addphone = $result['tr_addphone'];
                $addaccount = $result['tr_addaccount'];
                $addrole = $result['tr_addrole'];
                $listrole = $result['tr_listrole'];
                $data[$i++] = array(
                'datetime'=>$result['tr_datetime'],
                'addphone'=>$addphone,
                'addaccount'=>$addaccount,
                'addaccountrate'=>number_format($addphone/$addphone, 4)*100,
                'reduceaccount'=>($addaccount - $listrole),
                'reducerate'=>number_format(($addaccount - $listrole)/$addaccount, 4)*100,
                'reducerole'=>($listrole - $addrole),
                'reducerolerate'=>number_format(($listrole - $addrole)/$addaccount, 4)*100,
                'regfailrate'=>number_format(($addaccount - $addrole)/$addaccount, 4)*100,
            );
            }  
        }
        $this->load_view('reg_rate',array('data'=>$data));
    }
   
    
}
