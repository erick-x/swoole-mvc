<?php
class Loadonline_Model extends Model{
    private $db = null;
    
    public function __construct($host,$user, $pass,$database) {
        parent::__construct();
        $this->db = Mysql::loadMysql($host,$user,$pass,$database);
    }
 
    public function getRole( ){

        $sql = 'select * from (select RecordTime,WorldID,OnlineRoleNum from t_qmonster_worldonline order by RecordTime desc ) as tmp group by WorldID  order by WorldID ' ;
        if($this->db->query($sql) && $this->db->rowcount() > 0){
            $rows =$this->db->fetch_all();           
            return $rows;
        }
        return false;
    }

}