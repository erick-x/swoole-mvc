<?php

/*
 * 登录公告
 */

class LoginNotice_Controller extends Module_Lib {  
    /**
     * 当前统计信息
     */
    public function showNotice() {
        $createTime = empty($_GET['createTime'])?"": $_GET['createTime'];
        $endtime = empty($_GET['endtime'])?"": $_GET['endtime'];
        $account = empty($_GET['account'])?"": $_GET['account'];
        $platform = Helper_Lib::getCookie("zoneid");
        $stServer =  Platform_Model::getPlatformByID($platform);  //暂时平台id为设置
        if(empty($stServer))
       {
          header("Location:/gameuser/loadserverinfo");
          exit();       
       }
       $awhere = array(
           "createtime"=>  strtotime($createTime),
           "endtime"=>strtotime($endtime),
           "account"=>$account,
        );
        //$page = empty($_GET['p']) ? 1 : $_GET['p'];
        //$pagesize = empty($_GET['pagesize']) ? 10 : $_GET['pagesize'];
       // $total = LoginNotice_Service::getNoticeTotal($stServer);
       // $pagehtml = htmlspecialchars(Helper_Lib::getPageHtml($total, $page, $pagesize));
        $data = array(
            'servers'=>  Server_Service::getAllServers($platform, $stServer),
            //'pagehtml'=>$pagehtml,
            'data' => LoginNotice_Service::getNotice($awhere,$stServer,0, 0),
            'addServer' => $this->checkPermission('loginnotice/addServer'),
            'addLoginNotice' => $this->checkPermission('loginnotice/addLoginNotice'),
            'alterLoginNotice' => $this->checkPermission('loginnotice/alterLoginNotice'),
            'sumbitNotice' => $this->checkPermission('loginnotice/sumbitNotice'),  
        );  
        $this->load_view('login_notice',$data);
    }
    public function passLoginNotice() {
        $createTime = empty($_GET['createTime'])?"": $_GET['createTime'];
        $endtime = empty($_GET['endtime'])?"": $_GET['endtime'];
        $account = empty($_GET['account'])?"": $_GET['account'];
        $platform = Helper_Lib::getCookie("zoneid");
        $stServer =  Platform_Model::getPlatformByID($platform);  //暂时平台id为设置
        if(empty($stServer))
       {
          echo '<script>alert("没有选择服务器！");</script>';
          header("Location:/gameuser/loadserverinfo");
          exit();       
       }
       $awhere = array(
           "createtime"=>  strtotime($createTime),
           "endtime"=>strtotime($endtime),
           "account"=>$account,
       );
       // $page = empty($_GET['p']) ? 1 : $_GET['p'];
       // $pagesize = empty($_GET['pagesize']) ? 10 : $_GET['pagesize'];
       // $total = LoginNotice_Service::getNoticeTotal($stServer);
       // $pagehtml = htmlspecialchars(Helper_Lib::getPageHtml($total, $page, $pagesize));
        $data = array(
            'servers'=>  Server_Service::getAllServers($platform, $stServer),
           // 'pagehtml'=>$pagehtml,
            'data' => LoginNotice_Service::getNotice($awhere,$stServer,0, 0),
            'returnLoginNotice' => $this->checkPermission('loginnotice/returnLoginNotice'),
            'addServer' => $this->checkPermission('loginnotice/addServer'),
            'editLoginNotice' => $this->checkPermission('loginnotice/editLoginNotice'),
            'delLoginNotice' => $this->checkPermission('loginnotice/delLoginNotice'),
            'alterLoginNotice' => $this->checkPermission('loginnotice/alterLoginNotice'),
            'lookLoginNotice' => $this->checkPermission('loginnotice/lookLoginNotice'),
              
        );  
        $this->load_view('login_noticepass',$data);
    }
    
    public function sumbitNotice() {
        
        if(empty($_POST['sid']))
        {
            $this->outputJson(-1, '区服为空，请填写区服');
        }
        
        $iplatform = Helper_Lib::getCookie("zoneid");
        if($iplatform == 0)
        {
           $this->outputJson(0, '平台验证出错！' ); 
        }		
        $data = array(
                'statu'=>0,
        );
        $stServer =  Platform_Model::getPlatformByID($iplatform);  //暂时平台id为设置      
        try {
            $ret = LoginNotice_Service::addData($_POST['tr_id'],$data,$stServer);
            if (!$ret) {
                $this->outputJson(-2, '数据库执行失败！' );
            }  
        } catch (Exception_Lib $e) {
            $this->outputJson($e->getCode(), $e->getMessage());
        }

        $this->outputJson(0, '提交成功');
    }
    public function returnLoginNotice() {
        
        if (empty($_POST['tr_id'])) {
            $this->outputJson(-1, '选择目标错误,请刷新');
        }
        if (empty($_POST['reason'])) {
            $this->outputJson(-1, '请填写撤回理由');
        }
        $stList = explode(',',$_POST['sid']);
        $flag = 0;

        $Data = array(
                    'reason'=>$_POST['reason'],
                    'starttime' =>0,
                    'endtime' => 0,
                    'statu'=>3,
                );

        $iplatform = Helper_Lib::getCookie("zoneid");
        if($iplatform == 0)
        {
           $this->outputJson(0, '平台验证出错！' ); 
        }
        
            
        //撤回放到失效的页面
        $stServer =  Platform_Model::getPlatformByID($iplatform);  //暂时平台id为设置 
        $ret = LoginNotice_Service::addData($_POST['tr_id'],$Data,$stServer);
            if (!$ret) {
                $this->outputJson(-2, '数据库执行失败！' );
            }     
        
        $sendData = array(
                    'id'=>$_POST['tr_id'],
                    'starttime' =>0,
                    'endtime' => 0,
                    'statu'=>-1,
                    'account'=>$_SESSION['account'],
                );

        $logdata = array(
                'f_platform'=>$iplatform,
                'f_account'=>$_SESSION['account'],
                'f_addtime'=>date("Y-m-d H:i:s", time()),
                'f_ip'=>$stServer['sid_ip'],
            );
          
            $logtype = 'revokelogin';
            $logParams = array('id'=>$_POST['tr_id']);
            ManagerLog_Service::insertManagerLog($logdata, $logtype, $logParams);
            
        for($i =0; $i< count($stList); ++$i)
        {

           $Server = Server_Service::getServerByPtAndId($iplatform,$stList[$i],$stServer);
//           if($Server['serverStatus'] !=2 )//只对开服的服务器发送公告
//           {
//               continue;
//           } 
           $result = LoginNotice_Service::SendNoitce($sendData,$Server); 
           if (!$result) {
              $flag = 1;
            } 
        }    
        if($flag != 1)
        {
           
            $this->outputJson(0, '撤回成功');
            
        }  else {
            $this->outputJson(-2, '撤回失败');
        }   
    }
    
    public function addLoginNotice()
    {
        if (empty($_POST['starttime'])) {
            $this->outputJson(-1, '请填写生效时间');
        }
	if (empty($_POST['endtime'])) {
            $this->outputJson(-1, '请填写失效时间');
        }
	
        if(strtotime($_POST['endtime']) <= time(0))
        {
            $this->outputJson(-1, '失效时间不能小于当前时间');
        }
	if (empty($_POST['title'])) {
            $this->outputJson(-1, '请填写公告标题');
        }
			
	if (empty($_POST['context'])) {
            $this->outputJson(-1, '请填写公告内容');
        }
        
        $isbtn = 1;
        if(intval($_POST['linktype']) == 0 )
        {
            $isbtn = 0;
            if(! empty($_POST['linktext']) || !empty($_POST['btntext']))
            {
                $this->outputJson(-1, '按钮文字和超链接不用填写内容');
            }
        }else if(empty($_POST['linktype'])) {
            
            $this->outputJson(-1, '请填选择跳转的类型');
        }
        
        if (!empty($_POST['linktype'])&&empty($_POST['btntext'])) {

            $this->outputJson(-1, '请填写按钮上的文字');
        }  

        if(intval($_POST['linktype']) === 7)
        {
            if (empty($_POST['linktext'])) {
            $this->outputJson(-1, '请填写跳转链接地址');
            }
        }

        
	$iplatform = Helper_Lib::getCookie("zoneid");
        if($iplatform == 0)
        {
           $this->outputJson(0, '平台验证出错！' ); 
        }		
        $data = array(
                'createtime'=>time(0),
                'context' =>$_POST['context'],
                'creator'=>$_SESSION['account'],
                'title'=>$_POST['title'],
                'statu'=>-2,
                'lable' =>$_POST['statu'],
                'author' => "无",
                'authtime' =>0,
                'linktype'=> $_POST['linktype'],
                 'linktext'=>isset($_POST['linktext'])?$_POST['linktext']:"",
                 'btntext'=>isset($_POST['btntext'])?$_POST['btntext']:"",
                 'isbutton'=>$isbtn,
                'starttime' => strtotime($_POST['starttime']),
                'endtime' => strtotime($_POST['endtime']),
        );
        $stServer =  Platform_Model::getPlatformByID($iplatform);  //暂时平台id为设置    
        $logdata = array(
                'f_platform'=>$iplatform,
                'f_account'=>$_SESSION['account'],
                'f_addtime'=>date("Y-m-d H:i:s", time()),
                'f_ip'=>$stServer['sid_ip'],

            );
          
            $logtype = 'addlogin';
            $logParams = array('id'=>$_POST['tr_id']);
            ManagerLog_Service::insertManagerLog($logdata, $logtype, $logParams);
          
        try {
            $ret = LoginNotice_Service::addLoginNotice($data,$stServer);
            if (!$ret) {
                $this->outputJson(-2, '数据库执行失败！' );
            }  
        } catch (Exception_Lib $e) {
            $this->outputJson($e->getCode(), $e->getMessage());
        }

        $this->outputJson(0, '添加成功，请添加服务器');
    }
    public function editLoginNotice()
    {       
        if(empty($_POST['sid']))
        {
            $this->outputJson(-1, '区服为空，请填写区服');
        }
        if (empty($_POST['starttime'])) {
            $this->outputJson(-1, '请填写生效时间');
        }
	if (empty($_POST['endtime'])) {
            $this->outputJson(-1, '请填写失效时间');
        }
		
	if (empty($_POST['title'])) {
            $this->outputJson(-1, '请填写标题');
        }
        if (empty($_POST['result'])) {
            $this->outputJson(-1, '请选择审核结果');
        }
	$iplatform = Helper_Lib::getCookie("zoneid");
        if($iplatform == 0)
        {
           $this->outputJson(0, '平台验证出错！' ); 
        }
        foreach(Config::get("key.statu") as $key=>$value)
        {
            if(trim($_POST['lable']) == $value )
            {
                $lable = $key;
                break;
            }
        }
        foreach(Config::get("key.link") as $key=>$value)
        {
            if($value == $_POST['linktype'] )
            {
                $type = $key ;
                break;
            }
        }
        
        $data = array(
                'context' =>$_POST['context'],
                'statu'=>($_POST['result']>1)?-1:1,
                'author' => $_SESSION['account'],
                'authtime' =>time(0),
                'starttime' => strtotime($_POST['starttime']),
                'endtime' => strtotime($_POST['endtime']),
                'title' =>$_POST['title'],
                'lable' =>$lable,
        );
        $stServer =  Platform_Model::getPlatformByID($iplatform);  //暂时平台id为设置      
        $logdata = array(
                'f_platform'=>$iplatform,
                'f_account'=>$_SESSION['account'],
                'f_addtime'=>date("Y-m-d H:i:s", time()),
                'f_ip'=>$stServer['sid_ip'],
                'f_sid'=>$_POST['sid'],
            );
          
            $logtype = 'sendlogin';
            $logParams = array('id'=>$_POST['tr_id']);
            ManagerLog_Service::insertManagerLog($logdata, $logtype, $logParams);
            
        
        try {
                $ret = LoginNotice_Service::addData($_POST['tr_id'],$data,$stServer);
                if (!$ret) {
                    $this->outputJson(-2, '数据库执行失败！' );
                }
            
            if($_POST['result'] == 1)
            {
                $sendData = array(
                    'id'=>$_POST['tr_id'],
                    'context' =>$_POST['context'],
                    'starttime' => strtotime($_POST['starttime']),
                    'endtime' => strtotime($_POST['endtime']),
                    'title' =>$_POST['title'],
                    'linktext' =>$_POST['linktext'],
                    'btntext' =>$_POST['btntext'],
                    'linktype' =>$type,
                    'lable' =>$lable,
                    'isbtn'=>$_POST['isbtn'],
                    'account'=>$_SESSION['account'],
                );
                $stList = explode(',',$_POST['sid']);
                for($i =0; $i< count($stList); ++$i)
                {
                   $Server = Server_Service::getServerByPtAndId($iplatform,$stList[$i],$stServer);
//                   if($Server['serverStatus'] != 2 )//只对开服的服务器发送公告
//                   {
//                       continue;
//                   } 
                   $result = LoginNotice_Service::SendNoitce($sendData,$Server); 
                   if (!$result) {
                      $flag[$i] = $stList[$i];
                    } 
                }                            
            }
        } catch (Exception_Lib $e) {
            $this->outputJson($e->getCode(), $e->getMessage());
        }

        if(count($flag) == 0 &&$_POST['result'] == 1)
        {   
            $this->outputJson(0, '发布成功'); 
                
        }  else if($_POST['result'] != 1 && count($flag) == 0){
             $this->outputJson(0, '更新成功，未通过审核');
        }  else {
            $this->outputJson(-2, '发布失败的服务器id'.  implode(',', $flag));
        }
    }
    
    public function alterLoginNotice()
    {       
        if (empty($_POST['starttime'])) {
            $this->outputJson(-1, '请填写生效时间');
        }
	if (empty($_POST['endtime'])) {
            $this->outputJson(-1, '请填写失效时间');
        }
		
	if (empty($_POST['title'])) {
            $this->outputJson(-1, '请填写公告标题');
        }
			
	if (empty($_POST['context'])) {
            $this->outputJson(-1, '请填写公告内容');
        }
        
        if(intval($_POST['statu']) < 0 || intval($_POST['statu']) >3)
        {
           $this->outputJson(-1, '请选择公告状态');
        }
        
        if(intval($_POST['linktype']) != 7 && !empty($_POST['linktext']) )
        {
            $this->outputJson(-1, '请填选择跳转的类型为超链接');
        }  
        if(!empty($_POST['btntext'])&& intval($_POST['linktype']) == 0)
        {
            $this->outputJson(-1, '请填选择跳转的类型');
        }
        
        $flag = 1;
        if($_POST['linktype'] == 0 )
        { 
            $flag = 0;
        }else if(empty($_POST['linktype'])) {
            $this->outputJson(-1, '请填选择跳转的类型');

            if (empty($_POST['btntext'])) {
                $this->outputJson(-1, '请填写按钮上的文字');
            }

            if($_POST['linktype'] == 7)
            {
                if (empty($_POST['linktext'])) {
                $this->outputJson(-1, '请填写跳转链接地址');
                }
            }
        }
        $iplatform = Helper_Lib::getCookie("zoneid");
        if($iplatform == 0)
        {
           $this->outputJson(0, '平台验证出错！' ); 
        }
        
        $data = array(
                'createtime'=>time(0),
                'context' =>$_POST['context'],
                'creator'=>$_SESSION['account'],
                'title'=>$_POST['title'],
                'statu'=>-2,
                'lable' =>$_POST['statu'],
                'author' => "无",
                'authtime' =>0,
                'linktype'=> $_POST['linktype'],
                'linktext'=>isset($_POST['linktext'])?$_POST['linktext']:"",
                'btntext'=>isset($_POST['btntext'])?$_POST['btntext']:"",
                'isbutton'=>$flag,
                'starttime' => strtotime($_POST['starttime']),
                'endtime' => strtotime($_POST['endtime']),
        );
        $stServer =  Platform_Model::getPlatformByID($iplatform);  //暂时平台id为设置 
        $logdata = array(
                'f_platform'=>$iplatform,
                'f_account'=>$_SESSION['account'],
                'f_addtime'=>date("Y-m-d H:i:s", time()),
                'f_ip'=>$stServer['sid_ip'],
            );
          
            $logtype = 'alterlogin';
            $logParams = array('id'=>$_POST['tr_id']);
            ManagerLog_Service::insertManagerLog($logdata, $logtype, $logParams);
            
             
        try {
                $ret = LoginNotice_Service::addData($_POST['tr_id'],$data,$stServer);
                if (!$ret) {
                    $this->outputJson(-2, '数据库执行失败！' );
                }
        } catch (Exception_Lib $e) {
            $this->outputJson($e->getCode(), $e->getMessage());
        }
          $this->outputJson(0, '修改成功');

    }
    
    public function delLoginNotice() {
        $iplatform = Helper_Lib::getCookie("zoneid");
        if($iplatform == 0)
        {
           $this->outputJson(0, '平台验证出错！' ); 
        }
        $stServer =  Platform_Model::getPlatformByID($iplatform);  //暂时平台id为设置 
        $logdata = array(
                'f_platform'=>$iplatform,
                'f_account'=>$_SESSION['account'],
                'f_addtime'=>date("Y-m-d H:i:s", time()),
                'f_ip'=>$stServer['sid_ip'],
            );
          
            $logtype = 'dellogin';
            $logParams = array('id'=>$_POST['tr_id']);
            ManagerLog_Service::insertManagerLog($logdata, $logtype, $logParams);
        
             
        try {
            $ret = LoginNotice_Service::delNotice($_POST['tr_id'],$stServer);
            if (!$ret) {
                $this->outputJson(-2, '数据库执行失败！' );
            }
                 
        } catch (Exception_Lib $e) {
            $this->outputJson($e->getCode(), $e->getMessage());
        }

        $this->outputJson(0, '删除成功');
    }
    
   //添加发送的服务器
    public function addServer() {
        
        if (empty($_POST['id'])) {
          $this->outputJson(-1, '没有对应id可以选择！');
        }
        
        $iplatform = Helper_Lib::getCookie("zoneid");
        if($iplatform ==0)
        {
           $this->outputJson(0, '平台验证出错！' ); 
        }
        
        $stServer =  Platform_Model::getPlatformByID($iplatform);  //暂时平台id为设置      
        try {
             $data = array(
                 'sid'=>$_POST['serverlist']
             );
             
            $ret = LoginNotice_Service::addData($_POST['id'],$data,$stServer);
            if (!$ret) {
                $this->outputJson(-2, '数据库执行失败！' );
            }
                 
        } catch (Exception_Lib $e) {
            $this->outputJson($e->getCode(), $e->getMessage());
        }

        $this->outputJson(0, '添加服务器成功');
    }  
}
