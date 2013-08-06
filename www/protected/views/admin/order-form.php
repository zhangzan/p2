<div id="colTwo">
<div class="bg2">
	<div class="title">预约试驾详情</div>
	<form method="post" action="<?=$url?>" enctype="multipart/form-data">
	<table cellpadding="0" cellspacing="0" width="100%">
		<tr>
			<th width="150px">姓名</th>
			<td>&nbsp;&nbsp;<?=$order_info['name']?></td>
		</tr>
		<tr>
			<th>预约车型</th>
			<td>&nbsp;&nbsp;<?=$robot[$order_info['type']]?></td>
		</tr>
		<tr>
			<th>性别</th>
			<td>&nbsp;&nbsp;<?=$sex[$order_info['sex']]?></td>
		</tr>
		<tr>
			<th>手机</th>
			<td>&nbsp;&nbsp;<?php if(empty($order_info['mobile'])){echo "无";}else{echo $order_info['mobile'];}?></td>
		</tr>
		<tr>
			<th>邮箱</th>
			<td>&nbsp;&nbsp;<?=$order_info['email']?></td>
		</tr>
		<tr>
			<th>预约城市</th>
			<td>&nbsp;&nbsp;<?php echo $order_info['province']."--".$order_info['city'];?></td>
		</tr>
		<tr>
			<th valign="top">提交时间</th>
			<td>&nbsp;&nbsp;<?=$order_info['update_time']?></td>
		</tr>
		<tr>
			<th valign="top">状态</th>
			<td>
	            <input type="radio" name="status" value="1" <?php if($order_info['status']==1){echo 'checked="checked"';}?> /><?=$status_type[1]?>&nbsp;&nbsp;&nbsp;
	            <input type="radio" name="status" value="2" <?php if($order_info['status']==2){echo 'checked="checked"';}?> /><?=$status_type[2]?>&nbsp;&nbsp;&nbsp;
	            <input type="radio" name="status" value="3" <?php if($order_info['status']==3){echo 'checked="checked"';}?> /><?=$status_type[3]?>
			</td>
		</tr>
		<tr>
			<td colspan="2">
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<input type="submit" value="确认"  name="submit"/>
				<input type="button" value="返回" onclick="history.go(-1);"  name="reset"/>
				<input type="hidden" value="<?=$order_info['id']?>" name="order_id" />
			</td>
		</tr>
	</table>
	</form>
</div>
</div>