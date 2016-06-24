<?php

/* 
 * 数据统计
 */
class RegRate_Model extends Model{
    private $table_alise = 'tb_resulttable';
    private $db = null;
     public function __construct($host,$user, $pass,$database) {
        parent::__construct();
		$this->db = Mysql::loadMysql($host,$user, $pass,$database);
    }
    
    public function getDataByTime($begTime,$endTime){
        if(empty($begTime) || empty($endTime))
        {
            $Year = date("Y");
            $Month = date("m");
            $day = date("d");
            $begTime = date("Y-m-d H:i:s",mktime(0,0,0,$Month,$day-7,$Year));
            $endTime = date("Y-m-d H:i:s",mktime(23,59,59,$Month,$day,$Year));
        }
        $where = ' where tr_datetime >="'.$begTime.'"and tr_datetime <="'.$endTime.'"';
        
        $sql = 'SELECT * FROM '.$this->table_alise.$where;
        if($this->db->query($sql) && $this->db->rowcount()>0){
            $rows = $this->db->fetch_all();
            return $rows;
        }
        return false;
    }

    
    public function getData(){
        
        $Year = date("Y");
	$Month = date("m");
	$day = date("d");
	$begTime = date("Y-m-d H:i:s",mktime(0,0,0,$Month,$day-7,$Year));
	$endTime = date("Y-m-d H:i:s",mktime(23,59,59,$Month,$day,$Year));

        $where = 'where tr_datetime >="'.$begTime.'"and tr_datetime <="'.$endTime.'"';
        
        $sql = 'SELECT * FROM '.$this->table_alise.$where;
        if($this->db->query($sql) && $this->db->rowcount()>0){
            $rows = $this->db->fetch_all();
            return $rows;
        }
        return false;
    }
    
    
}

