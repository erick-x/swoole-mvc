<?php
class Cdk_Model extends Model{
 private $table = 'cdk';
    private $db = null;
    
    public function __construct() {
        parent::__construct();
        $this->db = Mysql::load($this->table);
    }
    public function getServer($platform,$sid){   
        if($platform==0 || $sid == 0)
        {
            return false;
        }
        $sql = 'SELECT * FROM  '.$this->table.' where platformid = '.$platform .' and sid =  '.$sid ;
        
        if($this->db->query($sql) && $this->db->rowcount() > 0){
            $rows =$this->db->fetch_row();           
            return $rows;
        }
        return false;
    }
    
}