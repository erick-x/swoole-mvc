<?php

/*
 * 菜单管理
 */

class Menu_Controller extends Module_Lib {
    
    /**
     * 菜单列表
     */
    public function menus() {
        $data['pMenus'] = Menu_Service::getAllPMenus();
        if(empty($_GET['pid'])){
           $menus = Menu_Service::getMenuLists();
        }else{
            $menus = Menu_Service::getMenusByPid($_GET['pid']);
            $menulists = Menu_Service::getMenuLists(array($_GET['pid']));
             //var_dump($menus,$menulists);
            $data['menu'] = $menulists[$_GET['pid']];
        }
        $data['menus'] = Menu_Service::sortMenu(Menu_Service::getTree($menus));
        $data['addMenu'] = $this->checkPermission('menu/addMenu');
        $data['editMenu'] = $this->checkPermission('menu/editMenu');
        $data['hideMenu'] = $this->checkPermission('menu/hideMenu');
          //var_dump(Menu_Service::getTree($menus),$data);
        $this->load_view('menu',$data);
    }
   
    /**
     * 添加菜单
     */
    public function addMenu() {
        if (empty($_POST['mname'])) {
            $this->outputJson(-1, '菜单名称不能为空！');
        }
        if (empty($_POST['controller'])) {
            $this->outputJson(-1, '菜单控制器不能为空！');
        }
        if (empty($_POST['method'])) {
            $this->outputJson(-1, '菜单方法不能为空！');
        }

        $data = array(
            't_mname' => trim($_POST['mname']),
            't_controller' => $_POST['controller'],
            't_method' => $_POST['method'],
            't_argv'  => $_POST['argv'],
            't_pid' => isset($_POST['pid']) ? intval($_POST['pid']) : 0,
            't_status' => isset($_POST['status']) ? intval($_POST['status']) : 0,
            't_desc' => isset($_POST['desc']) ? $_POST['desc'] : '',
            't_postion'=>isset($_POST['postion']) ? intval($_POST['postion']) : 0,
        );
        
        $ret = Menu_Service::insert($data);
        if(!$ret){
            $this->outputJson(-2,'网络原因，请稍后重试！');
        }
        $this->outputJson(0,'添加成功');
    }
    
    /**
     * 编辑菜单
     */
    public function editMenu(){
        if (empty($_POST['id'])) {
            $this->outputJson(-1, '菜单ID不能为空！');
        }
        if (empty($_POST['mname'])) {
            $this->outputJson(-1, '菜单名称不能为空！');
        }
        if (empty($_POST['controller'])) {
            $this->outputJson(-1, '菜单控制器不能为空！');
        }
        if (empty($_POST['method'])) {
            $this->outputJson(-1, '菜单方法不能为空！');
        }
        
        $data = array(
            't_mname' => $_POST['mname'],
            't_controller' => $_POST['controller'],
            't_method' => $_POST['method'],
            't_argv'=>$_POST['argv'],
            't_pid' => isset($_POST['pid']) ? intval($_POST['pid']) : 0,
            't_status' => isset($_POST['status']) ? intval($_POST['status']) : 0,
            't_desc' => isset($_POST['desc']) ? $_POST['desc'] : '',
            't_postion'=>isset($_POST['postion']) ? intval($_POST['postion']) : 0,
        );
        
        $ret = Menu_Service::update($_POST['id'],$data);
        if(!$ret){
            $this->outputJson(-2,'网络原因，请稍后重试！');
        }
        $this->outputJson(0,'修改成功');
    }
    
    /**
     * 隐藏菜单
     */
    public function hideMenu(){
        if(empty($_GET['id'])){
            $this->outputJson(-1,'菜单ID不能为空！');
        }
        
        $ret = Menu_Service::update($_GET['id'], array('t_status'=>1));
        if(!$ret){
            $this->outputJson(-2,'网络原因，请稍后重试！');
        }
        $this->outputJson(0,'隐藏成功');
    }
}
