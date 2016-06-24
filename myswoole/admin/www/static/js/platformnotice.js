$(function(){
    $("#addNoticeBtn").click(function(){
            var param = $("#addNoticerForm").serializeArray();
            $.ajax({
                type:'POST',
                url:'/platformnotice/addNotice',
                data:param,
                dataType:'json',
                success:function(result){
                      alert(result.msg);
                    if(result.errcode == 0){
                        window.location.href = window.location.href;  
                    }
                },
                beforeSend: function(){
                    $("#addNoticeBtn").addClass("disabled");
                }
            });
    });

    //添加的公告的修改
    $("#noticeTable tr").each(function() {
        var _this = $(this);
         _this.find(".alterNotice").click(function() {

             var form = $("#alterNoticeForm").serializeArray();
             for(var i=0;i<form.length;i++){
                 var name = form[i].name;
                 if(name ==null ||name =="")
                 {
                     continue;
                 }
                 var value = $(this).parent().parent().find('[data-name='+name+']').text();

                 $("#alterNoticeForm [name="+name+"]").val(value);
             }
             $("#alterNoticeModal").modal({backdrop:"static"}).modal('show');
         });
    });
    
  
   $("#alterNoticeBtn").click(function(){
        var param = $("#alterNoticeForm").serializeArray();

        $.ajax({
            type:'POST',
            url:'/platformnotice/editNotice',
            data:param,
            dataType:'json',
            success:function(result){
                alert(result.msg);
                if(result.errcode == 0){
                    window.location.href = window.location.href;
                }
            },
                beforeSend: function(){
                    $("#alterNoticeBtn").addClass("disabled");
                }
        });
    });

    //提交审核内容

$("#noticeTable tr").each(function() {
        var _this = $(this);
            _this.find(".submitNotice").click(function() {
            var form = $("#submitNoticeForm").serializeArray();
            for(var i=0;i<form.length;i++){
                var name = form[i].name;
                if(name ==null ||name =="")
                {
                    continue;
                }
                var value = $(this).parent().parent().find('[data-name='+name+']').text();
                
                $("#submitNoticeForm [name="+name+"]").val(value);
            }
            $("#submitNoticeModal").modal({backdrop:"static"}).modal('show');
        });
    });
    
    
    //提交审核
    $("#sendNoticeBtn").click(function(){
        if(confirm("确认提交?"))
        {
            var param = $("#submitNoticeForm").serializeArray();
            $.ajax({
                type:'POST',
                url:'/platformnotice/sumbitNotice',
                data:param,
                dataType:'json',
                success:function(result){
                    alert(result.msg);
                    if(result.errcode == 0){
                        window.location.href = window.location.href;
                    }
                },
                beforeSend: function(){
                    $("#sendNoticeBtn").addClass("disabled");
                }
            });
        }
    });
   
   
   //删除
$("#noticeTable tr").each(function() {
     var _this = $(this);
        _this.find(".delNotice").click(function() {
                  
     var value = $(this).parent().parent().find('[data-name=id]').text();
    if(confirm("确认提交?"))
        {
            $.ajax({
                type:'POST',
                url:'/platformnotice/delNotice',
                data:'id='+value,
                dataType:'json',
                success:function(result){
                    alert(result.msg);
                    if(result.errcode == 0){
                        window.location.href = window.location.href;
                    }
                }
            });
        }
      } );
    });
    
    //查看每个内容
     $("#noticeTable tr").each(function() {
        var _this = $(this);
        _this.find(".lookcontext").click(function() {
           var value = $(this).parent().parent().find('[data-name=context]').text();
            var b = document.createElement('tbody');
            document.getElementById("noticecontext").innerHTML = "";

            var r = document.createElement('tr');
            var c = document.createElement('td');
            var e = document.createTextNode(value);
            c.appendChild(e);
            r.appendChild(c);
            b.appendChild(r);
                
            document.getElementById("noticecontext").appendChild(b);
            $("#lookcontextModal").modal({backdrop:"static"}).modal('show');
        });
    });

});




