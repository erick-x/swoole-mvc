<?php
class PlatformNotice_Controller extends Module_Lib{
    public function showIndex(){
        
        $platform = Helper_Lib::getCookie("zoneid");
        $stServer =  Platform_Model::getPlatformByID($platform);
       
       
        $page = empty($_GET['p']) ? 1 : $_GET['p'];
        $pagesize = empty($_GET['pagesize']) ? 10 : $_GET['pagesize'];
        $total = PlatformNotice_Service::getNoticeTotal($stServer);
        $pagehtml = htmlspecialchars(Helper_Lib::getPageHtml($total, $page, $pagesize));
        $data = array(
            'pagehtml'=>$pagehtml,
            'data' => PlatformNotice_Service::getPageNotice($stServer,$page, $pagesize),
            'editNotice' => $this->checkPermission('platformnotice/editNotice'),
            'addNotice' => $this->checkPermission('platformnotice/addNotice'),
            'sumbitNotice'=>$this->checkPermission('platformnotice/sumbitNotice'),         
            'delNotice'=>$this->checkPermission('platformnotice/delNotice'),
            
        );          
        $this->load_view("platform_notice",$data);
    }
    
    //添加公告
    public function addNotice() {
        
       if (empty($_POST['starttime'])) {
            $this->outputJson(-1, '请填写 生效时间');
        }
	if (empty($_POST['endtime'])) {
            $this->outputJson(-1, '请填写结束时间');
        }
		
	if (empty($_POST['title'])) {
            $this->outputJson(-1, '请填写标题');
        }
        
        if (empty($_POST['btntext'])) {
            $this->outputJson(-1, '请填写按钮文字');
        }
        if (empty($_POST['context'])) {
            $this->outputJson(-1, '请填写公告内容');
        }
        
       $platform = Helper_Lib::getCookie("zoneid");
       $stServer =  Platform_Model::getPlatformByID($platform);
       if(empty($stServer))
       {
           $this->outputJson(-1, '区服为空，请刷新一下');      
       }
       
//       $logdata = array(
//                'f_platform'=>$iplatform,
//                'f_account'=>$_SESSION['account'],
//                'f_addtime'=>date("Y-m-d H:i:s", time()),
//                'f_ip'=>$stServer['sid_ip'],
//            );
//            $logtype = 'addPlatform';
//            $logParams = array('title'=>$_POST['title']);
//            ManagerLog_Service::insertManagerLog($logdata, $logtype, $logParams);
//            
        $data = array(
                'createtime'=>time(0),
                'context' =>$_POST['context'],
                'title'=>$_POST['title'],
                'btntext'=>$_POST['btntext'],
                'starttime' => strtotime($_POST['starttime']),
                'endtime' => strtotime($_POST['endtime']),
        );    
        try {
            $ret = PlatformNotice_Service::addNotice($data, $stServer);
            if (!$ret) {
                $this->outputJson(-2, '数据库执行失败！' );
            }  
        
        } catch (Exception_Lib $e) {
            $this->outputJson($e->getCode(), $e->getMessage());
        }
        
        $this->outputJson(0, '添加成功' ); 
    }
    
     //更新公告
    public function editNotice() {
        
       if (empty($_POST['starttime'])) {
            $this->outputJson(-1, '请填写 生效时间');
        }
	if (empty($_POST['endtime'])) {
            $this->outputJson(-1, '请填写结束时间');
        }
		
	if (empty($_POST['title'])) {
            $this->outputJson(-1, '请填写标题');
        }
        
        if (empty($_POST['btntext'])) {
            $this->outputJson(-1, '请填写按钮文字');
        }
        if (empty($_POST['context'])) {
            $this->outputJson(-1, '请填写公告内容');
        }
        
       $platform = Helper_Lib::getCookie("zoneid");
       $stServer =  Platform_Model::getPlatformByID($platform);
       if(empty($stServer))
       {
           $this->outputJson(-1, '区服为空，请刷新一下');      
       }
                 
        $data = array(
                'createtime'=>time(0),
                'context' =>$_POST['context'],
                'title'=>$_POST['title'],
                'btntext'=>$_POST['btntext'],
                'starttime' => strtotime($_POST['starttime']),
                'endtime' => strtotime($_POST['endtime']),
        );    
        try {
            $ret = PlatformNotice_Service::UpdateNotice($data,$_POST['id'], $stServer);
            if (!$ret) {
                $this->outputJson(-2, '数据库执行失败！' );
            }  
        
        } catch (Exception_Lib $e) {
            $this->outputJson($e->getCode(), $e->getMessage());
        }
        
        $this->outputJson(0, '更新成功' ); 
    }
    
     //发布公告
    public function sumbitNotice() {
        
        if (empty($_POST['id'])) {
            $this->outputJson(-1, '公告不唯一');
        }
        
       if (empty($_POST['starttime'])) {
            $this->outputJson(-1, '请填写 生效时间');
        }
	if (empty($_POST['endtime'])) {
            $this->outputJson(-1, '请填写结束时间');
        }
		
	if (empty($_POST['title'])) {
            $this->outputJson(-1, '请填写标题');
        }
        
        if (empty($_POST['btntext'])) {
            $this->outputJson(-1, '请填写按钮文字');
        }
        if (empty($_POST['context'])) {
            $this->outputJson(-1, '请填写公告内容');
        }
        
       $platform = Helper_Lib::getCookie("zoneid");
       $stServer =  Platform_Model::getPlatformByID($platform);
       if(empty($stServer))
       {
           $this->outputJson(-1, '区服为空，请刷新一下' .$platform);      
       }           
        $data = array(
                'id'=>$_POST['id'],
                'context' =>$_POST['context'],
                'title'=>$_POST['title'],
                'btntext'=>$_POST['btntext'],
                'starttime' => strtotime($_POST['starttime']),
                'endtime' => strtotime($_POST['endtime']),
        ); 
        try {
            
            
            $list = FetchPlatform_Service::getServer($platform);          
            if(!empty($list))
            {
                $fail = "";
                for($i = 0; $i < count($list); $i++)
                {           
                    $ret = PlatformNotice_Service::SendNotice($data, $list[$i]);
                    if (!$ret) {
                        $fail .= $list[$i]['sid_ip'] ."|";   
                    }
            
                }
                
                if(!empty($fail))
                {
                    $this->outputJson(-2, '发送到服务器失败！' . $fail );
                }
                
            }  else {               
                $ret = PlatformNotice_Service::SendNotice($data, $stServer);
                if (!$ret) {
                    $this->outputJson(-2, '发送到服务器失败！' );
                }
                
            }
            
        } catch (Exception_Lib $e) {
            $this->outputJson($e->getCode(), $e->getMessage());
        }
        
        $this->outputJson(0, '发布成功' ); 
    }
    
    public function delNotice() {
        if (empty($_POST['id'])) {
            $this->outputJson(-1, '公告不唯一');
        }
        
        $platform = Helper_Lib::getCookie("zoneid");
       $stServer =  Platform_Model::getPlatformByID($platform);
       if(empty($stServer))
       {
           $this->outputJson(-1, '区服为空，请刷新一下');      
       }
    
        try {
            $ret = PlatformNotice_Service::delNotice($_POST['id'], $stServer);
            if (!$ret) {
                $this->outputJson(-2, '数据库执行失败！' );
            }  
        
        } catch (Exception_Lib $e) {
            $this->outputJson($e->getCode(), $e->getMessage());
        }
        
        $this->outputJson(0, '删除成功' ); 
        
    }
}