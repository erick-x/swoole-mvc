<?php

class LookForm_Service {
     public static function getServer($platform) {
        $db = new PayForm_Model();       
        return $db->getServer($platform);
    }  
    
    public static function getPlatform() {
        $db = new PayForm_Model();       
        return $db->GetPlatform();
    }

    public static function getOneServer($platform,$sid) {
        $db = new PayForm_Model();       
        return $db->getOneServer($platform,$sid);
    }  
    
    public static function getOrder($roleid,$sid,$stServer) {
        $db = new LookForm_Model($stServer['payip'],$stServer['payuser'],  xxtea_lib::decode($stServer['paypwd']),$stServer['paydb']);
        return $db->getOrder($roleid, $sid);
    }
    
    public static function getData() {
        $db = new PayResult_Model();
        return $db->getdata();
    }
    
    public static function insert($data)
    {
        $db = new PayResult_Model();
        return $db->insert($data);
    }
    
    public static  function delete() {
        $db = new PayResult_Model();
        return $db->delete();
    }
    
    public static  function update($data,$orderid,$sid,$stServer) {
        $db = new LookForm_Model($stServer['payip'],$stServer['payuser'],  xxtea_lib::decode($stServer['paypwd']),$stServer['paydb']);
        return $db->update($data, $orderid,$sid);
    }
}

