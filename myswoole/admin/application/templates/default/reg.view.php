<?php
echo Page_Lib::head($insert_html);
?>
<!-- 站内导航 -->
<div id="content-header">
<h1>Dashboard</h1>
</div>
<div id="breadcrumb">
    <a href="/index/index" title="跳到首页" class="tip-bottom"><i class="icon-home"></i> 首页</a>
    <a href="#" class="current">用户注册</a>
</div>
<div class="container-fluid">
    <div class="row-fluid">
        <div class="span4"></div>
	<div class="span4">	
            <div class="widget-box">
                <div class="widget-title">
                    <span class="icon">
                    <i class="icon-user"></i>
                    </span>
                    <h5>注册</h5>
                </div>
		<div class="widget-content">
                     <form method="POST" onsubmit="return false;" id="regForm">
                <div class="form-group">
                    <label class="col-md-4 control-label">用户名:
                    <input type="text" class="form-control" placeholder="Account" required="" autofocus="" name="account">
                    </label>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label">密&nbsp;&nbsp;码:
                    <input type="password" class="form-control" placeholder="Password" required="" autofocus="" name="pass">
                    </label>
                </div>
                <div class="form-group">
                    <div class="col-md-4"><button class="btn btn-primary btn-lg col-md-2" id="regButton">注&nbsp;&nbsp;&nbsp;册</button></div>
                </div>
                </form>
                </div>
            </div>
        </div>
  </div>
<?php echo Page_lib::footer(); ?>

