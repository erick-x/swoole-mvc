<?php

class Cdk_Service {
     public static function getServer($platform,$sid) {
         $db = new Cdk_Model();        
        return $db->getServer($platform,$sid);
        
    }
}

