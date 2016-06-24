/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(function(){
    
    //封号
   $("#confirmBtn").click(function(){
        if($("#forbidAccountForm select[name=forbidtype]").val() == ''){
            alert('请选择封号类型!');
            return false;
        }
        var listrole = getlistRole();
        $("#forbidAccountForm input[name=listroleid]").val(listrole);
        var param = $("#forbidAccountForm").serializeArray();
        $.ajax({
            type:'POST',
            url:'/rolesupervise/save',
            data:param,
            dataType:'json',
            success:function(result){
        		
        		if(result.errcode == 0)
        		{   
        			alert("操作成功！");        		
        			$("#forbidAccountModal").modal({backdrop:"static"}).modal('hide');
        			$('#listrole').html("");
        			
        			var data = result.msg; 
        			var status = null;
        			
        			switch(data[0].status){ 
    				case "2":status = "普通封号";break;
    				case "0":status = "解封账号";break;
    				}
        			 
        			var pagehtml = "<tr><th>选项</th><th>区服</th><th>执行成功角色ID 操作状态("+status+")</th></tr>";
        			
        			
        			for(var i = 0; i< data.length;++i)
  	              	{          				
  	                  	pagehtml += '<tr id = '+data[i].id+'><td><div class="checkbox"><label class="checkbox-inline"><input name="checkboxid" type="checkbox" value = "'+data[i].id+'"checked="true" > </label></div></td>';
  	                  	pagehtml += '<td>'+data[i].sid+'</td>';
  	                  	pagehtml += '<td>'+data[i].roleid+'</td></tr>'; 
  	              	} 
        			$('#listrole').html(pagehtml)
                }else{
					alert(result.msg);
                	window.location.href = window.location.href;
                }
            },
            error:function(XMLHttpRequest, textStatus, errorThrown)
            {
            	alert(XMLHttpRequest.status);
                alert(XMLHttpRequest.readyState);
                alert(textStatus); // paser error;
            }
        });
    }); 
	    
    //禁言
    $("#confirmforbidBtn").click(function(){
        if($("#forbidTlakForm select[name=talktype]").val() == ''){
            alert('请选择禁言类型!');
            return false;
        }
        var listrole = getlistRole();
        $("#forbidTlakForm input[name=listroleid]").val(listrole);
        var param = $("#forbidTlakForm").serializeArray();
        $.ajax({
            type:'POST',
            url:'/gameuser/forbidTalk',
            data:param,
            dataType:'json',
            success:function(result){
                alert(result.msg);
                if(result.errcode == 0){
                    window.location.href = window.location.href;
                }
            }
        });
    });
    
    function getlistRole()
    {
        var arrListRole = new Array();
        var checkbox = document.getElementsByName('checkboxid');
        for (var i = 0; i < checkbox.length; i++) {
            if( checkbox[i].checked == true)
            {
               var roleid =  $("#"+checkbox[i].value).children().last().text();
               var sid = $("#"+checkbox[i].value).children().prev().text();
               arrListRole.push(new Array(roleid,sid));
            }
        }
       return arrListRole;
    }
});
