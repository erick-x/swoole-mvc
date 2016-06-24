<?php

/* 
 * 数据库加载英雄名称
 */
class LoadHero_Model extends Model{
    
    private $table = 'hero';
    private $db = null;
    
    public function __construct() {
        parent::__construct();
        $this->db = Mysql::load($this->table);
    }

    public function getHeroConfig(){
        
        $sql = 'SELECT * FROM tb_hero';
        
        $sql .= ' order by hero_id asc ';
        if($this->db->query($sql) && $this->db->rowcount() > 0){
            $rows = $this->db->fetch_all();
            return $rows;
        }
        return false;
    }
 
}

