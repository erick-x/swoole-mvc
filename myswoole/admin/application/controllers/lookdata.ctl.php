<?php

class LookData_Controller extends Module_Lib{
    public function index(){
        $arrPlatform = LookData_Service::getPlatform();  
        $data = array(
            'platform'=>$arrPlatform,
            'data'=>LookForm_Service::getData(),
            'getInfo' => $this->checkPermission('lookdata/getInfo'),
            'getServer' => $this->checkPermission('lookdata/getServer'),
        );
 
        $this->load_view("lookdata",$data);
    }
    
    public function getServer() {
       if($_POST['Selplatform'] != 0)
       { 
           $platformid = $_POST['Selplatform'];
           $stServer =  LookData_Service::getServer($platformid); 
           // 返回成功
           $this->outputJson(0, $stServer ); 
       } 
    }
    
    public function getInfo() {
        $getdata = $_POST;
        if(empty($getdata['strname']))
        {
            $this->outputJson(-1, "请输入内容" ); 
        }
        
        if( empty($getdata['selPlatform'])||empty($getdata['selServer']))
        {
            $this->outputJson(-1, "请输入内容" ); 
        }
        if( intval($getdata['search']) == 2 && is_numeric( $getdata['strname'] )==FALSE)
        {
             $this->outputJson(-1, "请输入角色ID" ); 
        }
        //帐号查询
        if(intval($getdata['search']) == 2)
        {
            
            $ret = $this->getAccount($getdata);           
            if($ret < 0)
            {
                $this->outputJson(-1, "查询失败" ); 
                
            }else{
              
                $this->outputJson(0, $ret ); 
            }
        }
        
        //角色查询
        if(intval($getdata['search']) == 1)
        {
            
            $ret = $this->getRole($getdata);           
            if($ret < 0)
            {
                $this->outputJson(-1, "查询失败" ); 
                
            }else{
              
                $this->outputJson(0, $ret ); 
            }
        }
        
         $this->outputJson(-1, $getdata ); 
    }
   
    public function getRole($data){
        
        $stServer = LookData_Service::getOneServer($data['selPlatform'], $data['selServer']);
        if(empty($stServer))
        {
            return -1;
        }
        
        $uin = LookData_Service::getAccountUin($data['strname'], $stServer,$data['accounttype']);
        if($uin['uin'] <= 0)
        {
            return -1;
        }
        
        $roleinfo = LookData_Service::getRoleName($uin['uin'], $stServer,$data['selServer']);
        if(empty($roleinfo))
        {
            return -1;
        }
        
        $retdata =  array(
            'accountid'=>$uin['accountID'],
            'strname'=>$roleinfo['strname'],
            'roleid'=>$roleinfo['roleid'],
            'level'=>$roleinfo['level'],
        );
        return $retdata;
    }
    
    public function getAccount($data){
        $stServer = LookData_Service::getOneServer($data['selPlatform'], $data['selServer']);
        if(empty($stServer))
        {
            return -1;
        }
       
         $uin = LookData_Service::getRoleByRoleid($data['strname'], $stServer, $data['selServer']);
         if($uin == false)
        {
            return -1;
        }

        
        $roleinfo = LookData_Service::getAccount($uin['uin'], $stServer);
        
        if(empty($roleinfo))
        {
            return -1;
        }
        $retdata =  array(
            'accountid'=>$roleinfo['accountID'],
            'strname'=>$uin['strname'],
            'roleid'=>$uin['roleid'],
            'level'=>$uin['level'],
        );
        
        return $retdata;
    }
}
