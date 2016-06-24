<?php

/* 
 * 区服管理
 */
class Statdata_Model extends Model{
 	private $table = 'tb_platform';
    private $db = null;
    private $cdd = null;
    private $Accountdbname = array(
    	13=>'accountdb_tx1',14=>'accountdb_android_ios',
    	15=>'accountdb_tx_s1',16=>'accountdb_xy_s1'
    );
    /* -------------------------------------------------------------------------------------------------------------- */
    public function __construct($region) 
    { 
        parent::__construct(); 
        $this->cdd = Mysql::database('key.conn'.$region);
    }	 
   /**
	* get_region info
	* $platform = 平台ID
	* $sid = 区服ID	* 
	**/ 
    /* -------------------------------------------------------------------------------------------------------------- */
	public static function get_region($platform,$sid)
	{   
		$obj = new Statdata_Model( $platform );		 
		$sql ="select * from tb_admin_region_info 
			   where PLATID = $platform  
			   and   ZONEID = $sid";
		if($obj->cdd->query($sql) && $obj->cdd->rowcount() > 0){
            $row = $obj->cdd->fetch_row();
            return $row;
        }
	}
	/* -------------------------------------------------------------------------------------------------------------- */
	# 统计两个时间戳的相关数据
	public static function  time_intervalData($platform,$sid,$start_time,$end_time)
	{
		 $obj = new Statdata_Model($platform); 
	}
	/* -------------------------------------------------------------------------------------------------------------- */
	# 统计  日 周 月 的先关数据  
	public static function countdownData()
	{
		 $obj = new Statdata_Model($platform);	
	} 
	/* -------------------------------------------------------------------------------------------------------------- */
	# getProcDailyData
	/*
	 * In  inmode varchar(20),In type varchar(20),In startTime varchar(50),
	 * In  endTime varchar(50),In dbTable varchar(500),In sid int(5),In dbTable2 varchar(500)
	 * */
	public static function getProcDailyData($platform,$inmode,$Type,$startTime,$endTime,$dbTable,$sid,$dbTable2)
	{
		//$t1 = microtime(true);
		$rows = null;	 
		$obj = new Statdata_Model($platform);		 
		$sql ="CALL globaldb.PROC_STAT_DAILY_DATA(
		'{$inmode}','{$Type}','{$startTime}','{$endTime}','{$dbTable}',{$sid},'{$dbTable2}')";		
	 	if($obj->cdd->query($sql) && $obj->cdd->rowcount() > 0)
	 	{	
	 		$rows = $obj->cdd->fetch_all();
	 		//耗时
		    /*$t2 = microtime(true); 
		    $t1a = explode(" ", $t1);
		    $t2a = explode(" ", $t2);
		    $num = (float)$t2a[0] - (float)$t1a[0] + (float)$t2a[1] - (float)$t1a[1];
		    $current_file = basename(__FILE__);
		    $time = date("Y-m-d",time());
		    __log_message("times:".$time.":耗时".$num."====".$sql);*/
	 		$obj->cdd->close($rows);
            return $rows; 
        }
	} 
	/* -------------------------------------------------------------------------------------------------------------- */
	# 校验在选择区服的的时候通过查询配置表的相关配置文件查询
	# 是否包含先关的数据库表(此外还要包含数据库的名字)
	public static function dbTableVerification($platform,$database,$tables)
	{	
		$obj = new Statdata_Model($platform);		 
		if(!empty($database) && !empty($tables)){
			$sql ="SHOW TABLES FROM ".$database." like '%{$tables}%'";		 
			if($obj->cdd->query($sql) && $obj->cdd->rowcount() > 0)
		 	{	  
	            $rows =$obj->cdd->fetch_all();           
	            return $rows;
	        }	
		} 
	}
	
	/* -------------------------------------------单利获取充值数据项-------------------------------------------------- */
	# getpayinfo
	# 单利获取充值数据项
	public static function getpayinfo($platform,$tables,$statime,$endtime,$usersid)
	{
		$obj = new Statdata_Model($platform);
		$sql ="SELECT FROM_UNIXTIME(order_time) as order_time,order_money,order_roleid,user_sid FROM ".$tables." as a 
		WHERE order_time BETWEEN UNIX_TIMESTAMP('{$statime}') AND UNIX_TIMESTAMP('{$endtime}')
		AND order_state =2 AND user_sid = $usersid";
		//__log_message("pay get infoooooooo".$sql);		 
		if($obj->cdd->query($sql) && $obj->cdd->rowcount() > 0)
		 {	 			 		
	            $rows =$obj->cdd->fetch_all();           
	            return $rows;
	     }	    
	}
	/* -------------------------------------------------------------------------------------------------------------- */
	# 支付金额
	public static function payroleinfo($platform,$tables,$statime,$endtime,$usersid){
		$obj = new Statdata_Model($platform);
		$sql ="
		SELECT DATE(FROM_UNIXTIME(order_time)) as order_time,SUM(order_money) 
		as money,COUNT(DISTINCT order_roleid) 
		as rolenum,user_sid FROM ".$tables." 
		WHERE order_time BETWEEN UNIX_TIMESTAMP('{$statime}') AND UNIX_TIMESTAMP('{$endtime}')
		AND order_state = 2 AND user_sid = ".$usersid."
		GROUP BY DATE(FROM_UNIXTIME(order_time));";			 
		if( $obj->cdd->query($sql) && $obj->cdd->rowcount() > 0)
		{	 			 		
	            $rows =$obj->cdd->fetch_all();           
	            return $rows;
	    } 
	}
	/* -------------------------------------------------------------------------------------------------------------- */
	// 角色信息
	public static function getroleinfo($platform,$dbname,$regionid,$statime,$endtime,$type,$RetainedStatTime="",$RetainedEndTime="")
	{
		$obj = new Statdata_Model($platform);
		$sql ="CALL globaldb.PROC_STAT_ADMIN_USERINFO('{$type}','{$dbname}','{$regionid}',
		'{$statime}','{$endtime}','{$RetainedStatTime}','{$RetainedEndTime}')";
		//__log_message("caaallll:::".$sql);
	 	if($obj->cdd->query($sql) && $obj->cdd->rowcount() > 0)
	 	{	 			 		
            $rows =$obj->cdd->fetch_all();           
            return $rows;
        } 
	}
	/* -------------------------------------------------------------------------------------------------------------- */
	# 累计充值 
	public static function pay_grand_totalInfo($platform,$tables,$statime,$endtime,$usersid)
	{
		$obj = new Statdata_Model($platform);
		$sql ="SELECT SUM(order_money) as money,COUNT( DISTINCT order_roleid) as controle,user_sid FROM  ".$tables."
		WHERE order_time BETWEEN UNIX_TIMESTAMP('{$statime}') AND UNIX_TIMESTAMP('{$endtime}')
		AND order_state = 2 AND user_sid = $usersid";
		
		//__log_message("pay get payroleinfopayroleinfopayroleinfo".$sql);		 
		if($obj->cdd->query($sql) && $obj->cdd->rowcount() > 0)
		 {	 			 		
	            $rows =$obj->cdd->fetch_all();           
	            return $rows;
	     }		
	}
	/* -------------------------------------------------------------------------------------------------------------- */
	# 单充详情  :混/专服	服务器	角色名	角色ID	UIN	等级	单笔充值（≥648rmb）	上次下线时间
	public static function PayDetailInfo($platform,$dbName,$tables,$statime,$endtime,$usersid,$MaxInterval)
	{	
		$obj = new Statdata_Model($platform);
		$interval = "单笔充值大于等于".$MaxInterval."rmb";
		$sql ="SELECT a.order_roleid,a.order_money,FROM_UNIXTIME(a.order_time) as order_time,a.uin,a.`level`,a.strName,
		FROM_UNIXTIME(a.updatetime)as updatetime,'{$interval}' as entry,a.worldID  FROM 
		(
			SELECT  a.order_roleid,a.order_money,FROM_UNIXTIME(a.order_time) ,a.order_time,b.uin,b.`level`,b.strName,
			b.updatetime,b.worldID FROM  ".$tables." as a
			STRAIGHT_JOIN ".$dbName.".t_qmonster_userdata as b on a.order_roleid = b.roleID 
			WHERE a.order_time BETWEEN UNIX_TIMESTAMP('{$statime}') AND UNIX_TIMESTAMP('{$endtime}')
			AND a.order_state = 2 
			AND a.user_sid = $usersid
			AND b.worldID = $usersid
			AND a.order_money >=$MaxInterval
			ORDER BY b.updatetime ASC
		)as a GROUP BY a.order_roleid "; 
		//__log_message("充值详情数据".$sql);
		if($obj->cdd->query($sql) && $obj->cdd->rowcount() > 0)
		 {	 			 		
	            $rows =$obj->cdd->fetch_all();           
	            return $rows;
	     }	
	}
	/* -------------------------------------------------------------------------------------------------------------- */
	# 累计充值 :混/专服	服务器	角色名	角色ID	UIN	等级	单笔充值（≥648rmb）	上次下线时间
	public static function Totalpayinfo($platform,$dbName,$tables,$statime,$endtime,$usersid){
		$obj = new Statdata_Model($platform);
		$interval = "累计充值大于等于1000Rmb";
		$sql ="SELECT * FROM (	
		SELECT a.order_roleid,SUM(a.order_money) as order_money,FROM_UNIXTIME(a.order_time) as order_time,a.uin,a.`level`,a.strName,
			FROM_UNIXTIME(a.updatetime)as updatetime,'{$interval}' as entry,a.worldID  FROM 
			(
				SELECT  a.order_roleid,a.order_money,FROM_UNIXTIME(a.order_time) ,a.order_time,b.uin,b.`level`,b.strName,
				b.updatetime,b.worldID FROM  ".$tables." as a
				STRAIGHT_JOIN ".$dbName.".t_qmonster_userdata as b on a.order_roleid = b.roleID 
				WHERE a.order_time BETWEEN UNIX_TIMESTAMP('{$statime}') AND UNIX_TIMESTAMP('{$endtime}')
				AND a.order_state = 2 
				AND a.user_sid = $usersid 
				ORDER BY b.updatetime ASC
			)as a  GROUP BY a.order_roleid
		) as b  WHERE b.order_money >=1000"; 
		//__log_message("累计充值详情数据".$sql);
		if($obj->cdd->query($sql) && $obj->cdd->rowcount() > 0)
		 {	 			 		
	            $rows =$obj->cdd->fetch_all();           
	            return $rows;
	     }	
		 
	}
	/* -------------------------------------------------------------------------------------------------------------- */
	# 充值区间分布
	# SELECT COUNT(DISTINCT a.order_roleid) FROM roledb_ios_s1.t_order_form_s1 as a
	# WHERE a.order_time BETWEEN UNIX_TIMESTAMP('2015-01-20') AND UNIX_TIMESTAMP('2015-09-25')
	# AND order_state = 2 AND user_sid = 1
	# AND order_money BETWEEN 1 AND 100
	public static function pay_Interval_Info($platform,$tables,$statime,$endtime,$usersid,$First,$second,$MaxInterval="",$Geometric="")
	{
		$obj = new Statdata_Model($platform);
		if($MaxInterval)
		{ 
			$interval = $MaxInterval."以上";
			$sql ="SELECT SUM(order_money) as money,COUNT( DISTINCT order_roleid) as controle,'{$interval}' as entry,user_sid FROM  ".$tables."
			WHERE order_time BETWEEN UNIX_TIMESTAMP('{$statime}') AND UNIX_TIMESTAMP('{$endtime}')
			AND order_state = 2 AND user_sid = $usersid  AND order_money >=  $MaxInterval"; 
			//__log_message("pay get max interval".$sql);		 
			if($obj->cdd->query($sql) && $obj->cdd->rowcount() > 0)
			 {	 			 		
		            $rows =$obj->cdd->fetch_all();           
		            return $rows;
		     }		
		}
		//----------------------------------------------------------------------------------------------------------
		if($Geometric)
		{
			$interval = "单笔".$Geometric;
			$sql ="SELECT SUM(order_money) as money,COUNT( DISTINCT order_roleid) as controle,'{$interval}' as entry,user_sid FROM  ".$tables."
			WHERE order_time BETWEEN UNIX_TIMESTAMP('{$statime}') AND UNIX_TIMESTAMP('{$endtime}')
			AND order_state = 2 AND user_sid = $usersid  AND order_money = $Geometric"; 
			//__log_message("pay get Geometric interval".$sql);		 
			if($obj->cdd->query($sql) && $obj->cdd->rowcount() > 0)
			 {	 			 		
		            $rows =$obj->cdd->fetch_all();           
		            return $rows;
		     }	
		}
		//----------------------------------------------------------------------------------------------------------
		if(empty($MaxInterval) && empty($Geometric)){
			$interval = $First.'至'.$second;
			$sql ="SELECT SUM(order_money) as money,COUNT( DISTINCT order_roleid) as controle,'{$interval}' as entry,user_sid FROM  ".$tables."
			WHERE order_time BETWEEN UNIX_TIMESTAMP('{$statime}') AND UNIX_TIMESTAMP('{$endtime}')
			AND order_state = 2 AND user_sid = $usersid  AND order_money >=  $First  AND order_money <=$second";		
			//__log_message("pay get payroleinfopayroleinfopayroleinfo".$sql);		 
			if($obj->cdd->query($sql) && $obj->cdd->rowcount() > 0)
			 {	 			 		
		            $rows =$obj->cdd->fetch_all();           
		            return $rows;
		     }
		}			
	}
	/* -------------------------------------------------------------------------------------------------------------- */
	///:~~~
}

