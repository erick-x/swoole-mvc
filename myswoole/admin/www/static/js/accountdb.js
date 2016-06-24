/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(function() {  
    $("#selPlatform").change(function()
    {
       var PlatformId = $("#selPlatform").val();
       $.ajax({
            type:'POST',
            url:'/lookdata/getServer',
            data:"Selplatform="+PlatformId,
            dataType:'json',
            success:function(result){
                if(result.errcode == 0){
                    loadServer(result.msg);
                }
            },
            beforeSend: function(){
                $("#selPlatform").addClass("disabled");
            }
        });
    });
    
    function loadServer(data)
    {
        $("#selServer").find("option").remove();
        var htmlPage = '<option value="">请选择区服</option>';
        for(var i = 0; i< data.length;++i)
        {
           htmlPage += '<option value="'+ data[i]['sid']+'">'+data[i]['sname']+ '</option>';        
        }
        $("#selServer").html(htmlPage);
    }
    
    $("#accountBtn").click(function()
    {
        var param = $("#AccountForm").serializeArray();
        $.ajax({
            type:'POST',
            url:'/lookdata/getInfo',
            data:param,
            dataType:'json',
            success:function(result){
               
                if(result.errcode == 0){
                    accounttable(result.msg);
                }else
                {
                    alert(result.msg);
                }
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {
                        alert(textStatus);
                    },
            beforeSend: function(){
                $("#accountBtn").addClass("disabled");
            }
    });
    });
   function accounttable(data)
    {
            document.getElementById("show").innerHTML= "" ;
            var r = document.createElement('tr');
            var c = document.createElement('td');
            c.setAttribute("style","text-align: center;");
            var e = document.createTextNode(data.accountid);
            var c1 = document.createElement('td');
            c1.setAttribute("style","text-align: center;");
            var e1 = document.createTextNode(data.strname);
            var c2 = document.createElement('td');
            c2.setAttribute("style","text-align: center;");
            var e2 = document.createTextNode(data.roleid);
            var c3 = document.createElement('td');
            c3.setAttribute("style","text-align: center;");
            var e3 = document.createTextNode(data.level);

            c.appendChild(e);
            c1.appendChild(e1);
            c2.appendChild(e2);
            c3.appendChild(e3);
            r.appendChild(c);
            r.appendChild(c1);
            r.appendChild(c2);
            r.appendChild(c3);
                
            document.getElementById("show").appendChild(r);
    }
    
});

