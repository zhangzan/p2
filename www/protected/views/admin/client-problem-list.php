<script type="text/javascript" language="javascript">
	function del(id){
		y=confirm("确认删除该条记录么?");
		if(y==true){
			window.location="ProblemManage?act=del&id="+id;
		}
	}

</script>
<div id="colTwo">
<div class="bg2">
	<div class="title">
		常见问题列表
	</div>


	<table cellpadding="0" cellspacing="0" width="100%">
		<tr>
			<th width="65px">问题编号</th>
			<th width="">提问内容</th>
			<th width="">回复内容</th>
			<th width="">是否显示</th>
			<th width="">提问时间</th>
			<th width="">回复时间</th>
			<th width="">操作</th>
		</tr>
		<?php
			foreach($problem_list as $key=>$val){
				
				?>
				<tr>
					<td align='center'>
						<input type='checkbox' name='id[]' value='<?=$val['id']?>'/><?=$val['id']?>
					</td>

					<td align='center'>
						<span><?=$val['question']?></span>
					</td>

					<td align='center'>
						<?php if(empty($val['answer'])){echo "无";}elseif(!empty($val['answer'])){echo $val['answer'];}?>
					</td>
					<td align='center'>
						<?php
							if(!empty($val['answer'])){
								if($val['status']==1){
									echo "<img src=".$this->url("img/no.gif")."/>";
								}elseif($val['status']==2){
									echo "<img src=".$this->url("img/yes.gif")."/>";
								}
							}else{
								echo "请先回复";
							}
						?>
					</td>
					<td align='center'><?=$val['update_time']?></td>
					<td align='center'><?php if($val['revert_time']=="0000-00-00 00:00:00"){echo "无";}else{echo $val['revert_time'];} ?></td>
					<td align='center'>
						<a href='ProblemManage?act=edit&id=<?=$val['id']?>'><?php if(empty($val['answer'])){echo "回复";}else{echo "编辑";}?></a>
						&nbsp;&nbsp;&nbsp;&nbsp;
						<a href='#' onclick='del(<?=$val['id']?>)'>删除</a>
					</td>
				</tr>

		<?php	}

		?>
	</table>
</div>
</div>