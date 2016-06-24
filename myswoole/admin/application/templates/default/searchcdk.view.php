<?php
$insert_html = Page_Lib::loadJs('cdk');
echo Page_Lib::head($insert_html);
?>
<!-- 站内导航 -->
<div id="content-header">
    <h1>后台基本操作</h1>
        <div class="btn-group">        
    </div>
</div>
 <div id="breadcrumb">
    <a href="/index/index" title="跳到首页" class="tip-bottom"><i class="icon-home"></i> 首页</a>
    <a href="#" class="current">礼包码查询</a>
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
    <div class="widget-content" >			
        <form  method="post" class="form-horizontal" id="CDKForm" onsubmit="return false;" >         
                <div class="control-group">
			<div class="controls">
                            <select name="selPlatform" class="form-control" id="selPlatform">
                                <option value="">请选择平台</option>
                                <?php if (is_array($platform) && !empty($platform)):?>
                                 <?php   foreach ($platform as $server):?>
                                 <?php   echo  '<option value="' . $server['platform_id'] . '">'. $server['platform_name'] . '</option>';?>
                                <?php endforeach;?>
                                <?php endif;?>
                            </select>
                            <select name="selServer"class="form-control" id="selServer">
                                <option value="">请选择区服</option>
                            </select>
                            <input  name="cdk" placeholder="礼包码" class="form-control" style="width:auto;">
                            <button class="btn btn-primary" id="cdkBtn"><i class="icon-search icon-white"></i> 查询</button>
                        </div>
                    </div>                
            </form>       
    </div>
</div>

<!-- 查询组件 end-->
<div class="row-fluid">
 <table class="table table-striped table-bordered"> 
     <thead>
        <th style="text-align: center;" >生效时间</th>
        <th style="text-align: center;">结束时间</th>
        <th style="text-align: center;">激活码</th>
        <th style="text-align: center;">状态</th>
    </thead>
    <tbody id="show">        
    </tbody>
 </table>  
</div>
</div>
<?php echo Page_Lib::footer(); ?>
