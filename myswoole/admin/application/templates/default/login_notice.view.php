<?php
$insert_html = Page_Lib::loadJs('notice');
$insert_html .= Page_Lib::loadJs('login_notice');

echo Page_Lib::head($insert_html);

?>
<!-- 站内导航 -->
<div id="content-header">
<h1>Dashboard</h1>
<div class="btn-group">
 <?php if($addLoginNotice):?>
<a class="btn btn-large btn-default tip-bottom" title="登录公告" data-toggle="modal" data-backdrop="static" data-target="#addloginNoticeModal" id="addLoginNotice"><i class="icon-plus-sign"></i> 添加登录公告</a>
<?php endif;?>
</div>
</div>
<div id="breadcrumb">
    <a href="/index/index" title="跳到首页" class="tip-bottom"><i class="icon-home"></i> 首页</a>
    <a href="#" class="current">添加登录公告</a>
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
                            <input  name="account" placeholder="请输入发布人" class="form-control" style="width:auto;">
                        <button class="btn btn-primary" type="submit" id="btn_date"><i class="icon-search icon-white"></i> 查询</button>
                        </div>
                </div>
            </form>       
    </div>
</div>
 <!-- 查询组件 end-->      
 <!-- 表格 正文 -->
<table class="table table-bordered table-striped" id="noticeTable">
        <thead>
        <tr>
            <th>创建日期</th>
            <th>区服</th>
            <th>公告标题</th>
            <th>公告内容</th>
            <th>生效时间</th>
            <th>失效时间</th>
            <th>发布人</th>	
            <th>状态</th>
            <th>审核人</th>
            <th>操作</th>															
        </tr>
        </thead>
        <tbody>
          <?php if (is_array($data) && !empty($data)): ?>
            <?php foreach ($data as $listdata): ?>
                <?php if($listdata['statu'] == -2):?>
                <tr id="<?php echo $listdata['id']; ?>">
                    <td data-name="tr_id" style="display:none;"><?php echo$listdata['id']; ?></td> 
                    <td data-name="sid" style="display:none;"><?php echo $listdata['sid']; ?></td> 
                    <td data-name="context" style="display:none;"><?php echo $listdata['context']; ?></td> 
                    <td data-name="btntext" style="display:none;"><?php echo $listdata['btntext']; ?></td>
                    <td data-name="lable" style="display:none;">
                    <?php 
                        foreach(Config::get("key.statu") as $key=>$value)
                        if(intval($key) == intval($listdata['lable']) )
                        {
                            echo trim($value);
                            break;
                        }
                    ?>
                    </td>
                    <td data-name="linktext" style="display:none;"><?php 
                    echo $listdata['linktext']; ?></td>
                    <td data-name="linktype" style="display:none;"><?php
                    foreach(Config::get("key.link") as $key=>$value)
                        if(intval($key) == intval($listdata['linktype']) )
                        {
                            echo $value;
                            break;
                        }
                     ?></td>
                    <td data-name="createtime" style=" text-align: center;" ><?php echo date("Y-m-d H:i:s",$listdata['createtime']); ?></td>
                    <td data-name="server" style=" text-align: center;">
                        <button class="btn btn-link lookserver">查看</button>                                                             
                    </td>
                    <td data-name="title" style=" text-align: center;"><?php echo $listdata['title']; ?></td>
                    <td data-name="lookcontext" style=" text-align: center;">
                        <button class="btn btn-link lookcontext">查看</button>
                    </td>   
                    <td data-name="starttime" style="text-align: center;"><?php echo date('Y-m-d H:i:s',$listdata['starttime']); ?></td> 
                    <td data-name="endtime" style="text-align: center;"><?php echo date('Y-m-d H:i:s',$listdata['endtime']); ?></td>
                    <td data-name="creator" style=" text-align: center;"><?php echo $listdata['creator']; ?></td>
                    <td data-name="statu" style=" text-align: center;"><?php echo "未审核";?></td>
                    <td data-name="author" style=" text-align: center;"><?php echo $listdata['author']; ?></td>
                    <td style=" text-align: center;">           
                    <?php if ($addServer): ?>
                    <button class="btn btn-link  addServerBtn">添加服务器</button>
                    <?php endif;?>
                    <?php if ($alterLoginNotice): ?>             
                    <button class="btn btn-link alterLoginNotice" >修改公告</button>
                    <?php endif; ?>
                    <?php if ($sumbitNotice): ?>             
                    <button class="btn btn-link submitBtn" >提交审核</button>
                    <?php endif; ?>
                    </td>						
                </tr>
                <?php endif; ?>
            <?php endforeach; ?>
        <?php endif; ?>
        </tbody>
 </table>							
 </div>	

<!-- 表格 end -->
 <?php echo Page_Lib::footer();?>

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

<!--addNotice Modal -->
<div class="modal fade" id="addloginNoticeModal" tabindex="-1" role="dialog" aria-labelledby="addloginNoticeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="addloginNoticeModalLabel">登录公告</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" action="/loginnotice/addLoginNotice" method="POST" id="addLoginNoticerForm" onsubmit="return false;">        
                    <div class="control-group">
                        <label class="col-md-3 control-label">生效时间</label>
                        <div class="controls"><input type="text" class="datetimepicker form-control"  name="starttime"/></div>
                    </div>
                    <div class="control-group">
                        <label class="col-md-3 control-label">失效时间</label>
                        <div class="controls"><input type="text" class="datetimepicker form-control"  name="endtime"/></div>
                    </div>
                    <div class="control-group">
                        <label class="col-md-3 control-label">公告标题</label>
                        <div class="controls"><input type="text" class="form-control"  maxlength="10" placeholder="最多输入十个汉字" name="title"/></div>
                    </div>
                    <div class="control-group">
                        <label class="col-md-3 control-label" for="">跳转界面</label>
                        <div class="controls">
                            <select class="form-control" name="linktype" required="" autofocus="">
                                <option value="" selected="selected">请选择</option>
                                <?php foreach(Config::get("key.link") as $key=>$value):?>
                                <?php echo '<option value="'.$key.'">'.$value.'</option>';?>
                                <?php endforeach;?>
                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="col-md-3 control-label">超链接地址</label>
                        <div class="controls"><input type="text" class="form-control" name="linktext" placeholder="非超链接，可不填"/></div>
                    </div>
                    <div class="control-group">
                        <label class="col-md-3 control-label">按钮文字</label>
                        <div class="controls"><input type="text" class="form-control" maxlength="10" placeholder="最多输入十个汉字" name="btntext"/></div>
                    </div> 
                    <div class="control-group">
                        <label class="col-md-3 control-label" for="">公告状态</label>
                        <div class="controls">
                            <select class="form-control" name="statu" required="" autofocus="">
                                <option value="" selected="selected">请选择</option>
                                <?php foreach(Config::get("key.statu") as $key=>$value):?>
                                <?php echo '<option value="'.$key.'">'.$value.'</option>';?>
                                <?php endforeach;?>
                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="col-md-3 control-label">公告内容</label>
                        <div class="controls">
                            <textarea class="form-control " name="context" rows="7" maxlength="600" placeholder="最多输入600汉字,包括标点符号"></textarea>
                        </div>
                    </div>
                    <input type="hidden" name="id"/>
                </form>
            </div>
            <div class="modal-footer">               
                <button type="button" class="btn btn-primary" id="addLoginNoticeBtn">确认添加</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">取消关闭</button>
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
                <button id="checkNone" class="btn btn-info">取消</button>
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
                <button type="button" class="btn btn-primary" id="loadServerbtn">确认添加</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">取消关闭</button>
            </div>
        </div>
    </div>
</div>

<!--look Modal -->
<div class="modal fade" id="alterLoginNoticeModal" tabindex="-1" role="dialog" aria-labelledby="alterLoginNoticeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="alterLoginNoticeModalLabel">登录公告修改</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" action="/loginnotice/alterLoginNotice" method="POST" id="alterLoginNoticeForm" onsubmit="return false;">
                    <input type="hidden" name="tr_id"/> 
                    <input type="hidden" name="sid"/>
                    <div class="control-group">
                        <label class="col-md-3 control-label">发布人签名</label>
                        <div class="controls"><input type="text" class="form-control" name="creator" readonly="true"/></div>
                    </div>
                    <div class="control-group">
                        <label class="col-md-3 control-label">生效时间</label>
                        <div class="controls"><input type="text" class="datetimepicker form-control"  name="starttime" /></div>
                    </div>
                    <div class="control-group">
                        <label class="col-md-3 control-label">失效时间</label>
                        <div class="controls"><input type="text" class="datetimepicker form-control"  name="endtime" /></div>
                    </div>
                    <div class="control-group">
                        <label class="col-md-3 control-label">公告标题</label>
                        <div class="controls"><input type="text" class="form-control"  name="title" /></div>
                    </div>
                     <div class="control-group">
                        <label class="col-md-3 control-label" for="">公告状态</label>
                        <div class="controls">
                            <select class="form-control" name="statu" required="" autofocus="">
                                <option value="-1" selected="selected">请选择</option>
                                <?php foreach(Config::get("key.statu") as $key=>$value):?>
                                <?php echo '<option value="'.$key.'">'.$value.'</option>';?>
                                <?php endforeach;?>
                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="col-md-3 control-label" for="">跳转界面</label>
                        <div class="controls">
                            <select class="form-control" name="linktype" required="" autofocus="">
                                <option value="-1" selected="selected">请选择</option>
                                <?php foreach(Config::get("key.link") as $key=>$value):?>
                                <?php echo '<option value="'.$key.'">'.$value.'</option>';?>
                                <?php endforeach;?>
                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="col-md-3 control-label">超链接地址</label>
                        <div class="controls"><input type="text" class="form-control" name="linktext" placeholder="非超链接，可不填"/></div>
                    </div>
                    <div class="control-group">
                        <label class="col-md-3 control-label">按钮文字</label>
                        <div class="controls"><input type="text" class="form-control" maxlength="10" placeholder="最多输入十个汉字" name="btntext"/></div>
                    </div> 
                    <div class="control-group">
                        <label class="col-md-3 control-label">公告内容</label>
                        <div class="controls">
                           <textarea class="form-control " name="context" rows="4" maxlength="600" placeholder="最多输入600汉字,包括标点符号" ></textarea>
                        </div>
                    </div> 
                    <input type="hidden" name="id"/>
                </form>
            </div>
            <div class="modal-footer">               
                <button type="button" class="btn btn-primary" id="alterLoginNoticeBtn">确认修改</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">取消关闭</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="submitLoginNoticeModal" tabindex="-1" role="dialog" aria-labelledby="submitLoginNoticeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="submitLoginNoticeModalLabel">提交审核</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" action="#" method="POST" id="submitLoginNoticeForm" onsubmit="return false;">
                    <input type="hidden" name="tr_id"/>
                    <input type="hidden" name="sid"/>
                    <div class="control-group">
                        <label class="col-md-3 control-label">发布人签名</label>
                        <div class="controls"><input type="text" class="form-control" name="creator" readonly="true"/></div>
                    </div>
                      <div class="control-group">
                        <label class="col-md-3 control-label">公告标题</label>
                        <div class="controls"><input type="text" class="form-control"  maxlength="10" placeholder="最多输入十个汉字" name="title" readonly="true"/></div>
                    </div>
                    <input type="hidden" name="id"/>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="submitloginbtn">确认提交</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">取消关闭</button>
            </div>
        </div>
    </div>
</div>