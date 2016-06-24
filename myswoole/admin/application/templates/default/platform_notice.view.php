<?php
$insert_html = Page_Lib::loadJs('platformnotice');

echo Page_Lib::head($insert_html);

?>
<!-- 站内导航 -->
<div id="content-header">
<h1>Dashboard</h1>
<div class="btn-group">
<a class="btn btn-large btn-info tip-bottom" title="添加公告" data-toggle="modal" data-backdrop="static" data-target="#addNoticeModal" id="addNotice"><i class="icon-plus-sign"></i>添加公告</a>
</div>
</div>
<div id="breadcrumb">
    <a href="/index/index" title="跳到首页" class="tip-bottom"><i class="icon-home"></i> 首页</a>
    <a href="#" class="current">添加公告</a>
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
                            <span class="add-on"><i class="icon-th "></i></span>
                        <button class="btn btn-primary" type="submit" id="btn_date"><i class="icon-search icon-white"></i> 查询</button>
                        </div>
                    </div>
                
            </form>       
    </div>
</div>
 <!-- 查询组件 end-->
<table class="table table-bordered table-striped" id="noticeTable">
<thead>
    <tr>
        <th>创建日期</th>
        <th>生效日期</th>											
        <th>结束日期</th>
        <th>按钮文字</th>
        <th>标题</th>	
        <th>内容</th>        
        <th>操作</th>															
    </tr>
    </thead>
    <tbody>
      <?php if (is_array($data) && !empty($data)): ?>
        <?php foreach ($data as $listdata): ?>
            <tr id="<?php echo $listdata['id']; ?>">
               <td data-name="id" style="display:none;"><?php echo$listdata['id']; ?></td>
               <td data-name="createtime" style=" text-align: center;"><?php echo date("Y-m-d H:i:s",$listdata['createtime']); ?></td>
                <td data-name="starttime" style="text-align: center;"><?php echo date('Y-m-d H:i:s',$listdata['starttime']); ?></td> 
                <td data-name="endtime" style="text-align: center;"><?php echo date('Y-m-d H:i:s',$listdata['endtime']); ?></td>
                <td data-name="btntext" style="text-align: center;"><?php echo $listdata['btntext']; ?></td> 
                <td data-name="title" style="text-align: center;"><?php echo $listdata['title']; ?></td>
                <td data-name="context" style="display:none;"><?php echo $listdata['context']; ?></td> 
                
                <td data-name="lookcontext"  style=" text-align: center;">
                    <button class="btn btn-link lookcontext">查看</button>                                                             
                </td>            
                <td style=" text-align: center;">           
            <?php if ($editNotice): ?>
                <button class="btn btn-link alterNotice">编辑</button> 
            <?php endif;?>
            <?php if ($sumbitNotice): ?>
                <button class="btn btn-link submitNotice">发布</button> 
            <?php endif;?>
                <?php if ($delNotice): ?>
                <button class="btn btn-link delNotice">删除</button> 
            <?php endif;?>
                </td>						
            </tr>
        <?php endforeach; ?>
    <?php endif; ?>
    </tbody>
</table>							
</div>
<!-- 分页组件 begin -->
<div class="row center" style="text-align: center;">	
<?php  echo htmlspecialchars_decode($pagehtml);?>
</div>
<!-- 分页组件 end -->
 <?php echo Page_Lib::footer();?>


<!--addNotice Modal -->
<div class="modal fade" id="addNoticeModal" tabindex="-1" role="dialog" aria-labelledby="addNoticeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="addNoticeModalLabel">添加公告</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" action="/platformnotic/addNotice" method="POST" id="addNoticerForm" onsubmit="return false;">
                    <div class="control-group">
                        <label class="col-md-3 control-label">生效时间</label>
                        <div class="controls"><input type="text" class="datetimepicker form-control"  name="starttime"/></div>
                    </div>
                    <div class="control-group">
                        <label class="col-md-3 control-label">结束时间</label>
                        <div class="controls"><input type="text" class="datetimepicker form-control"  name="endtime"/></div>
                    </div>                    
                    <div class="control-group">
                        <label class="col-md-3 control-label">公告标题</label>
                        <div class="controls"><input type="text" class="form-control"  name="title"/></div>
                    </div>
                    <div class="control-group">
                        <label class="col-md-3 control-label">按钮文字</label>
                        <div class="controls"><input type="text" class="form-control"  name="btntext"/></div>
                    </div>
                    <div class="control-group">
                        <label class="col-md-3 control-label">公告内容</label>
                        <div class="controls">
                           <textarea class="form-control " name="context" rows="7" maxlength="600" placeholder="最多输入600个汉字,包括标点符号"></textarea>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">               
                <button type="button" class="btn btn-primary" id="addNoticeBtn">确认添加</button>
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
                <h4 class="modal-title" id="alterNoticeModalLabel">修改公告</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" action="/platformnotice/alterNotice" method="POST" id="alterNoticeForm" onsubmit="return false;">
                    <input type="hidden" name="id"/>
                    <div class="control-group">
                        <label class="col-md-3 control-label">生效时间</label>
                        <div class="controls"><input type="text" class="datetimepicker form-control"  name="starttime"/></div>
                    </div>
                    <div class="control-group">
                        <label class="col-md-3 control-label">结束时间</label>
                        <div class="controls"><input type="text" class="datetimepicker form-control"  name="endtime"/></div>
                    </div>                    
                    <div class="control-group">
                        <label class="col-md-3 control-label">公告标题</label>
                        <div class="controls"><input type="text" class="form-control"  name="title"/></div>
                    </div>
                    <div class="control-group">
                        <label class="col-md-3 control-label">按钮文字</label>
                        <div class="controls"><input type="text" class="form-control"  name="btntext"/></div>
                    </div>
                    <div class="control-group">
                        <label class="col-md-3 control-label">公告内容</label>
                        <div class="controls">
                           <textarea class="form-control " name="context" rows="7" maxlength="600" placeholder="最多输入600个汉字,包括标点符号"></textarea>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="alterNoticeBtn">确认修改</button>
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
                <h4 class="modal-title" id="lookcontextModalLabel">公告内容</h4>
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

<!--editNotice Modal -->
<div class="modal fade" id="submitNoticeModal" tabindex="-1" role="dialog" aria-labelledby="submitNoticeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="submitNoticeModalLabel">发布公告</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" action="/platformnotice/submitNotice" method="POST" id="submitNoticeForm" onsubmit="return false;">
                    <input type="hidden" name="id"/>
                    <div class="control-group">
                        <label class="col-md-3 control-label">生效时间</label>
                        <div class="controls"><input type="text" class="datetimepicker form-control"  name="starttime"readonly="true" /></div>
                    </div>
                    <div class="control-group">
                        <label class="col-md-3 control-label">结束时间</label>
                        <div class="controls"><input type="text" class="datetimepicker form-control"   name="endtime"  readonly="true"/></div>
                    </div>                    
                    <div class="control-group">
                        <label class="col-md-3 control-label">公告标题</label>
                        <div class="controls"><input type="text" class="form-control"   name="title"  readonly="true"/></div>
                    </div>
                    <div class="control-group">
                        <label class="col-md-3 control-label">按钮文字</label>
                        <div class="controls"><input type="text" class="form-control"   name="btntext" readonly="true"/></div>
                    </div>
                    <div class="control-group">
                        <label class="col-md-3 control-label">公告内容</label>
                        <div class="controls">
                            <textarea class="form-control " name="context" readonly="true" rows="7" maxlength="1000" placeholder="最多输入1000个汉字,包括标点符号和空格"></textarea>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="sendNoticeBtn">确认发布</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">取消关闭</button>
            </div>
        </div>
    </div>
</div>
