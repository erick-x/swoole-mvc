<?php


class RegRate_Service {

    public static function getDataByTime($stServer,$begTime, $endTime) {
        $db = new RegRate_Model($stServer['sid_db'],$stServer['sid_dbuser'],xxtea_lib::decode($stServer['sid_dbpwd']),$stServer['sid_dbname']);
        return $db->getDataByTime($begTime, $endTime);
    }
}
