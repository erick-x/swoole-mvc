<?php
$insert_html = Page_Lib::loadJs('multiActivity');
$insert_html .= Page_Lib::loadJs('ajaxupload');
$insert_html .= Page_Lib::loadJs('multselect');
echo Page_Lib::head($insert_html);
?>
<!-- 站内导航 -->
<div id="content-header">
    <h1>后台基本操作</h1>
        <div class="btn-group">        
<a class="btn btn-large btn-success tip-bottom" title="新建批量活动" data-toggle="modal" data-backdrop="static"  id="loadFileBtn"><i class="icon-plus"></i>导入配置</a>
</div>
</div>
 <div id="breadcrumb">
    <a href="/index/index" title="跳到首页" class="tip-bottom"><i class="icon-home"></i> 首页</a>
    <a href="#" class="current">新建批量活动</a>
 </div>
<div class="container-fluid">
    <div class="row-fluid">
        <div class="widget-box">
        <table class="table table-striped table-bordered table-hover" id="activityTable">
            <thead>
                <th>批次</th>
                <th>备注</th>
                <th>导入时间</th>
                <th>操作人</th>
                <th>操作</th>
            </thead>
            <tbody>
               <?php if (is_array($data) && !empty($data)): ?>
                <?php foreach ($data as $listdata): ?>
                 <tr>
                <td data-name="id" style="text-align: center;"><?php echo$listdata['id']; ?></td>
                <td data-name="desc" ><?php echo$listdata['desc']; ?></td>
                <td data-name="createtime" style="text-align: center;"><?php echo$listdata['createtime']; ?></td> 
                <td data-name="creator" style="text-align: center;" ><?php echo$listdata['creator']; ?></td>
                <td >           
                    <?php if($alertMutliActivity):?>
                    <button class="btn btn-link  lookBookBtn">备注</button>
                    <?php endif;?>
                    <?php if ($AddMultiActivity): ?>             
                    <button class="btn btn-link ceateBtn" >创建活动</button>
                    <?php endif; ?>
                    <?php if ($deletMultiActivity): ?>             
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
                </form>
            </div>
            <div class="modal-footer">     
                <button type="button" class="btn btn-success" id="addActivityBtn">确认发布</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">取消关闭</button>
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
                <button type="button" class="btn btn-success" id="alertBtn">确认修改</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">取消关闭</button>
            </div>
        </div>
    </div>
</div>