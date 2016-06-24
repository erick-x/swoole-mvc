<?php

class Activity_Service {
    
    /*批量活动，操作集*/
     public static function loadMutliAct() {
        $model = new MutliAct_Model();
        return $model->getAllList();
    }
    
    public static function getMutliActbyID($id) {
        $model = new MutliAct_Model();
        return $model->getActivityList($id);
    }
    
    public static function addMultiActivity($data) {
        $db = new MutliAct_Model();         
        return $db->insert($data);
    }
    public static function updateMutliActivity($data,$id) {
        $db = new MutliAct_Model();         
        return $db->update($data, $id);
    }
    public static function CheckActivity($id) {
         $model = new MutliAct_Model();
        return $model->deldata($id);
    }
    
    /*单个活动的操作集*/
    public static function loadActivityConfig($stServer) {
        $model = new ActivityConfig_Model($stServer['sid_db'],$stServer['sid_dbuser'],xxtea_lib::decode($stServer['sid_dbpwd']),$stServer['sid_dbname']);  
        return $model->LoadActivity();
    }

    public static function addActivityConfig($data,$stServer) {
        $db = new ActivityConfig_Model($stServer['sid_db'],$stServer['sid_dbuser'],xxtea_lib::decode($stServer['sid_dbpwd']),$stServer['sid_dbname']);        
        return $db->insert($data);
    }
    

    public static function delActivityConfig($id,$stServer) {
        $db = new ActivityConfig_Model($stServer['sid_db'],$stServer['sid_dbuser'],xxtea_lib::decode($stServer['sid_dbpwd']),$stServer['sid_dbname']);        
        return $db->deldata($id);
    }
    
    public static function updateActivityConfig($data,$id,$stServer) {
        $db = new ActivityConfig_Model($stServer['sid_db'],$stServer['sid_dbuser'],xxtea_lib::decode($stServer['sid_dbpwd']),$stServer['sid_dbname']);        
        return $db->update($data,$id);
    }
    
    //活动创建和管理模块
    public static function getActivity($id,$stServer) {
         $model = new Activity_Model($stServer['sid_db'],$stServer['sid_dbuser'],xxtea_lib::decode($stServer['sid_dbpwd']),$stServer['sid_dbname']);  
        return $model->getActivity($id);
    }
 
    public static function getActivityNum($stServer,$state)
    {
        $model =  new Activity_Model($stServer['sid_db'],$stServer['sid_dbuser'],xxtea_lib::decode($stServer['sid_dbpwd']),$stServer['sid_dbname']);
        return $model->getTotal($state);
    }
    //加载活动
    public static function loadActivity($stServer,$state) {
        
        $model = new Activity_Model($stServer['sid_db'],$stServer['sid_dbuser'],xxtea_lib::decode($stServer['sid_dbpwd']),$stServer['sid_dbname']);  
        return $model->LoadActivity($state);
    }
    
    public static function SearchActivity($stServer,$search,$param) {
        
        $model = new Activity_Model($stServer['sid_db'],$stServer['sid_dbuser'],xxtea_lib::decode($stServer['sid_dbpwd']),$stServer['sid_dbname']);  
        return $model->SearchActivity($search,$param);
    }
    
    public static function addActivity($data,$stServer) {
        $db = new Activity_Model($stServer['sid_db'],$stServer['sid_dbuser'],xxtea_lib::decode($stServer['sid_dbpwd']),$stServer['sid_dbname']);        
        return $db->insert($data);
    } 
    
     public static function updateActivity($data,$id,$stServer) {
        $db = new Activity_Model($stServer['sid_db'],$stServer['sid_dbuser'],xxtea_lib::decode($stServer['sid_dbpwd']),$stServer['sid_dbname']);        
        return $db->update($data,$id);
    }
    public static function delActivity($id,$stServer) {
        $db = new Activity_Model($stServer['sid_db'],$stServer['sid_dbuser'],xxtea_lib::decode($stServer['sid_dbpwd']),$stServer['sid_dbname']);        
        return $db->deldata($id);
    }
    
    public static function getEffectAct($stServer,$starttime,$endtime,$acttype,$sid)
    {
        $db = new Activity_Model($stServer['sid_db'],$stServer['sid_dbuser'],xxtea_lib::decode($stServer['sid_dbpwd']),$stServer['sid_dbname']);   
        return $db->GetEffectActivity($starttime,$endtime,$acttype,$sid);  
    }
    
    public static function sendActivity($data,&$stServer){
        
        $handler = Socket_Model::getInstance();
        $socket = $handler->InitSocket($stServer['zoneserver_ip'],$stServer['zoneserver_port']);
        if( !$socket )
        {
            return false;	
        }

        //封装消息到protobuf中
        $sendMsg = $handler->sendActivity($data);
        $flag = $handler->SendMsg($sendMsg);
        $result = false;
        if( !$flag )
        {
            return false;	
        }
        try
        {
            //接收消息并解析
            $RequestServer = new PbProtocolCSMsg();
            $RequestServer->reset();
            $ret = $handler->ProcMsg($RequestServer);
            if($ret)
            {
                $result = $handler->ProCommondRet($RequestServer);
            }
            unset($RequestServer);
        }catch (Exception $e)
        {	
                unset($handler);
                echo $e->getMessage();	
        }	
        unset($handler);
        return $result;
    }
    
    public static function sendAlertActivity($data,&$stServer){
        
        $handler = Socket_Model::getInstance();
        $socket = $handler->InitSocket($stServer['zoneserver_ip'],$stServer['zoneserver_port']);
        if( !$socket )
        {
            return false;	
        }

        //封装消息到protobuf中
        $sendMsg = $handler->sendAlertActivity($data);
        $flag = $handler->SendMsg($sendMsg);
        $result = false;
        if( !$flag )
        {
            return false;	
        }
        try
        {
            //接收消息并解析
            $RequestServer = new PbProtocolCSMsg();
            $RequestServer->reset();
            $ret = $handler->ProcMsg($RequestServer);
            if($ret)
            {
                $result = $handler->ProCommondRet($RequestServer);
            }
            unset($RequestServer);
        }catch (Exception $e)
        {	
                unset($handler);
                echo $e->getMessage();	
        }	
        unset($handler);
        return $result;
    }
   
    public static function getActivityList($data,&$stServer){
        
        $handler = Socket_Model::getInstance();
        $socket = $handler->InitSocket($stServer['zoneserver_ip'],$stServer['zoneserver_port']);
        if( !$socket )
        {
            return false;	
        }
        
        //封装消息到protobuf中
        $sendMsg = $handler->getActivitylist($data);
        $flag = $handler->SendMsg($sendMsg);
        $result = false;
        if( !$flag )
        {
            return false;	
        }
        try
        {
            //接收消息并解析
            $RequestServer = new PbProtocolCSMsg();
            $RequestServer->reset();
            $ret = $handler->ProcMsg($RequestServer);
            if($ret)
            {
                $result = $handler->loadActivityList($RequestServer);
                self::insertActivity($result,$stServer['sid']);
 
            }
            unset($RequestServer);
        }catch (Exception $e)
        {	
                unset($handler);
                echo $e->getMessage();	
        }	
        unset($handler);
        return true;
    }
    
     public static function insertActivity($data,$sid) {
            $platform = Helper_Lib::getCookie("zoneid");
            $stServer =  Platform_Model::getPlatformByID($platform);
            $ActivityModel =new Activity_Model($stServer['sid_db'],$stServer['sid_dbuser'],xxtea_lib::decode($stServer['sid_dbpwd']),$stServer['sid_dbname']);
            
            for($i = 0; $i < count($data);++$i)
            {
                $retdata = $ActivityModel->getActivity($data[$i]['id']);
                if(empty($retdata) ||$retdata ==false)
                {
                    $ActivityModel->insert(array_merge($data[$i],array('sid'=>$sid)));
                }  else {
                    
                    $arrsid = explode(",", $retdata['sid']);
                    if(in_array($sid,$arrsid) ==false)
                    {
                        if(empty($retdata['sid']))
                        {
                            $retdata['sid'] = $sid;
                        }else
                        {
                            $retdata['sid'] .= ",".$sid;
                        }
                        $ActivityModel->update(array('sid'=>$retdata['sid']), $data[$i]['id']);
                    }
                }
                
                
            }
            
            
        }
        
}

