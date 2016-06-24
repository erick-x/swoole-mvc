<?php
class PlatformNotice_Model extends Model{
 private $table_alise = 'tb_platformnotice';
    private $db = null;
    public function __construct($host,$user, $pass,$database) {
        parent::__construct();
		$this->db = Mysql::loadMysql($host,$user, $pass,$database);
    }
    
    public function insert($data){
        
        return $this->db->insert($this->table_alise,$data);
    }
    
    public function getNotice($page =1 ,$pagesize=10){
        $limit = '';
        if(!empty($page) && !empty($pagesize)){
            $offset = ($page-1) * $pagesize;
            $limit  = ' LIMIT '.$offset.','.$pagesize;
        }
        $sql = 'SELECT * FROM '.$this->table_alise.' order by createtime desc '.$limit ;       
        if($this->db->query($sql) && $this->db->rowcount()>0){
            $rows = $this->db->fetch_all();
            return $rows;
        }
       
        return false;
    }
    
     public function getNoticeTotal(){
        
        $sql = 'SELECT count(*)as total FROM '.$this->table_alise;
        if($this->db->query($sql) && $this->db->rowcount()>0){
            $rows = $this->db->fetch_row();
            return $rows['total'];
        }
        return false;
    }
    
    public function update($data,$id) {
        return $this->db->update2($this->table_alise,$data,'id=:id ',array('id'=>$id));
    }
    
    public function deldata($id) {      
        return $this->db->delete($this->table_alise,'id=:id',  array('id'=>$id));
    }
    
 }
