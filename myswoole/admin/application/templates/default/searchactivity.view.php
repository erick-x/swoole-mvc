<?php
$insert_html = Page_Lib::loadJs('searchactivity');
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
    <a href="#" class="current">搜索活动</a>
 </div>
<div class="container-fluid">
<div class="widget-box">
<div class="widget-title">
    <span class="icon">
    <i class="icon-search"></i>
    </span>
    <h5>查询条件</h5>
</div>
   <div class="widget-content" >			
       <form  method="get" class="form-horizontal" >         
                <div class="control-group">
		    <div class="controls">  
                        <select name="search">
                        <option value="">请选择查询方式</option>
                        <option value="1">查询区服</option>
                        <option value="2">查询活动</option>
                        </select>  
                       <input  name="param" placeholder="请输入区服或者活动标题"  style="width:auto;">
                        <button class="btn btn-primary" ><i class="icon-search icon-white"></i> 查询</button>  
                    </div>
                </div>                        
            </form>       
    </div>
</div>
</div>
 <div class="row-fluid">
    <div class="widget-box">
        <div class="widget-content" >
            <table class="table table-bordered table-striped" >
                <thead>
                    <tr>
                        <th>区服</th>
                        <th>活动名称</th>
                        <th>活动显示时间</th>
                        <th>活动结束时间</th>
                        <th>备注</th>
                        <th>状态</th>
                        <th>审核人</th>	
                        <th>操作</th>					
                    </tr>
                </thead>
                <tbody >
                <?php if (is_array($data["act1"]) && !empty($data["act1"]) ): ?>                       
                <?php foreach ($data["act1"] as $listdata): ?>
                 <tr id="<?php echo $listdata['id']; ?>" >
                    <td data-name="id" style="display:none;"><?php echo$listdata['id']; ?></td>  
                    <td data-name="sid" style="display:none;"><?php echo $listdata['sid']; ?></td> 
                    <td data-name="actid" style="display:none;"><?php echo $listdata['actid']; ?></td>
                    <td data-name="param" style="display:none;"><?php echo $listdata['param']; ?></td>
                    <td data-name="configdesc" style="display: none"><?php echo $listdata['configdesc']; ?></td>
                    <td data-name="server" style=" text-align: center;">    
                    <a href="javascript:;" title="<?php
                    $sidHtml = "";
                    $sid = explode(",", $listdata['sid']);
                    for($i = 0; $i < count($sid);++$i)
                    {
                        if( $i%4 == 0 && $i != 0)
                        {
                          $sidHtml .= $sid[$i] . " 服 <br />";  
                        }  else {
                           $sidHtml .= $sid[$i] . " 服 "; 
                        }

                    }
                    echo $sidHtml;
                    ?>" data-html="true" data-placement="bottom" data-trigger="click"  class="tip-bottom" style="text-decoration: none;" >区服</a>      
                    </td>
                    <td data-name="title" style="text-align: center;"><?php echo $listdata['title']; ?></td>
                    <td data-name="starttime" style="text-align: center;"><?php echo date('Y-m-d H:i:s',$listdata['starttime']); ?></td> 
                    <td data-name="endtime" style="text-align: center;"><?php echo date('Y-m-d H:i:s',$listdata['endtime']); ?></td>
                    <td data-name="content" style="display:none;"><?php echo $listdata['content']; ?></td>
                    <td data-name="desc" style="text-align: center;"><?php echo $listdata['desc']; ?></td>
                    <td data-name="state" style="text-align: center;"><?php 
                     if( $listdata['state'] == 3 && $listdata['endtime'] > time(0)  )
                     {
                         echo "发布中"; 
                     }else{
                         echo "已失效"; 
                     }
                    
                    ?>
                    </td>
                    <td data-name="creator" style=" text-align: center;"><?php echo $listdata['creator']; ?></td>                     
                    <td>  
                    <button class="btn btn-link  lookBtn" onclick="lookBtn(<?php echo $listdata['id']; ?> )" >配置</button>        
                    <?php if ($alertSendActivity): ?>             
                    <button class="btn btn-link submitBtn" onclick="alertSendBtn(<?php echo  $listdata['id']; ?>)">修改</button>
                    <?php endif; ?>
                    </td>						
                </tr>
            <?php endforeach; ?>
            <?php endif; ?>
            </tbody>
            </table>
        </div>
        </div>
     </div>

<?php 
    echo Page_Lib::footer(); 
?>
<!--edit Modal -->
<div class="modal fade" id="sendAlertActivityModal" tabindex="-1" role="dialog" aria-labelledby="sendAlertActivityModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="sendAlertActivityModalLabel">审核修改内容</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" action="/activity/alertSendActivity" method="POST" id="sendAlertActivityForm" onsubmit="return false;">
                    <input type="hidden" name="id"/> 
                    <input type="hidden" name="sid"/>
                    <input type="hidden" name="actid"/>
                    <input type="hidden" name="param"/>
                    <input type="hidden" name="content"/> 
                    <div class="control-group">
                        <label class="col-md-3 control-label">显示时间</label>
                        <div class="controls"><input type="text" class="datetimepicker form-control"  name="starttime" /></div>
                    </div>
                    <div class="control-group">
                        <label class="col-md-3 control-label">失效时间</label>
                        <div class="controls"><input type="text" class="datetimepicker form-control"  name="endtime" /></div>
                    </div>
                    <div class="control-group">
                        <label class="col-md-3 control-label">活动标题</label>
                        <div class="controls"><input type="text" class="form-control"  name="title"  readonly="true" /></div>
                    </div>
                    <div class="control-group">
                        <label class="col-md-3 control-label">*修改理由</label>
                        <div class="controls"><input type="text" class="form-control"   required autofocus=""  name="reason"/></div>
                    </div>
                    <div class="control-group">
                        <label class="col-md-3 control-label" for="">审核结果</label>
                        <div class="controls">
                            <select class="form-control" name="result" required="" autofocus="">
                                <option value="" selected="selected">请选择</option>
                                <option value="1">通过修改</option>
                            </select>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">               
                <button type="button" class="btn btn-primary" id="alertSendBtn">修改发布</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">取消关闭</button>
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
                <h4 class="modal-title" id="lookcontextModalLabel">配置内容</h4>
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
