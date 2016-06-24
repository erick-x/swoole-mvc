<?php
$insert_html = Page_Lib::loadJs('accountdb');
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
    <a href="#" class="current">玩家帐号查询</a>
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
    <div class="widget-content" >			
        <form  method="post" class="form-horizontal" id="AccountForm" onsubmit="return false;" >         
            <table table-bordered table-striped style="text-align: center;">
                <tbody style="text-align: center;">

                      <tr style="text-align: center;">
                            <td>
                                <select name="selPlatform" class="form-control" id="selPlatform">
                                        <option value="">请选择平台</option>
                                        <?php if (is_array($platform) && !empty($platform)):?>
                                         <?php   foreach ($platform as $server):?>
                                         <?php   echo  '<option value="' . $server['platformid'] . '">'. $server['platformname'] . '</option>';?>
                                        <?php endforeach;?>
                                        <?php endif;?>
                                    </select>
                            </td>
                            <td>
                                <select name="selServer"class="form-control" id="selServer">
                                        <option value="">请选择区服</option>
                                </select>
                            </td>
                            <td>
                        <select name="accounttype"class="form-control" id="accounttype">
                                <option value="1">默认官方</option>
                                <option value="3">37IOS平台</option>
                                <option value="5">XY助手平台</option>
                                <option value="6">37安卓平台</option>
                                <option value="7">百度平台</option>
                                <option value="8">同步推平台</option>
                                <option value="9">PP助手平台</option>
                                <option value="10">快用平台</option>
                                <option value="11">ITOOLS平台</option>
                                <option value="12">爱思平台</option>
                                <option value="13">海马平台</option>
                                <option value="14">小米平台</option>
                                <option value="15">应用宝平台</option>
                                <option value="16">微信平台</option>
                                <option value="17">Appstore平台</option>
                                <option value="18">叉叉助手平台</option>
                                <option value="19">爱苹果平台</option>
                                <option value="20">XYYoung平台</option>
                                <option value="21">XYYoungAndroid平台</option>
                                <option value="22">多多平台</option>
                                <option value="23">爱应用平台</option>
                                <option value="24">新马安卓平台</option>
                                <option value="25">新马IOS平台</option>
                            </select>
                    </td>
                    <td>
                        <select name="search" class="form-control">
                                <option value="">请选择查询方式</option>
                                <option value="1">查询帐号</option>
                                <option value="2">查询角色</option>
                            </select> 
                    </td>
                    <td>
                       <input  name="strname" placeholder="请输入角色ID或者帐号" class="form-control" style="width:auto;">
                        <button class="btn btn-primary" id="accountBtn"><i class="icon-search icon-white"></i> 查询</button> 
                    </td>
                        </tr>  
                        <tr style="text-align: center;">
                        
                </tr> 
                </tbody>
                
            </table>                  
            </form>       
    </div>
</div>

<!-- 查询组件 end-->
<div class="row-fluid">
    <table class="table table-striped table-bordered" id="accounttable"> 
     <thead>
        <th style="text-align: center;">帐号</th>
        <th style="text-align: center;">玩家角色</th>
        <th style="text-align: center;">角色ID</th>
        <th style="text-align: center;">角色等级</th>
    </thead>
    <tbody id="show">        
    </tbody>
 </table>  
</div>
</div>
<?php echo Page_Lib::footer(); ?>
