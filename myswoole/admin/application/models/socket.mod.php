<?php
class Socket_Model extends Model
{	
	private static $_instance = null;
        private static $handler = null;
        //private标记的构造方法

        public function __destruct() {
        }
        /*创建单例模式*/
	public static function getInstance()
	{
                
		if(!(self::$_instance instanceof self))
		{
			self::$_instance = new self;
		}		
		return self::$_instance;	
	}
	//初始化socket链接
	public function InitSocket($Ip,$port)
	{   
                if(empty($Ip)||empty($port))
                {
                    return false;
                }
                self::$handler = new swoole_client(SWOOLE_TCP);            
		$ret = self::$handler->connect($Ip, $port,5,0);	
		if(!$ret)
		{
                    return false;	
		}
		return  true;
	}
	
	//接收数据包
	public function RecvMsg()
	{
            try{
                   $retbuff = self::$handler->recv();
                }catch (Exception $e)
                {   
                    unset(self::$_instance);
                    return false;
                }
                if(strlen($retbuff)==0)
                {    
                    return false;
                }
                $len = unpack('C2',$retbuff);
                
                $recvlen = $len[1]*256+$len[2];
                if(strlen($retbuff) == $recvlen)
                {
                    if(!$this->ShaVerifyToken($retbuff)) //验证加密
                    {
                        return false;
                    }
                    return $retbuff;
                }
                while(true )
                {   
                    $Lastbuff .= $retbuff;
                    if( $recvlen == strlen($Lastbuff) ) 
                    {
                        break;
                    }
                    try {
                        $retbuff = self::$handler->recv();
                        if(strlen($retbuff) == 0)
                        {
                            break;
                        }
                    } catch (Exception $exc) {
                        unset(self::$_instance);
                        return false;
                    }

                }
            if(!$this->ShaVerifyToken($Lastbuff))//验证加密
            {
                return false;
            }
	    return $Lastbuff;
	}
	
	//发送数据包
	public function SendMsg($stMsg)
	{                
            
//                if(strlen($stMsg) > 1990)
//                {
//                    return false;
//                }

                $result = self::$handler->send($stMsg);
                if($result)
                {
                        return true;
                }
                
	}
	//格式化数据包
	public function SerializeMsg($stMsg)
	{
		$msg = $stMsg->SerializeToString();
		$string = "";
		$string = pack("C1",intval((strlen($msg)+2+20)/256));
		$string .= pack("C1",(strlen($msg)+2+20)%256);               
                $string .= $this->ShaCreateToken($msg); //加密
		$string .=$msg;
				
		return $string;
	}

        public function integerToBytes($val) { 
            $byt = array();  
            $byt[0] = ($val & 0xff);  
            $byt[1] = ($val >> 8 & 0xff);  
            $byt[2] = ($val >> 16 & 0xff);  
            $byt[3] = ($val >> 24 & 0xff);   
            return $byt; 
        }
        
        public function ShaCreateToken($msg) { 
            $shaString =  sha1($msg, true);     
            $TotalLen = (strlen($msg)+20)*547;
            $bValue = $this->integerToBytes($TotalLen);
            for ( $i = 0 ; $i <  20 ; ++$i ) 
            {  
                    $shaString[$i] = chr(ord($shaString[$i])^$bValue[$i%4]);
            }
            return $shaString;
        }
        
        public function ShaVerifyToken($msg) {
            $strSub = substr($msg, 22,  strlen($msg)-22);
            $subString = substr($msg, 2,  20);
            $shaString =  sha1($strSub, true);
            $TotalLen = (strlen($msg)-2)*547;//加密长度
            $bValue = $this->integerToBytes($TotalLen);
            for ( $i = 0 ; $i < 20 ; ++$i ) 
            {
                    $value = chr(ord($shaString[$i])^$bValue[$i%4]);
                    if($value !=$subString[$i])
                    {
                        return false;
                    }           
            }
            return true;
        }
	//封装消息头
	public function GetHead(&$stHead,$MSGID)
	{
		$stHead->reset();
		$stHead->setMUiMsgID($MSGID);
		$stHead->setMUin(0);
		$stHead->setMUiSessionFd(self::$handler->sock);	
                
	}
	
	//封装拉取角色的信息
	public function FetchRoleInfo($strAccount,$iType,$strParam,$worldid,$iEvent)
	{          
		$RequestServer = new PbProtocolCSMsg();
		$stHead = new PbCSMsgHead();
		$stBody = new PbCSMsgBody();
		$stBody->reset();
		$RequestServer->reset();
		$this->GetHead($stHead,ProtocolMsgID::MSGID_GMFECHT_ROLE_REQUEST);
		
		$RequestServer->setMStMsgHead($stHead);
		$stMsg = new PbZoneGMFetchRoleRequest();
		$stMsg->setIFetchType($iType);
		$stMsg->setStrAccount($strAccount);
		$stMsg->setStrParam($strParam);
		$stMsg->setIWorldID($worldid);
                $stMsg->setIEvent($iEvent);
		$stBody->setMStZoneGMFetchRoleRequest($stMsg);
		$RequestServer->setMStMsgBody($stBody);
		
		$strCode  = $this->SerializeMsg($RequestServer);
		
		/*释放new 出来的空间*/
		unset($stHead);
		unset($stMsg);
		unset($stBody);
		unset($RequestServer);
		
		return $strCode	;
	}
	
	//protobuf解析
	public function OnRecvCode($strBuff,&$RequestServer)
	{
		$strTmp =substr($strBuff,22);
                
		if(empty($strTmp))
                {
                    return false;
                }
                try{
			$RequestServer->ParseFromString($strTmp);                       
		}catch (Exception $e)
                {
                     self::$handler->close();
                    unset(self::$_instance);
                    header("Location:/index/socketerror");
		}
                 self::$handler->close();
                return true;
	}
	
	//解析数据包，protobuf
	public function ProcMsg(&$RequestServer)
	{
		$recvMsg = $this->RecvMsg();
		if(empty($recvMsg))
                {
                    return false;
                }
                return $this->OnRecvCode($recvMsg,$RequestServer);
	}
	
        //拉取副本信息
	public function ProcPveInfo(&$RequestServer)
	{
            try {
                        $stMSg = $RequestServer->getMStMsgBody()->getMStZoneGMFetchPveResponse();
                        if(!$stMSg)
                        {
                            return 0;
                        }
                        if($stMSg->getIResult() !== 0)
                        {
                            return 0;
                        }              
                         //拉取副本信息
                        $stBase = $stMSg->getStBaseInfo();
                        $stPveInfo = $stMSg->getStFightInfo()->getStPveInfos();           
                        $count = $stPveInfo->getStPinstancesCount();
                        $PinstArray = array();
                        for($i = 0 ; $i < $count; ++$i)
                        {
                           $PinstanceID =  $stPveInfo->getStPinstancesAt($i)->getPinstanceID();
                            $CrossInfo = $stPveInfo->getStPinstancesAt($i)->getStCrossInfo();
                            $Star = $stPveInfo->getStPinstancesAt($i)->getIPveStars();
                            $Num = $CrossInfo->getStDetailsCount();
                            for($j = 0;$j<$Num; ++$j)
                            {
                               $Cross = $CrossInfo->getStDetailsAt($j);
                               $CrossID = $Cross->getUCrossID();
                               $PinstArray[$i][$j] = array(
                                   'pinstanceid'=>$PinstanceID,
                                   'crossid'=>$CrossID,
                                   'star'=>$Star,
                               );
                            }                         
                        }
                        $gameinfo = array(
                            'uin'=>$stMSg->getUin(),
                            'iTalentPoints'=>$stBase->getITalentPoints(),
                            'rolelevel'=>$stBase->getILevel(),
                            'nickname'=>$stBase->getSzNickName(),
                            'roleexp'=>$stBase->getIExp(),
                            'VIPLevel'=>$stBase->getIVIPLevel(),
                            'ca'=>$stBase->getICA(),
                            'co'=>$stBase->getICO(),
                            'prestige'=>$stBase->getIPrestige(),
                            'honor'=>$stBase->getIHonorValue(),
                            'equipsoul'=>$stBase->getIEquipSoulJade(),
                            'tailorexp'=>$stBase->getITailorExp(),
                            'tailorlevel'=>$stBase->getITailorLevel(),
                            'iAnabasisCoin'=>$stBase->getIAnabasisCoin(),
                            'GuildBage'=>$stBase->getIGuildBadge(),
                            'icheese'=>$stBase->getICHeeseCount(),
                        );
               } catch (Exception $exc) {
                   unset(self::$_instance);
                   header("Location:/gameuser/edit");
               }
             
               $GameUser = array(
                   'userinfo'=>$gameinfo,
                   'pveinfo'=>$PinstArray,
                );

              return $GameUser;         
	}
        
	//拉取角色信息
	public function ProcRoleInfo(&$RequestServer)
	{
            try {
                    $stMSg = $RequestServer->getMStMsgBody()->getMStZoneGMFetchRoleResponse();
                    if(!$stMSg)
                    {
                        return 0;
                    }
                    if($stMSg->getIResult() !== 0)
                    {
                        return 0;
                    }
                    //玩家基础信息
                    $stUserInfo = $stMSg->getStLoginInfo();
                    $stBase = $stUserInfo->getStBaseInfo();
                    $stHero = $stUserInfo->getStHeroInfo();
                    $stItem = $stUserInfo->getStItemInfo();
                   // $stMoney = $stUserInfo->getStReserved2();
                    $liitlebuddy = $stUserInfo->getStReserved1();

                    $gameinfo = array(
                        'roleid'=>$stMSg->getURoleId(),
                        'uin'=>$stMSg->getUin(),
                        'iworld'=>$stMSg->getIWorldID(),
                        'rolelevel'=>$stBase->getILevel(),
                        'nickname'=>$stBase->getSzNickName(),
                        'roleexp'=>$stBase->getIExp(),
                        'createroletime'=>$stBase->getICreateTime(),
                        'lastlogouttime'=>$stBase->getILastLogout(),
                        'onlinetm'=>$stBase->getIOnlineTime(),
                        'timesonline'=>$stBase-> getILoginCount(),
                        'updatetime'=>$stMSg->getIUpdateTime(),
                        'fightvalue'=>$stBase->getIFightValue(),
                        'VIPLevel'=>$stBase->getIVIPLevel(),
                        'ca'=>$stBase->getICA(),
                        'co'=>$stBase->getICO(),
                        'imaxid'=>$stBase->getIMaxCrossId(),
                        'guidname'=>$stMSg->getStrGuildName(),
                        'honor'=>$stBase->getIHonorValue(), 
                        'iAnabasisCoin'=>$stBase->getIAnabasisCoin(),
                        'GuildBage'=>$stBase->getIGuildBadge(),
                        'icheese'=>$stBase->getICHeeseCount(),
                    );
                   } catch (Exception $exc) {
                        unset(self::$_instance);
                        header("Location:/index/socketerror");
                   }
                   //上阵英雄
                   $stheroInfo =  array();
                   $CountNum = $stHero->getStForms()->getIFormIndexCount();
                   $slotNum =  $stHero->getStForms()->getStHeroFormInfosCount();

                   for($i = 0; $i < $CountNum; ++ $i)
                   {
                       for($j = 0; $j < $slotNum; ++ $j)
                       {
                           if($stHero->getStForms()->getIFormIndexAt($i) == $j)
                           {
                                   $slot = array();
                                   for($k = 0; $k < 6; ++$k)
                                   {
                                      $slot[$k] = $stHero->getStForms()->getStHeroFormInfosAt($j)->getIEquipSlotAt($k);
                                   }
                                   $stheroInfo[$j] = array(
                                    'heroindex'=>$stHero->getStForms()->getStHeroFormInfosAt($j)->getIHeroIndex(),
                                    'equip'=>$slot);       
                           }
                       }

                   }
              
                //小伙伴
                $liitlecount = $liitlebuddy->getStLittleBuddyInfo()->getStLittleBuddySlot()->getStLittleBuddyIndexCount();

                for($j = 0 ; $j <$liitlecount ; ++$j)
                 {
                     $buddy[$j] = $liitlebuddy->getStLittleBuddyInfo()->getStLittleBuddySlot()->getStLittleBuddyIndexAt($j);

                 }

                 //所有英雄   
                $allhero = array();
                $heronum = $stHero->getStAllHeros()->getStHerosCount();
                for($i = 0; $i< $heronum; ++$i)
                { 
                     $allhero[$i] = array(
                         'heroindex'=>$stHero->getStAllHeros()->getStHerosAt($i)->getIHeroIndex(),
                         'heroid'=>$stHero->getStAllHeros()->getStHerosAt($i)->getUHeroID(),
                         'herolevel'=>$stHero->getStAllHeros()->getStHerosAt($i)->getULevel(),
                         'gardestar'=>$stHero->getStAllHeros()->getStHerosAt($i)->getUStarGrade(),
                         'steplevel'=>$stHero->getStAllHeros()->getStHerosAt($i)->getIStep(),
                         'fosterlevel'=>$stHero->getStAllHeros()->getStHerosAt($i)->getIFosterLevel(),
                         'heroquality'=>$stHero->getStAllHeros()->getStHerosAt($i)->getIHeroQuality(),
                     );
                }


                //所有道具
                $itemNum = $stItem->getStItemsCount();
                $itemArray = array();
                for($i = 0; $i < $itemNum; ++ $i )
                {
                    if(intval($stItem->getStItemsAt($i)->getEType()) == 1)
                    {
                        $itemArray[$i] =  array(
                         'itemindex'=>$stItem->getStItemsAt($i)->getISlot(),
                         'itemid'=>$stItem->getStItemsAt($i)->getIItemID(),
                         'itemnum'=>$stItem->getStItemsAt($i)->getIItemNum(),
                         'itemtype'=>$stItem->getStItemsAt($i)->getEType(),
                         'strenghtlevel'=>$stItem->getStItemsAt($i)->getStDetail()->getStEquipDetail()->getStEquipStrengthen()->getILevel(),
                         'formindex'=>$stItem->getStItemsAt($i)->getStDetail()->getStEquipDetail()->getIEquipFormIdx(),
                           );
                    }else
                    {
                         $itemArray[$i] =  array(
                         'itemindex'=>$stItem->getStItemsAt($i)->getISlot(),
                         'itemid'=>$stItem->getStItemsAt($i)->getIItemID(),
                         'itemnum'=>$stItem->getStItemsAt($i)->getIItemNum(),
                         'itemtype'=>$stItem->getStItemsAt($i)->getEType(),
                           );
                    }
                }
                $GameUser = array(
                    'userinfo'=>$gameinfo,
                    'formhero'=>$stheroInfo,
                    'littlebuddy'=>$buddy,
                    'allhero'=>$allhero,
                    'itemall'=>$itemArray
                 );

               return $GameUser;         
	}
	
	//请求返回的结果
	public function ProCommondRet(&$RequestServer)
	{
	    $stMSg = $RequestServer->getMStMsgBody()->getMStZoneCommondGMResponse();
            if(!$stMSg)
            {
                return false;
            }
            if($stMSg->getIResult() != 0)
            {
                return false;
            }
            
            return true;
	}
	
        public function UpdateRoleBase($data)
        {
            $RequestServer = new PbProtocolCSMsg();
		$stHead = new PbCSMsgHead();
		$stBody = new PbCSMsgBody();
		$stBody->reset();
		$RequestServer->reset();
		$this->GetHead($stHead,ProtocolMsgID::MSGID_COMMOND_GM_REQUEST);
		
		$RequestServer->setMStMsgHead($stHead);
		$stMsg = new PbZoneCommondGMRequest();
                $stMsg->reset();
		$stMsg->setIFetchType($data['fetchtype']);
                $stMsg->setISelectType($data['selecttype']);
                $stMsg->setIWorldID($data['world']);
                $stParam = new CommondParam();
                $stParam->setIParamA($data['count']);
                $stParam->setIParamB($data['NumID']);
                $stMsg->setStParam($stParam);
                $stMsg->setStrRole($data['strrole']);
                $stMsg->setStrAccount($data['account']);
                
		$stBody->setMStZoneCommondGMRequest($stMsg);
		$RequestServer->setMStMsgBody($stBody);
		
		$strCode  = $this->SerializeMsg($RequestServer);
		
		/*释放new 出来的空间*/
                unset($stParam);
		unset($stHead);
		unset($stMsg);
		unset($stBody);
		unset($RequestServer);
		
		return $strCode	;
        }

        public function ServerNotify($platform,$serverid,$Type)
        {
                $RequestServer = new PbProtocolCSMsg();
		$stHead = new PbCSMsgHead();
		$stBody = new PbCSMsgBody();
		$stBody->reset();
		$RequestServer->reset();
		$this->GetHead($stHead,ProtocolMsgID::MSGID_REGAUTH_GMSERVER_NOTIFY);
		
		$RequestServer->setMStMsgHead($stHead);
		$stMsg = new PbRegAuthGMServerNotify();
                $stMsg->reset();
		$stMsg->setIPlatformid($platform);
                $stMsg->setIServerid($serverid);
                $stMsg->setIType($Type);
		$stBody->setMStRegAuthGMServerNotify($stMsg);
		$RequestServer->setMStMsgBody($stBody);
		
		$strCode  = $this->SerializeMsg($RequestServer);
		
		/*释放new 出来的空间*/
		unset($stHead);
		unset($stMsg);
		unset($stBody);
		unset($RequestServer);
		
		return $strCode	;
        }
        
        public function AddWhiteRequest($uin,$istate)
        {
                $RequestServer = new PbProtocolCSMsg();
		$stHead = new PbCSMsgHead();
		$stBody = new PbCSMsgBody();
		$stBody->reset();
		$RequestServer->reset();
		$this->GetHead($stHead,ProtocolMsgID::MSGID_REGAUTH_ADDWHITE_REQUEST);
		
		$RequestServer->setMStMsgHead($stHead);
		$stMsg = new PbRegAuthAddWhiteRequest();
                $stMsg->reset();
		$stMsg->setIUin($uin);
                $stMsg->setIState($istate);
		$stBody->setMStRegAuthAddWhiteRequest($stMsg);
		$RequestServer->setMStMsgBody($stBody);
		
		$strCode  = $this->SerializeMsg($RequestServer);
		
		/*释放new 出来的空间*/
		unset($stHead);
		unset($stMsg);
		unset($stBody);
		unset($RequestServer);
		
		return $strCode	;
        }
       
        public function SendNotice($data) {
             $RequestServer = new PbProtocolCSMsg();
		$stHead = new PbCSMsgHead();
		$stBody = new PbCSMsgBody();
		$stBody->reset();
		$RequestServer->reset();
		$this->GetHead($stHead,ProtocolMsgID::MSGID_ZONE_GMBULLENTINBOARD_NOTIFY);
		$stMsg = new PbZoneGMSendBulletinBoardNotify();
		$RequestServer->setMStMsgHead($stHead);
                $stMsg->reset();
		$stMsg->setIType(0); //运营事件在服务端默认填写
                $stMsg->setIPriorityLevel($data['level']);
                $stMsg->setIEndTime($data['endtime']);
                $stMsg->setILoopTime($data['looptime']);
                $stMsg->setIStartTime($data['starttime']);
                $stMsg->setITrigTimes($data['trigtime']);
                $stMsg->setStrContext($data['context']);
                $stMsg->setStrAccount($data['account']);
		$stBody->setMStZoneGMSendBulletinBoardNotify($stMsg);
		$RequestServer->setMStMsgBody($stBody);
		$strCode  = $this->SerializeMsg($RequestServer);
		
		/*释放new 出来的空间*/
		unset($stHead);
		unset($stMsg);
		unset($stBody);
		unset($RequestServer);
		
		return $strCode	;
        }
        
        
        public function ForbidRole($data) {
           
             $RequestServer = new PbProtocolCSMsg();
		$stHead = new PbCSMsgHead();
		$stBody = new PbCSMsgBody();
		$stBody->reset();
		$RequestServer->reset();
		$this->GetHead($stHead,ProtocolMsgID::MSGID_ZONE_GMFORBIDENTOROLE_REQUEST);
                $RequestServer->setMStMsgHead($stHead);
		$stMsg = new PbZoneGMForbidenToRoleRequest();
                $stMsg->reset();
                $stForbid = new FORBIDDENTROLE();
                $stForbid->reset();
                $stForbid->setIForbidType($data['forbidtype']);
                $stForbid->setIEndtime($data['endtime']);
                $stForbid->setIStarttime($data['starttime']);
                $stMsg->setIRoleUin($data['roleuin']);
                $stMsg->setIType($data['type']);
                $stMsg->setIWorldid($data['worldid']);
                $stMsg->setITime($data['talktime']);
                $stMsg->setStForbid($stForbid);
                $stMsg->setStrAccount($data['account']);
		$stBody->setMStZoneGMForbidenToRoleRequest($stMsg);
		$RequestServer->setMStMsgBody($stBody);
		
		$strCode  = $this->SerializeMsg($RequestServer);
		/*释放new 出来的空间*/
                unset($stForbid);
		unset($stHead);
		unset($stMsg);
		unset($stBody);
		unset($RequestServer);
		
		return $strCode	;
        }
        
        
        public function SendLoginNotice($data) {
             $RequestServer = new PbProtocolCSMsg();
		$stHead = new PbCSMsgHead();
		$stBody = new PbCSMsgBody();
		$stBody->reset();
		$RequestServer->reset();
		$this->GetHead($stHead,ProtocolMsgID::MSGID_ZONE_GMLOGINBOARD_NOTIFY);
		$stMsg = new PbZoneGMLoginBoardNotify();
		$RequestServer->setMStMsgHead($stHead);
                $stMsg->reset();
                $stBoard = new ONEBOARD();
                $stBoard->reset();
                $stBoard->setIBoardID($data['id']);
                $stBoard->setIEndTime($data['endtime']);
                $stBoard->setIStartTime($data['starttime']);
                $stBoard->setILable($data['lable']);
                $stBoard->setILink($data[ 'linktype']);
                $stBoard->setIsBnt($data[ 'isbtn']);
                $stBoard->setStrBtnText($data['btntext']);
                $stBoard->setStrContext($data['context']);
                $stBoard->setStrLinkText($data['linktext']);
                $stBoard->setStrTitle($data[ 'title']);
		$stMsg->setStBoard($stBoard);
                $stMsg->setStrAccount($data['account']);
		$stBody->setMStZoneGMLoginBoardNotify($stMsg);
		$RequestServer->setMStMsgBody($stBody);
		
		$strCode  = $this->SerializeMsg($RequestServer);
		
		/*释放new 出来的空间*/
                unset($stBoard);
		unset($stHead);
		unset($stMsg);
		unset($stBody);
		unset($RequestServer);
		
		return $strCode	;
        }
        
        public function SendMail($data) {
             $RequestServer = new PbProtocolCSMsg();
		$stHead = new PbCSMsgHead();
		$stBody = new PbCSMsgBody();
		$stBody->reset();
		$RequestServer->reset();
		$this->GetHead($stHead,ProtocolMsgID::MSGID_ZONE_CREATEMAILBYGM_REQUEST);
                
		$stMsg = new PbZoneGMCreateMailRequest();
		$RequestServer->setMStMsgHead($stHead);
                $stMsg->reset();
                $addattachment = new MailAttachment();
                
                
                
               $attachment = $data['attachment'];
               if(!empty($attachment))
               {
                
                   for($i = 0; $i < count($attachment);++$i)
                   {
                      $oneattachment = new OneAttachment();
                      $oneattachment->setIDropId($attachment[$i]['propid']);
                      $oneattachment->setIDropNum($attachment[$i]['propnum']);
                      $oneattachment->setIDropType($attachment[$i]['proptype']);
                      $addattachment->appendStAttachments($oneattachment) ;
                   }
               }
               $oneMail = new OneMailInfo();
               $listrole = explode(',', $data['roleid']);
               if(is_array($listrole))
               {
                   for($i = 0;$i <count($listrole);$i++)
                   {
                       $oneMail->appendIRoleid($listrole[$i]);
                   }
               }  else {
                   
                   $oneMail->appendIRoleid($data['roleid']);
               }
               $oneMail->setIMailId($data['id']);
              
               $oneMail->setISendTime($data['sendtime']);
               $oneMail->setStAttachment($addattachment);
               $oneMail->setStrContext($data['context']);
               $oneMail->setStrTitle($data['title']);
               $stMsg->setStrAccount($data['account']);
               $stMsg->setStMail($oneMail);
               $stMsg->setIReturn($data['return']);
               $stBody->setMStZoneGMCreateMailRequest($stMsg);
               $RequestServer->setMStMsgBody($stBody);
		
		$strCode  = $this->SerializeMsg($RequestServer);
		
		/*释放new 出来的空间*/
                unset($addattachment);
                unset($oneMail);
		unset($stHead);
		unset($stMsg);
		unset($stBody);
		unset($RequestServer);
		
		return $strCode	;
        }
        
        public function revokeMail($data) {
             $RequestServer = new PbProtocolCSMsg();
		$stHead = new PbCSMsgHead();
		$stBody = new PbCSMsgBody();
		$stBody->reset();
		$RequestServer->reset();
		$this->GetHead($stHead,ProtocolMsgID::MSGID_ZONE_REVOKEMAIL_REQUEST);
                $RequestServer->setMStMsgHead($stHead);
		$stMsg = new PbZoneRevokeMailRequest();
		
                $stMsg->reset();
                $stMsg->setIMailed($data['id']);
                $stMsg->setStrAccount($data['account']);
                $stBody->setMStZoneRevokeMailRequest($stMsg);
                $RequestServer->setMStMsgBody($stBody);
		
		$strCode  = $this->SerializeMsg($RequestServer);
		
		/*释放new 出来的空间*/
		unset($stHead);
		unset($stMsg);
		unset($stBody);
		unset($RequestServer);
		
		return $strCode	;
        }
       
         public function SendAllMail($data) {
             $RequestServer = new PbProtocolCSMsg();
		$stHead = new PbCSMsgHead();
		$stBody = new PbCSMsgBody();
		$stBody->reset();
		$RequestServer->reset();
		$this->GetHead($stHead,ProtocolMsgID::MSGID_ZONE_ALLROELMAIL_REQUEST);
                $RequestServer->setMStMsgHead($stHead);
		$stMsg = new PbZoneAllRoleMailRequest();		
                $stMsg->reset();
                
                $addattachment = new MailAttachment();
    
               $attachment = $data['attachment'];
               if(!empty($attachment))
               {
                
                   for($i = 0; $i < count($attachment);++$i)
                   {
                      $oneattachment = new OneAttachment();
                      $oneattachment->setIDropId($attachment[$i]['propid']);
                      $oneattachment->setIDropNum($attachment[$i]['propnum']);
                      $oneattachment->setIDropType($attachment[$i]['proptype']);
                      $addattachment->appendStAttachments($oneattachment) ;
                   }
               }
                $oneMail = new OneMailInfo();
                $oneMail->setIMailId($data['id']);
                $oneMail->setISendTime($data['sendtime']);
                $oneMail->setStAttachment($addattachment);
                $oneMail->setStrContext($data['context']);
                $oneMail->setStrTitle($data['title']);
                $stMsg->setStrAccount($data['account']);
                $stMsg->setIGuild($data['guild']);
                $stMsg->setILoginBegin($data['begintime']);
                $stMsg->setILoginEnd($data['endtime']);
                $stMsg->setIMaxRole($data['maxrole']);
                $stMsg->setIMinRole($data['minrole']);
                $stMsg->setIMaxVip($data['maxvip']);
                $stMsg->setIMinVip($data['minvip']);
                $stMsg->setStOneMail($oneMail);
                $stBody->setMStZoneAllRoleMailRequest($stMsg);
                $RequestServer->setMStMsgBody($stBody);
		
		$strCode  = $this->SerializeMsg($RequestServer);
		
		/*释放new 出来的空间*/
                unset($addattachment);
                unset($oneMail);
		unset($stHead);
		unset($stMsg);
		unset($stBody);
		unset($RequestServer);
		
		return $strCode	;
        }
                
        public function sendPlatformNotice($data) {
             $RequestServer = new PbProtocolCSMsg();
		$stHead = new PbCSMsgHead();
		$stBody = new PbCSMsgBody();
		$stBody->reset();
		$RequestServer->reset();
		$this->GetHead($stHead,ProtocolMsgID::MSGID_REGAUTH_GMNOTICE_REQUEST);
		$stMsg = new PbRegAuthGMNoticeRequest();
		$RequestServer->setMStMsgHead($stHead);
                $stMsg->reset();
                $stMsg->setIId($data['id']);
                $stMsg->setIEndtime($data['endtime']);
                $stMsg->setIStarttime($data['starttime']);
                $stMsg->setStrBtnText($data['btntext']);
                $stMsg->setStrContext($data['context']);
                $stMsg->setStrTitle($data[ 'title']);
		$stBody->setMStRegAuthGMNoticeRequest($stMsg);
		$RequestServer->setMStMsgBody($stBody);
		
		$strCode  = $this->SerializeMsg($RequestServer);
		
		/*释放new 出来的空间*/
		unset($stHead);
		unset($stMsg);
		unset($stBody);
		unset($RequestServer);
		
		return $strCode	;
        }
       
        public function sendActivity($data) {
             $RequestServer = new PbProtocolCSMsg();
		$stHead = new PbCSMsgHead();
		$stBody = new PbCSMsgBody();
		$stBody->reset();
		$RequestServer->reset();
		$this->GetHead($stHead,ProtocolMsgID::MSGID_ZONE_GM_ADDACTIVITY_NOTIFY);
		$stMsg = new PbZoneGMAddActivityNotify();
		$RequestServer->setMStMsgHead($stHead);
                $stMsg->reset();
                $activity = new ACTIVITYDETIAL();
                $activity->reset();
                $actype = 0;
                for($i=0; $i< count($data['param']);++$i)
                {
                    $rewardlist = new ACTIVITYREWARD(); //奖励类型和奖励条件
                    $rewardlist->reset();
                    $rewardlist->setIRewardId($data['param'][$i]['rewardid']);
                    $rewardlist->setIConditonParam($data['param'][$i]['condition']);
                    $rewardlist->setStrTitle($data['param'][$i]['rewarddesc']);
                    $rewardlist->setIConditonType($data['param'][$i]['acttype']);
                    $actype = $data['param'][$i]['acttype'];
                   
                    for($j = 0;$j < count($data['param'][$i]['param']);++$j)
                    {
                       $dropList = new ONEREWARDITEM(); //奖励道具
                        $dropList ->reset();
                        $dropList->setIDropAmt($data['param'][$i]['param'][$j]['thingnum']);
                        $dropList->setIDropId($data['param'][$i]['param'][$j]['thingID']);
                        $dropList->setIDropType($data['param'][$i]['param'][$j]['thingtype']);                    
                        $rewardlist->appendStRewardList($dropList); 
                    }
                    
                    $activity->appendStReward($rewardlist);
                }
                             
                $list = new ACTIVITYDATA();
                $list->reset();
                $list->setIActId($data['actid']);
                $list->setIBatchid($data['id']);
                $list->setIEndTime($data['endtime']);
                $list->setIStartTime($data['starttime']);
                $list->setStrContent($data['content']);
                $list->setStrTitle($data['title']);
                $list->setStDetial($activity);
                $list->setIBatchType($actype);
                $stMsg->setStActivityList($list);
                $stMsg->setStrAccount($data['account']);
		$stBody->setMStZoneGMAddActivityNotify($stMsg);
		$RequestServer->setMStMsgBody($stBody);
		
		$strCode  = $this->SerializeMsg($RequestServer);
		
		/*释放new 出来的空间*/
		unset($stHead);
                unset($list);
                unset($dropList);
                unset($rewardlist);
                unset($activity);
		unset($stMsg);
		unset($stBody);
		unset($RequestServer);
		
		return $strCode	;
        }
     
        public function sendAlertActivity($data) {
             $RequestServer = new PbProtocolCSMsg();
		$stHead = new PbCSMsgHead();
		$stBody = new PbCSMsgBody();
		$RequestServer->reset();
		$this->GetHead($stHead,ProtocolMsgID::MSGID_ZONE_GM_CHANGEACTIVITY_NOTIFY);
                
		$stMsg = new PbZoneGMChangeActivityNotify();
		$RequestServer->setMStMsgHead($stHead);
                $stMsg->reset();
                $activity = new ACTIVITYDETIAL();
                $activity->reset();
                for($i=0; $i< count($data['param']);++$i)
                {
                    $rewardlist = new ACTIVITYREWARD(); //奖励类型和奖励条件
                    $rewardlist->reset();
                    $rewardlist->setIRewardId($data['param'][$i]['rewardid']);
                    $rewardlist->setIConditonParam($data['param'][$i]['condition']);
                    $rewardlist->setIConditonType($data['param'][$i]['acttype']);
                    $rewardlist->setStrTitle($data['param'][$i]['rewarddesc']);
                    $actype = $data['param'][$i]['acttype'];
                    for($j = 0;$j < count($data['param'][$i]['param']);++$j)
                    {
                        $dropList = new ONEREWARDITEM(); //奖励道具
                        $dropList ->reset();
                        $dropList->setIDropAmt($data['param'][$i]['param'][$j]['thingnums']);
                        $dropList->setIDropId($data['param'][$i]['param'][$j]['thingID']);
                        $dropList->setIDropType($data['param'][$i]['param'][$j]['thingtype']);                    
                        $rewardlist->appendStRewardList($dropList); 
                    }
                    
                    $activity->appendStReward($rewardlist);
                }
                
                
                $list = new ACTIVITYDATA();
                $list->reset();
                $list->setIActId($data['actid']);
                $list->setIBatchid($data['id']);
                $list->setIEndTime($data['endtime']);
                $list->setIStartTime($data['starttime']);
                $list->setStrContent($data['content']);
                $list->setStrTitle($data['title']);
                $list->setStDetial($activity);
                $list->setIBatchType($actype);
                $stMsg->setStActivityList($list);
                $stMsg->setStrAccount($data['account']);
		$stBody->setMStZoneGMChangeActivityNotify($stMsg);
		$RequestServer->setMStMsgBody($stBody);
		
		$strCode  = $this->SerializeMsg($RequestServer);

		/*释放new 出来的空间*/
		unset($stHead);
                unset($list);
                unset($dropList);
                unset($rewardlist);
                unset($activity);
		unset($stMsg);
		unset($stBody);
		unset($RequestServer);
		
		return $strCode	;
        }
               
         public function getActivitylist($data) {
             $RequestServer = new PbProtocolCSMsg();
		$stHead = new PbCSMsgHead();
		$stBody = new PbCSMsgBody();
		$stBody->reset();
		$RequestServer->reset();
		$this->GetHead($stHead,ProtocolMsgID::MSGID_ZONE_GM_ACTIVITYLIST_REQUEST);
		$stMsg = new PbZoneGMActivityListRequest();
		$RequestServer->setMStMsgHead($stHead);
                $stMsg->reset();              
                $stMsg->setStrAccount($data['account']);
		$stBody->setMStZoneGMActivityListRequest($stMsg);
		$RequestServer->setMStMsgBody($stBody);
		
		$strCode  = $this->SerializeMsg($RequestServer);
		
		/*释放new 出来的空间*/
		unset($stHead);
		unset($stMsg);
		unset($stBody);
		unset($RequestServer);
		
		return $strCode	;
        }
   
        public function loadActivityList(&$RequestServer)
        {
                    $stMSg = $RequestServer->getMStMsgBody()->getMStZoneGMActivityListResponse();
                    if(!$stMSg)
                    {
                        return 0;
                    }
                    try {                      
                        //玩家基础信息
                        $activitylist = $stMSg->getStActivityList();
                        $num = $stMSg->getStActivityListCount();
                        for($i=0;$i < $num;++$i)
                        {
                            $activity = $stMSg->getStActivityListAt($i);
                            $data[$i] = array(
                                'id'=>$activity->getIBatchid(),
                                'batchtype'=>$activity->getIBatchType(),
                                'actid'=>$activity->getIActId(),
                                'starttime'=>$activity->getIStartTime(),
                                'endtime'=>$activity->getIEndTime(),
                                'title'=>$activity->getStrTitle(),
                                'content'=>$activity->getStrContent(),
                                'state'=>3
                            ); 
                        }
                        
                    } catch (Exception $exc) {
                        unset(self::$_instance);
                        header("Location:/index/socketerror");
                   }
                   
                   return $data;
        }
         
        
}
