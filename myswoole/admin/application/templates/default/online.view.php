<?php
echo Page_Lib::head();
?>
<!-- 站内导航 -->
<div id="content-header">
    <h1>后台基本操作</h1>
    </div>
 <div id="breadcrumb">
    <a href="/index/index" title="跳到首页" class="tip-bottom"><i class="icon-home"></i> 首页</a>
    <a href="#" class="current">游戏数据</a>
 </div>
<div class="container-fluid">
    <div class="row-fluid">
        <div class="widget-box">           
        <table class="table table-striped table-bordered table-hover" id="showTable">            
            <thead>
                <th>区服</th>
                <th>在线人数</th>
            </thead>
            <div style="text-align: center;" id="loading">                
            </div> 
            <tbody> 
                <?php if (is_array($data) && !empty($data)): ?>
                <?php foreach ($data as $listdata): ?>
                 <tr>
                <td data-name="id" style="display:none;"><?php echo$listdata['id']; ?></td> 
                <td data-name="sid" style="text-align: center;" ><?php echo $listdata['WorldID']; ?></td>  
                <td data-name="roletotal" style="text-align: center"><?php echo $listdata['OnlineRoleNum']; ?></td> 
                 </tr> 
                 <?php endforeach;?>
                 <?php else:?>
                 <div class="alert alert-info" style="text-align: center;">
                            <strong>请刷新内容!</strong>
                </div>  
            <?php endif;?>
            </tbody>            
        </table>            
    </div>
    </div>
</div>
<?php 
    echo Page_Lib::footer(); 
?>