$(function(){
    $("#addServerBtn").click(function(){
        if($("#addServerForm select[name=platformname]").val() == '' || $("#addServerForm select[name=platformname]").val() == 0){
            alert('请选择平台!');
            return false;
        }
        var param = $("#addServerForm").serializeArray();

        $.ajax({
            type:'POST',
            url:'/server/addServer',
            data:param,
            dataType:'json',
            success:function(result){
                alert(result.msg);
                if(result.errcode == 0){
                    window.location.href = window.location.href;
                }
            },
                beforeSend: function(){
                    $("#addServerBtn").addClass("disabled");
                }
        });
    });
	
	//修改服务器
	$("#serverTable tr").each(function() {
        var _this = $(this);
        _this.find(".editServer").click(function() {
            
            var form = $("#editServerForm").serializeArray();
            for(var i=0;i<form.length;i++){
                var name = form[i].name;
                if(name ==null ||name =="")
                {
                    continue;
                }
                var value = $(this).parent().parent().find('[data-name='+name+']').text();
                $("#editServerForm [name="+name+"]").val(value);
            }
            $("#editServerModal input[name=id]").val(_this.attr("id"));
            $("#editServerModal").modal({backdrop:"static"}).modal('show');
        });
    });
	
	//改变服务器状态
	$("#serverTable tr").each(function() {
        var _this = $(this);
        _this.find(".severState").click(function() {
            var form = $("#serverStateForm").serializeArray();
            for(var i=0;i<form.length;i++){
                var name = form[i].name;
                if(name ==null ||name =="")
                {
                    continue;
                }
                 var value = $(this).parent().parent().find('[data-name='+name+']').text();
                  $("#serverStateForm [name="+name+"]").val(value);
                
            }
            $("#serverstateModal [name=id]").val(_this.attr("id"));
            $("#serverstateModal").modal({backdrop:"static"}).modal('show');
        });
    });
	
	//服务器状态信息
	$("#serverTable tr").each(function() {
        var _this = $(this);
        _this.find(".serverInfo").click(function() {
            var form = $("#serverInfoForm").serializeArray();
            for(var i=0;i<form.length;i++){
                var name = form[i].name;
                if(name ==null ||name =="")
                {
                    continue;
                }
                var value = $(this).parent().parent().find('[data-name='+name+']').text();
                $("#serverInfoForm [name="+name+"]").val(value);
        
            }
            $("#serverinfoModal input[name=id]").val(_this.attr("id"));
            $("#serverinfoModal").modal({backdrop:"static"}).modal('show');
        });
    });
	
	
	$("#editServerBtn").click(function(){
        if($("#editPlatformForm select[name=platformname]").val() ==='' || $("#editPlatformForm select[name=platformname]").val() === 0){
            alert('请选择平台!');
            return false;
        }
        var param = $("#editServerForm").serializeArray();
        $.ajax({
            type:'POST',
            url:'/server/editServer',
            data:param,
            dataType:'json',
            success:function(result){
                alert(result.msg);
                if(result.errcode == 0){
                    window.location.href = window.location.href;
                }
            },
                beforeSend: function(){
                    $("#editServerBtn").addClass("disabled");
                }
        });
    });
	
	$("#serverStateBtn").click(function(){
        var param = $("#serverStateForm").serializeArray();
        $.ajax({
            type:'POST',
            url:'/server/serverState',
            data:param,
            dataType:'json',
            success:function(result){
                alert(result.msg);
                if(result.errcode == 0){
                    window.location.href = window.location.href;
                }
            },
                beforeSend: function(){
                    $("#serverStateBtn").addClass("disabled");
                }
        });
    });
	
	$("#addWhiteListBtn").click(function(){
        var param = $("#addWhiteListForm").serializeArray();
        $.ajax({
            type:'POST',
            url:'/server/addWhiteList',
            data:param,
            dataType:'json',
            success:function(result){
                alert(result.msg);
                if(result.errcode == 0){
                    window.location.href = window.location.href;
                }
            },
                beforeSend: function(){
                    $("#addWhiteListBtn").addClass("disabled");
                }
        });
    });
	
	$("#serverinfoBtn").click(function(){	
        var param = $("#serverInfoForm").serializeArray();
        $.ajax({
            type:'POST',
            url:'/server/serverInfo',
            data:param,
            dataType:'json',
            success:function(result){
                alert(result.msg);
                if(result.errcode == 0){
                    window.location.href = window.location.href;
                }
            },
                beforeSend: function(){
                    $("#serverinfoBtn").addClass("disabled");
                }
        });
    });

    $("#delWhiteBtn").click(function(){
        var param = $("#addWhiteListForm").serializeArray();
        $.ajax({
            type:'POST',
            url:'/server/delWhiteList',
            data:param,
            dataType:'json',
            success:function(result){
                alert(result.msg);
                if(result.errcode === 0){
                    window.location.href = window.location.href;
                }
            },
                beforeSend: function(){
                    $("#delWhiteBtn").addClass("disabled");
                }
        });
    });


     var checkbox = $("#serverlist .checkbox-inline").find('input ');
    //全选
    $("#checkAll").click(function() {
        for (var i = 0; i < checkbox.length; i++) {
            checkbox[i].checked = true;
        }
    });

    //取消全选
    $("#checkNone").click(function() {
        for (var i = 0; i < checkbox.length; i++) {
            checkbox[i].checked = false;
        }
    });
    
    //获取对应选择的服务器和对应的id
    $("#UpdateServerBtn").click(function(){ 
        var param = $("#ListForm textarea[name=desc]").val();
        var sel = $("#ListForm select[name=serverStatus]").val();
        var state = $("#ListForm select[name=State]").val();
        var serverlist = new Array();
        $("#serverlist :checked").each(function() {
                serverlist.push($(this).val());
         });        
         $.ajax({
            type:'POST',
             url:'/server/serverStateUpdate',
            data: "serverlist=" + serverlist+"&desc="+param+"&serverStatus="+sel+"&State="+state,
            dataType:'json',
            success:function(result){
                alert(result.msg);
                if(result.errcode == 0){                  
                    window.location.href = window.location.href;
                    
                }
            },
                beforeSend: function(){
                    $("#UpdateServerBtn").addClass("disabled");
                }
        });
         
        });
        
        
});

