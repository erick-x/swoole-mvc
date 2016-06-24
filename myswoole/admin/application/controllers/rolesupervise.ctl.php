<?php
class rolesupervise_Controller extends Module_Lib {
	
   /**
	* Index by liumingjie add 2015-08-12 入口函数加载视图
	**/
	public function supervise()
	{  
		$this->load_view("role_supervise");
	}  
	
	/**
	 * 文件上传解析 获取文件内容 此函数通过js去submit
	 * 文件路径为www/static/js/usersupervise.js 
	 **/
    public function uploadfile() 
    {
        $pathname = $_FILES['myfile'];
        $filename = time(0)."_".$pathname['name'];
        $filepath = '/tmp/'.$filename;// linux tmp
        #$filepath = $_SERVER['DOCUMENT_ROOT'].'/'.$filename;
        $data = null;
        
        if(is_uploaded_file($pathname['tmp_name']))
        {
          if(! move_uploaded_file($pathname['tmp_name'],$filepath))//上传文件，成功返回true    
          {
              $this->outputJson(-1,"上传失败");
          }
        }else
        {
            $this->outputJson(-1,"非法上传文件");
        } 
        $ext = pathinfo($pathname['name'], PATHINFO_EXTENSION | PATHINFO_FILENAME);  
        if(trim($ext) != "txt" && trim($ext) != "xml")
        {
            $this->outputJson(-1,"文件格式错误");
        }
        if(trim($ext) == "txt" )
        {
            $file= file_get_contents($filepath);
            $filecontent = explode("\n", trim($file));
            $j = 0;
            for($i = 0 ;$i < count($filecontent); ++$i)
            {
                $tmp = explode(" ", trim($filecontent[$i]));
                if(count($tmp) == 2)
                {
                    $data[$j]["id"]  =  $j;
                    $data[$j]["sid"] =  $tmp[0];
                    $data[$j]["roleid"] = $tmp[1];  
                    $j++;
                } 
            }
        }
        if(trim($ext) == "xml")
        {
            $data = array(array());
             try {
                    $lists = simplexml_load_file($filepath);  //载入xml文件 $lists和xml文件的根节点是一样的
                    } catch (Exception $ex) {
                        $this->outputJson(-1,"加载配置失败");
                    }

                    if(empty($lists))
                    {
                        $this->outputJson(-1,"读取配置失败");
                    }

                    $i = 0;
                    foreach($lists->RoleConfig as $table){     //有多个user，取得的是数组，循环输出
                     $data[$i]["id"]="$table->id";
                     $data[$i]["sid"]="$table->sid";
                     $data[$i]["roleid"]="$table->roleid";
                     $i++;
                    }
        }  
        //删除所上传的文件
        @unlink ($filepath); 
        
        $this->outputJson(0,$data);
    }
     
    /**
     * _____________________________________________________________________________________ 
     * Set account blockade  by liumingjie add 2015-08-18
     * @ save 在角色封锁解除以及禁言等去执行此函数
     * @ __log_message();日志
     * @ $data = Rolesupervise_Model::get_region($region_id);
     * 其实如果是获取平台以及是所配置的角色区服库名配置表大可不比一直进行切换db连接
     * 只有在有些数据并非在一个db连接上面才可以切换比如设置的accout 的uin封号设置是需要进行切换的
     * 其次是通过角色ID找到他的uin也是需要进行切换db的
     * _____________________________________________________________________________________ 
     **/
    public function save()
    {      	 
        $platform = Helper_Lib::getCookie('zoneid');//获取平台ID
		
        //$platform = ;
        
        $outdata  = null; // 返会数据
        
        $global_platform = 1; // 定义唯一的平台ID
        
        $forbidtype = $_POST['forbidtype']; // 操作类型 1-永久锁定  2-普通  0-解锁
        $rolemode = new Rolesupervise_Model($platform);
        $GameuserServer = new  Gameuser_Service();

		//$ServerService  = new  Server_Service();
                        
        $stServer =  $rolemode->getPlatformByID($global_platform); //get global database info 
        if(empty($stServer))
        {
            $this->outputJson(-2, '平台错误，请重新登录！');
        }  
        if(empty($_POST['listroleid']))
        {
            $this->outputJson(-1, '请选择封号用户！');
        } 
        #解析upload file get file(txt) data info actions is usersupervise.js
        $listrole = explode(',',$_POST['listroleid']);#第一列区服ID 第二列角色ID 		
        $j = 0;
        for($i = 0; $i < count($listrole);$i+=2)
        {  
        	$region_id  = trim($listrole[$i+1]); //获取上传文件区ID
        	
        	$roleid 	= trim($listrole[$i]);	//获取上传文件角色ID
        	
        	#首先根据区服ID找到所对应的那个库然后根据角色找到他所属的uin			  
        	$regioninfo = $rolemode->get_region($global_platform,$region_id); 
			
        	if(empty($regioninfo))
        	{
        		__log_message($regioninfo['dbIdentifier']);
        		
        		$this->outputJson(-1, '没有获取到对应区服！');
        	} 
        	#拼接区服 区服标识符+区服编号//获取正式服要进行区服标识符与编号进行调整一下位置
        	//$dbname = $region_id.trim($regioninfo['dbIdentifier']);
        	 $dbname = trim($regioninfo['dbIdentifier']);       	 
        	
        	#$platform 可以改为默认的  	
        	$uin  = $rolemode->get_role_uin($dbname,$roleid,$platform); // 获取全局唯一ID 角色uin(通过角色ID找到uin) 

        	__log_message("uin::::".$uin['uin']);
        	$data = array('state' => $_POST['forbidtype']); // 获取锁定状态
        	
        	 $rolemode->set_uin($uin['uin'],$data,$platform);// 通过获得到的uin设置账号 
			
			 
        	/**$ret =
			if (!$ret) 
            {
                $flag[$i] = $listrole[$i]; 
            }
            else{
				$outdata[$i]["id"] = "$i";
				$outdata[$i]["sid"]  = "$region_id";
				$outdata[$i]["roleid"] = "$roleid";
			    $outdata[$i]["status"] = "$forbidtype";//操作类型
            }**/
             #后期上传linux server 添加此代码 是与服务端进行通讯的                 
        	try{
                 $data = array(
                    'roleuin'   => $roleid,
                    'starttime' => 0,
                    'endtime'   => 0,
                    'forbidtype'=> $forbidtype,
                    'type'	    => 1,
                    'talktime'  => 0,
                    'worldid'   => $region_id,
                    'account'   => $_SESSION['account'],
                ); 
                 
                $ret = $GameuserServer->ForbidRole($regioninfo,$data);
                
				if(empty($ret)){
					__log_message($regioninfo['zoneserver_ip'].'ippp__'.$regioninfo['zoneserver_port']);					 
				} 
                
                if (!$ret) 
				{
					$flag[$i] = $listrole[$i]; 
				}
				else{
					$outdata[$i]["id"] = "$i";
					$outdata[$i]["sid"]  = "$region_id";
					$outdata[$i]["roleid"] = "$roleid";
					$outdata[$i]["status"] = "$forbidtype";//操作类型
				}
            } catch (Exception_Lib $e) {
            	__log_message($e->getCode());
                $this->outputJson($e->getCode(), $e->getMessage());
            }   
			$j++;
        } 
        
   		if(count($flag)==0)
        {   unset($_POST['forbidtype']);
			 
            $this->outputJson(0,$outdata);
        }else
        {
            $this->outputJson(-1, '未成功的有！'.  implode(',', $flag));
        }
   
    }
    public function load(){
    
    }
	/*__________________________________________________________________________________*/ 
     
}
