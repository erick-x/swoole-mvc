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
    
    
    // 创建一个上传参数(提交至本控制层的函数addExecl进行处理上传其次判断是否成功，成功返回)
    var uploadOption =
    {
        // 提交目标
        action: "uploadfile",
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
            
            /**
			* 这个地方判断的是在控制器里面的$this->outputJson目录在（\framework\system\libraries\controller.lib） 
			* 找到这个函数里面的设置所引用的参数进行判断
			**/
            if(data.errcode == 0 )
            {
                $("#addFileModal").modal({backdrop:"static"}).modal('hide');
                //处理接收到的数据
               GetPage(data.msg);
            }else{
            	/**
            	 * 其实在$this->outputJson 本身的echo json_encode($rs);
            	 * 是不会提示的调用js进行把在控制器里面传入的第一个变量值所做的引用如果是非0就会进行提示相关错误的信息
            	 * */
                alert(data.msg);
            }
        }
    };

    /***
     * （点击确定按钮执行-》执行控制层函数-》addExecl()进行处理上传文件其次进行读取相关数据进行解析然后在进行返回结果集）
     * */
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
