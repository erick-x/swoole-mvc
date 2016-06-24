<?php
$insert_html = Page_Lib::loadJs('gamerole');
$insert_html .= Page_Lib::loadJs('gameuser');
echo Page_Lib::head($insert_html);
?>

<!-- 站内导航 -->
<div id="content-header">
    <h1>后台基本操作</h1>
</div>
<div id="breadcrumb">
    <a href="/index/index" title="跳到首页" class="tip-bottom"><i class="icon-home"></i> 首页</a>
    <a href="#" class="current">玩家数据编辑</a>
 </div>
<div class="widget-content">
<?php
$aServer = array('sid' => $sid, 'servers' => $servers);
$aSelect = array('selected' => $select);
echo Page_Lib::serverForm($aServer, $aSelect, $value);
?>
<button class="btn btn-primary " id="editHerobtn" >编辑英雄</button>
<button class="btn btn-primary " id="addHerobtn" >添加英雄</button>
<button class="btn btn-primary " id="addPropbtn" >添加道具</button>
<button class="btn btn-primary " id="addEquipbtn" >添加装备</button>
<button class="btn btn-primary " id="addPosybtn" >添加铭文</button>
<button class="btn btn-primary " id="delThingbtn" >删除物品</button>
<button class="btn btn-primary " id="passPinstancebtn">通关关卡</button>
<button class="btn btn-primary " id="otherWaybtn" >跳过引导步骤</button> 
</div>
<div class="container-fluid">
  <div class="row-fluid">     
<?php if (is_array($userinfo) && !empty($userinfo)): ?>
            <table class="table table-striped table-bordered table-hover">
                <h3>角色基本信息</h3>
                <tr>
                    <td class="success" style=" text-align: center;" >角色名</td>
                    <?php
                    echo'<td class="success" >'. $userinfo['nickname'].'</td>';
                     ?>
                    <td class="success" style=" text-align: center;">角色等级</td>
                    <?php
                    echo'<td class="success" >'. $userinfo['rolelevel'].'</td>';
                     ?>
                </tr>
                <tr>
                    <td class="success" style=" text-align: center;">角色UIN</td>
                    <?php
                    echo'<td class="success" >'. $userinfo['uin'].'</td>';
                     ?>               
                    <td class="success" style=" text-align: center;"> 经验值</td>
                    <?php
                    echo'<td class="success" >'. $userinfo['roleexp'].'</td>';
                     ?>
                 </tr> 
                <tr>
                    <td class="success" style=" text-align: center;">VIP等级</td>
                    <?php
                    echo'<td class="success" >'. $userinfo['VIPLevel'].'</td>';
                     ?>
                    <td class="success" style=" text-align: center;">钻石</td>
                    <?php
                    echo'<td class="success" >'. $userinfo['ca'].'</td>';
                     ?>
                 </tr>
                 <tr>
                    <td class="success" style=" text-align: center;">金币</td>
                    <?php
                    echo'<td class="success" >'. $userinfo['co'].'</td>';
                     ?>
                    <td class="success" style=" text-align: center;">声望</td>
                    <?php
                    echo'<td class="success" >'. $userinfo['prestige'].'</td>';
                     ?>
                 </tr>
                 <tr>
                    <td class="success" style=" text-align: center;">装备魂石</td>
                    <?php
                    echo'<td class="success" >'. $userinfo['equipsoul'].'</td>';
                     ?>
                    <td class="success" style=" text-align: center;">荣誉点</td>
                    <?php
                    echo'<td class="success" >'. $userinfo['honor'].'</td>';
                     ?>
                 </tr>
                 <tr>
                    <td class="success" style=" text-align: center;">裁缝等级</td>
                    <?php
                    echo'<td class="success" >'. $userinfo['tailorlevel'].'</td>';
                     ?>
                    <td class="success" style=" text-align: center;">裁缝经验</td>
                    <?php
                    echo'<td class="success" >'. $userinfo['tailorexp'].'</td>';
                     ?>
                 </tr>
                 <tr>
                    <td class="success" style=" text-align: center;">征途币</td>
                    <?php
                    echo'<td class="success" >'. $userinfo['iAnabasisCoin'].'</td>';
                     ?>
                    <td class="success" style=" text-align: center;" >公会勋章</td>
                        <?php
                        echo'<td class="success" >'. $userinfo['GuildBage'].'</td>';
                    ?>
                 </tr>
                 <tr>
                    <td class="success" style=" text-align: center;">地精宝藏奶酪</td>
                    <?php
                    echo'<td class="success" >'. $userinfo['icheese'].'</td>';
                     ?>
                    <td class="success" style=" text-align: center;" ></td>
                 </tr>
            </table>    
     <table class="table table-striped table-bordered table-hover" id="CrossTable" >
        <h3>通关副本信息</h3>
        <tr>
            <th>副本ID</th>
            <th>关卡ID</th>
            <th>通关星级</th>					
        </tr>
               <?php if (is_array($pveinfo) && !empty($pveinfo)): ?>
                    <?php for ($i=0; $i < count($pveinfo);$i++): ?>
                        <?php for ($j=0; $j < count($pveinfo[$i]);$j++): ?>
                        <tr>
                            <td data-name="pinstanceid" style=" text-align: center;"><?php echo $pveinfo[$i][$j]['pinstanceid']; ?></td>
                            <td data-name="crossid" style=" text-align: center;"><?php echo $pveinfo[$i][$j]['crossid']; ?></td>
                            <td data-name="star" style=" text-align: center;"><?php echo $pveinfo[$i][$j]['star']; ?></td>
                        </tr>
                    <?php endfor;?>
                    <?php endfor;?>
                    <?php endif;?>
            </table>
<?php endif; ?>
   </div>
 </div>
<?php echo Page_Lib::footer(); ?>

<!-- other way Begin -->
<div class="modal fade" id="OtherWayModal" tabindex="-1" role="dialog" aria-labelledby="OtherWayModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="OtherWayModalLabel">跳过引导步骤</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" action="/gameuser/doEditOther" method="POST" id="otherWayForm" onsubmit="return false;">
                <div class="control-group">
                    <label class="col-md-3 control-label" for="">引导选择：</label>
                    <div class="controls">
                        <select class="form-control" name="selectstatu" required="" autofocus="">
                            <option value="" selected="selected">请选择</option>
                            <option value="1">新手引导</option>
                            <option value="2">功能引导</option>
                        </select>
                    </div>
                </div>
                    
               <div class="control-group">
                        <label class="col-md-3 control-label">引导ID：</label>
                        <div class="controls"><input type="text" class="form-control" name="otherWayid" /></div>
                </div>
                    <input type="hidden" name="id"/>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="otherBtn">确认</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
            </div>
        </div>
  </div>
</div>

<!-- cross Begin -->
<div class="modal fade" id="crossModal" tabindex="-1" role="dialog" aria-labelledby="crossModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="crossModalLabel">通关关卡</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" action="/gameuser/doPassPinstance" method="POST" id="crossForm" onsubmit="return false;">
                <div class="control-group">
                        <label class="col-md-3 control-label">副本ID：</label>
                        <div class="controls"><input type="text" class="form-control" name="pinstanceid"  /></div>
                </div>
               <div class="control-group">
                        <label class="col-md-3 control-label">关卡ID：</label>
                        <div class="controls"><input type="text" class="form-control" name="corssid" /></div>
                </div>
                    <input type="hidden" name="id"/>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="corssBtn">确认</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
            </div>
        </div>
  </div>
</div>

<!-- Heromodal Begin -->
<div class="modal fade" id="Heromodal" tabindex="-1" role="dialog" aria-labelledby="HeromodalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="HeromodalLabel">编辑英雄</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" action="/gameuser/doEditBase" method="POST" id="HeroForm" onsubmit="return false;">
                <div class="control-group">
                    <label class="col-md-3 control-label" for="">编辑条件：</label>
                    <div class="controls">
                        <select class="form-control" name="selectstatu" required="" autofocus="">
                            <option value="" selected="selected">请选择</option>
                            <option value="2">钻石</option>
                            <option value="1">金币</option>
                            <option value="3">体力</option>
                            <option value="20">声望</option>
                            <option value="4">VIP经验</option>                           
                            <option value="8">荣誉点</option>
                            <option value="7">英雄魂石</option>                           
                            <option value="21">装备魂石</option>
                            <option value="5">队伍经验</option>
                            <option value="22">裁缝经验</option>
                            <option value="23">征途币</option>
                            <option value="24">公会徽章</option>
                            <option value="25">公会活跃度</option>
                            <option value="26">地精宝藏奶酪</option>
                            <option value="27">排位赛货币</option>
                        </select>
                    </div>
                </div>
                    
                <div class="control-group">
                        <label class="col-md-3 control-label">数量：</label>
                        <div class="controls"><input type="text" class="form-control" name="count"  /></div>
                </div>
                    <input type="hidden" name="id"/>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="heroBtn">确认</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
            </div>
        </div>
  </div>
</div>

<!-- addHeromodal Begin -->
<div class="modal fade" id="addHeromodal" tabindex="-1" role="dialog" aria-labelledby="addHeromodalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="addHeromodalLabel">添加英雄</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" action="/gameuser/doEditHero" method="POST" id="addHeroForm" onsubmit="return false;">
 
                    
                <div class="control-group">
                        <label class="col-md-3 control-label">英雄ID：</label>
                        <div class="controls"><input type="text" class="form-control" name="heroid"  /></div>
                </div>
                <div class="control-group">
                        <label class="col-md-3 control-label">数量：</label>
                        <div class="controls"><input type="text" class="form-control" name="heroNum"  /></div>
                </div>
                    <input type="hidden" name="id"/>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="addheroBtn">确认</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
            </div>
        </div>
  </div>
</div>

<!-- delThing Begin -->
<div class="modal fade" id="delThingmodal" tabindex="-1" role="dialog" aria-labelledby="delThingmodalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="delThingmodalLabel">删除物品</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" action="/gameuser/doDelItem" method="POST" id="delPropForm" onsubmit="return false;">                   
                <div class="control-group">
                        <label class="col-md-3 control-label">物品ID：</label>
                        <div class="controls"><input type="text" class="form-control" name="Thingid"  /></div>
                </div>
                    <input type="hidden" name="id"/>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="delItemBtn">确认删除</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">取消删除</button>
            </div>
        </div>
  </div>
</div>

<!-- addPropmodal Begin -->
<div class="modal fade" id="addPropmodal" tabindex="-1" role="dialog" aria-labelledby="addPropmodalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="addPropmodalLabel">添加道具</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" action="/gameuser/doEditItem" method="POST" id="addPropForm" onsubmit="return false;">                   
                <div class="control-group">
                        <label class="col-md-3 control-label">道具ID：</label>
                        <div class="controls"><input type="text" class="form-control" name="propid"  /></div>
                </div>
                <div class="control-group">
                        <label class="col-md-3 control-label">数量：</label>
                        <div class="controls"><input type="text" class="form-control" name="propNum"  /></div>
                </div>
                    <input type="hidden" name="id"/>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="addpropBtn">确认</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
            </div>
        </div>
  </div>
</div>

<!-- addEquipmodal Begin -->
<div class="modal fade" id="addEquipmodal" tabindex="-1" role="dialog" aria-labelledby="addEquipmodalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="addEquipmodalLabel">添加装备</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" action="/gameuser/doEditEquip" method="POST" id="addEquipForm" onsubmit="return false;">   
                <div class="control-group">
                        <label class="col-md-3 control-label">装备ID：</label>
                        <div class="controls"><input type="text" class="form-control" name="equipid"  /></div>
                </div>
                <div class="control-group">
                        <label class="col-md-3 control-label">数量：</label>
                        <div class="controls"><input type="text" class="form-control" name="equipNum"  /></div>
                </div>
                    <input type="hidden" name="id"/>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="addequipBtn">确认</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
            </div>
        </div>
  </div>
</div>

<!-- addEquipmodal Begin -->
<div class="modal fade" id="addPosymodal" tabindex="-1" role="dialog" aria-labelledby="addPosymodalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="addPosymodalLabel">添加铭文</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" action="/gameuser/doEditEquip" method="POST" id="addPosyForm" onsubmit="return false;">   
                <div class="control-group">
                        <label class="col-md-3 control-label">铭文ID：</label>
                        <div class="controls"><input type="text" class="form-control" name="posyid"  /></div>
                </div>
                <div class="control-group">
                        <label class="col-md-3 control-label">铭文数量：</label>
                        <div class="controls"><input type="text" class="form-control" name="posyNum"  /></div>
                </div>
                    <input type="hidden" name="id"/>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="addposyBtn">确认</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
            </div>
        </div>
  </div>
</div>
