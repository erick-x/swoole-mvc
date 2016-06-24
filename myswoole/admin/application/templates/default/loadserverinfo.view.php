<?php
echo Page_Lib::head();
?>
	<!-- 站内导航 -->
 <div id="content-header">
            <h1>Dashboard</h1>    	       
    </div>
<div id="breadcrumb">
        <a href="/index/index" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
        <a href="#" class="current">Dashboard</a>
</div>
<div class="container-fluid">
<div class="row-fluid">
    <div class="span12 center" style="text-align: center;">				
    <div class="widget-box">

</div>
    </div>
</div>						
<div class="row-fluid">
<div class="widget-content">
<div class="row-fluid">
    <div class="span12">
        <div class="alert alert-info" style="text-align: center;">
                <strong>欢迎进入 Up+ Studio !</strong>
                <a href="#" data-dismiss="alert" class="close">×</a>
        </div>
    </div>
<div class="widget-box">
	<div class="widget-title">
	<span class="icon">
		<i class="icon-th"></i>
		</span>
		<h5>菜单</h5>
	</div>
	<div class="widget-content">			
        <ul class="quick-actions">
    <li><i>
            <a href="/index/index" title="进入" class="tip-bottom"><i class=" icon-search"></i>进入首页</a>
        </i></li>
        <li><i>
           <a href="/gameuser/show" title="进入" class="tip-bottom"><i class="icon-search"></i>玩家基本信息查询</a> 
            </i>
        </li>
        <li><i>
            <a href="/notice/showNotice" title="进入" class="tip-bottom"><i class="icon-search"></i>添加走马灯</a>
            </i>
        </li> 
        <li><i>
            <a href="/loginnotice/showNotice" title="进入" class="tip-bottom"><i class="icon-search"></i>添加登录公告</a>
            </i>
        </li>
       <li><i>
            <a href="/platformnotice/showIndex" title="进入" class="tip-bottom"><i class="icon-search"></i>添加平台公告</a>
            </i>
        </li>
        <li><i>
            <a href="/gameuser/forbidmultrole" title="进入" class="tip-bottom"><i class=" icon-search"></i>玩家封禁</a>
            </i>
        </li>
        <li><i>
            <a href="/active/activeIndex" title="进入" class="tip-bottom"><i class="icon-search"></i>活动创建</a>
            </i>
        </li>
        <li><i>
            <a href="/mail/show" title="进入" class="tip-bottom"><i class="icon-search"></i>邮件创建</a>
            </i>
    </li>
                 
  </ul>          
</div>
</div>			
 <?php echo Page_Lib::footer();?>
