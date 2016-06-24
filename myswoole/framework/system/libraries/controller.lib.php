<?php

/**
 * 控制器基类
 * 
 *
 */
abstract class Controller {
    /* 事件注册器 */
    protected $events = array('start' => array('Onload_Device'), 'shutdown' => array('Unload_Device'));

    /* 调试开关, 这个参数在 onload 里面用到, 暂不改动 */
    public $__debug = false;

    /*
     * 控制器构造函数
     *
     * 当子类实现自己的控制器构造函数时，必须在构造函数体内第一行调用： parent::__construct();
     *
     * @param void
     * @reutrn object
     *
     */

    public function __construct() {
        //Debug::debug_set_time('controller');
        $this->runevents('start');
    }

    /*
     * 控制器构造函数
     *
     * 当子类实现自己的控制器析构函数时，必须在析构函数体内最后一行调用： parent::__destruct();
     *
     * @param void
     * @return void
     *
     */

    public function __destruct() {
        $this->runevents('shutdown');
        //Debug::debug_set_time('controller');
        //$this->unload_show_debug();
    }

    /**
     * 加载视图模板
     * 
     * @param string $template_file 模板文件 以.php结尾，默认为templates/default/下
     * @param array $value_array 传到视图的数据
     * @param bool $output 是否输出，不输出则返回模板解析后的 html
     * @param string $layout 视图目录
     */
    public function load_view($template_file, $value_array = array(), $output = true, $layout = 'default') {
        return load_view($template_file, $value_array, $output, $layout);
    }

    private function unload_show_debug() {
        if ($this->__debug || (isset($_GET['__debug']) && $_GET['__debug'] == 'true')) {
            $this->load_view('sys:debug');
        }
    }

    //获得当前microtime
    private function debug_get_microtime() {
        list($usec, $sec) = explode(" ", microtime());
        return round(((float) $usec + (float) $sec), 5);
    }
    
    /**
     * JSON输出
     * $0 errcode
     * $1 msg
     * $2 data
     */
    protected function outputJson() {
        $args = func_get_args();
        $rs['errcode'] = $args[0];
        $rs['msg'] = $args[1];
        $args[2]&& $rs['data'] = $args[2];
        echo json_encode($rs);
        exit;
    }

    /**
     * return bool
     */
    private function runevents($eventname) {
        if ($this->events[$eventname]) {
            foreach ($this->events[$eventname] as $eventname) {
                $class_name = $eventname . '_Event';
                $res = load_event(strtolower($eventname));
                if (class_exists($class_name, false)) {
                    $object = new $class_name;
                    if (!call_user_func(array($object, 'run'))) {
                        return false;
                    }
                }
            }
        }
        return true;
    }
	 /**
     * 	prompt status 
     * 	$parm   alert Contents
     *  $status true or false
     *  $url 	add to url
     * **/
	public function prompt($parm="",$status,$dbugstatus=array(),$url=NULL)
	{ 	  
		 $gotourl = "<script>alert('$parm');window.history.go(-1);</script>";	
		 $gotourlfalse = "<script>alert('$parm');window.history.go(-1);</script>";			 
		 $dbugaction = "<script>alert('$parm');</script>"; 
		 switch($status)
		 {
		 	case   true: echo $gotourl;exit;break ;
		 	case  false: echo $gotourlfalse;exit;break; 
		 	default: return 0;  
		 }  
	 }
	 /* 时差天数
	 * @param $startTime开始时间
	 * @param $endtime  截止时间
	 * @param $limit	自定义时间范围
	 **/
	public function jet_lag_day($startTime,$endtime,$limit="")
	{  
		$endtime = strtotime(date('Y-m-d',strtotime($endtime)));
		$startTime = strtotime(date('Y-m-d',strtotime($startTime)));			 
		$IntervalDays = $endtime - $startTime;																
		$DayNumber = ceil($IntervalDays/3600/24);									
		$DayNumber<0?$this->prompt("开始时间与截止时间格式不正确！",false):"";
		if(empty($limit))
		{			
		  $DayNumber>60?$this->prompt("起止时间溢出最大为60天",false):"";
		}else{ 	
		  $DayNumber>$limit?$this->prompt("起止时间溢出最大为{$limit}天",false):"";
		}		
		return $DayNumber;		
	} 
	
	/*
	 * 后期对应的要进行优化成可读去的mysql配置
	 * 区服信息db库
	 * @param $regionid 区id
	 * @param type 2 混服 1 应用宝
	 * @param $affixation pay：充值的相关信息 包括（tx and ios）小于100 或者是大于100的
	 * @param $affixation role: 2015-9.20之前的角色数据
	 * @param payjoin0928
	 * @param $affixation newrole0920 : 2015-9.20后的角色数据
	 * @param $connectid statiosConn1: 小于100服的iosDB连接
	 * @param $connectid statiosConn2：大于100服的iosDB连接
	 * @param $connectid statTxConn1 :小于59服的txDB 连接
	 * @param $connectid statTxConn2 :大于60服的txDB 连接
	 * ***/
	public function region_configinfo($regionid,$type,$affixation="")
	{	 
		$type =(int)$type;	
		if($affixation === "pay")
		{			
			if( $type === 2 )
			{ 
				//安卓混服充值
				if($regionid <= 100)
				{	$connectid = "statiosConn1";
					$tableName = "t_order_form_".$regionid;
					$dbName[$tableName] = array("roledb_ios_s".$regionid,$connectid,$regionid);
				}
				elseif( $regionid > 100 && $regionid <= 200 )
				{
					$connectid = "statiosConn2";
					$tableName = "t_order_form_".$regionid;
					$dbName[$tableName] = array("roledb_ios_s".$regionid,$connectid,$regionid);
				}
			}
			if( $type === 1 )
			{
				//应用宝
				if( $regionid <= 59 )
				{	
					$connectid = "statTxConn1";
					$tableName = "t_order_form_".$regionid;
					$dbName[$tableName] = array("roledb_tx_s".$regionid,$connectid,$regionid);	
				}
				elseif( $regionid > 59 && $regionid <= 100 )
				{	
					$connectid = "statTxConn2";
					$tableName = "t_order_form_".$regionid;
					$dbName[$tableName] = array("roledb_tx_s".$regionid,$connectid,$regionid);			
				}				
			} 
		}
		# 云服与本地为不同的地址，如果是真的链表信息共享是要做相对应的处理
		# 根据现在的形式，如果是链表本地需要对云服上的数据进行合并到本地上
		# 此类型解析适用于2015-09-28 后的链表数据统计
		if($affixation === "payjoin0928")
		{	 	
			if( $type === 2 )  # 安卓混服
			{   
				if( $regionid === 110 || $regionid === 94 ){
					$connectid = "statrole";						
					$dbName[$regionid] = array("kingnet_s31_s110_s94",$connectid,$regionid);
				}
				elseif( $regionid === 117 || $regionid === 118 ){
					$connectid = "statrole";						
					$dbName[$regionid] = array("kingnet_s".($regionid - 79)."_s".$regionid,$connectid,$regionid);
				}
				elseif( $regionid>=79 && $regionid<=86 )
				{
					$connectid = "statrole";
					$dbName[$regionid] = array("kingnet_s".($regionid - 37)."_s".$regionid,$connectid,$regionid);	
				}
				elseif( $regionid === 78 ){
					$connectid = "statrole";
					$dbName[$regionid] = array("kingnet_s50_s78",$connectid,$regionid);						
				}
				elseif( $regionid === 77 ){
					$connectid = "statrole";
					$dbName[$regionid] = array("kingnet_s51_s77",$connectid,$regionid);
				}
				elseif( $regionid >=119 && $regionid <=123 ){
					$connectid = "statrole";
					$dbName[$regionid] = array("kingnet_s".($regionid - 47)."_s".$regionid,$connectid,$regionid);
				}else {
					$connectid = "statrole";						
					$dbName[$regionid] = array("kingnet_ios",$connectid,$regionid);
				}
			}
			elseif( $type === 1 )# 应用宝
			{
				if( $regionid === 31 ){
					$connectid = "statrole";						
					$dbName[$regionid] = array("kingnet_s31_s110_s94",$connectid,$regionid);
				}
				elseif( $regionid >= 38 && $regionid <= 49 ){
					$connectid = "statrole";						
					$dbName[$regionid] = array("kingnet_s".$regionid."_s".($regionid + 79),$connectid,$regionid);
				}
				elseif( $regionid === 50 ){
					$connectid = "statrole";						
					$dbName[$regionid] = array("kingnet_s50_s78",$connectid,$regionid);
				}
				elseif( $regionid === 51 ){
					$connectid = "statrole";						
					$dbName[$regionid] = array("kingnet_s51_s77",$connectid,$regionid);
				}
				elseif( $regionid >=72 && $regionid<=76 ){
					$connectid = "statrole";						
					$dbName[$regionid] = array("kingnet_s".$regionid."_s".($regionid + 47),$connectid,$regionid);
				}else{
					$connectid = "statrole";						
					$dbName[$regionid] = array("kingnet_tx",$connectid,$regionid);
				} 
			} 		
		} 
		if( $affixation === "role" ){				
		if( $type===2 )
			{	//安卓混服			
			 	if( $regionid <= 39)
			 	{
			 		$connectid = "statrole";
			 		$dbName[$regionid]   = array("kingnet_ios_s".$regionid,$connectid,$regionid);
			 	}
			 	if( $regionid >= 40 && $regionid<=64 ){
			 		$connectid = "statrole";
			 		//$dbName[$regionid] = "kingnet_ios_s".( $regionid - 25 );
			 		$dbName[$regionid] = array("kingnet_ios_s".( $regionid - 25 ),$connectid,$regionid);		 		
			 	}
			 	if( $regionid >=65 && $regionid <=76 ){
			 		$connectid = "statrole";
			 		//$dbName[$regionid] = "kingnet_ios_s".( $regionid - 64 );
			 		$dbName[$regionid]   = array("kingnet_ios_s".( $regionid - 64 ),$connectid,$regionid);
			 	}
			 	if( $regionid === 77 )
			 	{
			 		$connectid = "statrole";
			 		$dbName[$regionid] = "kingnet_tx";
			 		$dbName[$regionid] = array("kingnet_tx".$regionid,$connectid,$regionid);
			 	}
			 	if( $regionid === 78 )
			 	{
			 		$connectid = "statrole";
			 		$dbName[$regionid] = array("kingnet_tx_s50",$connectid,$regionid);
			 		 
			 	}
			 	if( $regionid >=79 && $regionid <= 86 )
			 	{
			 		$connectid = "statrole";
			 		$dbName[$regionid] = array("kingnet_tx_s".( $regionid - 37 ),$connectid,$regionid);
			 	}
				if( $regionid >= 87 )
			 	{
			 		//__log_message("statrolestatrolestatrole");
			 		$connectid = "statrole";
			 		$dbName[$regionid] = array("kingnet_ios",$connectid,$regionid);
			 	}
			 	 
			}
		 	if($type===1)
		 	{//应用宝
		 		if($regionid>=1 && $regionid<=11)
		 		{
		 			$connectid = "statrole";
		 			$dbName[$regionid] = array("kingnet_tx_s".$regionid,$connectid,$regionid);
		 		}
		 		if($regionid>=12 && $regionid<=22 )
		 		{
		 			$connectid = "statrole";
		 			$dbName[$regionid] = array("kingnet_tx_s".($regionid - 11),$connectid,$regionid);
		 		}
		 		if($regionid>=23 && $regionid<=50 )
		 		{
		 			$connectid = "statrole";
		 			$dbName[$regionid] = array("kingnet_tx_s".($regionid - 11),$connectid,$regionid);
		 		}
		 		if($regionid === 51 )
		 		{
		 			$connectid = "statrole";
		 			$dbName[$regionid] = array("kingnet_tx",$connectid,$regionid);
		 		}
		 		if($regionid>=52 && $regionid<=59 )
		 		{
		 			$connectid = "statrole";
		 			$dbName[$regionid] = array("kingnet_tx_s".($regionid - 29),$connectid,$regionid);
		 		}
		 		if($regionid>=60 && $regionid <=63)
		 		{
		 			$connectid = "statrole";
		 			$dbName[$regionid] = array("kingnet_tx_s".($regionid - 28),$connectid,$regionid);
		 		}
		 		if( $regionid === 70 )
		 		{
		 			$connectid = "statrole";
		 			$dbName[$regionid] = array("kingnet_tx_s37",$connectid,$regionid);
		 		}
		 		if( $regionid === 71 )
		 		{
		 			$connectid = "statrole";
		 			$dbName[$regionid] = array("kingnet_tx_s36",$connectid,$regionid);
		 		}
		 		if($regionid>=72 && $regionid <=74 || $regionid === 76)
		 		{
		 			$connectid = "statrole";
		 			$dbName[$regionid] = array("kingnet_ios",$connectid,$regionid);
		 		}
		 		if($regionid === 75 || $regionid === 85)
		 		{
		 			$connectid = "statrole";
		 			$dbName[$regionid] = array("kingnet_tx",$connectid,$regionid);
		 		} 
		 		if($regionid>=64 && $regionid <=69 || $regionid >= 77 && $regionid <= 81)
		 		{
		 			$connectid = "statrole";
		 			$dbName[$regionid] = array("kingnet_tx",$connectid,$regionid);
		 		}
		 		if( $regionid === 71 )
		 		{
		 			$connectid = "statrole";
		 			$dbName[$regionid] = array("kingnet_tx_s36",$connectid,$regionid);
		 		}
		 		if($regionid >=82 && $regionid<=84)
		 		{
		 			$connectid = "statrole";
		 			$dbName[$regionid] = array("kingnet_tx_s".($regionid-80),$connectid,$regionid);
		 		}
		 		if($regionid === 86)
		 		{
		 			$connectid = "statrole";
		 			$dbName[$regionid] = array("kingnet_tx_s41",$connectid,$regionid);
		 		} 
			}
		}
   		else if($affixation === "newrole0920")
		{
			//合并之后的样子需要再次重新整理之前的数据和现在不一样的数据
			if($type === 2)
			{
				if($regionid>=1 && $regionid <=77 || $regionid>=123 && $regionid<=150)
				{
					$connectid = "statrole";
					$dbName[$regionid] = array("kingnet_ios",$connectid,$regionid);
				}
				if($regionid === 78)
				{
					$connectid = "statrole";
					$dbName[$regionid] = array("kingnet_s50_s78",$connectid,$regionid);
				}
				if($regionid>=79 && $regionid <=86)
				{
					$connectid = "statrole";
					$dbName[$regionid] = array("kingnet_s".($regionid-37)."_s".$regionid,$connectid,$regionid);
				}
				if($regionid===93 || $regionid===110){
					$connectid = "statrole";
					$dbname[$regionid] = array("kingnet_s31_s110_s94",$connectid,$regionid);
				}
				if($regionid>=87 && $regionid <=92 || $regionid>=94 && $regionid<=109){
					$connectid = "statrole";
					$dbName[$regionid] = array("kingnet_ios",$connectid,$regionid);
				}
				if($regionid>=111 && $regionid <=115){
					$connectid = "statrole";
					$dbName[$regionid] = array("kingnet_ios",$connectid,$regionid);
				}
				if($regionid>=116 && $regionid <=122){
					$connectid = "statrole";
					$dbName[$regionid] = array("kingnet_s".($regionid+1-79)."_s".($regionid+1),$connectid,$regionid);
				} 			
			}
			if($type === 1){
				if($regionid>=1 && $regionid <=30 || $regionid>=32 && $regionid <=37){
					$connectid = "statrole";
					$dbName[$regionid] = array("kingnet_ios","kingnet_tx",$connectid,$regionid);
				}
				if($regionid === 31){
					$connectid = "statrole";
					$dbName[$regionid] = array("kingnet_s31_s110_s94",$connectid,$regionid);
				}
				if($regionid>=38 && $regionid <=39){
					$connectid = "statrole";
					$dbName[$regionid] = array("kingnet_s".$regionid."_s".($regionid+79),$connectid,$regionid);
				}
				if($regionid>=40 && $regionid <=41 || $regionid>=51 && $regionid<=71){
					$connectid = "statrole";
					$dbName[$regionid] = array("kingnet_tx",$connectid,$regionid);
				}
				if($regionid>=42 && $regionid <=49){
					$connectid = "statrole";
					$dbName[$regionid] = array("kingnet_s".$regionid."_s".($regionid+37),$connectid,$regionid);
				}
				if($regionid===50){
					$connectid = "statrole";
					$dbName[$regionid] = array("kingnet_s50_s78",$regionid);
				}
				if($regionid>=72 && $regionid <=76){
					$connectid = "statrole";
					$dbName[$regionid] = array("kingnet_s".$regionid."_s".($regionid+47),$connectid,$regionid);
				}
				if($regionid>=77 && $regionid <=90){
					$connectid = "statrole";
					$dbName[$regionid] = array("kingnet_tx",$connectid,$regionid);;
				}
			} 
		}
			return $dbName;
	}
	
	/**
	 *  @param string $startTime 指定的一个日期
	 *  @param int 	$day_number 到某一个日期的天数
	 *  Pass a beginning and ending dates of the beginning and ending date 
	 *  return a list of all the information on the number of days
	 ***/
	public function Timelist($startTime,$dayNumber)
	{ 
		$date=array();
		for($i=0;$i <= $dayNumber;$i++)
		{
			$strtodate=strtotime($startTime)-($i)*24*3600;
			 
			$date[$i]=date('Y-m-d',$strtodate); 
		}
		return $date;
	}  
    #output_file 输出文件根据以下制定规则生成输出 
    public function output_file($time,$type,$data=array(),$url="")
	{    
		$fileName = date('Y-m-d h-i',time()).".xls";	 // Name xls or set up their own
		$url  = $url==""?PROJECT_ROOT."www//statfile//":$url;// Default(www\\file\\)  
		$file = fopen($url.$fileName,'w'); 				 // Fopen create xls
		$statTime = $time[count($time[0])-1];			 // Start time
		$endTime = $time[0];						     // End time
		 		 
		$type==2?fwrite($file,"混服".$statTime."至".$endTime."\n"):"";
		
		$type==1?fwrite($file,"专服".$statTime."至".$endTime."\n"):"";
		 
		foreach($data as $key => $Indata)
		{
			fwrite($file,$key."\n");
			
			foreach($Indata as $var)
			{
				$cont = count($var);
				$dataInfo = "";
				for ($i=0;$i<$cont;$i++)
				{ 
					$dataInfo.=$var[$i]."\t";				
				}				
				fwrite($file,$dataInfo."\n");
			}
		}		
		
		fclose($file);
						
		if($file != true)
		{
			echo "
			<script>
			    alert('文件导出文件失败 file=false!');window.history.go(-2);
			</script>";
			return false;
			exit();
		}
		unset($time);
		unset($data);
		unset($type);
		return $fileName; 
	}
}

?>
