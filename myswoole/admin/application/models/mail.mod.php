<?php

/*
 * 邮件管理 Mail_Model
 */

class Mail_Model extends Model {
    private $table_alise = 'tb_mail';
    private $db;
    public function __construct($host,$user, $pass,$database) {
        parent::__construct();
		$this->db = Mysql::loadMysql($host,$user, $pass,$database);
    }
   
    public function getNoPassMail($awhere = '',$page =1 ,$pagesize=10){

        $where = ' where ( statu = "未通过" or statu = "未审核" ) and sendtime >='.$awhere['createtime']." and sendtime <=".$awhere['endtime'];

        $sql = 'SELECT * FROM '.$this->table_alise.$where ." order by id desc" ;
        if($this->db->query($sql) && $this->db->rowcount()>0){
            $rows = $this->db->fetch_all();
            return $rows;
        }   
        return false;
    }
    
    public function getTotalMail(){
        
        $sql = 'SELECT count(*)as total FROM '.$this->table_alise.' where statu <> "已撤回"  ';
        if($this->db->query($sql) && $this->db->rowcount()>0){
            $rows = $this->db->fetch_row();
            return $rows['total'];
        }
        return false;
    }
    
     public function getLookMail($awhere = '',$page =1 ,$pagesize=10){

        $limit = '';
        if(!empty($page) && !empty($pagesize)){
            $offset = ($page-1) * $pagesize;
            $limit  = ' LIMIT '.$offset.','.$pagesize;
        }
        
        $where = ' where ( statu = "审核中" or statu = "已审核" ) and sendtime >='.$awhere['createtime']." and sendtime <=".$awhere['endtime'];

        $sql = 'SELECT  *  FROM  '.$this->table_alise.$where ." order by id desc " ;
        if($this->db->query($sql) && $this->db->rowcount()>0){
            $rows = $this->db->fetch_all();
            return $rows;
        }   
        return false;
    }
     public function getAlreadySendMail($awhere = '',$page =1 ,$pagesize=10){

        $limit = '';
        if(!empty($page) && !empty($pagesize)){
            $offset = ($page-1) * $pagesize;
            $limit  = ' LIMIT '.$offset.','.$pagesize;
        }
        
        $where = ' where statu = "已发送" and  sendtime >='.$awhere['createtime']." and sendtime <=".$awhere['endtime'];

        $sql = 'SELECT  *  FROM  '.$this->table_alise.$where ." order by id desc " ;
        if($this->db->query($sql) && $this->db->rowcount()>0){
            $rows = $this->db->fetch_all();
            return $rows;
        }   
        return false;
    }
     public function getRevokePassMail($awhere = '',$page =1 ,$pagesize=10){

        $limit = '';
        if(!empty($page) && !empty($pagesize)){
            $offset = ($page-1) * $pagesize;
            $limit  = ' LIMIT '.$offset.','.$pagesize;
        }
        
        $where = ' where statu = "已撤回" and  sendtime >='.$awhere['createtime']." and sendtime <=".$awhere['endtime'];

        $sql = 'SELECT  *  FROM  '.$this->table_alise.$where ." order by id desc " ;
        if($this->db->query($sql) && $this->db->rowcount()>0){
            $rows = $this->db->fetch_all();
            return $rows;
        }   
        return false;
    }
    
     /**
     * 插入新邮件
     */
    public function insert($data){
        
        return $this->db->insert($this->table_alise,$data);
    }
    
    /**
     * 更新邮件
     */
    public function update($data,$id) {
        return $this->db->update2($this->table_alise,$data,'id=:id ',array('id'=>$id));
    }
    
    
    /**
     * 删除邮件
     */
    public function delmail($id) {      
        return $this->db->delete($this->table_alise,'id=:id',  array('id'=>$id));
    }
}
