/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(function () {

    //显示模态框
     $("#addName").click(function(){     
     $("#addFileModal").modal({backdrop:"static"}).modal('show');
    });
    
    
    // 创建一个上传参数
    var uploadOption =
    {
        // 提交目标
        action: "addExecl",
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
            if(data.errcode == 0 )
            {
                $("#addFileModal").modal({backdrop:"static"}).modal('hide');
                //处理接收到的数据
               GetPage(data.msg);
            }else{
                alert(data.msg);
            }
        }
    };

    
    var oAjaxUpload = new AjaxUpload('#selector', uploadOption);

    // 给上传按钮增加上传动作
    $("#addFileBtn").click(function ()
    {
        oAjaxUpload.submit();
    });
                
     function GetPage(data)
     {
         $('#listrole').html(""); 
         
         var pagehtml = "<tr><th>选项</th><th>区服</th><th>角色ID</th></tr>";
               for(var i = 0; i< data.length;++i)
                {
                    pagehtml += '<tr id = '+data[i].id+'><td><div class="checkbox"><label class="checkbox-inline"><input name="checkboxid" type="checkbox" value = "'+data[i].id+'"checked="true" > </label></div></td>';
                    pagehtml += '<td>'+data[i].sid+'</td>';
                    pagehtml += '<td>'+data[i].roleid+'</td></tr>';   
                } 
                $('#listrole').html(pagehtml)
     }
    
    var checkbox = document.getElementsByName('checkboxid');
    
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
    
});
