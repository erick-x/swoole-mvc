
function getserver(id)
{
   $("#" + id).each(function() {     
            var  value= $(this).find('[data-name=sid]').text();
            var  server = new Array();
            server = value.split(","); 
            var b = "";
                for(var i =0; i <server.length; i++)
                {
                    var r = document.createElement('tr');
             
                    if(server[i] !=="" && server[i] !==0&& server[i] !== undefined)
                    {
                        b += server[i] +'服-|';
                    }
                } 
                alert(b);
           $("#qufu".id).popover({title: '区服', content: b});
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
  $(function() {   
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
                        }
                    });
            }
        
    });
});