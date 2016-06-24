/* 
 * manager role
 */
$(function() {
    /* --------------组信息页面 --------------*/
    $("#addRoleBtn").click(function() {
        var param = $("#addRoleForm").serialize();
        $.ajax({
            type: "POST",
            url: "/role/addRole",
            data: param,
            dataType: 'json',
            success: function(result) {
                alert(result.msg);
                if (result.errcode == 0) {
                    window.location.href = window.location.href;
                }
            }
        });
    });

    $("#rolelists tr").each(function() {
        var _this = $(this);
        var id = _this.find('.id').text();
        _this.find('.editRole').click(function() {
            var form = $("#editRoleForm").serializeArray();
            for (var i = 0; i < form.length; i++) {
                var name = form[i].name;
                $("#editRoleForm input[name=" + name + "]").val(_this.find("." + name).text());
            }
            $("#editRoleModal").modal({backdrop: "static"}).modal('show');
        });

        _this.find(".delRole").click(function() {
            $.ajax({
                type: "GET",
                url: "/role/delRole",
                data: "id=" + id,
                dataType: 'json',
                success: function(result) {
                    alert(result.msg);
                    if (result.errcode == 0) {
                        window.location.href = window.location.href;
                    }
                }
            });
        });

        _this.find(".rname").click(function() {
            $.ajax({
                type: "GET",
                url: "/role/getPermission?id=" + id,
                dataType: 'json',
                success: function(result) {
                    var html = '';
                    
                    if (result.errcode == 0 && result.data !='undefined' && result.data.menulists !='undefined' && result.data.menulists != '{}') {
                        var menulists = result.data.menulists;
                        for (var menuId in menulists) {
                            //console.log(menuId,menulists[menuId],menulists[menuId].t_mname);
                            html += '<h4 style="display:inline-block;padding-left:5px;"><span class="label label-primary">' + menulists[menuId]['t_mname'] + '</span></h4>';
                        }

                    } else {
                        html += '<p class="text-center">您没有此权限或该组没有任何权限！</p>'
                    }
                    $("#showPmsModal").find(".modal-body").html(html);
                    $("#showPmsModal").modal({backdrop: "static"}).modal('show');
                }
            });
        });
    });

    $("#editRoleBtn").click(function() {
        var param = $("#editRoleForm").serialize();
        $.ajax({
            type: "POST",
            url: "/role/editRole",
            data: param,
            dataType: 'json',
            success: function(result) {
                alert(result.msg);
                if (result.errcode == 0) {
                    window.location.href = window.location.href;
                }
            }
        });
    });

    /* --------------权限管理 --------------*/
    var checkbox = $("#menulists .checkbox-inline").find('input');
    //选择组
    $("#roles").change(function() {
        var roleId = $("#roles").val();
        if (roleId > 0) {
            $.ajax({
                type: "GET",
                url: "/role/getPermission?id=" + roleId,
                dataType: 'json',
                success: function(result) {
                    if (result.errcode == 0) {
                        //成功
                        var menulists = result.data.menulists;
                        if (checkbox.length > 0) {
                            for (var i = 0; i < checkbox.length; i++) {
                                checkbox[i].checked = false;
                            }
                        }
                        //还没写完
                        for (var menuId in menulists) {
                            $("#menulists .checkbox-inline input[value=" + menuId + "]").prop("checked", true);
                        }
                        /*for (var i = 0; i < menulists.length; i++) {
                         var menuId = menulists[i];
                         
                         }*/
                    } else {
                        alert(result.msg);
                    }
                }
            });
        }
    });

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

    //修改权限
    $("#editPermissionBtn").click(function() {
        var roleId = $("#roles").val();
        if (roleId < 1) {
            alert("请选择权限组！");
            return false;
        }
        var permissions = new Array();
        $("#menulists :checked").each(function() {
            permissions.push($(this).val());
        });
        $.ajax({
            type: "POST",
            url: "/role/editPermission",
            data: "roleId=" + roleId + "&permissions=" + permissions,
            dataType: 'json',
            success: function(result) {
                alert(result.msg);
            }
        });
    });

});


