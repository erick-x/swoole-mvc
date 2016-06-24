<?php

/* 
 * 数据库加载宝箱配置
 */
class LoadServer_Model extends Model{
    
    private $table = 'showip';
    private $db = null;
    
    public function __construct() {
        parent::__construct();
        $this->db = Mysql::load($this->table);
    }
    public function loadServer(){
        
        $sql = 'SELECT * FROM '.$this->table ;
        
        if($this->db->query($sql) && $this->db->rowcount() > 0){
            $rows =$this->db->fetch_all();           
            return $rows;
        }
        return false;
    }   
}
