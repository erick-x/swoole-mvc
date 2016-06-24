<?php 
echo Page_Lib::head($insert_html);
$page = Config::get("common");
?>
<div id="content-header">
	<h1>Up+ Studio Admin test</h1>
</div>
<div id="breadcrumb">
        <a href="user/login" title="Login" class="tip-bottom"><i class="icon-home"></i> Login</a>
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
                            <h5>登陆</h5>
			</div>
		<div class="widget-content">
                    <form class="form-horizontal" id="loginForm" action="<?php echo $page['host']?>/user/userLogin" method="Post" onsubmit="return false">
                        <div class="control-group" >
                            <div class="controls-row">
                                <div class="span2"></div>
                                <div class="input-prepend span10" >
                                <span class="add-on"><i class="icon-user"></i></span>
                                <input type="text" class="form-control" placeholder="Account" required="" autofocus="" name="account" >
                              </div>
                            </div>
                        </div>
                        <p></p>
                        <div class="control-group">
                            <div class="controls-row">
                               <div class="span2"></div>
                                <div class="input-prepend span10">
                              <span class="add-on"><i class="icon-lock"></i></span>
                              <input type="password" class="form-control " placeholder="Password" required name="pass" >
                                </div>				
                            </div>
                        </div>
                         <div class="control-group">
                            <div class="controls-row">
                               <div class="span2"></div>
                                <div class="span10">
                                    <label class="pull-left">
                                        <span class="add-on"><input type="checkbox" value="1" name="remember">记&nbsp住</span>
                                    </label>
                                    <label class="pull-right">
                                        <button class="btn btn-lg btn-primary" type="submit">登&nbsp录</button>
                                        &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                                    </label>
                                    
                                </div>				
                            </div>
                        </div>
			
                       </div>
                    </form>
           

          <!--  <a href="#" class="text-center new-account">Create an account </a> -->
                </div>
            </div>
        </div>
    </div>
		  	
<?php echo Page_Lib::footer()?>