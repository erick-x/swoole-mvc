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
class Kingnet_yunying
{
	protected $ver = 'v5.0.121201';
	protected $uid;//用户外部id
    protected $rid;//日志资源id
	protected $error_no = "";
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
	
	/**
	*  私有化构造函数，防止外界实例化对象
	*/
	protected function __construct($uid,$config){
		$this->init($uid,$config);
	}
		
	/**
	*  私有化克隆函数，防止外界克隆对象
	*/
	protected function  __clone(){}

    protected $udp_meta = array(
    );
	/**
	*  静态方法, 单例统一访问入口
	*  @return  object  返回对象的唯一实例
	*/
	public static function get_instance($uid,$config,$log_mode = null) {
        $class_name = self::get_called_class();
        if (empty(self::$_instance[$class_name][$uid])||!(self::$_instance[$class_name][$uid] instanceof $class_name)) {

            //var_dump($class_name);
            self::$_instance[$class_name][$uid] = new $class_name($uid,$config);
        }
        return self::$_instance[$class_name][$uid];
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
	
	public function init($uid,$config){
		$this->_config = $config;
		$this->forbid = false;
		$this->error_no = 0;
		$this->uid = $uid;//外部id
		$this->rid = $config['rid'];
		//$this->logname=date('Ymd').".log";
		$this->userip = $this->get_client_ip();
		$this->daytime = time();
		//$this->get_userinfo();//获得用户信息
		$this->_sendcount = 0;
        $this->init_table_type($config['type_info']);
        $this->_serverId = $config['server_id'];
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

    public function setMeta( $meta=array() )
    {
        if( !empty( $meta ) )
        {
            $this->udp_meta = $meta;
        }
    }

    /**
     * @param array $meta 传的每位信息
     * @param array $userinfo 传的信息
     */
    public function meta_log_msg( $log_type , $userinfo = array() )
    {

        $data = array();
        ksort( $this->udp_meta[$log_type] );
        foreach( $this->udp_meta[$log_type] as $index=>$meta )
        {
            $data[$index] = $userinfo[$meta];
        }
        $typeid = $this->getTypeIdByType($log_type);
        $log_info = implode( '|' , $userinfo );
        var_dump($log_info);exit;
        return $this->_send_udp_log($this->uid,$this->rid, $typeid, $log_info);


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
        //var_dump(hexdec(substr($uid,-4)));
        if(isset($this->_config['fix_header'])&&$this->_config['fix_header']){
            $cshead->nUID = hexdec(substr($uid,-2))+1;
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
