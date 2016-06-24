<?php

/*
 * 角色管理
 */

class Role_Service {

    /**
     * 返回用户所属组的菜单权限
     * @param type $aRoles 组ID
     * @return boolean
     */
    public static function getPermission($aRoles = array()) {
        if (!is_array($aRoles) || empty($aRoles)) {
            return false;
        }

        $db = new Role_Model();
        $roles = $db->getPermission($aRoles);

        $aPermission = array();
        $navbar_permission = array();
        if (is_array($roles) && !empty($roles)) {
            foreach ($roles as $role) {
                $tmp = empty($role['t_permission']) ? array() : explode(",", $role['t_permission']);
                $aPermission = array_merge($aPermission, $tmp);
            }
        }
        //管理员 拥有所有权限
        if (!empty($_SESSION['isAdmin'])) {
            $menus = Menu_Service::getMenuLists();
        } else if (!empty($aPermission)) {
            $menus = Menu_Service::getMenuLists($aPermission);
        } else {
            $menus = Menu_Service::getMenuLists(array(1)); //获得首页的菜单信息
        }
        if (is_array($menus) && !empty($menus)) {
            foreach ($menus as $menu) {
                if (intval($menu['t_status']) != 1) {
                    $navbar_permission[] = $menu;
                }
            }
        }
        return array('permission' => $menus, 'navbar_permission' => $navbar_permission);
    }

    /**
     * 获得所有的组信息
     * @param type $need_permission 是否需要获取组权限信息
     * @return boolean
     */
    public static function getAllRoles($need_permission = false) {
        $roleModel = new Role_Model();
        $roles = $roleModel->getAllRoles();
        if (!is_array($roles) || empty($roles)) {
            return false;
        }
        $aRoles = array();
        foreach ($roles as $k => $role) {
            if($need_permission){
                $permission = !empty($role['t_permission']) ? explode(",", $role['t_permission']) : array();
                $role['permission'] = Menu_Service::getMenuLists($permission);
            }
            $aRoles[$role['t_roleid']] = $role;
        }

        return $aRoles;
    }

    /**
     * 通过组ID获得组信息以及组权限
     * @param type $id 组ID
     * @param type $need_permission 是否需要获取组权限信息
     * @return type
     */
    public static function getRoleById($id, $need_permission = TRUE) {
        $db = new Role_Model();
        $role = $db->getRoleById($id);
        if ($need_permission && !empty($role['t_permission'])) {
            $aPermission = explode(',', $role['t_permission']);
            $role['permission'] = Menu_Service::getMenuLists($aPermission);
        }
        return $role;
    }

    /**
     * 通过组名称获得组信息以及组权限
     * @param type $id 组ID
     * @param type $need_permission 是否需要获取组权限信息
     * @return type
     */
    public static function getRoleByName($rname, $need_permission = false) {
        $db = new Role_Model();
        $role = $db->getRoleByName($rname);
        if ($need_permission && !empty($roles['t_permission'])) {
            $aPermission = explode(',', $role['t_permission']);
            $role['permission'] = Menu_Service::getMenuLists($aPermission);
        }
        return $role;
    }

    /**
     * 插入组
     * @param type $data 
     * @return type
     */
    public static function insert($data) {
        $db = new Role_Model();
        return $db->insert($data);
    }

    /**
     * 更新某个组的信息
     * @param type $roleId 组ID
     * @param type $data    更新的数据
     * @return type
     */
    public static function update($roleId, $data) {
        $db = new Role_Model();
        return $db->update($roleId, $data);
    }

    /**
     * 插入组
     * @param type $data 
     * @return type
     */
    public static function delete($roleId) {
        $db = new Role_Model();
        return $db->delete($roleId);
    }

}
