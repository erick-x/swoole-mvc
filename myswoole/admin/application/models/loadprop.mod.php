<?php

/* 
 * 数据库加载道具名称
 */
class LoadProp_Model extends Model{
    
    private $table = 'prop';
    private $db = null;
    
    public function __construct() {
        parent::__construct();
        $this->db = Mysql::load($this->table);
    }
    public function getPropConfig(){
        
        $sql = 'SELECT * FROM tb_prop';
        
        $sql .= ' order by prop_id asc ';
        if($this->db->query($sql) && $this->db->rowcount() > 0){
            $rows = $this->db->fetch_all();
            return $rows;
        }
        return false;
    }
 
}

