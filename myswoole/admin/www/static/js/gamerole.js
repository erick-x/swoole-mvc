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
            url:'/gameuser/forbidAccount',
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
            },
            beforeSend: function(){
                $("#confirmforbidBtn").addClass("disabled");
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
