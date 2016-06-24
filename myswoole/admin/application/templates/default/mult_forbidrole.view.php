<?php
$insert_html= Page_Lib::loadJs('ajaxupload');
$insert_html.= Page_Lib::loadJs('loadfile');
$insert_html .= Page_Lib::loadJs('gamerole');
echo Page_Lib::head($insert_html);
?>
<div id="content-header">
    <h1>Dashboard</h1>
    <div class="btn-group">        
<a class="btn btn-large btn-success tip-bottom" title="封号" data-toggle="modal" data-backdrop="static" data-target="#forbidAccountModal" id="forbidaccountbtn"><i class="icon-wrench"></i>封号操作</a>
<a class="btn btn-large btn-default tip-bottom" title="禁言" data-toggle="modal" data-backdrop="static" data-target="#forbidTalkModal" id="forbidtalkbtn"><i class="icon-ban-circle"></i> 禁言操作</a>
 </div>
</div>
<div id="breadcrumb">
    <a href="/index/index" title="跳到首页" class="tip-bottom"><i class="icon-home"></i> 首页</a>
    <a href="#" class="current">封号禁言玩家</a>
 </div>
<div class="container-fluid">
    <div class="row-fluid">
        <div class="widget-box">
	<div class="widget-title">
            <span class="icon">
            <i class="icon-th"></i>
            </span>
            <div class="buttons">
                <a title="添加名单" class="btn btn-success btn-mini" id="addName" ><i class="icon-plus"></i> 导入文件</a>
            </div>
            </div>  
        </div>
        <div class="widget-content">
                <button id="checkAll" class="btn btn-info">全选</button>
                <button id="checkNone" class="btn btn-info">取消全选</button>
                <input type="hidden" name="tr_id"/>
               <table class="table table-bordered table-striped"  id="listrole">
                                <tr>
                                    <th>选项</th>
                                    <th>区服</th>											
                                    <th>角色ID</th>					
                                </tr>
                           
                </table>
                 
        </div>
    </div>
</div>
    
 <?php echo Page_Lib::footer(); ?>
<div class="modal fade" id="addFileModal" tabindex="-1" role="dialog" aria-labelledby="addFileModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="addFileModalLabel">选择文件</h4>
            </div>
            <div class="modal-body">
                <div class="control-group">
                    <label class="col-md-3 control-label">
                    <input type="button" class="btn btn-success" value="导入XML或者txt文件" id="selector" />
                    </label>
                    <div class="controls">
                    <input type="text" readonly="readonly" value="" id="state" />
                    </div>
                </div>
                
            </div>
            <div class="modal-footer">     
                <button type="button" class="btn btn-success" id="addFileBtn">确认添加</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">取消关闭</button>
            </div>
        </div>
    </div>
</div>

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
                    <input type="hidden" name="listroleid"/>
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
                        <div class="controls"><input type="text" class="datetimepicker form-control" name="starttime"/></div>
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
                    <input type="hidden" name="listroleid"/>
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
