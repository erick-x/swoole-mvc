<?php
//活动管理模块

class Activity_Controller extends Module_Lib{
    public function activity(){
        $platform = Helper_Lib::getCookie("zoneid");
        $stServer = Platform_Model::getPlatformByID($platform);        
        $servers = Server_Service::gethefuServer($platform, $stServer);                
        $actdata = Activity_Service::loadActivity($stServer,1 );
        $data = array(
            'servers'=>$servers,
            'data' =>array("act1"=>$actdata),
            'submitActivity' => $this->checkPermission('activity/submitActivity'),
            'sendActivity' => $this->checkPermission('activity/sendActivity'),
            'deletActivity' => $this->checkPermission('activity/deletActivity'),
            'alertActivity' => $this->checkPermission('activity/alertActivity'),
            'alertSendActivity' => $this->checkPermission('activity/alertSendActivity'),
            'alertBookActivity' => $this->checkPermission('activity/alertBookActivity'),
        );
        $this->load_view("activity_list",$data);
    }
    
    public function index(){
        $platform = Helper_Lib::getCookie("zoneid");
        $stServer =  Platform_Model::getPlatformByID($platform);        
        $servers = Server_Service::getAllServers($platform, $stServer);     
        $param = $_GET['param'];
        $search = $_GET['search'];
        
        
        $actdata = Activity_Service::SearchActivity($stServer, $search, $param);
        $data = array(
            'servers'=>$servers,
            'data' =>array("act1"=>  $this->getsidActivity($actdata, $param, $search)),
            'alertSendActivity' => $this->checkPermission('activity/alertSendActivity'),
        );
        $this->load_view("searchactivity",$data);
    }
    
    public function getsidActivity($data,$sid,$search) {
        if( !isset($search) || $search != 1 )
         {
            return $data;
         }
        $retdata = array();
        $j = 0;
        for($i = 0; $i < count($data);++$i)
        {           
           $arraysid = explode(",", $data[$i]['sid']);
            if(in_array($sid,$arraysid) ==FALSE) 
            {
                continue;
            }
            $retdata[$j++] = $data[$i];
            
        }
        return $retdata;
    }
    public function getactivity() {
        $state = $_REQUEST['state'];
        $platform = Helper_Lib::getCookie("zoneid");
        $stServer =  Platform_Model::getPlatformByID($platform); 
        $actdata = Activity_Service::loadActivity($stServer,$state );
        if($state == 1 )
        {
             $this->outputJson(0,$this->act1($actdata));
        }else if( $state == 2)
        {
            $this->outputJson(0,$this->act2($actdata));
        }else if( $state == 3)
        {
            $this->outputJson(0,$this->act3($actdata));
        }else if( $state == 4)
        {
            $this->outputJson(0,$this->act4($actdata));
        }
        else if( $state == 5)
        {
            $this->outputJson(0,$this->act5($actdata));
        }
        $this->outputJson(-1,"failed");
    }
    
    public function act1($data) {

            $htmlpage = "<thead>
                        <tr>
                            <th>区服</th>
                            <th>活动名称</th>
                            <th>活动显示时间</th>
                            <th>活动结束时间</th>
                            <th>审核人</th>	
                            <th>操作</th>					
                        </tr>
                    </thead>
                    <tbody>";
             if (is_array($data) && !empty($data) )    
             {
                foreach ($data as $listdata)
                {
                    $htmlpage .= '<tr id='.$listdata['id'].'>';
                    $htmlpage .='<td data-name="id" style="display:none;">'.$listdata['id'].'</td>';
                    $htmlpage .='<td data-name="sid" style="display:none;">'.$listdata['sid'].'</td>';
                    $htmlpage .='<td data-name="actid" style="display:none;">'.$listdata['actid'].'</td>';
                    $htmlpage .='<td data-name="param" style="display:none;">'.$listdata['param'].'</td>';
                    $htmlpage .='<td data-name="configdesc" style="display:none;">'.$listdata['configdesc'].'</td>';
                    $htmlpage .='<td data-name="server" style="text-align: center;"><button class="btn btn-link lookserver" onclick="lookserver('.$listdata["id"].')">查看</button> </td>';
                    $htmlpage .='<td data-name="title" style="text-align: center;">'.$listdata['title'].'</td>';
                    $htmlpage .='<td data-name="starttime" style="text-align: center;">'.date('Y-m-d H:i:s',$listdata['starttime']).'</td>';
                    $htmlpage .='<td data-name="endtime" style="text-align: center;">'.date('Y-m-d H:i:s',$listdata['endtime']).'</td>';
                    $htmlpage .='<td data-name="content" style="display:none;">'.$listdata['content'].'</td>';
                    $htmlpage .='<td data-name="desc" style="display:none;">'.$listdata['desc'].'</td>';
                    $htmlpage .='<td data-name="creator" style="text-align: center;">'.$listdata['creator'].'</td>';
                    $htmlpage .='<td style=" text-align: center;"><button class="btn btn-link  lookBtn" onclick="lookBtn('.$listdata["id"].')" >配置</button>';
                    $htmlpage .='<button class="btn btn-link  lookBookBtn" onclick="lookBookBtn('.$listdata["id"].')">备注</button>';
                    $htmlpage .='<button class="btn btn-link submitBtn" onclick="submitBtn('.$listdata["id"].')">提交</button>';
                    $htmlpage .='<button class="btn btn-link delBtn" onclick="delBtn('.$listdata["id"].')">删除</button></td></tr>';
                } 
             }
             $htmlpage .="</tbody>";
             return $htmlpage;
}
public function act2($data) {

        $htmlpage  = "<thead>
                        <tr>
                            <th>区服</th>
                            <th>活动名称</th>
                            <th>活动显示时间</th>
                             <th>活动结束时间</th>
                            <th>审核人</th>	
                            <th>操作</th>					
                        </tr>
                    </thead>
                    <tbody>";
             if (is_array($data) && !empty($data) )    
             {
                foreach ($data as $listdata)
                {
                    $htmlpage .= '<tr id='.$listdata['id'].'>';
                    $htmlpage .='<td data-name="id" style="display:none;">'.$listdata['id'].'</td>';
                    $htmlpage .='<td data-name="sid" style="display:none;">'.$listdata['sid'].'</td>';
                    $htmlpage .='<td data-name="actid" style="display:none;">'.$listdata['actid'].'</td>';
                    $htmlpage .='<td data-name="param" style="display:none;">'.$listdata['param'].'</td>';
                    $htmlpage .='<td data-name="configdesc" style="display:none;">'.$listdata['configdesc'].'</td>';
                    $htmlpage .='<td data-name="server" style="text-align: center;"><button class="btn btn-link lookserver" onclick="lookserver('.$listdata["id"].')">查看</button> </td>';
                    $htmlpage .='<td data-name="title" style="text-align: center;">'.$listdata['title'].'</td>';
                    $htmlpage .='<td data-name="starttime" style="text-align: center;">'.date('Y-m-d H:i:s',$listdata['starttime']).'</td>';
                    $htmlpage .='<td data-name="endtime" style="text-align: center;">'.date('Y-m-d H:i:s',$listdata['endtime']).'</td>';
                    $htmlpage .='<td data-name="content" style="display:none;">'.$listdata['content'].'</td>';
                    $htmlpage .='<td data-name="desc" style="display:none;">'.$listdata['desc'].'</td>';
                    $htmlpage .='<td data-name="creator" style="text-align: center;">'.$listdata['creator'].'</td>';
                    $htmlpage .='<td style=" text-align: center;"><button class="btn btn-link  lookBtn" onclick="lookBtn('.$listdata["id"].')" >配置</button>';
                    $htmlpage .='<button class="btn btn-link  lookBookBtn" onclick="lookBookBtn('.$listdata["id"].')">备注</button>';
                    $htmlpage .='<button class="btn btn-link sendBtn" onclick="sendBtn('.$listdata["id"].')">审核</button>';
                    $htmlpage .='<button class="btn btn-link delBtn" onclick="delBtn('.$listdata["id"].')">删除</button></td></tr>';
                } 
             }
             $htmlpage .="</tbody>";
      
             return $htmlpage;
}
public function act3($data) {

        $htmlpage = "<thead>
                        <tr>
                            <th>区服</th>
                            <th>活动名称</th>
                            <th>活动显示时间</th>
                            <th>活动结束时间</th>
                            <th>备注</th>
                            <th>审核人</th>
                            <th>发送人</th>
                            <th>操作</th>					
                        </tr>
                    </thead>
                    <tbody >";

                foreach ($data as $listdata)
                {
                    
                    $htmlpage .= '<tr id="'.$listdata['id'].'">';
                    $htmlpage .='<td data-name="id" style="display:none;">'.$listdata['id'].'</td>';
                    $htmlpage .='<td data-name="sid" style="display:none;">'.$listdata['sid'].'</td>';
                    $htmlpage .='<td data-name="actid" style="display:none;">'.$listdata['actid'].'</td>';
                    $htmlpage .='<td data-name="param" style="display:none;">'.$listdata['param'].'</td>';
                    $htmlpage .='<td data-name="configdesc" style="display:none;">'.$listdata['configdesc'].'</td>';
                    $htmlpage .='<td data-name="server" style="text-align: center;"><button class="btn btn-link lookserver" onclick="lookserver('.$listdata["id"].')">查看</button></td>';
                    $htmlpage .='<td data-name="title" style="text-align: center;">'.$listdata['title'].'</td>';
                    $htmlpage .='<td data-name="starttime" style="text-align: center;">'.date('Y-m-d H:i:s',$listdata['starttime']).'</td>';
                    $htmlpage .='<td data-name="endtime" style="text-align: center;">'.date('Y-m-d H:i:s',$listdata['endtime']).'</td>';
                    $htmlpage .='<td data-name="content" style="display:none;">'.$listdata['content'].'</td>';
                    $htmlpage .='<td data-name="desc" style="text-align: center">'.$listdata['desc'].'</td>';
                    $htmlpage .='<td data-name="creator" style="text-align: center">'.$listdata['creator'].'</td>';
                    $htmlpage .='<td data-name="sender" style="text-align: center">'.$listdata['sender'].'</td>';
                    $htmlpage .='<td style=" text-align: center;"><button class="btn btn-link  lookBtn" onclick="lookBtn('.$listdata["id"].')" >配置</button>';
                    $htmlpage .='<button class="btn btn-link  lookBookBtn" onclick="lookBookBtn('.$listdata["id"].')" >备注</button>';
                    $htmlpage .=' <button  class="btn btn-link alertSendBtn" onclick="alertSendBtn('.$listdata["id"].')">修改发布</button></td></tr>';
                } 
                $htmlpage .="</tbody>";
             return $htmlpage;
}
public function act4($data) {

        $htmlpage  = "<thead>
                        <tr>
                            <th>区服</th>
                            <th>活动名称</th>
                            <th>活动显示时间</th>
                             <th>活动结束时间</th>
                             <th>备注</th>
                            <th>审核人</th>	
                            <th>操作</th>					
                        </tr>
                    </thead>
                    <tbody>";
             if (is_array($data) && !empty($data) )    
             {
                foreach ($data as $listdata)
                {
                    $htmlpage .= "<tr id={$listdata['id']}>";
                    $htmlpage .="<td data-name='id' style='display:none;'>{$listdata['id']}</td>";
                    $htmlpage .="<td data-name='sid' style='display:none;'>{$listdata['sid']}</td>";
                    $htmlpage .='<td data-name="actid" style="display:none;">'.$listdata['actid'].'</td>';
                    $htmlpage .='<td data-name="param" style="display:none;">'.$listdata['param'].'</td>';
                    $htmlpage .='<td data-name="configdesc" style="display:none;">'.$listdata['configdesc'].'</td>';
                    $htmlpage .='<td data-name="server" style="text-align: center;"><button class="btn btn-link lookserver" onclick="lookserver('.$listdata["id"].')">查看</button> </td>';
                    $htmlpage .='<td data-name="title" style="text-align: center;">'.$listdata['title'].'</td>';
                    $htmlpage .='<td data-name="starttime" style="text-align: center;">'.date('Y-m-d H:i:s',$listdata['starttime']).'</td>';
                    $htmlpage .='<td data-name="endtime" style="text-align: center;">'.date('Y-m-d H:i:s',$listdata['endtime']).'</td>';
                    $htmlpage .='<td data-name="content" style="display:none;">'.$listdata['content'].'</td>';
                    $htmlpage .='<td data-name="desc" style="text-align: center;">'.$listdata['desc'].'</td>';
                    $htmlpage .='<td data-name="creator" style="text-align: center;">'.$listdata['creator'].'</td>';
                    $htmlpage .='<td style=" text-align: center;"><button class="btn btn-link  lookBtn" onclick="lookBtn('.$listdata["id"].')" >配置</button>';
                    $htmlpage .='<button class="btn btn-link  lookBookBtn" onclick="lookBookBtn('.$listdata["id"].')" >备注</button>';                 
                    $htmlpage .='<button class="btn btn-link alertBtn" onclick="alertBtn('.$listdata["id"].')">修改</button>';
                    $htmlpage .='<button class="btn btn-link delBtn" onclick="delBtn('.$listdata["id"].')">删除</button></td></tr>';
                } 
             }
             $htmlpage .="</tbody>";
             return $htmlpage;
}

public function act5($data) {

        $htmlpage  = "<thead>
                        <tr>
                            <th>区服</th>
                            <th>活动名称</th>
                            <th>活动显示时间</th>
                             <th>活动结束时间</th>
                             <th>备注</th>
                            <th>审核人</th>
                            <th>操作</th>
                        </tr>
                    </thead>
                    <tbody>";
             if (is_array($data) && !empty($data) )    
             {
                foreach ($data as $listdata)
                {
                    $htmlpage .= '<tr id='.$listdata['id'].'>';
                    $htmlpage .='<td data-name="id" style="display:none;">'.$listdata['id'].'</td>';
                    $htmlpage .='<td data-name="sid" style="display:none;">'.$listdata['sid'].'</td>';
                    $htmlpage .='<td data-name="actid" style="display:none;">'.$listdata['actid'].'</td>';
                    $htmlpage .='<td data-name="param" style="display:none;">'.$listdata['param'].'</td>';
                    $htmlpage .='<td data-name="configdesc" style="display:none;">'.$listdata['configdesc'].'</td>';
                    $htmlpage .='<td data-name="server" style="text-align: center;"><button class="btn btn-link lookserver" onclick="lookserver('.$listdata["id"].')">查看</button> </td>';
                    $htmlpage .='<td data-name="title" style="text-align: center;">'.$listdata['title'].'</td>';
                    $htmlpage .='<td data-name="starttime" style="text-align: center;">'.date('Y-m-d H:i:s',$listdata['starttime']).'</td>';
                    $htmlpage .='<td data-name="endtime" style="text-align: center;">'.date('Y-m-d H:i:s',$listdata['endtime']).'</td>';
                    $htmlpage .='<td data-name="content" style="display:none;">'.$listdata['content'].'</td>';
                    $htmlpage .='<td data-name="desc" style="text-align: center;">'.$listdata['desc'].'</td>';
                    $htmlpage .='<td data-name="creator" style="text-align: center;">'.$listdata['creator'].'</td>';
                    $htmlpage .='<td style=" text-align: center;"><button class="btn btn-link  lookBtn" onclick="lookBtn('.$listdata["id"].')" >配置</button>';
                    $htmlpage .='<button class="btn btn-link  lookBookBtn" onclick="lookBookBtn('.$listdata["id"].')" >备注</button>';  
                } 
             }
             $htmlpage .="</tbody>";
             return $htmlpage;
}
    public function loadactivity() {
        
        $arrsid = $_POST['sid'];
        if(!isset($arrsid))
        {
            $this->outputJson(-1, '请勾选区服列表');
        }
        $platform = Helper_Lib::getCookie("zoneid");
        $stServer =  Platform_Model::getPlatformByID($platform);
        
        for($i = 0; $i <count( $arrsid );++$i)
        {
            $this->getActivityList( $platform,$stServer,$arrsid[$i] ); 
        }
           
        $this->outputJson(0, '加载成功');
        
    }
    public function alertActivity() {
        
        if (empty($_POST['desc'])) {
            $this->outputJson(-1, '请填写备注');
        }      
        if (empty($_POST['starttime'])) {
            $this->outputJson(-1, '请填写开始时间');
        }
        if (empty($_POST['endtime'])) {
            $this->outputJson(-1, '请填写结束时间');
        }
        
        $id = $_POST['id'];
        $platform = Helper_Lib::getCookie("zoneid");
        $stServer =  Platform_Model::getPlatformByID($platform);
        if(empty($stServer))
        {
            $this->outputJson(-1, '修改失败，无法获取对应服务器信息');
        }
        $data = array(
            'sid'=>$_POST['sid'],
            'starttime'=>  strtotime($_POST['starttime']),
            'endtime'=>strtotime($_POST['endtime']),
            'desc'=>$_POST['desc'],
            'state'=>1,  //未审核
            'creator'=>$_SESSION['account'],
        );
        
        $ret = Activity_Service::updateActivity($data, $id, $stServer);
        if (!$ret) {
                $this->outputJson(-2, '数据库执行失败！' );
        }
            
        $this->outputJson(0, '修改成功');
    }
    
     public function deletActivity() {
        $id = $_POST['id'];
        $platform = Helper_Lib::getCookie("zoneid");
        $stServer =  Platform_Model::getPlatformByID($platform);
        if(empty($stServer))
        {
            $this->outputJson(-1, '创建失败，无法获取对应信息');
        }
         $ret = Activity_Service::delActivity( $id, $stServer);
        if (!$ret) {
                $this->outputJson(-2, '数据库执行失败！' );
            }  
         $this->outputJson(0, '删除成功');   
    }
    
    public function submitActivity() {
        
        $id = $_POST['id'];
        if (empty($_POST['starttime'])) {
            $this->outputJson(-1, '请填写开始时间');
        }
        if (empty($_POST['endtime'])) {
            $this->outputJson(-1, '请填写结束时间');
        }
        
        $platform = Helper_Lib::getCookie("zoneid");
        $stServer =  Platform_Model::getPlatformByID($platform);
        if(empty($stServer))
        {
            $this->outputJson(-1, '创建失败，无法获取对应信息');
        }
        $data = array(
            'starttime'=>  strtotime($_POST['starttime']),
            'endtime'=>strtotime($_POST['endtime']),
            'state'=>2,  //审核中
        );
        
        $ret = Activity_Service::updateActivity($data, $id, $stServer);
        if (!$ret) {
                $this->outputJson(-2, '数据库执行失败！' );
            }
            
        $this->outputJson(0, '提交成功');
    }
    
    public function sendActivity() {
       
        if($_POST['result'] < 1 || $_POST['result'] > 2) {
            $this->outputJson(-1, '请选择审核结果');
        }

        $sid = $_POST['sid'];
        $platform = Helper_Lib::getCookie("zoneid");
         $param = explode("$", $_POST['param']);
        $stServer =  Platform_Model::getPlatformByID($platform);
        if(empty($stServer))
        {
            $this->outputJson(-1, '创建失败，无法获取对应信息');
        }
        
        if( $_POST['result'] == 1)
        {
            $state = 3;//发布中
        }else{
            $state = 4;//未通过
        }
        $data = array(
            'state'=>$state,  
            'sender'=>$_SESSION['account'],
        );
        
        $logdata = array(
                'f_platform'=>$platform,
                'f_account'=>$_SESSION['account'],
                'f_addtime'=>date("Y-m-d H:i:s", time()),
                'f_sid'=>$sid,
                'f_ip'=>$stServer['sid_ip'],
        );
          
        $logtype = 'addactivity';
        $logParams = array('title'=>$_POST['title']);
        ManagerLog_Service::insertManagerLog($logdata, $logtype, $logParams);

        if($_POST['result'] == 1)
        {
            $senddata = array(
              'id'=>$_POST['id'],
              'actid'=>$_POST['actid'],
              'starttime'=>strtotime($_POST['starttime']),
              'endtime'=>strtotime($_POST['endtime']),
              'content'=>$_POST['content'],
              'title'=>$_POST['title'],
              'param'=>$this->boxToProp($param),
              'account'=>$_SESSION['account'],
          );
            
        $arrsid = explode(",", $sid);  
        $failact = array();
        for($i = 0; $i< count($arrsid);++$i)
        {  	  
            $Server = Server_Service::getServerByPtAndId($platform,$arrsid[$i],$stServer);
            $ret1 = Activity_Service::sendActivity($senddata,$Server);
            if(!$ret1)
            {
                $flag[$i] = $arrsid[$i];
            }
        }

          if(count($flag) ==0 && count($failact) == 0 )
          {
            $ret = Activity_Service::updateActivity($data, $_POST['id'], $stServer);
            if (!$ret) {           
                $this->outputJson(-2, '数据库执行失败！' );
            }         
            $this->outputJson(0, '发布成功'); 
            
          }
          if(count($failact) != 0)
          {
               $this->outputJson(-1, '发布重复的活动有 '.  implode(",",$failact) );
          }
          if( count( $flag) != 0)
          {
            $this->outputJson(-1, '发布失败服务器ID '.  implode(",",$flag) ); 
          }
        }else{
            $ret = Activity_Service::updateActivity($data, $_POST['id'], $stServer);
            if (!$ret) {           
                $this->outputJson(-2, '数据库执行失败！' );
            }
            $this->outputJson(0, '已更新状态，未发布'); 
        }
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
        
        $ret = Activity_Service::updateActivity($data, $_POST['id'], $stServer);
        if (!$ret) {
            
            $this->outputJson(-2, '数据库执行失败！' );
        }
        
        $this->outputJson(0, '修改备注内容成功！' );
    }
    
    public function alertSendActivity() {
       
        if($_POST['result'] < 1 || $_POST['result'] > 2) {
            $this->outputJson(-1, '请选择审核结果');
        }
        if(empty($_POST['reason']))
        {
            $this->outputJson(-1, '请填写修改理由，必填');
        }
        $sid = $_POST['sid'];
        $platform = Helper_Lib::getCookie("zoneid");
        $stServer =  Platform_Model::getPlatformByID($platform);
        
        if(empty($stServer))
        {
            $this->outputJson(-1, '创建失败，无法获取对应信息');
        }
        
        $retdata  = Activity_Service::getActivity($_POST['id'], $stServer);
        if($retdata['endtime']<  time(0) )
        {
            $this->outputJson(0, '已经过期，不能修改');
        }
        $state = 3;
        if($_POST['result'] == 2)
        {
            $state = 5; //直接设置为失效
        }
        
        $data = array(    
            'state'=>$state,  
            'starttime'=>strtotime($_POST['starttime']),
            'endtime'=>strtotime($_POST['endtime']),
            'sender'=>$_SESSION['account'],
            'reason'=>$_POST['reason'],
        );
        
        $ret = Activity_Service::updateActivity($data, $_POST['id'], $stServer);
        if (!$ret) {
            
            $this->outputJson(-2, '数据库执行失败！' );
        }
        
        if($_POST['result'] ==1)
        {
            $senddata = array(
             'id'=>$_POST['id'],
             'actid'=>$_POST['actid'],
             'starttime'=>strtotime($_POST['starttime']),
             'endtime'=>strtotime($_POST['endtime']),
             'content'=>$_POST['content'],
             'title'=>$_POST['title'],
             'param'=>$_POST['param'],
             'account'=>$_SESSION['account'],
            );
            $arrsid = explode(",", $sid); //获取区服列表
            
            for($i = 0; $i< count($arrsid);++$i)
            {
                $Server = Server_Service::getServerByPtAndId($platform,$arrsid[$i],$stServer);
                $ret = Activity_Service::sendAlertActivity($senddata,$Server);
                if(!$ret)
                {
                    $flag[$i] = $arrsid[$i];
                }
            }

            if(count($flag) ==0 )
            {
               $this->outputJson(0, '修改发布成功'); 
            }

            $this->outputJson(-1, '修改发布失败服务器ID '.  implode(",",$flag) );      
        }  else {
             $this->outputJson(0, '已撤销，归并到失效中'); 
        }
          
    }
    
   public function getActivityList($platform,$stServer,$sid)
   {
       $data = array(
           'account'=>$_SESSION['account']
       );
       
      $servers = Server_Service::getServerByPtAndId($platform,$sid,$stServer);
      
      if(!empty($servers) && is_array($servers))
      {

            Activity_Service::getActivityList($data,$servers);

      }
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
