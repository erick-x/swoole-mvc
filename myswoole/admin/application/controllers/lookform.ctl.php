<?php

class LookForm_Controller extends Module_Lib{
    public function show(){
        $arrPlatform = LookForm_Service::getPlatform();  
        $data = array(
            'platform'=>$arrPlatform,
            'data'=>LookForm_Service::getData(),
            'backorder' => $this->checkPermission('lookform/backorder'),
            'getServer' => $this->checkPermission('lookform/getServer'),
            'getData' => $this->checkPermission('lookform/getData'),
            
        );
        $this->load_view("lookform",$data);
        
    }
    
    public function backorder() {
       
       $server = LookForm_Service::getOneServer($_POST['platformid'],$_POST['sid']);
      
       $data = array(
           'order_state'=>1
       );
       $ret = LookForm_Service::update($data, $_POST['orderid'],$_POST['sid'],$server);
       if($ret)
       {
            LookForm_Service::delete();
            
            $server =  LookForm_Service::getOneServer($_POST['platformid'],$_POST['sid']);
            $order = LookForm_Service::getOrder($_POST['roleid'], $_POST['sid'], $server);
            
            for($i = 0; $i < count($order);$i++)
            {
                $arr = array(
                         'platformid'=>$_POST['platformid'],
                          'orderid'=>$order[$i]['order_id'],
                          'order_time'=>date("Y-m-d H:i:s",$order[$i]['order_time']),
                          'sid'=>$order[$i]['user_sid'],
                          'platform'=>$order[$i]['platform_id'],
                          'roleid'=>$order[$i]['order_roleid'],
                          'money'=>floatval($order[$i]['order_money']),
                          'shopid'=>$order[$i]['item_id'],
                          'uid'=>$order[$i]['user_id'],
                          'statu'=>$order[$i]['order_state'],
                          'dorder_id'=>$order[$i]['dorder_id'],
                );

                LookForm_Service::insert($arr); 

            }
        $logdata = array(
                'f_platform'=>$_POST['platformid'],
                'f_account'=>$_SESSION['account'],
                'f_addtime'=>date("Y-m-d H:i:s", time()),
                'f_sid'=>$_POST['sid'],
                'f_ip'=>$server['payip'],
        );
        $logtype = 'addorder';
        $logParams = array('orderid'=>$_POST['orderid']);
        ManagerLog_Service::insertManagerLog($logdata, $logtype, $logParams);
        
           $this->outputJson(0, "" ); 
       }
    }
    public function getServer() {
       if($_POST['Selplatform'] != 0)
       { 
           $platformid = $_POST['Selplatform'];
           $stServer =  LookForm_Service::getServer($platformid); 
           // 返回成功
           $this->outputJson(0, $stServer ); 
       } 
    }
    
    public function getData() {
        LookForm_Service::delete();
         $data = $_POST;
        if(empty($data['selPlatform']))
        {
            $this->outputJson(-1, '请填选择平台！');
        }
        
        $server =  LookForm_Service::getOneServer($data['selPlatform'],$data['selServer']);
        if(empty($server))
        {
            $this->outputJson(-1, '请填服务器未选择！');
        }
        $order = LookForm_Service::getOrder($data['roleid'], $data['selServer'], $server);
        if(empty($order))
        {
            $this->outputJson(-1, '请填服务器未选择！');
        }
        for($i = 0; $i < count($order);$i++)
        {
            $arr = array(
                      'platformid'=>$data['selPlatform'],
                      'orderid'=>$order[$i]['order_id'],
                      'order_time'=>date("Y-m-d H:i:s",$order[$i]['order_time']),
                      'sid'=>$order[$i]['user_sid'],
                      'platform'=>$order[$i]['platform_id'],
                      'roleid'=>$order[$i]['order_roleid'],
                      'money'=>  floatval($order[$i]['order_money']),
                      'shopid'=>$order[$i]['item_id'],
                      'uid'=>$order[$i]['user_id'],
                      'statu'=>$order[$i]['order_state'],
                      'dorder_id'=>$order[$i]['dorder_id'],
            );

            LookForm_Service::insert($arr); 

        }
        
        $this->outputJson(0, '');  
    }
}
