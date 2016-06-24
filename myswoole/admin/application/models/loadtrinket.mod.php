<?php

/* 
 * 数据库加载饰品ID
 */
class LoadTrinket_Model extends Model{
    
    private $table = 'trinket';
    private $db = null;
    
    public function __construct() {
        parent::__construct();
        $this->db = Mysql::load($this->table);
    }
    public function getTrinketConfig(){
        
        $sql = 'SELECT * FROM tb_trinket';
        
        $sql .= ' order by trinket_id asc ';
        if($this->db->query($sql) && $this->db->rowcount() > 0){
            $rows = $this->db->fetch_all();
            return $rows;
        }
        return false;
    }
 
}

