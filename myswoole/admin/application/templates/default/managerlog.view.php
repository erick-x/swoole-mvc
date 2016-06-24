<?php
$insert_html = Page_Lib::loadJs('managerlog');
echo Page_Lib::head($insert_html);
?>
<!-- 站内导航 -->
<div id="content-header">
        <h1>后台操作日志查询</h1>
 <!-- 页面按钮集合 -->

</div>
<div id="breadcrumb">
        <a href="/index/index" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
        <a href="#" class="current">后台操作日志查询</a>
</div>
<!-- 站内导航 结束 -->
<div class="container-fluid">	
<!-- 查询组件 begin-->
<div class="widget-box">
<div class="widget-title">
    <span class="icon">
    <i class="icon-search"></i>
    </span>
    <h5>查询条件</h5>
</div>
    <div class="widget-content">			
        <form  method="GET" class="form-horizontal" >         
                <div class="control-group">
			<div class="controls">                           
                            <input type="text" class="datetimepicker form-control" placeholder="创建日期"  name="createTime" style="width:auto;"/>
                            <span class="add-on"><i class="icon-th "></i></span>
                            <input type="text" class="datetimepicker form-control" placeholder="结束时间"  name="endtime" style="width:auto;"/>
                            <input  name="account" placeholder="管理员" class="form-control" style="width:auto;">
                        <button class="btn btn-primary" type="submit" id="btn_date"><i class="icon-search icon-white"></i> 查询</button>
                        </div>
                </div>                
            </form>       
    </div>
</div>

<!-- 查询组件 end-->
    <div class="row-fluid">
    <div class="widget-box">
<?php if(is_array($logs) && !empty($logs)):?>
<div class="widget-content nopadding">
<table class="table table-striped table-bordered table-hover">
    <tr>
        <td style="text-align: center;" >添加时间</td>
        <td style="text-align: center;">平台</td>
        <td style="text-align: center;">区服</td>
        <td style="text-align: center;">区服IP</td>
        <td style="text-align: center;">添加账户</td>
        <td style="text-align: center;" >日志详情</td>
    </tr>
<?php foreach ($logs as $log):?>
    <tr>
        <td style=" text-align: center;"><?php echo $log['f_addtime'];?></td>
        <td style=" text-align: center;"><?php echo $log['f_platform'];?></td>
        <td style=" text-align: center;"><?php echo $log['f_sid'];?></td>
        <td style=" text-align: center;"><?php echo $log['f_ip'];?></td>
        <td style=" text-align: center;"><?php echo $log['f_account'];?></td>
        <td style=" text-align: center;"><?php echo $log['f_desc'];?></td>
    </tr>
<?php endforeach;?>

</table>
</div>
<?php endif;?>
<!-- 分页组件 begin -->
 <div class="row center" style="text-align: center;">	
<?php echo htmlspecialchars_decode($pagehtml);?>
</div>
<!-- 分页组件 end -->
</div>
</div>
</div>
<?php echo Page_Lib::footer(); ?>
