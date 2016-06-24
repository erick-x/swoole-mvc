<?php

class LoginNotice_Service {

    /**
     * 登录公告信息
     */
    public static function addLoginNotice($data,$stServer) {
        $db = new LoginNotice_Model($stServer['sid_db'],$stServer['sid_dbuser'],xxtea_lib::decode($stServer['sid_dbpwd']),$stServer['sid_dbname']);        
        return $db->insert($data);
    }   
    //G更新新内容到数据库中
    public static function addData($id,$data,$stServer) {
        $db = new LoginNotice_Model($stServer['sid_db'],$stServer['sid_dbuser'],xxtea_lib::decode($stServer['sid_dbpwd']),$stServer['sid_dbname']);        
        return $db->update($data,$id);
    }
    public static function getNotice($awhere,$stServer,$page = 1, $pagesize = 15) {
        $server = new LoginNotice_Model($stServer['sid_db'],$stServer['sid_dbuser'],xxtea_lib::decode($stServer['sid_dbpwd']),$stServer['sid_dbname']);
        return $server->getNotice($awhere,$page, $pagesize);
    }
    
    public static function getpPageNotice($awhere,$stServer,$page = 1, $pagesize = 15) {
        $server = new LoginNotice_Model($stServer['sid_db'],$stServer['sid_dbuser'],xxtea_lib::decode($stServer['sid_dbpwd']),$stServer['sid_dbname']);
        return $server->getPageNotice($awhere,$page, $pagesize);
    }
    
    public static function getNoticeTotal($stServer)
    {
        $server = new LoginNotice_Model($stServer['sid_db'],$stServer['sid_dbuser'],xxtea_lib::decode($stServer['sid_dbpwd']),$stServer['sid_dbname']);
        return $server->getNoticeTotal();
    }
    public static function UpdateNotice($data,$id,$stServer) {
        $db = new LoginNotice_Model($stServer['sid_db'],$stServer['sid_dbuser'],xxtea_lib::decode($stServer['sid_dbpwd']),$stServer['sid_dbname']);        
        return $db->update($data,$id);
    }
    public static function delNotice($id,$stServer) {
        $db = new LoginNotice_Model($stServer['sid_db'],$stServer['sid_dbuser'],xxtea_lib::decode($stServer['sid_dbpwd']),$stServer['sid_dbname']);        
        return $db->deldata($id);
    }
   
    public static function SendNoitce($data,$stServer) {
        $handler = Socket_Model::getInstance();
        $socket = $handler->InitSocket($stServer['zoneserver_ip'],$stServer['zoneserver_port']);
        if( !$socket )
        {
                return false;	
        }
        //封装消息到protobuf中
        $sendMsg = $handler->SendLoginNotice($data);
        $ret = $handler->SendMsg($sendMsg);
        $result = false;
        if( !$ret )
        {
                return false;	
        }
        try
        {
            //接收消息并解析
            $RequestServer = new PbProtocolCSMsg();
            $RequestServer->reset();
            $recvResult = $handler->ProcMsg($RequestServer);
            if($recvResult)
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
}
