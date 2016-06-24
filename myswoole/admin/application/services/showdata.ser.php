<?php

class ShowData_Service {
     public static function getData() {
        $db = new ShowData_Model();        
        return $db->getdata();
    }
    
    public static function insert($data){
        $db = new ShowData_Model(); 
        return $db->insert($data);
    }
    public static function delete() {
         $db = new ShowData_Model(); 
        return $db->delete();
    }
    
    public static function insertConfig($data)
    {
        $db = new AddConfig_Model();
        return $db->insert($data);
    }
    
    public static function LoadOnLine($stServer) {
       $db =  new Loadonline_Model($stServer['ip'],$stServer['user'],$stServer['pwd'],$stServer['db']);
       return $db->getRole();
    }
}

