<?php
class Curl {
	var $headers;
	var $user_agent;
	var $compression;
	var $cookie_file;
	var $proxy;
	var $IP;

	public function set_ip( $ip )
	{
		$this->IP = $ip;
		if( $ip )
		{
// 			$this->headers[] = "X-FORWARDED-FOR:{$ip}";
// 			$this->headers[] = "CLIENT-IP:{$ip}";
		}
	}

	function __construct($cookies=TRUE,$cookie='cookies.txt',$compression='gzip',$proxy='') {
		$this->headers[] = 'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8';
		$this->headers[] = 'Accept-Language: zh-cn,zh;q=0.8,en-us;q=0.5,en;q=0.3';
		$this->headers[] = 'Connection: Keep-Alive';
		$this->headers[] = 'Content-type: application/x-www-form-urlencoded;charset=UTF-8';

		$this->user_agent = 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:16.0) Gecko/20100101 Firefox/16.0 FirePHP/0.7.1';
		$this->compression=$compression;
		$this->proxy=$proxy;
		$this->cookies=$cookies;
		if($this->cookies == TRUE) $this->cookie($cookie);
	}

	function cookie($cookie_file) {
		if (file_exists($cookie_file)) {
			$this->cookie_file=$cookie_file;
		} else {
			$fb = fopen($cookie_file,'w') or $this->error('The cookie file could not be opened. Make sure this directory has the correct permissions');
			$this->cookie_file=$cookie_file;
			fclose($fb);
		}
	}

	function get($url) {
		$process = curl_init($url);
		curl_setopt($process, CURLOPT_HTTPHEADER, $this->headers);
		curl_setopt($process, CURLOPT_HEADER, 0);
		curl_setopt($process, CURLOPT_USERAGENT, $this->user_agent);
		if ($this->cookies == TRUE) curl_setopt($process, CURLOPT_COOKIEFILE, $this->cookie_file);
		if ($this->cookies == TRUE) curl_setopt($process, CURLOPT_COOKIEJAR, $this->cookie_file);
		//         curl_setopt($process,CURLOPT_ENCODING , $this->compression);
		curl_setopt($process, CURLOPT_TIMEOUT, 5);
		if ($this->proxy) curl_setopt($cUrl, CURLOPT_PROXY, 'proxy_ip:proxy_port');
		curl_setopt($process, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($process, CURLOPT_FOLLOWLOCATION, 1);
		$return = curl_exec($process);
		curl_close($process);
		return $return;
	}
	function post($url,$data=array(),$referer='')
	{
		$curl = curl_init($url);
		curl_setopt($curl, CURLOPT_HTTPHEADER, $this->headers);
		curl_setopt($curl, CURLOPT_USERAGENT, $this->user_agent);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($curl, CURLOPT_COOKIEJAR, $this->cookie_file);
		curl_setopt($curl, CURLOPT_COOKIEFILE, $this->cookie_file);
		if(isset($data))
		{
			curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'POST');
			curl_setopt($curl, CURLOPT_POST, TRUE);
			curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
			curl_setopt($curl, CURLOPT_REFERER,$referer);
		}
                curl_setopt($curl, CURLOPT_TIMEOUT, 5);   
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);

		$return = curl_exec($curl);
		curl_close($curl);
		//         $process = curl_init($url);
		//         curl_setopt($process, CURLOPT_HTTPHEADER, $this->headers);
		//         curl_setopt($process, CURLOPT_HEADER, 1);
		//         curl_setopt($process, CURLOPT_USERAGENT, $this->user_agent);
		//         if ($this->cookies == TRUE) curl_setopt($process, CURLOPT_COOKIEFILE, $this->cookie_file);
		//         if ($this->cookies == TRUE) curl_setopt($process, CURLOPT_COOKIEJAR, $this->cookie_file);
		//         curl_setopt($process, CURLOPT_ENCODING , $this->compression);
		//         curl_setopt($process, CURLOPT_TIMEOUT, 30);
		//         curl_setopt($process, CURLOPT_RETURNTRANSFER, 1);
		//         if ($this->proxy) curl_setopt($process, CURLOPT_PROXY, $this->proxy);
		//         if(isset($post_array))
		//         {
		//         	//curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'POST');
		//         	curl_setopt($process, CURLOPT_POST, TRUE);
		//         	curl_setopt($process, CURLOPT_POSTFIELDS, $data);
		//         	curl_setopt($process, CURLOPT_REFERER,$referer);
		//         }
		// //         curl_setopt($process, CURLOPT_POSTFIELDS, $data);
		// //         curl_setopt($process, CURLOPT_FOLLOWLOCATION, 1);
		// //         curl_setopt($process, CURLOPT_POST, 1);
		//         $return = curl_exec($process);
		//         curl_close($process);
		return $return;
	}
	function error($error) {
		echo "<center><div style='width:500px;border: 3px solid #FFEEFF; padding: 3px; background-color: #FFDDFF;font-family: verdana; font-size: 10px'><b>cURL Error</b><br>$error</div></center>";
		die;
	}
}