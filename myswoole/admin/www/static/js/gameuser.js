$(function(){
    $("#heroBtn").click(function(){
        if($("#HeroForm select[name=selectstatu]").val() == '' || $("#HeroForm select[name=selectstatu]").val() == 0){
            alert('请选择内容!');
            return false;
        }
        var param = $("#HeroForm").serializeArray();
        $.ajax({
            type:'POST',
            url:'/gameuser/doEditBase',
            data:param,
            dataType:'json',
            success:function(result){
                alert(result.msg);
                if(result.errcode == 0){
                    window.location.href = window.location.href;
                }
            },
            beforeSend: function(){
                $("#heroBtn").addClass("disabled");
            }
        });
    });

    $("#addpropBtn").click(function(){
        if($("#addPropForm input[name=propid]").val() == '' || $("#HeroForm input[name=propid]").val() == 0){
            alert('请输入道具ID!');
            return false;
        }
        var param = $("#addPropForm").serializeArray();
        $.ajax({
            type:'POST',
            url:'/gameuser/doEditItem',
            data:param,
            dataType:'json',
            success:function(result){
                alert(result.msg);
                if(result.errcode == 0){
                    window.location.href = window.location.href;
                }
            },
            beforeSend: function(){
                $("#addpropBtn").addClass("disabled");
            }
        });
    });
    
    $("#addequipBtn").click(function(){
        if($("#addEquipForm input[name=equipid]").val() == '' || $("#addEquipForm input[name=equipid]").val() == 0){
            alert('请输入装备ID!');
            return false;
        }
        var param = $("#addEquipForm").serializeArray();
        $.ajax({
            type:'POST',
            url:'/gameuser/doEditEquip',
            data:param,
            dataType:'json',
            success:function(result){
                alert(result.msg);
                if(result.errcode == 0){
                    window.location.href = window.location.href;
                }
            },
            beforeSend: function(){
                $("#addequipBtn").addClass("disabled");
            }
        });
    });
    
     $("#addheroBtn").click(function(){
        if($("#addHeroForm input[name=heroid]").val() == '' || $("#addHeroForm input[name=heroid]").val() == 0){
            alert('请输入英雄ID!');
            return false;
        }
        var param = $("#addHeroForm").serializeArray();
        $.ajax({
            type:'POST',
            url:'/gameuser/doEditHero',
            data:param,
            dataType:'json',
            success:function(result){
                alert(result.msg);
                if(result.errcode == 0){
                    window.location.href = window.location.href;
                }
            },
            beforeSend: function(){
                $("#addheroBtn").addClass("disabled");
            }
        });
    });

$("#delItemBtn").click(function(){
        if($("#delPropForm input[name=Thingid]").val() == '' || $("#delPropForm input[name=Thingid]").val() == 0){
            alert('请输入物品ID!');
            return false;
        }
        var param = $("#delPropForm").serializeArray();
        $.ajax({
            type:'POST',
            url:'/gameuser/doDelItem',
            data:param,
            dataType:'json',
            success:function(result){
                alert(result.msg);
                if(result.errcode == 0){
                    window.location.href = window.location.href;
                }
            },
            beforeSend: function(){
                $("#delItemBtn").addClass("disabled");
            }
        });
    });
    
    $("#corssBtn").click(function(){
        if($("#crossForm input[name=pinstanceid]").val() == '' || $("#crossForm input[name=pinstanceid]").val() == 0){
            alert('请输入副本ID!');
            return false;
        }
        if($("#crossForm input[name=corssid]").val() == '' || $("#crossForm input[name=corssid]").val() == 0){
            alert('请输入关卡ID!');
            return false;
        }
        var param = $("#crossForm").serializeArray();
        $.ajax({
            type:'POST',
            url:'/gameuser/doPassPinstance',
            data:param,
            dataType:'json',
            success:function(result){
                alert(result.msg);
                if(result.errcode == 0){
                    window.location.href = window.location.href;
                }
            },
            beforeSend: function(){
                $("#corssBtn").addClass("disabled");
            }
        });
    });
    
     $("#otherBtn").click(function(){
        if($("#otherWayForm input[name=otherWayid]").val() == '' || $("#otherWayForm input[name=otherWayid]").val() == 0){
            alert('请输入引导ID!');
            return false;
        }
        
        if($("#otherWayForm select[name=selectstatu]").val() == '' || $("#otherWayForm select[name=selectstatu]").val() == 0){
            alert('请选择内容!');
            return false;
        }
        var param = $("#otherWayForm").serializeArray();
        $.ajax({
            type:'POST',
            url:'/gameuser/doEditOther',
            data:param,
            dataType:'json',
            success:function(result){
                alert(result.msg);
                if(result.errcode == 0){
                    window.location.href = window.location.href;
                }
            },
            beforeSend: function(){
                $("#otherBtn").addClass("disabled");
            }
        });
    });

//跳过引导
    $("#otherWaybtn ").click(function() {
            $("#OtherWayModal").modal({backdrop:"static"}).modal('show');
    });
    
//删除物品
    $("#delThingbtn ").click(function() {
            $("#delThingmodal").modal({backdrop:"static"}).modal('show');
    });
    //编辑英雄
    $("#editHerobtn ").click(function() {
            $("#Heromodal").modal({backdrop:"static"}).modal('show');
    });
    //添加英雄
    $("#addHerobtn ").click(function() {
            $("#addHeromodal").modal({backdrop:"static"}).modal('show');
    });
    //添加道具
    $("#addPropbtn ").click(function() {
            $("#addPropmodal").modal({backdrop:"static"}).modal('show');
    });
    //添加装备
    $("#addEquipbtn ").click(function() {
            $("#addEquipmodal").modal({backdrop:"static"}).modal('show');
    });
    
    //通关副本
    $("#passPinstancebtn ").click(function() {
            $("#crossModal").modal({backdrop:"static"}).modal('show');
    });
});

