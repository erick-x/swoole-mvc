$(function() {
    
    //添加用户
    $("#addUserBtn").click(function() {
       if($("#addUserForm input[name='account']").val() == ''){
           alert("帐号不能为空");
           return false;
       }
       if($("#addUserForm select[name='roleid']").val() == 0){
           alert("请选择所属组");
           return false;
       }
       
        var param = $("#addUserForm").serialize();
        var url = $("#addUserForm").attr('action');
        $.ajax({
            type: 'POST',
            url: url,
            data: param,
            dataType: 'json',
            success: function(result) {
                alert(result.msg);
                if (result.errcode == 0) {
                    //window.location.href = window.location.href;
                    window.location.reload();
                }
            }
        });
    });

    //编辑用户组 
    $("#rolelists select[name=roleid]").change(function(){
        var url = '/user/editUser';
        var account = $(this).parent().parent().find("td[data-name=account]").text();
        var roleid = $(this).val();
        var param = 'account='+account+'&roleid='+roleid;
        $.ajax({
            type: 'POST',
            url: url,
            data: param,
            dataType: 'json',
            success: function(result) {
                alert(result.msg);
                if (result.errcode != 0) {
                    return false;
                }
            }
        });
    });
   
    $(".delUser").each(function() {
        var _this = $(this);
        _this.click(function() {
            if (confirm("确定删除此用户么？")) {
                var uid = $(this).attr('data-value');
                if (uid == '' || uid == 'undefined') {
                    alert("uid不能为空!");
                    return false;
                }
                $.ajax({
                    type: 'POST',
                    url: '/user/delUser',
                    data: 'uid='+uid,
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
