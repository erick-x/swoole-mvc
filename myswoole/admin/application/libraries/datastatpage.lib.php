<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
@session_start();
class DataStatPage_Lib  extends Page_Lib{

	//动态表单元素
/**
 * 	var TemO=document.getElementById("add");     
        
        if (elementCount>0){  			
			var obj_delFromid = document.getElementById("delFromid");
			obj_delFromid.style.display = "block";  
		}else{
			var obj_delFromid = document.getElementById("delFromid");
			obj_delFromid.style.display = "none"; 
		}
 * ***/
public static function DynamicForms(){
	 
	$scriptjava = '	
	<script> 
	window.onload = function(){
		var delFromid = document.getElementById("delFromid");
		delFromid.style.display = "none";
	}
	$(document).ready(function() {
	   
		$("#addFromid").bootstrapValidator({ 
			message: "This value is not valid",
			feedbackIcons: {
				valid: "glyphicon glyphicon-ok",
				invalid: "glyphicon glyphicon-remove",
				validating: "glyphicon glyphicon-refresh"
			},
			fields: {
				firstName: {
					validators: {
						notEmpty: {
							message: "The first name is required and cannot be empty"
						}
					}
				},
				lastName: {
					validators: {
						notEmpty: {
							message: "The last name is required and cannot be empty"
						}
					}
				}
			}
		}); 
	});
	
	//以下代码是动态添加表单元素。  
    var elementCounfont =0;
    var elementCount = 0;
	var elementCoun = 0;      
	var elementCounli = 0;
	var delFromid = document.getElementById("delFromid");
	
    //动态增加表单元素。
    //输送餐品可以动态生成样式通过设定  
    function AddElement(mytype){     
        //得到需要被添加的html元素。  
        var TemO=document.getElementById("add"); 
	 	var Tem=document.getElementById("add");
		elementCount>=0?delFromid.style.display = "block":delFromid.style.display = "none";//删除元素
        //创建一个指定名称（名称指定了html的类型）html元素。
        var fontHtml  = document.createElement("font");  
        var newInput = document.createElement("input");
        var litype = document.createElement("li");        
	    var newInpu  = document.createElement("input");
  		
	    if( elementCount>=14)
  		{
			alert("区间添加长度冗余最大为15");			
			window.history.go(-1);
			return false;
		}           
        elementCount = elementCount + 1; 
		elementCoun = elementCoun + 1; 
		elementCounli = elementCounli + 1;
		elementCounfont = elementCounfont + 1;      
          
        //指定input的类型。  
        newInput.type=mytype;      
        newInpu.type=mytype;  
        
        fontHtml.id="fontFrom"+(elementCounfont);
		fontHtml.name="fontFrom"+"["+(elementCounfont)+"]";
		 	
		elementCounfont<=9?fontHtml.innerHTML="区间"+elementCounfont+":  ":fontHtml.innerHTML="区间"+elementCounfont+":";		
		 
		litype.id="liFrom"+(elementCounli);
		litype.name="liFrom"+"["+(elementCounli)+"]";
		litype.innerHTML="";
		
		litype.className="icon-th";  
        //动态生成id。  
        newInput.id ="FirstFrom"+(elementCount); 
		newInput.name="FirstFrom"+"["+(elementCount)+"]";
		newInput.style.width="7%";
		newInput.placeholder = "RmbIntervalStart";
		//newInput
		newInpu.id="secondFrom"+(elementCoun);    
        newInpu.name="secondFrom"+"["+(elementCoun)+"]"; 
		newInpu.style.width="7%"; 
		newInpu.placeholder = "RmbIntervalEnd";
		Tem.appendChild(fontHtml); 
        TemO.appendChild(newInput);
        Tem.appendChild(litype);     
		Tem.appendChild(newInpu); 
		
        var newline= document.createElement("br"); 		
		var newlin= document.createElement("bd");    
          
        newline.id = "br"+(elementCount);    
        newlin.id = "br"+(elementCoun);   
          
        TemO.appendChild(newline);
		Tem.appendChild(newlin); 
    }     
      
    //动态删除表单元素。     
    function delElement(mytype){         
        var TemO=document.getElementById("add");         
        elementCount<=1?delFromid.style.display = "none":delFromid.style.display = "block";//删除元素        
        if (elementCount>0)
        {     
            var fontFrom = document.getElementById("fontFrom"+elementCounfont);
            var newInput = document.getElementById("FirstFrom"+elementCount);
            var liFrom = document.getElementById("liFrom"+elementCounli);
              
            TemO.removeChild(liFrom); 
            TemO.removeChild(newInput);   
     		TemO.removeChild(fontFrom);
     		
            var newline= document.getElementById("br"+(elementCount)); 
              
            elementCounli = elementCounli -1;  
            elementCount  = elementCount - 1; 
            elementCounfont = elementCounfont -1;   
            
            TemO.removeChild(newline);     
        }   
		
		if (elementCount>=0)
		{     
            var newInpu = document.getElementById("secondFrom"+elementCoun);      
             
            TemO.removeChild(newInpu);    
              
            elementCoun = elementCoun - 1;  
        } 
		
    }     	 
	</script>';    	 
	return $scriptjava; 
}
    
// ---------------------------------------------------------------------------------------------------------
public static function StatRechargeGoldHtml($time="",$dau="",$register="",$payrole="",$payal="",$type = "",$contentType ="",$totalPay="") 
{    	 
  		  	
    	$scriptjava = self::DynamicForms();/*添加动态表单动态生成以及删除*/
    	$js_path = self::getJsHost();
    	
    	$btnType = '';
    	if($time!="" && $contentType == 1)
    	{  
    		$action = "payExportfile";
    		$btnType ="btn btn-success";
    		$btnType = '<input  type="submit"  style="padding:0;width:120px" class="btn btn-success" value="导出Execl" />';	    	
    		$register = !empty($register)?$register:array(0=>"空");    		    		 
	    	foreach($register as $var)
			{  	
				foreach($var as $var)
				{             	
						$registString .= $var['datetime'].'='.$var['roleid'].'='.$var['iworld'].','; 
				} 	                
			} 	    	 
	    	$dau = !empty($dau)?$dau:array(0=>"空");
	    	foreach($dau as $var)
			{  	
				foreach($var as $var)
				{             	
						$dauString .= $var['datetime'].'='.$var['roleid'].'='.$var['iworld'].',';
				} 	                
			}
			$payrole = !empty($payrole)?$payrole:array(0=>"空");
    		foreach($payrole as $var)
			{  	
				foreach($var as $var){             	
						$payroleString .= $var['order_time'].'='.$var['money'].'='.$var['rolenum']."=".$var['user_sid'].',';
				} 	                
			}
			$payal = !empty($payal)?$payal:array(0=>"空");
			foreach($payal as $var)
			{  	
				foreach($var as $var){             	//
						$payalString .= $var['order_time'].'='.$var['order_money'].'='.$var['order_roleid'].'='.$var['user_sid'].',';
				} 	                
			} 			
			$time = implode(',',$time); 
    	}
    	if($contentType == 2)
    	{
    		$action = "IntervalExport";
    		$btnType ="btn btn-success";
    		$btnType = '<input  type="submit"  style="padding:0;width:120px" class="btn btn-success" value="导出Execl" />';
    		$time = implode(',',$time); 
    		foreach ($payrole as $inpayrole)
    		{	
    			foreach($inpayrole as $var) 
    			{
    				$payroleString .= $var['order_roleid'].'='.$var['order_money'].'='.$var['uin'].'='.$var['level'].'='.$var['strName'].'='.$var['updatetime'].'='.$var['entry']."=".$var['worldID'].",";
    			}
    		}
    		foreach ($totalPay as $inalpayrole)
    		{	
    			foreach($inalpayrole as $var) {
    				$payalString .= $var['order_roleid'].'='.$var['order_money'].'='.$var['uin'].'='.$var['level'].'='.$var['strName'].'='.$var['updatetime']."=".$var['entry']."=".$var['worldID'].",";    				
    			}
    		}
    	} 
    	$regionIdHtml = '
    	<textarea type="text" style="height:20px" value="1" class="newInput"
    	name="regionid" placeholder="区服编号" title="*区服编号"></textarea>';         
        //选择条件 
        $selecttype = '<select name="type" id ="type" class="form-control" style="width:100px" title="*设置类型">';        
        $selecttype.= '<option value="0">--请选择--</option><option value="2">安卓混服</option><option value="1">应用宝</option></select>';        
      	$optionTimeHtml = '<div id ="optiontimid"><i class="icon-th "></i> <input type="text" class="datetimepicker form-control" placeholder="开始时间"  name="startTime" style="width:auto;"/>';    
      	$optionTimeHtml.= ' — <input type="text" class="datetimepicker form-control"   placeholder="截止时间" name="endtime" style="width:auto;"/></div>';
      	$startInterval = '';
      	$endInterval ='';
      	$updateFrom = '<button class="btn btn-success"  type="button"  style="width:100px" id="addFromid" name ="addfrom" onclick = "AddElement(\'text\')"><i class="icon-plus icon-white"></i> 添加区间</button>';
      	$delFrom = '<button class="btn btn-danger" id="delFromid"  type="button" name ="delfrom" onclick = "delElement(\'text\')" style="width:100px;"><i class="icon-minus icon-white"></i>删除</button>';
      	$data = isset($object)?$object:0;  
      	//组装
      	$html = <<<EOF
      				<script src='{$js_path}/bootstrapValidator.js'></script>
            	<!-- 查询组件 begin-->
				   <div class="widget-box">
				   	<div class="widget-title">
								<span class="icon">
									<i class="icon-search"></i>
								</span>
								<h5>设置条件</h5>
								<div class="buttons">																										 
    								<form  action="{$action}" method="POST"> 								
										 <input  type="hidden" name="time" value="{$time}"/>
									     <input  type="hidden" name="register" value="{$registString}"/>
									     <input  type="hidden" name="dau" value="{$dauString}"/>
									     <input  type="hidden" name="payrole" value="{$payroleString}"/>
									     <input  type="hidden" name="payal" value="{$payalString}"/>
									     <input  type="hidden" name="type" value="{$type}"/>  
									     <input  type="hidden" name="contentType" value="{$contentType}"/>
      									<div>
									     <table border=0>
								         <tr>
								        	<td>{$btnType}</td>	
								         </tr>
								         </table> 
								         </div>          
									</form>    							 
								</div>	
							</div> 
	    <div class="widget-content">  
        <form  method="POST" class="form-horizontal" onsubmit="return statdataVerify(this);" >         
                <div class="control-group" >
				<div class="controls" > 
					<table border=0>
						<tr>
						 <td>{$selecttype}</td>
						 <td><i class="icon-th "></i></td>					  
						 <td>{$regionIdHtml}</td>						  
		                 <td>{$optionTimeHtml}</td>		                 
		                 <td> <button class="btn btn-primary" name="sub_btn" type="submit" id="btn_date"><i class="icon-search icon-white"></i> 查询</button></td>
		                <td>{$updateFrom}</td><td>{$delFrom}</td>
						</tr>
					</table> 					
					<p></p>
					<div class="form-group" id="add">
					
					<div>							                        
                </div>
                </div>                
            </form>       
    </div>
</div>
{$scriptjava} 
</div>
                   <!-- 查询组件 end-->
		
EOF;
        return $html;
}
  
}

?>
