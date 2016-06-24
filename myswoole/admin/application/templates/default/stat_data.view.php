<?php 
$insert_html = Page_Lib::loadJs('platformnotice'); 
echo Page_Lib::head($insert_html);
?> 
<script type="text/javascript">
<!-- 
//-->
</script>
<!-- 站内导航 -->
<div id="content-header">
<h1>日常数据汇总</h1>
</div>
<div id="breadcrumb">
    <a href="/index/index" title="跳到首页" class="tip-bottom"><i class="icon-home"></i> 首页</a>
</div>
<div class="container-fluid">

<!-- 查询组件 begin-->
<?php 
$register = $dailydata[0];   # 注册
$createnum = $dailydata[1];  # 创号数
$onlineNum  = $dailydata[2]; # 活跃
$iLoginCount = $dailydata[3];# 登录次数
$oldPlayers = $dailydata[4] ;# 老玩家
$PayRoleNum = $dailydata[5] ;# 充值人数
$PayMoneyNum = $dailydata[6];# 充值金额
$Payfrequency = $dailydata[7];#充值次数
$NewPayRole  = $dailydata[8];# 新玩家充值人数
$NewPayMoney= $dailydata[9]; # 新玩家充值金额
?>
<?php echo Page_Lib::statDataOptionsHtml($object,$register);?>
<!-- 查询组件 end-->
<?php //echo $registString;?>
<table id="tableExcel" class="table table-bordered table-striped" >
<thead >
    <tr>
        <th>日期</th>
        <th>注册数</th>											
        <th>创号数</th>
        <th>活跃玩家</th>
        <th>登陆次数</th>
        <th>老玩家</th>
        <th>充值人数</th>
        <th>充值金额</th>
        <th>充值次数</th>
        <th>新玩家充值人数</th>
        <th>新玩家充值金额</th>        
        <th>PCU</th>
        <th>ACU</th>
        <th>ACU/PCU</th>
        <th>平均在线时长</th>
        <th>Arppu</th>        
        <th>DAU-ARPU</th>     
        <th>深度玩家</th> 												
    </tr>
    </thead>
    <tbody>
    <!--统计数据项 begin-->
      <?php  
      $data =array();
      $j = 0;
      if (is_array($object) && !empty($object)): ?>
        <?php foreach ($object as $time): ?>
            <tr>            	
                <td style="text-align: center;"><?php echo $time; ?></td>
                <!-- 注册数量  -->
                <td style="text-align: center;">
                <?php                 	                  
	                foreach($register as $InData){    
	                	foreach($InData as $var){
		                	if($time == $var['create_time']){  
		               			echo $var['cont'];
		                	}
						}            
	                } 
                ?> 
                </td>
                <!-- 创号数量  -->
                <td style="text-align: center;">
                <?php                 	   
	                foreach($createnum as $InData){    
	                	foreach($InData as $var){
		                	if($time == $var['create_time']){  
		               			echo $var['cont'];
		                	}
						}            
	                } 
                ?> 
                </td> 
               <!-- 活跃玩家  -->
                <td style="text-align: center;">
                <?php    
                	$online =0;             	   
	                foreach($onlineNum as $InData){    
	                	foreach($InData as $var){
		                	if($time == $var['create_time'])
		                	{
		                		$online = $var['cont'];  
		               			echo $var['cont'];
		                	}
						}            
	                } 
                ?> 
                </td> 
               <!-- 登录次数  -->
                <td style="text-align: center;">
                <?php 
                                	   
	                foreach($iLoginCount as $InData){    
	                	foreach($InData as $var){
		                	if($time == $var['create_time']){  
		               			echo $var['cont'];
		                	}
						}            
	                } 
                ?> 
                </td>  
                <!-- 老玩家  -->
                <td style="text-align: center;">
                <?php 
                                	   
	                foreach($oldPlayers as $InData){    
	                	foreach($InData as $var){
		                	if($time == $var['create_time']){  
		               			echo $var['cont'];
		                	}
						}            
	                } 
                ?> 
                </td>  
                <!-- 充值人数  -->
                <td style="text-align: center;">
                <?php 
                    $Inpayrole = 0;            	   
	                foreach($PayRoleNum as $InData){    
	                	foreach($InData as $var){
		                	if($time == $var['create_time'])
		                	{
		                		$Inpayrole =  $var['cont'];		                		
		               			echo $var['cont'];
		                	}
						}            
	                } 
                ?> 
                </td>   
                <!-- 充值金额  -->
                <td style="text-align: center;">
                <?php 
                   $InpayMoney = 0;             	   
	                foreach($PayMoneyNum as $InData){    
	                	foreach($InData as $var){
		                	if($time == $var['create_time'])
		                	{
		                		$InpayMoney =  $var['cont'];  
		                		
		               			echo $var['cont'];
		                	}
						}            
	                } 
                ?>  
                </td> 
                 <!-- 充值次数  -->
                <td style="text-align: center;">
                <?php 
                                	   
	                foreach($Payfrequency as $InData){    
	                	foreach($InData as $var){
		                	if($time == $var['create_time']){  
		               			echo $var['cont'];
		                	}
						}            
	                } 
                ?> 
                </td> 
                
                <!-- 新玩家充值人数  -->
                <td style="text-align: center;">
                <?php 
                                	   
	                foreach($NewPayRole as $InData){    
	                	foreach($InData as $var){
		                	if($time == $var['create_time']){  
		               			echo $var['cont'];
		                	}
						}            
	                } 
                ?> 
                </td> 
                 <!-- 新玩家充值金额  -->
                <td style="text-align: center;">
                <?php 
                                	   
	                foreach($NewPayMoney as $InData){    
	                	foreach($InData as $var){
		                	if($time == $var['create_time']){  
		               			echo $var['cont'];
		                	}
						}            
	                } 
                ?> 
                </td> 
              	<td style="text-align: center;"><?php  echo 0; ?></td>
                <td style="text-align: center;"><?php  echo 0; ?></td>
                <td style="text-align: center;"><?php  echo 0; ?></td> 
                <td style="text-align: center;"><?php  echo 0; ?></td>
                <!-- ARPPU -->
                <td style="text-align: center;">
                <?php 
					$arppu = round($Inpayrole/$InpayMoney,2);
                	echo $arppu; 
                ?>
                </td>
                
                <!-- DAU - ARPPU -->
              	<td style="text-align: center;"><?php  echo $online - $arppu; ?></td> 
              	
              	<!-- 深度玩家 -->
                <td style="text-align: center;"><?php  echo 0; ?></td>                
            </tr>
        <?php endforeach; ?>
    <?php endif; ?> 
  
    <tr></tr>
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
