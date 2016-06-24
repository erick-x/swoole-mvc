<?php
$insert_html = Page_Lib::loadJs('platform');
echo Page_Lib::head($insert_html);
?>
    <!-- 站内导航 -->
    <div id="content-header">
            <h1>平台列表<?php if (!empty($menu)) {echo ">>" . $menu['t_mname'];}?></h1>
                    <!-- 页面按钮集合 -->
            <div class="btn-group">
            <?php if ($addPlatform): ?>
                    <a class="btn btn-large tip-bottom" title="添加平台" data-toggle="modal" data-backdrop="static" data-target="#addPlatformModal" id="addPlatform"><i class="icon-plus"></i>添加平台</a>
            <?php endif; ?>
            </div>
    </div>
        <div id="breadcrumb">
                <a href="/index/index" title="跳到首页" class="tip-bottom"><i class="icon-home"></i> 首页</a>
                <a href="#" class="current">平台列表<?php if (!empty($menu)) {echo ">" . $menu['t_mname'];}?></a>
        </div>
	<!-- 站内导航 结束 -->
	<div class="container-fluid">	
	<div class="row-fluid">

        <table class="table table-striped table-bordered table-hover" id="paltformTable">
            <tr>
                <th>平台ID</th>
                <th>平台名称</th>
                <th>平台区服数量</th>
                <th>创建时间</th>
                <th>描述</th>
                <th>操作</th>
            </tr>
<?php if (is_array($platform) && !empty($platform)): ?>
     	<?php foreach ($platform as $platform): ?>
                        <tr id="<?php echo $platform['platform_id']; ?>">
                            <td style=" text-align: center;"><?php echo $platform['platform_id']; ?></td>
                            <td data-name="platformName" style=" text-align: center;" ><?php echo $platform['platform_name']; ?></td>
                            <td><?php echo $platform['platform_num']; ?></td>
                            <td style=" text-align: center;"><?php echo date("Y-m-d H:i:s", $platform['createtime']); ?></td>   
                            <td data-name="desc" style=" text-align: center;"><?php echo $platform['platform_desc']; ?></td>                                         
                            <td style=" text-align: center;">
        <?php if ($editPlatform): ?><button class="btn btn-link editPlatform">编辑</button><?php endif; ?>
                            </td>
                    </tr>
    	<?php endforeach; ?>
<?php endif; ?>
        </table>
</div>
</div>
<!-- 分页组件 begin -->
<div class="row center" style="text-align: center;">	
<?php echo htmlspecialchars_decode($pagehtml);?>
</div>
<!-- 分页组件 end -->
<?php echo Page_Lib::footer(); ?>

<!-- Modal -->
<!-- add Platform Begin -->
<div class="modal fade" id="addPlatformModal" tabindex="-1" role="dialog" aria-labelledby="addPlatformModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="addPlatformModalLabel">添加平台</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" action="/platform/addPlatform" method="POST" id="addPlatformForm" onsubmit="return false;">
                    <div class="control-group">
                        <label class="col-md-4 control-label">平台名称：</label>
                        <div class="controls"><input type="text" class="form-control" name="platformName" required="" autofocus=""/></div>
                    </div>
                    <div class="control-group">
                        <label class="col-md-4 control-label">映射区服地址</label>
                        <div class="controls"><input type="text" class="form-control" name="platformAddr" required="" autofocus=""/></div>
                    </div>
                    <div class="control-group">
                        <label class="col-md-4 control-label">映射区服端口：</label>
                        <div class="controls"><input type="text" class="form-control" name="platformPort" required="" autofocus=""/></div>
                    </div>
                    <div class="control-group">
                        <label class="col-md-4 control-label">映射数据库地址：</label>
                        <div class="controls"><input type="text" class="form-control" name="platformDBAddr" required="" autofocus=""/></div>
                    </div>
                    <div class="control-group">
                        <label class="col-md-4 control-label">映射数据库名</label>
                        <div class="controls"><input type="text" class="form-control" name="platformDBName" required="" autofocus=""/></div>
                    </div>
                    <div class="control-group">
                        <label class="col-md-4 control-label">数据库用户名</label>
                        <div class="controls"><input type="text" class="form-control" name="platformDBUser" required="" autofocus=""/></div>
                    </div>
                    <div class="control-group">
                        <label class="col-md-4 control-label">映射数据库密码：</label>
                        <div class="controls"><input type="text" class="form-control" name="platformDBPwd" required="" autofocus=""/></div>
                    </div>
                    <div class="control-group">
                        <label class="col-md-4 control-label">描述：</label>
                        <div class="controls">
                            <textarea class="form-control" name="desc"></textarea>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="addPlatformBtn">确认添加</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">取消关闭</button>
            </div>
        </div>
    </div>
</div>
<!-- add Platform End -->

<!-- edit Platform Begin -->
<div class="modal fade" id="editPlatformModal" tabindex="-1" role="dialog" aria-labelledby="editPlatformModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="editPlatformModalLabel">修改平台信息</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" action="/platform/editPlatform" method="POST" id="editPlatformForm" onsubmit="return false;">
                   <div class="control-group">
                        <label class="col-md-4 control-label">平台名称：</label>
                        <div class="controls"><input type="text" class="form-control" name="platformName" required="" autofocus=""/></div>
                    </div>
                 <div class="control-group">
                        <label class="col-md-4 control-label">描述：</label>
                        <div class="controls">
                            <textarea class="form-control" name="desc"></textarea>
                        </div>
                    </div>
                    <input type="hidden" name="id"/>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="editPlatformBtn">确认修改</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">取消关闭</button>
            </div>
        </div>
    </div>
    <!-- edit Platform End -->