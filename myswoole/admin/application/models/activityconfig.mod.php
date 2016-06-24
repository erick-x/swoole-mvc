<?php
//活动加载模块

class ActivityConfig_Model extends Model{
 private $table = 'tb_activityconfig';
 private $db = null;
 public function __construct($host,$user, $pass,$database) {
        parent::__construct(); 
	$this->db = Mysql::loadMysql($host,$user,$pass,$database);
    }
    
    public function getActivity($id){   
        $sql = 'SELECT * FROM  '.$this->table.' where  id =  '.$id ;
        
        if($this->db->query($sql) && $this->db->rowcount() > 0){
            $rows =$this->db->fetch_row();           
            return $rows;
        }
        return false;
    }
    
     public function LoadActivity(){   
        $sql = 'SELECT * FROM  '.$this->table ." order by id desc ";
        
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