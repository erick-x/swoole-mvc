<?php
$insert_html = Page_Lib::loadJs('lookform');
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
    <a href="#" class="current">玩家订单查询</a>
 </div>
<!-- 站内导航 结束 -->
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
        <form  method="post" class="form-horizontal" id="OrderForm" onsubmit="return false;" >         
                <div class="control-group">
			<div class="controls">
                            <select name="selPlatform" class="form-control" id="selPlatform">
                                <option value="">请选择平台</option>
                                <?php if (is_array($platform) && !empty($platform)):?>
                                 <?php   foreach ($platform as $server):?>
                                 <?php   echo  '<option value="' . $server['platform'] . '">'. $server['platformname'] . '</option>';?>
                                <?php endforeach;?>
                                <?php endif;?>
                            </select>
                            <select name="selServer"class="form-control" id="selServer">
                                <option value="">请选择区服</option>
                            </select>
                            <input  name="roleid" placeholder="角色ID" class="form-control" style="width:auto;">
                            <button class="btn btn-primary" id="accountBtn"><i class="icon-search icon-white"></i> 查询</button>
                        </div>
                    </div>                
            </form>       
    </div>
</div>

<!-- 查询组件 end-->
<div class="row-fluid">
    <table class="table table-striped table-bordered" id="ordertable"> 
     <thead>
        <th style="text-align: center;">订单号</th>
        <th style="text-align: center;">充值时间</th>
        <th style="text-align: center;">所在区服</th>
        <th style="text-align: center;">充值平台</th>
        <th style="text-align: center;">角色ID</th>
        <th style="text-align: center;">充值金额</th>
        <th style="text-align: center;">购买商品</th>
        <th style="text-align: center;">平台UID</th>
        <th style="text-align: center;">充值状态</th>
        <th style="text-align: center;">操作</th>
    </thead>
    <tbody>
         <?php if (is_array($data) && !empty($data)): ?>
                <?php foreach ($data as $listdata): ?>
                 <tr>
                <td data-name="platformid" style="display:none;"><?php echo $listdata['platformid']; ?></td> 
                <td data-name="orderid" ><?php echo $listdata['orderid']; ?></td>  
                <td data-name="time" style="text-align: center"><?php echo $listdata['order_time']; ?></td>  
                <td data-name="sid" style="text-align: center;" ><?php echo $listdata['sid']; ?></td>  
                <td data-name="platform" style="text-align: center"><?php echo $listdata['platform']; ?></td>   
                <td data-name="roleid" style="text-align: center;"><?php echo $listdata['roleid']; ?></td> 
                <td data-name="money" style="text-align: center;"><?php echo  $listdata['money']; ?></td> 
                <td data-name="shopid" style="text-align: center;"><?php echo $listdata['shopid']; ?></td>
                <td data-name="uid" style="text-align: center;"><?php echo $listdata['uid']; ?></td>
                <td data-name="statu" style="display:none;"><?php echo $listdata['statu']; ?></td> 
                <td data-name="showstatu" style="text-align: center;">    
                <?php 
                foreach(Config::get("key.order") as $key=>$value)
                if(intval($key) == intval($listdata['statu']) )
                {
                    echo trim($value);
                    break;
                }
                
                ?></td>
                <td data-name="dorderid" style="display:none;"><?php echo $listdata['dorder_id']; ?></td>
                <td>
                <?php if ($backorder): ?>             
                    <button class="btn btn-link addbackBtn" >补单</button>
                <?php endif; ?>    
                </td>
                 </tr> 
                 <?php endforeach;?>
                 <?php else:?>
                <div class="alert alert-info" style="text-align: center;">
                            <strong>先查询，订单才有哦!</strong>
                </div>  
            <?php endif;?>
    </tbody>
 </table>  
</div>
</div>
<?php echo Page_Lib::footer(); ?>
<div class="modal fade" id="submitOrderModal" tabindex="-1" role="dialog" aria-labelledby="submitOrderModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="submitOrderModalLabel">补单内容</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" action="#" method="POST" id="submitOrderForm" onsubmit="return false;">
                    <div class="control-group">
                        <label class="col-md-3 control-label">订单</label>
                        <div class="controls"><input type="text" class="form-control" name="orderid" readonly="true"/></div>
                    </div>
                    <input type="hidden" name="roleid">
                    <input type="hidden" name="sid">
                    <input type="hidden" name="platformid">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="submitbtn">确认提交</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">取消关闭</button>
            </div>
        </div>
    </div>
</div>