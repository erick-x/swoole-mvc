<?php

class LoadData_Service {
    
    public static function getData($stServer) {
        $db = new LoadData_Model($stServer['ip'],$stServer['dbuser'],  xxtea_lib::decode($stServer['dbpwd']),$stServer['dbname']);        
        return $db->getRole();
    }
    
    public static function getOnline($stServer) {
        $db = new Loadonline_Model($stServer['oip'],$stServer['odbuser'],xxtea_lib::decode($stServer['odbpwd']),$stServer['odbname']);    
        return $db->getRole();
    }    
}

