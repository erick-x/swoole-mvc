<?php
//$insert_html = Page_Lib::loadJs('ajaxupload');
$insert_html = Page_Lib::loadJs('platformnotice');

//$insert_html = Page_Lib::loadJs('statdata');
echo Page_Lib::head($insert_html);

?> 
<script type="text/javascript">
<!--
 
//-->
</script>
<!-- 站内导航 -->
<div id="content-header">
<h1>Data Overview</h1>
</div>
<div id="breadcrumb">
    <a href="/index/index" title="跳到首页" class="tip-bottom"><i class="icon-home"></i> 首页</a>
</div>
<div class="container-fluid">

<!-- 查询组件 begin-->

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
        <th>深度玩家</th>     
        <th>老玩家</th>
        <th>PCU</th>
        <th>ACU</th>
        <th>ACU/PCU</th>
        <th>平均在线时长</th>
        <th>充值人数</th>
        <th>充值金额</th>
        <th>Arppu</th>        
        <th>DAU-ARPU</th>
        <th>新玩家充值人数</th>
        <th>新玩家充值金额</th>												
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
                <td style="text-align: center;">
                <?php  
                	$i = 0;                  
	                foreach($register as $var)
	                {    
	                	if($time === $var['create_time'])
	               		{  
	               			echo $var['cont'];
	                	}   
	                	$i++;    						
	                } 
	              $j++;
                ?> 
               </td>
                <td style="text-align: center;"><?php  echo 0; ?></td> 
                <td style="text-align: center;"><?php  echo 0; ?></td>
                <td style="text-align: center;"><?php  echo 0; ?></td> 
                <td style="text-align: center;"><?php  echo 0; ?></td>
                <td style="text-align: center;"><?php  echo 0; ?></td> 
                <td style="text-align: center;"><?php  echo 0; ?></td>
                <td style="text-align: center;"><?php  echo 0; ?></td>
                <td style="text-align: center;"><?php  echo 0; ?></td> 
                <td style="text-align: center;"><?php  echo 0; ?></td>
                <td style="text-align: center;"><?php  echo 0; ?></td> 
                <td style="text-align: center;"><?php  echo 0; ?></td>
                <td style="text-align: center;"><?php  echo 0; ?></td>
              	<td style="text-align: center;"><?php  echo 0; ?></td> 
                <td style="text-align: center;"><?php  echo 0; ?></td>
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
