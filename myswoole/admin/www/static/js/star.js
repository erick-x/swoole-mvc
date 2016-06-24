$(function() {
    $("#battle-star-form button.btn-primary").click(function() {
        var param = $("#battle-star-form").serialize();
        var url = $("#battle-star-form").attr('action');
        $.ajax({
            type: 'POST',
            url: url,
            data: param,
            dataType: 'json',
            success: function(result) {
                alert((result.errcode == 0?'成功':'失败 错误码：'+result.errcode));
                
            }
        });
        return false;
    });

});