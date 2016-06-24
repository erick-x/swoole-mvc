/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(function(){

     
    //刷新
   $("#freshbtn").click(function(){
      
        $.ajax({
            type:'POST',
            url:'/showdata/freshbtn',
            data:"",
            dataType:'json',
            success:function(result){
                if(result.errcode == 0){
                    window.location.href = window.location.href;
                }
            },
            beforeSend:function()
            {
                $("#loading").html("<img src='/static/img/spinner.gif' />");
            }
        });
    });
    
    //添加
     $("#addserverBtn").click(function(){
       var param = $("#addServerForm").serializeArray();
        $.ajax({
            type:'POST',
            url:'/showdata/addserver',
            data:param,
            dataType:'json',
            success:function(result){
                alert(result.msg);
                
                $("#addServerModal").modal('hide');
            }
        });
    });
    
});
