<?php
$insert_html = Page_Lib::loadJs('notice');
$insert_html .= Page_Lib::loadJs('login_notice');

echo Page_Lib::head($insert_html);

?>
<!-- 站内导航 -->
<div id="content-header">
<h1>Dashboard</h1>
</div>
<div id="breadcrumb">
    <a href="/index/index" title="跳到首页" class="tip-bottom"><i class="icon-home"></i> 首页</a>
    <a href="#" class="current">管理登录公告</a>
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
                    <?php if (is_array($data) && !empty($data) ): ?>
                        
                    <?php foreach ($data as $listdata): ?>
                       <?php if ($listdata['statu'] == 0 && $listdata['endtime'] >= time(0) ):?>
                    <tr id="<?php echo $listdata['id']; ?>">
                        <td data-name="tr_id" style="display:none;"><?php echo$listdata['id']; ?></td>  
                        <td data-name="sid" style="display:none;"><?php echo $listdata['sid']; ?></td> 
                        <td data-name="isbtn" style="display:none;"><?php echo $listdata['isbutton']; ?></td> 
                        <td data-name="context" style="display:none;"><?php echo $listdata['context']; ?></td> 
                        <td data-name="createtime" style=" text-align: center;"><?php echo date("Y-m-d H:i:s",$listdata['createtime']); ?>  </td>
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
                        <td data-name="btntext" style="display:none;"><?php echo $listdata['btntext']; ?></td>
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
                        <td data-name="statu" style=" text-align: center;"><?php 
                        if($listdata['statu'] == -1)
                        {
                            echo "未通过";  
                        }else if($listdata['statu'] == 1 )
                        {
                            echo "发布中";
                        }  else if($listdata['statu'] == 0) {
                            echo "审核中"; 
                        }  else {
                             if($listdata['endtime'] < time(0))
                        echo "已失效";
                        } 
                        ?></td>
                        <td data-name="author" style=" text-align: center;"><?php echo $listdata['author']; ?></td>
                        <td data-name="authtime" style=" display: none;"><?php echo "0"; ?></td>
                        <td style=" text-align: center;">           
                        <?php if ($editLoginNotice): ?>             
                        <button class="btn btn-link editLoginNotice" >审核</button>
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
                    <?php if (is_array($data) && !empty($data) ): ?>
                        
                    <?php foreach ($data as $listdata): ?>
                       <?php if ($listdata['statu'] == 1 && $listdata['endtime'] >= time(0) ):?>
                        <tr id="<?php echo $listdata['id']; ?>">
                        <td data-name="tr_id" style="display:none;"><?php echo$listdata['id']; ?></td> 
                        <td data-name="sid" style="display:none;"><?php echo $listdata['sid']; ?></td> 
                        <td data-name="isbtn" style="display:none;"><?php echo $listdata['isbutton']; ?></td> 
                        <td data-name="context" style="display:none;"><?php echo $listdata['context']; ?></td> 
                        <td data-name="createtime" style=" text-align: center;"><?php echo date("Y-m-d H:i:s",$listdata['createtime']); ?>  </td>
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
                        <td data-name="btntext" style="display:none;"><?php echo $listdata['btntext']; ?></td>
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
                        <td data-name="statu" style=" text-align: center;"><?php 
                        if($listdata['statu'] == -1)
                        {
                            echo "未通过";  
                        }else if($listdata['statu'] == 1 )
                        {
                            echo "发布中";
                        }  else if($listdata['statu'] == 0) {
                            echo "审核中"; 
                        }  else {
                             if($listdata['endtime'] < time(0))
                            echo "已失效";
                        } 
                        ?></td>
                        <td data-name="author" style=" text-align: center;"><?php echo $listdata['author']; ?></td>                        
                        <td style=" text-align: center;">           
                        <?php if($returnLoginNotice): ?>    
                            <button class="btn btn-link returnLoginNotice"> 撤回 </button>
                             <button class="btn btn-link looklink"> 跳转信息 </button>
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
                    <?php if (is_array($data) && !empty($data) ): ?>
                        
                    <?php foreach ($data as $listdata): ?>
                       <?php if ($listdata['statu'] == -1&& $listdata['endtime'] >= time(0)):?>
                    <tr id="<?php echo $listdata['id']; ?>">
                        <td data-name="tr_id" style="display:none;"><?php echo$listdata['id']; ?></td> 
                        <td data-name="sid" style="display:none;"><?php echo $listdata['sid']; ?></td> 
                        <td data-name="isbtn" style="display:none;"><?php echo $listdata['isbutton']; ?></td> 
                        <td data-name="context" style="display:none;"><?php echo $listdata['context']; ?></td> 
                        <td data-name="createtime" style=" text-align: center;"><?php echo date("Y-m-d H:i:s",$listdata['createtime']); ?>  </td>
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
                        <td data-name="btntext" style="display:none;"><?php echo $listdata['btntext']; ?></td>
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
                        <td data-name="statu" style=" text-align: center;"><?php 
                        if($listdata['statu'] == -1)
                        {
                            echo "未通过";  
                        }else if($listdata['statu'] == 1 )
                        {
                            echo "发布中";
                        }  else if($listdata['statu'] == 0) {
                            echo "审核中"; 
                        }  else {
                            if($listdata['endtime'] < time(0))
                            echo "已失效";
                        } 
                        ?></td>
                        <td data-name="author" style=" text-align: center;"><?php echo $listdata['author']; ?></td>
                        <td style=" text-align: center;">           
                        <?php if ($addServer): ?>
                        <button  class="btn btn-link addServerBtn" >修改服务器</button>
                        <?php endif; ?>
                        <?php if ($alterLoginNotice): ?>             
                        <button class="btn btn-link alterLoginNotice" >修改内容</button>
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
                            <th>公告标题</th>
                            <th>公告内容</th>
                            <th>生效时间</th>
                            <th>失效时间</th>
                            <th>发布人</th>	
                            <th>状态</th>
                            <th>审核人</th>
                            <th>撤回理由</th>
                            <th>操作</th>					
                        </tr>
                    </thead>
                    <tbody>
                    <?php if (is_array($data) && !empty($data) ): ?>       
                    <?php foreach ($data as $listdata): ?>
                       <?php if (  $listdata['endtime'] < time(0)):?>
                            <tr id="<?php echo $listdata['id']; ?>">
                        <td data-name="tr_id" style="display:none;"><?php echo$listdata['id']; ?></td> 
                        <td data-name="sid" style="display:none;"><?php echo $listdata['sid']; ?></td> 
                        <td data-name="isbtn" style="display:none;"><?php echo $listdata['isbutton']; ?></td> 
                        <td data-name="context" style="display:none;"><?php echo $listdata['context']; ?></td> 
                        <td data-name="createtime" style=" text-align: center;"><?php echo date("Y-m-d H:i:s",$listdata['createtime']); ?>  </td>
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
                        <td data-name="btntext" style="display:none;"><?php echo $listdata['btntext']; ?></td>
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
                        <td data-name="statu" style=" text-align: center;"><?php 
                            if($listdata['statu'] == 3)
                            {
                                    echo "已撤回";
                            }else{
                                echo "已失效";
                            }?></td>
                        <td data-name="author" style=" text-align: center;"><?php echo $listdata['author']; ?></td>
                        <td data-name="reason" style=" text-align: center;"><?php echo $listdata['reason']; ?></td>  
                        <td style=" text-align: center;">           
                        <?php if ($lookLoginNotice): ?>             
                        <button class="btn btn-link lookLoginNotice" >查看内容</button>
                        <?php endif; ?>
                        <?php if ($delLoginNotice):?>
                            <!--<button class="btn btn-link delLoginNotice">删除</button>-->                                              
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
<?php// echo htmlspecialchars_decode($pagehtml);?> 
</div>-->
<!-- 分页组件 end -->
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
                <h4 class="modal-title" id="lookserverModalLabel">公告内容</h4>
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
<div class="modal fade" id="editLoginNoticeModal" tabindex="-1" role="dialog" aria-labelledby="editLoginNoticeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="editLoginNoticeModalLabel">登录公告审核</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" action="/loginnotice/editLoginNotice" method="POST" id="editLoginNoticeForm" onsubmit="return false;">
                    <input type="hidden" name="tr_id"/> 
                    <input type="hidden" name="isbtn"/>
                    <input type="hidden" name="sid"/>
                    <div class="control-group">
                        <label class="col-md-3 control-label">发布人签名</label>
                        <div class="controls"><input type="text" class="form-control" name="creator" readonly="true"/></div>
                    </div>
                    <div class="control-group">
                        <label class="col-md-3 control-label">生效时间</label>
                        <div class="controls"><input type="text" class="datetimepicker form-control"  name="starttime" readonly="true"/></div>
                    </div>
                    <div class="control-group">
                        <label class="col-md-3 control-label">失效时间</label>
                        <div class="controls"><input type="text" class="datetimepicker form-control"  name="endtime" readonly="true"/></div>
                    </div>
                    <div class="control-group">
                        <label class="col-md-3 control-label">公告标题</label>
                        <div class="controls"><input type="text" class="form-control"  name="title"  readonly="true"/></div>
                    </div>
                    <div class="control-group">
                        <label class="col-md-3 control-label" >公告状态</label>
                       <div class="controls"><input type="text" class="form-control"  name="lable" readonly="true"/></div>
                    </div>
                    <div class="control-group">
                        <label class="col-md-3 control-label">跳转界面</label>
                        <div class="controls"><input type="text" class="form-control" name="linktype" readonly="true" /></div>
                    </div>
                    <div class="control-group">
                        <label class="col-md-3 control-label">超链接地址</label> 
                        <div class="controls"><input type="text" class="form-control" name="linktext" readonly="true"/></div>
                    </div>
                    <div class="control-group">
                        <label class="col-md-3 control-label">按钮文字</label>
                        <div class="controls"><input type="text" class="form-control"  name="btntext" readonly="true"/></div>
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
                    <div class="control-group">
                        <label class="col-md-3 control-label">公告内容</label>
                        <div class="controls">
                           <textarea class="form-control " name="context" rows="4" maxlength="1000" placeholder="最多输入一千汉字,包括标点符号和空格"  readonly="true"></textarea>
                        </div>
                    </div> 
                    <input type="hidden" name="id"/>
                </form>
            </div>
            <div class="modal-footer">               
                <button type="button" class="btn btn-primary" id="editLoginNoticeBtn">确认审核</button>
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
                <button type="button" class="btn btn-primary" id="loadServerbtn">确认添加</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">取消关闭</button>
            </div>
        </div>
    </div>
</div>


<!--look Modal -->
<div class="modal fade" id="lookLoginNoticeModal" tabindex="-1" role="dialog" aria-labelledby="lookLoginNoticeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="lookLoginNoticeModalLabel">登录公告查看</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" action="#" method="POST" id="lookLoginNoticeForm" onsubmit="return false;">
                    <div class="control-group">
                        <label class="col-md-3 control-label">发布人签名</label>
                        <div class="controls"><input type="text" class="form-control" name="creator" readonly="true"/></div>
                    </div>
                    <div class="control-group">
                        <label class="col-md-3 control-label">生效时间</label>
                        <div class="controls"><input type="text" class="datetimepicker form-control"  name="starttime" readonly="true"/></div>
                    </div>
                    <div class="control-group">
                        <label class="col-md-3 control-label">失效时间</label>
                        <div class="controls"><input type="text" class="datetimepicker form-control"  name="endtime" readonly="true"/></div>
                    </div>
                    <div class="control-group">
                        <label class="col-md-3 control-label">公告标题</label>
                        <div class="controls"><input type="text" class="form-control"  name="title"  readonly="true"/></div>
                    </div>
                    <div class="control-group">
                        <label class="col-md-3 control-label" >公告状态</label>
                       <div class="controls"><input type="text" class="form-control"  name="lable" readonly="true"/></div>
                    </div>
                    <div class="control-group">
                        <label class="col-md-3 control-label">跳转界面</label>
                        <div class="controls"><input type="text" class="form-control" name="linktype" readonly="true" /></div>
                    </div>
                    <div class="control-group">
                        <label class="col-md-3 control-label">超链接地址</label> 
                        <div class="controls"><input type="text" class="form-control" name="linktext" readonly="true"/></div>
                    </div>
                    <div class="control-group">
                        <label class="col-md-3 control-label">按钮文字</label>
                        <div class="controls"><input type="text" class="form-control"  name="btntext" readonly="true"/></div>
                    </div>
                    <div class="control-group">
                        <label class="col-md-3 control-label">公告内容</label>
                        <div class="controls">
                           <textarea class="form-control " name="context" rows="4" maxlength="1000" placeholder="最多输入一千汉字,包括标点符号和空格"  readonly="true"></textarea>
                        </div>
                    </div> 
                    <input type="hidden" name="id"/>
                </form>
            </div>
            <div class="modal-footer">               
                <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
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
                    <input type="hidden" name="isbtn"/>
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
                           <textarea class="form-control " name="context" rows="4" maxlength="1000" placeholder="最多输入一千汉字,包括标点符号和空格" ></textarea>
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

<!--look Modal -->
<div class="modal fade" id="RevokeLoginNoticeModal" tabindex="-1" role="dialog" aria-labelledby="RevokeLoginNoticeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="RevokeLoginNoticeModalLabel">登录公告撤回</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" action="/loginnotice/returnLoginNotice" method="POST" id="RevokeLoginNoticeForm" onsubmit="return false;">
                    <input type="hidden" name="tr_id"/>
                    <input type="hidden" name="sid"/>
                    <div class="control-group">
                        <label class="col-md-3 control-label">发布人签名</label>
                        <div class="controls"><input type="text" class="form-control" name="creator" readonly="true"/></div>
                    </div>
                    <div class="control-group">
                        <label class="col-md-3 control-label">公告标题</label>
                        <div class="controls"><input type="text" class="form-control"  name="title"  readonly="true"/>
                        </div>
                    </div> 
                    <div class="control-group">
                        <label class="col-md-3 control-label">撤回理由</label>
                        <div class="controls"><input type="text" class="form-control"  name="reason" maxlength="10"  placeholder="不要超过十个字" />
                        </div>
                    </div> 
                    <input type="hidden" name="id"/>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="returnBtn">确认撤回</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">取消关闭</button>
            </div>
        </div>
    </div>
</div>

<!--look Modal -->
<div class="modal fade" id="looklinkModal" tabindex="-1" role="dialog" aria-labelledby="looklinkModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="looklinkModalLabel">查看基本内容</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" action="#" method="POST" id="looklinkForm" onsubmit="return false;">
<!--                    <div class="control-group">
                        <label class="col-md-3 control-label">发布人签名</label>
                        <div class="controls"><input type="text" class="form-control" name="creator" readonly="true"/></div>
                    </div>
                    <div class="control-group">
                        <label class="col-md-3 control-label">生效时间</label>
                        <div class="controls"><input type="text" class="datetimepicker form-control"  name="starttime" readonly="true"/></div>
                    </div>
                    <div class="control-group">
                        <label class="col-md-3 control-label">失效时间</label>
                        <div class="controls"><input type="text" class="datetimepicker form-control"  name="endtime" readonly="true"/></div>
                    </div>-->
                    <div class="control-group">
                        <label class="col-md-3 control-label">公告标题</label>
                        <div class="controls"><input type="text" class="form-control"  name="title"  readonly="true"/></div>
                    </div>
<!--                    <div class="control-group">
                        <label class="col-md-3 control-label" >公告状态</label>
                       <div class="controls"><input type="text" class="form-control"  name="lable" readonly="true"/></div>
                    </div>-->
                    <div class="control-group">
                        <label class="col-md-3 control-label">跳转界面</label>
                        <div class="controls"><input type="text" class="form-control" name="linktype" readonly="true" /></div>
                    </div>
                    <div class="control-group">
                        <label class="col-md-3 control-label">超链接地址</label> 
                        <div class="controls"><input type="text" class="form-control" name="linktext" readonly="true"/></div>
                    </div>
                    <div class="control-group">
                        <label class="col-md-3 control-label">按钮文字</label>
                        <div class="controls"><input type="text" class="form-control"  name="btntext" readonly="true"/></div>
                    </div>
<!--                    <div class="control-group">
                        <label class="col-md-3 control-label">公告内容</label>
                        <div class="controls">
                           <textarea class="form-control " name="context" rows="4" maxlength="1000" placeholder="最多输入一千汉字,包括标点符号和空格"  readonly="true"></textarea>
                        </div> -->
                    </div>
                    <input type="hidden" name="id"/>
                </form>
            </div>
            <div class="modal-footer">               
                <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
            </div>
        </div>
    </div>
</div>