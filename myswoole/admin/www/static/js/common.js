/*
 *  
 */

$(function() {

    $("#loginForm").submit(function() {
        var param = $("#loginForm").serialize();
        $.ajax({
            type: 'post',
            url: '/user/userLogin',
            data: param,
            dataType: 'json',
            success: function(result) {
                if (result.errcode == 0) {
                    location.href = '/';
                } else {
                    alert(result.msg);
                    return false;
                }
            }
        });
        return false;

    });

    //注册
    $("#regButton").click(function() {
        var param = $("#regForm").serialize();
        $.ajax({
            type: 'post',
            url: '/user/userRegister',
            data: param,
            dataType: 'json',
            success: function(result) {
                if (result.errcode == 0) {
                    alert(result.msg);
                    location.href = '/';
                } else {
                    alert(result.msg);
                }
            }
        });
        return false;
    });

    //时间插件
    if ($(".datetimepicker").length > 0) {
        $(".datetimepicker").datetimepicker({
            format: 'yyyy-mm-dd hh:ii:ss',
            minuteStep: 1,
            todayBtn: true,
            language: 'zh_cn',
            autoclose: true
        });
    }

    //菜单点击

//     $("#sidebar li").each(function() {
//     var _this = $(this);
//     _this.click(function() {
//     $("#nav-left li").removeClass('active');
//     _this.addClass('active');
//     var postion = _this.attr('data-postion');
//     //种cookie
//     setCookie('postion',postion);
//     window.location.href = window.location.href;
//     });
//     });
     

});

//写cookies

function setCookie(name, value)
{
    var Days = 30;
    var exp = new Date();
    exp.setTime(exp.getTime() + Days * 24 * 60 * 60 * 1000);
    document.cookie = name + "=" + escape(value) + ";expires=" + exp.toGMTString() + ";path=/";
    ;

    /*
     var strsec = getsec(time);
     var exp = new Date();
     exp.setTime(exp.getTime() + strsec * 1);
     document.cookie = name + "=" + escape(value) + ";expires=" + exp.toGMTString();
     */
}

//读取cookies
function getCookie(name)
{
    var arr, reg = new RegExp("(^| )" + name + "=([^;]*)(;|$)");

    if (arr = document.cookie.match(reg))
        return (arr[2]);
    else
        return null;
}

//删除cookies
function delCookie(name)
{
    var exp = new Date();
    exp.setTime(exp.getTime() - 1);
    var cval = getCookie(name);
    if (cval != null)
        document.cookie = name + "=" + cval + ";expires=" + exp.toGMTString();
}

function checkServerForm(obj) {
        var server = $(obj).find('select[name=server]').val();
        
        if(server == 0||server === '' || server === 'undefined' || server === null  ){
            alert("请选择区服！");
            return false;
        }
        var select = $(obj).find('select[name=select]').val();
        if(select === '' || select === null){
            alert("请选择查询条件！");
            return false;
        }
        
        var value = $(obj).find('input[name=value]').val();
        if(value === '' || value === null){
            alert("请添加查询值！");
            return false;
        }
        //$(obj).attr('action',location.href).submit();
        //return false;
    }
//账号挂载
function AccountFormVerify(obj) { 
 
	var type = $(obj).find('select[name=type]').val();//
	
	if(type == 0 || type === null){
        alert("请选择设置条件类型！");
        return false;
    } 

    var accountname = $(obj).find('input[name=accountname]').val();//   
    if(accountname === '' || accountname === null){
        alert("请输入账号！");
        return false;
    }
    
    var accounttype = $(obj).find('select[name=accounttype]').val();//
    if(accounttype === '' || accounttype === null){
        alert("请输入账号类型！");
        return false;
    } 
    var type = $(obj).find('select[name=type]').val();// 
    var replaceuin  = $(obj).find('input[name=replaceuin]').val();
    if(type === "1"){
    	if(replaceuin ==='' || replaceuin ===null ){
  		  alert('替换账号UIN不能为空');
  		  return false;
  	 }
    	 
    }
    var replacetype = $(obj).find('select[name=replacetype]').val();    
    if(type === "2"){ 
    	 if(replacetype ==='' || replacetype ===  null ){
    		  alert('替换账号类型不能为空');
    		  return false;
    	 }
    } 
}
//日常统计
 function StatdataPutVerify(obj)
 {   
	var servertype = $(obj).find('select[name=type]').val();//	 
	if( servertype == 0 || servertype === null ){
		    alert("请选择平台类型！");
		    return false;
	}
	var type = $(obj).find('select[name=servertype]').val();//	 
	if( type == 0 || type === null ){
	        alert("请选择查询区间！");
	        return false;
	}
	var regionid = $(obj).find('input[name=regionid]').val();//   
	if( regionid === '' || regionid === null ){
	        alert("请输入区服！");
	        return false;
	}	    
	if( type == 2 )
	{	
		var startTime = $(obj).find('input[name=startTime]').val();//   
	    if( startTime === '' || startTime === null ){
	        alert("请输入开始时间！");
	        return false;
	    }
	    var endtime = $(obj).find('input[name=endtime]').val();// 
	    if( endtime === '' || endtime === null )
	    {
	        alert("请输入截止时间！");
	        return false;
	    }		
	}  
}
 //充值比例
function statdataVerify(obj)
{   
	var type = $(obj).find('select[id=type]').val();//	 
	if(type == 0 || type === null){
	        alert("请选择服务器类型！");
	        return false;
	}
	/*var regionid = $(obj).find('textarea[name=regionid]').val();//   
    if(regionid === '' || regionid === null){
        	alert("请输入区服编号！");
        	return false;
    }*/
    var startTime = $(obj).find('input[name=startTime]').val();//   
    if(startTime === '' || startTime === null){
        alert("请输入开始时间！");
        return false;
    }
    var endtime = $(obj).find('input[name=endtime]').val();// 
    if(endtime === '' || endtime === null)
    {
        alert("请输入截止时间！");
        return false;
    }	
    
}
// 等级滞留
function statGradeRemainVerify(obj)
{
	var type = $(obj).find('select[id=type]').val();//	 
	if(type == 0 || type === null){
	        alert("请选择服务器类型！");
	        return false;
	}
	var regionid = $(obj).find('input[name=regionid]').val();//   
    if(regionid === '' || regionid === null){
        	alert("请输入区服编号！");
        	return false;
    }
    var remainnterval = $(obj).find('input[name=remainnterval]').val();//   
    if(remainnterval === '' || remainnterval === null){
        alert("请输入滞留条件！");
        return false;
    } 
   /* var startTime = $(obj).find('input[name=startTime]').val();//   
    if(startTime === '' || startTime === null){
        alert("请输入开始时间！");
        return false;
    }
    var endtime = $(obj).find('input[name=endtime]').val();// 
    if(endtime === '' || endtime === null)
    {
        alert("请输入截止时间！");
        return false;
    }
    var statInterval = $(obj).find('input[name=statInterval]').val();//   
    if(statInterval === '' || statInterval === null){
        alert("请输入统计时间！");
        return false;
    }*/
	
}
 
//货币滞留
function statMoneryRemainVerify(obj)
{
	var type = $(obj).find('select[id=type]').val();//	 
	if(type == 0 || type === null){
	        alert("请选择服务器类型！");
	        return false;
	}
	var regionid = $(obj).find('input[name=regionid]').val();//   
    if(regionid === '' || regionid === null){
        	alert("请输入区服编号！");
        	return false;
    }
    var remainnterval = $(obj).find('input[name=remainnterval]').val();//   
    if(remainnterval === '' || remainnterval === null){
        alert("请输入滞留条件！");
        return false;
    }  
}
// 登录流水
function statloginInfoVerify(obj)
{
	var type = $(obj).find('select[id=type]').val();//	 
	if(type == 0 || type === null){
	        alert("请选择服务器类型！");
	        return false;
	}
	var regionid = $(obj).find('input[name=regionid]').val();//   
    if(regionid === '' || regionid === null){
        	alert("请输入区服编号！");
        	return false;
    }
    var startTime = $(obj).find('input[name=startTime]').val();//   
    if(startTime === '' || startTime === null){
        alert("请输入开始时间！");
        return false;
    }
    var endtime = $(obj).find('input[name=endtime]').val();// 
    if(endtime === '' || endtime === null)
    {
        alert("请输入截止时间！");
        return false;
    }
}
//货币消耗
function statmoneyDataVerify(obj)
{
	var type = $(obj).find('select[id=type]').val();//	 
	if(type == 0 || type === null){
	        alert("请选择服务器类型！");
	        return false;
	}
	var regionid = $(obj).find('input[name=regionid]').val();//   
    if(regionid === '' || regionid === null){
        	alert("请输入区服编号！");
        	return false;
    } 
  
	var remainType = $(obj).find('select[name=remainType]').val();//	 
	if(remainType == 0 || remainType === null)
	{
	        alert("请选择消耗类型！");
	        return false;
	} 	
    var startTime = $(obj).find('input[name=startTime]').val();//   
    if(startTime === '' || startTime === null){
        alert("请输入开始时间！");
        return false;
    }
    var endtime = $(obj).find('input[name=endTime]').val();// 
    if(endtime === '' || endtime === null)
    {
        alert("请输入截止时间！");
        return false;
    }
    var exctype = $(obj).find('select[name=exctype]').val();//	 
	if(exctype == 0 || exctype === null){
	        alert("请选择流水类型！");
	        return false;
	} 
	
}
//留存
function statretainedDataVerify(obj){
	
	var type = $(obj).find('select[id=type]').val();//	 
	if(type == 0 || type === null){
	        alert("请选择服务器类型！");
	        return false;
	} 
	var space = $(obj).find('input[name=space]').val();//   
    if(space === '' || space === null){
        	alert("请输入留存区间！");
        	return false;
    }   	
    var startTime = $(obj).find('input[name=startTime]').val();//   
    if(startTime === '' || startTime === null){
        alert("请输入开始时间！");
        return false;
    }
    var endtime = $(obj).find('input[name=endtime]').val();// 
    if(endtime === '' || endtime === null)
    {
        alert("请输入截止时间！");
        return false;
    } 
}

