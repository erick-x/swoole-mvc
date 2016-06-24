<?php

/* 
 * 区服管理
 */
class Rolesupervise_Model extends Model{
 	private $table = 'tb_platform';
    private $db = null;
    private $cdd = null;
    private $Accountdbname =array(2=>'accountdb_xinma',14=>'accountdb_android_ios',15=>'accountdb_tx_s1',16=>'accountdb_xy_s1');
    
    public function __construct($region) { 
        parent::__construct(); 
        $this->cdd = Mysql::database('key.conn'.$region);
    }	
 
 //获取平台IP
 	public static function getPlatformByID($platform)
 	{  
 		$obj = new Rolesupervise_Model($platform); 							  
        $sql = "SELECT * FROM tb_platform where platform_id=$platform limit 1";        
 		if($obj->cdd->query($sql) && $obj->cdd->rowcount() > 0 ){
            $row = $obj->cdd->fetch_row();
            return $row;
        }
        return false;
    }
   /**
	* get_region info
	**/
	public static function get_region($platform,$sid)
	{   
		$obj = new Rolesupervise_Model($platform);		 
		$sql ="select * from tb_admin_region_info where PLATID = $platform  and ZONEID = $sid";
		if($obj->cdd->query($sql) && $obj->cdd->rowcount() > 0){
            $row = $obj->cdd->fetch_row();
            return $row;
        }
	}
	 
	/**
	 * get uin
	 * **/
	public static  function get_role_uin($dbname,$roleid,$platform)
	{		
		$obj = new Rolesupervise_Model($platform);
		$tb = $dbname.'.t_qmonster_userdata';
		$sql ="select uin from  $tb  where roleID = $roleid";
		__log_message("get region info".$sql);
		if($obj->cdd->query($sql) && $obj->cdd->rowcount() > 0){
            $row = $obj->cdd->fetch_row();
            return $row;
        }
	}
	/*
	 * set account
	 * **/
	public static function set_uin($uin,$data,$platform){  
		$obj = new Rolesupervise_Model($platform);
		$tables= $obj->Accountdbname[$platform].'.t_qmonster_accountdata'; 
        return $obj->cdd->update2($tables,  $data,'uin=:uin',array('uin'=>$uin)); 
	}  
   
}

