$(function() { 

    //添加活动
     $("#loadBtn").click(function() { 
        var form = $("#addActivityForm").serializeArray();
        $.ajax({
            type: 'POST',
            url: "/activity/loadactivity",
            data: form,
            dataType: 'json',
            success: function(result) {
                alert(result.msg);
                if (result.errcode == 0) {
                    window.location.href =window.location.href;
                }
            }
        });
    });
    
    $("#loadBtn").click(function() { 
        var sid = document.getElementById("actsid");
        $.ajax({
            type: 'POST',
            url: "/activity/loadactivity",
            data: "sid=".sid,
            dataType: 'json',
            success: function(result) {
                alert(result.msg);
                if (result.errcode == 0) {
                    window.location.href =window.location.href;
                }
            },
            beforeSend: function(){
                $("#loadBtn").addClass("disabled");
            }
        });
    });
    
    
     $("#editBtn").click(function() {   
        var form = $("#submitActivityForm").serializeArray();
        $.ajax({
            type: 'POST',
            url: "/activity/submitActivity",
            data: form,
            dataType: 'json',
            success: function(result) {
                alert(result.msg);
                if (result.errcode == 0) {
                    window.location.href =  window.location.href;
                }
            },
            beforeSend: function(){
                $("#editBtn").addClass("disabled");
            }
        });
    });
   
  
    
    $("#subBtn").click(function() {   
        var form = $("#sendActivityForm").serializeArray();
        $.ajax({
            type: 'POST',
            url: "/activity/sendActivity",
            data: form,
            dataType: 'json',
            success: function(result) {
                alert(result.msg);
                if (result.errcode == 0) {
                    window.location.href =  window.location.href;
                }
            },
            beforeSend: function(){
                $("#subBtn").addClass("disabled");
            }
        });
    });
   
   
    $("#alertSendBtn").click(function() {   
        var form = $("#sendAlertActivityForm").serializeArray();
            if(confirm("确认执行?"))
            {
                $.ajax({
                        type: 'POST',
                        url: "/activity/alertSendActivity",
                        data: form,
                        dataType: 'json',
                        success: function(result) {
                            alert(result.msg);
                            if (result.errcode == 0) {
                                window.location.href =  window.location.href;
                            }
                        },
                        beforeSend: function(){
                            $("#alertSendBtn").addClass("disabled");
                        }
                    });
            }
        
    });
   
    
    //添加活动
     $("#addActivityBtn").click(function() { 
        var form = $("#saveActiveForm").serializeArray();
        $.ajax({
            type: 'POST',
            url: "/activity/alertActivity",
            data: form,
            dataType: 'json',
            success: function(result) {
                alert(result.msg);
                if (result.errcode == 0) {
                    window.location.href = window.location.href;
                }
            },
            beforeSend: function(){
                $("#addActivityBtn").addClass("disabled");
            }
        });
    });
 }); 

