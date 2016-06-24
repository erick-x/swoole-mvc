<?php

class LoadServer_Service {
     public static function loadserver() {
        $db = new LoadServer_Model();        
        return $db->loadServer();
    }
}

