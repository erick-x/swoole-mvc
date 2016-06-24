<?php
class PlatformNotice_Service {

    /**
     *  添加公告
     */
    public static function addNotice($data,$stServer) {
        $db = new PlatformNotice_Model($stServer['sid_db'],$stServer['sid_dbuser'],xxtea_lib::decode($stServer['sid_dbpwd']),$stServer['sid_dbname']);        
        return $db->insert($data);
    }
    
    //分页的
    public static function getPageNotice($stServer,$page = 1, $pagesize = 15) {
        $db = new PlatformNotice_Model($stServer['sid_db'],$stServer['sid_dbuser'],xxtea_lib::decode($stServer['sid_dbpwd']),$stServer['sid_dbname']);
        return $db->getNotice($page, $pagesize);
    }
    public static function getNoticeTotal($stServer)
    {
        $db = new PlatformNotice_Model($stServer['sid_db'],$stServer['sid_dbuser'],xxtea_lib::decode($stServer['sid_dbpwd']),$stServer['sid_dbname']);
        return $db->getNoticeTotal();
    }
    
    public static function UpdateNotice($data,$id,$stServer) {
        $db = new PlatformNotice_Model($stServer['sid_db'],$stServer['sid_dbuser'],xxtea_lib::decode($stServer['sid_dbpwd']),$stServer['sid_dbname']);        
        return $db->update($data,$id);
    }
    
    public static function delNotice($id,$stServer) {
        $db = new PlatformNotice_Model($stServer['sid_db'],$stServer['sid_dbuser'],xxtea_lib::decode($stServer['sid_dbpwd']),$stServer['sid_dbname']);        
        return $db->deldata($id);
    }
    
    public static function SendNotice($data,$stServer) {
            $handler = Socket_Model::getInstance();
            $socket = $handler->InitSocket($stServer['sid_ip'],$stServer['sid_port']);
            if( !$socket )
            {
                return false;	
            }
            $sendMsg = $handler->sendPlatformNotice($data);
            $ret = $handler->SendMsg($sendMsg);
            $result = false;
            if( !$ret )
            {
                return false;	
            }
            try
            {
                $RequestServer = new PbProtocolCSMsg();
                $RequestServer->reset();
                if($handler->ProcMsg($RequestServer))
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
