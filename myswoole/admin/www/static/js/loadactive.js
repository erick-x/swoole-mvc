/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$(function() {  
    // 创建一个上传参数
    var uploadOption =
    {
        // 提交目标
        action: "addUser",
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

    var oAjaxUpload = new AjaxUpload('#selector', uploadOption);

    // 给上传按钮增加上传动作
    $("#addFileBtn").click(function ()
    {
        oAjaxUpload.submit();
    });
    
});