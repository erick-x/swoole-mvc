<?php

/**
	账号设置 
**/
class accountreplace_Controller extends Module_Lib {
   /**
	* Index by liumingjie add 2015-08-19 入口函数加载视图
	* 此安全限制一定要非常非常的紧密
	**/
	public function  index()
	{   
	 	$platform = Helper_Lib::getCookie('zoneid');//获取平台ID 	 	
        $global_platform = 1;//唯一 
        $AccountReplace  = new  AccountReplace_Model($platform); 
        $type  = isset($_POST['type'])?$_POST['type']:0;//设置类型（1-挂载 2-账号变更修改uin）
        $accounttype = isset($_POST['accounttype'])?$_POST['accounttype']:0; // 账号类型
        $replacetype = isset($_POST['replacetype'])?$_POST['replacetype']:"";// 替换类型
        $accountname = isset($_POST['accountname'])?$_POST['accountname']:"";// 账号
        $replaceuin  = isset($_POST['replaceuin'])?$_POST['replaceuin']:0;	 // 替换uin   
        
        if($type>0)
        {	#检查账号是否通过
        	$account = $AccountReplace->verifyAccount($platform,$accountname,$accounttype); 
        	if(empty($account) || $account['cont']!=1)
        	{  
        		$this->prompt("没有找到该账号或该账号存在重复！请检查账号与类型",false);        		 
        	} 
        	$uin = $account['uin'];
        	$userType = $account['accountType'];
        	if( $type == 1 )
        	{
        		$updateUinResult= '账号为:'.$accountname.'账号类型:'.$accounttype.'账号uin：'.$uin.'替换为:'.$replaceuin;        		  	
        		$data = array('uin'=>$replaceuin);
        		$ret = $AccountReplace->update_account_uin($accountname,$accounttype,$data,$platform);
        		$ret===false?$this->prompt("操作账号失败账号{$updateUinResult}",false):$this->prompt("操作账号成功！{$updateUinResult}",true);
        		 
        	}
        	if( $type == 2 ){
        		$ProcessResult = '账号为:'.$accountname.'账号类型:'.$userType.'替换为:'.$replacetype;        		  
        		$data = array('accountType' => $replacetype);
        		$ret =  $AccountReplace->update_account_type($accountname,$accounttype,$data,$platform);        		        		 
        		$ret===false?$this->prompt("操作账号类型失败{$ProcessResult}",false):$this->prompt("操作账号类型成功！{$ProcessResult}",true);
        	}  
        }
        else
        {
			$this->load_view("accountreplace");
        }
	}
	 /*--------------------------------------------------------------------------*/
	 /**
	  * 提醒状态
	  * */
	 public function prompt($parm="",$status,$url=NULL)
	 { 
		 $gotourl = "<script>alert('$parm');window.history.go(-1);</script>";	
		 $gotourlfalse = "<script>alert('$parm');window.history.go(-1);</script>"; 
		 switch($status){
		 	case   true: echo  $gotourl;exit();break ;
		 	case  false: echo $gotourlfalse;exit();break;			 
		 	default: return 0;  
		 } 
	 }
	 /*--------------------------------------------------------------------------*/	 
}
