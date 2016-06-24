<?php
class LookData_Model extends Model{
 private $table = 't_qmonster_accountdata';
    private $db = null;
    
     public function __construct($host,$user, $pass,$database) { 
        parent::__construct(); 
	$this->db = Mysql::loadMysql($host,$user,trim($pass),$database);
    }
    
    public function getAccount($uin){         
        $sql = 'SELECT * FROM  '.$this->table. ' where uin = '.$uin;
        if($this->db->query($sql) && $this->db->rowcount() > 0){
            $rows =$this->db->fetch_row();           
            return $rows;
        }
        return false;
    }
    
    public function getUin($accountid,$accounttype)
    {
       $sql = 'SELECT *  FROM  '.$this->table. ' where accountid = "'.$accountid.'" and accounttype = ' .$accounttype;
        if($this->db->query($sql) && $this->db->rowcount() > 0){
            $rows =$this->db->fetch_row();           
            return $rows;
        }
        return false; 
    }
}