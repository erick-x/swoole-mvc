<?php
$insert_html = Page_Lib::loadJs('server');
echo Page_Lib::head($insert_html);
?>
<!-- 站内导航 -->
<div id="content-header">
    <?php if (is_array($platform) && !empty($platform)): ?> <h1><?php echo $platform['platform_name']; ?>平台服务器列表</h1><?php endif; ?>
	<!-- 页面按钮集合 -->
	<div class="btn-group">
            <?php if($addServer):?>
                    <a class="btn btn-large tip-bottom" title="添加白名单" data-toggle="modal" data-backdrop="static" data-target="#addWhiteListModal" id="addWhiteList"><i class="icon-plus"></i> 添加白名单</a>
                    <a class="btn btn-large tip-bottom" title="添加服务器" data-toggle="modal" data-backdrop="static" data-target="#addServerModal" id="addServer"><i class="icon-plus"></i> 添加服务器</a>
                    <a class="btn btn-large tip-bottom" title="关闭服务器" data-toggle="modal" data-backdrop="static" data-target="#updateServerModal" id="addServer"><i class="icon-plus"></i>批量操作服务器</a>
            <?php endif; ?>
	</div>
</div>
         <div id="breadcrumb">
            <a href="/index/index" title="跳到首页" class="tip-bottom"><i class="icon-home"></i> 首页</a>
            <a href="#" class="current"><?php if (is_array($platform) && !empty($platform)): ?><?php echo $platform['platform_name']; ?>平台服务器列表<?php endif; ?></a>
        </div>
<!-- 站内导航 结束 -->
        <div class="container-fluid">	
	<div class="row-fluid">
            <table class="table table-striped table-bordered table-hover" id="serverTable">
                <tr>
                    <th>服务器ID</th>
                    <th>平台名称</th>
                    <th>区服名称</th>
                    <th>区服IP</th>
                    <th>客户端状态</th>
                    <th>区服总玩家数</th>
                    <th>创建时间</th>
                    <th>状态</th>		
                    <th>操作</th>					
                </tr>
                <?php if (is_array($servers) && !empty($servers)): ?>
                    <?php foreach ($servers as $server): ?>
                        <tr id="<?php echo $server['sid']; ?>">
                            <td data-name="roleserverip" style="display:none;"><?php echo $server['roleserver_ip']; ?></td>
                            <td data-name="roleserverport" style="display:none;"><?php echo $server['roleserver_port']; ?></td> 
                            <td data-name="zoneserverip" style="display:none;"><?php echo $server['zoneserver_ip']; ?></td> 
                            <td data-name="zoneserverport" style="display:none;"><?php echo $server['zoneserver_port']; ?></td>
                            <td data-name="zoneserverid" style="display:none;"><?php echo $server['zoneid']; ?></td>
                            <td data-name="desc" style="display:none;"><?php echo $server['server_info']; ?></td> 
                            <td data-name="showid" style="display:none;"><?php echo $server['showid']; ?></td>
                            <td data-name="serverid" style=" text-align: center;"><?php echo $server['sid']."服"; ?></td>
                            <td data-name="platformname" style=" text-align: center;"><?php echo $platform['platform_name']; ?></td>
                            <td data-name="sname" style=" text-align: center;"><?php echo $server['sname']; ?></td>
                            <td style=" text-align: center;"><?php echo $platform['sid_ip']; ?></td>
                            <td style=" text-align: center;" ><?php switch (intval($server['status']))
                                { 
                                        
                                        case 0:
                                                echo "推荐";
                                                break;
                                        case 1:
                                                echo "爆满";
                                                break;
                                        case 2:
                                                echo "默认新服";
                                                break;
                                        case 3:
                                                echo "新服";
                                                break;
                                        case 4:
                                                echo "关服";
                                                break;
                                        default:echo "未设置";
                                                break;
                                }?>
                            </td>
                            <td style=" text-align: center;"><?php echo $server['userNum']; ?></td>
                            <td ><?php echo date("Y-m-d H:i:s", $server['createTime']);?></td>     
                             <td style=" text-align: center;"><?php switch (intval($server['serverStatus']))
                                { 
                                        case 1:
                                                echo "白名单";
                                                break;
                                        case 2:
                                                echo "开服";
                                                break;
                                        case 3:
                                                echo "关服";
                                                break;
                                        case 4:
                                                echo "关服";
                                                break;
                                        default:echo "未设置";
                                                break;
                                }?>
                            <td style=" text-align: center;">
        <?php if ($editServer): ?><button class="btn btn-link editServer" >编辑</button><?php endif; ?>
        <?php if ($serverState):?><button class="btn btn-link severState">状态</button><?php endif; ?>
        <?php if ($serverInfo): ?><button class="btn btn-link serverInfo">维护信息</button><?php endif; ?>
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

<!--addServer Modal -->
<div class="modal fade" id="addServerModal" tabindex="-1" role="dialog" aria-labelledby="addServerModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="addServerModalLabel">添加区服列表</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" action="/server/addServer" method="POST" id="addServerForm" onsubmit="return false;">
               <div class="control-group">
                        <label class="col-md-3 control-label">服务器ID：</label>
                        <div class="controls"><input type="text" class="form-control" name="serverid"/></div>
                    </div>
                    <div class="control-group">
                        <label class="col-md-3 control-label">平台名称：</label>
                        <div class="controls"><input type="text" class="form-control" name="platformname" readonly="true" value="<?php echo $platform['platform_name']; ?>"/></div>
                    </div>
                    <div class="control-group">
                        <label class="col-md-3 control-label">服务器显示ID：</label>
                        <div class="controls"><input type="text" class="form-control" name="showid"/></div>
                    </div>
                   <div class="control-group">
                        <label class="col-md-3 control-label">区服名称：</label>
                        <div class="controls"><input type="text" class="form-control" name="sname"/></div>
                    </div>
                   <div class="control-group">
                        <label class="col-md-3 control-label">角色服IP：</label>
                        <div class="controls"><input type="text" class="form-control" name="roleserverip"/></div>
                    </div>
                   <div class="control-group">
                        <label class="col-md-3 control-label">角色服端口：</label>
                        <div class="controls"><input type="text" class="form-control" name="roleserverport"/></div>
                    </div>
                   <div class="control-group">
                        <label class="col-md-3 control-label">游戏服IP：</label>
                        <div class="controls"><input type="text" class="form-control" name="zoneserverip"/></div>
                    </div>
                   <div class="control-group">
                        <label class="col-md-3 control-label">游戏服端口：</label>
                        <div class="controls"><input type="text" class="form-control" name="zoneserverport"/></div>
                    </div>
                   <div class="control-group">
                        <label class="col-md-3 control-label">游戏服ID：</label>
                        <div class="controls"><input type="text" class="form-control" name="zoneserverid"/></div>
                    </div>                    
                   <div class="control-group">
                        <label class="col-md-3 control-label" for="">客户端状态:</label>
                        <div class="controls">
                            <select class="form-control" name="State" required="" autofocus="">
                                <option value="" selected="selected">请选择</option>
                                <option value="0">推荐</option>
                                <option value="1">爆满</option>
                                <option value="2">默认新服</option>
                                <option value="3">新服</option>
                                <option value="4">关服维护</option>
                            </select>
                        </div>
                    </div>
                    <input type="hidden" name="id"/>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="addServerBtn">确认添加</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">取消关闭</button>
            </div>
        </div>
    </div>
</div>
<!--editServer Modal -->
<div class="modal fade" id="editServerModal" tabindex="-1" role="dialog" aria-labelledby="editServerModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="editServerModalLabel">修改区服列表</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" action="/server/editServer" method="POST" id="editServerForm" onsubmit="return false;">
                    <div class="control-group">
                        <label class="col-md-3 control-label">服务器ID：</label>
                        <div class="controls"><input type="text" class="form-control" name="serverid" readonly="true" /></div>
                    </div>
                    <div class="control-group">
                        <label class="col-md-3 control-label">平台名称：</label>
                        <div class="controls"><input type="text" class="form-control" name="platformname" readonly="true"/></div>
                    </div>
                    <div class="control-group">
                        <label class="col-md-3 control-label">服务器显示ID：</label>
                        <div class="controls"><input type="text" class="form-control" name="showid"/></div>
                    </div>
                    <div class="control-group">
                        <label class="col-md-3 control-label">区服名称：</label>
                        <div class="controls"><input type="text" class="form-control" name="sname"/></div>
                    </div>
                   <div class="control-group">
                        <label class="col-md-3 control-label">角色服IP：</label>
                        <div class="controls"><input type="text" class="form-control" name="roleserverip"/></div>
                    </div>
                   <div class="control-group">
                        <label class="col-md-3 control-label">角色服端口：</label>
                        <div class="controls"><input type="text" class="form-control" name="roleserverport"/></div>
                    </div>
                   <div class="control-group">
                        <label class="col-md-3 control-label">游戏服IP：</label>
                        <div class="controls"><input type="text" class="form-control" name="zoneserverip"/></div>
                    </div>
                   <div class="control-group">
                        <label class="col-md-3 control-label">游戏服端口：</label>
                        <div class="controls"><input type="text" class="form-control" name="zoneserverport"/></div>
                    </div>
                   <div class="control-group">
                        <label class="col-md-3 control-label">游戏服ID：</label>
                        <div class="controls"><input type="text" class="form-control" name="zoneserverid"/></div>
                    </div>
                   <div class="control-group">
                        <label class="col-md-3 control-label" for="">客户端状态:</label>
                        <div class="controls">
                            <select class="form-control" name="State" required="" autofocus="">
                                <option value="" selected="selected">请选择</option>
                                <option value="0" >推荐</option>
                                <option value="1">爆满</option>
                                <option value="2">默认新服</option>
                                <option value="3">新服</option>
                                <option value="4">关服维护</option>
                            </select>
                        </div>
                    </div>
            		<input type="hidden" name="id"/>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="editServerBtn">确认修改</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">取消关闭</button>
            </div>
        </div>
    </div>
</div>

<!-- addWhiteList Begin -->
<div class="modal fade" id="addWhiteListModal" tabindex="-1" role="dialog" aria-labelledby="addWhiteListModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="addWhiteListModalLabel">添加平台白名单</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" action="/server/addWhiteList" method="POST" id="addWhiteListForm" onsubmit="return false;">
                    
                    <div class="control-group">
                        <label class="col-md-4 control-label">用户标识(uin)：</label>
                        <div class="controls"><input type="text" class="form-control" name="uin" required="" autofocus=""/></div>
                    </div>
                    <div class="control-group">
                        <label class="col-md-4 control-label">备注：</label>
                        <div class="controls"><input type="text" class="form-control" name="desc" required="" autofocus=""/></div>
                    </div>
                    <input type="hidden" name="id"/>
                </form>
                <div class="widget-box">
                    <div class="widget-title">
                            <span class="icon">
                            <i class="icon-user"></i>
                            </span>
                            <h5>当前白名单列表</h5>
                    </div>
                    <div class="widget-content">                       
                        <?php if (is_array($whitelist) && !empty($whitelist)): ?>
                            <?php foreach ($whitelist as $whitelist): ?>
                                 <?php echo "[uin=".$whitelist['uin']."|".$whitelist['desc']."]"; ?>						
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="addWhiteListBtn">确认添加</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal" id="delWhiteBtn">确认删除</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">取消关闭</button>
            </div>
        </div>
  	</div>
      </div>
 </div>
<!-- serverinfo Begin -->

<div class="modal fade" id="updateServerModal" tabindex="-1" role="dialog" aria-labelledby="updateServerModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="updateServerModalLabel">所有服务器</h4>
            </div>
            
            <div class="modal-body">
                <form class="form-horizontal" action="/server/addWhiteList" method="POST" id="ListForm" onsubmit="return false;">
                    <div class="control-group">
                            <label class="col-md-4 control-label">关服说明：</label>
                            <div class="controls">
                                <textarea class="form-control" name="desc"></textarea>
                            </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="">服务器状态:</label>
                        <div class="controls">
                            <select class="form-control" name="serverStatus" required="" autofocus="">
                                <option value="" selected="selected">请选择</option>
                                <option value="1">白名单</option>
                                <option value="2">开服</option>
                                <option value="3">关服</option>
                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="col-md-3 control-label" for="">客户端状态:</label>
                        <div class="controls">
                            <select class="form-control" name="State" required="" autofocus="">
                                <option value="" selected="selected">请选择</option>
                                <option value="0" >推荐</option>
                                <option value="1">爆满</option>
                                <option value="2">默认新服</option>
                                <option value="3">新服</option>
                                <option value="4">关服维护</option>
                            </select>
                        </div>
                    </div>
                </form>
                <button id="checkAll" class="btn btn-info">全选</button>
                <button id="checkNone" class="btn btn-info">取消</button>
                <table class="table table-striped table-bordered" id="serverlist">                                   
                            <?php if (is_array($allservers) && !empty($allservers)): ?>                                     
                                <?php for ($i = 0; $i < count($allservers);$i+=4): ?>
                                    <tr><?php if(!empty($allservers[$i])):?>
                                    <td>
                                        <div class="checkbox">
                                        <label class="checkbox-inline">
                                         <?php echo '<input name="servercheckbox" type= "checkbox"  value="'.$allservers[$i]['sid'].'">'.$allservers[$i]['sid']."区 ".$allservers[$i]['sname'];?>
                                        </label>
                                        </div> 
                                    </td>
                                    <?php else:?>
                                    <td></td>
                                        <?php endif;?>
                                    <?php if(!empty($allservers[$i+1])):?>
                                    <td>
                                        <div class="checkbox">
                                        <label class="checkbox-inline">
                                           <?php echo '<input name="servercheckbox" type= "checkbox"  value="'.$allservers[$i+1]['sid'].'">'.$allservers[$i+1]['sid']."区 ".$allservers[$i+1]['sname'];?>
                                        </label>
                                        </div> 
                                    </td>
                                    <?php else:?>
                                    <td></td>
                                        <?php endif;?>
                                    <?php if(!empty($allservers[$i+2])):?>
                                    <td>
                                       <div class="checkbox">
                                        <label class="checkbox-inline">
                                           <?php echo '<input name="servercheckbox" type= "checkbox"  value="'.$allservers[$i+2]['sid'].'">'.$allservers[$i+2]['sid']."区 ".$allservers[$i+2]['sname'];?>
                                        </label>
                                        </div> 
                                    </td>
                                    <?php else:?>
                                    <td></td>
                                     <?php endif;?>
                                    <?php if(!empty($allservers[$i+3])):?>
                                    <td>
                                     <div class="checkbox">
                                        <label class="checkbox-inline">
                                           <?php echo '<input name="servercheckbox" type= "checkbox"  value="'.$allservers[$i+3]['sid'].'">'.$allservers[$i+3]['sid']."区 ".$allservers[$i+3]['sname'];?>
                                        </label>
                                        </div> 
                                    </td>
                                    <?php else:?>
                                    <td></td>
                                      <?php endif;?>
                                    </tr>
                            <?php endfor; ?>
                            <?php endif; ?>                           
                        </table>
                    </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="UpdateServerBtn">确认关闭</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">取消关闭</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="serverstateModal" tabindex="-1" role="dialog" aria-labelledby="serverstateModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="serverstateModalLabel">服务器状态</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" action="/server/serverState" method="POST" id="serverStateForm" onsubmit="return false;">
                 
                <div class="control-group">
                        <label class="col-md-3 control-label">服务器ID：</label>
                        <div class="controls"><input type="text" class="form-control" name="serverid" readonly="true" /></div>
                    </div>
                    <div class="control-group">
                        <label class="col-md-3 control-label">服务器显示ID：</label>
                        <div class="controls"><input type="text" class="form-control" name="showid"/></div>
                    </div>
                    <div class="control-group">
                        <label class="col-md-3 control-label">区服名称：</label>
                        <div class="controls"><input type="text" class="form-control" name="sname" readonly="true"/></div>
                </div>
                <div class="form-group">
                        <label class="col-md-3 control-label" for="">服务器状态:</label>
                        <div class="controls">
                            <select class="form-control" name="serverStatus" required="" autofocus="">
                                <option value="" selected="selected">请选择</option>
                                <option value="1">白名单</option>
                                <option value="2">开服</option>
                                <option value="3">关服</option>
                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="col-md-3 control-label" for="">客户端状态:</label>
                        <div class="controls">
                            <select class="form-control" name="State" required="" autofocus="">
                                <option value="" selected="selected">请选择</option>
                                <option value="0" >推荐</option>
                                <option value="1">爆满</option>
                                <option value="2">默认新服</option>
                                <option value="3">新服</option>
                                <option value="4">关服维护</option>
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
                <button type="button" class="btn btn-primary" id="serverStateBtn">确认修改</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">取消关闭</button>
            </div>
        </div>
  </div>
</div>

<!-- serverinfo Begin -->
<div class="modal fade" id="serverinfoModal" tabindex="-1" role="dialog" aria-labelledby="serverInfoModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="serverInfoModalLabel">服务器信息说明</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" action="/server/serverInfo" method="POST" id="serverInfoForm" onsubmit="return false;">
                    <div class="control-group">
                        <label class="col-md-3 control-label">服务器ID：</label>
                        <div class="controls"><input type="text" class="form-control" name="serverid"  readonly="ture"/></div>
                    </div>
                    <div class="control-group">
                        <label class="col-md-3 control-label">区服名称：</label>
                        <div class="controls"><input type="text" class="form-control" name="sname" readonly="true"/></div>
                    </div>
  		   <div class="form-group">
                        <label class="col-md-4 control-label">详细说明：</label>
                        <div class="controls">
                            <textarea class="form-control" name="desc"></textarea>
                        </div>
                    </div>
                    <input type="hidden" name="id"/>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="serverinfoBtn">确认</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
            </div>
        </div>
  </div>
</div>