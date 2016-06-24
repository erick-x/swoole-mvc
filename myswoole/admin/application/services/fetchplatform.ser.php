<?php

class FetchPlatform_Service {
     public static function getServer($platform) {
         $db = new FetchPlatform_Model();        
        return $db->getServer($platform);
    }
}

