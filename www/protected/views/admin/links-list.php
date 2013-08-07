<div id="colTwo">
<div class="bg2">
	<div class="title"> 添加友情链接 </div>
	<form action="<?=$url?>" method="post" id="form">
		<table cellpadding="0" cellspacing="0" width="100%">
			<tr>
				<td>名称：<input type="text" id="name" name="name"></td>
				<td>链接：<input type="text" id="href" name="href"></td>
				<td><input type="submit" value="添加" onclick="return checkIsNull();"><input type="hidden" name="act" value="add"></td>
			</tr>
		</table>
	</form>
	<div class="title">友情链接列表</div>
	<table cellpadding="0" cellspacing="0" width="100%">
		<tr>
			<th width="65">ID</th>
			<th width="">链接名称</th>
			<th width="">链接地址</th>
			<th width="100">操作</th>
		</tr>
		<?php
			foreach($links_list as $key=>$val){
				?>
				<tr>
					<td><?=$val['id']?></td>
					<td><span onclick="javascript:listTable.edit(this, 'edit_name',<?=$val['id']?>)" title="点击我编辑"><?=$val['name']?></span></td>
					<td><span onclick="javascript:listTable.edit(this, 'edit_href',<?=$val['id']?>)" title="点击我编辑"><?=$val['href']?></span></td>
					<td><input type="button" value="删除" onclick='del(<?=$val['id']?>)'></td>
				</tr>
		<?php	}?>
	</table>
</div>
</div>
<script type="text/javascript" language="javascript">
	function del(id){
		y=confirm("确认删除该链接?");
		if(y==true){
			window.location="LinksList?act=del&id="+id;
		}
	}
	function checkIsNull(){
		var s1=$('#name').val();
		var s2=$('#href').val();
		if(s1==""){alert("名字不能为空!"); return false; }
		if(!/^([^\.\s]+\.[^\.\s]+)+$/.test(s2)){alert('请输入正确网址');return;};
	}
</script>