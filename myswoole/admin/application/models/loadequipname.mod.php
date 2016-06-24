<?php

/* 
 * 数据库加载道具名称
 */
class LoadEquipName_Model extends Model{
    
    private $table = 'equipname';
    private $db = null;
    
    public function __construct() {
        parent::__construct();
        $this->db = Mysql::load($this->table);
    }
    public function getEquipNameConfig(){
        
        $sql = 'SELECT * FROM tb_equipname';
        $sql .= ' order by text_id asc ';
        if($this->db->query($sql) && $this->db->rowcount() > 0){
            $rows = $this->db->fetch_all();
            return $rows;
        }
        return false;
    }
 
}

