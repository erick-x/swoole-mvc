<?php

$insert_html = Page_Lib::loadJs('ajaxupload');
$insert_html .= Page_Lib::loadJs('loadmailfile');
$insert_html .= Page_Lib::loadJs('mail');
$insert_html .= Page_Lib::loadJs('multselect');
echo Page_Lib::head($insert_html);
?>
<!-- 站内导航 -->
<div id="content-header">
    <h1>后台基本操作</h1>
        <div class="btn-group">        
    </div>
</div>
 <div id="breadcrumb">
    <a href="/index/index" title="跳到首页" class="tip-bottom"><i class="icon-home"></i> 首页</a>
    <a href="#" class="current">新建邮件</a>
 </div>
<div class="container-fluid">					
  <div class="row-fluid">
    <div class="widget-box">
    <div class="widget-title">
	<span class="icon">
            <i class="icon-th"></i>
        </span>
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#tab1">个人邮件</a></li>
                <li><a data-toggle="tab" href="#tab2">群发邮件</a></li>
                <li><a data-toggle="tab" href="#tab3">全服邮件</a></li>
            </ul>
	</div>
        <div class="widget-content tab-content">
	  <!-- 1页表格 正文 -->
            <div id="tab1" class="tab-pane active">
                 <form class="form-horizontal" action="/mail/saveMail" method="POST" id="savePerMailForm" onsubmit="return false;">        
                    <table class="table  table-striped" > 
                    <tbody>
                        <tr>
                            <td>
                              <div class="control-group">
                                <label class="col-md-3 control-label">*区服</label>
                                <div class="controls">
                                    <select class="form-control" name="sid"  required="">
                                        <option value="" selected="selected">请选择</option>
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
                                    <label class="control-label">*角色ID</label>
                                    <div class="controls"><input type="text" class="form-control" name="roleid"  placeholder="玩家的帐号ID"/></div>
                                </div>
                            </td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>
                                <div class="control-group">
                                    <label class="control-label">*发送时间</label>
                                    <div class="controls"><input type="text" class="datetimepicker form-control "   placeholder="请选择时间" name="sendtime"/></div>
                                </div> 
                            </td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>
                               <div class="control-group">
                        <label class="control-label">*邮件标题</label>
                        <div class="controls "><input type="text" class="form-control"  maxlength="10"  placeholder="最多输入十个汉字" name="mailtitle"/></div>
                    </div> 
                            </td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>
                              <div class="control-group">
                                    <label class="col-md-3 control-label">*邮件内容</label>
                                    <div class="controls">
                                        <textarea class="form-control " name="context" rows="7" maxlength="170"   placeholder="最多输入170汉字,包括标点符号和空格"></textarea>
                                    </div>
                                </div>  
                            </td>
                            <td></td>
                        </tr>
                            <tr>
                                <td>
                                    <div class="control-group">
                                    <div class="control-group">
                                        <label class="col-md-3 control-label">添加附件: </label>
                                         <div class="controls ">
                                             <span style="color:gray" > 附件个数不能超过四个</span>   
                                        </div> 
                                    </div>
                                    </div>
                                </td> 
                                <td></td>
                            </tr>
                            <tr>
                                <td>
                                    <label class="checkbox-inline">
                                    <div class="control-group">
                                        <div class="controls ">金币
                                            <input type="checkbox" value="coin" name="checkbox[]"/>
                                            <input type="text" class="form-control " maxlength="6"  placeholder="不可输入小数" name="coin"/>
                                        </div>  
                                    </div>
                                    </label>    
                                </td>
                                <td>
                                    
                                    <div class="control-group">
                                        <label class="checkbox-inline">
                                        <div class="controls ">英雄魂石
                                            <input type="checkbox" value="herosoul" name="checkbox[]"/>
                                            <input type="text" class="form-control" maxlength="4" style="width:50%" placeholder="不可输入小数" name="herosoul"/>
                                        </div>
                                            </label>
                                    </div>
                                    
                                </td>  
                            </tr>
                            <tr>
                                <td>
                                    
                                    <div class="control-group">
                                        <label class="checkbox-inline">
                                        <div class="controls ">声望
                                            <input type="checkbox" value="honor_s" name="checkbox[]"/>
                                            <input type="text" class="form-control " maxlength="4"  placeholder="不可输入小数" name="honor_s"/>
                                        </div>  
                                            </label>
                                    </div>
                                    
                                </td>
                                <td>
                                    
                                    <div class="control-group">
                                        <label class="checkbox-inline">
                                        <div class="controls ">装备魂石
                                            <input type="checkbox" value="equipsoul" name="checkbox[]"/>
                                            <input type="text" class="form-control" maxlength="4" style="width:50%" placeholder="不可输入小数" name="equipsoul"/>
                                        </div>
                                             </label>
                                    </div>
                                   
                                </td>  
                            </tr>
                            <tr>
                                <td>
                                    
                                    <div class="control-group">
                                        <label class="checkbox-inline">
                                        <div class="controls ">钻石
                                            <input type="checkbox" value="money" name="checkbox[]"/>
                                            <input type="text" class="form-control "  maxlength="4" placeholder="不可输入小数" name="money"/>
                                        </div> 
                                            </label>  
                                    </div>
                                      
                                </td>
                                <td>
                                    
                                    <div class="control-group">
                                        <label class="checkbox-inline">
                                        <div class="controls ">荣誉点
                                            <input type="checkbox" value="honour" name="checkbox[]"/>
                                            <input type="text" class="form-control"  maxlength="4" style="width:50%"  placeholder="不可输入小数" name="honour"/>
                                        </div>
                                        </label>
                                    </div>
                                        
                                </td>  
                            </tr>
                            <tr>
                                <td>
                                    
                                    <div class="control-group">
                                        <label class="checkbox-inline">
                                        <div class="controls ">卡牌ID
                                            <input type="checkbox" value="heroid" name="checkbox[]"/>
                                            <input type="text" class="form-control " placeholder="英雄的ID" name="heroid" onblur="checkProp(this.value,1)"/>
                                            
                                        </div> 
                                            
                                        </label>
                                    </div>
                                 
                                </td>
                                <td>      
                                    <div class="control-group">
                                        <label class="control-label">卡牌数量</label>
                                        <div class="controls "><input type="text" class="form-control"  maxlength="2" placeholder="不可输入小数" name="heronum"/></div>
                            
                                    </div>
                                </td>  
                            </tr>
                            <tr>
                                <td>
                                    
                                    <div class="control-group">
                                        <label class="checkbox-inline">
                                        <div class="controls ">装备ID
                                            <input type="checkbox" value="equip" name="checkbox[]"/>
                                            <input type="text" class="form-control " placeholder="装备或饰品的ID" name="equipid" onblur="checkProp(this.value,2)" />
                                            
                                        </div> 
                                            
                                        </label>
                                    </div>
                                 
                                </td>
                                <td>      
                                    <div class="control-group">
                                        <label class="control-label">装备数量</label>
                                        <div class="controls "><input type="text" class="form-control"  maxlength="2" placeholder="不可输入小数" name="equipnum"/></div>
                            
                                    </div>
                                </td>  
                            </tr>
                            <tr>
                                <td>
                                    
                                    <div class="control-group">
                                        <label class="checkbox-inline">
                                        <div class="controls ">道具ID1
                                            <input type="checkbox" value="propid1" name="checkbox[]"/>
                                            <input type="text" class="form-control " placeholder="道具的ID" name="propid1" onblur="checkProp(this.value,3)"/>
                                        </div>
                                            </label>
                                    </div>
                                 
                                </td>
                                <td>
                                    <div class="control-group">
                                        <label class="control-label">道具数量1</label>
                                        <div class="controls "><input type="text" class="form-control"  maxlength="5" placeholder="不可输入小数" name="propnum1"/></div>
                                    </div>
                                </td>  
                            </tr>
                            <tr>
                                <td>
                                    
                                    <div class="control-group">
                                        <label class="checkbox-inline">
                                        <div class="controls ">道具ID2
                                            <input type="checkbox" value="propid2" name="checkbox[]"/>
                                            <input type="text" class="form-control " placeholder="道具的ID" name="propid2" onblur="checkProp(this.value,3)"/>
                                        </div>  
                                            </label>
                                    </div>
                                 
                                </td>
                                <td>
                                    <div class="control-group">
                                        <label class="control-label">道具数量2</label>
                                        <div class="controls "><input type="text" class="form-control"  maxlength="5" placeholder="不可输入小数" name="propnum2"/></div>
                                    </div>
                                </td>  
                            </tr>
                            <tr>
                                <td>
                                    
                                    <div class="control-group">
                                        <label class="checkbox-inline">
                                        <div class="controls ">道具ID3
                                            <input type="checkbox" value="propid3" name="checkbox[]"/>
                                            <input type="text" class="form-control " placeholder="道具的ID" name="propid3" onblur="checkProp(this.value,3)" />
                                        </div> 
                                            </label>
                                    </div>
                                 
                                </td>
                                <td>
                                    <div class="control-group">
                                        <label class="control-label">道具数量3</label>
                                        <div class="controls "><input type="text" class="form-control"  maxlength="5" placeholder="不可输入小数" name="propnum3"/></div>
                                    </div>
                                </td>  
                            </tr>
                            <tr>
                                <td>
                                    
                                    <div class="control-group">
                                        <label class="checkbox-inline">
                                        <div class="controls ">道具ID4
                                            <input type="checkbox" value="propid4" name="checkbox[]"/>
                                            <input type="text" class="form-control "  placeholder="道具的ID" name="propid4" onblur="checkProp(this.value,3)"/></div>  
                                    </label>
                                 </div>
                                </td>
                                <td>
                                    <div class="control-group">
                                        <label class="control-label">道具数量4</label>
                                        <div class="controls "><input type="text" class="form-control"  maxlength="5"  placeholder="不可输入小数" name="propnum4"/></div>
                                    </div>
                                </td>  
                            </tr>
                        </tbody>
                    </table>
                     <?php if(!empty($addPerMail)):?>
                     <div style="text-align: center;">	
                        <button class="btn btn-success" id="savePerBtn" style="margin: auto;">保存</button>
                    </div>
                     <?php endif;?>
                </form>
                
            </div>
          <!-- 2页表格 正文 -->
            <div id="tab2" class="tab-pane ">
                  <form class="form-horizontal" action="/mail/saveMail" method="POST" id="saveSerMailForm" onsubmit="return false;">        
                    <table class="table  table-striped" > 
                    <tbody> 
                        <tr>
                            <td>
                                <?php if($addUser):?>
                                <div class="control-group">
                                    <div class="buttons">
                                        <a title="导入用户" class="btn btn-success" id="loadUserBtn" ><i class="icon-plus"></i> 导入批量用户</a>
                                    </div>
                                </div>
                                <?php endif;?>
                            </td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>
                                <div class="control-group">
                                    <label class="control-label">*发送时间</label>
                                    <div class="controls"><input type="text" class="datetimepicker form-control " placeholder="请选择时间" name="sendtime"/></div>
                                </div> 
                            </td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>
                               <div class="control-group">
                        <label class="control-label">*邮件标题</label>
                        <div class="controls "><input type="text" class="form-control"  maxlength="10" placeholder="最多输入十个汉字" name="mailtitle"/></div>
                    </div> 
                            </td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>
                              <div class="control-group">
                                    <label class="col-md-3 control-label">*邮件内容</label>
                                    <div class="controls">
                                        <textarea class="form-control " name="context" rows="7" maxlength="600" placeholder="最多输入600汉字,包括标点符号和空格"></textarea>
                                    </div>
                                </div>  
                            </td>
                            <td></td>
                        </tr>
                            <tr>
                                <td>
                                    <div class="control-group">
                                        <label class="col-md-3 control-label">添加附件: </label>
                                         <div class="controls ">
                                             <span style="color:gray" > 附件个数不能超过四个</span>   
                                        </div> 
                                    </div>
                                </td> 
                                <td></td>
                            </tr>
                            <tr>
                                <td>
                                    <label class="checkbox-inline">
                                    <div class="control-group">
                                        <div class="controls ">金币
                                            <input type="checkbox" value="coin" name="checkbox[]"/>
                                            <input type="text" class="form-control " maxlength="6"  placeholder="不可输入小数" name="coin"/>
                                        </div>  
                                    </div>
                                    </label>    
                                </td>
                                <td>
                                    
                                    <div class="control-group">
                                        <label class="checkbox-inline">
                                        <div class="controls ">英雄魂石
                                            <input type="checkbox" value="herosoul" name="checkbox[]"/>
                                            <input type="text" class="form-control" maxlength="4" style="width:50%" placeholder="不可输入小数" name="herosoul"/>
                                        </div>
                                            </label>
                                    </div>
                                    
                                </td>  
                            </tr>
                            <tr>
                                <td>
                                    
                                    <div class="control-group">
                                        <label class="checkbox-inline">
                                        <div class="controls ">声望
                                            <input type="checkbox" value="honor_s" name="checkbox[]"/>
                                            <input type="text" class="form-control " maxlength="4"  placeholder="不可输入小数" name="honor_s"/>
                                        </div>  
                                            </label>
                                    </div>
                                    
                                </td>
                                <td>
                                    
                                    <div class="control-group">
                                        <label class="checkbox-inline">
                                        <div class="controls ">装备魂石
                                            <input type="checkbox" value="equipsoul" name="checkbox[]"/>
                                            <input type="text" class="form-control" maxlength="4" style="width:50%" placeholder="不可输入小数" name="equipsoul"/>
                                        </div>
                                             </label>
                                    </div>
                                   
                                </td>  
                            </tr>
                            <tr>
                                <td>
                                    
                                    <div class="control-group">
                                        <label class="checkbox-inline">
                                        <div class="controls ">钻石
                                            <input type="checkbox" value="money" name="checkbox[]"/>
                                            <input type="text" class="form-control "  maxlength="4" placeholder="不可输入小数" name="money"/>
                                        </div> 
                                            </label>  
                                    </div>
                                      
                                </td>
                                <td>
                                    
                                    <div class="control-group">
                                        <label class="checkbox-inline">
                                        <div class="controls ">荣誉点
                                            <input type="checkbox" value="honour" name="checkbox[]"/>
                                            <input type="text" class="form-control"  maxlength="4" style="width:50%"  placeholder="不可输入小数" name="honour"/>
                                        </div>
                                        </label>
                                    </div>
                                        
                                </td>  
                            </tr>
                            <tr>
                                <td>
                                    
                                    <div class="control-group">
                                        <label class="checkbox-inline">
                                        <div class="controls ">卡牌ID
                                            <input type="checkbox" value="heroid" name="checkbox[]"/>
                                            <input type="text" class="form-control " placeholder="英雄的ID" name="heroid" onblur="checkProp(this.value,1)" />
                                        </div> 
                                            </label>
                                    </div>
                                 
                                </td>
                                <td>
                                    
                                    <div class="control-group">
                                        <label class="control-label">卡牌数量</label>
                                        <div class="controls "><input type="text" class="form-control"  maxlength="2" placeholder="不可输入小数" name="heronum"/></div>
                            
                                    </div>
                                </td>  
                            </tr>
                            <tr>
                                <td>
                                    
                                    <div class="control-group">
                                        <label class="checkbox-inline">
                                        <div class="controls ">装备ID
                                            <input type="checkbox" value="equip" name="checkbox[]"/>
                                            <input type="text" class="form-control " placeholder="装备或饰品的ID" name="equipid" onblur="checkProp(this.value,2)" />
                                            
                                        </div> 
                                            
                                        </label>
                                    </div>
                                 
                                </td>
                                <td>      
                                    <div class="control-group">
                                        <label class="control-label">装备数量</label>
                                        <div class="controls "><input type="text" class="form-control"  maxlength="2" placeholder="不可输入小数" name="equipnum"/></div>
                            
                                    </div>
                                </td>  
                            </tr>
                            <tr>
                                <td>
                                    
                                    <div class="control-group">
                                        <label class="checkbox-inline">
                                        <div class="controls ">道具ID1
                                            <input type="checkbox" value="propid1" name="checkbox[]"/>
                                            <input type="text" class="form-control " placeholder="道具的ID" name="propid1" onblur="checkProp(this.value,3)" />
                                        </div>
                                            </label>
                                    </div>
                                 
                                </td>
                                <td>
                                    <div class="control-group">
                                        <label class="control-label">道具数量1</label>
                                        <div class="controls "><input type="text" class="form-control"  maxlength="5" placeholder="不可输入小数" name="propnum1"/></div>
                                    </div>
                                </td>  
                            </tr>
                            <tr>
                                <td>
                                    
                                    <div class="control-group">
                                        <label class="checkbox-inline">
                                        <div class="controls ">道具ID2
                                            <input type="checkbox" value="propid2" name="checkbox[]"/>
                                            <input type="text" class="form-control " placeholder="道具的ID" name="propid2" onblur="checkProp(this.value,3)" />
                                        </div>  
                                            </label>
                                    </div>
                                 
                                </td>
                                <td>
                                    <div class="control-group">
                                        <label class="control-label">道具数量2</label>
                                        <div class="controls "><input type="text" class="form-control"  maxlength="5" placeholder="不可输入小数" name="propnum2"/></div>
                                    </div>
                                </td>  
                            </tr>
                            <tr>
                                <td>
                                    
                                    <div class="control-group">
                                        <label class="checkbox-inline">
                                        <div class="controls ">道具ID3
                                            <input type="checkbox" value="propid3" name="checkbox[]"/>
                                            <input type="text" class="form-control " placeholder="道具的ID" name="propid3" onblur="checkProp(this.value,3)" />
                                        </div> 
                                            </label>
                                    </div>
                                 
                                </td>
                                <td>
                                    <div class="control-group">
                                        <label class="control-label">道具数量3</label>
                                        <div class="controls "><input type="text" class="form-control"  maxlength="5" placeholder="不可输入小数" name="propnum3"/></div>
                                    </div>
                                </td>  
                            </tr>
                            <tr>
                                <td>
                                    
                                    <div class="control-group">
                                        <label class="checkbox-inline">
                                        <div class="controls ">道具ID4
                                            <input type="checkbox" value="propid4" name="checkbox[]"/>
                                            <input type="text" class="form-control "  placeholder="道具的ID" name="propid4" onblur="checkProp(this.value,3)" /></div>  
                                    </label>
                                 </div>
                                </td>
                                <td>
                                    <div class="control-group">
                                        <label class="control-label">道具数量4</label>
                                        <div class="controls "><input type="text" class="form-control"  maxlength="5"  placeholder="不可输入小数" name="propnum4"/></div>
                                    </div>
                                </td>  
                            </tr>
                        </tbody>
                    </table>
                </form>
                <?php if(!empty($addSerMail)):?>
                <div style="text-align: center;">	
                <button class="btn btn-success" id="saveSerBtn" style="margin: auto;">保存</button>
                </div> 
                <?php endif;?>
            </div>   
          <!-- 3页表格 正文 -->
            <div id="tab3" class="tab-pane ">
                    <form class="form-horizontal" action="/mail/saveMail" method="POST" id="saveAllMailForm" onsubmit="return false;">        
                    <table class="table  table-striped" > 
                    <tbody>
                        <tr>
                            <td>
                              <div class="form-group">
                                    <select class="form-control"  id="liOption"  multiple="multiple"  name="sid[]" size='10'style="width:150%" >
                                         <?php if (is_array($servers) && !empty($servers)) :?>
                                           <?php foreach ($servers as $server):?>
                                           <?php echo '<option value="'.$server['sid'].'">'.$server["sid"].'服 '.$server['sname'].'</option>';?>
                                            <?php endforeach;?>
                                        <?php endif;?>
                                    </select>
                                </div> 
                            </td>
                            <td></td>
                            </tr>
                        <tr>
                            <td>
                                <div class="control-group">
                                    <label class="control-label">*筛选条件</label>
                                    <label class="checkbox-inline">
                                    <div class="controls">                                        
                                        <input type="checkbox" value="role" name="checkbox[]" />角色等级段                                        
                                        <input type="text" class="  form-inline " name="minlevel" style="width:15%" placeholder="1"/>级-
                                        <input type="text" class="  form-inline " name="maxlevel" style="width:15%" placeholder="70"/>级
                                    </div>
                                    </label>  
                                </div>
                            </td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>
                                <div class="control-group">
                                    <label class="checkbox-inline">
                                    <div class="controls">                                       
                                    <input type="checkbox" value="vip" name="checkbox[]" />VIP等级段
                                    <input type="text" class="  form-inline " name="minvip" style="width:15%" placeholder="0" />级-
                                    <input type="text" class="  form-inline " name="maxvip" style="width:15%" placeholder="15" />级
                                    </div>
                                    </label>
                                </div>
                            </td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>
                                <div class="control-group">
                                    <label class="checkbox-inline">
                                    <div class="controls">
                                        <input type="checkbox"  value="guild" name="checkbox[]"/>公会成员    
                                    </div>
                                     </label>
                                </div>
                            </td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>
                                <div class="control-group ">
                                    <label class="checkbox-inline">
                                    <div class="controls ">
                                            <input type="checkbox"  value="logintime" name="checkbox[]"  />登录时间段
                                            <input type="text" class=" datetimepicker" name="starttime" style="width:25%" placeholder="起始时间"/>-
                                            <input type="text" class=" datetimepicker " name="endtime" style="width:25%" placeholder="截至时间"/>
                                    </div>
                                    </label>
                                </div>
                            </td>
                            <td></td>
                        </tr>
                        
                        <tr>
                            <td>
                                <div class="control-group">
                                    <label class="control-label">*发送时间</label>
                                    <div class="controls"><input type="text" class="datetimepicker form-control " placeholder="请选择时间" name="sendtime"/></div>
                                </div> 
                            </td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>
                               <div class="control-group">
                        <label class="control-label">*邮件标题</label>
                        <div class="controls "><input type="text" class="form-control"  maxlength="10" placeholder="最多输入十个汉字" name="mailtitle"/></div>
                    </div> 
                            </td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>
                              <div class="control-group">
                                    <label class="col-md-3 control-label">*邮件内容</label>
                                    <div class="controls">
                                        <textarea class="form-control " name="context" rows="7" maxlength="170" placeholder="最多输入170汉字,包括标点符号和空格"></textarea>
                                    </div>
                                </div>  
                            </td>
                            <td></td>
                        </tr>
                            <tr>
                                <td>
                                    <div class="control-group">
                                        <label class="col-md-3 control-label">添加附件: </label>
                                         <div class="controls ">
                                             <span style="color:gray" > 附件个数不能超过四个</span>   
                                        </div>   
                                    </div>
                                </td> 
                                <td></td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="control-group">
                                        <label class="checkbox-inline">
                                        <div class="controls ">金币
                                            <input type="checkbox" value="coin" name="checkbox[]"/>
                                            <input type="text" class="form-control " maxlength="6" style="width:30%" placeholder="不可输入小数" name="coin"/></div>  </label>
                                    </div>
                                 
                                </td>
                                <td>
                                    <div class="control-group">
                                        <label class="checkbox-inline">
                                        <div class="controls ">英雄魂石
                                            <input type="checkbox" value="herosoul" name="checkbox[]"/>
                                            <input type="text" class="form-inline" maxlength="4" style="width:50%" placeholder="不可输入小数" name="herosoul"/></div></label>
                            
                                    </div>
                                </td>  
                            </tr>
                            <tr>
                                <td>
                                    <div class="control-group">
                                        <label class="checkbox-inline">
                                        <div class="controls ">声望
                                            <input type="checkbox" value="honor_s" name="checkbox[]"/>
                                            <input type="text" class="form-control " maxlength="4" style="width:30%" placeholder="不可输入小数" name="honor_s"/>
                                        </div> 
                                            </label>
                                    </div>
                                 
                                </td>
                                <td>
                                    <div class="control-group">
                                        <label class="checkbox-inline">
                                        <div class="controls ">装备魂石
                                            <input type="checkbox" value="equipsoul" name="checkbox[]"/>
                                            <input type="text" class="form-inline" maxlength="4" style="width:50%" placeholder="不可输入小数" name="equipsoul"/>
                                        </div>
                                            </label>
                                    </div>
                                </td>  
                            </tr>
                            <tr>
                                <td>
                                    <div class="control-group">
                                        <label class="checkbox-inline">
                                        <div class="controls ">钻石
                                            <input type="checkbox" value="money" name="checkbox[]"/>
                                            <input type="text" class="form-control "  maxlength="4" style="width:30%" placeholder="不可输入小数" name="money"/></div>  </label>
                                    </div>
                                 
                                </td>
                                <td>
                                    <div class="control-group">
                                        <label class="checkbox-inline">
                                        <div class="controls ">荣誉点
                                            <input type="checkbox" value="honour" name="checkbox[]"/>
                                            <input type="text" class="form-inline"  maxlength="4" style="width:50%"  placeholder="不可输入小数" name="honour"/></div></label>
                            
                                    </div>
                                </td>  
                            </tr>
                            <tr>
                                <td>
                                    <div class="control-group">
                                        <label class="checkbox-inline">
                                        <div class="controls ">卡牌ID
                                            <input type="checkbox" value="heroid" name="checkbox[]"/>
                                            <input type="text" class="form-control " style="width:30%" placeholder="英雄的ID" name="heroid" onblur="checkProp(this.value,1)" /></div>  
                                            </label>
                                    </div>
                                 
                                </td>
                                <td>
                                    <div class="control-group">
                                        <label class="control-label">卡牌数量</label>
                                        <div class="controls "><input type="text" class="form-inline"  maxlength="2" style="width:50%" placeholder="不可输入小数" name="heronum"/></div>
                            
                                    </div>
                                </td>  
                            </tr>
                            <tr>
                                <td>
                                    
                                    <div class="control-group">
                                        <label class="checkbox-inline">
                                        <div class="controls ">装备ID
                                            <input type="checkbox" value="equip" name="checkbox[]"/>
                                            <input type="text" class="form-control " style="width:30%"  placeholder="装备或饰品的ID" name="equipid" onblur="checkProp(this.value,2)" />
                                            
                                        </div> 
                                            
                                        </label>
                                    </div>
                                 
                                </td>
                                <td>      
                                    <div class="control-group">
                                        <label class="control-label">装备数量</label>
                                        <div class="controls "><input type="text" class="form-control"  maxlength="2" style="width:50%" placeholder="不可输入小数" name="equipnum"/></div>
                            
                                    </div>
                                </td>  
                            </tr>
                            <tr>
                                <td>
                                    <div class="control-group">
                                        <label class="checkbox-inline">
                                        <div class="controls ">道具ID1
                                            <input type="checkbox" value="propid1" name="checkbox[]"/>
                                            <input type="text" class="form-control "style="width:30%"  placeholder="道具的ID" name="propid1" onblur="checkProp(this.value,3)" /></div> 
                                            </label>
                                    </div>
                                 
                                </td>
                                <td>
                                    <div class="control-group">
                                        <label class="control-label">道具数量1</label>
                                        <div class="controls "><input type="text" class="form-inline"  maxlength="5" style="width:50%" placeholder="不可输入小数" name="propnum1"/></div>
                                    </div>
                                </td>  
                            </tr>
                            <tr>
                                <td>
                                    <div class="control-group">
                                        <label class="checkbox-inline">
                                        <div class="controls ">道具ID2
                                            <input type="checkbox" value="propid2" name="checkbox[]"/>
                                            <input type="text" class="form-control "style="width:30%"  placeholder="道具的ID" name="propid2" onblur="checkProp(this.value,3)"/></div>  
                                            </label>
                                    </div>
                                 
                                </td>
                                <td>
                                    <div class="control-group">
                                        <label class="control-label">道具数量2</label>
                                        <div class="controls "><input type="text" class="form-inline"  maxlength="5" style="width:50%" placeholder="不可输入小数" name="propnum2"/></div>
                                    </div>
                                </td>  
                            </tr>
                            <tr>
                                <td>
                                    <div class="control-group">
                                         <label class="checkbox-inline">
                                        <div class="controls ">道具ID3
                                            <input type="checkbox" value="propid3" name="checkbox[]"/>
                                            <input type="text" class="form-control "style="width:30%"  placeholder="道具的ID" name="propid3" onblur="checkProp(this.value,3)" /></div> 
                                            </label>
                                    </div>
                                 
                                </td>
                                <td>
                                    <div class="control-group">
                                        <label class="control-label">道具数量3</label>
                                        <div class="controls "><input type="text" class="form-inline"  maxlength="5" style="width:50%" placeholder="不可输入小数" name="propnum3"/></div>
                                    </div>
                                </td>  
                            </tr>
                            <tr>
                                <td>
                                    <div class="control-group">
                                        <label class="checkbox-inline">
                                        <div class="controls ">道具ID4
                                            <input type="checkbox" value="propid4" name="checkbox[]"/>
                                            <input type="text" class="form-control "style="width:30%"  placeholder="道具的ID" name="propid4" onblur="checkProp(this.value,3)" /></div>
                                        </label>
                                    </div> 
                                </td>
                                <td>
                                    <div class="control-group">
                                        <label class="control-label">道具数量4</label>
                                        <div class="controls "><input type="text" class="form-inline"  maxlength="5" style="width:50%" placeholder="不可输入小数" name="propnum4"/></div>
                                    </div>
                                </td>  
                            </tr>
                        </tbody>
                    </table>
                </form>
                <?php if(!empty($addAllMail)):?>
                <div style="text-align: center;">	
                <button class="btn btn-success" id="saveAllBtn" style="margin: auto;">保存</button>
                </div>				
                <?php endif;?>
            </div>   
        </div>
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

<script language="javascript">
    //检查输入的值
    function checkProp(value,type)
    {
        if(value !=='')
        {
           $.ajax({
            type: 'POST',
            url: "/mail/CheckProp",
            data: 'id='+value+'&type='+type,
            dataType: 'json',
            success: function(result) {
                    if(result.errcode != 0)
                    {  
                        alert('输入的ID'+value+'无效' );  
                        document.location.reload();
                    }
                }
             }); 
        }
         
    }
</script>