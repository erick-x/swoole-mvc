<?php
$insert_html = Page_Lib::loadJs('forbid');
echo Page_Lib::head($insert_html);
?>
<!-- 站内导航 -->
<div id="content-header">
    <h1>后台基本操作</h1>
    <div class="btn-group">        
<a class="btn btn-large btn-success tip-bottom" title="封号" data-toggle="modal" data-backdrop="static" data-target="#forbidAccountModal" id="forbidaccountbtn"><i class="icon-wrench"></i>封号操作</a>
<a class="btn btn-large btn-default tip-bottom" title="禁言" data-toggle="modal" data-backdrop="static" data-target="#forbidTalkModal" id="forbidtalkbtn"><i class="icon-ban-circle"></i> 禁言操作</a>
 </div>
</div>
 <div id="breadcrumb">
    <a href="/index/index" title="跳到首页" class="tip-bottom"><i class="icon-home"></i> 首页</a>
    <a href="#" class="current">玩家基础信息</a>
 </div>
<div class="widget-content">
<?php
$aServer = array('sid' => $sid, 'servers' => $servers);
$aSelect = array('selected' => $select);
echo Page_Lib::serverForm($aServer, $aSelect, $value);
?>
</div>

<div class="container-fluid">  
    <?php if (is_array($userinfo) && !empty($userinfo)): ?>
                <table class="table table-striped table-bordered table-hover">
                    <h3>角色基本信息</h3>
                    <tr>
                        <td class="success" >角色名</td>
                        <?php
                        echo'<td class="success" >'. $userinfo['nickname'].'</td>';
                         ?>
                        <td class="success">所属工会</td>
                        <?php
                        echo'<td class="success" >'. $userinfo['guidname'].'</td>';
                         ?> 
                    </tr>
                    <tr>
                        <td class="success">UIN</td>
                        <?php
                        echo'<td class="success" >'. $userinfo['uin'].'</td>';
                         ?>
                        <td class="success">所在区服</td>
                        <?php
                        echo'<td class="success" >'. $userinfo['iworld'].'服</td>';
                         ?>    
                    </tr>
                    <tr>
                        <td class="success">角色ID</td>
                        <?php
                        echo'<td class="success" >'. $userinfo['roleid'].'</td>';
                         ?>
                        <td class="success">角色等级</td>
                        <?php
                        echo'<td class="success" >'. $userinfo['rolelevel'].'</td>';
                         ?>
                    </tr>
                    <tr>
                        <td class="success">VIP等级</td>
                        <?php
                        echo'<td class="success" >'. $userinfo['VIPLevel'].'</td>';
                         ?>
                        <td class="success">地精宝藏奶酪</td>
                        <?php
                         echo'<td class="success" >'. $userinfo['icheese'].'</td>';
                         ?>
                    </tr>
                   <tr>
                       <td class="success">最大关卡ID</td>		
                        <?php
                        echo'<td class="success" >'. $userinfo['imaxid'].'</td>';
                         ?> 
                       <td class="success">征途币</td>
                        <?php
                        echo'<td class="success" >'.  $userinfo['iAnabasisCoin'].'</td>';
                         ?>
                    </tr>
                    <tr>
                        <td class="success">钻石</td>
                        <?php
                        echo'<td class="success" >'. $userinfo['ca'].'</td>';
                         ?>
                        <td class="success">登录总次数</td>
                        <?php
                        echo'<td class="success" >'. $userinfo['timesonline'].'</td>';
                         ?> 
                     </tr>
                     <tr>
                        <td class="success">金币</td>
                        <?php
                        echo'<td class="success" >'. $userinfo['co'].'</td>';
                         ?>
                        <td class="success">创建角色时间</td>
                        <?php
                        echo'<td class="success" >'.  date("Y-m-d H:i:s",$userinfo['createroletime']).'</td>';
                         ?>
                    </tr>
                    <tr>
                    <td class="success">战力</td>
                       <?php
                        echo'<td class="success" >'. $userinfo['fightvalue'].'</td>';
                         ?>
                        <td class="success">公会勋章</td>
                        <?php
                        echo'<td class="success" >'. $userinfo['GuildBage'].'</td>';
                        ?>
                    </tr>
                     <tr>
                    <td class="success">经验值</td>
                        <?php
                        echo'<td class="success" >'. $userinfo['roleexp'].'</td>';
                         ?>
                        <td class="success">荣誉点</td>
                        <?php
                        echo'<td class="success" >'. $userinfo['honor'].'</td>';
                         ?>
                     </tr>
                     <tr>
                    <td class="success">上次登出时间</td>
                        <?php
                        echo'<td class="success" >'. date("Y-m-d H:i:s",$userinfo['lastlogouttime']).'</td>';
                         ?>
                        <td class="success">登录次数</td>
                        <?php
                        echo'<td class="success" >'. $userinfo['timesonline'].'</td>';
                         ?>
                     </tr>  
                </table>
    <!-- TAB页表格 正文 -->
        <div class="widget-box">
            <div class="widget-title">
            <span class="icon">
                <i class="icon-th"></i>
                </span>
                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#tab1">我的阵上英雄及其装备</a></li>
                    <li ><a data-toggle="tab" href="#tab3">英雄背包共有<?php echo count($herodata);?>个</a></li>
                    <li ><a data-toggle="tab" href="#tab4">英雄碎片背包</a></li>
                    <li ><a data-toggle="tab" href="#tab5">装备背包</a></li>
                    <li ><a data-toggle="tab" href="#tab6">装备碎片背包</a></li>
                    <li ><a data-toggle="tab" href="#tab7">饰品背包</a></li>
                    <li ><a data-toggle="tab" href="#tab11">饰品碎片背包</a></li>
                    <li ><a data-toggle="tab" href="#tab8">道具背包</a></li>
                    <li ><a data-toggle="tab" href="#tab9">材料背包</a></li>
                    <li ><a data-toggle="tab" href="#tab10">材料碎片背包</a></li>
                </ul>
            </div>
        </div>
    <div class="widget-content tab-content">
     <!-- 1页表格 正文 -->
    <div id="tab1" class="tab-pane active">
        <table class="table table-bordered table-striped">                 
        <?php if (is_array($formdata)): ?>
                <thead>
                    <tr class="success">
                        <th>英雄</th>
                        <th>武器</th>
                        <th>头盔</th>
                        <th>上衣</th>                               
                        <th>披风</th>
                        <th>戒指</th>
                        <th>饰品</th>
                    </tr>
                </thead>
                <tbody id="MyGuardList">
                    <?php for($i = 0; $i <10;++$i): ?>
                     <?php if( isset($formdata[$i]['heroname'] )):?>
                        <tr class="guard" style="cursor:pointer">
                            <td><?php echo $formdata[$i]['heroname']; ?></td>
                            <?php for($j = 0; $j < 6;++$j): ?>
                            <td><?php echo $formdata[$i]['equip'][$j]['equipname']; ?></td>
                            <?php endfor; ?>
                        </tr>
                        <?php endif;?>
                    <?php endfor; ?>
                </tbody>
            <?php endif; ?>
        </table>
    </div>
   
    <!-- 3页表格 正文 -->
           <div id="tab3" class="tab-pane">
               <table class="table table-bordered table-striped">              
            <?php if (is_array($herodata) && !empty($herodata)): ?>
                        <thead>
                                <tr class="success">
                                    <th>英雄</th>
                                    <th>等级</th>
                                    <th>星数</th>
                                    <th>阶数</th>                               
                                    <th>资质</th>
                                </tr>
                            </thead>
                            <tbody id="myHeroAll">
                            <?php for($i = 0; $i <count($herodata);++$i): ?>
                            <tr class="heroAll" style="cursor:pointer">
                                <td style=" text-align: center;">
                                    <?php echo $herodata[$i]['heroname'] ;?>
                                </td>
                                 <td style=" text-align: center;">
                                    <?php echo $herodata[$i]['herolevel'] ;?>
                                </td>
                                 <td style=" text-align: center;">
                                    <?php echo $herodata[$i]['gardestar'] ;?>
                                </td>
                                 <td style=" text-align: center;">
                                    <?php echo $herodata[$i]['steplevel'] ;?>
                                </td>
                                 <td style=" text-align: center;">
                                    <?php echo $herodata[$i]['heroquality'] ."星";?>
                                </td>
                            </tr>
                            <?php endfor; ?>
                    <?php endif; ?>
                    </tbody>        
        </table>
    </div>

    <!-- 4页表格 正文 -->
    <div id="tab4" class="tab-pane">
        <table class="table table-bordered table-striped">              
            <?php if (is_array($BagHeroChip) && !empty($BagHeroChip)): ?>
                        <thead>
                                <tr class="success">
                                    <th>物品</th>
                                    <th>数量</th>
                                </tr>
                        </thead>
                        <?php for($i = 0; $i <count($BagHeroChip);++$i): ?>
                            <tr>
                                <td style=" text-align: center;">
                                    <?php echo $BagHeroChip[$i]['itemname'];?>
                                </td>
                                 <td style=" text-align: center;">
                                    <?php echo $BagHeroChip[$i]['itemnum'] ;?>
                                </td>
                            </tr>
                        <?php endfor; ?>
            <?php endif; ?>
        </table>
    </div>    
    <!-- 5页表格 正文 -->
           <div id="tab5" class="tab-pane">
               <table class="table table-bordered table-striped">              
            <?php if (is_array($BagEquip) && !empty($BagEquip)): ?>
                        <thead>
                                <tr class="success">
                                    <th>装备</th>
                                    <th>强化等级</th>
                                    <th>品质</th>
                                    <th>装备英雄</th>
                                </tr>
                        </thead>
                        <tbody id="myEquip">
                        <?php for($i = 0; $i <count($BagEquip);++$i): ?>
                            <tr class="Equip" style="cursor: pointer">
                                <td style=" text-align: center;">
                                    <?php echo $BagEquip[$i]['itemname'] ;?>
                                </td>
                                <td style=" text-align: center;">
                                    <?php echo $BagEquip[$i]['strenghtlevel'] ;?>
                                </td>
                                <td style=" text-align: center;">
                                    <?php echo $BagEquip[$i]['equipquility'] ;?>
                                </td>
                                <td style=" text-align: center;">
                                    <?php echo $BagEquip[$i]['heroname'] ;?>
                                </td>
                            </tr>
                        <?php endfor; ?>
                    <?php endif; ?>  
                        </tbody>         
            </table>
        </div>

    <!-- 6页表格 正文 -->
           <div id="tab6" class="tab-pane">
               <table class="table table-bordered table-striped">              
            <?php if (is_array($BagEquipChip) && !empty($BagEquipChip)): ?>
                        <thead>
                                <tr class="success">
                                    <th>物品</th>
                                    <th>数量</th>
                                </tr>
                        </thead>
                        <?php for($i = 0; $i <count($BagEquipChip);++$i): ?>
                            <tr>
                                <td style=" text-align: center;">
                                    <?php echo $BagEquipChip[$i]['itemname'] ;?>
                                </td>
                                 <td style=" text-align: center;">
                                    <?php echo $BagEquipChip[$i]['itemnum'] ;?>
                                </td>
                            </tr>
                        <?php endfor; ?>
                 <?php endif; ?>
            </table>
    </div>

    <!-- 7页表格 正文 -->
           <div id="tab7" class="tab-pane">
               <table class="table table-bordered table-striped">              
            <?php if (is_array($BagTrinket) && !empty($BagTrinket)): ?>
                        <thead>
                                <tr class="success">
                                    <th>物品</th>
                                    <th>数量</th>
                                </tr>
                        </thead>
                        <?php for($i = 0; $i <count($BagTrinket);++$i): ?>
                            <tr>
                                <td style=" text-align: center;">
                                    <?php echo $BagTrinket[$i]['itemname'] ;?>
                                </td>
                                 <td style=" text-align: center;">
                                    <?php echo $BagTrinket[$i]['itemnum'] ;?>
                                </td>
                            </tr>
                        <?php endfor; ?>
                    <?php endif; ?>        
                </table>
        </div>

    <!-- 8页表格 正文 -->
           <div id="tab11" class="tab-pane">
               <table class="table table-bordered table-striped">              
            <?php if (is_array($BagTrinketChip) && !empty($BagTrinketChip)): ?>
                        <thead>
                                <tr class="success">
                                    <th>物品</th>
                                    <th>数量</th>
                                </tr>
                        </thead>
                        <?php for($i = 0; $i <count($BagTrinketChip);++$i): ?>
                            <tr>
                                <td style=" text-align: center;">
                                    <?php echo $BagTrinketChip[$i]['itemname'] ;?>
                                </td>
                                 <td style=" text-align: center;">
                                    <?php echo $BagTrinketChip[$i]['itemnum'] ;?>
                                </td>
                            </tr>
                        <?php endfor; ?>
                    <?php endif; ?>        
            </table>
        </div>

    <!-- 9页表格 正文 -->
           <div id="tab8" class="tab-pane">
               <table class="table table-bordered table-striped">              
            <?php if (is_array($BagProp) && !empty($BagProp)): ?>
                        <thead>
                                <tr class="success">
                                    <th>物品</th>
                                    <th>数量</th>
                                </tr>
                        </thead>
                        <tbody id="myProp">
                        <?php for($i = 0; $i <count($BagProp);++$i): ?>
                            <tr class="Prop" style="cursor: pointer">
                                <td style=" text-align: center;">
                                    <?php echo $BagProp[$i]['itemname'] ;?>
                                </td>
                                 <td style=" text-align: center;">
                                    <?php echo $BagProp[$i]['itemnum'] ;?>
                                </td>
                            </tr>
                        <?php endfor; ?>
                    <?php endif; ?> 
                       <tbody>
            </table>
        </div>

    <!-- 10页表格 正文 -->
           <div id="tab9" class="tab-pane">
               <table class="table table-bordered table-striped">              
            <?php if (is_array($BagMatrial) && !empty($BagMatrial)): ?>
                        <thead>
                                <tr class="success">
                                    <th>物品</th>
                                    <th>数量</th>
                                </tr>
                        </thead>
                        <?php for($i = 0; $i <count($BagMatrial);++$i): ?>
                            <tr>
                                <td style=" text-align: center;">
                                    <?php echo $BagMatrial[$i]['itemname'] ;?>
                                </td>
                                 <td style=" text-align: center;">
                                    <?php echo $BagMatrial[$i]['itemnum'] ;?>
                                </td>
                            </tr>
                        <?php endfor; ?>
                    <?php endif; ?>        
        </table>
    </div>

    <!-- 11页表格 正文 -->
           <div id="tab10" class="tab-pane">
               <table class="table table-bordered table-striped">              
            <?php if (is_array($BagMatrialChip) && !empty($BagMatrialChip)): ?>
                        <thead>
                                <tr class="success">
                                    <th>物品</th>
                                    <th>数量</th>
                                </tr>
                        </thead>
                        <tbody id="myMatrial">
                        <?php for($i = 0; $i <count($BagMatrialChip);++$i): ?>
                            <tr class="Matrial" style="cursor: pointer">
                                <td style=" text-align: center;">
                                    <?php echo $BagMatrialChip[$i]['itemname'] ;?>
                                </td>
                                 <td style=" text-align: center;">
                                    <?php echo $BagMatrialChip[$i]['itemnum'] ;?>
                                </td>
                            </tr>
                        <?php endfor; ?>
                 <?php endif; ?>            
                    </table>
            </div>
    </div>
    <?php endif;?>
    <div>
    <?php if( empty($userinfo)):?>
    <span>没有查询到信息</span>
    <?php endif; ?>
    </div>
    
       
  </div>
<?php echo Page_Lib::footer(); ?>
<script language="javascript">
    $(function() {
        $("#MyGuardList tr.guard").each(function() {
            $(this).click(function() {
                $(this).next().toggle(500);
            });
        });
        $("#myHero tr.hero").each(function() {
            $(this).click(function() {
                $(this).next().toggle(500);
            });
        });
        
        $("#myHeroAll tr.heroAll").each(function() {
            $(this).click(function() {
                $(this).next().toggle(500);
            });
        });
         $("#myEquip tr.Equip").each(function() {
            $(this).click(function() {
                $(this).next().toggle(500);
            });
        });
         $("#myProp tr.Prop").each(function() {
            $(this).click(function() {
                $(this).next().toggle(500);
            });
        });
         $("#myMatrial tr.Matrial").each(function() {
            $(this).click(function() {
                $(this).next().toggle(500);
            });
        });       
    });
</script> 

<!-- forbiden account Modal -->
<div class="modal fade" id="forbidAccountModal" tabindex="-1" role="dialog" aria-labelledby="forbidAccountModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="forbidAccountModalLabel">封号内容</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" action="/gameuser/forbidAccount" method="POST" id="forbidAccountForm" onsubmit="return false;">                     
                    <input type="hidden" name="listroleid"/>
                    <div class="control-group">
                        <label class="col-md-3 control-label" for="">封号类型</label>
                        <div class="controls">
                            <select class="form-control" name="forbidtype" required="" autofocus="">
                                <option value="" selected="selected">请选择</option>
                                <option value="1">永久封号</option>
                                <option value="2">普通封号</option>
                                <option value="0">解除封号</option>
                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="col-md-3 control-label">封号开始时间</label>
                        <div class="controls"><input type="text" class="datetimepicker form-control" name="starttime"/></div>
                    </div>
                    <div class="control-group">
                        <label class="col-md-3 control-label">封号结束时间</label>
                        <div class="controls"><input type="text" class="datetimepicker form-control"  name="endtime"/></div>
                    </div>                  
                    <div class="control-group">
                        <label class="col-md-3 control-label">封停角色</label>
                        <div class="controls"><input type="text" class="form-control " name="roleid"  placeholder="角色ID"></div>
                    </div> 
                    <div class="control-group">
                         <label class="col-md-3 control-label">区服</label>
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
                </form>
            </div>
            <div class="modal-footer">     
                <button type="button" class="btn btn-danger" id="confirmBtn">确认执行</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">取消关闭</button>
            </div>
        </div>
    </div>
</div>

<!-- forbiden talk Modal -->
<div class="modal fade" id="forbidTalkModal" tabindex="-1" role="dialog" aria-labelledby="forbidTalkModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="forbidTalkModalLabel">禁言内容</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" action="/gameuser/forbidTalk" method="POST" id="forbidTlakForm" onsubmit="return false;">        
                    <input type="hidden" name="listroleid"/>
                    <div class="control-group">
                        <label class="col-md-3 control-label">禁言时间</label>
                        <div class="controls"><input type="text" class="datetimepicker form-control"  name="starttime"/></div>
                    </div>
                    <div class="control-group">
                        <label class="col-md-3 control-label" for="">选择操作</label>
                        <div class="controls">
                            <select class="form-control" name="talktype" required="" autofocus="">
                                <option value="" selected="selected">请选择</option>
                                <option value="1">禁言操作</option>
                                <option value="0">解除禁言</option>
                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="col-md-3 control-label">封停角色</label>
                        <div class="controls"><input type="text" class="form-control " name="roleid"  placeholder="角色ID"></div>
                    </div>
                    <div class="control-group">
                        <label class="col-md-3 control-label">区服</label>
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
                </form>
            </div>
            <div class="modal-footer">     
                <button type="button" class="btn btn-danger" id="confirmforbidBtn">确认执行</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">取消关闭</button>
            </div>
        </div>
    </div>
</div>
