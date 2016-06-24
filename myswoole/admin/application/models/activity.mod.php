<?php
//活动加载模块

class Activity_Model extends Model{
 private $table = 'tb_activity';
 private $db = null;
 public function __construct($host,$user, $pass,$database) {
        parent::__construct(); 
	$this->db = Mysql::loadMysql($host,$user,$pass,$database);
    }
    
    public function getActivity($id){   
        $sql = 'SELECT * FROM  '.$this->table.' where  id =  '.$id ;
        
        if($this->db->query($sql) && $this->db->rowcount() > 0){
            $rows =$this->db->fetch_row();           
            return $rows;
        }
        return false;
    }
    
    public function getTotal( $state ){
        
        $sql = 'SELECT count(1)as total FROM '.$this->table.' where state = '.$state;
        if($this->db->query($sql) && $this->db->rowcount()>0){
            $rows = $this->db->fetch_row();
            return $rows['total'];
        }
        return false;
    }
    public function LoadActivity($state){ 
        $nowtime = time(0) ;
        if( $state < 5  )
        {
            $sql = 'SELECT * FROM  '.$this->table .' where state = '.$state. ' and endtime >= ' .$nowtime. ' order by starttime desc limit 1000 ';
        }else
        {
           $sql = 'SELECT * FROM  '.$this->table .' where state = '.$state. ' or  endtime < ' .$nowtime. '  order by starttime desc limit 1000 ';  
        }
        if($this->db->query($sql) && $this->db->rowcount() > 0){
            $rows =$this->db->fetch_all();        
            return $rows;
        }
        return false;
    }
    
    /**
     * $state 状态为3是表示发布中的活动
     * @param type $search
     * @param type $param
     * @return boolean'
     */
    public function SearchActivity($search,$param){ 
        
        $nowtime = time(0);
        $sql = "";
        if( isset($search) && isset($param ) )
        {
            if( $search == 1 )
            {
                $sql = 'SELECT * FROM  '.$this->table .' where state = 3 or  endtime < ' .$nowtime. ' order by starttime desc ';
            }
            if(  $search == 2  )
            {
                $sql = 'SELECT * FROM  '.$this->table .' where  ( state = 3 and  endtime < ' .$nowtime. '  and title like "%' .$param. '%" ) or ( state = 3 and title like "%' .$param. '%" )order by starttime desc ';
            }
        }else
        {
            $sql = 'SELECT * FROM  '.$this->table .' where  state = 3  or  endtime < ' .$nowtime. '  order by starttime desc limit 1000 ';  
        }

        if($this->db->query($sql) && $this->db->rowcount() > 0){
            $rows =$this->db->fetch_all();        
            return $rows;
        }
        return false;
    }
    
    /**
     * 获取有效的活动
     * @param type $starttime
     * @param type $endtime
     * @param type $acttype
     * @param type $sid
     * @return boolean
     */
    public function GetEffectActivity($starttime,$endtime,$acttype,$sid){   
        $sql = 'SELECT starttime, endtime,sid  FROM  '.$this->table.' '
                . 'where  endtime > '.  time(0).' and  starttime < endtime  and    param like "%'.trim($acttype).'%"  ';
        if($this->db->query($sql) && $this->db->rowcount() > 0){
                 $rows =$this->db->fetch_all(); 
                 for($i = 0; $i< count($rows);++$i)
                 {
                     if($starttime > $rows[$i]['endtime'] || $endtime < $rows[$i]['starttime'] )
                     {
                         continue;
                     }
                     $arraysid = explode(",", $rows[$i]["sid"]);
                     if(in_array($arraysid, trim($sid)) )
                     {
                         return true;
                     }                                                
                 }  
        }
        return false;
    }
    
    public function insert($data){        
        return $this->db->insert($this->table,$data);
    }
    
     public function update($data,$id) {
        return $this->db->update2($this->table,$data,'id=:id ',array('id'=>$id));
    }
    public function deldata($id) {      
        return $this->db->delete($this->table,'id=:id',  array('id'=>$id));
    }
    
}