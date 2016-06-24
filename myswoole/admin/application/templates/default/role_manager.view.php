<?php
$insert_html = '<script src="'.Page_Lib::getJsHost().'/role.js"></script>';
echo Page_Lib::head($insert_html);
$page = Config::get("common");
?>
	<!-- 站内导航 -->
	<div id="content-header">
	<h1>权限管理</h1>
<!-- 页面按钮集合 -->
</div>
<div id="breadcrumb">
    <a href="/index/index" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
    <a href="#" class="current">权限管理</a>
</div>
<!-- 站内导航 结束 -->
<div class="container-fluid">	
	<div class="row-fluid">
       <div class="widget-box">
<div class="widget-title">
        <span class="icon">
        <i class="icon-th"></i>
        </span>
        <h5>权限列表</h5>
</div>
<div class="widget-content">
<form action="#" method="get" class="form-horizontal" />
<div class="control-group">
            <label class="control-label">请选择组：</label>
            <div class="controls">
                <select name="roles" id="roles" class="colorpicker">
                    <option value="0">请选择</option>
                    <?php
                    if (is_array($roles) && !empty($roles)) {
                        foreach ($roles as $v) {
                            $class = '';
                            if ($v['t_roleid'] == $role['t_roleid']) {
                                $class = ' selected';
                            }
                            echo '<option' . $class . ' value="' . $v['t_roleid'] . '">' . $v['t_rname'] . '</option>';
                        }
                    }
                    ?>
                </select>
<button id="checkAll" class="btn btn-info">全选</button>
<button id="checkNone" class="btn btn-info">取消全选</button>
    </div>
</div>
 </form>		   
<!-- 菜单目录结构 -->
<form class="form-horizontal" role="form">
  <div class="form-group" id="menulists">
        <table class="table table-striped table-bordered" id="menulists"> 
           <thead>
           <?php echo htmlspecialchars_decode($menuhtml);?>
           </thead>
        </table>
         <!-- 菜单目录结构 结束 -->
	</div>
	</form>
	<div style="text-align: center;">	
	<?php if($editPermission):?> <button class="btn btn-success" id="editPermissionBtn" style="margin: auto;">修改权限</button><?php endif;?>
</div>
</div>
</div>	 
</div>
</div>
<?php
echo Page_Lib::footer()?>