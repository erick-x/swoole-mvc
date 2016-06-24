<?php

class Gameuser_Controller extends Module_Lib {

    public function loadserverinfo() {
        if(!empty($_GET["zoneid"] ))
        {    
            //Helper_Lib::registyPtSid($_GET["zoneid"],); 注册区服
            setcookie('zoneid', $_GET["zoneid"],time()+3600*2, '/');
        }
  
        //统计信息展示
        $this->load_view("loadserverinfo");
    } 
    
    public function forbidmultrole() {
         $this->load_view("mult_forbidrole");
	
    }
    
    public function addExecl() {
        
        if( $_FILES['myFile']['size']>2*1024*1024)
        {
             $this->outputJson(-1,"上传文件超过2M");
        }
        $pathname = $_FILES['myfile'];
        $filename = time(0)."_".$pathname['name'];
        $filepath = '/tmp/'.$filename;
        if(is_uploaded_file($pathname['tmp_name']))
        {
          if(! move_uploaded_file($pathname['tmp_name'],$filepath))//上传文件，成功返回true    
          {
              $this->outputJson(-1,"上传失败");
          }
        }else
        {
            $this->outputJson(-1,"非法上传文件");
        }
        
        $ext = pathinfo($pathname['name'], PATHINFO_EXTENSION | PATHINFO_FILENAME);  
        if(trim($ext) != "txt" && trim($ext) != "xml")
        {
            $this->outputJson(-1,"文件格式错误");
        }
        if(trim($ext) == "txt" )
        {
            $file= file_get_contents($filepath);
            $filecontent = explode("\n", trim($file));
            $j = 0;
            for($i = 0 ;$i < count($filecontent); ++$i)
            {
                $tmp = explode(" ", trim($filecontent[$i]));
                if(count($tmp) == 2)
                {
                    $data[$j]["id"]= $j;
                    $data[$j]["sid"]=$tmp[0];
                    $data[$j]["roleid"]=$tmp[1];  
                    $j++;
                }
                
            }
        }
        if(trim($ext) == "xml")
        {
            $data = array(array());
             try {
                    $lists = simplexml_load_file($filepath);  //载入xml文件 $lists和xml文件的根节点是一样的
                    } catch (Exception $ex) {
                        $this->outputJson(-1,"加载配置失败");
                    }

                    if(empty($lists))
                    {
                        $this->outputJson(-1,"读取配置失败");
                    }

                    $i = 0;
                    foreach($lists->RoleConfig as $table){     //有多个user，取得的是数组，循环输出
                     $data[$i]["id"]="$table->id";
                     $data[$i]["sid"]="$table->sid";
                     $data[$i]["roleid"]="$table->roleid";
                     $i++;
                    }
        }  
       
        
        //删除文件
        @unlink ($filepath); 
        
        $this->outputJson(0,$data);
    }
    /**
     * 显示用户信息
     */
    public function show() {
                                
            $platform = Helper_Lib::getCookie('zoneid');
           
            $stServer =  Platform_Model::getPlatformByID($platform);
            if(empty($stServer))
            {
               header("Location:/index/socketerror");
            }
            $sid = isset($_GET['server'])? $_GET['server']:0;
            $select = isset($_GET['select'])?$_GET['select']:"";
            $value = isset($_GET['value'])? $_GET['value']:"";
            
            $searchvalues = json_encode(array('sid'=>$sid,'selected'=>$select,'value'=>$value));
            Helper_Lib::setCookie('search', $searchvalues);
           
            if($select == 'uid')
            {
                $type = 2;
            }else if($select == "roleid")
            {
                $type = 1;
            }else if($select == "nickname")
            {
                 $type = 3;
            }
            $server = Server_Service::getServerByPtAndId($platform, $sid,$stServer);  
            $gameUser = Game_Service::show($server, $_SESSION['account'],$value, $type);
            if(empty($gameUser))
            {
                $data = array(
                'servers' => Server_Service::getAllServers($platform,$stServer),
                'sid' => $sid,
                'select' => $select,
                'value' => $value,
                );
            }  else {
                $data = array(
                'servers' => Server_Service::getAllServers($platform,$stServer),
                'BagProp'=>$gameUser['BagProp'],
                'BagEquip'=>$gameUser['BagEquip'],
                'BagEquipChip'=>$gameUser['BagEquipChip'],
                'BagTrinket'=>$gameUser['BagTrinket'],
                'BagTrinketChip'=>$gameUser['BagTrinketChip'],
                'BagMatrial'=>$gameUser['BagMatrial'],
                'BagMatrialChip'=>$gameUser['BagMatrialChip'],
                'BagHeroChip'=>$gameUser['BagHeroChip'],
                'userinfo'=>$gameUser['userinfo'],
                'herodata'=>$gameUser['herodata'],
                'formdata'=>$gameUser[ 'formdata'], 
                'sid' => $sid,
                'select' => $select,
                'value' => $value, 
            );
            }
        
        
        Helper_Lib::setCookie('uid', $gameUser['userinfo']['uin']);
        $this->load_view('gameuser', $data);
    }

    public function edit() {
            $platform = Helper_Lib::getCookie('zoneid');          
            $stServer =  Platform_Model::getPlatformByID($platform);
            if(empty($stServer))
            {
               header("Location:/gameuser/loadserverinfo");
            }
            
            $sid = isset($_GET['server'])? $_GET['server']:0;
            $select = isset($_GET['select'])?$_GET['select']:"";
            $value = isset($_GET['value'])? $_GET['value']:"";
           
            $searchvalues = json_encode(array('sid'=>$sid,'selected'=>$select,'value'=>$value));
            Helper_Lib::setCookie('search', $searchvalues);
           
            if($select == 'uid')
            {
                $type = 2;
            }else if($select == "roleid")
            {
                $type = 1;
            }else if($select == "nickname")
            {
                 $type = 3;
            }
            $server = Server_Service::getServerByPtAndId($platform, $sid,$stServer);  
            $gameUser = Game_Service::EditRole($server, $_SESSION['account'],$value, $type);
            
            if(empty($gameUser))
            {
                $data = array(
                'servers' => Server_Service::getAllServers($platform,$stServer),
                'sid' => $sid,
                'select' => $select,
                'value' => $value,
                );
            }  else {
                $data = array(
                'servers' => Server_Service::getAllServers($platform,$stServer),
                'userinfo'=>$gameUser['userinfo'],
                'pveinfo'=>$gameUser['pveinfo'],
                'sid' => $sid,
                'select' => $select,
                'value' => $value, 
            );
            }
        //记录玩家uid    
        Helper_Lib::setCookie('uid', $gameUser['userinfo']['uin']);
        $this->load_view("gameuser_edit", $data);
    }

    public function doEditBase() {
            $platform = Helper_Lib::getCookie('zoneid');          
            $stServer =  Platform_Model::getPlatformByID($platform);
                      
            if(empty($stServer))
            {
               $this->outputJson(-2, '平台错误，请重新登录！');
            }
            
            $search =  json_decode(Helper_Lib::getCookie('search'), TRUE) ;
            if(empty($search['sid'])||$search['sid'] === 0)
            {
                $this->outputJson(-2, '未选择服务器，请查询后，再修改！');
            }
            $select = Helper_Lib::getPost('selectstatu', 'int', 0, false);
            $count = Helper_Lib::getPost('count', 'int', 0, false);                  
            $type = 2;
            $strrole = Helper_Lib::getCookie('uid');
            
            $server = Server_Service::getServerByPtAndId($platform, $search['sid'],$stServer);
            $logdata = array(
                'f_platform'=>$platform,
                'f_account'=>$_SESSION['account'],
                'f_addtime'=>date("Y-m-d H:i:s", time()),
                'f_sid'=>$search['sid'],
                'f_ip'=>$server['zoneserver_ip'],
            );
            $logtype = 'add';
            $logParams = array('uin'=>$strrole,'num'=>$count,'sth'=>'基本信息'.$select,'resourceId'=>0);
            ManagerLog_Service::insertManagerLog($logdata, $logtype, $logParams);
            
        try {
            
            $data = array(
                'selecttype'=>$select,
                'count'=>$count,
                'account'=>$_SESSION['account'],
                'fetchtype'=>$type,
                'strrole'=>$strrole,
                'world'=>$search['sid'],
            );
            $ret = Gameuser_Service::updateRole($server,$data);
            if (!$ret) {
                $this->outputJson(-2, '更新数据失败!');
            }

            $this->outputJson(0, '更新成功！');
        } catch (Exception_Lib $e) {
            $this->outputJson($e->getCode(), $e->getMessage());
        }
    }

    public function doEditItem() {
            $platform = Helper_Lib::getCookie('zoneid');          
            $stServer =  Platform_Model::getPlatformByID($platform);
                      
            if(empty($stServer))
            {
               $this->outputJson(-2, '平台错误，请重新登录！');
            }
            
            $search =  json_decode(Helper_Lib::getCookie('search'), TRUE) ;
            if(empty($search['sid'])||$search['sid'] === 0)
            {
                $this->outputJson(-2, '未选择服务器，请查询后，再修改！');
            }
            $server = Server_Service::getServerByPtAndId($platform, $search['sid'],$stServer);
            
            try{
                $ItemID = Helper_Lib::getPost('propid', 'int', 0, false);
                $PropNum = Helper_Lib::getPost('propNum', 'int', 0, false);                    
                $type = 2;
                $strrole = Helper_Lib::getCookie('uid');
                if(empty($strrole)||$strrole === 0)
                {
                    $this->outputJson(-2, 'uid为空，请查询后，再修改！');
                }
                $data = array(
                    'selecttype'=>13,//道具类
                    'count'=>$PropNum,
                    'NumID'=>$ItemID,
                    'account'=>$_SESSION['account'],
                    'fetchtype'=>$type,
                    'strrole'=>$strrole,
                    'world'=>$search['sid'],
                );
            
                $logdata = array(
                    'f_platform'=>$platform,
                    'f_account'=>$_SESSION['account'],
                    'f_addtime'=>date("Y-m-d H:i:s", time()),
                    'f_sid'=>$search['sid'],
                    'f_ip'=>$server['zoneserver_ip'],
                );
                $logtype = 'add';
                $logParams = array('uin'=>$strrole,'num'=>$PropNum,'sth'=>'道具','resourceId'=>$ItemID);
                ManagerLog_Service::insertManagerLog($logdata, $logtype, $logParams);

                $ret = Gameuser_Service::updateRole($server,$data);
                if (!$ret) {
                    $this->outputJson(-2, '更新数据失败！');
                }
            
            $this->outputJson(0, '更新成功！');
        } catch (Exception_Lib $e) {
            $this->outputJson($e->getCode(), $e->getMessage());
        }
    }
    
     public function doDelItem() {
            $platform = Helper_Lib::getCookie('zoneid');          
            $stServer =  Platform_Model::getPlatformByID($platform);
                      
            if(empty($stServer))
            {
               $this->outputJson(-2, '平台错误，请重新登录！');
            }
            
            $search =  json_decode(Helper_Lib::getCookie('search'), TRUE) ;
            if(empty($search['sid'])||$search['sid'] === 0)
            {
                $this->outputJson(-2, '未选择服务器，请查询后，再修改！');
            }
            $server = Server_Service::getServerByPtAndId($platform, $search['sid'],$stServer);
            
        try {
            $ItemID = Helper_Lib::getPost('Thingid', 'int', 0, false);               
            $type = 2;
            $strrole = Helper_Lib::getCookie('uid');
            if(empty($strrole)||$strrole === 0)
            {
                $this->outputJson(-2, 'uid为空，请查询后，再修改！');
            }
            $data = array(
                'selecttype'=>17,//删除物品
                'count'=>0,
                'NumID'=>$ItemID,
                'account'=>$_SESSION['account'],
                'fetchtype'=>$type,
                'strrole'=>$strrole,
                'world'=>$search['sid'],
            );
            
            $logdata = array(
                'f_platform'=>$platform,
                'f_account'=>$_SESSION['account'],
                'f_addtime'=>date("Y-m-d H:i:s", time()),
                 'f_sid'=>$search['sid'],
                'f_ip'=>$server['zoneserver_ip'],
            );
            $logtype = 'delete';
            $logParams = array('uin'=>$strrole,'num'=>1,'sth'=>'物品','resourceId'=>$ItemID);
            ManagerLog_Service::insertManagerLog($logdata, $logtype, $logParams);
            
            
            $ret = Gameuser_Service::updateRole($server,$data);
            if (!$ret) {
                $this->outputJson(-2, '更新数据失败！');
            }
                      
            $this->outputJson(0, '更新成功！');
        } catch (Exception_Lib $e) {
            $this->outputJson($e->getCode(), $e->getMessage());
        }
    }
    
    public function doEditEquip() {
            $platform = Helper_Lib::getCookie('zoneid');          
            $stServer =  Platform_Model::getPlatformByID($platform);
                      
            if(empty($stServer))
            {
               $this->outputJson(-2, '平台错误，请重新登录！');
            }
            
            $search =  json_decode(Helper_Lib::getCookie('search'), TRUE) ;
            if(empty($search['sid'])||$search['sid'] === 0)
            {
                $this->outputJson(-2, '未选择服务器，请查询后，再修改！');
            }
            $server = Server_Service::getServerByPtAndId($platform, $search['sid'],$stServer);
            
        try {
            $equipID = Helper_Lib::getPost('equipid', 'int', 0, false);
            $equipNum = Helper_Lib::getPost('equipNum', 'int', 0, false);                    
            $type = 2;
            $strrole = Helper_Lib::getCookie('uid');
            if(empty($strrole)||$strrole === 0)
            {
                $this->outputJson(-2, 'uid为空，请查询后，再修改！');
            }
            $data = array(
                'selecttype'=>14,//装备类
                'count'=>$equipNum,
                'NumID'=>$equipID,
                'account'=>$_SESSION['account'],
                'fetchtype'=>$type,
                'strrole'=>$strrole,
                'world'=>$search['sid'],
            );
            
            $logdata = array(
                'f_platform'=>$platform,
                'f_account'=>$_SESSION['account'],
                'f_addtime'=>date("Y-m-d H:i:s", time()),
                 'f_sid'=>$search['sid'],
                'f_ip'=>$server['zoneserver_ip'],
            );
            
            $logtype = 'add';
            $logParams = array('uin'=>$strrole,'num'=>$equipNum,'sth'=>'装备','resourceId'=>$equipID);
            ManagerLog_Service::insertManagerLog($logdata, $logtype, $logParams);
            
            
            $ret = Gameuser_Service::updateRole($server,$data);
            if (!$ret) {
                $this->outputJson(-2, '更新数据失败！');
            }

            $this->outputJson(0, '更新成功！');
        } catch (Exception_Lib $e) {
            $this->outputJson($e->getCode(), $e->getMessage());
        }
    }
    
    
    public function doEditPosy() {
            $platform = Helper_Lib::getCookie('zoneid');          
            $stServer =  Platform_Model::getPlatformByID($platform);
                      
            if(empty($stServer))
            {
               $this->outputJson(-2, '平台错误，请重新登录！');
            }
            
            $search =  json_decode(Helper_Lib::getCookie('search'), TRUE) ;
            if(empty($search['sid'])||$search['sid'] === 0)
            {
                $this->outputJson(-2, '未选择服务器，请查询后，再修改！');
            }
            $server = Server_Service::getServerByPtAndId($platform, $search['sid'],$stServer);
            
        try {
            $equipID = Helper_Lib::getPost('posyid', 'int', 0, false);
            $equipNum = Helper_Lib::getPost('posyNum', 'int', 0, false);                    
            $type = 2;
            $strrole = Helper_Lib::getCookie('uid');
            if(empty($strrole)||$strrole === 0)
            {
                $this->outputJson(-2, 'uid为空，请查询后，再修改！');
            }
            $data = array(
                'selecttype'=>28,//铭文
                'count'=>$equipNum,
                'NumID'=>$equipID,
                'account'=>$_SESSION['account'],
                'fetchtype'=>$type,
                'strrole'=>$strrole,
                'world'=>$search['sid'],
            );
            
            $logdata = array(
                'f_platform'=>$platform,
                'f_account'=>$_SESSION['account'],
                'f_addtime'=>date("Y-m-d H:i:s", time()),
                 'f_sid'=>$search['sid'],
                'f_ip'=>$server['zoneserver_ip'],
            );
            
            $logtype = 'add';
            $logParams = array('uin'=>$strrole,'num'=>$equipNum,'sth'=>'铭文','resourceId'=>$equipID);
            ManagerLog_Service::insertManagerLog($logdata, $logtype, $logParams);
            
            
            $ret = Gameuser_Service::updateRole($server,$data);
            if (!$ret) {
                $this->outputJson(-2, '更新数据失败！');
            }

            $this->outputJson(0, '更新成功！');
        } catch (Exception_Lib $e) {
            $this->outputJson($e->getCode(), $e->getMessage());
        }
    }
    
     public function doEditHero() {
            $platform = Helper_Lib::getCookie('zoneid');          
            $stServer =  Platform_Model::getPlatformByID($platform);
                      
            if(empty($stServer))
            {
               $this->outputJson(-2, '平台错误，请重新登录！');
            }
            
            $search =  json_decode(Helper_Lib::getCookie('search'), TRUE) ;
            if(empty($search['sid'])||$search['sid'] === 0)
            {
                $this->outputJson(-2, '未选择服务器，请查询后，再修改！');
            }
            $server = Server_Service::getServerByPtAndId($platform, $search['sid'],$stServer);
            
        try {
            $heroID = Helper_Lib::getPost('heroid', 'int', 0, false);
            $heroNumm = Helper_Lib::getPost('heroNum', 'int', 0, false);                    
            $type = 2;
            $strrole = Helper_Lib::getCookie('uid');
            if(empty($strrole)||$strrole === 0)
            {
                $this->outputJson(-2, 'uid为空，请查询后，再修改！');
            }
            $data = array(
                'selecttype'=>15,//添加英雄类
                'count'=>$heroNumm,
                'NumID'=>$heroID,
                'account'=>$_SESSION['account'],
                'fetchtype'=>$type,
                'strrole'=>$strrole,
                'world'=>$search['sid'],
            );
            $logdata = array(
                'f_platform'=>$platform,
                'f_account'=>$_SESSION['account'],
                'f_addtime'=>date("Y-m-d H:i:s", time()),
                'f_sid'=>$search['sid'],
                'f_ip'=>$server['zoneserver_ip'],
            );
            
            $logtype = 'add';
            $logParams = array('uin'=>$strrole,'num'=>$heroNumm,'sth'=>'英雄','resourceId'=>$heroID);
            ManagerLog_Service::insertManagerLog($logdata, $logtype, $logParams);
            
            $ret = Gameuser_Service::updateRole($server,$data);
            if (!$ret) {
                $this->outputJson(-2, '更新数据失败！');
            }           
            $this->outputJson(0, '更新成功！');
        } catch (Exception_Lib $e) {
            $this->outputJson($e->getCode(), $e->getMessage());
        }
    }
    
     public function doPassPinstance() {
            $platform = Helper_Lib::getCookie('zoneid');          
            $stServer =  Platform_Model::getPlatformByID($platform);
                      
            if(empty($stServer))
            {
               $this->outputJson(-2, '平台错误，请重新登录！');
            }
            
            $search =  json_decode(Helper_Lib::getCookie('search'), TRUE) ;
            if(empty($search['sid'])||$search['sid'] === 0)
            {
                $this->outputJson(-2, '未选择服务器，请查询后，再修改！');
            }
            $server = Server_Service::getServerByPtAndId($platform, $search['sid'],$stServer);
            
        try {
            $pinstanceid = Helper_Lib::getPost('pinstanceid', 'int', 0, false);
            $corssid = Helper_Lib::getPost('corssid', 'int', 0, false);                    
            $type = 2;
            $strrole = Helper_Lib::getCookie('uid');
            if(empty($strrole)||$strrole === 0)
            {
                $this->outputJson(-2, 'uid为空，请查询后，再修改！');
            }
            $data = array(
                'selecttype'=>16,//通过副本
                'count'=>$corssid,
                'NumID'=>$pinstanceid,
                'account'=>$_SESSION['account'],
                'fetchtype'=>$type,
                'strrole'=>$strrole,
                'world'=>$search['sid'],
            );
            
            $logdata = array(
                'f_platform'=>$platform,
                'f_account'=>$_SESSION['account'],
                'f_addtime'=>date("Y-m-d H:i:s", time()),
                 'f_sid'=>$search['sid'],
                'f_ip'=>$server['zoneserver_ip'],
            );
          
            $logtype = 'cross';
            $logParams = array('roleuin'=>$strrole,'crossid'=>$corssid,'pinstanceid'=>$pinstanceid);
            ManagerLog_Service::insertManagerLog($logdata, $logtype, $logParams);
              
            $ret = Gameuser_Service::updateRole($server,$data);
            if (!$ret) {
                $this->outputJson(-2, '更新数据失败！');
            }           
            $this->outputJson(0, '更新成功！');
        } catch (Exception_Lib $e) {
            $this->outputJson($e->getCode(), $e->getMessage());
        }
    }
    
    public function doEditOther() {
            $platform = Helper_Lib::getCookie('zoneid');          
            $stServer =  Platform_Model::getPlatformByID($platform);
                      
            if(empty($stServer))
            {
               $this->outputJson(-2, '平台错误，请重新登录！');
            }

            $search =  json_decode(Helper_Lib::getCookie('search'), TRUE) ;
            if(empty($search['sid'])||$search['sid'] === 0)
            {
                $this->outputJson(-2, '未选择服务器，请查询后，再修改！');
            }
            $server = Server_Service::getServerByPtAndId($platform, $search['sid'],$stServer);
            
        try {
            $otherID = Helper_Lib::getPost('otherWayid', 'int', 0, false);
            $statu = Helper_Lib::getPost('selectstatu', 'int', 0, false);                    
            $type = 2;
            $strrole = Helper_Lib::getCookie('uid');
            if(empty($strrole)||$strrole === 0)
            {
                $this->outputJson(-2, 'uid为空，请查询后，再修改！');
            }
            $data = array(
                'selecttype'=>18,//引导步骤跳过
                'count'=>$statu,
                'NumID'=>$otherID,
                'account'=>$_SESSION['account'],
                'fetchtype'=>$type,
                'strrole'=>$strrole,
                'world'=>$search['sid'],
            );
            
            $logdata = array(
                'f_platform'=>$platform,
                'f_account'=>$_SESSION['account'],
                'f_addtime'=>date("Y-m-d H:i:s", time()),
                 'f_sid'=>$search['sid'],
                'f_ip'=>$server['zoneserver_ip'],
            );
          
            $logtype = 'passBegin';
            $logParams = array('roleid'=>$strrole,'passBegin'=>$otherID);
            ManagerLog_Service::insertManagerLog($logdata, $logtype, $logParams);
            
            
            $ret = Gameuser_Service::updateRole($server,$data);
            if (!$ret) {
               $this->outputJson(-2, '更新数据失败！');
            }           
            $this->outputJson(0, '更新成功！');
        } catch (Exception_Lib $e) {
            $this->outputJson($e->getCode(), $e->getMessage());
        }
    }
    
    public function forbidAccount() {
        $platform = Helper_Lib::getCookie('zoneid');          
        $stServer =  Platform_Model::getPlatformByID($platform);
        if(empty($stServer))
        {
           $this->outputJson(-2, '平台错误，请重新登录！');
        }

        if(empty($_POST['listroleid']))
        {
             $this->outputJson(-1, '请选择封号用户！');
        }
        $listrole = explode(',',$_POST['listroleid']);
        if(intval($_POST['forbidtype']) == 2)
        {
            if(empty($_POST['starttime']))
            {
                 $this->outputJson(-1, '请输入封号起始时间！');
            }
            $starttime = strtotime($_POST['starttime']);
            if(empty($_POST['endtime']))
            {
                 $this->outputJson(-1, '请输入封号解封时间！');
            }
            $endtime =strtotime($_POST['endtime']);
            
            $logdata = array(
                'f_platform'=>$platform,
                'f_account'=>$_SESSION['account'],
                'f_addtime'=>date("Y-m-d H:i:s", time()),
            );
          
            $logtype = 'forbidaccount';
            $logParams = array('roleid'=>$_POST['listroleid']);
            ManagerLog_Service::insertManagerLog($logdata, $logtype, $logParams);
            
        } else
        {
            $starttime=0;
            $endtime = 0;
            $logdata = array(
                'f_platform'=>$platform,
                'f_account'=>$_SESSION['account'],
                'f_addtime'=>date("Y-m-d H:i:s", time()),
            );
          
            $logtype = 'resetforbid';
            $logParams = array('roleid'=>$_POST['listroleid']);
            ManagerLog_Service::insertManagerLog($logdata, $logtype, $logParams);
        }
        
        for($i = 0; $i< count($listrole);$i+=2)
        {
            
            $server = Server_Service::getServerByPtAndId($platform, $listrole[$i+1],$stServer);
            if(empty($server))
            {
                $this->outputJson(-1, '没有获取到对应区服！');
            }
            try {
                 $data = array(
                    'roleuin'=>$listrole[$i],
                    'starttime'=>$starttime ,
                    'endtime'=> $endtime,
                    'forbidtype'=> $_POST['forbidtype'],
                    'type'=>1, //封号或者解除封号
                    'talktime'=>0,
                    'worldid'=>$listrole[$i+1],
                    'account'=>$_SESSION['account'],
                );
                
                $ret = Gameuser_Service::ForbidRole($server,$data);
                if (!$ret) {
                    $flag[$i] = $listrole[$i];
                }

            } catch (Exception_Lib $e) {
                $this->outputJson($e->getCode(), $e->getMessage());
            }
        }
        if(count($flag)==0)
        {
            $this->outputJson(0, '操作成功！');
        }else
        {
            $this->outputJson(0, '未成功的有！'.  implode(',', $flag));
        }
    }
    
    public function forbidTalk() {
        $platform = Helper_Lib::getCookie('zoneid');          
        $stServer =  Platform_Model::getPlatformByID($platform);
        if(empty($stServer))
        {
           $this->outputJson(-2, '平台错误，请重新登录！');
        }

        if(empty($_POST['listroleid']))
        {
             $this->outputJson(-1, '请选择封号用户！');
        }
        $listrole = explode(',',$_POST['listroleid']);
        if(intval($_POST['talktype']) == 1)
        {
            if(empty($_POST['starttime']))
            {
                 $this->outputJson(-1, '请输入封号起始时间！');
            }
            $starttime = strtotime($_POST['starttime']);
           
            $logdata = array(
                'f_platform'=>$platform,
                'f_account'=>$_SESSION['account'],
                'f_addtime'=>date("Y-m-d H:i:s", time()),
            );
          
            $logtype = 'forbidtalk';
            $logParams = array('roleid'=>$_POST['listroleid']);
            ManagerLog_Service::insertManagerLog($logdata, $logtype, $logParams);
            
        } else
        {
            $starttime=0;
            $logdata = array(
                'f_platform'=>$platform,
                'f_account'=>$_SESSION['account'],
                'f_addtime'=>date("Y-m-d H:i:s", time()),
            );
          
            $logtype = 'resettalk';
            $logParams = array('roleid'=>$_POST['listroleid']);
            ManagerLog_Service::insertManagerLog($logdata, $logtype, $logParams);
        }
        
         for($i = 0; $i< count($listrole);$i+=2)
        {
            $server = Server_Service::getServerByPtAndId($platform, $listrole[$i+1],$stServer);
            if(empty($server))
            {
                $this->outputJson(-1, '没有获取到对应区服！');
            }
            try {

                 $data = array(
                    'roleuin'=>$listrole[$i],
                    'starttime'=>0 ,
                    'endtime'=> 0,
                    'forbidtype'=>0,
                    'type'=>2, //禁言操作
                    'talktime'=>$starttime,
                    'worldid'=>$listrole[$i+1],
                    'account'=>$_SESSION['account'],
                );

                $ret = Gameuser_Service::ForbidRole($server,$data);
                if (!$ret) {
                    $flag[$i] = $listrole[$i];
                }

            } catch (Exception_Lib $e) {
                $this->outputJson($e->getCode(), $e->getMessage());
            }
        }
       if(count($flag)==0)
        {
            $this->outputJson(0, '操作成功！');
        }else
        {
            $this->outputJson(0, '未成功的有！'.  implode(',', $flag));
        }
    }

public function forbidRole() {
        $platform = Helper_Lib::getCookie('zoneid');          
        $stServer =  Platform_Model::getPlatformByID($platform);
        if(empty($stServer))
        {
           $this->outputJson(-2, '平台错误，请重新登录！');
        }

        if(empty($_POST['roleid']))
        {
             $this->outputJson(-1, '请填写封号用户！');
        }
        
        $server = Server_Service::getServerByPtAndId($platform, $_POST['sid'],$stServer);
        if(empty($server))
        {
            $this->outputJson(-1, '没有获取到对应区服！');
        }
        if(intval($_POST['forbidtype']) == 2)
        {
            if(empty($_POST['starttime']))
            {
                 $this->outputJson(-1, '请输入封号起始时间！');
            }
            $starttime = strtotime($_POST['starttime']);
            if(empty($_POST['endtime']))
            {
                 $this->outputJson(-1, '请输入封号解封时间！');
            }
            $endtime =strtotime($_POST['endtime']);
            
            $logdata = array(
               'f_platform'=>$platform,
               'f_account'=>$_SESSION['account'],
               'f_addtime'=>date("Y-m-d H:i:s", time()),
               'f_ip'=>$server['zoneserver_ip'],
               'f_sid'=>$_POST['sid'],
            );
          
            $logtype = 'forbidaccount';
            $logParams = array('roleid'=>$_POST['roleid']);
            ManagerLog_Service::insertManagerLog($logdata, $logtype, $logParams);
            
        } else
        {
            $starttime=0;
            $endtime = 0;
            $logdata = array(
                'f_platform'=>$platform,
                'f_account'=>$_SESSION['account'],
                'f_addtime'=>date("Y-m-d H:i:s", time()),
                'f_ip'=>$server['zoneserver_ip'],
                'f_sid'=>$_POST['sid'],
            );
          
            $logtype = 'resetforbid';
            $logParams = array('roleid'=>$_POST['roleid']);
            ManagerLog_Service::insertManagerLog($logdata, $logtype, $logParams);
        }
             $data = array(
                'roleuin'=>$_POST['roleid'],
                'starttime'=>$starttime ,
                'endtime'=> $endtime,
                'forbidtype'=> $_POST['forbidtype'],
                'type'=>1, //封号或者解除封号
                'talktime'=>0,
                'worldid'=>$_POST['sid'],
                'account'=>$_SESSION['account'],
            );

            $ret = Gameuser_Service::ForbidRole($server,$data);
            if (!$ret) {
                $this->outputJson(-1, '操作失败！');
            }
            
           $this->outputJson(0, '操作成功！');
    }
    
    public function forbidRoleTalk() {
        $platform = Helper_Lib::getCookie('zoneid');          
        $stServer =  Platform_Model::getPlatformByID($platform);
        if(empty($stServer))
        {
           $this->outputJson(-2, '平台错误，请重新登录！');
        }

        if(empty($_POST['roleid']))
        {
             $this->outputJson(-1, '请选择封号用户！');
        }
        
        $server = Server_Service::getServerByPtAndId($platform, $_POST['sid'],$stServer);
        if(empty($server))
        {
            $this->outputJson(-1, '没有获取到对应区服！');
        }
        if(intval($_POST['talktype']) == 1)
        {
            if(empty($_POST['starttime']))
            {
                 $this->outputJson(-1, '请输入封号起始时间！');
            }
            $starttime = strtotime($_POST['starttime']);
           
            $logdata = array(
                'f_platform'=>$platform,
                'f_account'=>$_SESSION['account'],
                'f_addtime'=>date("Y-m-d H:i:s", time()),
                'f_ip'=>$server['zoneserver_ip'],
                 'f_sid'=>$_POST['sid'],
            );
          
            $logtype = 'forbidtalk';
            $logParams = array('roleid'=>$_POST['roleid']);
            ManagerLog_Service::insertManagerLog($logdata, $logtype, $logParams);
            
        } else
        {
            $starttime=0;
            $logdata = array(
                'f_platform'=>$platform,
                'f_account'=>$_SESSION['account'],
                'f_addtime'=>date("Y-m-d H:i:s", time()),
                'f_ip'=>$server['zoneserver_ip'],
                 'f_sid'=>$_POST['sid'],
            );
          
            $logtype = 'resettalk';
            $logParams = array('roleid'=>$_POST['roleid']);
            ManagerLog_Service::insertManagerLog($logdata, $logtype, $logParams);
        }
       

                 $data = array(
                    'roleuin'=>$_POST['roleid'],
                    'starttime'=>0 ,
                    'endtime'=> 0,
                    'forbidtype'=>0,
                    'type'=>2, //禁言操作
                    'talktime'=>$starttime,
                    'worldid'=>$_POST['sid'],
                    'account'=>$_SESSION['account'],
                );

                $ret = Gameuser_Service::ForbidRole($server,$data);
                if (!$ret) {
                     $this->outputJson(-1, '操作失败！');
                }
                
            $this->outputJson(0, '操作成功！');
        
    }
}