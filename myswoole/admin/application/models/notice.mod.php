<?php

/* 
 * 走马灯
 */
class Notice_Model extends Model{
    private $table_alise = 'tb_notice';
    private $db = null;
    public function __construct($host,$user, $pass,$database) {
        parent::__construct();
		$this->db = Mysql::loadMysql($host,$user, $pass,$database);
    }
    
    /**
     * 添加走马灯
     * @param array $data 走马灯信息
     * @return boolean 是否添加成功
     */
    public function insert($data){
        
        return $this->db->insert($this->table_alise,$data);
    }
    public function getPageNotice($platform,$awhere,$page =1 ,$pagesize=10){
        $limit = '';
        if(!empty($page) && !empty($pagesize)){
            $offset = ($page-1) * $pagesize;
            $limit  = ' LIMIT '.$offset.','.$pagesize;
        }
        
        $where  = "";
        if(!empty($awhere['account']))
        {
            $where .= ' and tr_sender like"'. $awhere['account'].'%"';
            $sql = 'SELECT * FROM '.$this->table_alise.' where  tr_platform=:platform '.$where." order by tr_createtime desc" ;
        }
        if(!empty($awhere['createtime'])&&!empty($awhere['endtime']))
        {
            $where .= ' and tr_createtime >= '. $awhere['createtime'].' and tr_createtime <='.$awhere['endtime'];
            $sql = 'SELECT * FROM '.$this->table_alise.' where  tr_platform=:platform '.$where." order by tr_createtime desc" ;
        }
        if(empty($awhere['account'])&& empty($awhere['createtime'])&&empty($awhere['endtime']))
        {
            $sql = 'SELECT * FROM '.$this->table_alise.' where  tr_platform=:platform '.$where." order by tr_createtime desc" ;
        }
        if($this->db->query($sql,array('platform'=>$platform)) && $this->db->rowcount()>0){
            $rows = $this->db->fetch_all();
            return $rows;
        }
       
        return false;
    }
    
    
    public function getNotice($platform,$awhere,$page =1 ,$pagesize=10){
//        $limit = '';
//        if(!empty($page) && !empty($pagesize)){
//            $offset = ($page-1) * $pagesize;
//            $limit  = ' LIMIT '.$offset.','.$pagesize;
//        }
        
        $where  = "";
        if(!empty($awhere['account']))
        {
            $where .= ' and tr_sender like"'. $awhere['account'].'%"';
            $sql = 'SELECT * FROM '.$this->table_alise.' where  tr_platform=:platform '.$where." order by tr_createtime desc" ;
        }
        if(!empty($awhere['createtime'])&&!empty($awhere['endtime']))
        {
            $where .= ' and tr_createtime >= '. $awhere['createtime'].' and tr_createtime <='.$awhere['endtime'];
            $sql = 'SELECT * FROM '.$this->table_alise.' where  tr_platform=:platform '.$where." order by tr_createtime desc" ;
        }
        if(empty($awhere['account'])&& empty($awhere['createtime'])&&empty($awhere['endtime']))
        {
            $sql = 'SELECT * FROM '.$this->table_alise.' where  tr_platform=:platform '.$where." order by tr_createtime desc" ;
        }
        
        if($this->db->query($sql,array('platform'=>$platform)) && $this->db->rowcount()>0){
            $rows = $this->db->fetch_all();
            return $rows;
        }
       
        return false;
    }
    
     public function getNoticeTotal($platform){
        
        $sql = 'SELECT count(*)as total FROM '.$this->table_alise.' where tr_platform=:platform';
        if($this->db->query($sql,array('platform'=>$platform)) && $this->db->rowcount()>0){
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

