<script type="text/javascript">
	function print_page(){
		var html='<table style="margin-bottom:5px;">';
		html+='	<tr>';
		html+='		<td>名称：<input type="text" id="name" name="name"></td>';
		html+='		<td>链接：<input type="text" id="href" name="href"></td>';
		html+='		<td class="ac"><input type="submit" value="添加" class="btn_green" id="add_links"></td>';
		html+='	</tr>';
		html+='</table>';
		html+='<table id="table">';
		html+='</table>';
		document.write(html);
		table();
	}
	function table(){
		var html="<tr>";
		html+='		<th width="15%">ID</th>';
		html+='		<th width="35%">链接名称</th>';
		html+='		<th width="35%">链接地址</th>';
		html+='		<th width="15%">操作</th>';
		html+='	</tr>';
		$.each(user_list	, function(k,v){
			html+='<tr>';
			html+=	'<td class="ac">'+v.id+'</td>';
			html+=	'<td onclick="javascript:listTable.edit(this, \'edit_name\','+v.id+')" title="点击我编辑" class="td_input">'+v.name+'</td>';
			html+=	'<td onclick="javascript:listTable.edit(this, \'edit_href\','+v.id+')" title="点击我编辑" class="td_input">'+v.password+'</td>';
			html+=	'<td class="ac"><input type="button" value="删除" class="btn_red" onclick="del('+v.id+')"></td>';
			html+='</tr>';
		})
		$("#table").html(html);
	}
</script>
<script type="text/javascript">
	var user_list=<?php echo json_encode($user_list);?>;
	print_page();
	$("#add_links").click(function(){
		var name = $.trim($('#name').val());
		var href = $.trim($('#href').val());
		if(name==""){alert("名字不能为空!"); return false; }
		if(!/^([^\.\s]+\.[^\.\s]+)+$/.test(href)){alert('请输入正确网址');return;};
		
		kajax("AjaxAdmin","LinksList",{name:name,href:href},function(obj){
					user_list=obj.user_list;
					table();
		},this);
	});
	function del(id){
		y=confirm("确认删除该链接?");
		if(y==true){window.location="LinksList?act=del&id="+id;}
	}
</script>