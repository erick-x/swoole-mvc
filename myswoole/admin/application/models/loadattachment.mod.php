<?php

/* 
 * 数据库加载各个道具上限
 */
class LoadAttachment_Model extends Model{
    
    private $table = 'attachment';
    private $db = null;
    
    public function __construct() {
        parent::__construct();
        $this->db = Mysql::load($this->table);
    }
    public function getAttachmentConfig($id){   
        if($id==0)
        {
            return false;
        }
        $sql = 'SELECT name FROM tb_attachment where id = '.$id;
        
        if($this->db->query($sql) && $this->db->rowcount() > 0){
            $rows =$this->db->fetch_row();           
            return $rows['name'];
        }
        return false;
    }
    
    public function getlimitConfig($id,$num){
        $sql = 'SELECT maxnum FROM tb_attachment where id="'.$id.'" and maxnum >= '.$num;
        if($this->db->query($sql) && $this->db->rowcount() > 0){
            return true;
        }
        return false;
    }
    
    public function CheckProp($id,$type){   
        if($id ==0)
        {
            return false;
        }
            
        $sql = 'SELECT * FROM tb_attachment where id='.$id.' and type = '.$type;
        if($this->db->query($sql) && $this->db->rowcount() > 0){
            return true;
        }
        return false;
    }
}
