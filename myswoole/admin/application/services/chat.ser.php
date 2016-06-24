<?php

class Chat_Service {
     public static function getChat($platform,$data,$stServer,$page =1 ,$pagesize=10) {
        $db = new Chat_Model($stServer['ip'],$stServer['user'],$stServer['pwd'],$stServer['db']);        
        return $db->getChat($platform,$data,$page ,$pagesize);
    }
    
    public static function gettotal($platform,$data,$stServer) {
         $db = new Chat_Model($stServer['ip'],$stServer['user'],$stServer['pwd'],$stServer['db']);    
         return $db->getTotal($platform,$data);
    }
}

