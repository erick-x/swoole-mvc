<?php

/*
 * 角色管理
 */

class Role_Controller extends Module_Lib {

    /**
     * 显示角色列表
     */
    public function listR() {
        $roles = Role_Service::getAllRoles();
        $data['roles'] = $roles;
        $data['addRole'] = $this->checkPermission('role/addRole');
        $data['editRole'] = $this->checkPermission('role/editRole');
        $data['delRole'] = $this->checkPermission('role/delRole');
        $data['manager'] = $this->checkPermission('role/manager');
        $this->load_view('role', $data);
    }

    /**
     * 添加一个组
     */
    public function addRole() {
        if (empty($_POST['rname'])) {
            $this->outputJson(-1, '组名不能为空！');
        }

        $rname = $_POST['rname'];
        $desc = $_POST['desc'];

        $data = array('t_rname' => $rname, 't_desc' => $desc);
        $role = Role_Service::getRoleByName($rname);
        //var_dump($role);exit();
        if (!empty($role)) {
            $this->outputJson(-2, "组{$rname}已经存在！");
        }
        $ret = Role_Service::insert($data);
        if (!$ret) {
            $this->outputJson(-3, '网络异常，请重新输入');
        }
        $this->outputJson(0, '添加成功');
    }
    
    /**
     *  修改组信息
     */
    public function editRole(){
        if(empty($_POST['id'])){
            $this->outputJson(-1,'组ID不能为空！');
        }
        
        if(empty($_POST['rname'])){
            $this->outputJson(-1,'组名不能为空！');
        }
        
        $roleId = $_POST['id'];
        $rname = $_POST['rname'];
        $desc = $_POST['desc'];
        
        $data = array('t_rname'=>$rname,'t_desc'=>$desc);
        $role = Role_Service::getRoleById($roleId,false);
        
        if(empty($role)){
            $this->outputJson(-2,"要修改的组不存在!");
        }
        
        //验证保留  Role_Service::getRoleByName($rname);
        $data = array('t_rname'=>$rname,'t_desc'=>$desc);
        $ret = Role_Service::update($roleId,$data);
        if(!$ret){
            $this->outputJson(-3,'网络异常，请重新输入');
        }
        $this->outputJson(0,'修改成功');
    }
    
    /**
     * 删除组
     */
    public function delRole(){
        if(empty($_GET['id'])){
            $this->outputJson(-1,'组ID不能为空！');
        }
        $roleId = $_GET['id'];
        $ret = Role_Service::delete($roleId);
        if(!$ret){
            $this->outputJson(-3,'网络异常，请重新输入');
        }
        $this->outputJson(0,'删除成功');
    }
    /**
     * 管理组权限页面
     */
    public function manager() {
        $roleId = !empty($_GET['id']) ? $_GET['id'] : 1;
        //获得某id的组信息
        $role = Role_Service::getRoleById($roleId, false);

        $aPermission = explode(',', $role['t_permission']);

        //获得所有的组信息
        $roles = Role_Service::getAllRoles();

        //获得菜单列表
        $menutree = Menu_Service::getTree(Menu_Service::getMenuLists());
        $menuhtml = htmlspecialchars(Menu_Service::generateMenuStructure($menutree, $aPermission));
        
        $data = array('role' => $role, 'roles' => $roles, 'menuhtml' => $menuhtml);
        $data['editPermission'] = $this->checkPermission('role/editPermission');
        $this->load_view('role_manager', $data);
    }

    /**
     * 获得组权限
     */
    public function getPermission() {
        if (empty($_GET['id'])) {
            $this->outputJson(-1, '组ID不能为空!');
        }
        $roleId = $_GET['id'];
        if ($roleId == 1) {
            //管理员组
            $menulists = Menu_Service::getMenuLists();
        } else {
            $role = Role_Service::getRoleById($roleId);
           // var_dump($role);
            $menulists = !empty($role['permission']) ? $role['permission'] : array();
        }
        $this->outputJson(0, '成功', array('menulists' => $menulists));
    }

    /**
     * 修改组权限
     */
    public function editPermission() {
        if (empty($_POST['roleId'])) {
            $this->outputJson(-1, '组ID不能为空!');
        }
        $roleId = $_POST['roleId'];
        $permission = $_POST['permissions'];

        $ret = Role_Service::update($roleId, array('t_permission' => $permission));
        if (!$ret) {
            $this->outputJson(-2, '网络原因，请稍后重试！');
        }
        $this->outputJson(0, '更新成功');
    }

}
