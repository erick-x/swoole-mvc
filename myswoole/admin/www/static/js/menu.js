$(function() {
    //添加菜单
    $("#addMenuBtn").click(function() {
        var param = $("#addMenuForm").serialize();
        $.ajax({
            type: 'POST',
            url: '/menu/addMenu',
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

    //修改菜单
    $("#menusTable tr").each(function() {
        var _this = $(this);
        _this.find(".editMenu").click(function() {
            var form = $("#editMenuForm").serializeArray();
            for(var i=0;i<form.length;i++){
                var name = form[i].name;
                var value = _this.find("."+name).text();
                value = value.replace(/(^\s*)|(\s*$)/g, "");
                $("#editMenuForm [name="+name+"]").val(value);
            }
            $("#editMenuModal input[name=id]").val(_this.attr("id"));
            $("#editMenuModal").modal({backdrop:"static"}).modal('show');
        });
        
        //隐藏菜单
        _this.find(".hideMenu").click(function(){
            var id = _this.attr('id');
            $.ajax({
            type: 'GET',
            url: '/menu/hideMenu?id='+id,
            dataType: 'json',
            success: function(result) {
                alert(result.msg);
                if (result.errcode == 0) {
                    window.location.href = window.location.href;
                }
            }
        });
        });
    });
    
    $("#editMenuBtn").click(function(){
        var param = $("#editMenuForm").serialize();
        $.ajax({
            type: 'POST',
            url: '/menu/editMenu',
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
    
    
});

