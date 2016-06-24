/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(function() {  
    $("#selPlatform").change(function()
    {
       var PlatformId = $("#selPlatform").val();
       $.ajax({
            type:'POST',
            url:'/lookform/getServer',
            data:"Selplatform="+PlatformId,
            dataType:'json',
            success:function(result){
                if(result.errcode == 0){
                    loadServer(result.msg);
                }
            },
            beforeSend: function(){
                $("#selPlatform").addClass("disabled");
            }
        });
    });
    
    function loadServer(data)
    {
        $("#selServer").find("option").remove();
        var htmlPage = '<option value="">请选择区服</option>';
        for(var i = 0; i< data.length;++i)
        {
           htmlPage += '<option value="'+ data[i]['sid']+'">'+data[i]['sname']+ '</option>';        
        }
        $("#selServer").html(htmlPage);
    }
    
    $("#accountBtn").click(function()
    {
        var param = $("#OrderForm").serializeArray();
        $.ajax({
            type:'POST',
            url:'/lookform/getData',
            data:param,
            dataType:'json',
            success:function(result){
               
                if(result.errcode == 0){
                    window.location.href = window.location.href;
                }
            },
            beforeSend: function(){
                $("#accountBtn").addClass("disabled");
            }
        });
    });
   
    $("#ordertable").each(function() {
        var _this = $(this);
        _this.find(".addbackBtn").click(function() {

             var form = $("#submitOrderForm").serializeArray();
             for(var i=0;i<form.length;i++){
                 var name = form[i].name;
                 if(name ==null ||name =="")
                 {
                     continue;
                 }
                 var value = $(this).parent().parent().find('[data-name='+name+']').text();

                 $("#submitOrderForm [name="+name+"]").val(value);
             }
             
             $("#submitOrderModal").modal({backdrop:"static"}).modal('show');
         });
    });
   
     $("#submitbtn").click(function(){

            var param = $("#submitOrderForm").serializeArray();
            $.ajax({
                type:'POST',
                url:'/lookform/backorder',
                data:param,
                dataType:'json',
                success:function(result){
                    if(result.errcode == 0){
                        window.location.href = window.location.href;  
                    }
                },
                beforeSend: function(){
                    $("#submitbtn").addClass("disabled");
                }
            });
    });
    
    
});

