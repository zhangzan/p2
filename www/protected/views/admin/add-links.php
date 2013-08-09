<div id="colTwo">
	<div class="bg2">
		<table cellpadding="0" cellspacing="0" width="100%">
				<tr>
					<td>名称：<input type="text" id="name"></td>
					<td>链接：<input type="text" id="href"></td>
					<td><input type="button" value="添加" id="add_links"></td>
				</tr>
		</table>
	</div>
</div>
<script type="text/javascript">
	$("#add_links").click(function(){
		var name = $.trim($('#name').val());
		var href = $.trim($('#href').val());
		if(name==""){alert("名字不能为空!"); return false; }
		if(!/^([^\.\s]+\.[^\.\s]+)+$/.test(href)){alert('请输入正确网址');return;};
		
		kajax("AjaxAdmin","AddLinks",{name:name,href:href},function(obj){
							location.href=get_url("Admin","Linkslist");
		},this);
	});
</script>