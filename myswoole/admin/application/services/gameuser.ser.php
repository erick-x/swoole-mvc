<?php

/*
 *  游戏用户管理
 */

class Gameuser_Service {
 
    /**
     * 更新游戏用户信息
     * @param type $uid
     * @param type $data
     * @return type
     */
    public static function updateRole($Server, $data) {
        if (!is_array($data) || empty($data)||!is_array($Server) || empty($Server)) {
            return false;
        }
        
        $handler = Socket_Model::getInstance();
	
        $socket = $handler->InitSocket($Server['zoneserver_ip'],$Server['zoneserver_port']);
        if( !$socket )
        {
            return false;	
        }
        
        $sendMsg = $handler->UpdateRoleBase($data);
        $ret = $handler->SendMsg($sendMsg);
        $result = false;
        if( !$ret )
        {
            return false;	
        }
        try
        {
            $RequestServer = new PbProtocolCSMsg();
            $RequestServer->reset();
            $recvResult = $handler->ProcMsg($RequestServer);
            if($recvResult)
            {
                $result = $handler->ProCommondRet($RequestServer);
            }
            unset($RequestServer);
        }catch (Exception $e)
        {	
                unset($handler);
                echo $e->getMessage();	
        }	
        unset($handler);
        return $result;
    }

     public static function ForbidRole($Server, $data) {
        if (!is_array($data) || empty($data)||!is_array($Server) || empty($Server)) {
            return false;
        }
        
        $handler = Socket_Model::getInstance();
        $socket = $handler->InitSocket($Server['zoneserver_ip'],$Server['zoneserver_port']);
        if( !$socket )
        {
            return false;	
        }
        
        $sendMsg = $handler->ForbidRole($data);
        $ret = $handler->SendMsg($sendMsg);
        $result = false;
        if( !$ret )
        {
            return false;	
        }
        try
        {
            $RequestServer = new PbProtocolCSMsg();
            $RequestServer->reset();
            $recvResult = $handler->ProcMsg($RequestServer);
            if($recvResult)
            {
                $result = $handler->ProCommondRet($RequestServer);
            }
            unset($RequestServer);
        }catch (Exception $e)
        {	
                echo $e->getMessage();	
        }	
        unset($handler);
        return $result;
    }
}
