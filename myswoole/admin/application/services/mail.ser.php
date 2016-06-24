<?php

/*
 *  邮件系统
 */

class Mail_Service {
 
    public static function getNoPassMail($awhere,$stServer,$page = 1, $pagesize = 10) {
        $model = new Mail_Model($stServer['sid_db'],$stServer['sid_dbuser'],xxtea_lib::decode($stServer['sid_dbpwd']),$stServer['sid_dbname']);
        $rows = $model->getNoPassMail($awhere, $page, $pagesize);
        $i = 0;
        if(is_array($rows)&&isset($rows))
        foreach ($rows as $value) {

              $namearray[$i++] = array('prop1name'=> Mail_Service::Getname($value['prop_id1']),
                  'prop2name'=>Mail_Service::Getname($value['prop_id2']),
                  'prop3name'=>Mail_Service::Getname($value['prop_id3']),
                  'prop4name'=>Mail_Service::Getname($value['prop_id4']),
                  'heroname'=>Mail_Service::Getname($value['heroid']),
                  'equipname'=>Mail_Service::Getname($value['equipid']),
                  );
        }
        
        return array('data'=>$rows,'name'=>$namearray);
    }

    public static function getLookMail($awhere,$stServer,$page = 1, $pagesize = 10) {
        $model = new Mail_Model($stServer['sid_db'],$stServer['sid_dbuser'],xxtea_lib::decode($stServer['sid_dbpwd']),$stServer['sid_dbname']);
        $rows = $model->getLookMail($awhere, $page, $pagesize);
        $i = 0;
        if(is_array($rows)&&isset($rows))
        foreach ($rows as $value) {

              $namearray[$i++] = array('prop1name'=> Mail_Service::Getname($value['prop_id1']),
                  'prop2name'=>Mail_Service::Getname($value['prop_id2']),
                  'prop3name'=>Mail_Service::Getname($value['prop_id3']),
                  'prop4name'=>Mail_Service::Getname($value['prop_id4']),
                  'heroname'=>Mail_Service::Getname($value['heroid']),
                  'equipname'=>Mail_Service::Getname($value['equipid']),
                  );
        }
        
        return array('data'=>$rows,'name'=>$namearray);
    }
    public static function getAlreadySendMail($awhere,$stServer,$page = 1, $pagesize = 10) {
        $model = new Mail_Model($stServer['sid_db'],$stServer['sid_dbuser'],xxtea_lib::decode($stServer['sid_dbpwd']),$stServer['sid_dbname']);
        $rows = $model->getAlreadySendMail($awhere, $page, $pagesize);
        $i = 0;
        if(is_array($rows)&&isset($rows))
        foreach ($rows as $value) {

              $namearray[$i++] = array('prop1name'=> Mail_Service::Getname($value['prop_id1']),
                  'prop2name'=>Mail_Service::Getname($value['prop_id2']),
                  'prop3name'=>Mail_Service::Getname($value['prop_id3']),
                  'prop4name'=>Mail_Service::Getname($value['prop_id4']),
                  'heroname'=>Mail_Service::Getname($value['heroid']),
                  'equipname'=>Mail_Service::Getname($value['equipid']),
                  );
        }
        return array('data'=>$rows,'name'=>$namearray);
    }
    public static function getRevokePassMail($awhere,$stServer,$page = 1, $pagesize = 10) {
        $model = new Mail_Model($stServer['sid_db'],$stServer['sid_dbuser'],xxtea_lib::decode($stServer['sid_dbpwd']),$stServer['sid_dbname']);
        $rows = $model->getRevokePassMail($awhere, $page, $pagesize);
        $i = 0;
        if(is_array($rows)&&isset($rows))
        foreach ($rows as $value) {

              $namearray[$i++] = array('prop1name'=> Mail_Service::Getname($value['prop_id1']),
                  'prop2name'=>Mail_Service::Getname($value['prop_id2']),
                  'prop3name'=>Mail_Service::Getname($value['prop_id3']),
                  'prop4name'=>Mail_Service::Getname($value['prop_id4']),
                  'heroname'=>Mail_Service::Getname($value['heroid']),
                  'equipname'=>Mail_Service::Getname($value['equipid']),
                  );
        }
        
        return array('data'=>$rows,'name'=>$namearray);
    }
    
    public static function getTotalMail($stServer) {
        $model = new Mail_Model($stServer['sid_db'],$stServer['sid_dbuser'],xxtea_lib::decode($stServer['sid_dbpwd']),$stServer['sid_dbname']);
        $rows = $model->getTotalMail();
        return $rows;
    }
    
    /**
     * 更新邮箱信息
     */
    public static function update($data,$id,$stServer) {
        $db = new Mail_Model($stServer['sid_db'],$stServer['sid_dbuser'],xxtea_lib::decode($stServer['sid_dbpwd']),$stServer['sid_dbname']);
        return $db->update($data,$id);
    }

    /**
     * 添加邮箱
     */
    public static function addMail($data,$stServer) {
        $db = new Mail_Model($stServer['sid_db'],$stServer['sid_dbuser'],xxtea_lib::decode($stServer['sid_dbpwd']),$stServer['sid_dbname']);
        return $db->insert($data);
    }

    /**
     * 删除
     */
    public static function delMail($id,$stServer) {
       $db = new Mail_Model($stServer['sid_db'],$stServer['sid_dbuser'],xxtea_lib::decode($stServer['sid_dbpwd']),$stServer['sid_dbname']);
       $ret = $db->delmail($id);
       if (!$ret)
            throw new Exception_Lib(1002);
        return true;
    }

    //发送全服的邮件
     public static function SendAllMail($data,$stServer) {
        $handler = Socket_Model::getInstance();
        $socket = $handler->InitSocket($stServer['zoneserver_ip'],$stServer['zoneserver_port']);
        if( !$socket )
        {
                return false;	
        }
        //封装消息到protobuf中
        $sendMsg = $handler->SendAllMail($data);
        $ret = $handler->SendMsg($sendMsg);
        
        if( !$ret )
        {
                return false;	
        }
        $result = false;
        try
        {
            //接收消息并解析
            $RequestServer = new PbProtocolCSMsg();
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
    
    //发送单个人的邮件
     public static function SendMail($data,$stServer) {
        $handler = Socket_Model::getInstance();
        $socket = $handler->InitSocket($stServer['zoneserver_ip'],$stServer['zoneserver_port']);
        if( !$socket )
        {
                return false;	
        }
        //封装消息到protobuf中
        $sendMsg = $handler->SendMail($data);
        $ret = $handler->SendMsg($sendMsg);
        
        if( !$ret )
        {
                return false;	
        }
        $result = false;
        try
        {
            //接收消息并解析
            $RequestServer = new PbProtocolCSMsg();
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
    
    public static function CheckValue($id,$num) {
        $loaddata = new LoadAttachment_Model();
        $ret = $loaddata->getlimitConfig($id,$num);
         unset($loaddata);
        return $ret;
        
    }
     public static function CheckProp($id,$type) {
        $loaddata = new LoadAttachment_Model();
        $ret = $loaddata->CheckProp($id,$type);
        unset($loaddata);
        return $ret;
        
    }
    
    //获取对应id的名字
    public static function Getname($id) {
        $loaddata = new LoadAttachment_Model();
        $ret = $loaddata->getAttachmentConfig($id);
        if($ret)
        {
            unset($loaddata);
            return $ret;
        }
        unset($loaddata);
        return false;    
    }
    
    
    //撤回邮件
     public static function RevokeMail($data,$stServer) {
        $handler = Socket_Model::getInstance();
        $socket = $handler->InitSocket($stServer['zoneserver_ip'],$stServer['zoneserver_port']);
        if( !$socket )
        {
                return false;	
        }
        //封装消息到protobuf中
        $sendMsg = $handler->revokeMail($data);
        $ret = $handler->SendMsg($sendMsg);
        $result = false;
        if( !$ret )
        {
                return false;	
        }
        try
        {
            //接收消息并解析
            $RequestServer = new PbProtocolCSMsg();
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
    
    
}
