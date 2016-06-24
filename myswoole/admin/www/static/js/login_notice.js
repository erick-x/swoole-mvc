$(function(){
    
    //提交添加的登录公告
     $("#addLoginNoticeBtn").click(function(){
        if(confirm("确认添加?"))
        {
            var param = $("#addLoginNoticerForm").serializeArray();
            $.ajax({
                type:'POST',
                url:'/loginnotice/addLoginNotice',
                data:param,
                dataType:'json',
                success:function(result){
                    alert(result.msg);
                    if(result.errcode == 0){
                        window.location.href = window.location.href;
                    }
                },
            beforeSend: function(){
                $("#addLoginNoticeBtn").addClass("disabled");
            }
            });
        }
    });
    
    //获取对应选择的服务器和对应的id
    $("#loadServerbtn").click(function(){       
        var id = $("#serverlist [name=tr_id]").val();
        var serverlist = new Array();
        $("#serverlist :checked").each(function() {
                serverlist.push($(this).val());
         });        
         $.ajax({
            type:'POST',
            url:'/loginnotice/addServer',
            data:"id=" + id + "&serverlist=" + serverlist,
            dataType:'json',
            success:function(result){
                alert(result.msg);
                if(result.errcode == 0){
                    window.location.href = window.location.href;
                }
            },
            beforeSend: function(){
                $("#loadServerbtn").addClass("disabled");
            }
        });
    });
    
  //提交到审核中
 $("#noticeTable tr").each(function() {
        var _this = $(this);
            _this.find(".submitBtn").click(function() {
            var form = $("#submitLoginNoticeForm").serializeArray();
            for(var i=0;i<form.length;i++){
                var name = form[i].name;
                if(name ==null ||name =="")
                {
                    continue;
                }

                var value = $(this).parent().parent().find('[data-name='+name+']').text();
                
                $("#submitLoginNoticeForm [name="+name+"]").val(value);
            }
            $("#submitLoginNoticeModal input[name=id]").val(_this.attr("id"));
            $("#submitLoginNoticeModal").modal({backdrop:"static"}).modal('show');
        });
    });
    //撤回已经发布的登录公告
    $("#submitloginbtn").click(function(){       
       var param = $("#submitLoginNoticeForm").serializeArray();
         $.ajax({
            type:'POST',
            url:'/loginnotice/sumbitNotice',
            data:param,
            dataType:'json',
            success:function(result){
                alert(result.msg);
                if(result.errcode == 0){
                    window.location.href = "/loginnotice/passLoginNotice";
                }
            },
            beforeSend: function(){
                $("#submitloginbtn").addClass("disabled");
            }
        });
    });
    
    //查看添加的登录公告内容
 $("#noticeTable tr").each(function() {
        var _this = $(this);
            _this.find(".alterLoginNotice").click(function() {
            var form = $("#alterLoginNoticeForm").serializeArray();
            for(var i=0;i<form.length;i++){
                var name = form[i].name;
                if(name ==null ||name =="")
                {
                    continue;
                }

                var value = $(this).parent().parent().find('[data-name='+name+']').text();
                
                $("#alterLoginNoticeForm [name="+name+"]").val(value);
            }
            $("#alterLoginNoticeModal input[name=id]").val(_this.attr("id"));
            $("#alterLoginNoticeModal").modal({backdrop:"static"}).modal('show');
        });
    });
    
    
   //审核内容
 $("#tab1 table tr").each(function() {
        var _this = $(this);
            _this.find(".editLoginNotice").click(function() {
            var form = $("#editLoginNoticeForm").serializeArray();
            for(var i=0;i<form.length;i++){
                var name = form[i].name;
                if(name ==null ||name =="")
                {
                    continue;
                }

                var value = $(this).parent().parent().find('[data-name='+name+']').text();
                
                $("#editLoginNoticeForm [name="+name+"]").val(value);
            }
            $("#editLoginNoticeModal input[name=id]").val(_this.attr("id"));
            $("#editLoginNoticeModal").modal({backdrop:"static"}).modal('show');
        });
    });
   
   //撤回已经发布的登录公告
    $("#returnBtn").click(function(){       
       var param = $("#RevokeLoginNoticeForm").serializeArray();
         $.ajax({
            type:'POST',
            url:'/loginnotice/returnLoginNotice',
            data:param,
            dataType:'json',
            success:function(result){
                alert(result.msg);
                if(result.errcode == 0){
                    window.location.href = window.location.href;
                }
            },
            beforeSend: function(){
                $("#returnBtn").addClass("disabled");
            }
        });
    });
   
       
    //查看发布中内容
 $("#tab2 table tr").each(function() {
        var _this = $(this);
            _this.find(".looklink").click(function() {
            var form = $("#looklinkForm").serializeArray();
            for(var i=0;i<form.length;i++){
                var name = form[i].name;
                if(name ==null ||name =="")
                {
                    continue;
                }

                var value = $(this).parent().parent().find('[data-name='+name+']').text();
                
                $("#looklinkForm [name="+name+"]").val(value);
            }
            $("#looklinkModal input[name=id]").val(_this.attr("id"));
            $("#looklinkModal").modal({backdrop:"static"}).modal('show');
        });
    });

    //发布中内容
 $("#tab2 table tr").each(function() {
        var _this = $(this);
            _this.find(".returnLoginNotice").click(function() {
            var form = $("#RevokeLoginNoticeForm").serializeArray();
            for(var i=0;i<form.length;i++){
                var name = form[i].name;
                if(name ==null ||name =="")
                {
                    continue;
                }

                var value = $(this).parent().parent().find('[data-name='+name+']').text();
                
                $("#RevokeLoginNoticeForm [name="+name+"]").val(value);
            }
            $("#RevokeLoginNoticeModal input[name=id]").val(_this.attr("id"));
            $("#RevokeLoginNoticeModal").modal({backdrop:"static"}).modal('show');
        });
    });
    
    
     //修改未通过内容
 $("#tab3 table tr").each(function() {
        var _this = $(this);
            _this.find(".alterLoginNotice").click(function() {
            var form = $("#alterLoginNoticeForm").serializeArray();
            for(var i=0;i<form.length;i++){
                var name = form[i].name;
                if(name ==null ||name =="")
                {
                    continue;
                }

                var value = $(this).parent().parent().find('[data-name='+name+']').text();
                
                $("#alterLoginNoticeForm [name="+name+"]").val(value);
            }
            $("#alterLoginNoticeModal input[name=id]").val(_this.attr("id"));
            $("#alterLoginNoticeModal").modal({backdrop:"static"}).modal('show');
        });
    });
    
  //查看未通过内容
 $("#tab3 table tr").each(function() {
        var _this = $(this);
            _this.find(".lookLoginNotice").click(function() {
            var form = $("#lookLoginNoticeForm").serializeArray();
            for(var i=0;i<form.length;i++){
                var name = form[i].name;
                if(name ==null ||name =="")
                {
                    continue;
                }

                var value = $(this).parent().parent().find('[data-name='+name+']').text();
                
                $("#lookLoginNoticeForm [name="+name+"]").val(value);
            }
            $("#lookLoginNoticeModal input[name=id]").val(_this.attr("id"));
            $("#lookLoginNoticeModal").modal({backdrop:"static"}).modal('show');
        });
    });
    
    
     //已经失效
 $("#tab4 table tr").each(function() {
        var _this = $(this);
            _this.find(".lookLoginNotice").click(function() {
            var form = $("#lookLoginNoticeForm").serializeArray();
            for(var i=0;i<form.length;i++){
                var name = form[i].name;
                if(name ==null ||name =="")
                {
                    continue;
                }

                var value = $(this).parent().parent().find('[data-name='+name+']').text();
                
                $("#lookLoginNoticeForm [name="+name+"]").val(value);
            }
            $("#lookLoginNoticeModal input[name=id]").val(_this.attr("id"));
            $("#lookLoginNoticeModal").modal({backdrop:"static"}).modal('show');
        });
    });
    
   //审核通过
    $("#editLoginNoticeBtn").click(function(){
        var param = $("#editLoginNoticeForm").serializeArray();
        $.ajax({
            type:'POST',
            url:'/loginnotice/editLoginNotice',
            data:param,
            dataType:'json',
            success:function(result){
                alert(result.msg);
                if(result.errcode == 0){
                    window.location.href = window.location.href;
                }
            },
            beforeSend: function(){
                $("#editLoginNoticeBtn").addClass("disabled");
            }
        });
    });
    
    //修改内容
    $("#alterLoginNoticeBtn").click(function(){
        var param = $("#alterLoginNoticeForm").serializeArray();
        $.ajax({
            type:'POST',
            url:'/loginnotice/alterLoginNotice',
            data:param,
            dataType:'json',
            success:function(result){
                alert(result.msg);
                if(result.errcode == 0){
                    window.location.href = window.location.href;
                }
            },
            beforeSend: function(){
                $("#alterLoginNoticeBtn").addClass("disabled");
            }
        });
    });
    //查看每个内容
     $("#noticeTable tr").each(function() {
        var _this = $(this);
        _this.find(".lookcontext").click(function() {
           var value = $(this).parent().parent().find('[data-name=context]').text();
            var b = document.createElement('tbody');
            document.getElementById("noticecontext").innerHTML = "";

            var r = document.createElement('tr');
            var c = document.createElement('td');
            var e = document.createTextNode(value);
            c.appendChild(e);
            r.appendChild(c);
            b.appendChild(r);
                
            document.getElementById("noticecontext").appendChild(b);
            $("#lookcontextModal").modal({backdrop:"static"}).modal('show');
        });
    });
    
    
    //查看每个内容
     $("#tab1 table tr").each(function() {
        var _this = $(this);
        _this.find(".lookcontext").click(function() {
           var value = $(this).parent().parent().find('[data-name=context]').text();
            var b = document.createElement('tbody');
            document.getElementById("noticecontext").innerHTML = "";

            var r = document.createElement('tr');
            var c = document.createElement('td');
            var e = document.createTextNode(value);
            c.appendChild(e);
            r.appendChild(c);
            b.appendChild(r);
                
            document.getElementById("noticecontext").appendChild(b);
            $("#lookcontextModal").modal({backdrop:"static"}).modal('show');
        });
    });
    //查看每个内容
     $("#tab2 table tr").each(function() {
        var _this = $(this);
        _this.find(".lookcontext").click(function() {
           var value = $(this).parent().parent().find('[data-name=context]').text();
            var b = document.createElement('tbody');
            document.getElementById("noticecontext").innerHTML = "";

            var r = document.createElement('tr');
            var c = document.createElement('td');
            var e = document.createTextNode(value);
            c.appendChild(e);
            r.appendChild(c);
            b.appendChild(r);
                
            document.getElementById("noticecontext").appendChild(b);
            $("#lookcontextModal").modal({backdrop:"static"}).modal('show');
        });
    });

    
    
    //查看每个内容
     $("#tab3 table tr").each(function() {
        var _this = $(this);
        _this.find(".lookcontext").click(function() {
           var value = $(this).parent().parent().find('[data-name=context]').text();
            var b = document.createElement('tbody');
            document.getElementById("noticecontext").innerHTML = "";

            var r = document.createElement('tr');
            var c = document.createElement('td');
            var e = document.createTextNode(value);
            c.appendChild(e);
            r.appendChild(c);
            b.appendChild(r);
                
            document.getElementById("noticecontext").appendChild(b);
            $("#lookcontextModal").modal({backdrop:"static"}).modal('show');
        });
    });
    
    //查看每个内容
     $("#tab4 table tr").each(function() {
        var _this = $(this);
        _this.find(".lookcontext").click(function() {
           var value = $(this).parent().parent().find('[data-name=context]').text();
            var b = document.createElement('tbody');
            document.getElementById("noticecontext").innerHTML = "";

            var r = document.createElement('tr');
            var c = document.createElement('td');
            var e = document.createTextNode(value);
            c.appendChild(e);
            r.appendChild(c);
            b.appendChild(r);
                
            document.getElementById("noticecontext").appendChild(b);
            $("#lookcontextModal").modal({backdrop:"static"}).modal('show');
        });
    });
     
     $("#tab4 table tr").each(function() {
        var _this = $(this);
        _this.find(".delLoginNotice").click(function() {
            if (confirm("确定删除么？")) {
             var value = $(this).parent().parent().find('[data-name=tr_id]').text();
                if (value === undefined && value ==="") {
                    alert("没有可删除的选项");
                    window.location.href = window.location.href;
                }
                var param = "tr_id=" + value ;
                $.ajax({
                    type: 'POST',
                    url: '/loginnotice/delLoginNotice',
                    data: param,
                    dataType: 'json',
                    success: function(result) {
                        alert(result.msg);
                        if (result.errcode == 0) {
                            window.location.reload();
                        }
                    }
                });
            }
        });
    });
    
});

