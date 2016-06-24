<?php

/* 
 * Role_Model
 */

class Role_Model extends Model{
    
    private $table = 'role';
    private $db = null;
    public function __construct() {
        parent::__construct();
        $this->db = Mysql::load($this->table);
    }
    
    /*
     * 或者某个角色的权限
     */
    public function getPermission($aRoles = array()){
        if(!is_array($aRoles) && empty($aRoles)){
            return false;
        }
        
        $sql = 'SELECT * FROM '.$this->table.' WHERE `t_roleid` in('.  implode(',', $aRoles).')';
        
        if($this->db->query($sql) && $this->db->rowcount() > 0){
            $rows = $this->db->fetch_all();
            return $rows;
        }
        return false;
    }
    
    /*
     * 获得所有的分组信息
     */
    public function getAllRoles(){
        $sql = 'SELECT * FROM '.$this->table;
        
        if($this->db->query($sql) && $this->db->rowcount() > 0){
            $rows = $this->db->fetch_all();
            return $rows;
        }
        return false;
    }
    
    /**
     * 通过组ID查询组信息
     * @param type $id 组ID
     * @return boolean
     */
    public function getRoleById($id){
        $sql = 'SELECT * FROM '.$this->table.' WHERE t_roleid=:roleid';
        
        if($this->db->query($sql,array('roleid'=>$id)) && $this->db->rowcount() > 0){
            $row = $this->db->fetch_row();
            return $row;
        }
        return false;
    }
   
    /**
     * 通过组名称获得组信息
     * @param type $rname 组名
     * @return boolean
     */
    public function getRoleByName($rname){
        $sql = 'SELECT * FROM '.$this->table.' WHERE t_rname=:rname limit 1';
        
        if($this->db->query($sql,array('rname'=>$rname)) && $this->db->rowcount() > 0){
            $row = $this->db->fetch_row();
            return $row;
        }
        return false;
    }
    /**
     * 修改某个组的信息
     * @param type $roleId 组ID
     * @param type $data   需要修改的数据
     */
    public function update($roleId,$data){
        $where = 't_roleid=:roleid';
        $prepare_array = array('roleid'=>$roleId);
        return $this->db->update2($this->table,$data,$where,$prepare_array);
    }
    
    /**
     * 插入组
     * @param type $data 插入的数据
     * @return boolean
     */
    public function insert($data){
        if(empty($data['t_rname'])){
            return false;
        }
        
        return $this->db->insert($this->table,$data);
    }
    
    public function delete($roleId){
        $where = 't_roleid=:roleid';
        $prepare_array = array("roleid"=>$roleId);
        return $this->db->delete($this->table,$where,$prepare_array);
    }
}

