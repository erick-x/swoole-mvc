<?php
class Chat_Model extends Model{
  private $table = 'chat_table';
  private $table_tx = 'chat_tx';
  private $table_appstore = 'chat_appstore';
    private $db = null;
    
    public function __construct($host,$user, $pass,$database) {
        parent::__construct();
        $this->db = Mysql::loadMysql($host,$user,$pass,$database);
    }
    
    public function getTotal($platform,$data){
       if($platform ==14||$platform ==13||$platform ==2 )
       {
            if(empty($data))
            {
                $sql = 'SELECT  count(*)as total  FROM  '.$this->table ;
            }  else {
                 $sql = 'SELECT  count(*)as total   FROM  '.$this->table . " where context  like '%".$data."%' " ;
            }
            
            if($this->db->query($sql) && $this->db->rowcount()>0){
                $rows = $this->db->fetch_row();
                return $rows['total'];
            }
        
       }
        
        if($platform ==15)
        {
            if(empty($data))
            {
                $sql = 'SELECT  count(*)as total  FROM  '.$this->table_tx ;
            }  else {
                 $sql = 'SELECT  count(*)as total   FROM  '.$this->table_tx . " where context  like '%".$data."%' " ;
            }
            
            if($this->db->query($sql) && $this->db->rowcount()>0){
                $rows = $this->db->fetch_row();
                return $rows['total'];
             }
        
       }
        if($platform ==17)
        {
            if(empty($data))
            {
                $sql = 'SELECT  count(*)as total  FROM  '.$this->table_appstore ;
            }  else {
                 $sql = 'SELECT  count(*)as total   FROM  '.$this->table_appstore . " where context  like '%".$data."%' " ;
            }
            
            if($this->db->query($sql) && $this->db->rowcount()>0){
                $rows = $this->db->fetch_row();
                return $rows['total'];
             }
        
       }
        return false;
    }
    
    public function getChat($platform,$data,$page =1 ,$pagesize=10){
       
        $limit = '';
        if(!empty($page) && !empty($pagesize)){
            $offset = ($page-1) * $pagesize;
            $limit  = ' LIMIT '.$offset.','.$pagesize;
        }
        if($platform == 14||$platform == 13||$platform == 2)
       {
            if(empty($data))
            {
                $sql = 'SELECT * FROM  '.$this->table  . " order by time desc " . $limit;
            }  else {
                 $sql = 'SELECT * FROM  '.$this->table . " where context  like '%".$data."%'  order by time desc " . $limit;
            }
            
            if($this->db->query($sql) && $this->db->rowcount() > 0){
                $rows =$this->db->fetch_all();           
                return $rows;
            }
        
       }
       if($platform ==15)
       {
           if(empty($data))
            {
                $sql = 'SELECT * FROM  '.$this->table_tx . " order by time desc " . $limit ;
            }  else {
                 $sql = 'SELECT * FROM  '.$this->table_tx . " where context  like '%".$data."%' order by time desc " . $limit ;
            }
            
            if($this->db->query($sql) && $this->db->rowcount() > 0){
            $rows =$this->db->fetch_all();           
            return $rows;
        }
       }  
        
       if($platform ==17)
       {
           if(empty($data))
            {
                $sql = 'SELECT * FROM  '.$this->table_appstore . " order by time desc " . $limit ;
            }  else {
                 $sql = 'SELECT * FROM  '.$this->table_appstore . " where context  like '%".$data."%' order by time desc " . $limit ;
            }
            
            if($this->db->query($sql) && $this->db->rowcount() > 0){
            $rows =$this->db->fetch_all();           
            return $rows;
        }
       } 
        return false;
    }
    
     public function insert($data){        
        return $this->db->insert($this->table,$data);
    }
}