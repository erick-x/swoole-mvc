<?php
//活动创建模块

class Chat_Controller extends Module_Lib{
    
    //显示控制页面
    public function index(){
         $platform = Helper_Lib::getCookie('zoneid'); 
         
        $chattext = isset($_GET['chattext'])?trim($_GET['chattext']):"";
        $page = empty($_GET['p']) ? 1 : $_GET['p'];
        $stServer = $this->getServer();
        $pagesize = empty($_GET['pagesize']) ? 10 : $_GET['pagesize'];
        $total = Chat_Service::gettotal($platform,$chattext,$stServer);
        $pagehtml = htmlspecialchars(Helper_Lib::getPageHtml($total, $page, $pagesize));
        $list = Chat_Service::getChat($platform,$chattext,$stServer,$page,$pagesize);
        $data = array(
            'pagehtml'=>$pagehtml,
            'data'=>$list,
            'forbidtalk'=>$this->checkPermission('chat/forbidtalk'),
            'forbidrole'=>$this->checkPermission('chat/forbidrole'),
        );
        $this->load_view("chat",$data);
    }
    
    public function getServer() {
        $i =0;
        foreach(Config::get("key.chat") as $key=>$value)
        {
              $stserver[$i++] = $value;         
        }   
         return array('ip'=>$stserver[0],'user'=>$stserver[1],'pwd'=>$stserver[2],'db'=>$stserver[3]);   
    }
    public function forbidrole() {
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
        if(empty($_POST['sid']))
        {
             $this->outputJson(-1, '请选择封号用户！');
        }
        
        $server = Server_Service::getServerByPtAndId($platform, $_POST['sid'],$stServer);
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

            $server = Server_Service::getServerByPtAndId($platform, $_POST['sid'],$stServer);
            if(empty($server))
            {
                $this->outputJson(-1, '没有获取到对应区服！');
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
    public function forbidtalk() {
        
        $platform = Helper_Lib::getCookie('zoneid');          
        $stServer =  Platform_Model::getPlatformByID($platform);
        if(empty($stServer))
        {
           $this->outputJson(-2, '平台错误，请重新登录！');
        }

        if(empty($_POST['roleid']))
        {
             $this->outputJson(-1, '请选择禁言用户！');
        }
        $server = Server_Service::getServerByPtAndId($platform, $_POST['sid'],$stServer);
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
        

            $server = Server_Service::getServerByPtAndId($platform, $_POST['sid'],$stServer);
            if(empty($server))
            {
                $this->outputJson(-1, '没有获取到对应区服！');
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