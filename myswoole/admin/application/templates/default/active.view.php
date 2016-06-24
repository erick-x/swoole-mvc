<?php
$insert_html = Page_Lib::loadJs('active');
$insert_html .= Page_Lib::loadJs('ajaxupload');
$insert_html .= Page_Lib::loadJs('loadactive');
$insert_html .= Page_Lib::loadJs('multselect');
echo Page_Lib::head($insert_html);
?>
<!-- 站内导航 -->
<div id="content-header">
    <h1>后台基本操作</h1>
        <div class="btn-group">        
<a class="btn btn-large btn-success tip-bottom" title="新建活动" data-toggle="modal" data-backdrop="static"  id="loadFileBtn"><i class="icon-plus"></i>导入配置</a>
</div>
    </div>
 <div id="breadcrumb">
    <a href="/index/index" title="跳到首页" class="tip-bottom"><i class="icon-home"></i> 首页</a>
    <a href="#" class="current">新建活动</a>
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
                            <input type="text" class="datetimepicker form-control" placeholder="创建日期"  name="createTime" style="width:auto;"/>
                            <span  class="add-on"><i class="icon-th "></i></span>
                            <input type="text" class="datetimepicker form-control" placeholder="结束时间"  name="endtime" style="width:auto;"/>
                            <span  class="add-on"><i class="icon-th "></i></span>
                            <button class="btn btn-primary" type="submit" id="btn_date"><i class="icon-search icon-white"></i> 查询</button>
                        </div>
                </div>
        </form>       
    </div>
</div>
    <div class="row-fluid">
        <div class="widget-box">
        <table class="table table-striped table-bordered table-hover" id="activityTable">
            <thead>
                <th>活动名称</th>
                <th>备注</th>
                <th>操作</th>
            </thead>
            <tbody>
               <?php if (is_array($data) && !empty($data)): ?>
                <?php foreach ($data as $listdata): ?>
                 <tr>
                <td data-name="id" style="display:none;"><?php echo$listdata['id']; ?></td>   
                <td data-name="actid" style="display:none;"><?php echo$listdata['actid']; ?></td>   
                <td data-name="title" style="text-align: center;"><?php echo $listdata['title']; ?></td> 
                <td data-name="content" style="display:none;"><?php echo $listdata['content']; ?></td>    
                <td data-name="param" style="display:none;"><?php echo$listdata['param']; ?></td>
                <td data-name="configdesc" style="display: none"><?php echo$listdata['configdesc']; ?></td>
                <td data-name="desc" ><?php echo$listdata['desc']; ?></td>
                <td >           
                    <button class="btn btn-link  lookBtn">查看配置</button>
                    <?php if($alertBookActivity):?>
                    <button class="btn btn-link  lookBookBtn">备注</button>
                    <?php endif;?>
                    <?php if ($createActivity): ?>             
                    <button class="btn btn-link ceateBtn" >创建活动</button>
                    <?php endif; ?>
                    <?php if ($deletActivity): ?>             
                    <button class="btn btn-link deleteBtn" >删除</button>
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
<?php 
    echo Page_Lib::footer(); 
?>
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
                    <input type="button" class="btn btn-success" value="导入XML文件" id="selector" />
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
                        <tr>
                            <td>
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
                            </td>
                            <td></td>
                            </tr>                                               
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
                    <input type="hidden" name="title"/>
                    <input type="hidden" name="actid"/>
                    <input type="hidden" name="configdesc"/>
                    <input type="hidden" name="content"/>
                    <input type="hidden" name="param"/>
                </form>
            </div>
            <div class="modal-footer">     
                <button type="button" class="btn btn-success" id="addActivityBtn">确认添加</button>
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
                <h4 class="modal-title" id="lookcontextModalLabel">配置内容</h4>
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
                         <div class="controls"><textarea class="form-control " name="desc" rows="7"   maxlength="50" placeholder="最多输入50汉字,包括标点符号和空格"></textarea></div>
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