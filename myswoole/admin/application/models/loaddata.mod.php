<?php
class LoadData_Model extends Model{
    private $table = 't_qmonster_userdata';
    private $db = null;
    
    public function __construct($host,$user, $pass,$database) {       
        parent::__construct();
        $this->db = Mysql::loadMysql($host,$user,$pass,$database);
    }
 
    public function getRole( ){

        $sql = 'SELECT count(1)as total FROM '.$this->table ;
        if($this->db->query($sql) && $this->db->rowcount() > 0){
            $rows =$this->db->fetch_row();           
            return $rows;
        }
        return false;
    }

    public function getUin($strname) {
        $sql = 'SELECT uin,roleid,strname,level FROM  '.$this->table. ' where strname = "'.$strname.'"';
        if($this->db->query($sql) && $this->db->rowcount() > 0){
            $rows =$this->db->fetch_row();           
            return $rows;
        }
        return false;
    }
    
     public function getRolebyID($roleid,$sid) {
        $sql = 'SELECT uin,roleid,strname,level FROM  '.$this->table. ' where roleid = '.$roleid .' and worldid = '. $sid;
        if($this->db->query($sql) && $this->db->rowcount() > 0){
            $rows =$this->db->fetch_row();           
            return $rows;
        }
        return false;
    }
    
    public function getName($uin,$sid) {
        $sql = 'SELECT uin,roleid,strname,level FROM  '.$this->table. ' where uin = '.$uin . ' and worldid = ' .$sid;
        if($this->db->query($sql) && $this->db->rowcount() > 0){
            $rows =$this->db->fetch_row();           
            return $rows;
        }
        return false;
    }
}