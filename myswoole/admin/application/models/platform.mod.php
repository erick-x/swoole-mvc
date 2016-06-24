<?php

/* 
 * 管理菜单
 */
class Platform_Model extends Model{
    
    private $table = 'platform';
    private $db = null;
    
    public function __construct() {
        parent::__construct();
        $this->db = Mysql::load($this->table);
    }
    
    /**
     * 获取平台列表
     * @return boolean or array 返回平台列表
     */
    public function getAllPlatform($page = 1, $pagesize = 10){
        
        $limit = '';
        if(!empty($page) && !empty($pagesize)){
            $offset = ($page-1) * $pagesize;
            $limit  = ' LIMIT '.$offset.','.$pagesize;
        }
        $sql = 'SELECT * FROM '.$this->table;
        
        $sql .= ' order by platform_id asc '.$limit;
        if($this->db->query($sql) && $this->db->rowcount() > 0){
            $rows = $this->db->fetch_all();
            return $rows;
        }
        return false;
    }
 
    public function getPlatforms(){
        
        $sql = 'SELECT * FROM '.$this->table;
        
        $sql .= ' order by platform_id asc ';
        if($this->db->query($sql) && $this->db->rowcount() > 0){
            $rows = $this->db->fetch_all();
            return $rows;
        }
        return false;
    }
    
    public function getPlatformTotal(){
        $sql = 'SELECT count(*) as total FROM '.$this->table;
        if($this->db->query($sql) && $this->db->rowcount() > 0){
            $rows = $this->db->fetch_row();
            return $rows['total'];
        }
        return false;
    }
   
    
 //获取平台IP
 public static function getPlatformByID($platform){
        $obj = new Platform_Model();
        $sql = 'SELECT * FROM '.$obj->table;
        $sql .= 'where platform_id=:platform order by platform_id asc ';
        if($obj->db->query($sql,array('platform'=>$platform)) && $obj->db->rowcount() > 0){
            $row = $obj->db->fetch_row();
            return $row;
        }
        return false;
    }
	
    public function insert($data){
        return $this->db->insert($this->table,$data);
    }
    
    public function update($PlatformId,$data){
        return $this->db->update2($this->table,  $data,'platform_id=:PlatformId',array('PlatformId'=>$PlatformId));
    }
}

