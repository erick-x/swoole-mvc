<?php

/* 
 * 数据库加载名词库
 */
class LoadName_Model extends Model{
    
    private $table = 'name';
    private $db = null;
    
    public function __construct() {
        parent::__construct();
        $this->db = Mysql::load($this->table);
    }
    public function getNameConfig(){
        
        $sql = 'SELECT * FROM tb_name';
        $sql .= ' order by text_id asc ';
        if($this->db->query($sql) && $this->db->rowcount() > 0){
            $rows = $this->db->fetch_all();
            return $rows;
        }
        return false;
    }
 
}

