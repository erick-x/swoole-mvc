<?php
/**
 * Short description.
 *
 * @version 1.0
 */

class Ucstat
{
	private static $server_ip='192.168.11.145';

	public static function _get_server_ip(){
		/* 0 开发环境
		 * 1 生产环境
		 * 2 测试环境
		 */
		 if(SETDB == 0){
			self::$server_ip = '192.168.78.142';
		 }else{
			self::$server_ip = '192.168.11.145';
		 }
		 return self::$server_ip;
	}

	/**
	 *  统计PV
	 * @param   type    $application  统计的关键字
	 * @return  type    description
	 * @access  public or private
	 * @static  makes the class property accessible without needing an instantiation of the class
	 */
	public static function _statPageView($application,$channel='',$openuid='')
	{
		//load_pub_library('stat/ipaddr');
		
		//1、取页面域名，作为频道名
	    $channel_name = $channel?$channel:(self::_StatGetChannelName());
		
		//2、设置统计关键字
		if($application==''){
			return false;
		}

		//3、取openuid，如果没有，表示没有登录，设置为空
		$client_ip = self::get_client_ip(true);
		if($openuid == ''){
			if(isset($_SESSION['openuid']) && $_SESSION['openuid']!=''){
				$openuid = $_SESSION['openuid'];
			}else{
				$openuid = $client_ip;
			}
		}

		//4、设置用户ip

		//5、取用户所在地址,暂时保留不取
		/* 
		$ipaddr = new Ipaddr();
		
			222.73.127.42	上海市普陀区  
			58.48.152.245	湖北省武汉市
			223.166.16.12	上海浦东新区
			223.255.224.12  印度尼西亚
			222.199.100.22  内蒙古
		
		$area = $ipaddr->get_area("222.199.100.22");
		var_dump($area);exit();
		*/
		//6、取pv来源，如果有的话,暂时保留不取
		//7、取用户网络类型,暂时保留不取
		$msg  = array(
			'time'		  => time(),
			'channelName' => $channel_name,	
			'application' => $application,
			'openuid'	  => $openuid,
			'clientIp'	  => $client_ip,
		);
		$data = array('msg'=>implode(',',$msg),'type'=>'pageview');
                return self::udpSend($data);
	}
    

	
	/**
	 *  统计action
	 * @param   type    $application  统计的关键字
	 * @return  type    description
	 * @access  public or private
	 * @static  makes the class property accessible without needing an instantiation of the class
	 */
	public static function _statAction($application,$channel='',$openuid='')
	{
		//load_pub_library('stat/ipaddr');
		
		//1、取页面域名，作为频道名
	    $channel_name = $channel?$channel:(self::_StatGetChannelName());
		
		//2、设置统计关键字
		if($application==''){
                        __log_message('application is null!\n','stat');
			return false;
		}

		//3、取openuid，如果没有，表示没有登录，设置为空
		$client_ip = self::get_client_ip(true);
		if($openuid == ''){
			if(isset($_SESSION['openuid']) && $_SESSION['openuid']!=''){
				$openuid = $_SESSION['openuid'];
			}else{
				$openuid = $client_ip;
			}
		}

		$msg  = array(
			'time'		  => time(),
			'channelName' => $channel_name,	
			'application' => $application,
			'openuid'	  => $openuid,
			'clientIp'	  => $client_ip,
		);
		$data = array('msg'=>implode(',',$msg),'type'=>'action');
		return self::udpSend($data);
	}

	public static function udpSend($data,$ip='',$port=3000)
	{
		if(empty($data))
		{
			__log_message('data is null!\n','stat');
			return false;
		}
		
		if($ip == ''){
			$ip = self::_get_server_ip();
		}
		$data['time'] = time();
		$data['client'] = self::get_server_ip();
		$socket	= stream_socket_client("udp://{$ip}:{$port}");
		//__log_message("send udp://{$ip}:{$port} !\n",'stat');
		if(!is_resource($socket)){
			__log_message('socket connect failed!\n','stat');
			return false;
		}
		
		if(stream_socket_sendto($socket, json_encode($data)) < 0){
			fclose($socket);
			__log_message('socket send failed!{$ip}:{$port}\n','stat');
			return false;
		}
		fclose($socket);
		return true;
	}	

	/**
	 * 取频道名称
	 * return string
	 **/
	private static function _StatGetChannelName() {
		if (isset($_SERVER['HTTP_HOST'])) {
			list ($channel1,$channel2) = explode('.', $_SERVER['HTTP_HOST']);
			if($channel1 == 'test'){
				$channel = $channel2;
			}else{
				$channel = $channel1;
			}
		} else {
			$channel = NULL;
		}
		$channel = strtolower($channel ? $channel : ( isset( $_SERVER['SERVER_ADDR'] ) ? $_SERVER['SERVER_ADDR'] : 'unknow_channel' ));
		return  $channel;
	
	}

	/**
	 * 获取客户端IP地址
	 * @return string
	 * 参数:
	 *
	 * @param string $proxy_override, [true|false], 是否优先获取从代理过来的地址
	 * @return string
	 *
	*/
	public static function get_client_ip($proxy_override = false)
	{
		if ($proxy_override) {
			/* 优先从代理那获取地址或者 HTTP_CLIENT_IP 没有值 */
			$ip = empty($_SERVER["HTTP_X_FORWARDED_FOR"]) ? $_SERVER["HTTP_CLIENT_IP"] : $_SERVER["HTTP_X_FORWARDED_FOR"];
		} else {
			/* 取 HTTP_CLIENT_IP, 虽然这个值可以被伪造, 但被伪造之后 NS 会把客户端真实的 IP 附加在后面 */
			$ip = empty($_SERVER["HTTP_CLIENT_IP"]) ? NULL : $_SERVER["HTTP_CLIENT_IP"];
		}

		if (empty($ip)) {
			$ip = $_SERVER['REMOTE_ADDR'];
		}

		/* 真实的IP在以逗号分隔的最后一个, 当然如果没用代理, 没伪造IP, 就没有逗号分离的IP */
		if ($p = strrpos($ip, ",")) {
			$ip = substr($ip, $p+1);
		}

		return trim($ip);
	}
	  
	/**
	* 获取服务器端IP地址
	 * @return string
	 */ 
	public static function get_server_ip() { 
		if (isset($_SERVER)) { 
			if($_SERVER['SERVER_ADDR']) {
				$server_ip = $_SERVER['SERVER_ADDR']; 
			} else { 
				$server_ip = $_SERVER['LOCAL_ADDR']; 
			} 
		} else { 
			$server_ip = getenv('SERVER_ADDR');
		} 
		return $server_ip; 
	}

} // end class
?>

