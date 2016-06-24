<?php
$insert_html = Page_Lib::loadJs('chat');

echo Page_Lib::head($insert_html);
?>
<!-- 站内导航 -->
<div id="content-header">
    <h1>后台基本操作</h1>
    </div>
 <div id="breadcrumb">
    <a href="/index/index" title="跳到首页" class="tip-bottom"><i class="icon-home"></i> 首页</a>
    <a href="#" class="current">聊天内容查询</a>
 </div>
<div class="container-fluid">
<div class="widget-box">
<div class="widget-title">
    <span class="icon">
    <i class="icon-search"></i>
    </span>
    <h5>查询条件</h5>
</div>
    <div class="widget-content">			
        <form method="GET" class="form-horizontal" >         
                <div class="control-group">
			<div class="controls">                           
                            <input type="text" class=" form-control" placeholder="输入内容"  name="chattext" style="width:auto;"/>
                            <span  class="add-on"><i class="icon-home "></i></span>
                            <button class="btn btn-primary" type="submit" id="btn_date"><i class="icon-search icon-white"></i> 查询</button>
                        </div>
                </div>
        </form>       
    </div>
</div>
    <div class="row-fluid">
        <div class="widget-box">
        <table class="table table-striped table-bordered table-hover" id="chatTable">
            <thead>
                <th>角色ID</th>
                <th>区服</th>
                <th>内容</th>
                <th>记录时间</th>
                <th>操作</th>
            </thead>
            <tbody>
               <?php if (is_array($data) && !empty($data)): ?>
                <?php foreach ($data as $listdata): ?>
                 <tr>
                <td data-name="id" style="display:none;"><?php echo$listdata['id']; ?></td>   
                <td data-name="roleid" style="text-align: center"><?php echo$listdata['roleid']; ?></td>   
                <td data-name="sid" style="text-align: center;"><?php echo $listdata['iworld']; ?></td> 
                <td data-name="context"><?php echo $listdata['context']; ?></td>
                <td data-name="time"><?php echo date("Y-m-d  h:i:s",$listdata['time']); ?></td> 
                <td style="text-align: center;" >           
                    <?php if($forbidrole):?>
                    <button class="btn btn-link  roleBtn">封号</button>
                    <?php endif;?>
                    <?php if ($forbidtalk): ?>             
                    <button class="btn btn-link talkBtn" >禁言</button>
                    <?php endif; ?>
                </td>	
                 </tr>
                <?php endforeach;?>
                <?php endif;?>
            </tbody>
        </table>
    </div>
    </div>
</div>
<!-- 分页组件 begin -->
 <div class="row center" style="text-align: center;">	
<?php echo htmlspecialchars_decode($pagehtml);?>
</div>
<!-- 分页组件 end -->

<?php 
    echo Page_Lib::footer(); 
?>
<!-- forbiden account Modal -->
<div class="modal fade" id="forbidAccountModal" tabindex="-1" role="dialog" aria-labelledby="forbidAccountModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="forbidAccountModalLabel">封号内容</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" action="/gameuser/forbidAccount" method="POST" id="forbidAccountForm" onsubmit="return false;">        
                    <div class="control-group">
                        <label class="col-md-3 control-label">角色ID</label>
                        <div class="controls"><input type="text" class="form-control" name="roleid"  readonly="true"/></div>
                    </div>
                    <div class="control-group">
                        <label class="col-md-3 control-label">区服ID</label>
                        <div class="controls"><input type="text" class="form-control" name="sid"  readonly="true"/></div>
                    </div>
                    <div class="control-group">
                        <label class="col-md-3 control-label" for="">封号类型</label>
                        <div class="controls">
                            <select class="form-control" name="forbidtype" required="" autofocus="">
                                <option value="" selected="selected">请选择</option>
                                <option value="1">永久封号</option>
                                <option value="2">普通封号</option>
                                <option value="0">解除封号</option>
                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="col-md-3 control-label">封号开始时间</label>
                        <div class="controls"><input type="text" class="datetimepicker form-control"  name="starttime"/></div>
                    </div>
                    <div class="control-group">
                        <label class="col-md-3 control-label">封号结束时间</label>
                        <div class="controls"><input type="text" class="datetimepicker form-control"  name="endtime"/></div>
                    </div>                  
                    <input type="hidden" name="id"/>
                </form>
            </div>
            <div class="modal-footer">     
                <button type="button" class="btn btn-danger" id="confirmBtn">确认执行</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">取消关闭</button>
            </div>
        </div>
    </div>
</div>

<!-- forbiden talk Modal -->
<div class="modal fade" id="forbidTalkModal" tabindex="-1" role="dialog" aria-labelledby="forbidTalkModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="forbidTalkModalLabel">禁言内容</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" action="/gameuser/forbidTalk" method="POST" id="forbidTlakForm" onsubmit="return false;">        
                    <div class="control-group">
                        <label class="col-md-3 control-label">角色ID</label>
                        <div class="controls"><input type="text" class="form-control" name="roleid" readonly="true"/></div>
                    </div>
                    <div class="control-group">
                        <label class="col-md-3 control-label">区服ID</label>
                        <div class="controls"><input type="text" class="form-control" name="sid"  readonly="true"/></div>
                    </div>
                    <div class="control-group">
                        <label class="col-md-3 control-label">禁言时间</label>
                        <div class="controls"><input type="text" class="datetimepicker form-control"  name="starttime"/></div>
                    </div>
                    <div class="control-group">
                        <label class="col-md-3 control-label" for="">选择操作</label>
                        <div class="controls">
                            <select class="form-control" name="talktype" required="" autofocus="">
                                <option value="" selected="selected">请选择</option>
                                <option value="1">禁言操作</option>
                                <option value="0">解除禁言</option>
                            </select>
                        </div>
                    </div>
                    <input type="hidden" name="id"/>
                </form>
            </div>
            <div class="modal-footer">     
                <button type="button" class="btn btn-danger" id="confirmforbidBtn">确认执行</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">取消关闭</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="chatid" tabindex="-1" role="dialog" aria-labelledby="chatModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="chatModalLabel">加载聊天内容</h4>
            </div>
            <div class="modal-footer">     
                <button type="button" class="btn btn-success" id="addchatBtn">确认加载</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">取消关闭</button>
            </div>
        </div>
    </div>
</div>

