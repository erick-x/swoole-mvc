<?php
$insert_html = Page_Lib::loadJs('ajaxupload');
$insert_html .= Page_Lib::loadJs('mail');
echo Page_Lib::head($insert_html);
?>
<!-- 站内导航 -->
<div id="content-header">
    <h1>后台基本操作</h1>
</div>
 <div id="breadcrumb">
    <a href="/index/index" title="跳到首页" class="tip-bottom"><i class="icon-home"></i> 首页</a>
    <a href="#" class="current">管理邮件列表</a>
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
<div class="row-fluid">
    <div class="widget-box">
    <div class="widget-title">
	<span class="icon">
            <i class="icon-th"></i>
        </span>
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#tab1">操作中</a></li>
                <li><a data-toggle="tab" href="#tab2">可撤回</a></li>
                <li><a data-toggle="tab" href="#tab3">已撤回</a></li>
            </ul>
	</div>
        <div class="widget-content tab-content">       	 
            <!-- 1页表格 正文 -->
            <div id="tab1" class="tab-pane active">
		<!-- 表格 正文 -->
        <table class="table table-bordered table-striped" id="mailTable" >        
        <thead>
        <th>邮件ID</th>
        <th>发送时间</th>
        <th>发送对象</th>
        <th>发送服务器</th>
        <th>邮件标题</th>
        <th>邮件内容</th>
        <th>附件</th>
        <th>公会</th>
        <th>时间</th>
        <th>等级</th>
        <th>VIP</th>
        <th>操作</th>
        </thead>
        <tbody> 
            <?php if(! empty($lookdata)&& is_array($lookdata)):?>
            <?php $i = 0;foreach ($lookdata as $newdata):?> 
             <?php if( $newdata['statu'] =="审核中"): ?>
            <tr>
                 <td data-name="id" style="text-align: center;"><?php echo $newdata['id']; ?></td>
                 <td data-name="showtime" style="text-align: center;"><?php echo date('m-d H:i:s',$newdata['sendtime']); ?></td>
                 <td data-name="sendtime" style="display:none;"><?php echo date('Y-m-d H:i:s',$newdata['sendtime']); ?></td>
                 <td data-name="roleid" style="display:none;"><?php echo $newdata['roleid']; ?></td>
                 <td data-name="lookrole" style=" text-align: center;">
                    <button class="btn btn-link lookrole">查看</button>
                 </td> 
                 <td data-name="lookserver" style=" text-align: center;">
                    <button class="btn btn-link lookserver">查看</button>
                 </td>
                 <td data-name="title" style="text-align: center;"><?php echo $newdata['title']; ?></td>
                 <td data-name="context" style="display:none;"><?php echo $newdata['context']; ?></td>
                 <td data-name="lookcontext" style=" text-align: center;">
                    <button class="btn btn-link lookcontext">查看</button>
                 </td>  
                 <td data-name="looktag" style=" text-align: center;">
                    <button class="btn btn-link looktag">查看</button>
                 </td>
                  <td data-name="sid" style="display:none;"><?php echo $newdata['sid']; ?></td>
                 <td data-name="tag" style="display:none;"><?php echo $newdata['tag']; ?></td>
                 <td data-name="coin" style="display:none;"><?php echo $newdata['coin']; ?></td>
                 <td data-name="money" style="display:none;"><?php echo $newdata['money']; ?></td>
                 <td data-name="herosoul" style="display:none;"><?php echo $newdata['herosoul']; ?></td>
                 <td data-name="honour" style="display:none;"><?php echo $newdata['honour']; ?></td>
                 <td data-name="heroid" style="display:none;"><?php echo $newdata['heroid']; ?></td>
                 <td data-name="hername" style="display:none;"><?php echo $newdata['heroid']; ?></td>
                 <td data-name="equipid" style="display:none;"><?php echo $newdata['equipid']; ?></td>
                 <td data-name="equipnum" style="display:none;"><?php echo $newdata['equipnum']; ?></td>
                 <td data-name="heronum" style="display:none;"><?php echo $newdata['heronum']; ?></td>
                 <td data-name="propid1" style="display:none;"><?php echo $newdata['prop_id1']; ?></td>
                 <td data-name="propnum1" style="display:none;"><?php echo $newdata['prop_num1']; ?></td>
                 <td data-name="propid2" style="display:none;"><?php echo $newdata['prop_id2']; ?></td>
                 <td data-name="propnum2" style="display:none;"><?php echo $newdata['prop_num2']; ?></td>
                 <td data-name="propid3" style="display:none;"><?php echo $newdata['prop_id3']; ?></td>
                 <td data-name="propnum3" style="display:none;"><?php echo $newdata['prop_num3']; ?></td>
                 <td data-name="propid4" style="display:none;"><?php echo $newdata['prop_id4']; ?></td>
                 <td data-name="propnum4" style="display:none;"><?php echo $newdata['prop_num4']; ?></td>
                 <td data-name="statu" style="display:none;"><?php echo $newdata['statu']; ?></td>
                 <td data-name="equipsoul" style="display:none;"><?php echo $newdata['equipsoul']; ?></td>
                 <td data-name="honor_s" style="display:none;"><?php echo $newdata['honor_s']; ?></td>
                 <td data-name="sender" style="display:none;"><?php echo $newdata['sender']; ?></td>
                 <td data-name="author" style="display:none;"><?php echo $newdata['author']; ?></td>
                 <td data-name="prop1name" style="display:none;"><?php echo $lookname[$i]['prop1name']; ?></td>
                 <td data-name="prop2name" style="display:none;"><?php echo $lookname[$i]['prop2name']; ?></td>
                 <td data-name="prop3name" style="display:none;"><?php echo $lookname[$i]['prop3name']; ?></td>
                 <td data-name="prop4name" style="display:none;"><?php echo $lookname[$i]['prop4name']; ?></td>
                 <td data-name="heroname" style="display:none;"><?php echo $lookname[$i]['heroname']; ?></td>
                 <td data-name="equipname" style="display:none;"><?php echo $lookname[$i]['equipname']; ?></td>
                 <td data-name="guild" style=" text-align: center;"><?php echo $newdata['guild']; ?></td>
                 <td data-name="showtime" style=" text-align: center;"><?php 
                 if($newdata['begintime'] != 0  )                
                 echo date('m-d H:i:s',$newdata['begintime']); ?> -<?php 
                 if($newdata['endtime'] != 0 )
                     echo date('m-d H:i:s',$newdata['endtime']); ?></td>
                 <td data-name="begintime" style=" display:none;"><?php echo $newdata['begintime']; ?></td>
                 <td data-name="endtime" style=" display:none;"><?php echo $newdata['endtime']; ?></td>
                 <td data-name="showrole" style=" text-align: center;"><?php echo $newdata['maxrole']; ?>-<?php echo $newdata['minrole']; ?></td>
                 <td data-name="maxrole" style=" display:none;"><?php echo $newdata['maxrole']; ?></td>
                 <td data-name="minrole" style=" display:none;"><?php echo $newdata['minrole']; ?></td>
                 <td data-name="showvip" style=" text-align: center;"><?php echo $newdata['maxvip']; ?>-<?php echo $newdata['minvip']; ?></td>
                 <td data-name="maxvip" style=" display:none;"><?php echo $newdata['maxvip']; ?></td>
                 <td data-name="minvip" style=" display:none;"><?php echo $newdata['minvip']; ?></td>
                 <td style="text-align: center;">     
                 <?php if ($editMail): ?>             
                    <button class="btn btn-link editmailBtn" >编辑</button>  
                 <?php endif; ?>
                 <?php if ($passMail): ?>             
                    <button class="btn btn-link passmailBtn" >审核</button>  
                 <?php endif; ?>
                <?php if ($delMail): ?>             
                    <button class="btn btn-link delmailBtn">删除</button> 
                <?php endif; ?>
                 </td>
            </tr>
            <?php endif; ?>
            <?php if( $newdata['statu'] =="已审核"): ?>
            <tr>
                 <td data-name="id" style="text-align: center;"><?php echo $newdata['id']; ?></td>
                 <td data-name="showtime" style="text-align: center;"><?php echo date('m-d H:i:s',$newdata['sendtime']); ?></td>
                 <td data-name="sendtime" style="display:none;"><?php echo date('Y-m-d H:i:s',$newdata['sendtime']); ?></td>
                 <td data-name="roleid" style="display:none;"><?php echo $newdata['roleid']; ?></td>
                 <td data-name="lookrole" style=" text-align: center;">
                    <button class="btn btn-link lookrole">查看</button>
                 </td> 
                 <td data-name="lookserver" style=" text-align: center;">
                    <button class="btn btn-link lookserver">查看</button>
                 </td>
                 <td data-name="title" style="text-align: center;"><?php echo $newdata['title']; ?></td>
                 <td data-name="context" style="display:none;"><?php echo $newdata['context']; ?></td>
                 <td data-name="lookcontext" style=" text-align: center;">
                    <button class="btn btn-link lookcontext">查看</button>
                 </td>  
                 <td data-name="looktag" style=" text-align: center;">
                    <button class="btn btn-link looktag">查看</button>
                 </td>
                 <td data-name="sid" style="display:none;"><?php echo $newdata['sid']; ?></td>
                 <td data-name="tag" style="display:none;"><?php echo $newdata['tag']; ?></td>
                 <td data-name="coin" style="display:none;"><?php echo $newdata['coin']; ?></td>
                 <td data-name="money" style="display:none;"><?php echo $newdata['money']; ?></td>
                 <td data-name="herosoul" style="display:none;"><?php echo $newdata['herosoul']; ?></td>
                 <td data-name="honour" style="display:none;"><?php echo $newdata['honour']; ?></td>
                 <td data-name="heroid" style="display:none;"><?php echo $newdata['heroid']; ?></td>
                 <td data-name="heronum" style="display:none;"><?php echo $newdata['heronum']; ?></td>
                 <td data-name="equipid" style="display:none;"><?php echo $newdata['equipid']; ?></td>
                 <td data-name="equipnum" style="display:none;"><?php echo $newdata['equipnum']; ?></td>
                 <td data-name="propid1" style="display:none;"><?php echo $newdata['prop_id1']; ?></td>
                 <td data-name="propnum1" style="display:none;"><?php echo $newdata['prop_num1']; ?></td>
                 <td data-name="propid2" style="display:none;"><?php echo $newdata['prop_id2']; ?></td>
                 <td data-name="propnum2" style="display:none;"><?php echo $newdata['prop_num2']; ?></td>
                 <td data-name="propid3" style="display:none;"><?php echo $newdata['prop_id3']; ?></td>
                 <td data-name="propnum3" style="display:none;"><?php echo $newdata['prop_num3']; ?></td>
                 <td data-name="propid4" style="display:none;"><?php echo $newdata['prop_id4']; ?></td>
                 <td data-name="propnum4" style="display:none;"><?php echo $newdata['prop_num4']; ?></td>
                 <td data-name="statu" style="display:none;"><?php echo $newdata['statu']; ?></td>
                 <td data-name="equipsoul" style="display:none;"><?php echo $newdata['equipsoul']; ?></td>
                 <td data-name="honor_s" style="display:none;"><?php echo $newdata['honor_s']; ?></td>
                 <td data-name="sender" style="display:none;"><?php echo $newdata['sender']; ?></td>
                 <td data-name="author" style="display:none;"><?php echo $newdata['author']; ?></td>
                 <td data-name="prop1name" style="display:none;"><?php echo $lookname[$i]['prop1name']; ?></td>
                 <td data-name="prop2name" style="display:none;"><?php echo $lookname[$i]['prop2name']; ?></td>
                 <td data-name="prop3name" style="display:none;"><?php echo $lookname[$i]['prop3name']; ?></td>
                 <td data-name="prop4name" style="display:none;"><?php echo $lookname[$i]['prop4name']; ?></td>
                 <td data-name="heroname" style="display:none;"><?php echo $lookname[$i]['heroname']; ?></td>
                 <td data-name="equipname" style="display:none;"><?php echo $lookname[$i]['equipname']; ?></td>
                 <td data-name="guild" style=" text-align: center;"><?php echo $newdata['guild']; ?></td>
                 <td data-name="showtime" style=" text-align: center;"><?php 
                 if($newdata['begintime'] != 0  )  
                 echo date('m-d H:i:s',$newdata['begintime']); ?> -<?php 
                 if($newdata['endtime'] != 0 )
                 echo date('m-d H:i:s',$newdata['endtime']); ?></td>
                 <td data-name="begintime" style=" display:none;"><?php echo $newdata['begintime']; ?></td>
                 <td data-name="endtime" style=" display:none;"><?php echo $newdata['endtime']; ?></td>
                 <td data-name="showrole" style=" text-align: center;"><?php echo $newdata['maxrole']; ?>-<?php echo $newdata['minrole']; ?></td>
                 <td data-name="maxrole" style=" display:none;"><?php echo $newdata['maxrole']; ?></td>
                 <td data-name="minrole" style=" display:none;"><?php echo $newdata['minrole']; ?></td>
                 <td data-name="showvip" style=" text-align: center;"><?php echo $newdata['maxvip']; ?>-<?php echo $newdata['minvip']; ?></td>
                 <td data-name="maxvip" style=" display:none;"><?php echo $newdata['maxvip']; ?></td>
                 <td data-name="minvip" style=" display:none;"><?php echo $newdata['minvip']; ?></td>
                 <td style="text-align: center;">
      
                 <?php if ($editMail): ?>             
                   <button class="btn btn-link editmailBtn" disabled="true" >编辑</button>  
                 <?php endif; ?>
                 <?php //if ($passMail): ?>             
                   <!--  <button class="btn btn-link passmailBtn" disabled="true" >审核</button>  -->
                 <?php// endif; ?>
                <?php if ($sendMail): ?>             
                    <button class="btn btn-link sendmailBtn">发送</button>  
                <?php endif; ?>
                 </td>
            </tr>
            <?php endif; ?> 
            <?php $i++; endforeach;?>
            <?php endif; ?>
            </tbody>
            </table>
             
            </div>
          
          <!-- 2页表格 正文 -->
            <div id="tab2" class="tab-pane">
             
		<!-- 表格 正文 -->
            <table class="table table-bordered table-striped">                
                    <thead>
                    <th>邮件ID</th>
                    <th>发送时间</th>
                    <th>发送对象</th>
                    <th>发送服务器</th>
                    <th>邮件标题</th>
                    <th>邮件内容</th>
                    <th>附件</th>
                    <th>公会</th>
                    <th>时间</th>
                    <th>等级</th>
                    <th>VIP</th>
                    <th>操作</th>
                    </thead>
            <tbody>
                <?php if(! empty($alsenddata)&& is_array($alsenddata)):?>
                <?php $i = 0;foreach ($alsenddata as $data):?>
                <tr>
                 <td data-name="id" style="text-align: center;"><?php echo $data['id']; ?></td>
                 <td data-name="showtime" style="text-align: center;"><?php echo date('m-d H:i:s',$data['sendtime']); ?></td>
                 <td data-name="sendtime" style="display:none;"><?php echo date('Y-m-d H:i:s',$data['sendtime']); ?></td>
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
                 <td data-name="sid" style="display:none;"><?php echo $data['sid']; ?></td>
                 <td data-name="tag" style="display:none;"><?php echo $data['tag']; ?></td>
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
                 <td data-name="prop1name" style="display:none;"><?php echo $alsendname[$i]['prop1name']; ?></td>
                 <td data-name="prop2name" style="display:none;"><?php echo $alsendname[$i]['prop2name']; ?></td>
                 <td data-name="prop3name" style="display:none;"><?php echo $alsendname[$i]['prop3name']; ?></td>
                 <td data-name="prop4name" style="display:none;"><?php echo $alsendname[$i]['prop4name']; ?></td>
                 <td data-name="heroname" style="display:none;"><?php echo $alsendname[$i]['heroname']; ?></td>
                 <td data-name="equipname" style="display:none;"><?php echo $alsendname[$i]['equipname']; ?></td>
                 <td data-name="guild" style=" text-align: center;"><?php echo $data['guild']; ?></td>
                 <td data-name="showtime" style=" text-align: center;"><?php 
                 if($data['begintime'] != 0 )  
                 echo date('m-d H:i:s',$data['begintime']); ?> -<?php
                 if($data['endtime'] != 0 )
                 echo date('m-d H:i:s',$data['endtime']); ?></td>
                 <td data-name="begintime" style=" display:none;"><?php echo $data['begintime']; ?></td>
                 <td data-name="endtime" style=" display:none;"><?php echo $data['endtime']; ?></td>
                 <td data-name="showrole" style=" text-align: center;"><?php echo $data['maxrole']; ?>-<?php echo $data['minrole']; ?></td>
                 <td data-name="maxrole" style=" display:none;"><?php echo $data['maxrole']; ?></td>
                 <td data-name="minrole" style=" display:none;"><?php echo $data['minrole']; ?></td>
                 <td data-name="showvip" style=" text-align: center;"><?php echo $data['maxvip']; ?>-<?php echo $data['minvip']; ?></td>
                 <td data-name="maxvip" style=" display:none;"><?php echo $data['maxvip']; ?></td>
                 <td data-name="minvip" style=" display:none;"><?php echo $data['minvip']; ?></td>
                 <td style="text-align: center;">
                <?php if ($revokeMail): ?>             
                    <button class="btn btn-link returnmailBtn"  >撤回</button>  
                <?php endif; ?>
                 </td>
            </tr>
            <?php $i++; endforeach;?>
            <?php endif; ?>
        </tbody>
        
        </table>							
         </div> 
          
           <!-- 3页表格 正文 -->
            <div id="tab3" class="tab-pane">
		<!-- 表格 正文 -->
            <table class="table table-bordered table-striped">                
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
                <?php if(! empty($revokedata)&& is_array($revokedata)):?>
                <?php $i = 0;foreach ($revokedata as $stdata):?>
                <tr>
                 <td data-name="id" style="text-align: center;"><?php echo $stdata['id']; ?></td>
                 <td data-name="sendtime" style="text-align: center;"><?php echo date('m-d H:i:s',$stdata['sendtime']); ?></td>
                 <td data-name="roleid" style="display:none;"><?php echo $stdata['roleid']; ?></td>
                 <td data-name="lookrole" style=" text-align: center;">
                    <button class="btn btn-link lookrole">查看</button>
                 </td> 
                 <td data-name="lookserver" style=" text-align: center;">
                    <button class="btn btn-link lookserver">查看</button>
                 </td>
                 <td data-name="title" style="text-align: center;"><?php echo $stdata['title']; ?></td>
                 <td data-name="context" style="display:none;"><?php echo $stdata['context']; ?></td>
                 <td data-name="lookcontext" style=" text-align: center;">
                    <button class="btn btn-link lookcontext">查看</button>
                 </td>  
                 <td data-name="looktag" style=" text-align: center;">
                    <button class="btn btn-link looktag">查看</button>
                 </td>
                 <td data-name="sid" style="display:none;"><?php echo $stdata['sid']; ?></td>
                 <td data-name="tag" style="display:none;"><?php echo $stdata['tag']; ?></td>
                 <td data-name="coin" style="display:none;"><?php echo $stdata['coin']; ?></td>
                 <td data-name="money" style="display:none;"><?php echo $stdata['money']; ?></td>
                 <td data-name="herosoul" style="display:none;"><?php echo $stdata['herosoul']; ?></td>
                 <td data-name="honour" style="display:none;"><?php echo $stdata['honour']; ?></td>
                 <td data-name="heroid" style="display:none;"><?php echo $stdata['heroid']; ?></td>
                 <td data-name="heronum" style="display:none;"><?php echo $stdata['heronum']; ?></td>
                 <td data-name="equipid" style="display:none;"><?php echo $stdata['equipid']; ?></td>
                 <td data-name="equipnum" style="display:none;"><?php echo $stdata['equipnum']; ?></td>
                 <td data-name="propid1" style="display:none;"><?php echo $stdata['prop_id1']; ?></td>
                 <td data-name="propnum1" style="display:none;"><?php echo $stdata['prop_num1']; ?></td>
                 <td data-name="propid2" style="display:none;"><?php echo $stdata['prop_id2']; ?></td>
                 <td data-name="propnum2" style="display:none;"><?php echo $stdata['prop_num2']; ?></td>
                 <td data-name="propid3" style="display:none;"><?php echo $stdata['prop_id3']; ?></td>
                 <td data-name="propnum3" style="display:none;"><?php echo $stdata['prop_num3']; ?></td>
                 <td data-name="propid4" style="display:none;"><?php echo $stdata['prop_id4']; ?></td>
                 <td data-name="propnum4" style="display:none;"><?php echo $stdata['prop_num4']; ?></td>
                 <td data-name="statu" style="display:none;"><?php echo $stdata['statu']; ?></td>
                 <td data-name="equipsoul" style="display:none;"><?php echo $stdata['equipsoul']; ?></td>
                 <td data-name="honor_s" style="display:none;"><?php echo $stdata['honor_s']; ?></td>
                 <td data-name="sender" style="display:none;"><?php echo $stdata['sender']; ?></td>
                 <td data-name="author" style="display:none;"><?php echo $stdata['author']; ?></td>
                 <td data-name="prop1name" style="display:none;"><?php echo $revokename[$i]['prop1name']; ?></td>
                 <td data-name="prop2name" style="display:none;"><?php echo $revokename[$i]['prop2name']; ?></td>
                 <td data-name="prop3name" style="display:none;"><?php echo $revokename[$i]['prop3name']; ?></td>
                 <td data-name="prop4name" style="display:none;"><?php echo $revokename[$i]['prop4name']; ?></td>
                 <td data-name="heroname" style="display:none;"><?php echo $revokename[$i]['heroname']; ?></td>
                 <td data-name="equipname" style="display:none;"><?php echo $revokename[$i]['equipname']; ?></td>
                 <td data-name="guild" style="display:none;"><?php echo $stdata['guild']; ?></td>
                 <td data-name="begintime" style="display:none;"><?php echo $stdata['begintime']; ?></td>
                 <td data-name="endtime" style="display:none;"><?php echo $stdata['endtime']; ?></td>
                 <td data-name="maxrole" style="display:none;"><?php echo $stdata['maxrole']; ?></td>
                 <td data-name="minrole" style="display:none;"><?php echo $stdata['minrole']; ?></td>
                 <td data-name="maxvip" style="display:none;"><?php echo $stdata['maxvip']; ?></td>
                 <td data-name="minvip" style="display:none;"><?php echo $stdata['minvip']; ?></td>
                 <td style="text-align: center;">
      
                 <?php if ($editMail): ?>             
                    <button class="btn btn-link editmailBtn" disabled="true" >编辑</button>  
                 <?php endif; ?>
                 <?php if ($passMail): ?>             
                    <button class="btn btn-link passmailBtn" disabled="true" >审核</button>  
                 <?php endif; ?>
                <?php if ($revokeMail): ?>             
                    <button class="btn btn-link returnmailBtn" disabled="true"  >撤回</button>  
                <?php endif; ?>
                <?php if ($delMail): ?>             
                    <button class="btn btn-link delmailBtn">删除</button> 
                <?php endif; ?>
                 </td>
            </tr>
            <?php $i++; endforeach; ?>
            <?php endif; ?>
            </tbody>        
        </table>							
         </div>          
                     
        </div>        
    </div> 
   </div> 
</div>

<!-- 分页组件 begin
<?php// if(! empty($pagehtml)):?>
<div class="row center" style="text-align: center;">	
<?php //echo htmlspecialchars_decode($pagehtml);?> 
</div>
<?php// endif;?>
 -->
<!-- 分页组件 end -->
<?php 
    echo Page_Lib::footer(); 
?>

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
                        <div class="controls"><textarea class="form-control " name="context" rows="7" maxlength="1000" placeholder="最多输入一千汉字,包括标点符号和空格"></textarea></div>
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


<div class="modal fade" id="passMailModal" tabindex="-1" role="dialog" aria-labelledby="passMailModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="passMailModalLabel">审核邮件</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" action="#" method="POST" id="passMailForm" onsubmit="return false;">
                    <input type="hidden" name="id"/>
                    <div class="control-group">
                        <label class="col-md-3 control-label">发布人签名</label>
                        <div class="controls"><input type="text" class="form-control" name="sender" readonly="true"/></div>
                    </div>
                    <div class="control-group">
                        <label class="col-md-3 control-label">邮件标题</label>
                        <div class="controls"><input type="text" class="form-control" name="title" readonly="true"/></div>
                    </div>
                      <div class="control-group">
                        <label class="col-md-3 control-label">邮件内容</label>
                        <div class="controls"><textarea class="form-control " name="context" rows="7" maxlength="1000" placeholder="最多输入一千汉字,包括标点符号和空格" readonly="true" ></textarea></div>
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
                <button type="button" class="btn btn-primary" id="passMailbtn">确认通过</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">取消关闭</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="sendMailModal" tabindex="-1" role="dialog" aria-labelledby="sendMailModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="sendMailModalLabel">审核邮件</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" action="#" method="POST" id="sendMailForm" onsubmit="return false;">
                    <input type="hidden" name="id"/>
                    <input type="hidden" name="sid"/>
                    <input type="hidden" name="sendtime"/>
                    <input type="hidden" name="roleid"/>
                    <input type="hidden" name="tag"/>
                    <input type="hidden" name="coin"/>
                    <input type="hidden" name="money"/>
                    <input type="hidden" name="herosoul"/>
                    <input type="hidden" name="equipsoul"/>
                    <input type="hidden" name="honour"/>
                    <input type="hidden" name="heroid"/>
                    <input type="hidden" name="heronum"/>
                    <input type="hidden" name="equipid"/>
                    <input type="hidden" name="equipnum"/>
                    <input type="hidden" name="honor_s"/>
                    <input type="hidden" name="propid1"/>
                    <input type="hidden" name="propnum1"/>
                    <input type="hidden" name="propid2"/>
                    <input type="hidden" name="propnum2"/>
                    <input type="hidden" name="propid3"/>
                    <input type="hidden" name="propnum3"/>
                    <input type="hidden" name="propid4"/>
                    <input type="hidden" name="propnum4"/> 
                    <input type="hidden" name="guild"/>  
                    <input type="hidden" name="begintime"/>  
                    <input type="hidden" name="endtime"/>  
                    <input type="hidden" name="maxrole"/>  
                    <input type="hidden" name="minrole"/>
                    <input type="hidden" name="maxvip"/>  
                    <input type="hidden" name="minvip"/>  
                    
                    <div class="control-group">
                        <label class="col-md-3 control-label">发布人签名</label>
                        <div class="controls"><input type="text" class="form-control" name="sender" readonly="true"/></div>
                    </div>
                    <div class="control-group">
                        <label class="col-md-3 control-label">邮件标题</label>
                        <div class="controls"><input type="text" class="form-control" name="title" readonly="true"/></div>
                    </div>
                      <div class="control-group">
                        <label class="col-md-3 control-label">邮件内容</label>
                        <div class="controls"><textarea class="form-control " name="context" rows="7" maxlength="1000" placeholder="最多输入一千汉字,包括标点符号和空格" readonly="true" ></textarea></div>
                    </div>                
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="sendMailbtn">确认发送</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">取消关闭</button>
            </div>
        </div>
    </div>
</div>
