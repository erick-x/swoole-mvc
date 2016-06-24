$(function() {  
    
    // 创建一个上传参数
    var uploadActivity =
    {
        // 提交目标
        action: "LoadActivity",
        // 服务端接收的名称
        name: "myfile",
        // 自动提交
        autoSubmit: false,
        // 选择文件之后…
        onChange: function (file, ext) {
            if (!(ext && /^(xml|XML|txt)$/.test(ext))) {  
                alert("您上传的文档格式不对，请重新选择！");  
                return false;  
            } 
            $("#state").val( file);
        },
        // 开始上传文件
        onSubmit: function (file, extension) {
            $("#state").val("正在上传" + file + "..");
        },

        // 上传完成之后
        onComplete: function (file, response) {
             $("#state").val("上传完成");
            var data = JSON.parse(response);
            alert(data.msg);
            if(data.errcode == 0 )
            {
                $("#addFileModal").modal({backdrop:"static"}).modal('hide');
                window.location.href = window.location.href;
            }
        }
    };
    
    var Upload = new AjaxUpload('#selector', uploadActivity);

    // 给上传按钮增加上传动作
    $("#addFileBtn").click(function ()
    {
        Upload.submit();
    });
    
    //显示模态框
     $("#loadFileBtn").click(function(){     
     $("#addFileModal").modal({backdrop:"static"}).modal('show');
    }); 
    
     //添加的公告的修改
   $("#activityTable tr").each(function() {
        var _this = $(this);
         _this.find(".ceateBtn").click(function() {

             var form = $("#saveActiveForm").serializeArray();
             for(var i=0;i<form.length;i++){
                 var name = form[i].name;
                 if(name ==null ||name =="")
                 {
                     continue;
                 }
                 var value = $(this).parent().parent().find('[data-name='+name+']').text();

                 $("#saveActiveForm [name="+name+"]").val(value);
             }
             
             $("#addloginNoticeModal").modal({backdrop:"static"}).modal('show');
         });
    });
        //添加活动
     $("#addActivityBtn").click(function() {
        var form = $("#saveActiveForm").serializeArray();
        $.ajax({
            type: 'POST',
            url: "/active/AddMultiActivity",
            data: form,
            dataType: 'json',
            success: function(result) {
                alert(result.msg);
                if (result.errcode == 0) {
                    window.location.href = "/activity/activity";
                }
            },
            beforeSend: function(){
                $("#addActivityBtn").addClass("disabled");
            }
        });
    });
    
    //修改备注
   $("#activityTable tr").each(function() {
        var _this = $(this);
         _this.find(".lookBookBtn").click(function() {

             var form = $("#alertActiveForm").serializeArray();
             for(var i=0;i<form.length;i++){
                 var name = form[i].name;
                 if(name ==null ||name =="")
                 {
                     continue;
                 }
                 var value = $(this).parent().parent().find('[data-name='+name+']').text();

                 $("#alertActiveForm [name="+name+"]").val(value);
             }
             
             $("#lookBookModal").modal({backdrop:"static"}).modal('show');
         });
    });
   
       //添加活动
     $("#alertBtn").click(function() {       
        var form = $("#alertActiveForm").serializeArray();
        $.ajax({
            type: 'POST',
            url: "/active/alertMutliActivity",
            data: form,
            dataType: 'json',
            success: function(result) {
                alert(result.msg);
                if (result.errcode == 0) {
                    window.location.href = window.location.href;
                }
                
            },
            beforeSend: function(){
                $("#alertBtn").addClass("disabled");
            }
        });
    });
    
     $("#activityTable tr").each(function() {
        var _this = $(this);
        _this.find(".deleteBtn").click(function() {
            if(confirm("确认删除?"))
            {
                var id = $(this).parent().parent().find('[data-name=id]').text();           
                    $.ajax({
                    type: 'POST',
                    url: "/active/deletMultiActivity",
                    data: "id="+id,
                    dataType: 'json',
                    success: function(result) {
                        alert(result.msg);
                        if (result.errcode == 0) {
                            window.location.href = window.location.href;
                        }
                    }
                });
            }
        });
    });
       
     //查看每个内容
     $("#activityTable tr").each(function() {
        var _this = $(this);
        _this.find(".lookBtn").click(function() {
            
           var value = $(this).parent().parent().find('[data-name=configdesc]').text();
           var ContentConfig = value.split("|");
           
            var b = document.createElement('tbody');
            document.getElementById("noticecontext").innerHTML = "";
            for(var i = 0; i< ContentConfig.length;++i)
            {
                var r = document.createElement('tr');
                var c = document.createElement('td');
                var e = document.createTextNode(ContentConfig[i]);
                c.appendChild(e);
                r.appendChild(c);
                b.appendChild(r);
            }
  
            document.getElementById("noticecontext").appendChild(b);
            $("#lookcontextModal").modal({backdrop:"static"}).modal('show');
        });
    });
    
 }); 

