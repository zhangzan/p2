//输入框修改
var listTable = new Object;
var url = location.href.lastIndexOf("?") == -1 ? location.href.substring((location.href.lastIndexOf("/")) + 1) : location.href.substring((location.href.lastIndexOf("/")) + 1, location.href.lastIndexOf("?"));

listTable.edit = function(obj, act,id)
{
  var tag = obj.firstChild.tagName;
  if (typeof(tag) != "undefined" && tag.toLowerCase() == "input")
  {
    return;
  }
  /* 保存原始的内容 */
  var org = obj.innerHTML;
  var val = Browser.isIE ? obj.innerText : obj.textContent;
  /* 创建一个输入框 */
  var txt = document.createElement("input");
  txt.value = (val == 'N/A') ? '' : val;
  txt.type = 'text';
  txt.style.width = (obj.offsetWidth) + "px" ;
  /* 隐藏对象中的内容，并将输入框加入到对象中 */
  obj.innerHTML = "";
  obj.appendChild(txt);
  txt.focus();
  /* 编辑区输入事件处理函数 */
  txt.onkeypress = function(e)
  {
    var evt = Utils.fixEvent(e);
    var obj = Utils.srcElement(e);
    if (evt.keyCode == 13)
    {
      obj.blur();
      return false;
    }
    if (evt.keyCode == 27)
    {
      obj.parentNode.innerHTML = org;
    }
  }
  /* 编辑区失去焦点的处理函数 */
  txt.onblur = function(e)
  {
    if (txt.value.length > 0 && txt.value != org)
    {
		$.ajax({
		   type: "POST",
		   //相对路径一定要正确
		   url: url,
		   data: "act="+act+"&val="+txt.value+"&id="+id,
		   beforeSend: function(){
			 ajax_message('正在保存...');
    	   },
		   success: function(msg){
			 alert(msg);
			 $.unblockUI();
		   }
		});
		obj.innerHTML = txt.value;
    }else{
      obj.innerHTML = org;
    }
  }
}




//推荐修改
var listcommend = new Object;
listcommend.edit = function(path, table, f_name, f_id, obj) {
	var value = obj.innerHTML;
	//alert(value);
	if(value.match("yes.gif")) {
		f_value	= 0;
	} else {
		f_value = 1;
	}
	$.ajax({
		   type: "POST",
		   //相对路径一点要正确
		   url: path+"/ajax/main_edit",
		   data: "table="+table+"&f_name="+f_name+"&f_value="+f_value+"&f_id="+f_id,
		   beforeSend: function(){
			 ajax_message('正在保存...');
    	   },
		   success: function(msg){
			 if(msg == 1) {
				if(f_value == 1) {
					obj.innerHTML = '<img src="/templates/admin/images/yes.gif" border="0">';
				}else{
					obj.innerHTML = '<img src="/templates/admin/images/no.gif" border="0">';
				}
			 }else{
				 //alert(msg);
			 	 alert('信息有误！');
			 }
			 $.unblockUI();
		   }
		});
}

//推荐修改
var listselect = new Object;
listselect.edit = function(path, table, f_name, f_id, obj) {
	var f_value = obj.value;
	//alert(f_value);

	$.ajax({
		   type: "POST",
		   //相对路径一点要正确
		   url: path+"/ajax/main_edit",
		   data: "table="+table+"&f_name="+f_name+"&f_value="+f_value+"&f_id="+f_id,
		   beforeSend: function(){
			 ajax_message('正在保存...');
    	   },
		   success: function(msg){
			 if(msg == 1) {
			 }else{
				 //alert(msg);
			 	 alert('信息有误！');
			 }
			 $.unblockUI();
		   }
		});
}


function ajax_message(msg){
	 $.blockUI({ message: msg,
		fadeIn: 200,
		fadeOut: 300,
		timeout: 2000,
		showOverlay: false,
		centerY: false,
		css: {
		  width: '110px',
			top: '45px',
			left: '',
			right: '100px',
			border: 'none',
			padding: '5px',
			backgroundColor: '#09F',
			'-webkit-border-radius': '10px',
			'-moz-border-radius': '10px',
			opacity: '.6',
			color: '#fff'
		}
	});
}

