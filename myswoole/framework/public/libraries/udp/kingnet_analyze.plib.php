<?php
/**
*	发送日志统计类
*	实现了发送日志的基本功能，需要自定义其他功能可继承此类
*	Kingnet_analyze.php
*   2012-12-01
*	version 5.0
*   根据新版本的udpserver
*   改变根据日志类型获取日志ID的方法
*	2012-11-01
*	version 4.0
*	修改udp日志协议
*	增加了各种日志的封装
*	2012-08-23
*	version 3.5
*	增加不同发送日志模式
*	2010-10-18
*	version 3.0
*/
class Kingnet_analyze
{
	protected $ver = 'v5.0.121201';
	protected $uid;//用户外部id
    protected $rid;//日志资源id
	protected $error_no = "";
        public $error = array();
	//var $logname;
	protected $userip;//用户ip
	protected $daytime;//记录时间戳
	protected $msg;//用户信息
 	protected $forbid;//是否需要发送日志
	protected $_config = array();
	protected $_sendcount = 0;
	protected $_sockfd = null;

    protected $_serverId = 1;

    /**
	*  静态成品变量 保存全局实例
	*  @access protected
	*/
	protected static $_instance = NULL;

//        public  static function getInstance(){
//            if(  self::$_instance==null  ){
//                 self::$_instance = new Kingnet_analyze($config);
//            }
//            return self::$_instance;
//        }

	/**
	*  私有化构造函数，防止外界实例化对象
	*/
	protected function __construct($config){
		$this->init( $config );
                $this->debug = array();
                $this->log_info ='';
                $this->uid ='';
	}

	/**
	*  私有化克隆函数，防止外界克隆对象
	*/
	protected function  __clone(){}

        protected $udp_meta = array(
            8=>'last_ip',
            9=>'game_time',
            10=>'ouid',
            11=>'iuid',
            12=>'birthday',
            13=>'sex',
            14=>'app_f_num',
            15=>'sns_f_num',
            16=>'grade',
            17=>'exp',
            18=>'mb',
            19=>'gb',
            20=>'res1',
            21=>'res2',
            22=>'g1',
            23=>'g2',
            24=>'vip',
            25=>'install_date',
            26=>'ver',
            27=>'country',
            28=>'entry',
            29=>'email',
        );
	/**
	*  静态方法, 单例统一访问入口
	*  @return  object  返回对象的唯一实例
	*/
	public static function get_instance($config,$log_mode = null) {
            $class_name = self::get_called_class();
            if (empty(self::$_instance[$class_name])||!(self::$_instance[$class_nameid] instanceof $class_name)) {

                    //var_dump($class_name);
                    self::$_instance[$class_name] = new $class_name($config);
            }
            return self::$_instance[$class_name];
	}

    protected function init_table_type($xml){
        $this->hash_type_info = array();
        $this->type_info = array();

        $dom = new DOMDocument();
        $dom->loadXML($xml);

        $servers = $dom->getElementsByTagName("server");
        foreach($servers  as $server){
            $servername = $server->getAttribute("name");
            $serverid = $server->getAttribute("index");

            $this->type_info[$serverid] = array();

            //处理空文本节点方式a
             if($server->nodeName !='#text'){

                 //检索子元素时跳跃过文本节点  - 处理空文本节点方式b
                for($i=1; $i<$server->childNodes->length; $i+=2) {
                    $anode = $server->childNodes->item($i);

                    if($anode->tagName=="table"){
                        $tableid = $anode->getAttribute("id");
                        $name = $anode->getAttribute("name");
                        $this->hash_type_info[$name] = $tableid;
                        $this->type_info[$serverid][$name] = $tableid;
                    }
                 }

             }
         }

         //var_dump($this->hash_type_info,$this->type_info);
    }

	public static function get_exist_instance() {
		return self::$_instance;
	}

	public function init($config){
            $this->_config = $config;
            $this->forbid = false;
            $this->error_no = 0;
            $this->rid = $config['rid'];
            $this->userip = $this->get_client_ip();
            $this->daytime = time();
            $this->_sendcount = 0;
            $this->init_table_type($config['type_info']);
            $this->_serverId = $config['server_id'];
	}

	/**
	 * 获取用户基础信息
	 */
	protected function get_userinfo(){
		$this->msg = $this->userip."|".time()."|";
		//如果没有取到用户信息，则尝试重新取
		return $this->msg;
	}

	/**
     * @过期函数
	 * 发送日志的主体函数
	 * @param string $type login,adv,act,login,inv,syslog
	 */
	private function log_msg_raw($str1,$str2,$str3,$str4,$str5,$str6,$type='login',$count=1){
		if($this->_check_sample_status($type)){
			$log_info = $str1."|".$str2."|".$str3."|".$str4."|".$str5."|".$str6."|".$count."|".$this->get_userinfo();
			return $this->_send_udp_log($this->uid,$this->rid, $type, $log_info);
		}

	}

    public function log_msg($str1,$str2,$str3,$str4,$str5,$str6,$type='login',$count=1,$isDebug=''){
            $log_info = $str1."|".$str2."|".$str3."|".$str4."|".$str5."|".$str6."|".$count."|".$this->get_userinfo();

            if( $isDebug ){
                if( count( $this->debug ) >= 10 ){
                    array_shift( $this->debug );
                }
                $this->debug[] = date("Y-m-d H:i:s").'|'.$log_info;
            }
            return $log_info;
            //return $this->_send_udp_log($this->uid,$this->rid, $typeid, $log_info);

    }
    public function getTypeIdByType($type)
    {
        if($this->_serverId==0)
        {
            $type=$type."_test";
        }elseif($this->_serverId==1)
        {

        }else
        {
            $type=$type.$this->_serverId;
        }
        return $this->type_info[$this->_serverId][$type];
    }


	//==================下面是具体每种类型日志的封装================

	/**
	 * 登陆日志类型,$custom开头的变量为数据中心暂时未使用的字段
	 * @param $main_ref 主来源
	 * @param $sub_ref 主来源
	 */
 	public function login_log_msg($main_ref,$sub_ref,$custom1='',$custom2='',$custom3='',$custom4='',$count=1,$userinfo=array()){
 		if($userinfo){
 			$this->log_msg_with_userinfo($main_ref,$sub_ref,$custom1,$custom2,$custom3,$custom4,'login',$count,$userinfo);
 		}else{
 			$this->log_msg($main_ref,$sub_ref,$custom1,$custom2,$custom3,$custom4,'login',$count);
 		}

 	}

	/**
	 * 支付日志类型,$custom开头的变量为数据中心暂时未使用的字段
	 * @param $main_ref 主来源
	 * @param $sub_ref 主来源
	 */
 	public function pay_log_msg($unit,$amount,$coin_num,$package,$payment,$custom1='',$count=1,$userinfo=array()){
 		if($userinfo){
 			$this->log_msg_with_userinfo($unit,$amount,$coin_num,$package,$payment,$custom1,'pay',$count,$userinfo);
 		}else{
 			$this->log_msg($unit,$amount,$coin_num,$package,$payment,$custom1,'pay');
 		}

 	}

	/**
	 * 支付日志类型,$custom开头的变量为数据中心暂时未使用的字段
	 * 直接使用运营支付数据发送日至
	 * @param $main_ref 主来源
	 * @param $sub_ref 主来源
	 */
 	public function pay_log_msg_with_addition($addition,$count=1,$userinfo=array()){
		$pay_info = explode('%7c',$addition);
		$unit = $pay_info[0]; //充值货币单位
		$amount = $pay_info[1]; //充值货币金额
		$coin_num = $pay_info[2]; //游戏币数量
		$package = $pay_info[3];//支付套餐号
		$payment = $pay_info[4]; //充值方式

		$this->pay_log_msg($unit,$amount,$coin_num,$package,$payment,'',$count,$userinfo);

 	}

	/**
	 * 登陆日志类型,$custom开头的变量为数据中心暂时未使用的字段
	 * @param $main_ref 主来源
	 * @param $sub_ref 主来源
	 */
 	public function props_log_msg($action_type,$category,$itemid,$price,$time,$custom1,$count=1,$userinfo=array()){
                if( $action_type != 'sub' && $action_type != 'add'){
                    $this->error_no = 'props type error';
                    return false;
                }
 		if($userinfo){
 			$this->log_msg_with_userinfo($action_type,$category,$itemid,$price,$time,$custom1,'props',$count,$userinfo);
 		}else{
 			$this->log_msg($action_type,$category,$itemid,$price,$time,$custom1,'props',$count);
 		}

 	}


	/**
	 * act日志类型,$custom开头的变量为数据中心暂时未使用的字段
	 * @param $main_ref 主来源
	 * @param $sub_ref 副来源
	 */
 	public function act_log_msg($category,$sub_category,$custom1,$custom2,$custom3,$custom4,$count=1,$userinfo=array()){
 		if($userinfo){
 			$this->log_msg_with_userinfo($category,$sub_category,$custom1,$custom2,$custom3,$custom4,'act',$count,$userinfo);
 		}else{
 			$this->log_msg($category,$sub_category,$custom1,$custom2,$custom3,$custom4,'act',$count);
 		}

 	}

	/**
	 * 新手引导日志类型,$custom开头的变量为数据中心暂时未使用的字段
	 * @param $category 主来源
	 * @param $sub_ref 主来源
	 */
 	public function guide_log_msg($category='guide',$step,$custom1,$custom2,$custom3,$custom4,$count=1,$userinfo=array()){
 		if($userinfo){
 			$this->log_msg_with_userinfo($category,$step,$custom1,$custom2,$custom3,$custom4,'guide',$count,$userinfo);
 		}else{
 			$this->log_msg($category,$step,$custom1,$custom2,$custom3,$custom4,'guide',$count);
 		}

 	}


	/**
	 * 登陆日志类型,$custom开头的变量为数据中心暂时未使用的字段
	 * action 数组中允许key
	 *
	 * @param $main_ref 主来源
	 * @param $sub_ref 主来源
	 */
 	public function feed_log_msg($category,$action1,$action2,$uids,$feed_id='',$custom1='',$count=1,$userinfo=array()){
		if(!in_array($category,array('invite','gift','feed'))){
			$this->error_no = 'feed category error!';
			return false;
		}
		if($category=="invite"){
			$action1 = 'plat';
			$action2 = 'inv';
		}
		if($category=="gift"){
			if(!in_array($action1,array('send','rev'))){
				$this->error_no = 'feed action1 error!';
				return false;
			}

		}
		if($category=="feed"){
			$action1 = 'plat';
			$action2 = 'feed';
			if(!$feed_id){
				$this->error_no = 'feed log feed_id error! with qq feed_id is 1,2,3,with facebook feed_id is >3';
				return false;
			}
		}
 		if($userinfo){
 			$this->log_msg_with_userinfo($category,$action1,$action2,$uids,$feed_id='',$custom1='','feed',$count,$userinfo);
 		}else{
 			$this->log_msg($category,$action1,$action2,$uids,$feed_id='',$custom1='','feed',$count);
 		}

 	}

	/**
	 * 加币日志类型,$custom开头的变量为数据中心暂时未使用的字段
	 * 对游戏中用户的游戏货币非付费获得方式进行记录。
	 * @param string $type	加币类型	task=任务奖励 cc=客服接口 install=新安装附赠 free=其他赠送
	 * @param int $num	加/减币金额
	 * @param string $oid	流水号	可以不添加
	 * @param string $action	加或减，默认为加	add或者空为加币 sub为减币
	 */
 	public function currency_log_msg($type,$num,$orderid,$action,$custom1,$custom2,$count=1,$userinfo=array()){
 		if($userinfo){
 			$this->log_msg_with_userinfo($type,$num,$orderid,$action,$custom1,$custom2,'currency',$count,$userinfo);
 		}else{
 			$this->log_msg($type,$num,$orderid,$action,$custom1,$custom2,'currency',$count);
 		}

 	}

	/**
	 * 服务端日志类型,$custom开头的变量为数据中心暂时未使用的字段
	 * 游戏发送服务端信息供数据产品展示。如每5分钟的同时在线信息。
	 * @param string $category	数据大类	自定义
	 * @param string $sub_category	数据分类	自定义
	 * @param int $timestamp	信息时间点	timestamp
	 * @param int $num	数量
	 */
 	public function ser_log_msg($category,$sub_category,$timestamp,$num,$custom1,$custom2,$count=1,$userinfo=array()){
 		if($userinfo){
 			$this->log_msg_with_userinfo($category,$sub_category,$timestamp,$num,$custom1,$custom2,'act',$count,$userinfo);
 		}else{
 			$this->log_msg($category,$sub_category,$timestamp,$num,$custom1,$custom2,'act',$count);
 		}

 	}

	//=======================================================
	public function get_debug(){
            return $this->debug;
        }
        public function send_log($log_info,$type='login'){
            if( !empty($log_info) && $this->_check_sample_status($type)){
                $typeid = $this->getTypeIdByType($type);
                return $this->_send_udp_log($this->uid,$this->rid, $typeid, $log_info);
            }
        }
        /**
         * 检查日志格式
         *
         */
        public function check_log_form( $log_arr ){
            if( empty( $log_arr['game_time'] ) || strlen($log_arr['game_time']) != 10 ){
                $this->error['game_time'] = 'no gametime';
            }
            if( empty( $log_arr['iuid'] ) ){
                $this->error['iuid'] ='no iuid';
            }
            if( !empty( $log_arr['birthday'] ) ){
                if(!ereg("[0-9]{4}-[0-9]{2}-[0-9]{2}", $log_arr['birthday'])){
                    $this->error['birthday'] ='birthday form error';
                }
            }
            if( !empty( $log_arr['sex'] ) ){
                $sex = array(1,2,3);
                if( !in_array( $log_arr['sex'],$sex ) ){
                    $this->error['sex'] ='sex form error';
                }
            }
            if( !empty( $log_arr['app_f_num'] ) && (!is_numeric($log_arr['app_f_num']) )){
                $this->error['app_f_num'] ='app_f_num form error';
            }
            if( !empty( $log_arr['sns_f_num'] ) && (!is_numeric($log_arr['sns_f_num']) )){
                $this->error['sns_f_num'] ='sns_f_num form error';
            }
            if( !empty( $log_arr['grade'] ) && $log_arr['grade'] <= 0){
                $this->error['grade'] ='grade form error';
            }
            if( !empty( $log_arr['exp'] ) && (!is_numeric($log_arr['exp']) )){
                $this->error['exp'] ='exp form error';
            }
            if( !empty( $log_arr['mb'] ) && (!is_numeric($log_arr['mb']) )){
                $this->error['mb'] ='mb form error';
            }
            if( !empty( $log_arr['gb'] ) && (!is_numeric($log_arr['gb']) )){
                $this->error['gb'] ='gb form error';
            }
            if( !empty( $log_arr['vip'] ) && (!is_numeric($log_arr['vip']) )){
                $this->error['vip'] ='vip form error';
            }
            if( !empty( $log_arr['install_date'] ) && strlen($log_arr['install_date']) != 10 ){
                $this->error['install_date'] = 'install_date form error';
            }
            if( empty( $log_arr['ver'] ) ){
                $this->error['ver'] ='no ver';
            }
            if( !empty( $log_arr['entry '] ) && strlen($log_arr['install_date']) > 10 ){
                $this->error['entry'] = 'form error';
            }
        }
	/**
	 * 发送日志的底层函数
	 * @param string $type login,adv,act,login,inv,syslog
	 * @param array() $userinfo
	 *
	 */
	public function log_msg_with_userinfo($str1,$str2,$str3,$str4,$str5,$str6,$count=1,$userinfo=array(),$isDebug=''){
            $uid = '';
            $arr_msg = '';//注意$arr_msg是以|开头的
            $this->check_log_form($userinfo);
            foreach($this->udp_meta as $field){
                if(!empty($userinfo[$field])){
                        $arr_msg .= "|".$userinfo[$field];
                }else{
                        $arr_msg .= "|";
                }
            }
            if(!empty($userinfo['ouid'])){
                    $this->uid = $userinfo['ouid'];
            }
            else{
                    $this->error_no = 'no uid!';
                    return false;
            }

            $log_info = $str1."|".$str2."|".$str3."|".$str4."|".$str5."|".$str6."|".$count.$arr_msg;
            if( $isDebug ){
                if( count( $this->debug ) >= 10 ){
                    array_shift( $this->debug );
                }
                $this->debug[] = date("Y-m-d H:i:s")."|".$log_info;
            }
            return $log_info;
//			var_dump($this->uid, $type, $log_info);echo '<hr />';
                //return $this->_send_udp_log($uid,$this->rid, $typeid, $log_info);
	}

	public function setUid($uid){
		if(!empty($uid)){
			$this->uid = $uid;
		}
	}

	public function get_client_ip(){
		if(isset($_SERVER['HTTP_X_FORWARDED_FOR'])){
			return $_SERVER['HTTP_X_FORWARDED_FOR'];
		}elseif(isset($_SERVER['HTTP_CLIENT_IP'])){
			return $_SERVER['HTTP_CLIENT_IP'];
		}elseif(isset($_SERVER['REMOTE_ADDR'])){
			return $_SERVER['REMOTE_ADDR'];
		}else{
			return "192.168.0.0";
		}
	}

	/**
	 * 发送UPD日志
	 * @param	int		uid		用户id
	 * @param	int	type	表,(gb, prop, mb, user_exp, store_exp 对应的id)
	 * @param	array	msg		消息内容
	 */

	protected function _send_udp_log($uid,$rid, /*int*/ $type, $arr_msg)
	{
		$server_config = $this->_get_udp_log_config();
		if(!$server_config) {
			$this->error_no = 'no config!';
			return false;
		}
		shuffle($server_config);
		$host = $server_config[0]['host'];
		$port = $server_config[0]['port'];
		if(!filter_var($host, FILTER_VALIDATE_IP) || !$port) {
			$this->error_no = 'config error!';
			return false;
		}

		//确定哪个配置
        /*
        if(!isset($this->_type_info[$this->_log_mode][$type])){
			$this->error_no = 'type error!';
			return false;
		}else{
			$tbType = $this->_type_info[$this->_log_mode][$type];
		}
        */
		$tbType = $type;

		$notifyWriteLog= new CCSNotifyWriteLog();
		$notifyWriteLog->m_nUid = $uid;
		$notifyWriteLog->m_shTableType = $tbType;
		$notifyWriteLog->m_strLog = $arr_msg;
		// 1|user,321,gb,add,123		// 增加gb，要归档
		// 0|user,321,mb,sub,123		// 减mb，不归档
		// 1|user,321,prop,123,add,3		// 道具ID123，增加3个，要归档
		// 0|floor,321,exp,add,321				// 不归档
		$notifyWriteLog->encode($body, $bodyLength);

		$cshead = new CCSHead();
		$cshead->nPackageLength = $bodyLength + $cshead->size();

		if(isset($this->_config['fix_header'])&&$this->_config['fix_header']){
            $cshead->nUID = $this->_uid_to_int($uid);
            //这是一个什么东西？为什么要输出这个？ 20131216 by Ryan Wang
			//echo $cshead->nUID ;
		}else{
			$cshead->nUID = $uid;
		}

		$cshead->shFlag = 0;
		$cshead->shOptionalLen = 0;
		$cshead->lpbyOptional = "";
		$cshead->shHeaderLen = $cshead->size();
		$cshead->shMessageID = 0x0010;
		$cshead->shMessageType = 0x03;
		$cshead->shVersionType = 0x03;
		$cshead->shVersion  = 4;
		//$cshead->nPlayerID  = -1;
		//$cshead->nSequence  = 0;
		$cshead->nResourceNum  = $rid;
		$cshead->nTimestamp  = time();

		$cshead->encode($head, $headLength);

		if(!$this->_sockfd){
			$this->_sockfd = socket_create(AF_INET,SOCK_DGRAM,0);
			if(!$this->_sockfd){
				$this->error_no = 'socket error!';
				return false;
			}
		}


		$res = socket_sendto($this->_sockfd,$head.$body,$headLength+$bodyLength+1,0,$host,$port);
		if($res){
			$this->_sendcount++;
		}
		return $res;
	}

	private function _uid_to_int($uid){
		return hexdec(substr(md5($uid),0,2))+1;
	}

	/**
	 * 获取服务器配置列表
	 * @return array 服务器配置列表
	 */
	protected function _get_udp_log_config()
	{
		return $this->_config['server'];
	}

	/**
	 * 设置upd日志服务器的配置
	 */
	public function set_udp_log_config($key,$config){
		$this->_config[$key] = $config;
	}

	/**
	 * 设置日志类型
	 */
	public function set_log_type($type_info){
		$this->_type_info = $type_info;
	}

	public function get_log_type(){
		return $this->_type_info;
	}

	public function get_last_error(){
		return $this->error_no;
	}

	protected function _set_error($error_no){
		$this->error_no = $error_no;
	}

	/**
	 * 获取抽样配置列表
	 * @return array 抽样配置列表
	 */
	protected function _get_sample_config($type){
		$config = array();
		if(isset($this->_config['sample'][$type])){
			$config = $this->_config['sample'][$type];
		}
		return $config;
	}

	/**
	 * 检查日志是否符合采样规则
	 * @param string $type 日志类型
	 * @return bool 必须返回
	 */
	protected function _check_sample_status($type){
		$sample_config = $this->_get_sample_config($type);
		if(!empty($sample_config)){
			$ret = false;
			if($sample_config['method']==='mod'){
				$hash = (hexdec($this->uid)%$sample_config['param'][0]);//取uid取模16
				if($hash==$sample_config['param'][1]){
					$ret = true;
				}
			}elseif($sample_config['method']==='md5'){
				$hash = hexdec(substr(md5($this->uid),0,6))%$sample_config['param'][0];//取uid取模16
				if($hash==$sample_config['param'][1]){
					$ret = true;
				}
			}else{
				$ret = call_user_func_array(array($this,$sample_config['method']),$sample_config['param']);
			}
			return $ret;
		}else{
			return true;
		}
	}

	/**
	 * 用户自定义抽样规则
	 * @param mixed $param 从配置文件中获得的参数
	 * @return bool 必须返回值
	 */
	protected function sample_rule_method($param){
		return false;
	}

	/**
	 * 获得调用的类名，主要在5.2实现Late Static Bindings
	 */
	static protected function get_called_class(){
		if(function_exists('get_called_class')) {
			return get_called_class();
		}else{
			$bt = debug_backtrace();
		    $l = 0;
		    do {
		        $l++;
		        $lines = file($bt[$l]['file']);
		        $callerLine = $lines[$bt[$l]['line']-1];
		        preg_match('/([a-zA-Z0-9\_]+)::'.$bt[$l]['function'].'/',
		                   $callerLine,
		                   $matches);

		       if ($matches[1] == 'self') {
		               $line = $bt[$l]['line']-1;
		               while ($line > 0 && strpos($lines[$line], 'class') === false) {
		                   $line--;
		               }
		               preg_match('/class[\s]+(.+?)[\s]+/si', $lines[$line], $matches);
		       }
		    }
		    while ($matches[1] == 'parent'  && $matches[1]);
		    return $matches[1];
		}
	}
}
