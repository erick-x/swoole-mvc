<?php
$insert_html = Page_Lib::loadJs('user');
echo Page_Lib::head($insert_html);
$page = Config::get("common");
?>
	<!-- 站内导航 -->
			<div id="content-header">
				<h1>账户列表</h1>
					<!-- 页面按钮集合 -->
				<div class="btn-group">
                <?php if ($addUser): ?>
					<a class="btn btn-large tip-bottom" title="添加用户" data-toggle="modal" data-backdrop="static" data-target="#addUserModal" id="addUser"><i class="icon-plus"></i>添加用户</a>
				<?php endif; ?>
				</div>
			</div>
			<div id="breadcrumb">
				<a href="/index/index" title="跳到首页" class="tip-bottom"><i class="icon-home"></i> 首页</a>
				<a href="#" class="current">账户列表</a>
			</div>
	<!-- 站内导航 结束 -->
			<div class="container-fluid">	
				<div class="row-fluid">
    <?php if (is_array($users) && !empty($users)): ?>
        <table class="table table-striped table-bordered table-hover" id="rolelists">
            <tr>
                <th>用户uid</th>
                <th>帐号</th>
                <th>注册时间</th>
                <th>所属组</th>
                <th>最后登录时间</th>
                <th>操作</th>
            </tr>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td data-name="uid"><?php echo $user['t_uid']; ?></td>
                    <td data-name="account"><?php echo $user['t_account']; ?></td>
                    <td><?php echo $user['t_regtime']; ?></td>
                    <td style="display: none;" data-name="roleid" style=" text-align: center;"><?php echo $user['t_roleid'];?></td>
                    <td>
                         <?php if ($editUser): ?>
                        <select class="form-control" name="roleid">
                                <option value="0">请选择组：</option>
                                <?php if (is_array($roles) && !empty($roles)): ?>
                                    <?php foreach ($roles as $role): ?>
                                <option <?php if($role['t_roleid'] == $user['t_roleid']):?>selected <?php endif;?>value="<?php echo $role['t_roleid'] ?>"><?php echo $role['t_rname']; ?></option>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </select>
                        <?php else:?>
                        <?php echo $roles[$user['t_roleid']]['t_rname']; ?>
                        <?php endif;?>
                    </td>
                    <td><?php echo $user['t_lastlogin']; ?></td>
                    <td>
                        <?php if ($editUser): ?><!--<button class="btn btn-link editUser">编辑</button>--><?php endif; ?>
                        <?php if ($delUser): ?><button class="btn btn-link delUser" data-value="<?php echo $user['t_uid'] ?>">删除</button><?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <p class="text-center text-muted">没有任何用户！</p>
        <?php endif; ?>
    </table>
</div>
</div>
<?php echo Page_Lib::footer() ?>

<!-- addUser Modal -->
<div class="modal fade" id="addUserModal" tabindex="-1" role="dialog" aria-labelledby="addUserModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3 class="modal-title" id="addUserModalLabel">添加用户</h3>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" action="<?php echo $page['host'] ?>/user/addUser" method="POST" id="addUserForm" onsubmit="return false;">
                    <div class="control-group">
                        <label class="control-label">用户名：</label>
                       <div class="controls"> <input type="text" class="form-control" name="account"/>
					    </div>
                    </div>
                       <div class="control-group">
                        <label class="control-label">所属组：</label>
                        <div class="controls">
                            <select class="form-control" name="roleid">
                                <option value="0">请选择组：</option>
                                <?php if (is_array($roles) && !empty($roles)): ?>
                                    <?php foreach ($roles as $role): ?>
                                        <option value="<?php echo $role['t_roleid'] ?>"><?php echo $role['t_rname']; ?></option>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </select>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="addUserBtn">确认添加</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">取消关闭</button>
            </div>
        </div>
    </div>
</div>

<!-- editUser Modal -->
<div class="modal fade" id="editUserModal" tabindex="-1" role="dialog" aria-labelledby="editUserModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="editUserModalLabel">修改组</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" action="<?php echo $page['host'] ?>/user/editUser" method="POST" id="editUserForm" onsubmit="return false;">
                    <div class="control-group">
                        <label class="col-md-2 control-label">所属组：</label>
                        <div class="controls">
                            <select class="form-control" name="roleid">
                                <option value="0">请选择组：</option>
                                <?php if (is_array($roles) && !empty($roles)): ?>
                                    <?php foreach ($roles as $role): ?>
                                        <option value="<?php echo $role['t_roleid'] ?>"><?php echo $role['t_rname']; ?></option>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </select>
                        </div>
                    </div>
                    <input type="hidden" name="account"/>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="editUserBtn">确认修改</button>
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
                <h3 class="modal-title" id="showPmsModalLabel">添加组</h3>
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