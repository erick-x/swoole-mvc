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

        var param = $("#forbidAccountForm").serializeArray();
        $.ajax({
            type:'POST',
            url:'/gameuser/forbidRole',
            data:param,
            dataType:'json',
            success:function(result){
                alert(result.msg);
                if(result.errcode == 0){
                    window.location.href = window.location.href;
                }
            },
            beforeSend: function(){
                $("#confirmBtn").addClass("disabled");
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
            url:'/gameuser/forbidRoleTalk',
            data:param,
            dataType:'json',
            success:function(result){
                alert(result.msg);
                if(result.errcode == 0){
                    window.location.href = window.location.href;
                }
            },
            beforeSend: function(){
                $("#confirmforbidBtn").addClass("disabled");
            }
        });
    });
    
});
