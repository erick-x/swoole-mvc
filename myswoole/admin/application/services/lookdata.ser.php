<?php

class LookData_Service {
    public static function getServer($platform) {
        $db = new AccountDB_Model();
        return $db->getServer($platform);
    }  
    public static function getOneServer($platform,$sid) {
        $db = new AccountDB_Model();       
        return $db->getOneServer($platform,$sid);
    } 
    
    public static function getPlatform() {
        $db = new AccountDB_Model();       
        return $db->GetPlatform();
    }
    public static function getRoleName($uin,$stServer,$sid) {
        $db = new LoadData_Model($stServer['roleip'],$stServer['roleuser'],  xxtea_lib::decode($stServer['rolepwd']),$stServer['roledb']);
        return $db->getName($uin,$sid);
    }

    public static function getRoleUin($strname,$stServer) {
        $db = new LoadData_Model($stServer['roleip'],$stServer['roleuser'],  xxtea_lib::decode($stServer['rolepwd']),$stServer['roledb']);
        return $db->getUin($strname);
    }
    
    public static function getRoleByRoleid($roleid,$stServer,$sid) {
        $db = new LoadData_Model($stServer['roleip'],$stServer['roleuser'],  xxtea_lib::decode($stServer['rolepwd']),$stServer['roledb']);
        return $db->getRolebyID($roleid,$sid);
    }
    
    public static function getAccountUin($accountid,$stServer,$accounttype) {
        $db = new LookData_Model($stServer['ip'],$stServer['user'],  xxtea_lib::decode($stServer['pwd']),$stServer['db']);
        return $db->getUin($accountid,$accounttype);
    }
    
    public static function getAccount($uin,$stServer) {
        $db = new LookData_Model($stServer['ip'],$stServer['user'],  xxtea_lib::decode($stServer['pwd']),$stServer['db']);
        return $db->getAccount($uin);
    }
   
}

