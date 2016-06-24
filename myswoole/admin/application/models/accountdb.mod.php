<?php
class AccountDB_Model extends Model {
 private $table = 'accountdb';
 private $db = null;
 public function __construct() {
        parent::__construct();
        $this->db = Mysql::load($this->table);
    }
    
   public function getServer($platform){   
        if( $platform == 0 )
        {
            return false;
        }
        $sql = 'SELECT  *  FROM  '.$this->table.' where platformid = '.$platform  ;       
        if($this->db->query($sql) && $this->db->rowcount() > 0){
            $rows =$this->db->fetch_all();           
            return $rows;
        }
        
        return false;
    }
    
    public function GetPlatform() {
        $sql = 'SELECT  platformid,platformname  FROM  '.$this->table.'  group by platformid ';       
        if($this->db->query($sql) && $this->db->rowcount() > 0){
            $rows =$this->db->fetch_All();           
            return $rows;
        }
    }
    public function getOneServer($platform,$sid)
    {
        
       $sql = 'SELECT  *  FROM  '.$this->table.' where sid = ' .$sid  .' and platformid ='.$platform;       
        if($this->db->query($sql) && $this->db->rowcount() > 0){
            $rows =$this->db->fetch_row();           
            return $rows;
        }
        
        return false; 
    }
}