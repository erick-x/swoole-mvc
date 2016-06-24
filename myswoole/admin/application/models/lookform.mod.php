<?php
class LookForm_Model extends Model{
 private $table = 't_order_form_';
    private $db = null;
    
     public function __construct($host,$user, $pass,$database) {    
        parent::__construct(); 
	$this->db = Mysql::loadMysql($host,$user,$pass,$database);
    }
    
    public function getOrder($roleid,$sid){         
        $sql = 'SELECT * FROM  '.$this->table.$sid. ' where order_roleid = '.$roleid;
        if($this->db->query($sql) && $this->db->rowcount() > 0){
            $rows =$this->db->fetch_all();           
            return $rows;
        }
        return false;
    }
 
     public function update($data,$orderid,$sid){
        return $this->db->update2($this->table.$sid,$data,'order_id=:order_id ',array('order_id'=>$orderid));
    }
}