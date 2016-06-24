<?php
class FetchPlatform_Model extends Model {
 private $table = 'listplatform';
 private $db = null;
 public function __construct() {
        parent::__construct();
        $this->db = Mysql::load($this->table);
    }
    
   public function getServer($platform){   
        if($platform==0)
        {
            return false;
        }
        $sql = 'SELECT * FROM  '.$this->table.' where platform = '.$platform ;       
        if($this->db->query($sql) && $this->db->rowcount() > 0){
            $rows =$this->db->fetch_all();           
            return $rows;
        }
        return false;
    }
}