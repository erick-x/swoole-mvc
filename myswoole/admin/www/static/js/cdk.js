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
            url:'/cdk/getServer',
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
    
    $("#cdkBtn").click(function()
    {
        var param = $("#CDKForm").serializeArray();
        $.ajax({
            type:'POST',
            url:'/cdk/getCdk',
            data:param,
            dataType:'json',
            success:function(result){
               
                if(result.errcode == 0){
                    cdktable(result.msg);
                }else
                {
                    alert(result.msg);
                    window.location.href = window.location.href;
                }
            },
            beforeSend: function(){
                $("#cdkBtn").addClass("disabled");
            }
        });
    });
    
    function cdktable(data)
    {
        document.getElementById("show").innerHTML= "" 
            var r = document.createElement('tr');
            var c = document.createElement('td');
            c.setAttribute("style","text-align: center;");
            var e = document.createTextNode(data.starttime);
            var c1 = document.createElement('td');
            c1.setAttribute("style","text-align: center;");
            var e1 = document.createTextNode(data.endtime);
            var c2 = document.createElement('td');
            c2.setAttribute("style","text-align: center;");
            var e2 = document.createTextNode(data.keyword);
            var c3 = document.createElement('td');
            c3.setAttribute("style","text-align: center;");
            if(data.keystat === 1)
            {
                 var e3 = document.createTextNode('已使用');
            }else
            {
                 var e3 = document.createTextNode("未使用");
            }
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

