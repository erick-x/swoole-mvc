<?php

/* 
 * 数据库加载宝箱配置
 */
class MutliAct_Model extends Model{
    
    private $table = 'activitymulti';
    private $db = null;
    
    public function __construct() {
        parent::__construct();
        $this->db = Mysql::load($this->table);
    }
    
    public function getAllList(){   
        $sql = 'SELECT * FROM tb_activitymulti order by id desc ';
        
        if($this->db->query($sql) && $this->db->rowcount() > 0){
            $rows =$this->db->fetch_all();           
            return $rows;
        }
        return false;
    }
    
    
    public function getActivityList($id){   
        if($id==0)
        {
            return false;
        }
        
        $sql = 'SELECT * FROM tb_activitymulti where id = '.$id ." order by id";        
        if($this->db->query($sql) && $this->db->rowcount() > 0){
            $rows =$this->db->fetch_all();           
            return $rows;
        }
        return false;
    }
    
    public function insert($data){        
        return $this->db->insert($this->table,$data);
    }
    
    public function update($data,$id) {
        return $this->db->update2($this->table,$data,'id=:id ',array('id'=>$id));
    }
    
    public function deldata($id) {      
        return $this->db->delete($this->table,'id=:id',  array('id'=>$id));
    }
}
