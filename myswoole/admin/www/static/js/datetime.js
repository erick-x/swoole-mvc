/* 
 * manager role
 */
$(function() {
    /* --------------组信息页面 --------------*/
    $("#btn_date").click(function() {
        var param = $("#dateForm").serialize();
        $.ajax({
            type: "POST",
            url: "/regrate/GetData",
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


