<?php

class Cdk_Controller extends Module_Lib{
    public function cdkShow(){
        $arrPlatform = Platform_Service::getPlatforms();           
        $this->load_view("searchcdk",array('platform'=>$arrPlatform));
    }
    
    public function getServer() {
       if($_POST['Selplatform'] != 0)
       { 
           $platformid = $_POST['Selplatform'];
           $stServer =  Platform_Model::getPlatformByID($platformid); 
           $server = Server_Service::getAllServers($platformid,$stServer);
           // 返回成功
           $this->outputJson(0, $server ); 
       }    
    }
    
    public function getCdk()
    {
       if(empty( $_POST['selPlatform']))
       {
            $this->outputJson(-1, '没有选中平台！');
       }
       if(empty( $_POST['selServer']))
       {
            $this->outputJson(-1, '没有选中区服！');
       }
       if(empty( $_POST['cdk']))
       {
           $this->outputJson(-1, '请输入激活码！');
       }
       $server = Cdk_Service::getServer($_POST['selPlatform'],$_POST['selServer']);

       $arrCdk = GetCdk_Service::getCdk($_POST['cdk'], $server);
       if(!is_array($arrCdk)||empty($arrCdk))
       {
           $this->outputJson(-1, '没有查询到数据！');
       }
       $data = array('starttime'=>date('Y-m-d H:i:s',$arrCdk['starttime']),
           'endtime'=>date('Y-m-d H:i:s',$arrCdk['endtime']),
           'keyword'=>$arrCdk['keyword'],
           'keystat'=>$arrCdk['keystat']
           );
               
       $this->outputJson(0,$data );
    }
}
