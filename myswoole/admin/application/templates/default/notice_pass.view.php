<?php
$insert_html = Page_Lib::loadJs('notice');

echo Page_Lib::head($insert_html);

?>
<!-- 站内导航 -->
<div id="content-header">
<h1>Dashboard</h1>
</div>
<div id="breadcrumb">
    <a href="/index/index" title="跳到首页" class="tip-bottom"><i class="icon-home"></i> 首页</a>
    <a href="#" class="current">管理走马灯</a>
</div>
<div class="container-fluid">					
<!-- 查询组件 begin-->
<div class="widget-box">
<div class="widget-title">
    <span class="icon">
    <i class="icon-search"></i>
    </span>
    <h5>查询条件</h5>
</div>
    <div class="widget-content">			
        <form  method="GET" class="form-horizontal" >         
                <div class="control-group">
			<div class="controls">                           
                            <input type="text" class="datetimepicker form-control" placeholder="创建日期"  name="createTime" style="width:auto;"/>
                            <span class="add-on"><i class="icon-th "></i></span>
                            <input type="text" class="datetimepicker form-control" placeholder="结束时间"  name="endtime" style="width:auto;"/>
                            <input  name="account" placeholder="请输入发布人" class="form-control" style="width:auto;">
                        <button class="btn btn-primary" type="submit" id="btn_date"><i class="icon-search icon-white"></i> 查询</button>
                        </div>
                    </div>
                
            </form>       
    </div>
</div>

 <div class="row-fluid">
    <div class="widget-box">
    <div class="widget-title">
	<span class="icon">
            <i class="icon-th"></i>
        </span>
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#tab1">审核中</a></li>
                <li><a data-toggle="tab" href="#tab2">发布中</a></li>
                <li><a data-toggle="tab" href="#tab3">未通过</a></li>
                <li><a data-toggle="tab" href="#tab4">已失效</a></li>
            </ul>
	</div>
        <div class="widget-content tab-content">
	  <!-- 1页表格 正文 -->
            <div id="tab1" class="tab-pane active">
		<table class="table table-bordered table-striped" >
                    <thead>
                        <tr>
                            <th>创建日期</th>
                            <th>区服</th>											
                            <th>内容</th>
                            <th>发布人</th>	
                            <th>状态</th>
                            <th>审核人</th>
                            <th>操作</th>					
                        </tr>
                    </thead>
                    <tbody>
                    <?php if (is_array($data) && !empty($data) ): ?>
                        
                    <?php foreach ($data as $listdata): ?>
                       <?php if ($listdata['tr_statu'] =="审核中" && $listdata['tr_endtime'] >= time(0) ):?>
                    <tr id="<?php echo $listdata['id']; ?>">
                            <td data-name="tr_id" style="display:none;"><?php echo$listdata['id']; ?></td> 
                            <td data-name="level" style="display:none;"><?php echo ($listdata['tr_level']>=0)?'普通':'紧急'; ?></td> 
                            <td data-name="starttime" style="display:none;"><?php echo date('Y-m-d H:i:s',$listdata['tr_startime']); ?></td> 
                            <td data-name="endtime" style="display:none;"><?php echo date('Y-m-d H:i:s',$listdata['tr_endtime']); ?></td>
                            <td data-name="playnum" style="display:none;"><?php echo $listdata['tr_trigtime']; ?></td> 
                            <td data-name="looptime" style="display:none;"><?php echo $listdata['tr_looptime']; ?></td>
                            <td data-name="sid" style="display:none;"><?php echo $listdata['tr_sid']; ?></td> 
                            <td data-name="createtime" style=" text-align: center;"><?php echo date("Y-m-d H:i:s",$listdata['tr_createtime']); ?></td>
                            <td data-name="server">
                                <button class="btn btn-link lookserver">查看</button>                                                             
                            </td>
                            <td data-name="context"><?php echo $listdata['tr_context']; ?></td>
                            <td data-name="sender" style=" text-align: center;"><?php echo $listdata['tr_sender']; ?></td>
                            <td data-name="statu" style=" text-align: center;"><?php echo $listdata['tr_statu']; ?></td>
                            <td data-name="auther" style=" text-align: center;"><?php echo $listdata['tr_auther']; ?></td>
                            <td style=" text-align: center;">           
                        <?php if ($editNotice): ?>
                            <button class="btn btn-link editNotice" >审核</button>                                              
                        <?php endif; ?>
                            </td>						
                        </tr>
                        <?php endif; ?>
                    <?php endforeach; ?>
                <?php endif; ?>
                </tbody>
                </table>							
            </div>
          
          <!-- 2页表格 正文 -->
            <div id="tab2" class="tab-pane">
		<table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>创建日期</th>
                            <th>区服</th>											
                            <th>内容</th>
                            <th>发布人</th>	
                            <th>状态</th>
                            <th>审核人</th>
                            <th>操作</th>					
                        </tr>
                    </thead>
                    <tbody>
                    <?php if (is_array($data) && !empty($data) ): ?>
                        
                    <?php foreach ($data as $listdata): ?>
                       <?php if ($listdata['tr_statu'] =="发布中" ):?>
                    <tr id="<?php echo $listdata['id']; ?>">
                            <td data-name="tr_id" style="display:none;"><?php echo$listdata['id']; ?></td> 
                            <td data-name="level" style="display:none;"><?php echo ($listdata['tr_level']>=0)?'普通':'紧急'; ?></td> 
                            <td data-name="starttime" style="display:none;"><?php echo date('Y-m-d H:i:s',$listdata['tr_startime']); ?></td> 
                            <td data-name="endtime" style="display:none;"><?php echo date('Y-m-d H:i:s',$listdata['tr_endtime']); ?></td>
                            <td data-name="playnum" style="display:none;"><?php echo $listdata['tr_trigtime']; ?></td> 
                            <td data-name="looptime" style="display:none;"><?php echo $listdata['tr_looptime']; ?></td>
                            <td data-name="sid" style="display:none;"><?php echo $listdata['tr_sid']; ?></td> 
                            <td data-name="createtime" style=" text-align: center;"><?php echo date("Y-m-d H:i:s",$listdata['tr_createtime']); ?></td>
                            <td data-name="server">
                                <button class="btn btn-link lookserver">查看</button>                                                             
                            </td>
                            <td data-name="context"><?php echo $listdata['tr_context']; ?></td>
                            <td data-name="sender" style=" text-align: center;"><?php echo $listdata['tr_sender']; ?></td>
                            <td data-name="statu" style=" text-align: center;"><?php echo $listdata['tr_statu']; ?></td>
                            <td data-name="auther" style=" text-align: center;"><?php echo $listdata['tr_auther']; ?></td>
                            <td style=" text-align: center;">           
                        <?php if ($lookNotice): ?>
                            <button class="btn btn-link lookNotice" >查看内容</button>                                              
                        <?php endif; ?>
                            </td>						
                        </tr>
                        <?php endif; ?>
                    <?php endforeach; ?>
                <?php endif; ?>
                </tbody>
                </table>							
            </div>
          
          <!-- 3页表格 正文 -->
            <div id="tab3" class="tab-pane">
		<table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>创建日期</th>
                            <th>区服</th>											
                            <th>内容</th>
                            <th>发布人</th>	
                            <th>状态</th>
                            <th>审核人</th>
                            <th>操作</th>					
                        </tr>
                    </thead>
                    <tbody>
                    <?php if (is_array($data) && !empty($data) ): ?>
                        
                    <?php foreach ($data as $listdata): ?>
                       <?php if ($listdata['tr_statu'] =="未通过" && $listdata['tr_endtime'] >= time(0)):?>
                    <tr id="<?php echo $listdata['id']; ?>">
                            <td data-name="tr_id" style="display:none;"><?php echo$listdata['id']; ?></td> 
                            <td data-name="level" style="display:none;"><?php echo ($listdata['tr_level']>=0)?'普通':'紧急'; ?></td> 
                            <td data-name="starttime" style="display:none;"><?php echo date('Y-m-d H:i:s',$listdata['tr_startime']); ?></td> 
                            <td data-name="endtime" style="display:none;"><?php echo date('Y-m-d H:i:s',$listdata['tr_endtime']); ?></td>
                            <td data-name="playnum" style="display:none;"><?php echo $listdata['tr_trigtime']; ?></td> 
                            <td data-name="looptime" style="display:none;"><?php echo $listdata['tr_looptime']; ?></td>
                            <td data-name="sid" style="display:none;"><?php echo $listdata['tr_sid']; ?></td> 
                            <td data-name="createtime" style=" text-align: center;"><?php echo date("Y-m-d H:i:s",$listdata['tr_createtime']); ?></td>
                            <td data-name="server">
                                <button class="btn btn-link lookserver">查看</button>                                                             
                            </td>
                            <td data-name="context"><?php echo $listdata['tr_context']; ?></td>
                            <td data-name="sender" style=" text-align: center;"><?php echo $listdata['tr_sender']; ?></td>
                            <td data-name="statu" style=" text-align: center;"><?php echo $listdata['tr_statu']; ?></td>
                            <td data-name="auther" style=" text-align: center;"><?php echo $listdata['tr_auther']; ?></td>                          
                            <td style=" text-align: center;">           
                        <?php if ($addServer): ?>
                            <button class="btn btn-link addServerBtn">修改服务器</button>
                        <?php endif;?>
                        <?php if ($alterNotice): ?>
                            <button class="btn btn-link alterNotice" >修改内容</button>                                              
                        <?php endif; ?>
                            </td>						
                        </tr>
                        <?php endif; ?>
                    <?php endforeach; ?>
                <?php endif; ?>
                </tbody>
                </table>							
            </div>
          
          <!-- 4页表格 正文 -->
            <div id="tab4" class="tab-pane">
		<table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>创建日期</th>
                            <th>区服</th>											
                            <th>内容</th>
                            <th>发布人</th>	
                            <th>状态</th>
                            <th>审核人</th>
                            <th>操作</th>					
                        </tr>
                    </thead>
                    <tbody>
                    <?php if (is_array($data) && !empty($data) ): ?>
                        
                    <?php foreach ($data as $listdata): ?>
                       <?php if ($listdata['tr_statu'] == "已失效"|| $listdata['tr_endtime'] < time(0)):?>
                            <tr id="<?php echo $listdata['id']; ?>">
                            <td data-name="tr_id" style="display:none;"><?php echo$listdata['id']; ?></td> 
                            <td data-name="level" style="display:none;"><?php echo ($listdata['tr_level']>=0)?'普通':'紧急'; ?></td> 
                            <td data-name="starttime" style="display:none;"><?php echo date('Y-m-d H:i:s',$listdata['tr_startime']); ?></td> 
                            <td data-name="endtime" style="display:none;"><?php echo date('Y-m-d H:i:s',$listdata['tr_endtime']); ?></td>
                            <td data-name="playnum" style="display:none;"><?php echo $listdata['tr_trigtime']; ?></td> 
                            <td data-name="looptime" style="display:none;"><?php echo $listdata['tr_looptime']; ?></td>
                            <td data-name="sid" style="display:none;"><?php echo $listdata['tr_sid']; ?></td> 
                            <td data-name="createtime" style=" text-align: center;"><?php echo date("Y-m-d H:i:s",$listdata['tr_createtime']); ?></td>
                            <td data-name="server">
                                <button class="btn btn-link lookserver">查看</button>                                                             
                            </td>
                            <td data-name="context"><?php echo $listdata['tr_context']; ?></td>
                            <td data-name="sender" style=" text-align: center;"><?php echo $listdata['tr_sender']; ?></td>
                            <td data-name="statu" style=" text-align: center;"><?php echo "已失效"; ?></td>
                            <td data-name="auther" style=" text-align: center;"><?php echo $listdata['tr_auther']; ?></td>
                            <td style=" text-align: center;">           
                        <?php if ($lookNotice): ?>
                            <button class="btn btn-link lookNotice" >查看内容</button>                                              
                        <?php endif; ?>
                            </td>						
                        </tr>
                        <?php endif; ?>
                    <?php endforeach; ?>
                <?php endif; ?>
                </tbody>
                </table>							
            </div>
        </div> 
    </div>    
</div>

<!-- 分页组件 begin -->
<!--<div class="row center" style="text-align: center;">	
<?php //echo htmlspecialchars_decode($pagehtml);?>
</div>-->
<!-- 分页组件 end -->
<!-- 表格 end -->
 <?php echo Page_Lib::footer();?>

<!--editNotice Modal -->
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

<!--serverlist Modal -->
<div class="modal fade" id="serverListModal" tabindex="-1" role="dialog" aria-labelledby="serverListModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="serverListModalLabel">服务器列表</h4>
            </div>
            <div class="modal-body">
                <button id="checkAll" class="btn btn-info">全选</button>
                <button id="checkNone" class="btn btn-info">取消全选</button>
                <table class="table table-striped table-bordered" id="serverlist"> 
                        <input type="hidden" name="tr_id"/>                       
                            <?php if (is_array($servers) && !empty($servers)): ?>                                     
                                <?php for ($i = 0; $i < count($servers);$i+=4): ?>
                                    <tr><?php if(!empty($servers[$i])):?>
                                    <td>
                                        <div class="checkbox">
                                        <label class="checkbox-inline">
                                         <?php echo '<input name="servercheckbox" type= "checkbox"  value="'.$servers[$i]['sid'].'">'.$servers[$i]['sid']."区 ".$servers[$i]['sname'];?>
                                        </label>
                                        </div> 
                                    </td>
                                    <?php else:?>
                                    <td></td>
                                        <?php endif;?>
                                    <?php if(!empty($servers[$i+1])):?>
                                    <td>
                                        <div class="checkbox">
                                        <label class="checkbox-inline">
                                           <?php echo '<input name="servercheckbox" type= "checkbox"  value="'.$servers[$i+1]['sid'].'">'.$servers[$i+1]['sid']."区 ".$servers[$i+1]['sname'];?>
                                        </label>
                                        </div> 
                                    </td>
                                    <?php else:?>
                                    <td></td>
                                        <?php endif;?>
                                    <?php if(!empty($servers[$i+2])):?>
                                    <td>
                                       <div class="checkbox">
                                        <label class="checkbox-inline">
                                           <?php echo '<input name="servercheckbox" type= "checkbox"  value="'.$servers[$i+2]['sid'].'">'.$servers[$i+2]['sid']."区 ".$servers[$i+2]['sname'];?>
                                        </label>
                                        </div> 
                                    </td>
                                    <?php else:?>
                                    <td></td>
                                     <?php endif;?>
                                    <?php if(!empty($servers[$i+3])):?>
                                    <td>
                                     <div class="checkbox">
                                        <label class="checkbox-inline">
                                           <?php echo '<input name="servercheckbox" type= "checkbox"  value="'.$servers[$i+3]['sid'].'">'.$servers[$i+3]['sid']."区 ".$servers[$i+3]['sname'];?>
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
                <button type="button" class="btn btn-primary" id="getServerbtn">确认添加</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">取消关闭</button>
            </div>
        </div>
    </div>
</div>
<!--editNotice Modal -->
<div class="modal fade" id="editNoticeModal" tabindex="-1" role="dialog" aria-labelledby="editNoticeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="editNoticeModalLabel">走马灯公告</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" action="/notice/editNotice" method="POST" id="editNoticeForm" onsubmit="return false;">
                    <input type="hidden" name="tr_id"/>
                    <input type="hidden" name="sid"/>
                   <div class="control-group">
                        <label class="col-md-3 control-label">发布人签名</label>
                        <div class="controls"><input type="text" class="form-control" name="sender" readonly="true"/></div>
                    </div>
                    <div class="control-group">
                        <label class="col-md-3 control-label">播放等级</label>
                        <div class="controls"><input type="text" class="form-control" name="level" readonly="true" /></div> 
                    </div>
                    <div class="control-group">
                        <label class="col-md-3 control-label">播放开始时间</label>
                        <div class="controls"><input type="text" class="datetimepicker form-control"  name="starttime" readonly="true"/></div>
                    </div>
                    <div class="control-group">
                        <label class="col-md-3 control-label">播放结束时间</label>
                        <div class="controls"><input type="text" class="datetimepicker form-control"  name="endtime" readonly="true"/></div>
                    </div>
                    <div class="control-group">
                        <label class="col-md-3 control-label">播放次数</label>
                        <div class="controls"><input type="text" class="form-control"  name="playnum" readonly="true"/></div>
                    </div>
                    <div class="control-group">
                        <label class="col-md-3 control-label">循环间隔</label>
                        <div class="controls"><input type="text" class="form-control"  name="looptime" readonly="true"/></div>
                    </div>
                    <div class="control-group">
                        <label class="col-md-3 control-label">公告内容</label>
                        <div class="controls">
                            <textarea class="form-control " name="context" rows="7" maxlength="20" placeholder="最多输入20个汉字,包括标点符号和空格" readonly="true"></textarea>
                        </div>
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
                    <input type="hidden" name="id"/>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="editNoticeBtn">确认通过</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">取消关闭</button>
            </div>
        </div>
    </div>
</div>

<!--editNotice Modal -->
<div class="modal fade" id="lookNoticeModal" tabindex="-1" role="dialog" aria-labelledby="lookNoticeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="editNoticeModalLabel">走马灯公告</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" action="#" method="POST" id="lookNoticeForm" onsubmit="return false;">
                   <div class="control-group">
                        <label class="col-md-3 control-label">发布人签名</label>
                        <div class="controls"><input type="text" class="form-control" name="sender" readonly="true"/></div>
                    </div>
                    <div class="control-group">
                        <label class="col-md-3 control-label">播放等级</label>
                            <div class="controls"><input type="text" class="form-control" name="level" readonly="true"/></div> 
                    </div>
                    <div class="control-group">
                        <label class="col-md-3 control-label">播放开始时间</label>
                        <div class="controls"><input type="text" class="datetimepicker form-control"  name="starttime" readonly="true"/></div>
                    </div>
                    <div class="control-group">
                        <label class="col-md-3 control-label">播放结束时间</label>
                        <div class="controls"><input type="text" class="datetimepicker form-control"  name="endtime" readonly="true"/></div>
                    </div>
                    <div class="control-group">
                        <label class="col-md-3 control-label">播放次数</label>
                        <div class="controls"><input type="text" class="form-control"  name="playnum" readonly="true"/></div>
                    </div>
                    <div class="control-group">
                        <label class="col-md-3 control-label">时间间隔</label>
                        <div class="controls"><input type="text" class="form-control"  name="looptime" readonly="true"/></div>
                    </div>
                    <div class="control-group">
                        <label class="col-md-3 control-label">公告内容</label>
                        <div class="controls">
                            <textarea class="form-control " name="context" rows="7" maxlength="20" placeholder="最多输入20个汉字,包括标点符号和空格" readonly="true"></textarea>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">取消关闭</button>
            </div>
        </div>
    </div>
</div>



<!--editNotice Modal -->
<div class="modal fade" id="delNoticeModal" tabindex="-1" role="dialog" aria-labelledby="delNoticeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="delNoticeModalLabel">走马灯公告</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" action="/notice/delNotice" method="POST" id="delNoticeForm" onsubmit="return false;">
                    <input type="hidden" name="tr_id"/>
                    <input type="hidden" name="statu"/>
                   <div class="control-group">
                        <label class="col-md-3 control-label">发布人签名</label>
                        <div class="controls"><input type="text" class="form-control" name="sender" readonly="true"/></div>
                    </div>
                    <div class="control-group">
                        <label class="col-md-3 control-label">审核人签名</label>
                        <div class="controls"><input type="text" class="form-control" name="auther" readonly="true" /></div>
                    </div>
                  
                    <div class="control-group">
                        <label class="col-md-3 control-label">公告内容</label>
                        <div class="controls">
                            <textarea class="form-control" name="context" readonly="true" rows="5"></textarea>
                        </div>
                    </div>
                    <input type="hidden" name="id"/>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="delNoticebtn">确认删除</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">取消关闭</button>
            </div>
        </div>
    </div>
</div>


<!--editNotice Modal -->
<div class="modal fade" id="alterNoticeModal" tabindex="-1" role="dialog" aria-labelledby="alterNoticeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="alterNoticeModalLabel">走马灯公告</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" action="/notice/editNotice" method="POST" id="alterNoticeForm" onsubmit="return false;">
                    <input type="hidden" name="tr_id"/>
                    <input type="hidden" name="sid"/>
                    <div class="control-group">
                        <label class="col-md-3 control-label">播放等级</label>
                            <div class="controls">
                            <select class="form-control" name="level" required="" autofocus="">
                                <option value="" selected="selected">请选择</option>
                                <option value="0">普通</option>
                                <option value="-1">紧急</option>
                            </select>
                        </div> 
                    </div>
                    <div class="control-group">
                        <label class="col-md-3 control-label">播放开始时间</label>
                        <div class="controls"><input type="text" class="datetimepicker form-control"  name="starttime"/></div>
                    </div>
                    <div class="control-group">
                        <label class="col-md-3 control-label">播放结束时间</label>
                        <div class="controls"><input type="text" class="datetimepicker form-control"  name="endtime"/></div>
                    </div>
                    <div class="control-group">
                        <label class="col-md-3 control-label">播放次数</label>
                        <div class="controls"><input type="text" class="form-control"  name="playnum"/></div>
                    </div>
                    <div class="control-group">
                        <label class="col-md-3 control-label">循环间隔</label>
                        <div class="controls"><input type="text" class="form-control"  name="looptime"/></div>
                    </div>
                    <div class="control-group">
                        <label class="col-md-3 control-label">公告内容</label>
                        <div class="controls">
                            <textarea class="form-control " name="context" rows="7" maxlength="20" placeholder="最多输入20个汉字,包括标点符号和空格"></textarea>
                        </div>
                    </div>
                    <input type="hidden" name="id"/>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="alterNoticeBtn">确认修改</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">取消关闭</button>
            </div>
        </div>
    </div>
</div>
