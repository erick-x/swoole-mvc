<?php
echo Page_Lib::head();
?>
<div id="content-header">
    <h1>网络请求失败</h1>
</div>
 <div id="breadcrumb">
    <a href="/index/index" title="跳到首页" class="tip-bottom"><i class="icon-home"></i> 首页</a>
  <a href="#" class="current">网络错误</a>  
 </div>
<div class="container-fluid">
 
        <div class="widget-box">
                        <div class="widget-title">
                                <span class="icon">
                                        <i class="icon-th-list"></i>
                                </span>
                                <h5>Notifications</h5>
                        </div>
                        <div class="widget-content">
                                <div class="alert alert-error alert-block">
                                        <a class="close" data-dismiss="alert" href="#">×</a>
                                        <h4 class="alert-heading">Connect Error!</h4>
                                       网络请求失败，不要伤心！
                                </div>
                           <a href="/index/index" class="btn btn-large btn-primary ">返回登录界面</a>
                        </div>
                
                </div>
    </div>
<?php
echo Page_Lib::footer()?>