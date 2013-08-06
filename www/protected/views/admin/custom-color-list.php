<script type="text/javascript" language="javascript">

</script>
<div id="colTwo">
<div class="bg2">
	<div class="title">
		颜色列表
	</div>
	<div><a href="<?php echo $this->url("Admin", "AddCustomColor"); ?>" style="font-size:15px;color:blue;">添加</a></div>
	<table cellpadding="0" cellspacing="0" width="100%">
		<?php $robot_map = array(1=>'i-robot-la',2=>'i-robot-sc',3=>'i-robot-bo',4=>'t-robot-w',5=>'t-robot-s'); ?>
		<tr>
			<th width="">颜色</th>
			<th>产品</th>
			<th>预览</th>
			<th width="">操作</th>
		</tr>
		<?php
			foreach($list as $val){
				?>
				<tr>
					<td align='center'>
						<?php echo $val['color'];?>
					</td>
					<td align='center'>
						<?php echo $robot_map[$val['car_id']];?>
					</td>
					<td align='center'>
						<img src="<?php echo $this->url('upload/custom_color/'.$val['car_id'].'_'.$val['color_id'].'.png');?>" style="max-height:80px;max-width:110px;" />
					</td>
					<td align='center'>
						<a href='<?php echo $this->url("Admin","AddCustomColor", array('car_id'=>$val['car_id'], 'color_id'=>$val['color_id']));?>'>重新上传</a>
					</td>
				</tr>

		<?php	}

		?>
	</table>
</div>
</div>