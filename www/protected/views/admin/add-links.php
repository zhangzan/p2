<div id="colTwo">
<div class="bg2">
	<table cellpadding="0" cellspacing="0" width="100%">
			<tr>
				<td>名称：<input type="text" id="name"></td>
				<td>链接：<input type="text" id="href"></td>
				<td><input type="submit" value="添加" id="add"></td>
			</tr>
	</table>
</div>
</div>
<script type="text/javascript" language="javascript">
$("#add").click(function(){
	alert(1);
	var name = $.trim($("#name").val());
	var href = $.trim($("#href").val());
	if(name==""){
		alert("链接名 不能为空");
		$("#name").focus();
		return;
	}
	if(href==""){
		alert("链接 不能为空");
		$("#name").focus();
		return;
	}
	
	kajax("AjaxAdmin","AddLinks",{name:name,href:href, function(obj){
					if(obj.code==1){
						alert("添加成功。");console.log(1);
						window.location.href="<?php echo $this->url("Admin","LinksList");?>";
					}else{
						alert("添加失败。");
					}
	},this)};
});
</script>