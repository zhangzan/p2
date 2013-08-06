<div id="colTwo">
<div class="bg2">
	<div class="title">
		预约试驾列表
	</div>


	<table cellpadding="0" cellspacing="0" width="100%">
		<tr>
			<th width="32px">编号</th>
			<th width="80px">姓名</th>
			<th width="40px">性别</th>
			<th width="100px">手机</th>
			<th width="160px">试驾车型</th>
			<th width="160px">试驾城市</th>
			<th width="">状态</th>
			<th width="60px">操作</th>
		</tr>
		<?php
			foreach($order_list as $key=>$val){
				?>
				<tr>
					<td align='center'><?=$val['id']?></td>
					<td align='center'><?=$val['name']?></td>
					<td align='center'><?php if($val['sex']==0){echo "男";}elseif($val['sex']==1){echo "女";}?></td>
					<td align='center'><?=$val['mobile']?></td>
					<td align='center'><?=$val?></td>
					<td align='center'><?php echo $val['province']."--".$val['city'];?></td>
					<td align='center'><?=$status[$val['status']]?></td>
					<td align='center'><a href='OrderInfo?id=<?=$val['id']?>'>详细</a></td>
				</tr>

		<?php	}

		?>
	</table>
</div>
</div>