// JavaScript Document 验证脚本

var Browser = new Object();

Browser.isMozilla = (typeof document.implementation != 'undefined') && (typeof document.implementation.createDocument != 'undefined') && (typeof HTMLDocument != 'undefined');
Browser.isIE = window.ActiveXObject ? true : false;
Browser.isFirefox = (navigator.userAgent.toLowerCase().indexOf("firefox") != - 1);
Browser.isSafari = (navigator.userAgent.toLowerCase().indexOf("safari") != - 1);
Browser.isOpera = (navigator.userAgent.toLowerCase().indexOf("opera") != - 1);

var Utils = new Object();

//html编码
Utils.htmlEncode = function(text){
	return text.replace(/&/g, '&amp;').replace(/"/g, '&quot;').replace(/</g, '&lt;').replace(/>/g, '&gt;');
}

//去掉前后空格
Utils.trim = function( text ){
	if (typeof(text) == "string"){
		return text.replace(/^\s*|\s*$/g, "");
	}else{
		return text;
	}
}

//判断是否为空
Utils.isEmpty = function( val ){
  switch (typeof(val)){
    case 'string':
      return Utils.trim(val).length == 0 ? true : false;
      break;
    case 'number':
      return val == 0;
      break;
    case 'object':
      return val == null;
      break;
    case 'array':
      return val.length == 0;
      break;
    default:
      return true;
  }
}

//判断复选框最少选一项
Utils.isSelectOne = function( inputname ){
	var getlength = document.getElementsByName(inputname); 
	var flag=0;
	for(i=0;i<getlength.length;i++){
		if(getlength[i].checked==true){
			flag=1;
			break;
		}
	}
	if(flag == 0){
		alert( "必须选择最少一项！\n");    
		return false;
	}
	return true;
}

//数字验证
Utils.isNumber = function(val){
	var reg = /^[\d|\.|,]+$/;
	return reg.test(val);
}

//判断是否以为数字开头
Utils.isNumber1 = function( val ){
	var reg = /^\d.*$/;
	return reg.test(val);
}

//判断用户名格式
Utils.isName = function( val ){
	var reg = /^[a-zA-Z0-9\-\_\.\@]{6,18}$/;
	return reg.test(val);
}

//判断密码格式
Utils.isPass = function( val ){
	if(val.length<6 || val.length>50){
		return true;
	}else{
		return false;
	}
}

//整型验证
Utils.isInt = function(val){
	if (val == ""){
		return false;
	}
	var reg = /\D+/;
	return !reg.test(val);
}

//判断手机号码是否正确
Utils.isMibile = function(val){
	//var myReg = /^1[3,4,5,8]\d{9}$/g;
	var field13=/^13\d{9}$/g; 
	var field14=/^147\d{8}$/g;
	var field15=/^15[0-9]\d{8}$/g; 
	var field18=/^18[0,2,3,5,6,7,8,9]\d{8}$/g; 
	if((field13.exec(val))||(field15.exec(val))||(field18.exec(val))||(field14.exec(val))){
		return true; 
	}else{
		return false; 
	}
} 

//判断邮箱地址是否正确
Utils.isEmail = function( email ){
	email = email.toLowerCase();
	//var reg1 = /^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]+$/;		
	var reg1 = /([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)/;
	return reg1.test( email );
}

//判断电话是否正确
Utils.isTel = function ( tel ){
	var reg = /^(([0\+]\d{2,3}-)?(0\d{2,3})-)(\d{7,8})(-(\d{4,}))?$/;		
	//var reg = /^[\d|\-|\s|\_]+$/; //只允许使用数字-空格等
	return reg.test( tel );
}

//生日格式判断
Utils.isBirthday = function ( birthday ){
	var reg1 = /^[12][0-9]{3}\-[0-9]{1,2}\-[0-9]{1,2}$/;
	return reg1.test( birthday );
}

//事件
Utils.fixEvent = function(e){
	var evt = (typeof e == "undefined") ? window.event : e;
	return evt;
}

//元素
Utils.srcElement = function(e){
	if (typeof e == "undefined") e = window.event;
	var src = document.all ? e.srcElement : e.target;
	return src;
}

//时间格式验证
Utils.isTime = function(val){
  var reg = /^\d{4}-\d{2}-\d{2}\s\d{2}:\d{2}$/;
  return reg.test(val);
}

//当前鼠标X坐标
Utils.x = function(e){
    return Browser.isIE?event.x + document.documentElement.scrollLeft - 2:e.pageX;
}

//当前鼠标Y坐标
Utils.y = function(e){
    return Browser.isIE?event.y + document.documentElement.scrollTop - 2:e.pageY;
}

//请求合法验证
Utils.request = function(url, item){
	var sValue=url.match(new RegExp("[\?\&]"+item+"=([^\&]*)(\&?)","i"));
	return sValue?sValue[1]:sValue;
}


//获取对像
Utils.$ = function(id){
    return document.getElementById(id);
}