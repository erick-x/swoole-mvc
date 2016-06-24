$(function() {
    //添加菜单
    $("#addPlatformBtn").click(function() {
        var param = $("#addPlatformForm").serialize();
        $.ajax({
            type: 'POST',
            url: '/platform/addPlatform',
            data: param,
            dataType: 'json',
            success: function(result) {
                alert(result.msg);
                if (result.errcode == 0) {
                    window.location.href = window.location.href;
                }
            },
                beforeSend: function(){
                    $("#addPlatformBtn").addClass("disabled");
                }
        });
    });
	
	$("#paltformTable tr").each(function() {
        var _this = $(this);
        _this.find(".editPlatform").click(function() {
            var form = $("#editPlatformForm").serializeArray();
            for(var i=0;i<form.length;i++){
                var name = form[i].name;
                if(name ==null ||name =="")
                {
                    continue;
                }
                var value = $(this).parent().parent().find('[data-name='+name+']').text();
                $("#editPlatformModal [name="+name+"]").val(value);
            }
            $("#editPlatformModal input[name=id]").val(_this.attr("id"));
            $("#editPlatformModal").modal({backdrop:"static"}).modal('show');
        });
    });
	
	$("#editPlatformBtn").click(function(){
        var param = $("#editPlatformForm").serialize();
        $.ajax({
            type: 'POST',
            url: '/platform/editPlatform',
            data: param,
            dataType: 'json',
            success: function(result) {
                alert(result.msg);
                if (result.errcode == 0) {
                    window.location.href = window.location.href;
                }
            },
                beforeSend: function(){
                    $("#editPlatformBtn").addClass("disabled");
                }
        });
    }); 
	
});

