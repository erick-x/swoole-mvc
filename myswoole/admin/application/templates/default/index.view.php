<?php
echo Page_Lib::head();
?>
	<!-- 站内导航 -->
        <div id="content-header">
                <h1>Dashboard</h1>
        </div>

        <div id="breadcrumb">
                <a href="/index/index" title="跳到首页" class="tip-bottom"><i class="icon-home"></i> 首页</a>
                <a href="#" class="current">Dashboard</a>
        </div>
	<!-- 站内导航 结束 -->
	<div class="container-fluid">	
                <div class="row-fluid">
                     <div class="span12">
			<div class="alert alert-info">
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
<?php
    $nav_left = Menu_Service::createNavbar($_SESSION['udata']['navbar_permission']);
    echo $nav_left;
?>
</ul>
</div>	
</div>
</div>
</div>
<?php echo Page_Lib::footer();?>