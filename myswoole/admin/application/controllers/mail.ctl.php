<?php

/**
 * 邮件系统
 */
class Mail_Controller extends Module_Lib {

    public function show() {
        $createTime = empty($_GET['createTime'])? date('Y-m-d H:i:s',0):$_GET['createTime'];
        $endtime = empty($_GET['endtime'])? date('Y-m-d H:i:s',time(0)+3600*24*60):$_GET['endtime'];
        $iplatform = Helper_Lib::getCookie("zoneid");
        if($iplatform == 0)
        {
           $this->outputJson(0, '平台验证出错！' ); 
        }
        
        $awhere = array(
           "createtime"=> strtotime($createTime),
           "endtime"=>strtotime($endtime),
        );
        
        $stServer =  Platform_Model::getPlatformByID($iplatform);  //暂时平台iplatform为设置
        $data = Mail_Service::getNoPassMail($awhere,$stServer); 
       
        $senddata = array(
            'name'=>$data['name'],
            'data'=>$data['data'],
            'delMail'=> $this->checkPermission('mail/delMail'),
            'submitMail'=>$this->checkPermission('mail/submitMail'),
            'editMail'=>$this->checkPermission('mail/editMail'),          
             );
        $this->load_view('mail',$senddata);
    }
    
    public function showmail() {
        //获取服务器列表
        $stServer =  Platform_Model::getPlatformByID($_COOKIE['zoneid']); 
        $servers = Server_Service::getAllServers($_COOKIE['zoneid'], $stServer);  
         $senddata = array(
            'servers'=>$servers,
            'addPerMail'=>$this->checkPermission('mail/addPerMail'),
            'addSerMail'=>$this->checkPermission('mail/addSerMail'),
            'addAllMail'=>$this->checkPermission('mail/addAllMail'),
            'addUser'=>  $this->checkPermission('mail/addUser'),
            'delMail'=>  $this->checkPermission('mail/delMail'),
             );
        $this->load_view('createmail', $senddata);
    }
    public function managemail() {
        //获取服务器列表
        $createTime = empty($_GET['createTime'])? 0:strtotime($_GET['createTime']);
        $endtime = empty($_GET['endtime'])? time(0)+3600*24*60:strtotime($_GET['endtime']);
        $iplatform = Helper_Lib::getCookie("zoneid");
        if($iplatform == 0)
        {
           $this->outputJson(0, '平台验证出错！' ); 
        }
        $stServer =  Platform_Model::getPlatformByID($iplatform);  //暂时平台iplatform为设置
        
       // $page = empty($_GET['p']) ? 1 : $_GET['p']
       // $pagesize = empty($_GET['pagesize']) ? 10 : $_GET['pagesize'];
        //$total = Mail_Service::getTotalMail($stServer);
       // $pagehtml = htmlspecialchars(Helper_Lib::getPageHtml($total, $page, $pagesize));
        $awhere = array(
           "createtime"=> $createTime,
           "endtime"=>$endtime,
        );
        
        $lookdata = Mail_Service::getLookMail($awhere,$stServer); 
        $revokedata = Mail_Service::getRevokePassMail($awhere,$stServer); 
        $Alsenddata = Mail_Service::getAlreadySendMail($awhere,$stServer);
        $senddata = array(
        //    'pagehtml'=>$pagehtml,
            'lookname'=>$lookdata['name'],
            'lookdata'=>$lookdata['data'],
            'revokename'=>$revokedata['name'],
            'revokedata'=>$revokedata['data'],
            'alsendname'=>$Alsenddata['name'],
            'alsenddata'=>$Alsenddata['data'],
            'passMail'=> $this->checkPermission('mail/passMail'),
            'sendMail'=>$this->checkPermission('mail/sendMail'),
            'sendAllMail'=>$this->checkPermission('mail/sendAllMail'),
            'editMail'=>$this->checkPermission('mail/editMail'),
            'revokeMail'=>$this->checkPermission('mail/revokeMail'),
            'delMail'=>  $this->checkPermission('mail/delMail'),
            );
        $this->load_view('managermail',  $senddata);
    }
    
    public function revokeMail() {
        if($_POST['id']< 0)
        {
            $this->outputJson(-1, '撤回邮件的ID错误！' ); 
        }
         
        if(empty($_POST['sid']))
        {
          $this->outputJson(0, '区服错误，请重新填写'.$_POST['sid']);  
        } 
        $iplatform = Helper_Lib::getCookie("zoneid");
        if($iplatform == 0)
        {
           $this->outputJson(0, '平台验证出错！' ); 
        }
        $data = array(
             'statu'=>'已撤回',
        );
               
        $arrsid = explode(",", $_POST['sid']);
        
        $stServer =  Platform_Model::getPlatformByID($iplatform);  //暂时平台iplatform为设置  
        $senddata = array(
            'id'=>$_POST['id'],
            'account'=>$_SESSION['account'],
            );
            $ret = Mail_Service::update($data,$_POST['id'],$stServer);           
            if (!$ret) {
                    $this->outputJson(-2, '数据库执行失败！' );
            } 
            
        
        $logdata = array(
                'f_platform'=>$iplatform,
                'f_account'=>$_SESSION['account'],
                'f_addtime'=>date("Y-m-d H:i:s", time()),
                'f_sid'=>$_POST['sid'],
                'f_ip'=>$stServer['sid_ip'],
            );
          
            $logtype = 'revokemail';
            $logParams = array('id'=>$_POST['id']);
            ManagerLog_Service::insertManagerLog($logdata, $logtype, $logParams);
            
            
        try {
                for($i = 0; $i< count($arrsid);++$i)
                {
                    $Server = Server_Service::getServerByPtAndId($iplatform,$arrsid[$i],$stServer);
                    $result = Mail_Service::RevokeMail($senddata, $Server);
                    if(!$result)
                    {
                        $flag[$i] = $arrsid[$i];
                    }  
                }
            
            
        } catch (Exception_Lib $e) {
            $this->outputJson($e->getCode(), $e->getMessage());
        }
        
        if(empty($flag))
        {
             $this->outputJson(0, '撤回成功' ); 
        }  else {
            $this->outputJson(0, ' 撤回失败 服务器有 ' . implode(",", $flag)); 
        }
            
        
    }
    public function sendMail() {
       $i = 0;
       if( $_POST['coin'] != 0)
       {
           $attachment[$i++] = array(
               'proptype'=>'207',
               'propid'=>0,
               'propnum'=>$_POST['coin']
           );
       }
        if ( $_POST['money'] != 0)
        {
            $attachment[$i++] = array(
               'proptype'=>'206',
               'propid'=>0,
               'propnum'=>$_POST['money']
           ); 
        }
        if ( $_POST['herosoul'] != 0)
        {
            $attachment[$i++] = array(
               'proptype'=>'20003',
               'propid'=>0,
               'propnum'=>$_POST['herosoul']
           ); 
        }
        if ( $_POST['equipsoul'] != 0)
        {
            $attachment[$i++] = array(
                'proptype'=>'20013',
               'propid'=>0,
               'propnum'=>$_POST['equipsoul']
           ); 
        }

        if ( $_POST['honour'] != 0)
        {
            $attachment[$i++] = array(
               'proptype'=>'20005',
               'propid'=>0,
               'propnum'=>$_POST['honour']
           ); 
        }

        if ( $_POST['honor_s'] != 0)
        {
            $attachment[$i++] = array(
               'proptype'=>'20012',
               'propid'=>0,
               'propnum'=>$_POST['honor_s']
           ); 
        }
        if ( $_POST['heroid'] != 0 && $_POST['heronum'] != 0 )
        {
            $attachment[$i++] = array(
                'proptype'=>'219',
                'propid'=>$_POST['heroid'] ,
                'propnum'=>$_POST['heronum'],
           ); 
        }
        if ( $_POST['equipid'] != 0 && $_POST['equipnum'] != 0 )
        {
            $attachment[$i++] = array(
                'proptype'=>'215',
                'propid'=>$_POST['equipid'] ,
                'propnum'=>$_POST['equipnum'],
           ); 
        }
        if ( $_POST['propid1'] != 0 && $_POST['propnum1'] != 0 )
        {
            $attachment[$i++] = array(
               'proptype'=>'210',
                'propid'=>$_POST['propid1'],
                'propnum'=>$_POST['propnum1'],
           ); 
        }
        
        if ( $_POST['propid2'] != 0 && $_POST['propnum2'] != 0 )
        {
            $attachment[$i++] = array(
                'proptype'=>'210',
                'propid'=>$_POST['propid2'],
                'propnum'=>$_POST['propnum2'],
           ); 
        }
        
        if ( $_POST['propid3'] != 0 && $_POST['propnum3'] != 0 )
        {
            $attachment[$i++] = array(
                'proptype'=>'210',
                'propid'=>$_POST['propid3'],
                'propnum'=>$_POST['propnum3'],
           ); 
        }
        
        if ( $_POST['propid4'] != 0 && $_POST['propnum4'] != 0 )
        {
            $attachment[$i++] = array(
                'proptype'=>'210',
                'propid'=>$_POST['propid4'],
                'propnum'=>$_POST['propnum4'],
           ); 
        }

        if(empty($_POST['title']))
        {
            $this->outputJson(-1,'请填写标题');
        }
         if(empty($_POST['context']))
        {
            $this->outputJson(-1, '内容不能为空');
        }
        
        if(empty($_POST['sid']))
        {
          $this->outputJson(-1, '区服错误，请重新填写');  
        }
        $iplatform = Helper_Lib::getCookie("zoneid");
        if($iplatform == 0)
        {
           $this->outputJson(0, '平台验证出错！' ); 
        }
         $data = array(
             'statu'=>'已发送',
        );
        $stServer =  Platform_Model::getPlatformByID($iplatform);  //暂时平台iplatform为设置      
        
        $sidarray = explode(",", $_POST['sid']);
        $rolearray = explode(",", $_POST['roleid']);
        for($i = 0; $i < count($sidarray);++$i)
        {
            try {       
                   $senddata = array(
                  'id'=>$_POST['id'],
                  'roleid'=>$rolearray[$i],
                  'sendtime'=>strtotime($_POST['sendtime']),
                  'title'=>$_POST['title'],
                  'context'=>$_POST['context'],
                  'account'=>$_SESSION['account'],
                  'attachment'=>$attachment,
                  'return'=>$_POST['id']
              );
              $ret = Mail_Service::update($data,$_POST['id'],$stServer);           
              if (!$ret) {
                      $this->outputJson(-2, '数据库执行失败！' );
              }
              $Server = Server_Service::getServerByPtAndId($iplatform,$sidarray[$i],$stServer);
              $result = Mail_Service::SendMail($senddata, $Server);
              if(!$result)
              {
                  $this->outputJson(0, '服务器响应失败，请检查服务器');
              }

              } catch (Exception_Lib $e) {
                  $this->outputJson($e->getCode(), $e->getMessage());
              }  
        }
        
   
        $this->outputJson(0, '发送成功');       
    }
    
    public function sendAllMail() {
       $i = 0;
       if( $_POST['coin'] != 0)
       {
           $attachment[$i++] = array(
               'proptype'=>'207',
               'propid'=>0,
               'propnum'=>$_POST['coin']
           );
       }
        if ( $_POST['money'] != 0)
        {
            $attachment[$i++] = array(
               'proptype'=>'206',
               'propid'=>0,
               'propnum'=>$_POST['money']
           ); 
        }
        if ( $_POST['herosoul'] != 0)
        {
            $attachment[$i++] = array(
               'proptype'=>'20003',
               'propid'=>0,
               'propnum'=>$_POST['herosoul']
           ); 
        }
        if( $_POST['equipsoul'] != 0)
        {
            $attachment[$i++] = array(
                'proptype'=>'20013',
               'propid'=>0,
               'propnum'=>$_POST['equipsoul']
           ); 
        }

        if ( $_POST['honour'] != 0)
        {
            $attachment[$i++] = array(
               'proptype'=>'20005',
               'propid'=>0,
               'propnum'=>$_POST['honour']
           ); 
        }

        if ( $_POST['honor_s'] != 0)
        {
            $attachment[$i++] = array(
               'proptype'=>'20012',
               'propid'=>0,
               'propnum'=>$_POST['honor_s']
           ); 
        }
        
        if ( $_POST['heroid'] != 0 && $_POST['heronum'] != 0 )
        {
            $attachment[$i++] = array(
                'proptype'=>'219',
                'propid'=>$_POST['heroid'] ,
                'propnum'=>$_POST['heronum'],
           ); 
        }
        if ( $_POST['equipid'] != 0 && $_POST['equipnum'] != 0 )
        {
            $attachment[$i++] = array(
                'proptype'=>'215',
                'propid'=>$_POST['equipid'] ,
                'propnum'=>$_POST['equipnum'],
           ); 
        }
      if ( $_POST['propid1'] != 0 && $_POST['propnum1'] != 0 )
        {
            $attachment[$i++] = array(
               'proptype'=>'210',
                'propid'=>$_POST['propid1'],
                'propnum'=>$_POST['propnum1'],
           ); 
        }
        
         if ( $_POST['propid2'] != 0 && $_POST['propnum2'] != 0 )
        {
            $attachment[$i++] = array(
                'proptype'=>'210',
                'propid'=>$_POST['propid2'],
                'propnum'=>$_POST['propnum2'],
           ); 
        }
        
        if ( $_POST['propid3'] != 0 && $_POST['propnum3'] != 0 )
        {
            $attachment[$i++] = array(
                'proptype'=>'210',
                'propid'=>$_POST['propid3'],
                'propnum'=>$_POST['propnum3'],
           ); 
        }
        
        if ( $_POST['propid4'] != 0 && $_POST['propnum4'] != 0 )
        {
            $attachment[$i++] = array(
                'proptype'=>'210',
                'propid'=>$_POST['propid4'],
                'propnum'=>$_POST['propnum4'],
           ); 
        }

        if(empty($_POST['title']))
        {
            $this->outputJson(-1,'请填写标题');
        }
         if(empty($_POST['context']))
        {
            $this->outputJson(-1, '内容不能为空');
        }      
        if(empty($_POST['sid']))
        {
          $this->outputJson(-1, '区服错误，请重新填写');  
        }
        $iplatform = Helper_Lib::getCookie("zoneid");
        if($iplatform == 0)
        {
           $this->outputJson(0, '平台验证出错！' ); 
        }
        $data = array(
             'statu'=>'已发送',
        );
        $senddata = array(
            'id'=>$_POST['id'],
            'roleid'=>$_POST['roleid'],
            'sendtime'=>strtotime($_POST['sendtime']),
            'title'=>$_POST['title'],
            'context'=>$_POST['context'],
            'account'=>$_SESSION['account'],
            'attachment'=>$attachment,
            'return'=>$_POST['id'],
            'guild'=>$_POST['guild'],
            'begintime'=>$_POST['begintime'],
            'endtime'=>$_POST['endtime'],
            'maxrole'=>$_POST['maxrole'],
            'minrole'=>$_POST['minrole'],
            'maxvip'=>$_POST['maxvip'],
            'minvip'=> $_POST['minvip'],
            );
        $serarray = explode(',', $_POST['sid']); 
        $stServer =  Platform_Model::getPlatformByID($iplatform);  //暂时平台iplatform为设置
        $ret = Mail_Service::update($data,$_POST['id'],$stServer);           
        if (!$ret) {
                    $this->outputJson(-2, '数据库执行失败！' );
        }
        for($i = 0;$i<count($serarray);++$i)
        {
            try {
             
                $Server = Server_Service::getServerByPtAndId($iplatform,$serarray[$i],$stServer);
                $result = Mail_Service::SendAllMail($senddata, $Server);
                if(!$result)
                {
                   $flag[$i] =$serarray[$i]; 
                }

            } catch (Exception_Lib $e) {
                $this->outputJson($e->getCode(), $e->getMessage());
            }
        }
        if(count($flag) != 0)
        {
            $this->outputJson(0, '发送失败的服务器'.implode(",", $flag));
        }else
        {
            $this->outputJson(0, '发送成功');
        }   
    }
    
    public function passMail() {
        if(empty($_POST['id']))
        {
            $this->outputJson(-1, '没有对应的ID可用,请刷新');
        }
        if(empty($_POST['result']))
        {
            $this->outputJson(-1, '请选择审核结果');
        }
        
        $iplatform = Helper_Lib::getCookie("zoneid");
        if($iplatform == 0)
        {
           $this->outputJson(0, '平台验证出错！' ); 
        }
        $data = array(
             'statu'=>( $_POST['result'] ==1 )?'已审核':"未通过",
             'author'=>$_SESSION['account'],
             'mark'=>$_POST['id']
        );
        $stServer =  Platform_Model::getPlatformByID($iplatform);  //暂时平台iplatform为设置      
        try {
            $ret = Mail_Service::update($data,$_POST['id'],$stServer);           
            if (!$ret) {
                $this->outputJson(-2, '数据库执行失败！' );
            }  
        } catch (Exception_Lib $e) {
            $this->outputJson($e->getCode(), $e->getMessage());
        }
        if($_POST['result'] != 1)
        {
            $this->outputJson(0, '审核未通过，已归入新建列表');
        }
        $this->outputJson(0, '审核通过，更新成功');
    }
     
    public function editMail() {
        if(empty($_POST['id']))
        {
            $this->outputJson(-1, '没有对应的ID可用,请刷新');
        }
        if(empty($_POST['context']))
        {
            $this->outputJson(-1, '内容为空，请填写新内容');
        }
        if(empty($_POST['title']))
        {
            $this->outputJson(-1, '标题为空，请填写新标题');
        }
        
        $iplatform = Helper_Lib::getCookie("zoneid");
        if($iplatform == 0)
        {
           $this->outputJson(0, '平台验证出错！' ); 
        }
        $data = array(
             'context'=>$_POST['context'],
             'title'=>$_POST['title'],
        );
        $stServer =  Platform_Model::getPlatformByID($iplatform);  //暂时平台iplatform为设置           
        try {
            $ret = Mail_Service::update($data,$_POST['id'],$stServer);           
            if (!$ret) {
                $this->outputJson(-2, '数据库执行失败！' );
            }  
        } catch (Exception_Lib $e) {
            $this->outputJson($e->getCode(), $e->getMessage());
        }
        $this->outputJson(0, '更新成功');
    }
    public function delMail() {
        if(empty($_POST['id']))
        {
            $this->outputJson(-1, '没有对应的ID可删除,请刷新');
        }
        $iplatform = Helper_Lib::getCookie("zoneid");
       if($iplatform == 0)
        {
           $this->outputJson(0, '平台验证出错！' ); 
        }
        $stServer =  Platform_Model::getPlatformByID($iplatform);  //暂时平台iplatform为设置  
         $logdata = array(
                'f_platform'=>$iplatform,
                'f_account'=>$_SESSION['account'],
                'f_addtime'=>date("Y-m-d H:i:s", time()),
                'f_ip'=>$stServer['sid_ip'],
            );
          
            $logtype = 'delmail';
            $logParams = array('id'=>$_POST['id']);
            ManagerLog_Service::insertManagerLog($logdata, $logtype, $logParams);

        try {
            $ret = Mail_Service::delMail($_POST['id'],$stServer);           
            if (!$ret) {
                $this->outputJson(-2, '数据库执行失败！' );
            }  
        } catch (Exception_Lib $e) {
            $this->outputJson($e->getCode(), $e->getMessage());
        }
        $this->outputJson(0, '删除成功');
        
    }
    
    public function submitMail() {
        if(empty($_POST['id']))
        {
            $this->outputJson(-1, '没有对应的ID可用,请刷新');
        }
        $iplatform = Helper_Lib::getCookie("zoneid");
        if($iplatform == 0)
        {
           $this->outputJson(0, '平台验证出错！' ); 
        }
         $data = array(
             'statu'=>'审核中',
             'mark'=>$_POST['id']
             );
        $stServer =  Platform_Model::getPlatformByID($iplatform);  //暂时平台iplatform为设置      
        try {
            $ret = Mail_Service::update($data,$_POST['id'],$stServer);           
            if (!$ret) {
                $this->outputJson(-2, '数据库执行失败！' );
            }  
        } catch (Exception_Lib $e) {
            $this->outputJson($e->getCode(), $e->getMessage());
        }
        $this->outputJson(0, '提交成功');
    }
    public function CheckProp() {
        $ret = Mail_Service::CheckProp($_POST['id'],$_POST['type']);
        if(!$ret)
        {
            $this->outputJson(-1, '输入的ID无效');
        }
        $this->outputJson(0, '');
    }
    public function addPerMail() {
        
       if(empty($_POST['sid']))
        {
            $this->outputJson(-1, '区服为空，请填写区服');
        }
        
        if(empty($_POST['roleid'])||!is_numeric($_POST['roleid'])|| $_POST['roleid'] <10000)
        {
            $this->outputJson(-1, '请检查是角色ID数字且大于10000，或者为空');
        }
        if(empty($_POST['sendtime']))
        {
            $this->outputJson(-1, '请选择发送时间');
        }
//        if(strtotime($_POST['sendtime'])-time(0)>3600*24*3)
//        {
//            $this->outputJson(-1, '发送时间不能超过3天，请重新填写');
//        }
        if(empty($_POST['mailtitle']))
        {
            $this->outputJson(-1, '邮件标题不能为空');
        }
        if(empty($_POST['context']))
        {
            $this->outputJson(-1, '请填写邮件内容');
        }
        
        $checkbox = $_POST['checkbox'];
        if(count($checkbox) >4 )
        {
            $this->outputJson(-1, '附件勾选超过上限，请保留四个');
        }
        if(!empty($checkbox))
        {
            for($i = 0; $i < count($checkbox);++$i)
            {
                if($checkbox[$i] =='coin')
                {
                   if(empty($_POST['coin'])||!is_numeric($_POST['coin']) )
                    {
                        $this->outputJson(-1, '请填写有效附件金币数额');
                    } 
                    $coin = 0;
                    if(! Mail_Service::CheckValue("gold", $_POST['coin']))
                    {
                        $this->outputJson(-1, '附件金币数额超过设置上限');
                    }  else {
                        $coin = $_POST['coin'];
                    }
                }
                if($checkbox[$i] =='herosoul')
                {
                    if(empty($_POST['herosoul'])||!is_numeric($_POST['herosoul']))
                    {
                        $this->outputJson(-1, '请填写有效附件英雄魂石数额');
                    }
                    $herosoul = 0;
                    if(! Mail_Service::CheckValue( 'souljade',$_POST['herosoul']))
                    {
                        $this->outputJson(-1, '附件魂石数额超过设置上限');
                    }  else {
                        $herosoul = $_POST['herosoul'];
                    }
                        
                }
                if($checkbox[$i] =='equipsoul')
                {
                    if(empty($_POST['equipsoul'])||!is_numeric($_POST['equipsoul']))
                    {
                        $this->outputJson(-1, '请填写有效附件装备魂石数额');
                    }
                    $equipsoul = 0;
                    if(! Mail_Service::CheckValue('equipjade', $_POST['equipsoul']))
                    {
                        $this->outputJson(-1, '附件魂石数额超过设置上限');
                    }  else {
                        $equipsoul = $_POST['equipsoul'];
                    }
                        
                }
                if($checkbox[$i] =='honor_s')
                {
                    if(empty($_POST['honor_s'])||!is_numeric($_POST['honor_s']))
                    {
                        $this->outputJson(-1, '请填写有效附件声望数值');
                    }
                    $honor_s = 0;
                    if(! Mail_Service::CheckValue('prestige' ,$_POST['honor_s']))
                    {
                        $this->outputJson(-1, '附件声望超过设置上限'.$_POST['honor_s']);
                    }  else {
                        $honor_s = $_POST['honor_s'];
                    }
                        
                }
                
                if($checkbox[$i] =='money')
                {
                    if(empty($_POST['money'])||!is_numeric($_POST['money']))
                    {
                        $this->outputJson(-1, '请填写有效附件钻石数量');
                    }
                    
                    $money = 0;
                    if(! Mail_Service::CheckValue('diamond',$_POST['money']))
                    {
                        $this->outputJson(-1, '附件钻石数额超过设置上限');
                    }  else {
                     $money = $_POST['money'];    
                    }
                }
                if($checkbox[$i] =='honour')
                {
                    if(empty($_POST['honour'])||!is_numeric($_POST['honour']))
                    {
                        $this->outputJson(-1, '请填写有效附件荣誉点数额');
                    }
                    $honour = 0;
                    if(! Mail_Service::CheckValue('honour',$_POST['honour']))
                    {
                        $this->outputJson(-1, '附件荣誉点数额超过设置上限');
                    }  else {
                        $honour = $_POST['honour'];
                    }
                }
                if($checkbox[$i] =='heroid')
                {
                    if(empty($_POST['heroid'])||!is_numeric($_POST['heroid']))
                    {
                        $this->outputJson(-1, '请填写有效附件卡牌ID');
                    }
                    if(empty($_POST['heronum'])||!is_numeric($_POST['heronum']))
                    {
                        $this->outputJson(-1, '请填写有效附件卡牌数量');
                    }
                    if( !Mail_Service::CheckProp($_POST['heroid'],1))
                    {
                        $this->outputJson(-1, '非英雄ID '.$_POST['heroid']." 请重新填写");
                    }
                    $heronum = 0;
                    if(! Mail_Service::CheckValue($_POST['heroid'],$_POST['heronum']))
                    {
                        $this->outputJson(-1, '附件卡牌数量超过设置上限');
                    }  else {
                        $heronum = $_POST['heronum'];
                    }
                }
                if($checkbox[$i] =='equip')
                {
                    if(empty($_POST['equipid'])||!is_numeric($_POST['equipid']))
                    {
                        $this->outputJson(-1, '请填写有效附件装备ID');
                    }
                    if(empty($_POST['equipnum'])||!is_numeric($_POST['equipnum']))
                    {
                        $this->outputJson(-1, '请填写有效附件装备数量');
                    }
                    
                    if( !Mail_Service::CheckProp($_POST['equipid'],2))
                    {
                        $this->outputJson(-1, '非装备ID '.$_POST['equipid']." 请重新填写");
                    }
                    $equipnum = 0;
                    if(! Mail_Service::CheckValue($_POST['equipid'],$_POST['equipnum']))
                    {
                        $this->outputJson(-1, '附件装备数量超过设置上限');
                    }  else {
                        $equipnum = $_POST['equipnum'];
                    }
                }
                if($checkbox[$i] =='propid1')
                {
                    if(empty($_POST['propid1'])||!is_numeric($_POST['propid1']))
                    {
                        $this->outputJson(-1, '请填写有效附件道具1ID');
                    }
                    if(empty($_POST['propnum1'])||!is_numeric($_POST['propnum1']))
                    {
                        $this->outputJson(-1, '请填写有效附件道具1数量');
                    }
                    
                    if( !Mail_Service::CheckProp($_POST['propid1'],3))
                    {
                        $this->outputJson(-1, '非道具ID '.$_POST['propid1']." 请重新填写");
                    }
                    
                    $propnum1 = 0;                
                    if(! Mail_Service::CheckValue($_POST['propid1'],$_POST['propnum1']))
                    {
                        $this->outputJson(-1, '附件道具1数量超过设置上限');
                    }  else {
                        $propnum1 = $_POST['propnum1'];
                    }
                }
                if($checkbox[$i] =='propid2')
                {
                    if(empty($_POST['propid2'])||!is_numeric($_POST['propid2']))
                    {
                        $this->outputJson(-1, '请填写有效附件道具2ID');
                    }
                    if(empty($_POST['propnum2'])||!is_numeric($_POST['propnum2']))
                    {
                        $this->outputJson(-1, '请填写有效附件道具2数量');
                    }
                    
                    if( !Mail_Service::CheckProp($_POST['propid2'],3))
                    {
                        $this->outputJson(-1, '非道具ID '.$_POST['propid2']." 请重新填写");
                    }
                    
                    $propnum2 = 0;
                    if(! Mail_Service::CheckValue($_POST['propid2'],$_POST['propnum2']))
                    {
                        $this->outputJson(-1, '附件道具2数量超过设置上限');
                    }  else {
                        $propnum2 = $_POST['propnum2'];
                    }
                }
                if($checkbox[$i] =='propid3')
                {
                    if(empty($_POST['propid3'])||!is_numeric($_POST['propid3']))
                    {
                        $this->outputJson(-1, '请填写有效附件道具3ID');
                    }
                    if(empty($_POST['propnum3'])||!is_numeric($_POST['propnum3']))
                    {
                        $this->outputJson(-1, '请填写有效附件道具3数量');
                    }
                    
                    if( !Mail_Service::CheckProp($_POST['propid3'],3))
                    {
                        $this->outputJson(-1, '非道具ID '.$_POST['propid3']." 请重新填写");
                    }
                    
                    $propnum3 = 0;
                    if(! Mail_Service::CheckValue($_POST['propid3'],$_POST['propnum3']))
                    {
                        $this->outputJson(-1, '附件道具3数量超过设置上限');
                    }  else {
                        $propnum3 = $_POST['propnum3'];
                    }
                }
                if($checkbox[$i] =='propid4')
                {
                    if(empty($_POST['propid4'])||!is_numeric($_POST['propnum3']))
                    {
                        $this->outputJson(-1, '请填写有效附件道具4ID');
                    }
                    if(empty($_POST['propnum4'])||!is_numeric($_POST['propnum4']))
                    {
                        $this->outputJson(-1, '请填写有效附件道具4数量');
                    }
                    
                    if( !Mail_Service::CheckProp($_POST['propid4'],3))
                    {
                        $this->outputJson(-1, '非道具ID '.$_POST['propid4']." 请重新填写");
                    }
                    
                    $propnum4 = 0;
                    if(! Mail_Service::CheckValue($_POST['propid4'],$_POST['propnum4']))
                    {
                        $this->outputJson(-1, '附件道具4数量超过设置上限');
                    }  else {
                        $propnum4 = $_POST['propnum4'];
                    }
                }
                
            }
        }  
        $data = array(
            'sid'=>$_POST['sid'],
            'roleid'=>$_POST['roleid'],
            'title'=>$_POST['mailtitle'],
            'context'=>$_POST['context'],
            'sendtime'=>strtotime($_POST['sendtime']),
            'tag'=>0,
            'coin'=>isset($coin)?$coin:0,
            'money'=>isset($money)?$money:0,
            'herosoul'=>isset($herosoul)?$herosoul:0,
            'honor_s'=>isset($honor_s)?$honor_s:0,
            'honour'=>isset($honour)?$honour:0,
            'heroid'=>($_POST['heroid']!= 0 && $heronum )?$_POST['heroid']:0,
            'heronum'=>isset($heronum)?$heronum:0,
            'equipid'=>($_POST['equipid'] && $equipnum )?$_POST['equipid']:0,
            'equipnum'=>isset($equipnum)?$equipnum:0,
            'prop_id1'=>($_POST['propid1'] != 0&&$propnum1)?$_POST['propid1']:0 ,
            'prop_num1'=>isset($propnum1)?$propnum1:0,
            'prop_id2'=>($_POST['propid2']!= 0&&$propnum2)?$_POST['propid2']:0 ,
            'prop_num2'=>isset($propnum2)?$propnum2:0,
            'prop_id3'=>($_POST['propid3']!= 0&& $propnum3)?$_POST['propid3']:0,
            'prop_num3'=>isset($propnum3)?$propnum3:0,
            'statu'=>'未审核',
            'equipsoul'=>isset($equipsoul)?$equipsoul:0,
            'prop_id4'=>($_POST['propid4']!= 0 &&$propnum4)? $_POST['propid4']:0,
            'prop_num4'=>isset($propnum4)?$propnum4:0,
            'sender'=>$_SESSION['account'],
            'mark'=>0
        );
        $iplatform = Helper_Lib::getCookie("zoneid");
        if($iplatform == 0)
        {
           $this->outputJson(0, '平台验证出错！' ); 
        }
        $stServer =  Platform_Model::getPlatformByID($iplatform);  //暂时平台iplatform为设置   
        $logdata = array(
                'f_platform'=>$iplatform,
                'f_account'=>$_SESSION['account'],
                'f_addtime'=>date("Y-m-d H:i:s", time()),
                'f_sid'=>$_POST['sid'],
                'f_ip'=>$stServer['sid_ip'],
            );
          
            $logtype = 'addPermail';
            $logParams = array('roleid'=>$_POST['roleid'],'title'=>$_POST['mailtitle']);
            ManagerLog_Service::insertManagerLog($logdata, $logtype, $logParams);
            
           
        try {
            $ret = Mail_Service::addMail($data,$stServer);           
            if (!$ret) {
                $this->outputJson(-2, '数据库执行失败！');
            }  
        } catch (Exception_Lib $e) {
            $this->outputJson($e->getCode(), $e->getMessage());
        }
        $this->outputJson(0, '保存成功');
    }
    
    //批量用户邮件
    public function addSerMail() {
        
        if(empty($_POST['sendtime']))
        {
            $this->outputJson(-1, '请选择发送时间');
        }
        
//        if(strtotime($_POST['sendtime'])-time(0)>3600*24*3)
//        {
//            $this->outputJson(-1, '发送时间不能超过3天，请重新填写');
//        }
        
        if(empty($_POST['mailtitle']))
        {
            $this->outputJson(-1, '邮件标题不能为空');
        }
        if(empty($_POST['context']))
        {
            $this->outputJson(-1, '请填写邮件内容');
        }
        
        $checkbox = $_POST['checkbox'];
        if(count($checkbox) >4 )
        {
            $this->outputJson(-1, '附件勾选超过上限，请保留四个');
        }
        if(!empty($checkbox))
        {
            for($i = 0; $i < count($checkbox);++$i)
            {
                if($checkbox[$i] =='coin')
                {
                   if(empty($_POST['coin'])||!is_numeric($_POST['coin']) )
                    {
                        $this->outputJson(-1, '请填写有效附件金币数额');
                    } 
                    $coin = 0;
                    if(! Mail_Service::CheckValue("gold", $_POST['coin']))
                    {
                        $this->outputJson(-1, '附件金币数额超过设置上限');
                    }  else {
                        $coin = $_POST['coin'];
                    }
                }
                if($checkbox[$i] =='herosoul')
                {
                    if(empty($_POST['herosoul'])||!is_numeric($_POST['herosoul']))
                    {
                        $this->outputJson(-1, '请填写有效附件英雄魂石数额');
                    }
                    $herosoul = 0;
                    if(! Mail_Service::CheckValue( 'souljade',$_POST['herosoul']))
                    {
                        $this->outputJson(-1, '附件魂石数额超过设置上限');
                    }  else {
                        $herosoul = $_POST['herosoul'];
                    }
                        
                }
                if($checkbox[$i] =='equipsoul')
                {
                    if(empty($_POST['equipsoul'])||!is_numeric($_POST['equipsoul']))
                    {
                        $this->outputJson(-1, '请填写有效附件装备魂石数额');
                    }
                    $equipsoul = 0;
                    if(! Mail_Service::CheckValue('equipjade', $_POST['equipsoul']))
                    {
                        $this->outputJson(-1, '附件魂石数额超过设置上限');
                    }  else {
                        $equipsoul = $_POST['equipsoul'];
                    }
                        
                }
                if($checkbox[$i] =='honor_s')
                {
                    if(empty($_POST['honor_s'])||!is_numeric($_POST['honor_s']))
                    {
                        $this->outputJson(-1, '请填写有效附件声望数值');
                    }
                    $honor_s = 0;
                    if(! Mail_Service::CheckValue('prestige' ,$_POST['honor_s']))
                    {
                        $this->outputJson(-1, '附件声望超过设置上限'.$_POST['honor_s']);
                    }  else {
                        $honor_s = $_POST['honor_s'];
                    }
                        
                }
                
                if($checkbox[$i] =='money')
                {
                    if(empty($_POST['money'])||!is_numeric($_POST['money']))
                    {
                        $this->outputJson(-1, '请填写有效附件钻石数量');
                    }
                    
                    $money = 0;
                    if(! Mail_Service::CheckValue('diamond',$_POST['money']))
                    {
                        $this->outputJson(-1, '附件钻石数额超过设置上限');
                    }  else {
                     $money = $_POST['money'];    
                    }
                }
                if($checkbox[$i] =='honour')
                {
                    if(empty($_POST['honour'])||!is_numeric($_POST['honour']))
                    {
                        $this->outputJson(-1, '请填写有效附件荣誉点数额');
                    }
                    $honour = 0;
                    if(! Mail_Service::CheckValue('honour',$_POST['honour']))
                    {
                        $this->outputJson(-1, '附件荣誉点数额超过设置上限');
                    }  else {
                        $honour = $_POST['honour'];
                    }
                }
                if($checkbox[$i] =='heroid')
                {
                    if(empty($_POST['heroid'])||!is_numeric($_POST['heroid']))
                    {
                        $this->outputJson(-1, '请填写有效附件卡牌ID');
                    }
                    if(empty($_POST['heronum'])||!is_numeric($_POST['heronum']))
                    {
                        $this->outputJson(-1, '请填写有效附件卡牌数量');
                    }
                    if( !Mail_Service::CheckProp($_POST['heroid'],1))
                    {
                        $this->outputJson(-1, '非英雄ID '.$_POST['heroid']." 请重新填写");
                    }
                    $heronum = 0;
                    if(! Mail_Service::CheckValue($_POST['heroid'],$_POST['heronum']))
                    {
                        $this->outputJson(-1, '附件卡牌数量超过设置上限');
                    }  else {
                        $heronum = $_POST['heronum'];
                    }
                }
                if($checkbox[$i] =='equip')
                {
                    if(empty($_POST['equipid'])||!is_numeric($_POST['equipid']))
                    {
                        $this->outputJson(-1, '请填写有效附件装备ID');
                    }
                    if(empty($_POST['equipnum'])||!is_numeric($_POST['equipnum']))
                    {
                        $this->outputJson(-1, '请填写有效附件装备数量');
                    }
                    
                    if( !Mail_Service::CheckProp($_POST['equipid'],2))
                    {
                        $this->outputJson(-1, '非装备ID '.$_POST['equipid']." 请重新填写");
                    }
                    $equipnum = 0;
                    if(! Mail_Service::CheckValue($_POST['equipid'],$_POST['equipnum']))
                    {
                        $this->outputJson(-1, '附件装备数量超过设置上限');
                    }  else {
                        $equipnum = $_POST['equipnum'];
                    }
                }
                if($checkbox[$i] =='propid1')
                {
                    if(empty($_POST['propid1'])||!is_numeric($_POST['propid1']))
                    {
                        $this->outputJson(-1, '请填写有效附件道具1ID');
                    }
                    if(empty($_POST['propnum1'])||!is_numeric($_POST['propnum1']))
                    {
                        $this->outputJson(-1, '请填写有效附件道具1数量');
                    }
                    
                    if( !Mail_Service::CheckProp($_POST['propid1'],3))
                    {
                        $this->outputJson(-1, '非道具ID '.$_POST['propid1']." 请重新填写");
                    }
                    
                    $propnum1 = 0;                
                    if(! Mail_Service::CheckValue($_POST['propid1'],$_POST['propnum1']))
                    {
                        $this->outputJson(-1, '附件道具1数量超过设置上限');
                    }  else {
                        $propnum1 = $_POST['propnum1'];
                    }
                }
                if($checkbox[$i] =='propid2')
                {
                    if(empty($_POST['propid2'])||!is_numeric($_POST['propid2']))
                    {
                        $this->outputJson(-1, '请填写有效附件道具2ID');
                    }
                    if(empty($_POST['propnum2'])||!is_numeric($_POST['propnum2']))
                    {
                        $this->outputJson(-1, '请填写有效附件道具2数量');
                    }
                    
                    if( !Mail_Service::CheckProp($_POST['propid2'],3))
                    {
                        $this->outputJson(-1, '非道具ID '.$_POST['propid2']." 请重新填写");
                    }
                    
                    $propnum2 = 0;
                    if(! Mail_Service::CheckValue($_POST['propid2'],$_POST['propnum2']))
                    {
                        $this->outputJson(-1, '附件道具2数量超过设置上限');
                    }  else {
                        $propnum2 = $_POST['propnum2'];
                    }
                }
                if($checkbox[$i] =='propid3')
                {
                    if(empty($_POST['propid3'])||!is_numeric($_POST['propid3']))
                    {
                        $this->outputJson(-1, '请填写有效附件道具3ID');
                    }
                    if(empty($_POST['propnum3'])||!is_numeric($_POST['propnum3']))
                    {
                        $this->outputJson(-1, '请填写有效附件道具3数量');
                    }
                    
                    if( !Mail_Service::CheckProp($_POST['propid3'],3))
                    {
                        $this->outputJson(-1, '非道具ID '.$_POST['propid3']." 请重新填写");
                    }
                    
                    $propnum3 = 0;
                    if(! Mail_Service::CheckValue($_POST['propid3'],$_POST['propnum3']))
                    {
                        $this->outputJson(-1, '附件道具3数量超过设置上限');
                    }  else {
                        $propnum3 = $_POST['propnum3'];
                    }
                }
                if($checkbox[$i] =='propid4')
                {
                    if(empty($_POST['propid4'])||!is_numeric($_POST['propnum3']))
                    {
                        $this->outputJson(-1, '请填写有效附件道具4ID');
                    }
                    if(empty($_POST['propnum4'])||!is_numeric($_POST['propnum4']))
                    {
                        $this->outputJson(-1, '请填写有效附件道具4数量');
                    }
                    
                    if( !Mail_Service::CheckProp($_POST['propid4'],3))
                    {
                        $this->outputJson(-1, '非道具ID '.$_POST['propid4']." 请重新填写");
                    }
                    
                    $propnum4 = 0;
                    if(! Mail_Service::CheckValue($_POST['propid4'],$_POST['propnum4']))
                    {
                        $this->outputJson(-1, '附件道具4数量超过设置上限');
                    }  else {
                        $propnum4 = $_POST['propnum4'];
                    }
                }
                
            }
        }  
        
       $rolelist = $this->ReadXml();
       if(count($rolelist) ==0)
       {
           $this->outputJson(0, '导入用户失效，请重新导入！' ); 
       }
        $iplatform = Helper_Lib::getCookie("zoneid");
        if($iplatform ==0)
        {
           $this->outputJson(0, '平台验证出错！' ); 
        }
        $stServer =  Platform_Model::getPlatformByID($iplatform);  //暂时平台iplatform为设置
 
        $arrsid = array();
        $arrrole = array();
        for($i = 0;$i<count($rolelist);$i++)
        {            
            $arrsid[$i] = $rolelist[$i]['sid'];
            $arrrole[$i] = $rolelist[$i]['roleid'];
        }

        $logdata = array(
                'f_platform'=>$iplatform,
                'f_account'=>$_SESSION['account'],
                'f_addtime'=>date("Y-m-d H:i:s", time()),
                'f_sid'=>$sid,
                'f_ip'=>$stServer['sid_ip'],
            );
          
        $logtype = 'addSermail';
        $logParams = array('sid'=>implode(",", $arrsid),'title'=>$_POST['mailtitle']);
        ManagerLog_Service::insertManagerLog($logdata, $logtype, $logParams);
        
        $data = array(
                'sid'=> implode(",", $arrsid),
                'roleid'=>implode(',', $arrrole) ,
                'title'=>$_POST['mailtitle'],
                'context'=>$_POST['context'],
                'sendtime'=>strtotime($_POST['sendtime']),
                'tag'=>0,
                'coin'=>isset($coin)?$coin:0,
                'money'=>isset($money)?$money:0,
                'herosoul'=>isset($herosoul)?$herosoul:0,
                'honor_s'=>isset($honor_s)?$honor_s:0,
                'honour'=>isset($honour)?$honour:0,
                'heroid'=>($_POST['heroid'] && $heronum )?$_POST['heroid']:0,
                'heronum'=>isset($heronum)?$heronum:0,
                'equipid'=>($_POST['equipid'] && $equipnum )?$_POST['equipid']:0,
                'equipnum'=>isset($equipnum)?$equipnum:0,
                'prop_id1'=>($_POST['propid1']!= 0 &&$propnum1)?$_POST['propid1']:0 ,
                'prop_num1'=>isset($propnum1)?$propnum1:0,
                'prop_id2'=>($_POST['propid2']!= 0&&$propnum2)?$_POST['propid2']:0 ,
                'prop_num2'=>isset($propnum2)?$propnum2:0,
                'prop_id3'=>($_POST['propid3']!= 0&& $propnum3)?$_POST['propid3']:0,
                'prop_num3'=>isset($propnum3)?$propnum3:0,
                'statu'=>'未审核',
                'equipsoul'=>isset($equipsoul)?$equipsoul:0,
                'prop_id4'=>($_POST['propid4']!= 0 &&$propnum4)? $_POST['propid4']:0,
                'prop_num4'=>isset($propnum4)?$propnum4:0,
                'sender'=>$_SESSION['account'],
                'mark'=>0
            );
            try {
                $ret = Mail_Service::addMail($data,$stServer);           
                if (!$ret) {
                    $this->outputJson(0, '平台验证出错！' ); 
                }  
            } catch (Exception_Lib $e) {
                $this->outputJson($e->getCode(), $e->getMessage());
            }

            $this->outputJson(0, '保存成功');     
    }
    
    public function CheckPropNum($checkbox) {
        $num = 0;
        for($i = 0; $i < count($checkbox);++$i)
        {
               if($checkbox[$i] == 'role')
                {
                     $num++;  
                }
                if($checkbox[$i] == 'vip')
                {
                     $num++;
                }
                if($checkbox[$i] == 'guild')
                {
                     $num++;
                }
                if($checkbox[$i] == 'logintime')
                {
                     $num++;
                }
                
        }
        $Total = count($checkbox);
        if($num == 4 && $Total > 8||$num == 3 && $Total > 7||$num == 2 && $Total > 6||$num == 1 && $Total > 5||$num == 0 && $Total > 4)
        {
            return false;
        }
        return TRUE;
    }
    //全服邮件
    public function addAllMail() {
        
       if(empty($_POST['sid']))
        {
            $this->outputJson(-1, '区服为空，请填写区服');
        }
        
        $checkbox = $_POST['checkbox'];

        if(!$this->CheckPropNum($checkbox))
        {
            $this->outputJson(-1, '附件勾选超过上限，请保留四个');
        }
                            
        if(!empty($checkbox))
        {
            for($i = 0; $i < count($checkbox);++$i)
            {
                if($checkbox[$i] == 'role')
                {               
                    if($_POST['minlevel']<1||$_POST['maxlevel']>100)
                    {
                        $this->outputJson(-1, '请填写合理的角色等级');
                    }
                    $maxlevel = ($_POST['maxlevel'] == 0)? 100:$_POST['maxlevel'];
                    $minlevel = ( $_POST['minlevel'] ==0 )? 1:$_POST['minlevel'];
                    if( !isset($maxlevel) &&!isset( $minlevel))
                    {
                        $this->outputJson(-1, '请填写的角色等级');
                    }
                   
                }
                
                if($checkbox[$i] == 'vip')
                {
                    if($_POST['minvip']<0||$_POST['maxvip']>20)
                    {
                        $this->outputJson(-1, '请填写合理的VIP等级');
                    } 
                    $maxvip = ($_POST['maxvip'] == 0) ? 20:$_POST['maxvip'];
                    $minvip = $_POST['minvip'];
                    if( !isset($maxvip) &&!isset( $minvip))
                    {
                        $this->outputJson(-1, '请填写的VIP等级');
                    }
                }
                
                if($checkbox[$i] == 'guild')
                {
                     $guild = 1;
                }
                if($checkbox[$i] == 'logintime')
                {
                    $starttime =$_POST['starttime'];
                    $endtime = $_POST['endtime'];
                    if( !isset($starttime) &&!isset( $endtime))
                    {
                        $this->outputJson(-1, '请填写登录开始时间和登录截至时间');
                    }
                }
                
                if($checkbox[$i] =='coin')
                {
                   if(empty($_POST['coin'])||!is_numeric($_POST['coin']) )
                    {
                        $this->outputJson(-1, '请填写有效附件金币数额');
                    } 
                    $coin = 0;
                    if(! Mail_Service::CheckValue("gold", $_POST['coin']))
                    {
                        $this->outputJson(-1, '附件金币数额超过设置上限');
                    }  else {
                        $coin = $_POST['coin'];
                    }
                }
                if($checkbox[$i] =='herosoul')
                {
                    if(empty($_POST['herosoul'])||!is_numeric($_POST['herosoul']))
                    {
                        $this->outputJson(-1, '请填写有效附件英雄魂石数额');
                    }
                    $herosoul = 0;
                    if(! Mail_Service::CheckValue( 'souljade',$_POST['herosoul']))
                    {
                        $this->outputJson(-1, '附件魂石数额超过设置上限');
                    }  else {
                        $herosoul = $_POST['herosoul'];
                    }
                        
                }
                if($checkbox[$i] =='equipsoul')
                {
                    if(empty($_POST['equipsoul'])||!is_numeric($_POST['equipsoul']))
                    {
                        $this->outputJson(-1, '请填写有效附件装备魂石数额');
                    }
                    $equipsoul = 0;
                    if(! Mail_Service::CheckValue('equipjade', $_POST['equipsoul']))
                    {
                        $this->outputJson(-1, '附件魂石数额超过设置上限');
                    }  else {
                        $equipsoul = $_POST['equipsoul'];
                    }
                        
                }
                if($checkbox[$i] =='honor_s')
                {
                    if(empty($_POST['honor_s'])||!is_numeric($_POST['honor_s']))
                    {
                        $this->outputJson(-1, '请填写有效附件声望数值');
                    }
                    $honor_s = 0;
                    if(! Mail_Service::CheckValue('prestige' ,$_POST['honor_s']))
                    {
                        $this->outputJson(-1, '附件声望超过设置上限'.$_POST['honor_s']);
                    }  else {
                        $honor_s = $_POST['honor_s'];
                    }
                        
                }
                
                if($checkbox[$i] =='money')
                {
                    if(empty($_POST['money'])||!is_numeric($_POST['money']))
                    {
                        $this->outputJson(-1, '请填写有效附件钻石数量');
                    }
                    
                    $money = 0;
                    if(! Mail_Service::CheckValue('diamond',$_POST['money']))
                    {
                        $this->outputJson(-1, '附件钻石数额超过设置上限');
                    }  else {
                     $money = $_POST['money'];    
                    }
                }
                if($checkbox[$i] =='honour')
                {
                    if(empty($_POST['honour'])||!is_numeric($_POST['honour']))
                    {
                        $this->outputJson(-1, '请填写有效附件荣誉点数额');
                    }
                    $honour = 0;
                    if(! Mail_Service::CheckValue('honour',$_POST['honour']))
                    {
                        $this->outputJson(-1, '附件荣誉点数额超过设置上限');
                    }  else {
                        $honour = $_POST['honour'];
                    }
                }
                if($checkbox[$i] =='heroid')
                {
                    if(empty($_POST['heroid'])||!is_numeric($_POST['heroid']))
                    {
                        $this->outputJson(-1, '请填写有效附件卡牌ID');
                    }
                    if(empty($_POST['heronum'])||!is_numeric($_POST['heronum']))
                    {
                        $this->outputJson(-1, '请填写有效附件卡牌数量');
                    }
                    if( !Mail_Service::CheckProp($_POST['heroid'],1))
                    {
                        $this->outputJson(-1, '非英雄ID '.$_POST['heroid']." 请重新填写");
                    }
                    $heronum = 0;
                    if(! Mail_Service::CheckValue($_POST['heroid'],$_POST['heronum']))
                    {
                        $this->outputJson(-1, '附件卡牌数量超过设置上限');
                    }  else {
                        $heronum = $_POST['heronum'];
                    }
                }
                if($checkbox[$i] =='equip')
                {
                    if(empty($_POST['equipid'])||!is_numeric($_POST['equipid']))
                    {
                        $this->outputJson(-1, '请填写有效附件装备ID');
                    }
                    if(empty($_POST['equipnum'])||!is_numeric($_POST['equipnum']))
                    {
                        $this->outputJson(-1, '请填写附件装备数量');
                    }
                    
                    if( !Mail_Service::CheckProp($_POST['equipid'],2))
                    {
                        $this->outputJson(-1, '非装备ID '.$_POST['equipid']." 请重新填写");
                    }
                    $equipnum = 0;
                    if(! Mail_Service::CheckValue($_POST['equipid'],$_POST['equipnum']))
                    {
                        $this->outputJson(-1, '附件装备数量超过设置上限');
                    }  else {
                        $equipnum = $_POST['equipnum'];
                    }
                }
                if($checkbox[$i] =='propid1')
                {
                    if(empty($_POST['propid1'])||!is_numeric($_POST['propid1']))
                    {
                        $this->outputJson(-1, '请填写有效附件道具1ID');
                    }
                    if(empty($_POST['propnum1'])||!is_numeric($_POST['propnum1']))
                    {
                        $this->outputJson(-1, '请填写有效附件道具1数量');
                    }
                    
                    if( !Mail_Service::CheckProp($_POST['propid1'],3))
                    {
                        $this->outputJson(-1, '非道具ID '.$_POST['propid1']." 请重新填写");
                    }
                    
                    $propnum1 = 0;                
                    if(! Mail_Service::CheckValue($_POST['propid1'],$_POST['propnum1']))
                    {
                        $this->outputJson(-1, '附件道具1数量超过设置上限');
                    }  else {
                        $propnum1 = $_POST['propnum1'];
                    }
                }
                if($checkbox[$i] =='propid2')
                {
                    if(empty($_POST['propid2'])||!is_numeric($_POST['propid2']))
                    {
                        $this->outputJson(-1, '请填写有效附件道具2ID');
                    }
                    if(empty($_POST['propnum2'])||!is_numeric($_POST['propnum2']))
                    {
                        $this->outputJson(-1, '请填写有效附件道具2数量');
                    }
                    
                    if( !Mail_Service::CheckProp($_POST['propid2'],3))
                    {
                        $this->outputJson(-1, '非道具ID '.$_POST['propid2']." 请重新填写");
                    }
                    
                    $propnum2 = 0;
                    if(! Mail_Service::CheckValue($_POST['propid2'],$_POST['propnum2']))
                    {
                        $this->outputJson(-1, '附件道具2数量超过设置上限');
                    }  else {
                        $propnum2 = $_POST['propnum2'];
                    }
                }
                if($checkbox[$i] =='propid3')
                {
                    if(empty($_POST['propid3'])||!is_numeric($_POST['propid3']))
                    {
                        $this->outputJson(-1, '请填写有效附件道具3ID');
                    }
                    if(empty($_POST['propnum3'])||!is_numeric($_POST['propnum3']))
                    {
                        $this->outputJson(-1, '请填写有效附件道具3数量');
                    }
                    
                    if( !Mail_Service::CheckProp($_POST['propid3'],3))
                    {
                        $this->outputJson(-1, '非道具ID '.$_POST['propid3']." 请重新填写");
                    }
                    
                    $propnum3 = 0;
                    if(! Mail_Service::CheckValue($_POST['propid3'],$_POST['propnum3']))
                    {
                        $this->outputJson(-1, '附件道具3数量超过设置上限');
                    }  else {
                        $propnum3 = $_POST['propnum3'];
                    }
                }
                if($checkbox[$i] =='propid4')
                {
                    if(empty($_POST['propid4'])||!is_numeric($_POST['propnum3']))
                    {
                        $this->outputJson(-1, '请填写有效附件道具4ID');
                    }
                    if(empty($_POST['propnum4'])||!is_numeric($_POST['propnum4']))
                    {
                        $this->outputJson(-1, '请填写有效附件道具4数量');
                    }
                    
                    if( !Mail_Service::CheckProp($_POST['propid4'],3))
                    {
                        $this->outputJson(-1, '非道具ID '.$_POST['propid4']." 请重新填写");
                    }
                    
                    $propnum4 = 0;
                    if(! Mail_Service::CheckValue($_POST['propid4'],$_POST['propnum4']))
                    {
                        $this->outputJson(-1, '附件道具4数量超过设置上限');
                    }  else {
                        $propnum4 = $_POST['propnum4'];
                    }
                }
                
            }
        }
        
        if(empty($_POST['sendtime']))
        {
            $this->outputJson(-1, '请选择发送时间');
        }
//        if(strtotime($_POST['sendtime'])-time(0)>3600*24*3)
//        {
//            $this->outputJson(-1, '发送时间不能超过3天，请重新填写');
//        }
        if(empty($_POST['mailtitle']))
        {
            $this->outputJson(-1, '邮件标题不能为空');
        }
        if(empty($_POST['context']))
        {
            $this->outputJson(-1, '请填写邮件内容');
        }
        $data = array(
            'sid'=>implode(",", $_POST['sid']),
            'roleid'=>0,
            'guild'=>isset($guild)?$guild:0,
            'begintime'=>isset($starttime)?strtotime($starttime):0,
            'endtime'=>isset($endtime)?strtotime($endtime):0,
            'maxrole'=>isset($maxlevel)?$maxlevel:100,
            'minrole'=>isset($minlevel)?$minlevel:1,
            'maxvip'=>isset($maxvip)?$maxvip:20,
            "minvip"=>isset($minvip)?$minvip:0,
            'title'=>$_POST['mailtitle'],
            'context'=>$_POST['context'],
            'sendtime'=>strtotime($_POST['sendtime']),
            'tag'=>1,
            'coin'=>isset($coin)?$coin:0,
            'money'=>isset($money)?$money:0,
            'herosoul'=>isset($herosoul)?$herosoul:0,
            'honor_s'=>isset($honor_s)?$honor_s:0,
            'honour'=>isset($honour)?$honour:0,
            'heroid'=>($_POST['heroid'] && $heronum )?$_POST['heroid']:0,
            'heronum'=>isset($heronum)?$heronum:0,
            'equipid'=>($_POST['equipid'] && $equipnum )?$_POST['equipid']:0,
            'equipnum'=>isset($equipnum)?$equipnum:0,           
            'prop_id1'=>($_POST['propid1'] != 0 &&$propnum1)?$_POST['propid1']:0 ,
            'prop_num1'=>isset($propnum1)?$propnum1:0,
            'prop_id2'=>($_POST['propid2'] != 0&&$propnum2)?$_POST['propid2']:0 ,
            'prop_num2'=>isset($propnum2)?$propnum2:0,
            'prop_id3'=>($_POST['propid3'] != 0&& $propnum3)?$_POST['propid3']:0,
            'prop_num3'=>isset($propnum3)?$propnum3:0,
            'statu'=>'未审核',
            'equipsoul'=>isset($equipsoul)?$equipsoul:0,
            'prop_id4'=>($_POST['propid4'] != 0 &&$propnum4)? $_POST['propid4']:0,
            'prop_num4'=>isset($propnum4)?$propnum4:0,
            'sender'=>$_SESSION['account'],
            'mark'=>0
        );

        $iplatform = Helper_Lib::getCookie("zoneid");
        if($iplatform == 0)
        {
           $this->outputJson(0, '平台验证出错！' ); 
        }
        $stServer =  Platform_Model::getPlatformByID($iplatform);  //暂时平台iplatform为设置
        $logdata = array(
                'f_platform'=>$iplatform,
                'f_account'=>$_SESSION['account'],
                'f_addtime'=>date("Y-m-d H:i:s", time()),
                'f_sid'=>$_POST['sid'],
                'f_ip'=>$stServer['sid_ip'],
            );
          
            $logtype = 'addAllmail';
            $logParams = array('sid'=>$_POST['sid'],'title'=>$_POST['mailtitle']);
            ManagerLog_Service::insertManagerLog($logdata, $logtype, $logParams);
   
        try {
            $ret = Mail_Service::addMail($data,$stServer);           
            if (!$ret) {
                $this->outputJson(-2, '数据库执行失败！');
            }  
        } catch (Exception_Lib $e) {
            $this->outputJson($e->getCode(), $e->getMessage());
        }
        $this->outputJson(0, '保存成功');
    }
    
    public function addUser() {
        if( $_FILES['myFile']['size']>2*1024*1024)
        {
             $this->outputJson(-1,"上传文件过大");
        }
        
        $pathname = $_FILES['myfile'];
        $filename = time(0)."_".$pathname['name'];
        $filepath = '/tmp/'.$filename;
        
        if(is_uploaded_file($pathname['tmp_name']))
        {
          if(!move_uploaded_file($pathname['tmp_name'],$filepath))//上传文件，成功返回true    
          {
              $this->outputJson(-1,"上传失败");
          }
        }else{
            $this->outputJson(-1,"非法上传文件");
        }
        
        setcookie('filepath', $filepath,time()+60, '/');
        
        $this->outputJson(0,"上传成功");
    }
  
    public function ReadXml() {
        
        $filepath = Helper_Lib::getCookie('filepath');
        $ext = pathinfo($filepath, PATHINFO_EXTENSION | PATHINFO_FILENAME);
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
        return $data;
    }
}
