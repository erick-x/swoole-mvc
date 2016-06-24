/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(function(){
    $("#chatTable tr").each(function() {
        var _this = $(this);
         _this.find(".roleBtn").click(function() {

             var form = $("#forbidAccountForm").serializeArray();
             for(var i=0;i<form.length;i++){
                 var name = form[i].name;
                 if(name ==null ||name =="")
                 {
                     continue;
                 }
                 var value = $(this).parent().parent().find('[data-name='+name+']').text();

                 $("#forbidAccountForm [name="+name+"]").val(value);
             }
             $("#forbidAccountModal").modal({backdrop:"static"}).modal('show');
         });
    });
    
     $("#chatTable tr").each(function() {
        var _this = $(this);
         _this.find(".talkBtn").click(function() {

             var form = $("#forbidTlakForm").serializeArray();
             for(var i=0;i<form.length;i++){
                 var name = form[i].name;
                 if(name ==null ||name =="")
                 {
                     continue;
                 }
                 var value = $(this).parent().parent().find('[data-name='+name+']').text();

                 $("#forbidTlakForm [name="+name+"]").val(value);
             }
             $("#forbidTalkModal").modal({backdrop:"static"}).modal('show');
         });
    });
    
     
    //封号
   $("#confirmBtn").click(function(){
       
        if($("#forbidAccountForm select[name=forbidtype]").val() == ''){
            alert('请选择封号类型!');
            return false;
        }
        var param = $("#forbidAccountForm").serializeArray();
        $.ajax({
            type:'POST',
            url:'/chat/forbidrole',
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
   
    //禁言
    $("#confirmforbidBtn").click(function(){
        if($("#forbidTlakForm select[name=talktype]").val() == ''){
            alert('请选择禁言类型!');
            return false;
        }
        var param = $("#forbidTlakForm").serializeArray();
        $.ajax({
            type:'POST',
            url:'/chat/forbidtalk',
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
    
});
