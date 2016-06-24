<?php
echo Page_Lib::head();
?>
<!-- 站内导航 -->
<div id="content-header">
    <h1>后台基本操作</h1>
     <div class="btn-group">        
	<!--<a class="btn btn-large btn-default tip-bottom" title="账号类型更改" data-toggle="modal" data-backdrop="static" data-target="#forbidTalkModal" id="forbidtalkbtn"><i class="icon-ban-circle"></i> 禁言操作</a>-->
	 </div>
</div>
 <div id="breadcrumb">
    <a href="/index/index" title="跳到首页" class="tip-bottom"><i class="icon-home"></i> 首页</a>
    <a href="#" class="current">账号超级设置</a>
 </div>
<div class="widget-content">
<?php 
echo Page_Lib::Account_replace();
?>
</div>
 
<?php echo Page_Lib::footer(); ?>
 

