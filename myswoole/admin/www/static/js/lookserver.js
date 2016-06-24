
function loadpage(state){
    
      var cell = document.getElementById('loading'+state).innerHTML;
      if ( cell.length === 0)
      {
          return 0;
      }
      var data  =  "state="+state;
        $.ajax({
            type: 'POST',
            url: "/activity/getactivity",
            data: data,
            dataType: 'json',
            success: function(result) {
             if( result.errcode == 0 )
             {
                  $("#load"+state).html("");
                   $("#loading"+state).html("");
                  $("#load"+state).append( result.msg);
                  
             }else{
                 alert("加载失败");
             }
            },
            beforeSend:function()
            {
                $("#loading"+state).html("<img src='/static/img/spinner.gif' />");
            }
        });
  }
function lookserver(id)
{
   $("#" + id).each(function() {     
            var  value= $(this).find('[data-name=sid]').text();
            var  server = new Array();
            server = value.split(","); 
            var b = document.createElement('tbody');
            document.getElementById("lookserverlist").innerHTML = "";
                for(var i =0; i <server.length; i+=4)
                {
                    var r = document.createElement('tr');
             
                    if(server[i] !=="" && server[i] !==0&& server[i] !== undefined)
                    {
                        var c = document.createElement('td');
                        var e = document.createTextNode(server[i] + '服');
                        c.appendChild(e);
                        r.appendChild(c);
                    }else
                    {
                         var c = document.createElement('td');
                         var e =  document.createTextNode('');
                         c.appendChild(e);
                         r.appendChild(c);
                    }
                    if(server[i+1] !=="" && server[i+1] !==0&& server[i+1] !== undefined)
                    {
                        var c = document.createElement('td');
                        var e = document.createTextNode(server[i+1] + '服');
                        c.appendChild(e);
                        r.appendChild(c);
                    }else
                    {
                         var c = document.createElement('td');
                         var e =  document.createTextNode('');
                         c.appendChild(e);
                         r.appendChild(c);
                    }
                    if(server[i+2] !=="" && server[i+2] !==0&& server[i+2] !== undefined)
                    {
                       var c = document.createElement('td');
                        var e = document.createTextNode(server[i+2] + '服');
                        c.appendChild(e);
                        r.appendChild(c);
                    }else
                    {
                         var c = document.createElement('td');
                         var e =  document.createTextNode('');
                         c.appendChild(e);
                         r.appendChild(c);
                    }
                    if(server[i+3] !=="" && server[i+3] !==0 && server[i+3] !== undefined)
                    {
                       var c = document.createElement('td');
                        var e = document.createTextNode(server[i+3] + '服');
                        c.appendChild(e);
                        r.appendChild(c);
                    }else
                    {
                         var c = document.createElement('td');
                         var e =  document.createTextNode('');
                         c.appendChild(e);
                         r.appendChild(c);
                    }
                    b.appendChild(r);
                } 
             document.getElementById("lookserverlist").appendChild(b);
            $("#lookserverModal").modal({backdrop:"static"}).modal('show');
   });  
}

function lookBookBtn( id )
{
      $("#" + id).each(function() {
             var form = $("#alertActiveForm").serializeArray();
             for(var i=0;i<form.length;i++){
                 var name = form[i].name;
                 if(name ==null ||name =="")
                 {
                     continue;
                 }
                 var value = $(this).find('[data-name='+name+']').text();

                 $("#alertActiveForm [name="+name+"]").val(value);
             }
             
             $("#lookBookModal").modal({backdrop:"static"}).modal('show');
         });
}

function delBtn( id )
{         
      $("#" + id).each(function() {
            if(confirm("确认删除?"))
               {
                   var id = $(this).find('[data-name=id]').text();           
                       $.ajax({
                       type: 'POST',
                       url: "/activity/deletActivity",
                       data: "id="+id,
                       dataType: 'json',
                       success: function(result) {
                           alert(result.msg);
                           if (result.errcode == 0) {
                               window.location.href = window.location.href;
                           }
                       }
                   });
               }
         });
}

function lookBtn(id)
{
    $("#" + id).each(function() {
           var value = $(this).find('[data-name=configdesc]').text();
           var ContentConfig = value.split("|");
           
            var b = document.createElement('tbody');
            document.getElementById("noticecontext").innerHTML = "";
            for(var i = 0; i< ContentConfig.length;++i)
            {
                var r = document.createElement('tr');
                var c = document.createElement('td');
                var e = document.createTextNode(ContentConfig[i]);
                c.appendChild(e);
                r.appendChild(c);
                b.appendChild(r);
            }
     
            document.getElementById("noticecontext").appendChild(b);
            $("#lookcontextModal").modal({backdrop:"static"}).modal('show');
        });
}

function submitBtn(id)
{
      $("#" + id).each(function() {
             var form = $("#submitActivityForm").serializeArray();
             for(var i=0;i<form.length;i++){
                 var name = form[i].name;
                 if(name ==null ||name =="")
                 {
                     continue;
                 }
                 var value = $(this).find('[data-name='+name+']').text();

                 $("#submitActivityForm [name="+name+"]").val(value);
             }
             
             $("#submitActivityModal").modal({backdrop:"static"}).modal('show');
         });
}

function sendBtn(id)
{
     $("#" + id).each(function() {
             var form = $("#sendActivityForm").serializeArray();
             for(var i=0;i<form.length;i++){
                 var name = form[i].name;
                 if(name ==null ||name =="")
                 {
                     continue;
                 }
                 var value = $(this).find('[data-name='+name+']').text();

                 $("#sendActivityForm [name="+name+"]").val(value);
             }
             
            $("#sendActivityModal").modal({backdrop:"static"}).modal('show');
    });
}
function alertSendBtn( id){
       $("#" + id).each(function() {
             var form = $("#sendAlertActivityForm").serializeArray();
             for(var i=0;i<form.length;i++){
                 var name = form[i].name;
                 if(name ==null ||name =="")
                 {
                     continue;
                 }
                 var value = $(this).find('[data-name='+name+']').text();

                 $("#sendAlertActivityForm [name="+name+"]").val(value);
             }
             
             $("#sendAlertActivityModal").modal({backdrop:"static"}).modal('show');
         });
} 
    
function alertBtn(id)
{
    //添加的公告的修改
   $("#" + id).each(function() {
             var form = $("#saveActiveForm").serializeArray();
             for(var i=0;i<form.length;i++){
                 var name = form[i].name;
                 if(name ==null ||name =="")
                 {
                     continue;
                 }
                 var value = $(this).find('[data-name='+name+']').text();

                 $("#saveActiveForm [name="+name+"]").val(value);
             }
             
             $("#addloginNoticeModal").modal({backdrop:"static"}).modal('show');
         });
}