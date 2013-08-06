<script type="text/javascript" language="javascript">
	function checkIsNull(){
		var obj_name = document.getElementById("name");
		if(obj_name.value==""){
			alert("类别名字不能为空!");
			return false;
		}
	}


</script>

<div id="colTwo">
<div class="bg2">
	<div class="title">
		新增新闻类别 
	</div>
	
<form action="<?=$url?>" method="post">
	<table cellpadding="0" cellspacing="0" width="320px">
		<tr>
			<th width="70px">类别名称</th>
			<td><input type="text" name="name" id="name" size="30" style="height:17px;"/></td>
		</tr>
		<tr>
			<td colspan="2">
				&nbsp;&nbsp;&nbsp;&nbsp;
				<input type="submit" value="增加" onclick="return checkIsNull();"/>
				<input type="button" value="返回" onclick="history.go(-1);" />
				<input type="hidden" name="act"  value="<?=$act?>" />
			</td>
		</tr>
	</table>
	
</form>	
</div>
</div>