<?php
$insert_html = Page_Lib::loadJs('bootstrap-datetimepicker.min');
$insert_html .= Page_Lib::loadJs('bootstrap-datetimepicker.zh-CN');
$insert_html .= Page_Lib::loadCss('bootstrap-datetimepicker.min');
echo Page_Lib::head($insert_html);

?>
<!-- 站内导航 -->
<div id="content-header">
<h1>Dashboard</h1>
</div>
<div id="breadcrumb">
    <a href="/index/index" title="跳到首页" class="tip-bottom"><i class="icon-home"></i> 首页</a>
    <a href="#" class="current">玩家注册转化率</a>
</div>
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
                            <input type="text" class="datetimepicker form-control" placeholder="起始日期"  name="beginTime" style="width:auto;"/>
                        <span class="add-on"><i class="icon-th "></i></span>

                            <input type="text" class="datetimepicker form-control"  placeholder="结束日期"  name="endTime" style="width:auto;" />
                        <span class="add-on"><i class="icon-th "></i></span>
                        <button class="btn btn-primary" type="submit" id="btn_date"><i class="icon-search icon-white"></i> 查询</button>
                        </div>
                    </div>
                
            </form>  
    </div>
</div>
 <!-- 查询组件 end-->
            
	  <!-- 表格 正文 -->
            <div id="tab" class="tab-pane active">
		<table class="table table-bordered table-striped">
		<thead>
                <tr>
                    <th>日期</th>
                    <th>新增设备数</th>											
                    <th>新增帐号数</th>
                    <th>帐号注册转化率</th>
                    <th>未创帐号数</th>	
                    <th>未创帐号率</th>	
                    <th>未创角数</th>
                    <th>未创角率</th>													
                    <th>注册流失率</th>															
		</tr>
		</thead>
		<tbody>
                 <?php if(!empty($data)):?> 
                    <?php for($i =0; $i < count($data);$i++):?>
                    <tr>
                        <td> <?php echo $data[$i]['datetime'];?></td>
                        <td> <?php echo$data[$i]['addphone'];?></td>
                        <td> <?php echo $data[$i]['addaccount'];?></td>
                        <td> <?php echo $data[$i]['addaccountrate'].'%';?></td>
                        <td> <?php echo $data[$i]['reduceaccount'];?></td>
                        <td> <?php echo $data[$i]['reducerate'].'%';?></td>
                        <td> <?php echo $data[$i]['reducerole'];?></td>
                        <td> <?php echo $data[$i]['reducerolerate'].'%';?></td>
                        <td> <?php echo $data[$i]['regfailrate'].'%';?></td>
                    </tr>
                    <?php endfor;?>
                  <?php endif;?>
		</tbody>
		</table>							
		</div>	
</div>
<!-- 表格 end -->
 <?php echo Page_Lib::footer();?>
