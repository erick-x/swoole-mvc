<?php
//活动创建模块


class Active_Controller extends Module_Lib{
    
    //显示控制页面
    public function activeIndex(){
        //获取服务器列表
        $platform = Helper_Lib::getCookie("zoneid");
        $stAllServer =  Platform_Model::getPlatformByID($platform); 
        $hefuservers = Server_Service::gethefuServer($platform, $stAllServer);    
        $data = array(
            'servers'=>$hefuservers,
            'data' => Activity_Service::loadActivityConfig($stAllServer),
            'createActivity' => $this->checkPermission('active/createActivity'),
            'deletActivity' => $this->checkPermission('active/deletActivity'),
            'addUser' => $this->checkPermission('active/addUser'),
            'alertBookActivity' => $this->checkPermission('active/alertBookActivity'),
        );
        $this->load_view("active",$data);
    }
    
    public function index(){
        //获取服务器列表
        $platform = Helper_Lib::getCookie("zoneid");
        $stAllServer =  Platform_Model::getPlatformByID($platform); 
         
        $hefuservers = Server_Service::gethefuServer($platform, $stAllServer); 
        $data = array(
            'servers'=>$hefuservers,
            'data' => Activity_Service::loadMutliAct(),
            'AddMultiActivity' => $this->checkPermission('active/AddMultiActivity'),
            'LoadActivity' => $this->checkPermission('active/LoadActivity'),
            'alertMutliActivity' => $this->checkPermission('active/alertMutliActivity'),
            'deletMultiActivity' => $this->checkPermission('active/deletMultiActivity'),
        );
        $this->load_view("createmulti_act",$data);
    }
    
    public function alertMutliActivity()
    {        
        $data = array(    
            'desc'=>$_POST['desc'],
        );
        
        $ret = Activity_Service::updateMutliActivity($data, $_POST['id']);
        if (!$ret) {
            
            $this->outputJson(-2, '数据库执行失败！' );
        }
        
        $this->outputJson(0, '修改备注内容成功！' );
    }
    public function alertBookActivity() {
         $platform = Helper_Lib::getCookie("zoneid");
        $stServer =  Platform_Model::getPlatformByID($platform);
        if(empty($stServer))
        {
            $this->outputJson(-1, '创建失败，无法获取对应信息');
        }
        
        
        $data = array(    
            'desc'=>$_POST['desc'],
        );
        
        $ret = Activity_Service::updateActivityConfig($data, $_POST['id'], $stServer);
        if (!$ret) {
            
            $this->outputJson(-2, '数据库执行失败！' );
        }
        
        $this->outputJson(0, '修改备注内容成功！' );
    }
    
    public function deletMultiActivity() {
        $id = $_POST['id'];
        $platform = Helper_Lib::getCookie("zoneid");
        $stServer =  Platform_Model::getPlatformByID($platform);
        if(empty($stServer))
        {
            $this->outputJson(-1, '创建失败，无法获取对应信息');
        }
         $ret = Activity_Service::CheckActivity( $id);
        if (!$ret) {
                $this->outputJson(-2, '数据库执行失败！' );
            } 
        $logdata = array(
                'f_platform'=>$platform,
                'f_account'=>$_SESSION['account'],
                'f_addtime'=>date("Y-m-d H:i:s", time()),
                'f_sid'=>"",
                'f_ip'=>$stServer['sid_ip'],
        );
          
        $logtype = 'deleteactivity';
        $logParams = array('id'=>$_POST['id']);
        ManagerLog_Service::insertManagerLog($logdata, $logtype, $logParams);
        
         $this->outputJson(0, '删除成功');  
    }
    //删除某个活动
     public function deletActivity() {
         $id = $_POST['id'];
         $platform = Helper_Lib::getCookie("zoneid");
        $stServer =  Platform_Model::getPlatformByID($platform);
        if(empty($stServer))
        {
            $this->outputJson(-1, '创建失败，无法获取对应信息');
        }
         $ret = Activity_Service::delActivityConfig( $id, $stServer);
        if (!$ret) {
                $this->outputJson(-2, '数据库执行失败！' );
            }        
         $this->outputJson(0, '删除成功');   
    }
    
    //创建活动
    public function createActivity() {  
        if (empty($_POST['starttime'])) {
            $this->outputJson(-1, '请填写开始时间');
        }
        if (empty($_POST['endtime'])) {
            $this->outputJson(-1, '请填写结束时间');
        }
        if (empty($_POST['sid'])) {
            $this->outputJson(-1, '请勾选区服列表');
        }
        $serverid = implode(",", $_POST['sid']);       
        $platform = Helper_Lib::getCookie("zoneid");
        $stServer =  Platform_Model::getPlatformByID($platform);
        if(empty($stServer))
        {
            $this->outputJson(-1, '创建失败，无法获取对应区服信息');
        }
        
        $logdata = array(
                'f_platform'=>$platform,
                'f_account'=>$_SESSION['account'],
                'f_addtime'=>date("Y-m-d H:i:s", time()),
                'f_sid'=>$serverid,
                'f_ip'=>$stServer['sid_ip'],
        );
          
        $logtype = 'addactivity';
        $logParams = array('title'=>$_POST['title']);
        ManagerLog_Service::insertManagerLog($logdata, $logtype, $logParams);

        $genId = new GenID_Model();      
        $data = array(
            'id'=> time(0)+$genId->getID(),
            'sid'=>$serverid,
            'title'=>$_POST['title'],
            'starttime'=>  strtotime($_POST['starttime']),
            'endtime'=>strtotime($_POST['endtime']),
            'desc'=>$_POST['desc'],
            'content'=>$_POST['content'],
            'param'=>$_POST['param'],
            'actid'=>$_POST['actid'],
            'configdesc'=>$_POST['configdesc'],
            'state'=>1,  //未审核
            'creator'=>$_SESSION['account']
        );
        
        $param = explode("$", $_POST['param']);
        $senddata = array(
              'param'=>$this->boxToProp($param),
          );
        $acttype = $this->getActType($senddata['param']);
        if ($acttype != 4808 &&  $acttype != 4812)
        {
            for($i = 0; $i < count( $_POST['sid'] );++$i )
            {
              $ret = Activity_Service::getEffectAct($stServer,$data['starttime'],$data['endtime'],trim($acttype), $_POST['sid'][$i]);
                if($ret )
                {
                    $this->outputJson(-1, '重复的活动，无法创建，修改活动时间范围！区服为' .$_POST['sid'][$i]);
                }  
            }
            
        }
            
        $ret = Activity_Service::addActivity($data, $stServer);
        if (!$ret) {
                $this->outputJson(0, '添加失败！' );
        }
            
        $this->outputJson(0, '创建成功');
    }
    
    
    //上传活动配置
    public function addUser() {
        
        $pathname = $_FILES['myfile'];
        $filename = time(0)."_upfile.xml";
        $filepath = '/tmp/'.$filename;
        
        if(is_uploaded_file($pathname['tmp_name']))
        {
          if(!move_uploaded_file($pathname['tmp_name'],$filepath))//上传文件，成功返回true    
          {
              $this->outputJson(-1,"上传失败");
          }
        }else
        {
            $this->outputJson(-1,"非法上传文件");
        }
        $data = $this->ReadXml($filepath);        
        if (empty($data)||  !is_array($data)) {
            $this->outputJson(-1,"上传失败,请刷新重新上传");
        }
       
        //插入数据库
        $this->InsertData($data);

         //删除文件
        @unlink ($filepath); 
       
        $this->outputJson(0,"上传成功");
    }
  
    //整理活动配置表插入数据库
    public function InsertData($data) {
        $platform = Helper_Lib::getCookie("zoneid");
        $stServer =  Platform_Model::getPlatformByID($platform);  
        $dbdata = "";
        for($i  = 0; $i < count($data); ++$i)
        {
            $dbdata = array( 
            'actid'=>$data[$i]['actid'],
            'title'=>$data[$i]['strActName'],
            'configdesc'=>$data[$i]['strConfigDesc'], 
            'content'=>$data[$i]['strActDesc'],   
            'param'=> $this->getReward($data[$i]),  
            );
            Activity_Service::addActivityConfig($dbdata, $stServer);
        }   
    }
    
    public function getReward($data) {
        if(empty($data))
        {
            return "";
        }
        $rewarddata = "";
        for($j = 0;$j < $data['iChestNum']; ++$j)
        {
             $stReward = array(
               'iRewardId'=>$data[$j]["iRewardId"],
               'iConditonType'=> $data[$j]["iConditonType"],
               'iGetParam'=>$data[$j]["iGetParam"],
               'iChestId'=>$data[$j]["iChestId"],
               'iRewarddesc'=>$data[$j]["iRewarddesc"],
             );
             
           $rewarddata[$j] = implode("|",$stReward);
        }
           
        $return =  implode('$', $rewarddata);
        return $return;   
    }
    
    //获取配置
    public function getActivityConfig($type) {
        
        foreach(Config::get("key.activity" ) as $key=>$value)
        {
           if(trim($type) == trim($value))
           {
              return $key;
           }
        }
        return false;
    } 
    public function ReadXml($filepath) {
        
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
        
        foreach($lists->SQMRechargeCostConfig as $table){
            $data[$i]['actid']= "$table->iId";
            $data[$i]['strActName'] = "$table->strActName";
            $data[$i]['iChestNum'] = "$table->iChestNum";
            $data[$i]['strActDesc'] = "$table->strActDesc";
            $data[$i]['strConfigDesc'] = "$table->strConfigDesc";
            $j = 0;
            foreach ($table->stRewards as $value) {
                
            $data[$i][$j]["iRewardId"]="$value->iRewardId";
            $data[$i][$j]["iConditonType"]="$value->iConditonType";
            $data[$i][$j]["iRewarddesc"]="$value->iRewarddesc";
            $data[$i][$j]["iGetParam"]="$value->iGetParam";
            $data[$i][$j]["iChestId"]="$value->iChestId";
            $j++;
           }
            $i++;
        }
        return $data;
    }

    //创建批量活动
    public function AddMultiActivity() {    
        if (empty($_POST['starttime'])) {
            $this->outputJson(-1, '请填写开始时间');
        }
        if (empty($_POST['endtime'])) {
            $this->outputJson(-1, '请填写结束时间');
        }
        if (empty($_POST['sid'])) {
            $this->outputJson(-1, '请勾选区服列表');
        }
        $serverid = implode(",", $_POST['sid']);       
        $platform = Helper_Lib::getCookie("zoneid");
        $stServer =  Platform_Model::getPlatformByID($platform);
        if(empty($stServer))
        {
            $this->outputJson(-1, '创建失败，无法获取对应区服信息');
        }
       
        $logdata = array(
                'f_platform'=>$platform,
                'f_account'=>$_SESSION['account'],
                'f_addtime'=>date("Y-m-d H:i:s", time()),
                'f_sid'=>$_POST['sid'],
                'f_ip'=>$stServer['sid_ip'],
        );
          
        $logtype = 'addactivity';
        $logParams = array('title'=>$_POST['title']);
        ManagerLog_Service::insertManagerLog($logdata, $logtype, $logParams);

        $data = Activity_Service::getMutliActbyID($_POST['id']);   
        $actdata = explode("#", $data[0]['actdata']);    
        
        $time = time(0);
        for($i = 0;$i < count($actdata); ++$i)
        {
            $genId = new GenID_Model();            
            $arrlist = explode("@", $actdata[$i]);
            $id = $time+$genId->getID() ;
            unset($genId);
            $starttime  =  strtotime($_POST['starttime']) + ($arrlist[4]*3600);
            $endtime = strtotime($_POST['endtime'])+ ($arrlist[4]*3600)+(($arrlist[5]-1)*3600*24);
            $Onedata = array(
            'id'=>$id ,
            'sid'=>$serverid,
            'title'=>$arrlist[1],
            'starttime'=> $starttime,
            'endtime'=> $endtime,
            'desc'=>$_POST['desc'],
            'content'=>$arrlist[3],
            'param'=>$arrlist[6],
            'actid'=>$arrlist[0],
            'configdesc'=>$arrlist[2],
            'state'=>3,  //已经发布
            'creator'=>$_SESSION['account'],
            'sender'=>$_SESSION['account']
            );

            $param = explode("$", $arrlist[6]);
            $senddata = array(
              'id'=>$id,
              'actid'=>$arrlist[0],
              'starttime'=>$starttime,
              'endtime'=>$endtime,
              'content'=>$arrlist[3],
              'title'=>$arrlist[1],
              'param'=>$this->boxToProp($param),
              'account'=>$_SESSION['account'],
            );
            $arrsid = explode(",", $serverid); 
            $act = new Activity_Controller();
            $acttype = $this->getActType($senddata['param']); 
            $failarray = array();
            for($j = 0; $j< count($arrsid);++$j)
            {    
                //双倍活动4812和4808兑换活动不检查重复
                if($acttype!= 4808 && $acttype != 4812 )
                {
                    $ret = Activity_Service::getEffectAct($stServer,$senddata['starttime'],$senddata['endtime'],$acttype, $arrsid[$j]);
                    if($ret )
                    {  
                        $failarray[$i] = $arrsid[$j];
                        continue;
                    }
                }
                $Server = Server_Service::getServerByPtAndId($platform,$arrsid[$j],$stServer);
                $ret = Activity_Service::sendActivity($senddata,$Server);
                if(!$ret)
                {
                    $flag[$j] = $arrsid[$j];
                }
            }
            if(count($flag) ==0 && count( $failarray) == 0 )
            {
               Activity_Service::addActivity($Onedata, $stServer);
            }

        }
        
        unset($act);
        if(count($flag) ==0 && count( $failarray) == 0 )
        {    
           $this->outputJson(0, '发布成功'); 
        }else{
            if(count($flag) !=0)
            {
                $this->outputJson(0, '发布失败服务器ID '.  implode(",",$flag) ); 
            }
          
            if( count( $failarray) != 0 )
            {
                $this->outputJson(0, '活动重复的区服 '.  implode(",",$failarray) ); 
            }
        }

    }
    
    //整理活动配置表插入数据库
    public function addActivityToDB($data) {
        
        $dbdata = array();
        $j = 0;
        for($i  = 0; $i < count($data); ++$i)
        {
             $arract = array( 
            'actid'=>$data[$i]['actid'],
            'title'=>$data[$i]['strActName'],
            'configdesc'=>$data[$i]['strConfigDesc'], 
            'content'=>$data[$i]['strActDesc'], 
            'iTimeTick'=>$data[$i]['iTimeTick'],
            'iTimeInterval'=>$data[$i]['iTimeInterval'],
            'param'=> $this->getReward($data[$i]),  
            ); 
            $dbdata[$j++] = implode("@", $arract);
        } 
        $actdata = array(
            'createtime'=>date("Y-m-d h:i:s", time(0)),
            'creator'=>$_SESSION['account'],
            'actdata'=>  implode("#", $dbdata),
        );
        Activity_Service::addMultiActivity($actdata);
    }
        //上传活动配置
    public function LoadActivity() {
        
        $pathname = $_FILES['myfile'];
        $filename = time(0)."_upfile.xml";
        $filepath = '/tmp/'.$filename;
        
        if(is_uploaded_file($pathname['tmp_name']))
        {
          if(!move_uploaded_file($pathname['tmp_name'],$filepath))//上传文件，成功返回true    
          {
              $this->outputJson(-1,"上传失败");
          }
        }else
        {
            $this->outputJson(-1,"非法上传文件");
        }
        
        $data = $this->ReadActivityFile($filepath);        
        if (empty($data)||  !is_array($data)) {
            $this->outputJson(-1,"上传失败,请刷新重新上传");
        }
        //插入数据库
        $this->addActivityToDB($data);

         //删除文件
        @unlink ($filepath); 
       
        $this->outputJson(0,"上传成功");
    }
    public function ReadActivityFile($filepath) {
        
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
        
        foreach($lists->SQMPackActConfig as $table){
            $data[$i]['actid']= "$table->iId";
            $data[$i]['strActName'] = "$table->strActName";
            $data[$i]['iChestNum'] = "$table->iChestNum";
            $data[$i]['strActDesc'] = "$table->strActDesc";
            $data[$i]['strConfigDesc'] = "$table->strConfigDesc";
            $data[$i]['iTimeTick'] = "$table->iTimeTick";
            $data[$i]['iTimeInterval'] = "$table->iTimeInterval";            
            $j = 0;
            foreach ($table->stRewards as $value) {
                
            $data[$i][$j]["iRewardId"]="$value->iRewardId";
            $data[$i][$j]["iConditonType"]="$value->iConditonType";
            $data[$i][$j]["iRewarddesc"]="$value->iRewarddesc";
            $data[$i][$j]["iGetParam"]="$value->iGetParam";
            $data[$i][$j]["iChestId"]="$value->iChestId";
            $j++;
           }
            $i++;
        }
        return $data;
    }
  
     //宝箱与道具的转换
    public function getActType($data) {                 

        return $data[0]['acttype'];
    }
    public function boxToProp($data) {
        $LoadBox = new LoadBox_Model();       
        for($i = 0 ;$i < count($data);++$i)
        {
              $box = explode("|",$data[$i] ); 
              $param[$i] =  array(
                  'rewardid'=>$box[0],
                  'acttype'=>$box[1],                  
                  'rewarddesc'=>$box[4],
                  'condition'=>$box[2],
                  'param'=>  $this->typeTovalue($LoadBox->getBoxConfig($box[3])),
              );             
        }
        return $param;
    }
   
    public function typeTovalue($data) {
        
        for($i = 1; $i <= $data['thingtotal'];++$i)
        {
            $param[$i-1] = array(
                'thingID'=>$data["thing".$i."ID"],
                'thingtype'=> $this->getType($data["thing".$i."type"]),
                'thingnum'=>$data["thing".$i."num"],
            ); 
        }
        
        return $param;
    }
    
    public function getType($data) {
        foreach(Config::get("key.resourcetype") as $key=>$value)
        {
            if(trim($data) == trim($value))
            {
                return $key;
            }            
        }
        
        return 0;
    }
    
}