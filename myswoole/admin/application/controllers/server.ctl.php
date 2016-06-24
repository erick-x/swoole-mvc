<?php

/*
 * 区服列表
 */

class Server_Controller extends Module_Lib {

    /**
     * 获取所有的区服信息
     */
    public function listServers() {
        Helper_Lib::setCookie('zoneid', $_GET['zoneid'], time()+3600, '/');
        $stServer =  Platform_Model::getPlatformByID($_GET['zoneid']);
        
        $page = empty($_GET['p']) ? 1 : $_GET['p'];
        $pagesize = empty($_GET['pagesize']) ? 10 : $_GET['pagesize'];
        $total = Server_Service::getServerTotal($_GET['zoneid'],$stServer);
        $pagehtml = htmlspecialchars(Helper_Lib::getPageHtml($total, $page, $pagesize));
        $data = array(
            'pagehtml'=>$pagehtml,
            'whitelist'=>Server_Service::getWhite($stServer),
            'allservers'=>Server_Service::getAllServers($_GET['zoneid'],$stServer),
            'servers' => Server_Service::getServers($_GET['zoneid'],$stServer,$page, $pagesize),
            'platform'=>Platform_Model::getPlatformByID($_GET['zoneid']),
            'addServer' => $this->checkPermission('server/addServer'),
            'editServer' => $this->checkPermission('server/editServer'),
            'serverState' => $this->checkPermission('server/serverState'),
            'serverStateUpdate' => $this->checkPermission('server/serverStateUpdate'),
            'serverInfo' => $this->checkPermission('server/serverInfo'),
            'getServers' => $this->checkPermission('server/getServers'),
        );
        $this->load_view('server', $data);
    }

    public function addServer() {
        if (empty($_POST['platformname'])) {
          $this->outputJson(-1, '请选择平台！');
         } 
        if (empty($_POST['serverid'])) {
            $this->outputJson(-1, '请填写服务器ID！');
        }
        if (empty($_POST['sname'])) {
            $this->outputJson(-1, '请填写区服名称');
        }
	
        if (empty($_POST['showid'])) {
            $this->outputJson(-1, '请填写服务器显示ID');
        }
	if (empty($_POST['roleserverip'])) {
            $this->outputJson(-1, '请填写角色服IP');
        }
		
	if (empty($_POST['roleserverport'])) {
            $this->outputJson(-1, '请填写角色服端口');
        }
		
	if (empty($_POST['zoneserverip'])) {
            $this->outputJson(-1, '请填写游戏服IP');
        }
		
	if (empty($_POST['zoneserverport'])) {
            $this->outputJson(-1, '请填写游戏服端口');
        }
			
	if (empty($_POST['zoneserverid'])) {
            $this->outputJson(-1, '请填写游戏服务器的ID');
        }
        
        $iplatform = Helper_Lib::getCookie('zoneid');
       if($iplatform == 0)
        {
           $this->outputJson(0, '平台验证出错！' ); 
        }
        $data = array(
                'platform_name'=>htmlspecialchars($_POST['platformname']),
                'platform' =>$iplatform,
                'sid'=>$_POST['serverid'],
                'sname' =>$_POST['sname'],
                'showid'=>$_POST['showid'],
                'createTime'=>time(0),
                'roleserver_ip' => $_POST['roleserverip'],
                'roleserver_port' => $_POST['roleserverport'],
                'zoneserver_ip' => $_POST['zoneserverip'],
                'zoneserver_port' => $_POST['zoneserverport'],
                'zoneid' => $_POST['zoneserverid'],
                'serverStatus' =>1,
                'status'=>isset($_POST['State'])?$_POST['State']:0,
                'chatserver_ip'=>"1.0.0.1",
                'chatserver_port'=>1
        );
                
       $stServer =  Platform_Model::getPlatformByID($iplatform);  //暂时平台id为设置
        try {
            $ret = Server_Service::addServer($data,$stServer);
            if (!$ret) {
                $this->outputJson(-2, '数据库执行失败！' );
            }
            
            
            $list = FetchPlatform_Service::getServer($iplatform);
           
            if(!empty($list))
            {
                $fail = "";
                for($i = 0; $i < count($list); $i++)
                {
                    $result = Game_Service::addServer($iplatform,$_POST['serverid'],1,$list[$i]); //1表示添加服务器
                    if (!$result){
                         $fail .= $list[$i]['sid_ip'] ."|";      
                    }
                }
                
                if(!empty($fail))
                {
                    $this->outputJson(-2, '发送到服务器失败！' . $fail );
                }
            }  else {
                
                $result = Game_Service::addServer($iplatform,$_POST['serverid'],1,$stServer); //1表示添加服务器
                if (!$result) {
                    $this->outputJson(-2,$result. '通知服务器失败！');
                }
            }
            
            
            $total = Server_Service::getServerTotal($iplatform,$stServer);
            $data = array(
            'platform_num' => $total, 
            );
            $ret = Platform_Service::update($iplatform,$data);
                if(!$ret){
                $this->outputJson(-2,'更新服务器数据量失败！'.$total);
             }
        
        } catch (Exception_Lib $e) {
            $this->outputJson($e->getCode(), $e->getMessage());
        }

        $this->outputJson(0, '添加成功');
    }


	public function editServer() {
		
        if (empty($_POST['serverid'])) {
            $this->outputJson(-1, '请填写服务器ID！');
        }
        if (empty($_POST['sname'])) {
            $this->outputJson(-1, '请填写区服名称');
        }
	
        if (empty($_POST['showid'])) {
            $this->outputJson(-1, '请填写服务器显示ID');
        }
	if (empty($_POST['roleserverip'])) {
            $this->outputJson(-1, '请填写角色服IP');
        }
		
	if (empty($_POST['roleserverport'])) {
            $this->outputJson(-1, '请填写角色服端口');
        }
		
	if (empty($_POST['zoneserverip'])) {
            $this->outputJson(-1, '请填写游戏服IP');
        }
		
	if (empty($_POST['zoneserverport'])) {
            $this->outputJson(-1, '请填写游戏服端口');
        }
        
        if ($_POST['State']> 4|| $_POST['State'] <0) {
            $this->outputJson(-1, '请填写客户端状态');
        }
        
        $data = array(
            'sid'=>$_POST['serverid'],
            'sname' =>$_POST['sname'],
            'showid'=>$_POST['showid'],
            'roleserver_ip' => $_POST['roleserverip'],
            'roleserver_port' => $_POST['roleserverport'],
            'zoneserver_ip' => $_POST['zoneserverip'],
            'zoneserver_port' => $_POST['zoneserverport'],
            'status'=>$_POST['State'],
            'zoneid'=>$_POST['zoneserverid'],
        );
 
        
        $iplatform = Helper_Lib::getCookie("zoneid");
        if($iplatform == 0)
        {
           $this->outputJson(-1, '平台验证出错！' ); 
        }
        
        $stServer =  Platform_Model::getPlatformByID($iplatform);
        try {
            $ret = Server_Service::editServer($data,$iplatform,$_POST['serverid'],$stServer);
            if (!$ret) {
                $this->outputJson(-2, '数据库执行失败！');
            }
            
            $list = FetchPlatform_Service::getServer($iplatform);
           
            if(!empty($list))
            {
                for($i = 0; $i < count($list); $i++)
                {   
                    $fail = "";
                    $result = Game_Service::addServer($iplatform,$_POST['serverid'],2,$list[$i]);//2表示修改服务器
                    if (!$result){
                         $fail .= $list[$i]['sid_ip'] ."|";      
                    }
                }
                
                if(!empty($fail))
                {
                    $this->outputJson(-2, '发送到服务器失败！' . $fail );
                }
                
            }  else {               
                $result = Game_Service::addServer($iplatform,$_POST['serverid'],2,$stServer); //1表示添加服务器
                if (!$result) {
                    $this->outputJson(-2,$result. '通知服务器失败！');
                }
                
            }    
            
        } catch (Exception_Lib $e) {
            $this->outputJson($e->getCode(), $e->getMessage());
        }

                
         $logdata = array(
                'f_platform'=>$iplatform,
                'f_account'=>$_SESSION['account'],
                'f_addtime'=>date("Y-m-d H:i:s", time()),
                'f_sid'=>$_POST['serverid'],
                'f_ip'=>$_POST['roleserverip'],
        );
         
        $logtype = 'editserver';
        $logParams = array('sid'=>$_POST['serverid'],"state"=>$_POST['serverStatus']);
        ManagerLog_Service::insertManagerLog($logdata, $logtype, $logParams);
        
        
        $this->outputJson(0, '修改成功');
    }
	
	
    public function serverState() {
        if (empty($_POST['showid'])) {
            $this->outputJson(-1, '请填写服务器显示ID');
        }
	if (empty($_POST['serverStatus'])) {
            $this->outputJson(-1, '请选中服务器状态');
        }
	if (empty($_POST['sname'])) {
            $this->outputJson(-1, '请填写服务器名称');
        }
	if (empty($_POST['serverid'])) {
            $this->outputJson(-1, '请填写服务器ID');
        }
        if ($_POST['State']> 4|| $_POST['State'] <0) {
            $this->outputJson(-1, '请填写客户端状态');
        }
        
        $data = array(
        'showid'=>$_POST['showid'],
        'serverStatus' => $_POST['serverStatus'],
        'server_info' => $_POST['desc'],
        'sname' =>$_POST['sname'],
        'status'=>$_POST['State'],
        );
        
         $iplatform = Helper_Lib::getCookie("zoneid");
        if($iplatform == 0)
        {
           $this->outputJson(0, '平台验证出错！' ); 
        }
        $stServer =  Platform_Model::getPlatformByID($iplatform);
        try {
            $ret = Server_Service::serverState($data,$iplatform,intval($_POST['serverid']),$stServer);
            if (!$ret) {
                $this->outputJson(-2, '数据库执行失败！');
            }
            
            $list = FetchPlatform_Service::getServer($iplatform);           
            if(!empty($list))
            {
                $fail = "";
                for($i = 0; $i < count($list); $i++)
                {
                    $result = Game_Service::addServer($iplatform,$_POST['serverid'],2,$list[$i]);//2表示修改服务器
                    if (!$result){
                         $fail .= $list[$i]['sid_ip'] ."|";      
                    }
                }
                
                if(!empty($fail))
                {
                    $this->outputJson(-2, '发送到服务器失败！' . $fail );
                }
                    
            }  else {               
                $result = Game_Service::addServer($iplatform,$_POST['serverid'],2,$stServer);//2表示修改服务器信息
                if (!$result) {
                    $this->outputJson(-2,$result. '通知服务器失败！');
                }
                
            }
    
        } catch (Exception_Lib $e) {
            $this->outputJson($e->getCode(), $e->getMessage());
        }
        
                
         $logdata = array(
                'f_platform'=>$iplatform,
                'f_account'=>$_SESSION['account'],
                'f_addtime'=>date("Y-m-d H:i:s", time()),
                'f_sid'=>$_POST['serverid'],
                'f_ip'=>"null",
        );
         
        $logtype = 'alertserver';
        $logParams = array('sid'=>$_POST['serverid'],"state"=>$_POST['serverStatus']);
        ManagerLog_Service::insertManagerLog($logdata, $logtype, $logParams);
        
        
        $this->outputJson(0, '修改成功');
    }

    public function serverStateUpdate() {		        
        $iplatform = Helper_Lib::getCookie("zoneid");
        if($iplatform == 0)
        {
           $this->outputJson(0, '平台验证出错！' ); 
        }

        if ($_POST['serverStatus'] == 3 && empty( $_POST['desc']) ) {
            
           $this->outputJson(-1, '请填写关服说明');
        }   
        if (empty($_POST['serverStatus'])) {
            $this->outputJson(-1, '请服务器状态');
        }
        if ($_POST['State']> 4|| $_POST['State'] <0) {
            $this->outputJson(-1, '请填写客户端状态');
        }
        if (empty($_POST['serverlist'])) {
            $this->outputJson(-1, '请勾选服务器');
        }
        $stServer =  Platform_Model::getPlatformByID($iplatform);
        $data = array(
        'serverStatus' =>$_POST['serverStatus'],
        'server_info' => $_POST['desc'],
        'status'=>$_POST['State'],
        );
        
         $sidarray = "";
        $arrlist = explode(",",$_POST['serverlist']);
        for($i = 0; $i < count($arrlist);++$i)
        {
            $sidarray .= $arrlist[$i] . "|";
            $ret = Server_Service::serverState($data,$iplatform,$arrlist[$i],$stServer);
            if (!$ret) {
                $this->outputJson(-2, '数据库执行失败！');
            }
        }    
         
        $list = FetchPlatform_Service::getServer($iplatform);
        
       
            if(!empty($list))
            {
                $fail = "";
                for($i = 0; $i < count($list); $i++)
                {
                    
                    $result = Game_Service::addServer($iplatform,1,3,$list[$i]);//2表示修改服务器
                    if (!$result){
                         $fail .= $list[$i]['sid_ip'] ."|";      
                    }
                }
                if(!empty($fail))
                {
                    $this->outputJson(-2, '发送到服务器失败！' . $fail );
                }
                    
            }  else {               
                $result = Game_Service::addServer($iplatform,1,3,$stServer);//3表示加载所有服务器信息
                if (!$result) {
                    $this->outputJson(-2,$result. '通知服务器失败！');
                }
                
            }
            

            $logdata = array(
                'f_platform'=>$iplatform,
                'f_account'=>$_SESSION['account'],
                'f_addtime'=>date("Y-m-d H:i:s", time()),
                'f_sid'=> "all",
                'f_ip'=>"100",
        );
         
        $logtype = 'alertserver';
        $logParams = array('sid'=>$sidarray,"state"=>$_POST['serverStatus']);
        ManagerLog_Service::insertManagerLog($logdata, $logtype, $logParams);
        
        $this->outputJson(0, '操作成功');
    }
    
public function serverInfo() {
        if (empty($_POST['serverid'])) {
        $this->outputJson(-1, '请填写服务器ID');
        }

        if (empty($_POST['sname'])) {
        $this->outputJson(-1, '请填写服务器名称');
        }
        $data = array(
        'server_info' => $_POST['desc'], 
         'sname' =>$_POST['sname'],
            );
         
        $iplatform = Helper_Lib::getCookie("zoneid");
        if($iplatform == 0)
        {
           $this->outputJson(0, '平台验证出错！' ); 
        }
        
        $stServer =  Platform_Model::getPlatformByID($iplatform);
        try {
            $ret = Server_Service::serverInfo($data,$iplatform,intval($_POST['serverid']),$stServer );
            if (!$ret) {
                $this->outputJson(-2, '数据库执行失败！');
            }
            
            
            $list = FetchPlatform_Service::getServer($iplatform);
            
            if(!empty($list))
            {
                $fail = "";
                for($i = 0; $i < count($list); $i++)
                {
                    $result = Game_Service::addServer($iplatform,$_POST['serverid'],2,$list[$i]);//2表示修改服务器
                    if (!$result){
                         $fail .= $list[$i]['sid_ip'] ."|";      
                    }
                }
                
                if(!empty($fail))
                {
                    $this->outputJson(-2, '发送到服务器失败！' . $fail );
                }
                
            }  else {               
                $result = Game_Service::addServer($iplatform,$_POST['serverid'],2,$stServer);//2表示修改服务器信息
            if (!$result) {
                $this->outputJson(-2,$result. '通知服务器失败！');
            }
                
            }   
        } catch (Exception_Lib $e) {
            $this->outputJson($e->getCode(), $e->getMessage());
        }
        $this->outputJson(0, '修改成功');
    
}

public function addWhiteList() {
        if (empty($_POST['uin'])) {
        $this->outputJson(-1, '请填写用户标识符');
        }

        $data = array(
        'desc' => isset($_POST['desc'])?$_POST['desc']:"", 
         'uin' =>  intval($_POST['uin']),
            );
        
        $iplatform = Helper_Lib::getCookie("zoneid");
       if($iplatform == 0)
        {
           $this->outputJson(0, '平台验证出错！' ); 
        }
        
        $stServer =  Platform_Model::getPlatformByID($iplatform);
        try {
            $ret = Server_Service::addWhite($data,$stServer );
            if (!$ret) {
                $this->outputJson(-2, '数据库执行失败！');
            }
            $result = Game_Service::addWhite(intval($_POST['uin']),1,$stServer); //1的时候表示添加白名单0表示删除
            if (!$result) {
                $this->outputJson(-2,$result. '通知服务器失败！');
            }
        } catch (Exception_Lib $e) {
            $this->outputJson($e->getCode(), $e->getMessage());
        }
        $this->outputJson(0, '添加成功');
    }
    
    public function delWhiteList(){
        
        if (empty($_POST['uin'])) {
        $this->outputJson(-1, '请填写用户标识符');
        }

        $data = array(
         'uin' =>  intval($_POST['uin']),
            );
        
        $iplatform = Helper_Lib::getCookie("zoneid");
        if($iplatform == 0)
        {
           $this->outputJson(0, '平台验证出错！' ); 
        }
        
        $stServer =  Platform_Model::getPlatformByID($iplatform);
        try {
            $ret = Server_Service::delWhite($data,$stServer );
            if (!$ret) {
                $this->outputJson(-2, '数据库执行失败！');
            }
            $result = Game_Service::addWhite(intval($_POST['uin']),0,$stServer); //1的时候表示添加白名单 0表示删除
            if (!$result) {
                $this->outputJson(-2,$result. '通知服务器失败！');
            }
        } catch (Exception_Lib $e) {
            $this->outputJson($e->getCode(), $e->getMessage());
        }
        $this->outputJson(0, '删除成功');
    }
}