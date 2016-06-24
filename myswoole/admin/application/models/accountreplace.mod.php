<?php

/* 
 * 区服管理
 */
class AccountReplace_Model extends Model{
 	private $table = 'tb_platform';
    private $db = null;
    private $cdd = null; 	
    private $Accountdbname =array(21=>'accountdb_uk',13=>'accountdb_ios_s1',14=>'accountdb_android_ios',15=>'accountdb_tx_s1',16=>'accountdb_xy_s1');
    public function __construct($region) { 
        parent::__construct();         
        $this->cdd = Mysql::database('key.conn'.$region);
    }
    /**
     *  检查账号是否存在
     * **/	 
	public static function  verifyAccount($platform,$accountID,$accountType){ 
		$obj = new AccountReplace_Model($platform);		 
		$tables= $obj->Accountdbname[$platform].'.t_qmonster_accountdata';		 
		$sql ="SELECT count(*) as cont,accountType,uin FROM $tables  WHERE accountID ='$accountID' AND accountType =$accountType"; 
		if($obj->cdd->query($sql) && $obj->cdd->rowcount() > 0){
            $row = $obj->cdd->fetch_row();
            return $row;
        } 
	} 
	/*
	 * 更改账号uin 检验准确唯一性 获得根据账号+账号类型找到所属的进行更改
	 * **/
	public static function update_account_uin($accountname,$usertype,$data,$platform){  
		$obj = new AccountReplace_Model($platform);
		$tables=$obj->Accountdbname[$platform].'.t_qmonster_accountdata'; 
        return $obj->cdd->update2($tables, $data,'accountID=:accountname and accountType=:usertype',array('accountname'=>$accountname,'usertype'=>$usertype)); 
	} 
	/*
	 * 更改账号类型 检验准确唯一性 获得根据账号+账号类型找到所属的进行更改
	 * **/
	public static function update_account_type($accountname,$usertype,$data,$platform){		
		$obj = new AccountReplace_Model($platform);
		$tables = $obj->Accountdbname[$platform].'.t_qmonster_accountdata'; 
        return $obj->cdd->update2($tables, $data,'accountID=:accountname and accountType=:usertype',array('accountname'=>$accountname,'usertype'=>$usertype)); 
	}  
	/**
	 * 获取账号类型
	 * ***/
	public static  function get_accoutType($platform)
	{
		$obj = new AccountReplace_Model($platform);
		$sql ="select `name`,type from tb_admin_account_type_info";
		if($obj->cdd->query($sql) && $obj->cdd->rowcount() > 0){
            $row = $obj->cdd->fetch_all();
            return $row;
        } 
	} 
   
}

