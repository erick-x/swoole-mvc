<?php

class Notice_Service {

    /**
     * 公告信息
     */
    public static function addNotice($data,$stServer) {
        $db = new Notice_Model($stServer['sid_db'],$stServer['sid_dbuser'],xxtea_lib::decode($stServer['sid_dbpwd']),$stServer['sid_dbname']);        
        return $db->insert($data);
    }

    public static function addserver($id,$data,$stServer) {
        $db = new Notice_Model($stServer['sid_db'],$stServer['sid_dbuser'],xxtea_lib::decode($stServer['sid_dbpwd']),$stServer['sid_dbname']);        
        return $db->update($data,$id);
    }
    //不分页的
    public static function getNotice($platform,$awhere,$stServer,$page = 1, $pagesize = 15) {
        $server = new Notice_Model($stServer['sid_db'],$stServer['sid_dbuser'],xxtea_lib::decode($stServer['sid_dbpwd']),$stServer['sid_dbname']);
        return $server->getNotice($platform,$awhere,$page, $pagesize);
    }
    //分页的
    public static function getPageNotice($platform,$awhere,$stServer,$page = 1, $pagesize = 15) {
        $server = new Notice_Model($stServer['sid_db'],$stServer['sid_dbuser'],xxtea_lib::decode($stServer['sid_dbpwd']),$stServer['sid_dbname']);
        return $server->getPageNotice($platform,$awhere,$page, $pagesize);
    }
    public static function getNoticeTotal($platform,$stServer)
    {
        $server = new Notice_Model($stServer['sid_db'],$stServer['sid_dbuser'],xxtea_lib::decode($stServer['sid_dbpwd']),$stServer['sid_dbname']);
        return $server->getNoticeTotal($platform);
    }
    public static function UpdateNotice($data,$id,$stServer) {
        $db = new Notice_Model($stServer['sid_db'],$stServer['sid_dbuser'],xxtea_lib::decode($stServer['sid_dbpwd']),$stServer['sid_dbname']);        
        return $db->update($data,$id);
    }
    public static function delNotice($id,$stServer) {
        $db = new Notice_Model($stServer['sid_db'],$stServer['sid_dbuser'],xxtea_lib::decode($stServer['sid_dbpwd']),$stServer['sid_dbname']);        
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
        $sendMsg = $handler->SendNotice($data);
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
}
