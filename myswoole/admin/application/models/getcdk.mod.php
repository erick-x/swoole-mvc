<?php
class GetCdk_Model extends Model {
 private $table_alise = 'cdk_table';
 private $db = null;
 public function __construct($host,$user, $pass,$database) {
        parent::__construct(); 
	$this->db = Mysql::loadMysql($host,$user,$pass,$database);
    }
    
    public function getCdk($cdk){
        $sql = 'SELECT starttime,endtime,keyword,keystat  FROM  '.$this->table_alise.' where keyword ="'.$cdk. '"';
        if($this->db->query($sql) && $this->db->rowcount()>0){
            $rows = $this->db->fetch_row();
            return $rows;
        }
        return false;
    }
}