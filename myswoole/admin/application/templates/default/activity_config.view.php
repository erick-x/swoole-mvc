<?php
$insert_html = Page_Lib::loadJs('ajaxupload');
$insert_html.= Page_Lib::loadJs('box');
echo Page_Lib::head($insert_html);
?> 
<!-- load file or data begin -->
<div id="content-header">
    <h1>活动配置</h1>
    <div class="btn-group">        
	<?php if(isset($data) && !empty($data)):?>
	<a class="btn btn-large btn-success tip-bottom" title="添加" data-toggle="modal" data-backdrop="static"
	 data-target="#forbidAccountModal" id="forbidaccountbtn"><i class="icon-plus"></i>添加</a>
	<a title="添加名单" class="btn btn-success btn-mini" id="addName" ><i class="icon-upload"></i> 导入文件</a>
	<?php endif;?>
 	</div>
</div>
<!-- load file or data End -->

<!-- title begin -->
<div id="breadcrumb">
    <a href="/index/index" title="跳到首页" class="tip-bottom"><i class="icon-home"></i> 首页</a>
    <a href="#" class="current">box</a>
    <a href="#" title="活动配置目前安卓混服与应用宝为同一个服务器,也就是说所查看的数据以及编辑的数据这两个平台都是共用一个，
    单个编辑、查看或者是单个添加只能是单个平台，唯独批量导入通过xls格式的文件对应数据字段可以批量添加多个平台或单个平台以及测试平台,
    提示：在批量导入时全部平台是不包含测试平台的  *注:(文件导入格式要求 1.xls为后缀的文件  2.文件导入内容的boxid不能与平台现有的boxid相同(如果是覆盖式录入则无需考虑ID重复)3.在所配置的数据区域外围不能包含其他任何内容包括空格空白符,最好在数据区域外面全部清理一遍在进行录入
    4.文件名不要以中文命名(不允许包含中文字符) 5 .确保第一行的栏位字段列都是一一对应的)"
    data-placement="bottom" data-trigger="focus"  
    class="tip-bottom"><i class="icon-question-sign"></i></a>
 </div>
<!-- title end -->

<!-- Begin List -->
<div class="container-fluid">
<?php echo DataStatPage_Lib::activity_configHtml('','');?>

<!-- 查询组件 end-->
<?php //echo $registString;?>
 
 
<div class="table-responsive">
<?php if(isset($data) && !empty($data)):?>
<table id="tableExcel" class="table table-bordered table-striped " >
<thead >

    <tr>
    	<?php if(isset($full)):?>
    	<?php foreach ($full as $var):?>
        <th><?php echo $var['Field']?></th>
        <?php endforeach;?>
        <?php endif;?>
        <th>平台</th>
        <th>setting</th>        
    </tr>
    </thead>
    <tbody> 
    
    <?php foreach($data as $var):?>
     
      <tr> 
          <td style="text-align: center;" class='boxid'><?php  echo $var['boxid']; ?></td>
          <td style="text-align: center;" class='thingtotal'><?php  echo $var['thingtotal']; ?></td>
          <td style="text-align: center;" class='thing1type'><?php  echo $var['thing1type']; ?></td>
          <td style="text-align: center;" class='thing1ID'><?php  echo $var['thing1ID']; ?></td>
          <td style="text-align: center;" class='thing1num'><?php  echo $var['thing1num']; ?></td>
          <td style="text-align: center;" class='thing2type'><?php  echo $var['thing2type']; ?></td>
          <td style="text-align: center;" class='thing2ID'><?php  echo $var['thing2ID']; ?></td>
          <td style="text-align: center;" class='thing2num'><?php  echo $var['thing2num']; ?></td>
          <td style="text-align: center;" class='thing3type'><?php  echo $var['thing3type']; ?></td>
          <td style="text-align: center;" class='thing3ID'><?php  echo $var['thing3ID']; ?></td>
          <td style="text-align: center;" class='thing3num'><?php  echo $var['thing3num']; ?></td>
          <td style="text-align: center;" class='thing4type'><?php  echo $var['thing4type']; ?></td>
          <td style="text-align: center;" class='thing4ID'><?php  echo $var['thing4ID']; ?></td>
          <td style="text-align: center;" class='thing4num'><?php  echo $var['thing4num']; ?></td>
          <td style="text-align: center;" class='addType'><?php  echo $type; ?></td>
          
          <td style="text-align: center;" >
          	<button class="btn btn-link editMenu">编辑</button>
          </td>
      </tr>
    <?php endforeach;?>

    <!-- stat data end -->
    </tbody>
</table>	
    <?php endif;?>
</div>						
</div>
<!-- 分页组件 begin -->
<div class="row center" style="text-align: center;">	
<?php  echo htmlspecialchars_decode($pagehtml);?>
</div>
<!-- 分页组件 end -->
<?php echo Page_Lib::footer();?>
<!-- End Lisr -->
 
<div class="modal fade" id="addFileModal" tabindex="-1" role="dialog" aria-labelledby="addFileModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="addFileModalLabel"></h4>
            </div>
           <div class="modal-body">
                <div class="control-group">
                    <label class="col-md-3 control-label">
                    <input type="text" readonly="readonly" value="" id="state" style="margin:0px"/>
                    <input type="button" class="" value="..." id="selector" />
                    <!--<button type="button" class="btn btn-success" id="addFileBtn">确认添加</button>
                    --></label>
                    <!--<div class="controls">
                    	<input type="text" readonly="readonly" value="" id="state" />                    
                    </div>
                    
                    -->
                    <div class="controls" id="listsheet">
                     
                    </div> 
                </div>                                
            </div>
            <div class="modal-footer" id="summodel"> 
                <button type="button" class="btn btn-success" id="addFileBtn">确认上传</button>
                <button type="button" class="btn btn-default" id="cancelBtn" data-dismiss="modal">取消关闭</button>
            </div>
        </div>
    </div>
</div>

<!-- forbiden account Modal -->
<div class="modal fade" id="forbidAccountModal" tabindex="-1" role="dialog" aria-labelledby="forbidAccountModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="forbidAccountModalLabel">添加内容</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" action="add"  method="POST" id="forbidAccountForm">                     
                    <input type="hidden" name="listroleid"/>
                    <input type="hidden" name="addType" value="<?php echo !empty($type)?$type:0;?>"/>
                    <div class="control-group"> 
                    	<?php if(isset($full)):?>                    	
                    	<!--<table border=0>
                    	--><?php foreach($full as $var):?>
                    	 <div class="control-group">
                    	 	
                       	 	<label class="col-md-2 control-label"><?php echo $var['Field']=='boxid'?" * ".$var['Field']:$var['Field']?>:</label>
                       	 	<div class="controls"><input type="text"   name="<?php echo $var['Field']?>"/></div>
                   		 </div> 
                    		 <?php endforeach;?>
                    	<!--</table>
                    	--><?php endif;?> 
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
<!-- edit begin  -->
<div class="modal fade" id="editMenuModal" tabindex="-1" role="dialog" aria-labelledby="editMenuModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="editMenuModalLabel">修改活动</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" action="/edit/" method="POST" id="editMenuForm" onsubmit="return false;">
                	<input type="hidden" class="form-control" name="addType"  value='0'/>
                    <?php if (isset($full)):?>
                     <?php foreach($full as $var):?>
					 <?php 
                     	$sign = '';
                     	$shield = '';
                     	if($var['Field']=='boxid')
                     	{
                     		$sign = ' * ';
                     		$shield = 'readonly="readonly"'; 
                     	}
                     ?>
                     <div class="control-group">
                        <label class="col-md-4 control-label"><?php echo $var['Field'].$sign?>:</label>
                        <div class="controls">
						<input <?php echo $shield ?> 
						type="text" class="form-control" name="<?php echo $var['Field']?>" required="" autofocus=""/>
						</div>
                    </div>
                    <?php endforeach;?>
                    <?php endif;?>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="editMenuBtn">确认修改</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">取消关闭</button>
            </div>
        </div>
    </div>
    </div>
 <!-- end edit -->
 
