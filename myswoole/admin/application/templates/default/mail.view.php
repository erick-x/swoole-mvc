<?php
$insert_html = Page_Lib::loadJs('mail');
echo Page_Lib::head($insert_html);
?>
<!-- 站内导航 -->
<div id="content-header">
    <h1>后台基本操作</h1>
        <div class="btn-group">        
<a class="btn btn-large btn-success tip-bottom" title="邮件" data-toggle="modal" data-backdrop="static" href="/mail/showmail" id="addMailBtn"><i class="icon-plus"></i>新建邮件</a>
    </div>
</div>
 <div id="breadcrumb">
    <a href="/index/index" title="跳到首页" class="tip-bottom"><i class="icon-home"></i> 首页</a>
    <a href="#" class="current">新建邮件列表</a>
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
        <div class="row center" style="text-align: center;">
        <form  method="GET" class="form-horizontal" >         
                <div class="control-group">
			<div class="controls">                           
                            <input type="text" class="datetimepicker form-control" placeholder="发送时间"  name="createTime" style="width:auto;"/>
                            <span class="add-on"><i class="icon-th "></i></span>
                            <input type="text" class="datetimepicker form-control" placeholder="截至时间"  name="endtime" style="width:auto;"/>
                            <span class="add-on"><i class="icon-th "></i></span>
                        <button class="btn btn-primary" type="submit" id="btn_date"><i class="icon-search icon-white"></i> 查询</button>
                        </div>
                    </div>    
            </form>  
            </div>
    </div>
</div>
 <!-- 表格 正文 -->
    <table class="table table-bordered table-striped" id="mailTable" >
        <?php if(! empty($data)&& is_array($data)):?>
        <thead>
        <th>邮件ID</th>
        <th>发送时间</th>
        <th>发送对象</th>
        <th>发送服务器</th>
        <th>邮件标题</th>
        <th>邮件内容</th>
        <th>附件</th>
        <th>操作</th>
        </thead>
        <tbody>
            <?php $i = 0;?>
          <?php foreach ($data as $data):?>
            <tr>
                 <td data-name="id" style="text-align: center;"><?php echo $data['id']; ?></td>
                 <td data-name="sendtime" style="text-align: center;"><?php echo date('Y-m-d H:i:s',$data['sendtime']); ?></td>
                 <td data-name="roleid" style="display:none;"><?php echo $data['roleid']; ?></td>
                 <td data-name="lookrole" style=" text-align: center;">
                    <button class="btn btn-link lookrole">查看</button>
                 </td>    
                 <td data-name="lookserver" style=" text-align: center;">
                    <button class="btn btn-link lookserver">查看</button>
                 </td> 
                 <td data-name="title" style="text-align: center;"><?php echo $data['title']; ?></td>
                 <td data-name="context" style="display:none;"><?php echo $data['context']; ?></td>
                 <td data-name="lookcontext" style=" text-align: center;">
                    <button class="btn btn-link lookcontext">查看</button>
                 </td>  
                 <td data-name="looktag" style=" text-align: center;">
                    <button class="btn btn-link looktag">查看</button>
                 </td>
                 <td data-name="tag" style="display:none;"><?php echo $data['tag']; ?></td>
                 <td data-name="sid" style="display:none;"><?php echo $data['sid']; ?></td>
                 <td data-name="coin" style="display:none;"><?php echo $data['coin']; ?></td>
                 <td data-name="money" style="display:none;"><?php echo $data['money']; ?></td>
                 <td data-name="herosoul" style="display:none;"><?php echo $data['herosoul']; ?></td>
                 <td data-name="honour" style="display:none;"><?php echo $data['honour']; ?></td>
                 <td data-name="heroid" style="display:none;"><?php echo $data['heroid']; ?></td>
                 <td data-name="heronum" style="display:none;"><?php echo $data['heronum']; ?></td>
                 <td data-name="equipid" style="display:none;"><?php echo $data['equipid']; ?></td>
                 <td data-name="equipnum" style="display:none;"><?php echo $data['equipnum']; ?></td>
                 <td data-name="propid1" style="display:none;"><?php echo $data['prop_id1']; ?></td>
                 <td data-name="propnum1" style="display:none;"><?php echo $data['prop_num1']; ?></td>
                 <td data-name="propid2" style="display:none;"><?php echo $data['prop_id2']; ?></td>
                 <td data-name="propnum2" style="display:none;"><?php echo $data['prop_num2']; ?></td>
                 <td data-name="propid3" style="display:none;"><?php echo $data['prop_id3']; ?></td>
                 <td data-name="propnum3" style="display:none;"><?php echo $data['prop_num3']; ?></td>
                 <td data-name="propid4" style="display:none;"><?php echo $data['prop_id4']; ?></td>
                 <td data-name="propnum4" style="display:none;"><?php echo $data['prop_num4']; ?></td>
                 <td data-name="statu" style="display:none;"><?php echo $data['statu']; ?></td>
                 <td data-name="equipsoul" style="display:none;"><?php echo $data['equipsoul']; ?></td>
                 <td data-name="honor_s" style="display:none;"><?php echo $data['honor_s']; ?></td>
                 <td data-name="sender" style="display:none;"><?php echo $data['sender']; ?></td>
                 <td data-name="author" style="display:none;"><?php echo $data['author']; ?></td>
                 <td data-name="prop1name" style="display:none;"><?php echo $name[$i]['prop1name']; ?></td>
                 <td data-name="prop2name" style="display:none;"><?php echo $name[$i]['prop2name']; ?></td>
                 <td data-name="prop3name" style="display:none;"><?php echo $name[$i]['prop3name']; ?></td>
                 <td data-name="prop4name" style="display:none;"><?php echo $name[$i]['prop4name']; ?></td>
                 <td data-name="heroname" style="display:none;"><?php echo $name[$i]['heroname']; ?></td>
                 <td data-name="equipname" style="display:none;"><?php echo $name[$i]['equipname']; ?></td>
                 <td style="text-align: center;">
                 <?php if ($editMail): ?>             
                    <button class="btn btn-link editmailBtn" >编辑</button>  
                 <?php endif; ?>
                 <?php if ($submitMail): ?>             
                    <button class="btn btn-link submailBtn" >提交</button>  
                 <?php endif; ?>
                <?php if ($delMail): ?>             
                    <button class="btn btn-link delmailBtn" >删除</button>  
                <?php endif; ?>
                 </td>
            </tr>
            <?php $i ++; endforeach;?>
        </tbody>
        <?php endif;?>
    </table>
   </div>
<?php 
    echo Page_Lib::footer(); 
?>

<!--context Modal -->
<div class="modal fade" id="lookcontextModal" tabindex="-1" role="dialog" aria-labelledby="lookcontextModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="lookcontextModalLabel">邮件内容</h4>
            </div>
            <div class="modal-body">
             <table class="table table-striped table-bordered" id="mailcontext" > 
             </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
            </div>
        </div>
    </div>
</div>
<!--context Modal -->
<div class="modal fade" id="looktagModal" tabindex="-1" role="dialog" aria-labelledby="looktagModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="looktagModalLabel">附件内容</h4>
            </div>
            <div class="modal-body">
             <table class="table table-striped table-bordered" id="mailtag" > 
             </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="lookRoleModal" tabindex="-1" role="dialog" aria-labelledby="lookRoleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="lookRoleModalLabel">角色列表</h4>
            </div>
            <div class="modal-body">
             <table class="table table-striped table-bordered" id="rolecontext" > 
             </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
            </div>
        </div>
    </div>
</div>



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


<div class="modal fade" id="editMailModal" tabindex="-1" role="dialog" aria-labelledby="editMailModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="editMailModalLabel">修改邮件</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" action="#" method="POST" id="editMailForm" onsubmit="return false;">
                    <input type="hidden" name="id"/>
                    <div class="control-group">
                        <label class="col-md-3 control-label">发布人签名</label>
                        <div class="controls"><input type="text" class="form-control" name="sender" readonly="true"/></div>
                    </div>
                    <div class="control-group">
                        <label class="col-md-3 control-label">邮件标题</label>
                        <div class="controls"><input type="text" class="form-control" name="title" /></div>
                    </div>
                      <div class="control-group">
                        <label class="col-md-3 control-label">邮件内容</label>
                        <div class="controls"><textarea class="form-control " name="context" rows="7" maxlength="170" placeholder="最多输入170汉字,包括标点符号和空格"></textarea></div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="alterMailbtn">确认修改</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">取消关闭</button>
            </div>
        </div>
    </div>
</div>