<?php

/*
 * 走马灯公告
 */

class Notice_Controller extends Module_Lib {
    
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
       // $pagesize = empty($_GET['pagesize']) ? 1000 : $_GET['pagesize'];
       // $total = Notice_Service::getNoticeTotal($platform,$stServer);
       // $pagehtml = htmlspecialchars(Helper_Lib::getPageHtml($total, $page, $pagesize));
        $data = array(
            'servers'=>  Server_Service::getAllServers($platform, $stServer),
           // 'pagehtml'=>$pagehtml,
            'data' => Notice_Service::getPageNotice($platform,$awhere,$stServer,$page, $pagesize),
            'addServer' => $this->checkPermission('notice/addServer'),
            'alterNotice' => $this->checkPermission('notice/alterNotice'),
            'sumbitNotice' => $this->checkPermission('notice/sumbitNotice'),
        );     
        $this->load_view('public_notice',$data);
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
        
        $data = array('tr_statu'=>"审核中",);
        $stServer =  Platform_Model::getPlatformByID($iplatform);  //暂时平台id为设置      

        $ret = Notice_Service::UpdateNotice($data,$_POST['tr_id'],$stServer);
        if (!$ret) {
            $this->outputJson(-2, '数据库执行失败！' );
        }
            
        $this->outputJson(0, '提交成功');   
    }
    
    
    
    public function passNotice() {
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
//        $page = empty($_GET['p']) ? 1 : $_GET['p'];
//        $pagesize = empty($_GET['pagesize']) ? 10 : $_GET['pagesize'];
//        $total = Notice_Service::getNoticeTotal($platform,$stServer);
//        $pagehtml = htmlspecialchars(Helper_Lib::getPageHtml($total, $page, $pagesize));
        $data = array(
            'servers'=>  Server_Service::getAllServers($platform, $stServer),
   //         'pagehtml'=>$pagehtml,
            'data' => Notice_Service::getNotice($platform,$awhere,$stServer,0, 0),
            'editNotice' => $this->checkPermission('notice/editNotice'),
            'delNotice' => $this->checkPermission('notice/delNotice'),
            'alterNotice' => $this->checkPermission('notice/alterNotice'),
            'lookNotice' => $this->checkPermission('notice/lookNotice'),
            'addServer' => $this->checkPermission('notice/addServer'),
            
        );     
        $this->load_view('notice_pass',$data);
    } 
    public function addNotice()
    {
	if ($_POST['level'] != 0 && $_POST['level'] != -1 ) {
            $this->outputJson(-1, '选择播放等级');
        }
        
        if(strtotime($_POST['endtime']) <= time(0))
        {
            $this->outputJson(-1, '播放结束时间不能小于当前时间');
        }
        
        if (empty($_POST['starttime'])) {
            $this->outputJson(-1, '请填写播放开始时间');
        }
	if (empty($_POST['endtime'])) {
            $this->outputJson(-1, '请填写播放结束时间');
        }
		
	if (empty($_POST['playnum'])) {
            $this->outputJson(-1, '请填写播放次数');
        }
		
	if ($_POST['looptime'] > 0 && $_POST['looptime'] < 10) {
            $this->outputJson(-1, '循环间隔小于10秒，请重新填写');
        }
		
	if (empty($_POST['context'])) {
            $this->outputJson(-1, '请填写公告内容');
        }
	$iplatform = Helper_Lib::getCookie("zoneid");
        if($iplatform == 0)
        {
           $this->outputJson(0, '平台验证出错！' ); 
        }
  
        $data = array(
                'tr_platform'=>$iplatform,
                'tr_createtime'=>time(0),
                'tr_context' =>$_POST['context'],
                'tr_sender'=>$_SESSION['account'],
                'tr_statu'=>"未审核",
                'tr_auther' => "无",
                'tr_authtime' =>0,
                'tr_startime' => strtotime($_POST['starttime']),
                'tr_endtime' => strtotime($_POST['endtime']),
                'tr_trigtime' =>$_POST['playnum'],
                'tr_looptime' =>$_POST['looptime'],
                'tr_level'=>$_POST['level'],
        );
        $stServer =  Platform_Model::getPlatformByID($iplatform);  //暂时平台id为设置      
        
        $logdata = array(
                'f_platform'=>$iplatform,
                'f_account'=>$_SESSION['account'],
                'f_addtime'=>date("Y-m-d H:i:s", time()),
                'f_ip'=>$stServer['sid_ip'],
            );
            $logtype = 'addnotic';
            $logParams = array('context'=>$_POST['context']);
            ManagerLog_Service::insertManagerLog($logdata, $logtype, $logParams);
            
            
        try {
            $ret = Notice_Service::addNotice($data,$stServer);
            if (!$ret) {
                $this->outputJson(-2, '数据库执行失败！' );
            }  
        
        } catch (Exception_Lib $e) {
            $this->outputJson($e->getCode(), $e->getMessage());
        }

        $this->outputJson(0, '添加成功 ，请添加服务器');
    }
    public function editNotice()
    {    
        if(empty($_POST['sid']))
        {
            $this->outputJson(-1, '区服为空，请填写区服');
        }
        
        if (empty($_POST['starttime'])) {
            $this->outputJson(-1, '请重新选择时间');
        }
	if (empty($_POST['endtime'])) {
            $this->outputJson(-1, '请填写播放结束时间');
        }
		
	if (empty($_POST['playnum'])) {
            $this->outputJson(-1, '请填写播放次数');
        }
		
	if ($_POST['looptime'] > 0 && $_POST['looptime']< 10) {
            $this->outputJson(-1, '循环间隔小于10秒，请重新填写');
        }
        
	if (empty($_POST['context'])) {
            $this->outputJson(-1, '请填写公告内容');
        }
        if (empty($_POST['result'])) {
            $this->outputJson(-1, '请选择审核结果');
        }
	$iplatform = Helper_Lib::getCookie("zoneid");
        if($iplatform == 0)
        {
           $this->outputJson(0, '平台验证出错！' ); 
        }
                
        $data = array(
                'tr_platform'=>$iplatform,
                'tr_context' =>$_POST['context'],
                'tr_statu'=>($_POST['result']>1)?"未通过":"发布中",
                'tr_auther' => $_SESSION['account'],
                'tr_authtime' =>time(0),
                'tr_startime' => strtotime($_POST['starttime']),
                'tr_endtime' => strtotime($_POST['endtime']),
                'tr_trigtime' =>$_POST['playnum'],
                'tr_looptime' =>$_POST['looptime'],
                'tr_level'=>($_POST['level'] =='普通')? 0:-1,
        );
        
        
           
        $stServer =  Platform_Model::getPlatformByID($iplatform);  //暂时平台id为设置  
        $logdata = array(
                'f_platform'=>$iplatform,
                'f_account'=>$_SESSION['account'],
                'f_addtime'=>date("Y-m-d H:i:s", time()),
                'f_ip'=>$stServer['sid_ip'],
                'f_sid'=>$_POST['sid'],
            );
        $logtype = 'alternotic';
            $logParams = array('context'=>$_POST['context']);
            ManagerLog_Service::insertManagerLog($logdata, $logtype, $logParams);
        
        try {

            $ret = Notice_Service::UpdateNotice($data,$_POST['tr_id'],$stServer);
            if (!$ret) {
                $this->outputJson(-2, '数据库执行失败！' );
            }
        
            if($_POST['result'] == 1)
            {
                $sendData = array(
                    'level'=>$data['tr_level'],
                    'looptime'=>$data['tr_looptime'],
                    'starttime'=>$data['tr_startime'],
                    'endtime'=>$data['tr_endtime'],
                    'trigtime'=>$data['tr_trigtime'],
                    'context'=>$data['tr_context'],
                     'account'=>$_SESSION['account'],
                );
                $stList = explode(',',$_POST['sid']);
               
                for($i =0; $i< count($stList); ++$i)
                {
                   $Server = Server_Service::getServerByPtAndId($iplatform,$stList[$i],$stServer);
                   if($Server['serverStatus'] != 2)//只对开服的服务器发送走马灯
                   {
                       continue;
                   } 

                   $result = Notice_Service::SendNoitce($sendData,$Server); 
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
        }else {
           $this->outputJson(-2, '发布失败的服务器id'.  implode(',', $flag));
        }
    }
    
    public function alterNotice()
    {
        if ($_POST['level'] != 0 && $_POST['level'] != -1 ) {
            $this->outputJson(-1, '选择播放等级');
        }
        
        if (empty($_POST['starttime'])) {
            $this->outputJson(-1, '请重新选择开始时间');
        }
	if (empty($_POST['endtime'])) {
            $this->outputJson(-1, '请填写播放结束时间');          
        }	
        if( strtotime($_POST['endtime']) < time(0))
        {
            $this->outputJson(-1, '播放结束时间不能小于当前时间');
        }
	if (empty($_POST['playnum'])) {
            $this->outputJson(-1, '请填写播放次数');
        }
	
	if (empty($_POST['context'])) {
            $this->outputJson(-1, '请填写公告内容');
        }

        if ($_POST['looptime'] > 0 && $_POST['looptime']< 10) {
            $this->outputJson(-1, '循环间隔小于10秒，请重新填写');
        }
        
	$iplatform = Helper_Lib::getCookie("zoneid");
        if($iplatform == 0)
        {
           $this->outputJson(0, '平台验证出错！' ); 
        }        
        $data = array(
                'tr_createtime'=>time(0),
                'tr_platform'=>$iplatform,
                'tr_context' =>$_POST['context'],
                'tr_statu'=>"未审核",
                'tr_auther' => "无",
                'tr_authtime' =>0,
                'tr_startime' => strtotime($_POST['starttime']),
                'tr_endtime' => strtotime($_POST['endtime']),
                'tr_trigtime' =>$_POST['playnum'],
                'tr_looptime' =>$_POST['looptime'],
                'tr_level'=>($_POST['level'] =='普通')? 0:-1,
        );
        $stServer =  Platform_Model::getPlatformByID($iplatform);  //暂时平台id为设置  
        
         $logdata = array(
                'f_platform'=>$iplatform,
                'f_account'=>$_SESSION['account'],
                'f_addtime'=>date("Y-m-d H:i:s", time()),
                'f_ip'=>$stServer['sid_ip'],
            );
         $logtype = 'alternotic';
            $logParams = array('context'=>$_POST['context']);
            ManagerLog_Service::insertManagerLog($logdata, $logtype, $logParams);
           
         
        try {
            $ret = Notice_Service::UpdateNotice($data,$_POST['tr_id'],$stServer);
            if (!$ret) {
                $this->outputJson(-2, '数据库执行失败！' );
            }
            
            
        } catch (Exception_Lib $e) {
            $this->outputJson($e->getCode(), $e->getMessage());
        }

        $this->outputJson(0, '修改成功');
 
    }

    public function delNotice() {
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
        $logtype = 'delnotic';
            $logParams = array('id'=>$_POST['tr_id']);
            ManagerLog_Service::insertManagerLog($logdata, $logtype, $logParams);
            
        try {
            $ret = Notice_Service::delNotice($_POST['tr_id'],$stServer);
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
        if($iplatform == 0)
        {
           $this->outputJson(0, '平台验证出错！' ); 
        }		
        $stServer =  Platform_Model::getPlatformByID($iplatform);  //暂时平台id为设置      
        try {
             $data = array(
                 'tr_sid'=>$_POST['serverlist']
             );
            $ret = Notice_Service::addserver($_POST['id'],$data,$stServer);
            if (!$ret) {
                $this->outputJson(-2, '数据库执行失败！' );
            }
                 
        } catch (Exception_Lib $e) {
            $this->outputJson($e->getCode(), $e->getMessage());
        }

        $this->outputJson(0, '添加服务器成功');
    }
}
