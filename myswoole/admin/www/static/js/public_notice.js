$(function(){
    $("#addServerBtn").click(function(){
        if($("#addServerForm select[name=ip]").val() == '' || $("#addServerForm select[name=ip]").val() == 0){
            alert('请选择区服数据服务器!');
            return false;
        }
        if($("#addServerForm input[name=sname]").val() == ''){
            alert('区服名称不能为空!');
            $("#addServerForm input[name=sname]").focus();
            return false;
        }
        var param = $("#addServerForm").serializeArray();
        //param['platform'] = $("#platform").val();
        //console.log(param);
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
    
    $(".del").each(function() {
        var _this = $(this);
        _this.click(function() {
            if (confirm("确定删除么？")) {
                var id = _this.parent().parent().find("td[data-name=id]").text();
                var id = _this.parent().parent().find("td[data-name=id]").text();
                if (id == '' || id == 'undefined') {
                    alert("mailid不能为空!");
                    return false;
                }

                var param = "server=" + $("#server").val() + "&id=" + id ;
                $.ajax({
                    type: 'POST',
                    url: '/mail/del',
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
    
    
    $("td[data-name=delState]").each(function(){
        var _this = $(this);
        _this.text(1==_this.text()?'已删除':'正常');
    });
});

