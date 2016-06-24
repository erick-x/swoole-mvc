<?php

/*
 * 添加平台
 */

class Platform_Controller extends Module_Lib {
    
    /**
     * 菜单列表
     */
    public function platform() {
                          
        $page = empty($_GET['p']) ? 1 : $_GET['p'];
        $pagesize = empty($_GET['pagesize']) ? 10: $_GET['pagesize'];
        $total = Platform_Service::getPlatformTotal();
        $pagehtml = htmlspecialchars(Helper_Lib::getPageHtml($total, $page, $pagesize));
        
        $data = array(
            'pagehtml'=>$pagehtml,
            'platform'=>Platform_Service::getAllPlatform($page, $pagesize),
            'addPlatform' =>$this->checkPermission('platform/addPlatform'),
            'editPlatform'=>$this->checkPermission('platform/editPlatform'),
         );
         
        $this->load_view('platform',$data);
    }
   
    /**
     * 添加平台
     */
    public function addPlatform() {
        if (empty($_POST['platformName'])) {
            $this->outputJson(-1, '平台名称不能为空！');
        }
        if (empty($_POST['platformAddr'])) {
            $this->outputJson(-1, '映射地址不能为空！');
        }
        if (empty($_POST['platformPort'])) {
            $this->outputJson(-1, '映射端口不能为空！');
        }

 	if (empty($_POST['platformDBAddr'])) {
            $this->outputJson(-1, '映射数据库地址不能为空！');
        }
        if (empty($_POST['platformDBName'])) {
            $this->outputJson(-1, '映射数据库名不能为空！');
        }
		if (empty($_POST['platformDBUser'])) {
            $this->outputJson(-1, '数据库用户名不能为空！');
        }
		
        if (empty($_POST['platformDBPwd'])) {
            $this->outputJson(-1, '映射数据库密码不能为空！');
        }
        $data = array(
            'platform_name' => $_POST['platformName'],
            'platform_desc' => isset($_POST['desc'])? $_POST['desc']:"未填写" ,
            'createtime' =>time(0),
            'sid_ip' => $_POST['platformAddr'],
            'sid_port' => $_POST['platformPort'],
	    'sid_db' => $_POST['platformDBAddr'],
            'sid_dbname' => $_POST['platformDBName'],
	    'sid_dbuser'=>$_POST['platformDBUser'],
	    'sid_dbpwd' => xxtea_lib::encode($_POST['platformDBPwd']),
            'platform_num'=>0,
        );
        
        $ret = Platform_Service::insert($data);
        if(!$ret){
            $this->outputJson(-2,'网络原因，请稍后重试！');
        }
        $this->outputJson(0,'添加成功');
    }
    
    /**
     * 编辑平台
     */
    public function editPlatform(){
       if (empty($_POST['platformName'])) {
            $this->outputJson(-1, '平台名称不能为空！');
        }
      
        $data = array(
            'platform_name' => $_POST['platformName'],
            'platform_desc' => isset($_POST['desc'])? $_POST['desc']:"未填写" ,
        );
        
        $ret = Platform_Service::update($_POST['id'],$data);
        if(!$ret){
            $this->outputJson(-2,'网络原因，请稍后重试！');
        }
        $this->outputJson(0,'修改成功');
    }
}
