<?php

class Statdata_Controller extends Module_Lib { 
   /**
	* Index by liumingjie add 2015-08-12 入口函数加载视图
	* 日常数据统计
	**/
	public function Index()
	{   
       !empty($_GET["zoneid"])?setcookie('zoneid', $_GET["zoneid"],time()+3600*2, '/'):"";
		if(isset($_POST['type']) && isset($_POST['regionid']))
		{    
			$type = $_POST['type'];	// 查询条件			
			$platform  = Helper_Lib::getCookie('zoneid');//获取平台ID	
			$servertype = $_POST['servertype'];	// 2-ios 1-Android	 
        	$global_platform = 1;//唯一         	
			$regionid  = $_POST['regionid'];// 区服编号			
			$statdatamode = new Statdata_Model($platform); //调用model			
			$startTime = $_POST['startTime'];
			$endtime = $_POST['endtime'];			
			$lookstatus = $_POST['lookstatus'];// look 范围 			
			$lookstatus = $type==2?'custom':$_POST['lookstatus'];#
			 
			# 检验区服
			$arrayOut = explode(",",trim($regionid)); # 支持多个区服ID例:1,2解析多个
			count($arrayOut)>=2?$this->prompt("区服查询已达到上限!本查询功能只支持单区查询!",false):"";
			# 2015-9-8 合并数据库的统计信息，对充值已经角色的相关信息已经得到了合并,对应区服ID检索到底是属于哪一个
			# db库名以及table名||
			foreach($arrayOut as $reid)
			{	
				$roledbinfo[] = $this->region_configinfo($reid,$servertype,"payjoin0928");# 角色信息					
			}
			foreach($roledbinfo as $rolevar)
			{  
				foreach($rolevar as $dbvar)
				{
					$dbname = $dbvar[0];
					$conn   = $dbvar[1];
					$regionID = $dbvar[2];					
					# 注册
					#Statdata_Model::getProcDailyData()
					$register[] = Statdata_Model::getProcDailyData($conn,"register",
					"$lookstatus",$startTime,$endtime,$dbname,$regionID,'');					 						
					# 活跃
					$online[] = Statdata_Model::getProcDailyData($conn,"online",
					"$lookstatus",$startTime,$endtime,$dbname,$regionID,'');
					# 创号数
					$createRoleNum[] = Statdata_Model::getProcDailyData($conn,"CreateRoleNum",
					"$lookstatus",$startTime,$endtime,$dbname,$regionID,''); 					
					# 登录次数								
					$iLoginCount[] = Statdata_Model::getProcDailyData($conn,"iLoginCount",
					"$lookstatus",$startTime,$endtime,$dbname,$regionID,'');									
					# 老玩家
					$oldPlayers[] = Statdata_Model::getProcDailyData($conn,"oldPlayers",
					"$lookstatus",$startTime,$endtime,$dbname,$regionID,'');					
					# 充值人数
					$PayRoleNum[] = Statdata_Model::getProcDailyData($conn,"PayRoleNum",
					"$lookstatus",$startTime,$endtime,$dbname,$regionID,'');					
					# 充值金额
					$PayMoneyNum[] = Statdata_Model::getProcDailyData($conn,"PayMoneyNum",
					"$lookstatus",$startTime,$endtime,$dbname,$regionID,'');
					# 充值次数
					$Payfrequency[] = Statdata_Model::getProcDailyData($conn,"Payfrequency",
					"$lookstatus",$startTime,$endtime,$dbname,$regionID,'');					 
					# 新玩家充值人数
					$NewPayRoleNum[] = Statdata_Model::getProcDailyData($conn,"NewPayRoleNum",
					"$lookstatus",$startTime,$endtime,$dbname,$regionID,'');					
					# 新玩家充值金额
					$NewPayMoneyNum[] = Statdata_Model::getProcDailyData($conn,"NewPayMoneyNum",
					"$lookstatus",$startTime,$endtime,$dbname,$regionID,''); 					 
				}				
			 }
			// 自定义两个时间段的数据			 
			if($type == 2)	
			{ 	 
				if(isset($_POST['startTime']) && isset($_POST['endtime']))
				{					
					$startTime = $_POST['startTime'];					
					$endtime   = $_POST['endtime'];					
					$weeks = array(); 
					$DayNumber = $this->jet_lag_day($startTime,$endtime,40);					 
					$data['object'] = $this->Timelist($endtime,$DayNumber);  
				}  
			} 			
			// 日 周 月 的数据			   
			if(isset($_POST['lookstatus']) && $type == 1)
			{  				
				$yesterdayTime = date("Y-m-d",time()-24*60*60);// 昨天				
				$currentTime = date("Y-m-d",time());// 当前时间				
				$month_time  = date("Y-m-d",strtotime("last month"));// 获得上月份				
				switch($lookstatus)
				{
					case 'day':
					 	$data['object'] = array($currentTime);				 	 
					 	break;					 	
					case 'week':
						$week_num  = 6;						
						$data['object'] = $this->Timelist($yesterdayTime,$week_num);						
						break;						
					case 'month':
						$month_num = date('t',strtotime($month_time)); #月天数						
						$data['object'] = $this->Timelist($yesterdayTime,$month_num);
						break;												
					default:$this->prompt('lookstatus NULL',false);
				} 
			} 		 
		}
		$data['dailydata'] = array($register,$createRoleNum,$online,$iLoginCount,$oldPlayers,
		$PayRoleNum,$PayMoneyNum,$Payfrequency,$NewPayRoleNum,$NewPayMoneyNum);    
		$this->load_view("stat_data",$data);
	}  
	 
	 
	/**
	 * 导出数据 
	 ***/
	public function Exportfile ()
	{ 
	 	$data  = isset($_POST['listroleid'])?explode(",",$_POST['listroleid']):0;
	 	
	 	$time  = isset($_POST['time'])?explode(',',$_POST['time']):0;
	  
	 	foreach($data as $var)
	 	{
	 		$cont[] = explode("=",$var); 
	 	}  	 	
	 	if($fileName = $this->Makefile($time,$cont))
	 	{	 		 
	 		$page = Config::get("common.page");
	 		$acction = $page['host'].'/statfile/';
	 		header("location:".$acction.$fileName);
	 			 		
	 		$this->load_view("stat_data",$data);
	 	}
	} 
	/**
	 * 文件生成 execl
	 **/
	public function Makefile($time,$data)
	{ 
		$url = PROJECT_ROOT."www\\file\\";
		
		$fileName= date('Y-m-d h-i', time()).".xls";//我想给所要备份的xls命名 
		
		$file = fopen($url.$fileName,'w');//这个是创建txt 
		
		//头部导航  		
	 	fwrite($file,"日期"."\t"."注册"."\t"."创号数"."\t"."活跃玩家"."\t"."登陆次数"."\t"
	 	."深度玩家"."\t"."老玩家"."\t"."PCU"."\t"."ACU"."\t"."ACU/PCU"."\t"."平均在线时长"
	 	."\t"."充值人数"."\t"."充值金额"."\t"."Arppu"."\t"."DAU-ARPU"."\t"."新玩家充值人数"
	 	."\t"."新玩家充值金额"."\n");	 
		foreach($time as $time)
		{  
			fwrite($file,$time);// 日期
			
			foreach($data as $var)//注册
	 		{  
	 			if(empty($var[0])){continue;}
	 			 
	 			if($time === $var[0]){  fwrite($file,"\t".$var[1]);	}
	 		}
			foreach($data as $var)//创号数
	 		{  
	 			if(empty($var[0])){ continue; } 
	 			if($time === $var[0]){  fwrite($file,"\t"."\t".$var[1]);}
	 		}
	 		fwrite($file,"\n"); 
		} 
		fclose($file);
		
		if($file != true)
		{
			echo "<script>alert('文件导出文件失败 file=false ！');window.history.go(-2);</script>";
			return false;
			exit();
		}
		return $fileName;	 
	}
	 
	/*
	 * 充值金额比例
	 * */
	public function recharge_gold()
	{	  
		$startTime = $_POST['startTime'];
		$endTime   = $_POST['endtime'];
		$type	   = $_POST['type'];
		$regionid  = $_POST['regionid'];
		$FirstFrom = $_POST['FirstFrom'];
		$secondFrom= $_POST['secondFrom'];
				
		if(isset($startTime)&& isset($endTime) && isset($type) && isset($regionid))
		{	
			$data = array($startTime,$endTime,$type,$regionid,$FirstFrom,$secondFrom);
						
			$data["object"] = $this->recharge_goldHandle($data);
	    }	    
		$this->load_view("stat/stat_recharge_gold",$data);
	} 
	
	/**
	 * 数据处理 数据返回
	 * **/
	public function  recharge_goldHandle($data = array()){	
		
		empty($data)?$this->prompt("充值比例不存在条件数据",false):"";
		$regionid   = strlen($data[3])>0?$data[3]:$this->prompt("区服为空",false);
		$startTime  = $data[0]; # 开始时间
		$endTime    = $data[1]; # 结束时间
		$FirstFrom  = $data[4]; # 充值比例开始区间
		$secondFrom = $data[5];	# 充值比例截止区间	 
		$DayNumber  = $this->jet_lag_day($startTime,$endTime,60); # 开始结束时间的相差天数		
		$Timelist   = $this->Timelist($endTime,$DayNumber);    # 开始日期与截止日期的日期信息
			
		$type = $data[2];# 2-安卓混服  1-应用宝		
		$conn = ""; $dbname = "";$dbTable= "";$retdb = "";$rettab = "";$retout = "";
		$rettabout = "";
				
		$contTimelist  = count($data['object']);
		$holdStartTime = $data['object'][$contTimelist-1];# 开始的时间
		$holdEndTime   = $data['object'][0]; # 截止的时间
		$newinfo    = in_array("2015-09-20",$data['object']);
		
		# 筛选日期			
		/*if($newinfo == true)
		{	 
		  strtotime($holdStartTime)<strtotime('2015-09-20')?$this->prompt("阻隔日期!在2015年9月20日只能作为开始时间来查询!",false):"";
		}*/			
		$arrayOut = explode(",",trim($regionid)); # 支持多个区服ID例:1,2解析多个
		count($arrayOut)>21?$this->prompt("区服查询已达到上限!最大容量为20个区服",false):"";
		
		foreach($arrayOut as $reid)
		{					
			$paydbinfo[]  = $this->region_configinfo($reid,$type,"pay"); # 充值信息
			$roledbinfo[] = $this->region_configinfo($reid,$type,"payjoin0928");# 角色信息					
		}
		# 2015-09-20后要切换db库	
		/*if(strtotime($holdStartTime) >= strtotime('2015-09-20'))
		{	
			foreach($arrayOut as $reid)
			{
				$paydbinfo[]  = $this->region_configinfo($reid,$type,"pay");# 充值信息
				$roledbinfo[] = $this->region_configinfo($reid,$type,"newrole0920");# 角色信息					
			}
		}# 2015-09-20之前的要切换db库			
		else if(strtotime($holdStartTime) < strtotime('2015-09-20')){
			foreach($arrayOut as $reid)
			{					
				$paydbinfo[]  = $this->region_configinfo($reid,$type,"pay"); # 充值信息
				$roledbinfo[] = $this->region_configinfo($reid,$type,"role");# 角色信息					
			}	
		}*/
			
		# 充值比例 根据区间的首末算出结果返回
		if(!empty($FirstFrom) && !empty($secondFrom))
		{  
			$conInterval = count($FirstFrom);
			//校验
			for($i=1;$i<=$conInterval;$i++)
			{   
				if(empty($FirstFrom[$i]) || empty($secondFrom[$i])){
					$this->prompt("首区间或末区间不能为空或0!");
				}
				$FirstFrom[$i]>$secondFrom[$i]?$this->prompt("首区间不能大于或等于末区间"):"";
				!is_numeric($FirstFrom[$i])?$this->prompt("首区间不是有效数字"):"";
				!is_numeric($secondFrom[$i])?$this->prompt("末区间不是有效数字"):""; 
			}
			 $MaxInterval = max($secondFrom);#总区间至末最大值以上区间
			 foreach($paydbinfo as $payvar)
			 {  
				foreach($payvar as $Table => $dbvar)
				{
					$conn     = $dbvar[1];	
					$dbname   = $dbvar[0];
					$regionID = $dbvar[2];							
					$dbTable  = $dbname.".".$Table;
					$rettab   = Statdata_Model::dbTableVerification($conn,$dbname,$Table);
					if( count($rettab)<=0 )
					{
						$rettabout.=","."dbName:".$dbname."Table".$dbTable."database conn:".$conn;
					}
					else
					{  
						$PayObject[] = Statdata_Model::pay_grand_totalInfo($conn,$dbTable,$startTime,$endTime,$regionID); 
						$PayDetailInfoObj [] = Statdata_Model::PayDetailInfo($conn,$dbname,$dbTable,$startTime,$endTime,$regionID,$MaxInterval);
						$totalPayInfo[] = Statdata_Model::Totalpayinfo($conn,$dbname,$dbTable,$startTime,$endTime,$regionID);
						for($i=1;$i<=$conInterval;$i++)
						{
							$First  = $FirstFrom[$i];
							$second = $secondFrom[$i]; 
							$Interval[$First.$second] = $First."至".$second;#处理区间去重
							$Interval[$MaxInterval.$MaxInterval] = ($MaxInterval)."以上";	
							$Interval[$MaxInterval.$MaxInterval.$i] = "单笔".$MaxInterval;	
							$PayIntervalObject[] = Statdata_Model::pay_Interval_Info($conn,$dbTable,$startTime,$endTime,$regionID,$First,$second);												
			 				$PayIntervalObject[] = Statdata_Model::pay_Interval_Info($conn,$dbTable,$startTime,$endTime,$regionID,$First,$second,"",$MaxInterval);
			 				$PayIntervalObject[] = Statdata_Model::pay_Interval_Info($conn,$dbTable,$startTime,$endTime,$regionID,$First,$second,$MaxInterval);
						}
					} 
				} 
			 } 
	 		if($rettabout){
				$rettabout .="不存在db库或表".$rettabout;
	 			echo "<script>alert('$rettabout')</script>";
	 		} 
			return array($Timelist,$PayObject,$PayIntervalObject,$Interval,$PayDetailInfoObj,$type,2,$totalPayInfo);#末尾标注编号2：为充值比例
		}
		else
		{ 
			//pay db info 解析
			foreach($paydbinfo as $payvar)
			{  
				foreach($payvar as $Table => $dbvar)
				{
					$conn     = $dbvar[1];	
					$dbname   = $dbvar[0];
					$regionID = $dbvar[2];							
					$dbTable  = $Table; 							
					# 检查db name or db table是否拥有
					$rettab = Statdata_Model::dbTableVerification($conn,$dbname,$dbTable);
					if(count($rettab)<=0)
					{
						$rettabout.=","."dbName:".$dbname."Table".$dbTable."database conn:".$conn;
					}
					else
					{
						$PayObject[] = Statdata_Model::getpayinfo($conn,$dbname.".".$dbTable,$startTime,$endTime,$regionID); 
						$PayroleObject[] = Statdata_Model::payroleinfo($conn,$dbname.".".$dbTable,$startTime,$endTime,$regionID);
					}
				}
			}
			//role db info 解析
			foreach($roledbinfo as $rolevar)
			{  
				foreach($rolevar as $Table => $dbvar)
				{
					$dbname = $dbvar[0];
					$conn   = $dbvar[1];
					$regionID = $dbvar[2];
												
					$dbTable = "role_table"; 							
					//检查db name or db table是否拥有
					$rettab = Statdata_Model::dbTableVerification($conn,$dbname,$dbTable);  
					
					if(count($rettab)<=0)
					{
						$retroletabout.=","."dbName:".$dbname."Table".$dbTable."database conn:".$conn;
					}
					else
					{
						$dauObject[] = Statdata_Model::getroleinfo($conn,$dbname,$regionID,$startTime,$endTime,"dau","","");
						$registerObject[] = Statdata_Model::getroleinfo($conn,$dbname,$regionID,$startTime,$endTime,"register","",""); 
					}
				}
			} 
			if($retroletabout){
				$retroletabout .="不存在的角色表".$retroletabout;
	 			echo "<script>alert('$retroletabout')</script>";
	 		} 
	 		if($rettabout){
				$rettabout .="不存在db库或表".$rettabout;
	 			echo "<script>alert('$rettabout')</script>";
	 		}  
	 		#末尾标注编号1：为充值信息
	 		return array($Timelist,$PayObject,$dauObject,$registerObject,$PayroleObject,$type,1); 
	 	}//:~	 
	} 
	
	 // ----------------------------------------------------------------------------------
	public function payExportfile($data="",$type="")
	{
		//$this->prompt("成功进入导入文件",true);
	 
		$time  	  = isset($_POST['time'])?explode(',',$_POST['time']):0;
		$register = isset($_POST['register'])?explode(',',$_POST['register']):0;
		$dau  	  = isset($_POST['dau'])?explode(',',$_POST['dau']):0;
		$payrole  = isset($_POST['payrole'])?explode(',',$_POST['payrole']):0;
		$payal    = isset($_POST['payal'])?explode(',',$_POST['payal']):0;
		$type     = isset($_POST['type'])?$_POST['type']:0;	 	
	 	foreach($payal as $var)
	 	{
	 		$Payal[] = explode("=",$var); 
	 	}
		foreach($payrole as $var)
	 	{
	 		$Payrole[] = explode("=",$var); 
	 	}
		foreach($dau as $var)
	 	{
	 		$Dau[] = explode("=",$var); 
	 	}
		foreach($register as $var)
	 	{
	 		$Register[] = explode("=",$var); 
	 	}		 
	 	$data = array(
	 	"汇总全部:支付时间"."\t"."支付金额"."\t"."roleid"."\t"."区服编号"=>$Payal,
	 	"汇总付费时间"."\t"."累计付费金额"."\t"."累计付费人数"."\t"."区服编号"=>$Payrole,
	 	"活跃时间"."\t"."活跃总人数"."\t"."区服"=>$Dau,
	 	"创建时间"."\t"."创建人数"."\t"."区服"=>$Register);
	 		 	
	 	if($fileName = $this->output_file($time,$type,$data))
	 	{	 	
	 		$page = Config::get("common.page");
	 		$acction = $page['host'].'/statfile/';	 
	 		header("location:".$acction.$fileName); 
	 		$this->load_view("stat_data",$data);
	 	}
	} 
	#充值区间
	public function IntervalExport($data="",$type="")
	{
		//$this->prompt("成功进入导入文件",true);
	 
		$time  	  = isset($_POST['time'])?explode(',',$_POST['time']):0; 
		$payrole  = isset($_POST['payrole'])?explode(',',$_POST['payrole']):0; # 大于648可以自定义
		$payal    = isset($_POST['payal'])?explode(',',$_POST['payal']):0; # 累计>=1000 info
		$type     = isset($_POST['type'])?$_POST['type']:0;
		$contentType     = isset($_POST['contentType'])?$_POST['contentType']:0;		
	 	foreach($payal as $var)
	 	{
	 		$Payal[] = explode("=",$var); 
	 	}
		foreach($payrole as $var)
	 	{
	 		$Payrole[] = explode("=",$var); 
	 	} 
	 	 
	 	$data = array(
	 	"单充:角色ID"."\t"."支付金额"."\t"."UIN"."\t"."等级"."\t"."角色昵称"."\t"."上次下线时间"."\t"."查询区间"."\t"."区服编号"=>$Payrole,
	 	"累计:角色ID"."\t"."支付金额"."\t"."UIN"."\t"."等级"."\t"."角色昵称"."\t"."上次下线时间"."\t"."查询区间"."\t"."区服编号"=>$Payal
	 	 );	 		 	
	 	if($fileName = $this->output_file($time,$type,$data))
	 	{	$acction = $page['host'].'/statfile/'; 		 
	 		header("location:".$acction.$fileName); 
	 		$this->load_view("stat_data",$data);
	 	}
	}
///:::~~~~ 
}
























