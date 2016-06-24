<?php
$insert_html = Page_Lib::loadJs('role');
echo Page_Lib::head($insert_html);
//echo Page_Lib::left();
$page = Config::get("common");
?>
	<!-- 站内导航 -->
			<div id="content-header">
				<h1>账户组列表</h1>
					<!-- 页面按钮集合 -->
				<div class="btn-group">
                <?php if ($addRole): ?>
					<a class="btn btn-large tip-bottom" title="添加用户组" data-toggle="modal" data-backdrop="static" data-target="#addRoleModal" id="addRole"><i class="icon-plus"></i>添加用户组</a>
				<?php endif; ?>
				</div>
			</div>
			<div id="breadcrumb">
				<a href="/index/index" title="跳到首页" class="tip-bottom"><i class="icon-home"></i> 首页</a>
				<a href="#" class="current">账户组列表</a>
			</div>
	<!-- 站内导航 结束 -->
			<div class="container-fluid">	
				<div class="row-fluid">
        <table class="table table-striped table-bordered table-hover" id="rolelists">
            <tr>
                <th>组ID</th>
                <th>组名</th>
                <th>描述</th>
                <th>操作</th>
            </tr>
            <?php if (is_array($roles) && !empty($roles)): ?>
                <?php foreach ($roles as $role): ?>
                    <tr>
                        <td class="id"><?php echo $role['t_roleid']; ?></td>
                        <td class="rname"><span class="btn btn-link"><?php echo $role['t_rname']; ?></span></td>
                        <td class="desc"><?php echo $role['t_desc']; ?></td>
                        <td>
                            <?php if ($manager): ?><a href="<?php echo $page['host'] ?>/role/manager?id=<?php echo $role['t_roleid']; ?>" class="btn btn-link">权限管理</a><?php endif; ?>
                            <?php if ($editRole): ?><button class="btn btn-link editRole">编辑</button><?php endif; ?>
                            <?php if ($delRole): ?><button class="btn btn-link delRole" data-value="<?php echo $role['t_roleid'] ?>">删除</button><?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </table>
    </div>
	</div>
<?php echo Page_Lib::footer() ?>

<!-- addRole Modal -->
<div class="modal fade" id="addRoleModal" tabindex="-1" role="dialog" aria-labelledby="addRoleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="addRoleModalLabel">添加组</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" action="/role/addRole" method="POST" id="addRoleForm" onsubmit="return false;">
                    <div class="control-group">
                        <label class="col-md-2 control-label">组名称：</label>
                        <div class="controls"><input type="text" class="form-control" name="rname"/></div>
                    </div>
                    <div class="control-group">
                        <label class="col-md-2 control-label">描述：</label>
                        <div class="controls"><input type="text" class="form-control" name="desc"/></div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="addRoleBtn">确认添加</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">取消关闭</button>
            </div>
        </div>
    </div>
</div>

<!-- editRole Modal -->
<div class="modal fade" id="editRoleModal" tabindex="-1" role="dialog" aria-labelledby="editRoleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="editRoleModalLabel">修改组</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" action="/role/editRole" method="POST" id="editRoleForm" onsubmit="return false;">
                    <div class="control-group">
                        <label class="col-md-2 control-label">组名称：</label>
                        <div class="controls"><input type="text" class="form-control" name="rname"/></div>
                    </div>
                    <div class="control-group">
                        <label class="col-md-2 control-label">描述：</label>
                        <div class="controls"><input type="text" class="form-control" name="desc"/></div>
                    </div>
                    <input type="hidden" name="id"/>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="editRoleBtn">确认修改</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">取消关闭</button>
            </div>
        </div>
    </div>
</div>

<!-- show permission Modal -->
<div class="modal fade" id="showPmsModal" tabindex="-1" role="dialog" aria-labelledby="showPmsModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="showPmsModalLabel">添加组</h4>
            </div>
            <div class="modal-body">
                <!--<h4 style="display:inline-block"><span class="label label-primary">权限管理</span></h4>-->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">取消关闭</button>
            </div>
        </div>
    </div>
</div>