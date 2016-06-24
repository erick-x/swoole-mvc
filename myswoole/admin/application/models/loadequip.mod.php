<?php

/* 
 * 数据库加载装备名称
 */
class LoadEquip_Model extends Model{
    
    private $table = 'equip';
    private $db = null;
    
    public function __construct() {
        parent::__construct();
        $this->db = Mysql::load($this->table);
    }

    public function getEquipConfig(){
        
        $sql = 'SELECT * FROM tb_equip';
        
        $sql .= ' order by equip_id asc ';
        if($this->db->query($sql) && $this->db->rowcount() > 0){
            $rows = $this->db->fetch_all();
            return $rows;
        }
        return false;
    }
 
}

