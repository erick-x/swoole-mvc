<?php

/* 
 * 管理员操作日志
 */
class ManagerLog_Model extends Model{
    
    private $table = 'manager_log';
    private $db = null;
    
    public function __construct() {
        parent::__construct();
        $this->db = Mysql::load($this->table);
    }
    
    public function getManagerLog($aWhere=array(),$page=0,$pagesize=0) {
        $sql = 'SELECT * FROM '.$this->table; 
       
        if(!empty($aWhere['account']) && empty($aWhere['endtime']))
        {
            $sql .= ' WHERE  f_account = "'.$aWhere['account'].'"';
        }
        if(empty($aWhere['account']) && !empty($aWhere['createTime']) && !empty($aWhere['endtime']) )
        {
            $sql .= ' WHERE  f_addtime >= "'.$aWhere['createTime']  . '" and f_addtime <= "'.$aWhere['endtime'].'"';
        }
        if(!empty($aWhere['account']) && !empty($aWhere['createTime']) && !empty($aWhere['endtime']))
        {
             $sql .= ' WHERE  f_account = "' .$aWhere['account'].'" and f_addtime >= '.$aWhere['createTime'] . ' and f_addtime <= '.$aWhere['endtime'];
        }
        
        $sql .= ' ORDER BY f_addtime DESC';
        $page = intval($page);
        $pagesize = intval($pagesize);
        if($page && $pagesize){
            $sql .= ' LIMIT '.(($page - 1)*$pagesize).','.$pagesize;
        }
        
        if($this->db->query($sql) && $this->db->rowcount()>0){
            $rows = $this->db->fetch_all();
                    
            return $rows;
        }
        return false;
    }
    
    /**
     * 获得日志的总条数
     * @return int
     */
    public function getTotal($aWhere = array()) {
        $sql = 'SELECT COUNT(f_id) AS num FROM '.$this->table; 
        if(!empty($aWhere['account']) && empty($aWhere['endtime']))
        {
            $sql .= ' WHERE  f_account = "'.$aWhere['account'].'"';
        }
        if(empty($aWhere['account']) && !empty($aWhere['createTime']) && !empty($aWhere['endtime']) )
        {
            $sql .= ' WHERE  f_addtime >= "'.$aWhere['createTime']  . '" and f_addtime <= "'.$aWhere['endtime'].'"';
        }
        if(!empty($aWhere['account']) && !empty($aWhere['createTime']) && !empty($aWhere['endtime']))
        {
             $sql .= ' WHERE  f_account = "' .$aWhere['account'].'" and f_addtime >= '.$aWhere['createTime'] . ' and f_addtime <= '.$aWhere['endtime'];
        }
        if($this->db->query($sql) && $this->db->rowcount()>0){
            $row = $this->db->fetch_row();
            return intval($row['num']);
        }
        return 0;
    }

    public function insert($data) {
        return $this->db->insert($this->table,$data);
    }
}

