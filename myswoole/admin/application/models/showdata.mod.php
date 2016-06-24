<?php
class ShowData_Model extends Model {
 private $table = 'showdata';
 private $db = null;
 public function __construct() {
        parent::__construct();
        $this->db = Mysql::load($this->table);
    }
    
   public function getdata(){   
        $sql = 'SELECT * FROM  '.$this->table ;       
        if($this->db->query($sql) && $this->db->rowcount() > 0){
            $rows =$this->db->fetch_all();           
            return $rows;
        }
        return false;
    }
    
    public function insert($data){        
        return $this->db->insert($this->table,$data);
    }
    
    public function delete() {
        return $this->db->deleteAll($this->table);
    }
}