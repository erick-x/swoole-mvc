<?php

/* 
 * 登录公告
 */
class LoginNotice_Model extends Model{
    private $table_alise = 'tb_loginnotice';
    private $db = null;
    public function __construct($host,$user, $pass,$database) {
        parent::__construct();
        $this->db = Mysql::loadMysql($host,$user, $pass,$database);
    }
    
    /**
     * 添加区服信息
     * @param array $data 区服信息
     * @return boolean 是否添加成功
     */
    public function insert($data){
        
        return $this->db->insert($this->table_alise,$data);
    }
    public function getPageNotice($awhere,$page =1 ,$pagesize=15){
        $limit = '';
        if(!empty($page) && !empty($pagesize)){
            $offset = ($page-1) * $pagesize;
            $limit  = ' LIMIT '.$offset.','.$pagesize;
        }
        
        $where  = " where  ";
        if(!empty($awhere['account']))
        {
            $where .= ' creator like "'. $awhere['account'].'%"';
        }
        if(!empty($awhere['createtime']) && !empty($awhere['account']))
        {
            $where .= ' and createtime >= '. $awhere['createtime'];
        }
        if(!empty($awhere['createtime']) && empty($awhere['account']))
        {
            $where .= ' createtime >= '. $awhere['createtime'];
        }
        if(empty($awhere['account']) && empty($awhere['createtime']))
        {
            $where = " ";
        }
        $sql = 'SELECT * FROM '.$this->table_alise.$where." order by createtime desc".$limit ;
        if($this->db->query($sql) && $this->db->rowcount()>0){
            $rows = $this->db->fetch_all();
            return $rows;
        }
       
        return false;
    }
    
    public function getNotice($awhere,$page =1 ,$pagesize=15){
//        $limit = '';
//        if(!empty($page) && !empty($pagesize)){
//            $offset = ($page-1) * $pagesize;
//            $limit  = ' LIMIT '.$offset.','.$pagesize;
//        }
        
        $where  = " where ";
        if(!empty($awhere['account']))
        {
            $where .= 'creator like "'. $awhere['account'].'%"';
            $sql = 'SELECT * FROM '.$this->table_alise.$where." order by createtime desc" ;
        }
        if(!empty($awhere['createtime']) && !empty($awhere['endtime']))
        {
            $where .= ' createtime >= '. $awhere['createtime'].' and createtime <='.$awhere['endtime'];
            $sql = 'SELECT * FROM '.$this->table_alise.$where." order by createtime desc" ;
        }
        if(empty($awhere['account']) && empty($awhere['createtime'])&& empty($awhere['endtime']))
        {
            $where = "";
            $sql = 'SELECT * FROM '.$this->table_alise.$where." order by createtime desc" ;
        }
        
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

