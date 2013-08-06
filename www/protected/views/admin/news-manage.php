<script type="text/javascript" language="javascript">
	function del(id){
		y=confirm("确认删除该文章么?");
		if(y==true){
			window.location="NewsManage?act=del&id="+id;
		}
	}

</script>
<div id="colTwo">
<div class="bg2">
	<div class="title">
		新闻列表
	</div>


	<table cellpadding="0" cellspacing="0" width="100%">
		<tr>
			<th width="65px">文章编号</th>
			<th width="">文章标题</th>
			<th width="">所属分类</th>
			<th width="">是否显示</th>
			<th width="">更新时间</th>
			<th width="">操作</th>
		</tr>
		<?php
			foreach($news_list as $key=>$val){
				?>
				<tr>
					<td align='center'>
						<input type='checkbox' name='id[]' value='<?=$val['id']?>'/><?=$val['id']?></td>
					<td align='center'>
						<span onclick="javascript:listTable.edit(this, 'edit_title',<?=$val['id']?>)"><?=$val['title']?></span>
					</td>
					<td align='center'><?=$val['type']?></td>
					<td align='center'><?php if($val['status']==1){echo "显示";}elseif($val['status']==2){echo "不显示";}?></td>
					<td align='center'><?=$val['update_time']?></td>
					<td align='center'>
						<a href='EditNews?id=<?=$val['id']?>'>编辑</a>&nbsp;&nbsp;&nbsp;&nbsp;
						<a href='#' onclick='del(<?=$val['id']?>)'>删除</a>
					</td>
				</tr>

		<?php	}

		?>
	</table>
</div>
</div>