<?php

/*
 * 菜单管理
 */

class Menu_Service {

    /**
     * 
     * @param type $pid 父级菜单ID
     * @return type 返回子菜单列表
     */
    public static function getMenusByPid($pid = 0) {
        $db = new Menu_Model();
        $menulists = $db->getMenusByPid($pid);
        return Helper_Lib::formatData($menulists, 't_menuId');
    }

    /**
     * 获得所有的父级菜单
     * @return type
     */
    public static function getAllPMenus() {
        $db = new Menu_Model();
        return $db->getAllPMenus();
    }

    /**
     * 通过controller和action获得菜单信息
     * @param type $controller 
     * @param type $method
     * @return type
     */
    public static function getMenusByCA($controller, $method, $argv) {
        $db = new Menu_Model();
        $rows = $db->getMenusByCA($controller, $method, $argv);
        if (empty($rows)) {
            $rows = $db->getMenusByCA($controller, $method);
        }
        return $rows;
    }

    /**
     * 返回所有位置相同的非父节点菜单
     * @param type $postion
     * @return type
     */
    public static function getMenusByPostion($postion) {
        $db = new Menu_Model();
        return $db->getMenusByPostion($postion);
    }

    /**
     * 添加一个菜单
     * @param type $data
     * @return type
     */
    public static function insert($data) {
        $db = new Menu_Model();
        return $db->insert($data);
    }

    /**
     * 更新一个菜单
     * @param type $id
     * @param type $data
     * @return type
     */
    public static function update($id, $data) {
        $db = new Menu_Model();
        return $db->update($id, $data);
    }

    /**
     * 
     * @return type 返回所有的菜单，key为菜单id
     */
    public static function getMenuLists($menuIds = array()) {
        $db = new Menu_Model();
        $menulists = $db->getAllMenus($menuIds);
        $menus = Helper_Lib::formatData($menulists, 't_menuId');
        return $menus;
    }

    /**
     * 获得所有的菜单树
     */
    public static function menus() {
        $db = new Menu_Model();
        $menus = $db->getAllMenus();
        return self::createNavbar($menus);
    }

    /**
     * 创建一个菜单的导航条html
     * @param type $menulists 菜单列表
     * @return type
     */
    public static function createNavbar($menulists) {
        $tree = self::getTree($menulists);
        return self::generateNavStructure($tree);
    }

    /**
     * 生成首页栅格导航html
     * @param type $menutree
     * @return string
     */
    public static function generateNavStructure($menutree) {
        if (!is_array($menutree) || empty($menutree)) {
            return '';
        }
        $sturcture = '';
        $postion = intval(Helper_Lib::getCookie('postion'));
        foreach ($menutree as $obj) {
            if ($obj->root['t_pid'] == 0) {
                $url = ($obj->root['t_controller'] == '#' || $obj->root['t_method'] == '#') ? '#' : $obj->root['t_controller'] . '/' . $obj->root['t_method'] .($obj->root['t_argv']?'?'.$obj->root['t_argv']:'');
                $sturcture.='
                <li>
                        <a href="/' . $url . '" >
                                <i class="icon-piechart"></i>
                                ' . $obj->root['t_mname'] . '
                        </a>
                </li>';
            } else {
                /* if (empty($obj->children)) {
                  $url = ($obj->root['t_controller'] == '#' || $obj->root['t_method'] == '#') ? '' : $obj->root['t_controller'] . '/' . $obj->root['t_method'];
                  $sturcture.='<li tabindex="-1"><a href="/' . $url . '">' . $obj->root['t_mname'] . '</a></li>';
                  } else {
                  $sturcture .= '<li class="dropdown-submenu">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">' . $obj->root['t_mname'] . '<b class="caret"></b></a>
                  <ul class="dropdown-menu">';
                  $sturcture .= self::generateNavStructure($obj->children);
                  $sturcture .= '</ul></li>';
                  }
                 * 
                 */
            }
        }
        return $sturcture;
    }

    /**
     * 左侧菜单列表html
     * @param type $menutree
     * @param type $menuIds
     * @return string
     */
    public static function generateLeftMenuStructure($menutree, $postion, $menuId = 0) {
        if (empty($menutree))
            return '';
        $structure = '';
        $i = 0;
        foreach ($menutree as $obj) {
            if ($obj->root['t_pid'] == 0) {
                //父节点
                if ($obj->root['t_postion'] == $postion) {
                    if (empty($obj->children)) {
                        break;
                    } else {
                        foreach ($obj->children as $child) {
                            if (empty($child->children)) {
                                $structure .= '<li>';
                                $structure .= '<a href="/' . $child->root['t_controller'] . '/' . $child->root['t_method']  .($child->root['t_argv']?'?'.$child->root['t_argv']:''). '"><i class="icon icon-th-list"></i><span>' . $child->root['t_mname'] . ' </span></a>';
                                $structure . '</li>';
                            } else {
//                                if($child->root['t_mname'] == "玩家信息管理目录" || $child->root['t_mname'] == "平台管理目录")
//                                {
//                                   $structure .= '<li class="submenu open">'; 
//                                }else{
//                                    $structure .= '<li class="submenu ">';
//                                }
//                              

                                $structure .= '<li class="submenu">';

                               
                                
                                $structure .= '<a href="#' . $child->root['t_controller'] . '-' . $child->root['t_method']  .($child->root['t_argv']?'?'.$child->root['t_argv']:''). '" ><i class="icon icon-th-list"></i><span>' . $child->root['t_mname'] . '</span></a>';
                                $structure .='<ul id="' . $child->root['t_controller'] . '-' . $child->root['t_method']  .($child->root['t_argv']?'?'.$child->root['t_argv']:''). '">';
                                $structure .= self::generateLeftMenuStructure($child->children, $postion, $menuId);
                                $structure .='</ul></li>';
                            }
                        }
                    }
                } else {
                    continue;
                }
            } else {
                $class = '';
                // var_dump($menuId,intval($obj->root['t_menuId']),($menuId == intval($obj->root['t_menuId'])));
                if ($menuId == intval($obj->root['t_menuId']) || ($menuId == 0 && $i == 0)) {
                    $class = ' class="active"';
                }
                $structure .= '<li' . $class . '><a href="/' . $obj->root['t_controller'] . '/' . $obj->root['t_method']  .($obj->root['t_argv']?'?'.$obj->root['t_argv']:''). '">' . $obj->root['t_mname'] . '</a></li>';
                $i++;
            }
        }
        return $structure;
    }

    /**
     * 权限管理中生成菜单列表html
     * @param type $menutree
     * @param type $menuIds
     * @return string
     */
    public static function generateMenuStructure($menutree, $menuIds = array()) {
        if (empty($menutree))
            return '';
        foreach ($menutree as $obj) {
            $check = '';
            if (in_array($obj->root['t_menuId'], $menuIds)) {
                $check = ' checked';
            }
            if ($obj->root['t_pid'] == 0) {
                $structure .= '<tr><td><div class="checkbox"><label class="checkbox-inline"><input name="permissions" type="checkbox"' . $check . ' value="' . $obj->root['t_menuId'] . '"> ' . $obj->root['t_mname'] . '</label></div></td><td>';
                if (!empty($obj->children)) {
                    $structure .= self::generateMenuStructure($obj->children, $menuIds);
                }
                $structure .='</td></tr>';
            } else {
                $structure .= '<div class="checkbox"><label class="checkbox-inline"><input name="permissions" type="checkbox"' . $check . ' value="' . $obj->root['t_menuId'] . '"> ' . $obj->root['t_mname'] . '</div></label>';
                if (!empty($obj->children)) {
                    $structure .= self::generateMenuStructure($obj->children, $menuIds);
                }
            }
        }
        return $structure;
    }

    /**
     * 对菜单进行排序
     * @param type $menutree
     * @param type $menuIds
     * @return string
     */
    public static function sortMenu($menutree) {
        $menulists = array();
        if (empty($menutree))
            return array();
        foreach ($menutree as $obj) {
            $menulists[$obj->root['t_menuId']] = $obj;
            if (!empty($obj->children)) {
                $tmp = self::sortMenu($obj->children);
                $menulists = $menulists + $tmp;
            }
        }
        return $menulists;
    }

    /**
     * 
     * @param type $categorys 菜单列表
     * @param type $id
     * @param type $parent_id
     * @return \stdClass
     */
    public static function getTree($categorys, $id = 't_menuId', $parent_id = 't_pid') {
        $num = 0;
        $level = 0;
        $categoryObjs = array();
        $tree = array();
        $childrenNodes = array();
        if (is_array($categorys) && !empty($categorys)) {
            foreach ($categorys as $cate) {
                $obj = new stdClass();
                $obj->root = $cate;
                $num = $cate[$id];
                $level = $cate[$parent_id];
                $obj->children = array();
                $categoryObjs[$num] = $obj;
                if ($level) {
                    $childrenNodes[] = $obj;
                } else {
                    $tree[] = $obj;
                }
            }
            foreach ($childrenNodes as $node) {
                $cate = $node->root;
                $num = $cate[$id];
                $level = $cate[$parent_id];
                if (isset($categoryObjs[$level])) {
                    $categoryObjs[$level]->children[] = $node;
                } else {
                    $tree[] = $node;
                }
            }
        }

        return $tree;
    }

}
