<script type="text/javascript" language="javascript">
	function del(id){
		y=confirm("确认删除该类别么?");
		if(y==true){
			window.location='NewsClassList?act=del&id='+id;
		}
	}

</script>
<div id="colTwo">
<div class="bg2">
	<div class="title">
		新闻类别管理
		<div style="float:right">
			<a href="AddNewsClass"><font color="red">新增类别</font></a>
		</div>
	</div>


	<table cellpadding="0" cellspacing="0" width="100%">
		<tr>
			<th width="65px">类别编号</th>
			<th width="">类别名称</th>
			<th width="">添加时间</th>
			<th width="">操作</th>
		</tr>
		<?php
			foreach($classArr as $key=>$val){
				?>
				<tr>
					<td align='center'>
						<input type='checkbox' name='id[]' value='<?=$val['id']?>'/><?=$val['id']?></td>
					<td align='center'>
						<span onClick="listTable.edit(this,'edit_name','<?=$val['id']?>')"><?=$val['name']?></span>
					</td>
					<td align='center'><?=$val['add_time']?></td>
					<td align='center'>
						<a href='#' onclick='del(<?=$val['id']?>)'>删除</a>
					</td>
				</tr>

		<?php	}

		?>
	</table>
</div>
</div>