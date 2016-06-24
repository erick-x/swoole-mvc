<?php

/* 
 * user model
 */

class User_Model extends Model{
    
    private $table = 'user';
    private $db = null;
    public function __construct() {
        parent::__construct();
        $this->db = Mysql::load($this->table);
    }
    
    /**
     * 
     * @param type $data 插入的数据
     * @return boolean 返回插入成功还是失败
     */
    public function insert($data){
        if(!is_array($data) || empty($data)){
            return false;
        }
        if(empty($data['t_account']) || empty($data['t_password'])){
            return false;
        }
        empty($data['t_uid']) && $data['t_uid'] = Helper_Lib::createUUID();
        empty($data['t_roleid']) && $data['t_roleid'] = 2;//2是默认组
        empty($data['t_regtime']) && $data['t_regtime'] = date("Y-m-d H:i:s",time());
        return $this->db->insert($this->table,$data);
    }
    
    /**
     * 更新
     * @param type $account 
     * @param type $data
     * @return boolean
     */
    public function update($account,$data) {
        if(!is_array($data) || empty($data)){
            return false;
        }
        unset($data['t_account']);
        $where = 't_account=:account';
        $prepare_array = array('account'=>$account);
        $ret = $this->db->update2($this->table,$data,$where,$prepare_array);
        if($ret === false){
            return false;
        }
        return true;
    }
    
    public function delUserByUid($uid) {
        $db = Mysql::load($this->table);
        $where = "t_uid=:uid";
        $array = array('uid' => $uid);
        return $db->delete($this->table, $where, $array);
    }

    
    /**
     * 通过uid查询用户信息
     * @param type $uid uid
     * @return boolean or array 返回查询到的数据或者false
     */
    public function getUserByUid($uid){
        if(empty($uid)){
            return false;
        }
        $sql = 'SELECT * FROM '.$this->table.' WHERE `t_uid`=:uid LIMIT 1';
        
        if($this->db->query($sql,array('uid'=>$uid)) && $this->db->rowcount() > 0){
            $row = $this->db->fetch_row();
            return $row;
        }
        return false;
    }
    
    /**
     * 通过帐号查询用户信息
     * @param type $account 用户的帐号
     * @return boolean or array 返回查询的数据或者false
     */
    public function getUserByAccount($account){
        if(empty($account)){
            return false;
        }
        
        $sql = 'SELECT * FROM '.$this->table.' WHERE `t_account`=:account LIMIT 1';
        
        if($this->db->query($sql,array('account'=>$account)) && $this->db->rowcount() > 0){
            $row = $this->db->fetch_row();
            return $row;
        }
        return false;
    }
    
    /**
     * 分页获得所有的用户信息
     * @param int $page
     * @param int $pagesize
     * @return boolean
     */
    public function getUsers($page = 1, $pagesize = 15) {
        empty($page) && $page = 1;
        empty($pagesize) && $pagesize = 15;
        $offset = ($page - 1) * $pagesize;
        $sql = 'SELECT * FROM '.$this->table.' ORDER BY t_uid asc LIMIT '.$offset.','.$pagesize;
        
        if($this->db->query($sql) && $this->db->rowcount() > 0){
            $rows = $this->db->fetch_all();
            return $rows;
        }
        return false;
    }
}

