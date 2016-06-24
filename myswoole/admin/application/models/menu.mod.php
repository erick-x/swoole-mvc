<?php

/* 
 * 管理菜单
 */
class Menu_Model extends Model{
    
    private $table = 'menu';
    private $db = null;
    
    public function __construct() {
        parent::__construct();
        $this->db = Mysql::load($this->table);
    }
    
    /**
     * 获取菜单列表
     * @param type $menuIds 菜单id列表，不传就表示获取所有
     * @return boolean or array 返回菜单列表
     */
    public function getAllMenus($menuIds = array()){
        $sql = 'SELECT * FROM '.$this->table;
        if(is_array($menuIds) && !empty($menuIds)){
            $sql .=' WHERE `t_menuid` in('.implode(',',$menuIds).')';
        }
        
        $sql .= ' order by t_menuid asc ';
        if($this->db->query($sql) && $this->db->rowcount() > 0){
            $rows = $this->db->fetch_all();
            return $rows;
        }
        return false;
    }
    
    /**
     * 获得某菜单的所有子菜单
     * @param type $pid 父节点
     * @return boolean or array 返回菜单列表
     */
    public function getMenusByPid($pid = 0){
        $sql = 'SELECT * FROM '.$this->table.' WHERE t_pid=:pid order by t_postion asc';
        
        if($this->db->query($sql,array('pid'=>$pid)) && $this->db->rowcount() > 0){
            $rows = $this->db->fetch_all();
            return $rows;
        }
        return false;
    }
    
    /**
     * 获得所有有子菜单的菜单列表 status 0==无子菜单 , 1== 不显示, 2 == 有子菜单
     * @return boolean
     */
    public function getAllPMenus(){
        $sql = 'SELECT * FROM '.$this->table.' WHERE t_status = 2';
        
        if($this->db->query($sql) && $this->db->rowcount() > 0){
            $rows = $this->db->fetch_all();
            return $rows;
        }
        return false;
    }
    
    /**
     * 通过control和model获得此菜单信息
     * @param type $controller  
     * @param type $method
     * @return boolean 
     */
    public function getMenusByCA($controller,$method,$argv=''){
        $sql = 'SELECT * FROM '.$this->table.' WHERE t_controller=:controller and t_method=:method and t_pid>0';
        $prepare_arr = array('controller'=>$controller,'method'=>$method);
        if($argv){
            $sql .= ' and t_argv=:argv';
            $prepare_arr['argv'] = $argv;
        }
        $sql .= ' limit 1';
        if($this->db->query($sql,$prepare_arr) && $this->db->rowcount() > 0){
            $row = $this->db->fetch_row();
            return $row;
        }
        return false;
    }
    /**
     * 返回所有位置相同的非父节点菜单
     * @param type $postion
     * @return boolean
     */
     public function getMenusByPostion($postion){
        $sql = 'SELECT * FROM '.$this->table.' WHERE t_postion=:postion and t_pid>0';
        
        if($this->db->query($sql,array('postion'=>$postion)) && $this->db->rowcount() > 0){
            $rows = $this->db->fetch_all();
            return $rows;
        }
        return false;
    }
    
    
    public function insert($data){
        return $this->db->insert($this->table,$data);
    }
    
    public function update($menuId,$data){
        return $this->db->update2($this->table,  $data,'t_menuId=:menuId',array('menuId'=>$menuId));
    }
}

