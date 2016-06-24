<?php
//活动创建模块

class ShowData_Controller extends Module_Lib{
    
    //显示控制页面
    public function index(){
        $list = ShowData_Service::getData();
        $data = array(
            'data'=>$list,
        );
        $this->load_view("showdata",$data);
    }
    
    public function freshbtn() {
            
        $serverlist = LoadServer_Service::loadserver();
        if(empty($serverlist))
        {
            Header("Location:/showdata/index");
        }
        
        ShowData_Service::delete();
        for($i = 0;$i < count($serverlist);++$i)
        {
            $totalrole = LoadData_Service::getData($serverlist[$i]);          
            $data = array(
                'sid'=>$serverlist[$i]['sid'],
                'roletotal'=>$totalrole['total']
            );
            if( !empty($totalrole['total']) )
            {
                ShowData_Service::insert($data);
            }   
        }
        $this->outputJson(0,"");
    }
    
    public function LoadOnline() {
        
        $stServer = Config::get("key.morefun");
        
        $list = ShowData_Service::LoadOnLine($stServer);
        $data = array(
            'data'=>$list,
        );
        $this->load_view("online",$data);
    }
}  