<?php
$insert_html = DataStatPage_Lib::loadJs('platformnotice');
echo DataStatPage_Lib::head($insert_html);
?> 
<script type="text/javascript">
<!--
 
//-->
</script>
<!-- 站内导航 -->
<div id="content-header">
<h1>充值金额比例</h1>
</div>
<div id="breadcrumb">
    <a href="/index/index" title="跳到首页" class="tip-bottom"><i class="icon-home"></i> 首页</a>
</div>
<div class="container-fluid">

<!-- 查询组件 begin-->						      
<?php 

# contentType 1 充值信息及角色部分信息统计  2充值比例信息统计
$contentType= $object[6]; 
$time = $object[0];	# 时间列表（通过前段设定首末时间列出日期列表）
$type = $object[5]; # type 2 安卓混服 1 应用宝
 
$register = $object[3]; # 角色注册统计
$dau = $object[2];	    # 角色DAU统计
$payrole = $object[4];  # 角色充值统计
$payal = $object[1];    # 区服所有充值成功角色充值信息统计
$totalPay = isset($object[7])?$object[7]:"";#累计充值>=1000角色信息
//var_dump($payrole);
echo DataStatPage_Lib::StatRechargeGoldHtml($time,$dau,$register,$payrole,$payal,$type,$contentType,$totalPay);

if($contentType == 2)
{
	$Interval = !empty($object[3])?$object[3]:array(0);# 充值区间
	$totalPay = !empty($object[1])?$object[1]:array(0);# 累计支付总额
	$scalePay = !empty($object[2])?$object[2]:array(0);# 充值比例额度
} 
?>
<!-- 查询组件 end-->
<?php 
	if(isset($contentType) && $contentType == 2 )
	{	
		$countTime = count($time) - 1;
		echo "<div align='center'>";
		echo '查询区间: '.$time[$countTime]." 至 ".$time[0]."<br>";
		//var_dump($totalPay);
		foreach ($totalPay as $Intotal){
			foreach($Intotal as $var)
			{
				$sid = $var['user_sid'];
				$sidRoleNum[$sid] =  $var['controle'];
				echo ' 区服: '.$var['user_sid'].' 区间总充值人数：'.$var['controle'].' 区间总充值RMB: '.$var['money']."<br>";
			}	
		}
		echo "</div>"; 
	}
?>
<table id="tableExcel" class="table table-bordered table-striped" >
<thead >
	<tr> 
	 <!-- 充值info -->  			
	<?php if(isset($contentType) && $contentType ==1):?>
		<th>日期</th>          
        <th>注册数</th>											
        <th>DAU</th>
        <th>付费</th>         										
    <?php endif; ?>
    
    <!-- 充值比例 begin -->    
    <?php if(isset($contentType) && $contentType ==2): ?>    	 	       
        <th>充值RMB</th>
        <?php  foreach($Interval as $key=>$var):?>
        <th><?php echo $var;?></th>
        <?php endforeach;?>              
    <?php endif;?>
    <!-- 充值比例 end -->
    </tr> 
    </thead>
    <tbody>
    <!--统计数据项充值比例  begin-->
    <?php if(!empty($scalePay) && $contentType ==2):?>
    		<tr>
    		 <td style="text-align: center;">人数</td>
    		 <?php 
    		 foreach($Interval as $var)
    		 {	
    		 	echo "<td>"; 	
	    		 foreach($scalePay as $Inscale)
	    		 { 
    		 		foreach($Inscale as $vad)
    		 		{ 
    		 			if(!$vad['user_sid'])
    		 			{
    		 				 continue;
    		 			}	 
    		 			if($vad['entry'] == $var){ 
								echo "区服：".$vad['user_sid'].'人数: '.$vad['controle']." RMB: ".$vad['money']."<br>";
    		 			}  
    		 			continue; 
    		 		} 
	    		 }
	    		 echo "</td>";
    		 }
    		 ?>    		 
    		 </tr> 
	    	 <tr>
    		 <td style="text-align: center;">比例</td>
    		 <?php 
    		//var_dump($sidRoleNum);
    		 foreach($Interval as $var)
    		 {	
    		 	echo "<td>"; 	
	    		 foreach($scalePay as $Inscale)
	    		 { 
    		 		foreach($Inscale as $vad)
    		 		{ 
    		 			if(!$vad['user_sid']){continue;}	 
    		 			if($vad['entry'] == $var)
    		 			{ 
    		 					$sid = $vad['user_sid'];
    		 					$number = ($vad['controle']/$sidRoleNum[$sid])*100;#人数比例:区的总人数/区间的比例人数*百分之百
								echo "区服：".$vad['user_sid'].'比例: '.$number.'%'."<br>";
    		 			} 
    		 			continue;
    		 		} 
	    		 }
	    		 echo "</td>";
    		 }
    		 ?>    		 
    		 </tr> 
    <?php endif;?>
    <!-- 统计数据项充值比例  end -->
    
    <!-- 充值部分数据  begin -->
      <?php     
      $data =array();$j = 0;     
      if (is_array($object) && !empty($object) && $contentType == 1): 
      ?>
        <?php foreach ($object[0] as $time): ?>
            <tr>            	
                <td style="text-align: center;"><?php echo $time; ?></td>
                <td style="text-align: center;">
                <?php  
                	if(isset($register) && !empty($register) && count($register[0])>0){                  
	                foreach($register as $var)
	                {    
	                	foreach($var as $var)
	                	{ 
		                	if($time === $var['datetime'])
		               		{    
		               			echo "区服:".$var['iworld']." 注册数量：".$var['roleid']."<br>"; 
		                	}		                
	                	}             
	                } 
                } 
                ?> 
               </td>
                <td style="text-align: center;"><?php  
				if(isset($dau) && !empty($dau) && count($dau[0])>0){	
                foreach($dau as $var)
	                {    
	                	foreach($var as $var)
	                	{ 
		                	if($time === $var['datetime'])
		               		{  
		               			echo "区服:".$var['iworld']." DAU：".$var['roleid']."<br>";	
		                	}
		                	$i++;
	                	}             
	                } 
				} 
                ?></td> 
                <td style="text-align: center;"><?php               
                if(isset($payrole) && !empty($payrole) && count($payrole[0])>0){
                   	 
					foreach($payrole as $var)
	                {    
	                	foreach($var as $var)
	                	{   
		                	if($time === $var['order_time'])
		               		{  
		               			echo "区服:".$var['user_sid']." 充值金额：".$var['money']."付费人数：".$var['rolenum']."<br>";	
		                	} 
	                	}           
	                } 
                }               
                ?></td>
            </tr>
        <?php endforeach; ?>
    <?php endif; ?>  
    <!-- stat data end -->
    </tbody>
</table>							
</div>
<!-- 分页组件 begin -->
<div class="row center" style="text-align: center;">	
<?php  echo htmlspecialchars_decode($pagehtml);?>
</div>
<!-- 分页组件 end -->
<?php echo Page_Lib::footer();?>
