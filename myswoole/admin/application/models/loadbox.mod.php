<?php

/* 
 * 数据库加载宝箱配置
 */
class LoadBox_Model extends Model{
    
    private $table = 'box';
    private $db = null;
    
    public function __construct() {
        parent::__construct();
        $this->db = Mysql::load($this->table);
    }
    public function getBoxConfig($id){   
        if($id==0)
        {
            return false;
        }
        $sql = 'SELECT * FROM tb_box where boxid = '.$id;
        
        if($this->db->query($sql) && $this->db->rowcount() > 0){
            $rows =$this->db->fetch_row();           
            return $rows;
        }
        return false;
    }
    
    
}
