<?php
$insert_html = Page_Lib::loadJs('multselect');
$insert_html .= Page_Lib::loadJs('active');
$insert_html .= Page_Lib::loadJs('activity');
$insert_html .= Page_Lib::loadJs('lookserver');
echo Page_Lib::head($insert_html);
?>
<!-- 站内导航 -->
<div id="content-header">
<h1>后台基本操作</h1>
<div class="btn-group">        
<a class="btn btn-large btn-success tip-bottom" title="活动" data-toggle="modal" data-backdrop="static" data-target="#addActivityModal"><i class="icon-plus"></i>拉取服务器配置活动</a>
</div>
</div>
<div id="breadcrumb">
    <a href="/index/index" title="跳到首页" class="tip-bottom"><i class="icon-home"></i> 首页</a>
    <a href="#" class="current">活动列表页面</a>
</div>
 <div class="row-fluid">
    <div class="widget-box">
    <div class="widget-title">
	<span class="icon">
            <i class="icon-th"></i>
        </span>
            <ul class="nav nav-tabs" role="tablist" id="maintab">
                <li class="active"><a data-toggle="tab" href="#tab1" onclick="loadpage(1)">未审核</a></li>
                <li><a data-toggle="tab" href="#tab2" onclick="loadpage(2)">审核中</a></li>
                <li><a data-toggle="tab" href="#tab3" onclick="loadpage(3)" >发布中</a></li>
                <li><a data-toggle="tab" href="#tab4" onclick="loadpage(4)" >未通过</a></li>
                <li><a data-toggle="tab" href="#tab5" onclick="loadpage(5)" >已失效</a></li>
            </ul>
	</div>
        <div class="widget-content tab-content">
	  <!-- 1页表格 正文 -->
            <div id="tab1" class="tab-pane active">
		<table class="table table-bordered table-striped" id="load1">
                    <thead>
                        <tr>
                            <th>区服</th>
                            <th>活动名称</th>
                            <th>活动显示时间</th>
                            <th>活动结束时间</th>
                            <th>审核人</th>	
                            <th>操作</th>					
                        </tr>
                    </thead>
                    <tbody >
                    <div style="text-align: center;" id="loading1">                
                    </div> 
                    <?php if (is_array($data["act1"]) && !empty($data["act1"]) ): ?>                       
                    <?php foreach ($data["act1"] as $listdata): ?>
                     <tr id="<?php echo $listdata['id']; ?>">
                        <td data-name="id" style="display:none;"><?php echo$listdata['id']; ?></td>  
                        <td data-name="sid" style="display:none;"><?php echo $listdata['sid']; ?></td> 
                        <td data-name="actid" style="display:none;"><?php echo $listdata['actid']; ?></td>
                        <td data-name="param" style="display:none;"><?php echo $listdata['param']; ?></td>
                        <td data-name="configdesc" style="display: none"><?php echo $listdata['configdesc']; ?></td>
                        <td data-name="server" style=" text-align: center;">
                            <button class="btn btn-link lookserver" onclick="lookserver(<?php echo  $listdata['id']; ?>)">查看</button>                                                
                        </td>
                        <td data-name="title" style="text-align: center;"><?php echo $listdata['title']; ?></td>
                        <td data-name="starttime" style="text-align: center;"><?php echo date('Y-m-d H:i:s',$listdata['starttime']); ?></td> 
                        <td data-name="endtime" style="text-align: center;"><?php echo date('Y-m-d H:i:s',$listdata['endtime']); ?></td>
                        <td data-name="content" style="display:none;"><?php echo $listdata['content']; ?></td>
                        <td data-name="desc" style="display: none"><?php echo $listdata['desc']; ?></td>
                        <td data-name="creator" style=" text-align: center;"><?php echo $listdata['creator']; ?></td>                     
                        <td>  
                        <button class="btn btn-link  lookBtn" onclick="lookBtn(<?php echo $listdata['id']; ?> )" >配置</button>
                        <?php if($alertBookActivity):?>
                        <button class="btn btn-link  lookBookBtn" onclick="lookBookBtn(<?php echo $listdata['id']; ?>)">备注</button>
                        <?php endif;?>
                        <?php if ($submitActivity): ?>             
                        <button class="btn btn-link submitBtn" onclick="submitBtn(<?php echo  $listdata['id']; ?>)">提交</button>
                        <?php endif; ?>
                        </td>						
                    </tr>
                <?php endforeach; ?>
                <?php endif; ?>
                </tbody>
                </table>							
            </div>
          
          <!-- 2页表格 正文 -->
            <div id="tab2" class="tab-pane" >
		<table class="table table-bordered table-striped" id="load2">
                    <thead>
                        <tr>
                            <th>区服</th>
                            <th>活动名称</th>
                            <th>活动显示时间</th>
                            <th>活动结束时间</th>
                            <th>审核人</th>	
                            <th>操作</th>					
                        </tr>
                    </thead>
                    <tbody>
                    <div style="text-align: center;" id="loading2">                
                    </div> 
                    
                </tbody>
                </table>							
            </div>
          
          <!-- 3页表格 正文 -->
            <div id="tab3" class="tab-pane">
		<table class="table table-bordered table-striped" id="load3">
                    <thead>
                        <tr>
                            <th>区服</th>
                            <th>活动名称</th>
                            <th>活动显示时间</th>
                             <th>活动结束时间</th>
                              <th>备注</th>
                            <th>审核人</th>	
                            <th>发布人</th>
                            <th>操作</th>					
                        </tr>
                    </thead>
                    <tbody >
                    <div style="text-align: center;" id="loading3">                
                    </div>                   
                </tbody>
                </table>							
            </div>
          
          <!-- 4页表格 正文 -->
            <div id="tab4" class="tab-pane">
		<table class="table table-bordered table-striped" id="load4">
                    <thead>
                        <tr>
                            <th>区服</th>
                            <th>活动名称</th>
                            <th>活动显示时间</th>
                             <th>活动结束时间</th>
                              <th>备注</th>
                            <th>审核人</th>
                            <th>操作</th>					
                        </tr>
                    </thead>
                    <tbody >
                        <div style="text-align: center;" id="loading4">                
                        </div>
                    
                    </tbody>
                </table>							
            </div>
          <!-- 4页表格 正文 -->
            <div id="tab5" class="tab-pane">
		<table class="table table-bordered table-striped" id="load5">
                    <thead>
                        <tr>
                            <th>区服</th>
                            <th>活动名称</th>
                            <th>活动显示时间</th>
                            <th>活动结束时间</th>
                            <th>备注</th>
                            <th>审核人</th>						
                        </tr>
                    </thead>
                    <tbody >
                        <div style="text-align: center;" id="loading5">                
                        </div>
                    
                    </tbody>
                </table>							
            </div>
        </div> 
    </div>    
</div>
<!-- 分页组件 begin -->
<!--<div class="row center" style="text-align: center;">	-->
<?php //echo htmlspecialchars_decode($pagehtml);?> 
<!--</div>-->
<!-- 分页组件 end -->
<!-- 表格 end -->
 <?php //echo Page_Lib::footer();?>

<!--context Modal -->
<div class="modal fade" id="lookBookModal" tabindex="-1" role="dialog" aria-labelledby="lookBookModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="lookBookModalLabel">备注内容</h4>
            </div>
          <div class="modal-body">
                <form class="form-horizontal" action="/active/active" method="POST" id="alertActiveForm" onsubmit="return false;">        
                    <table class="table  table-striped" > 
                    <tbody>                       
                        <tr>
                            <td>
                               <div class="control-group">
                        <label class="control-label">*备注</label>
                         <div class="controls"><textarea class="form-control " name="desc" rows="7"   maxlength="500" placeholder="最多输入500汉字,包括标点符号和空格"></textarea></div>
                    </div> 
                            </td>
                            <td></td>
                        </tr>
                          
                        </tbody>
                    </table>
                    <input type="hidden" name="id"/>
                </form>
            </div>
            <div class="modal-footer">     
                <button type="button" class="btn btn-success" id="alertActivityBtn">确认修改</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">取消关闭</button>
            </div>
        </div>
    </div>
</div>

<!--serverlist Modal -->
<div class="modal fade" id="lookserverModal" tabindex="-1" role="dialog" aria-labelledby="lookserverModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="lookserverModalLabel">服务器列表</h4>
            </div>
            <div class="modal-body">
             <table class="table table-striped table-bordered" id="lookserverlist" > 
             </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
            </div>
        </div>
    </div>
</div>

<!--addNotice Modal -->
<div class="modal fade" id="addloginNoticeModal" tabindex="-1" role="dialog" aria-labelledby="addloginNoticeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="addloginNoticeModalLabel">活动内容</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" action="/active/active" method="POST" id="saveActiveForm" onsubmit="return false;">        
                    <table class="table  table-striped" > 
                    <tbody>
                        <div class="control-group">
                          <div class="form-group">
                                    <select class="form-control"  id="liOption"  multiple="multiple"  name="sid[]" size='10' >
                                         <?php if (is_array($servers) && !empty($servers)) :?>
                                           <?php foreach ($servers as $server):?>
                                           <?php echo '<option value="'.$server['sid'].'">'.$server["sid"].'服 '.$server['sname'].'</option>';?>
                                            <?php endforeach;?>
                                        <?php endif;?>
                                    </select>
                            </div> 

                      </div>                                               
                        <tr>
                            <td>
                                <div class="control-group">
                                    <label class="control-label">*活动开始时间</label>
                                    <div class="controls"><input type="text" class="datetimepicker form-control "   placeholder="请选择时间" name="starttime"/></div>
                                </div> 
                            </td>
                            <td></td>
                        </tr>
                        <tr>
                        <tr>
                            <td>
                                <div class="control-group">
                                    <label class="control-label">*活动结束时间</label>
                                    <div class="controls"><input type="text" class="datetimepicker form-control "   placeholder="请选择时间" name="endtime"/></div>
                                </div> 
                            </td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>
                               <div class="control-group">
                        <label class="control-label">*备注</label>
                         <div class="controls"><textarea class="form-control " name="desc" rows="7" maxlength="500" placeholder="最多输入500汉字,包括标点符号和空格"></textarea></div>
                    </div> 
                            </td>
                            <td></td>
                        </tr>
                          
                        </tbody>
                    </table>
                    <input type="hidden" name="id"/>
                </form>
            </div>
            <div class="modal-footer">     
                <button type="button" class="btn btn-success" id="alterActivityBtn">确认修改</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">取消关闭</button>
            </div>
        </div>
    </div>
</div>

<!--context Modal -->
<div class="modal fade" id="lookcontextModal" tabindex="-1" role="dialog" aria-labelledby="lookcontextModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="lookserverModalLabel">配置内容</h4>
            </div>
            <div class="modal-body">
             <table class="table table-striped table-bordered" id="noticecontext" > 
             </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
            </div>
        </div>
    </div>
</div>

<!--edit Modal -->
<div class="modal fade" id="submitActivityModal" tabindex="-1" role="dialog" aria-labelledby="submitActivityModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="submitActivityModalLabel">提交审核内容</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" action="/activity/submitActivity" method="POST" id="submitActivityForm" onsubmit="return false;">
                    <input type="hidden" name="id"/> 
                    <div class="control-group">
                        <label class="col-md-3 control-label">显示时间</label>
                        <div class="controls"><input type="text" class="datetimepicker form-control"  name="starttime"/></div>
                    </div>
                    <div class="control-group">
                        <label class="col-md-3 control-label">失效时间</label>
                        <div class="controls"><input type="text" class="datetimepicker form-control"  name="endtime" /></div>
                    </div>
                    <div class="control-group">
                        <label class="col-md-3 control-label">活动标题</label>
                        <div class="controls"><input type="text" class="form-control"  name="title"  readonly="true"/></div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">               
                <button type="button" class="btn btn-primary" id="editBtn">确认提交</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">取消关闭</button>
            </div>
        </div>
    </div>
</div>

<!--edit Modal -->
<div class="modal fade" id="sendActivityModal" tabindex="-1" role="dialog" aria-labelledby="sendActivityModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="sendActivityModalLabel">审核发布内容</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" action="/activity/sendActivity" method="POST" id="sendActivityForm" onsubmit="return false;">
                    <input type="hidden" name="id"/> 
                    <input type="hidden" name="sid"/>
                    <input type="hidden" name="actid"/>
                    <input type="hidden" name="param"/>
                    <input type="hidden" name="content"/>
                    <div class="control-group">
                        <label class="col-md-3 control-label">显示时间</label>
                        <div class="controls"><input type="text" class="datetimepicker form-control"  name="starttime"  readonly="true"/></div>
                    </div>
                    <div class="control-group">
                        <label class="col-md-3 control-label">失效时间</label>
                        <div class="controls"><input type="text" class="datetimepicker form-control"  name="endtime"  readonly="true"/></div>
                    </div>
                    <div class="control-group">
                        <label class="col-md-3 control-label">活动标题</label>
                        <div class="controls"><input type="text" class="form-control"  name="title"  readonly="true"/></div>
                    </div>
                    <div class="control-group">
                        <label class="col-md-3 control-label" for="">审核结果</label>
                        <div class="controls">
                            <select class="form-control" name="result" required="" autofocus="">
                                <option value="" selected="selected">请选择</option>
                                <option value="1">通过</option>
                                <option value="2">未通过</option>
                            </select>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">               
                <button type="button" class="btn btn-primary" id="subBtn">确认发送</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">取消关闭</button>
            </div>
        </div>
    </div>
</div>


<!--edit Modal -->
<div class="modal fade" id="sendAlertActivityModal" tabindex="-1" role="dialog" aria-labelledby="sendAlertActivityModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="sendAlertActivityModalLabel">审核修改内容</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" action="/activity/alertSendActivity" method="POST" id="sendAlertActivityForm" onsubmit="return false;">
                    <input type="hidden" name="id"/> 
                    <input type="hidden" name="sid"/>
                    <input type="hidden" name="actid"/>
                    <input type="hidden" name="param"/>
                    <input type="hidden" name="content"/> 
                    <div class="control-group">
                        <label class="col-md-3 control-label">显示时间</label>
                        <div class="controls"><input type="text" class="datetimepicker form-control"  name="starttime" /></div>
                    </div>
                    <div class="control-group">
                        <label class="col-md-3 control-label">失效时间</label>
                        <div class="controls"><input type="text" class="datetimepicker form-control"  name="endtime" /></div>
                    </div>
                    <div class="control-group">
                        <label class="col-md-3 control-label">活动标题</label>
                        <div class="controls"><input type="text" class="form-control"  name="title"  readonly="true" /></div>
                    </div>
                    <div class="control-group">
                        <label class="col-md-3 control-label">*修改理由</label>
                        <div class="controls"><input type="text" class="form-control"   required autofocus=""  name="reason"/></div>
                    </div>
                    <div class="control-group">
                        <label class="col-md-3 control-label" for="">审核结果</label>
                        <div class="controls">
                            <select class="form-control" name="result" required="" autofocus="">
                                <option value="" selected="selected">请选择</option>
                                <option value="1">通过修改</option>
                            </select>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">               
                <button type="button" class="btn btn-primary" id="alertSendBtn">修改发布</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">取消关闭</button>
            </div>
        </div>
    </div>
</div>




<!--addNotice Modal -->
<div class="modal fade" id="addActivityModal" tabindex="-1" role="dialog" aria-labelledby="addActivityModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="addActivityModalLabel">加载活动选择对应区服</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" action="/active/loadactivity" method="POST" id="addActivityForm" onsubmit="return false;">        
                        <div class="control-group">
                          <div class="form-group">
                                    <select class="form-control"  id="listServer"  multiple="multiple"  name="sid[]" size='10' >
                                         <?php if (is_array($servers) && !empty($servers)) :?>
                                           <?php foreach ($servers as $server):?>
                                           <?php echo '<option value="'.$server['sid'].'">'.$server["sid"].'服 '.$server['sname'].'</option>';?>
                                            <?php endforeach;?>
                                        <?php endif;?>
                                    </select>
                            </div> 

                      </div>       
                </form>
            <div class="modal-footer">     
                <button type="button" class="btn btn-success" id="loadBtn">加载配置活动</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">取消关闭</button>
            </div>
        </div>
    </div>
</div>
</div>
