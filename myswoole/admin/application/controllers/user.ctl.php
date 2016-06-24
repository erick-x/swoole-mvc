<?php

/*
 * 用户信息相关
 */

class User_Controller extends Module_Lib {

    /**
     * 检查是否登录
     */
    public function checkLogin() {
        return User_Service::checkLogin();
    }

    /**
     * 登录
     */
    public function login() {
//        if ($this->checkLogin()) {
//            $go = urldecode($_GET['go']);
//            $go = empty($go) ? '/' : $go;
//            header("Location:" . $go);
//            exit();
//        }
        load_view('login');
    }

    /**
     * 登录
     */
    public function userLogin() {
        //判断参数
        if (empty($_POST['account'])) {
            $this->outputJson(-1, '登录帐号不能为空');
        }
        if (empty($_POST['pass'])) {
            $this->outputJson(-1, '登录密码不能为空');
        }
    
        $account = $_POST['account'];
        $pass = $_POST['pass'];
        $remember = empty($_POST['remember']) ? 0 : $_POST['remember'];
        
        //验证用户是否存在
        $user = User_Service::getUserByAccount($account);
        if (empty($user)) {
            $this->outputJson(-2, '用户不存在');
        }
        //验证密码是否正确
        if (empty($user['t_password']) || $user['t_password'] != Helper_Lib::encodePass($pass)) {
            $this->outputJson(-3, '用户密码为空或者错误');
        }
        /*       
        $addr = User_Service::getIP($account);
        if(in_array($addr, User_Service::getIpList()) == 0 )
        {
            $this->outputJson(-3, '非法登录');
        }
		*/
        //记cookie，session
        
        $_SESSION['account'] = $account;
        if ($remember) {
            setcookie("accountCookie", $account);
        }
        
        
        $aRoleIds = !empty($user['t_roleid'])?explode(',', $user['t_roleid']):array();
        //判断是否是管理员
        if(in_array(1, $aRoleIds) || $account == 'admin'){
            $_SESSION['isAdmin'] = true;
        }else{
            $_SESSION['isAdmin'] = false;
        }
        //获取用户权限
        $aPermission = Role_Service::getPermission($aRoleIds);
        //存储权限
        $_SESSION['udata']['permission'] = $aPermission['permission'];
        $_SESSION['udata']['navbar_permission'] = $aPermission['navbar_permission'];
        
        $this->outputJson(0, '登录成功');
    }

    /*
     * 注册
     */
    public function register() {
        $this->load_view('reg');
    }

    /**
     * 注册
     */
    public function userRegister() {
        if (empty($_POST['account'])) {
            $this->outputJson(-1, '注册帐号不能为空');
        }
        if (empty($_POST['pass'])) {
            $this->outputJson(-1, '注册密码不能为空');
        }

        $account = $_POST['account'];
        $pass = $_POST['pass'];

        $user = User_Service::getUserByAccount($account);
        if (!empty($user)) {
            $this->outputJson(-2, "用户{$account}已存在！");
        }
	
        $ret = User_Service::register($account, $pass);
        if (!$ret) {
            $this->outputJson(-3, '注册失败！网络原因，请稍后重试！');
        }
        $this->outputJson(0, '注册成功！');
    }

    public function loginout() {

        session_destroy();
        setcookie('search','',time()-1,'/');
        setcookie('zoneid','',time()-1,'/');
        setcookie('accountCookie','',time()-1,'/');
        setcookie('filepath','',  time()-1 ,'/');
        Header("location:/user/login");
    }
    
    /**
     * 用户列表
     */
    public function lists(){
        $data = array();
        $users = User_Service::getUsers(1,100);
        $roles = Role_Service::getAllRoles();
        $data['roles'] = $roles;
        $data['users'] = $users;
        $data['addUser'] = $this->checkPermission('user/addUser');
        $data['editUser'] = $this->checkPermission('user/editUser');
        $data['delUser'] = $this->checkPermission('user/delUser');
        $this->load_view('user',$data);
    }
    
    public function addUser() {
        if (empty($_POST['account'])) {
            $this->outputJson(-1, '帐号不能为空');
        }
        if (empty($_POST['roleid'])) {
            $this->outputJson(-1, '所属组不能为空');
        }

        $account = $_POST['account'];
        $roleid = $_POST['roleid'];

        $user = User_Service::getUserByAccount($account);
        if (!empty($user)) {
            $this->outputJson(-2, "用户{$account}已存在！");
        }
        $data = array('t_account'=>$account,'t_roleid'=>$roleid);
        $ret = User_Service::addUser($data);
        if (!$ret) {
            $this->outputJson(-3, '添加用户失败！网络原因，请稍后重试！');
        }
        $this->outputJson(0, '添加用户成功！');
    }
    
    public function editUser() {
        if (empty($_POST['account'])) {
            $this->outputJson(-1, '帐号不能为空');
        }
        if (empty($_POST['roleid'])) {
            $this->outputJson(-1, '所属组不能为空');
        }

        $account = $_POST['account'];
        $roleid = $_POST['roleid'];

        $user = User_Service::getUserByAccount($account);
        if (empty($user)) {
            $this->outputJson(-2, "用户{$account}不存在！");
        }
        $data = array('t_roleid'=>$roleid);
        $ret = User_Service::updateUser($account,$data);
        if (!$ret) {
            $this->outputJson(-3, '编辑用户失败！网络原因，请稍后重试！');
        }
        $this->outputJson(0, '编辑用户成功！');
    }
    
    public function delUser() {
        try{
            $uid = Helper_Lib::getPost('uid', 'string', '', false);
            $user = User_Service::getUserByUid($uid);
            if (empty($user)) {
                $this->outputJson(-2, "用户不存在！");
            }
            $ret = User_Service::delUser($uid);
            if (!$ret) {
                $this->outputJson(-3, '删除用户失败！网络原因，请稍后重试！');
            }
            $this->outputJson(0, '删除用户成功！');
        } catch (Exception_Lib $e) {
            $this->outputJson($e->getCode(),$e->getMessage());
        }
       
    }
}
