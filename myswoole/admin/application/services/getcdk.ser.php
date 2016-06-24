<?php

class GetCdk_Service {
     public static function getCdk($cdk,$stServer) {
         $model = new GetCdk_Model($stServer['dbip'],$stServer['dbuser'],$stServer['dbpwd'],$stServer['dbname']);  
        return $model->getCdk($cdk);
    }
}

