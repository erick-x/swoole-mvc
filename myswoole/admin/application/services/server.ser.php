<?php

class Server_Service {

    /**
     * @param type $ip       区服所在服务器
     * @param type $sname    区服名称
     * @return type 是否插入成功
     */
    public static function addServer($data,$stServer) {
        $db = new Server_Model($stServer['sid_db'],$stServer['sid_dbuser'],xxtea_lib::decode($stServer['sid_dbpwd']),$stServer['sid_dbname']);
        
        return $db->insert($data);
    }
    
    //添加白名�?
    public static function addWhite($data,$stServer) {
        $db = new Server_Model($stServer['sid_db'],$stServer['sid_dbuser'],xxtea_lib::decode($stServer['sid_dbpwd']),$stServer['sid_dbname']);
        
        return $db->insertWhite($data);
    }
    //删除
    public static function delWhite($data,$stServer ){
        $db = new Server_Model($stServer['sid_db'],$stServer['sid_dbuser'],xxtea_lib::decode($stServer['sid_dbpwd']),$stServer['sid_dbname']);
        
        return $db->delWhite($data);
    }
    /**
     * @param type $PlatformId      平台
     * @param type $sid    区服
     * @return type 是否更新成功
     */
	public static function editServer($data,$PlatformId,$sid,$stServer) {       
        $db =new Server_Model($stServer['sid_db'],$stServer['sid_dbuser'],xxtea_lib::decode($stServer['sid_dbpwd']),$stServer['sid_dbname']);
        return $db->update($data,$PlatformId,$sid);
    }
	
    public static function getWhite($stServer)
    {
        $server = new Server_Model($stServer['sid_db'],$stServer['sid_dbuser'],xxtea_lib::decode($stServer['sid_dbpwd']),$stServer['sid_dbname']);
        return $server->getWhite();
    }

    /**
     * @param type $PlatformId      平台
     * @param type $sid    区服
     * @return type 是否更新成功
     */
	public static function serverState($data,$PlatformId,$sid,$stServer) {    
        $db = new Server_Model($stServer['sid_db'],$stServer['sid_dbuser'],xxtea_lib::decode($stServer['sid_dbpwd']),$stServer['sid_dbname']);
        return $db->update($data,$PlatformId,$sid);
    }
	
    /**
     * @param type $PlatformId      平台
     * @param type $sid    区服
     * @return type 是否更新成功
     */
	public static function serverInfo($data,$PlatformId,$sid,$stServer) {
        $db = new Server_Model($stServer['sid_db'],$stServer['sid_dbuser'],xxtea_lib::decode($stServer['sid_dbpwd']),$stServer['sid_dbname']);
        return $db->update($data,$PlatformId,$sid);
    }
		
    /**
     * 获取某平台分页后的区服信
     * @param type $page
     * @param type $pagesize
     * @return boolean
     */
    public static function getServers($platform,$stServer,$page = 1, $pagesize = 15) {
        $server = new Server_Model($stServer['sid_db'],$stServer['sid_dbuser'], xxtea_lib::decode($stServer['sid_dbpwd']),$stServer['sid_dbname']);
        return $server->getServers($platform,$page, $pagesize);
    }
    
    /**
     * 获得某平台区服信
     * @return boolean
     */
    public static function getAllServers($platform,$stServer) {
        $server = new Server_Model($stServer['sid_db'],$stServer['sid_dbuser'],xxtea_lib::decode($stServer['sid_dbpwd']),$stServer['sid_dbname']);
        return $server->getAllServers($platform);
        
    }

    public static function getServerTotal($platform,$stServer)
    {
        $server = new Server_Model($stServer['sid_db'],$stServer['sid_dbuser'],xxtea_lib::decode($stServer['sid_dbpwd']),$stServer['sid_dbname']);
        return $server->getServersTotal($platform);
    }

    /**
     * @param type $platform 平台id
     * @param type $sid      区服id
     */
    	public static function getServerByPtAndId($platform, $sid,$stServer) {            
        $db = new Server_Model($stServer['sid_db'],$stServer['sid_dbuser'],xxtea_lib::decode($stServer['sid_dbpwd']),$stServer['sid_dbname']);
        return $db->getServerBySid($platform, $sid);
    }
    
    public static function gethefuServer($platform, $stServer) {
        $db = new Server_Model($stServer['sid_db'],$stServer['sid_dbuser'],xxtea_lib::decode($stServer['sid_dbpwd']),$stServer['sid_dbname']);
        $sidarray = $db->getAllServers($platform);
        if(empty($sidarray))
        {
            return -1;
        }
        
        $newArray = array();
        $k = 0;
        for ($i =count($sidarray); $i > 0 ;--$i)
        {            
            for($j = $i-1;$j>0 ;--$j)
            {
                if($sidarray[$j]["zoneserver_ip"] == $sidarray[$i]["zoneserver_ip"] && $sidarray[$j]["zoneserver_port"] == $sidarray[$i]["zoneserver_port"] )
                {
                   $newArray[$k++] =  $sidarray[$j]["sid"];
                }
            }
        }
        
        $hefusid = array();
        $l =0;
        $unArray = array_unique($newArray);
        for( $i = 0; $i < count($sidarray); ++$i)
        {
            if(in_array($sidarray[$i]["sid"], $unArray) )
            {
                continue;
            }
            $hefusid[$l++] = $sidarray[$i];
        }
        
        return $hefusid;
    }

}
