<?php
$insert_html = Page_Lib::loadJs('menu');
echo Page_Lib::head($insert_html);

$menuStatus = array(0 => '显示且无子菜单', 1 => '不显示', 2 => '显示且有子菜单');
?>
<!-- 站内导航 -->
<div id="content-header">
        <h1>菜单列表<?php if (!empty($menu)) {echo "-" . $menu['t_mname'];}?></h1>
                <!-- 页面按钮集合 -->
        <div class="btn-group">
        <?php if ($addMenu): ?>
                <a class="btn btn-large tip-bottom" title="添加菜单" data-toggle="modal" data-backdrop="static" data-target="#addMenuModal" id="addMenu"><i class="icon-plus"></i>添加菜单</a>
        <?php endif; ?>
        </div>
</div>
<div id="breadcrumb">
        <a href="/index/index" title="跳到首页" class="tip-bottom"><i class="icon-home"></i> 首页</a>
        <a href="#" class="current">菜单列表</a>
</div>
<!-- 站内导航 结束 -->
<div class="container-fluid">	
	<div class="row-fluid">
        <table class="table table-striped table-bordered table-hover" id="menusTable">
            <tr>
                <th>菜单ID</th>
                <th>菜单名称</th>
                <th>链接</th>
                <th>菜单状态</th>
                <th>菜单描述</th>
                <th>父级菜单</th>
                <th>菜单类别</th>
                <th>操作</th>
            </tr>
<?php if (is_array($menus) && !empty($menus)): ?>
    <?php foreach ($menus as $obj): ?>
                    <tr id="<?php echo $obj->root['t_menuId']; ?>">
                        <td><?php echo $obj->root['t_menuId']; ?></td>
                        <td class="mname">
                            <?php if (intval($obj->root['t_status']) === 2): ?>
                                <a href="?pid=<?php echo $obj->root['t_menuId']; ?>"><?php echo $obj->root['t_mname']; ?></a>
                            <?php else: ?>
            <?php echo $obj->root['t_mname']; ?>
        <?php endif; ?>
                        </td>
                        <td>
                            <?php
                            if ($obj->root['t_controller'] == '#' || $obj->root['t_method'] == '#') {
                                echo "#";
                            } else {
                                echo $obj->root['t_controller'] . '/' . $obj->root['t_method'].($obj->root['t_argv']?'?'.$obj->root['t_argv']:'');
                            }
                            ?>
                        </td>
                        <td><?php echo $menuStatus[$obj->root['t_status']]; ?></td>
                        <td class="desc"><?php echo $obj->root['t_desc']; ?></td>
                        <td><a href="?pid=<?php echo $obj->root['t_pid']; ?>">
                                <?php
                                if (empty($menu)) {
                                    echo $menus[$obj->root['t_pid']]->root['t_mname'];
                                } else {
                                    echo $menu['t_mname'];
                                }
                                ?>
                            </a></td>
                        <td class="postion"><?php echo $obj->root['t_postion'] ?></td>
                        <td style="display:none;" class="pid"><?php echo $obj->root['t_pid']; ?></td>
                        <td style="display:none;" class="controller"><?php echo $obj->root['t_controller']; ?></td>
                        <td style="display:none;" class="method"><?php echo $obj->root['t_method']; ?></td>
                        <td style="display:none;" class="argv"><?php echo $obj->root['t_argv']; ?></td>
                        <td style="display:none;" class="status"><?php echo $obj->root['t_status']; ?></td>
                        <td>
        <?php if ($editMenu): ?><button class="btn btn-link editMenu">编辑</button><?php endif; ?>
                    <?php if ($hideMenu && $obj->root['t_status'] != 1): ?><button class="btn btn-link hideMenu">隐藏</button><?php endif; ?>
                        </td>
                    </tr>
    <?php endforeach; ?>
<?php endif; ?>
        </table>
</div>
</div>


<?php echo Page_Lib::footer(); ?>

<!-- Modal -->
<!-- add Menu Begin -->
<div class="modal fade" id="addMenuModal" tabindex="-1" role="dialog" aria-labelledby="addMenuModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="addMenuModalLabel">添加菜单</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" action="/menu/addMenu" method="POST" id="addMenuForm" onsubmit="return false;">
                    <div class="control-group">
                        <label class="col-md-4 control-label">菜单名称：</label>
                        <div class="controls"><input type="text" class="form-control" name="mname" required="" autofocus=""/></div>
                    </div>
                    <div class="control-group">
                        <label class="col-md-4 control-label">控制器(controller)：</label>
                        <div class="controls"><input type="text" class="form-control" name="controller" required="" autofocus=""/></div>
                    </div>
                    <div class="control-group">
                        <label class="col-md-4 control-label">模块(method)：</label>
                        <div class="controls"><input type="text" class="form-control" name="method" required="" autofocus=""/></div>
                    </div>
                     <div class="form-group">
                        <label class="col-md-4 control-label">参数(argv)：</label>
                        <div class="controls"><input type="text" class="form-control" name="argv" required="" autofocus=""/></div>
                    </div>
                    <div class="control-group">
                        <label class="col-md-4 control-label">父级菜单：</label>
                        <div class="controls">
                            <select class="form-control" name="pid" required="" autofocus="">
                                <option value="0">无</option>
                                <?php
                                if (is_array($pMenus) && !empty($pMenus)) {

                                    foreach ($pMenus as $pmenu) {
                                        $class = '';
                                        if (!empty($menu) && $menu['t_menuId'] == $pmenu['t_menuId']) {
                                            $class = ' selected';
                                        }
                                        echo '<option value="' . $pmenu['t_menuId'] . '"' . $class . '>' . $pmenu['t_mname'] . '</option>';
                                    }
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="col-md-4 control-label">菜单位置：</label>
                        <div class="controls">
                            <select class="form-control" name="postion" required="" autofocus="">
                                <?php
                                for ($i = 0; $i < 10; $i++) {
                                    $class = '';
                                    if (intval($menu['t_postion']) == $i) {
                                        $class = ' selected';
                                    }
                                    echo '<option value="' . $i . '"' . $class . '>' . $i . '</option>';
                                }
                                ?>
                            </select>

                        </div>
                    </div>
                    <div class="control-group">
                        <label class="col-md-4 control-label">状态：</label>
                        <div class="controls">
                            <select class="form-control" name="status" required="" autofocus="">
                                <option value="0">显示且无子菜单</option>
                                <option value="1">不显示</option>
                                <option value="2">显示且有子菜单</option>
                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="col-md-4 control-label">详细说明：</label>
                        <div class="controls">
                            <textarea class="form-control" name="desc"></textarea>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="addMenuBtn">确认添加</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">取消关闭</button>
            </div>
        </div>
    </div>
</div>
<!-- add Menu End -->

<!-- edit Menu Begin -->
<div class="modal fade" id="editMenuModal" tabindex="-1" role="dialog" aria-labelledby="editMenuModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="editMenuModalLabel">修改菜单</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" action="/menu/editMenu" method="POST" id="editMenuForm" onsubmit="return false;">
                    <div class="control-group">
                        <label class="col-md-4 control-label">菜单名称：</label>
                        <div class="controls"><input type="text" class="form-control" name="mname" required="" autofocus=""/></div>
                    </div>
                    <div class="control-group">
                        <label class="col-md-4 control-label">控制器(controller)：</label>
                        <div class="controls"><input type="text" class="form-control" name="controller" required="" autofocus=""/></div>
                    </div>
                    <div class="control-group">
                        <label class="col-md-4 control-label">模块(method)：</label>
                        <div class="controls"><input type="text" class="form-control" name="method" required="" autofocus=""/></div>
                    </div>
                     <div class="form-group">
                        <label class="col-md-4 control-label">参数(argv)：</label>
                        <div class="controls"><input type="text" class="form-control" name="argv" required="" autofocus=""/></div>
                    </div>
                    <div class="control-group">
                        <label class="col-md-4 control-label">父级菜单：</label>
                        <div class="controls">
                            <select class="form-control" name="pid" required="" autofocus="">
                                <option value="0">无</option>
                                <?php
                                if (is_array($pMenus) && !empty($pMenus)) {
                                    foreach ($pMenus as $pmenu) {
                                        echo '<option value="' . $pmenu['t_menuId'] . '">' . $pmenu['t_mname'] . '</option>';
                                    }
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="col-md-4 control-label">菜单位置：</label>
                        <div class="controls">
                            <select class="form-control" name="postion" required="" autofocus="">
                                <?php
                                for ($i = 0; $i < 10; $i++) {
                                    $class = '';
                                    if (intval($menu['t_postion']) == $i) {
                                        $class = ' selected';
                                    }
                                    echo '<option value="' . $i . '"' . $class . '>' . $i . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="col-md-4 control-label">状态：</label>
                        <div class="controls">
                            <select class="form-control" name="status" required="" autofocus="">
                                <option value="0">显示且无子菜单</option>
                                <option value="1">不显示</option>
                                <option value="2">显示且有子菜单</option>
                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="col-md-4 control-label">详细说明：</label>
                        <div class="controls">
                            <textarea class="form-control" name="desc"></textarea>
                        </div>
                    </div>
                    <input type="hidden" name="id"/>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="editMenuBtn">确认修改</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">取消关闭</button>
            </div>
        </div>
    </div>
    <!-- edit Menu End -->