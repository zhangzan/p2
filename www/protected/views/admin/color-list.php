<script type="text/javascript" language="javascript">

</script>
<div id="colTwo">
<div class="bg2">
	<div class="title">
		颜色列表
	</div>
	<div><a href="<?php echo $this->url("Admin", "AddColor"); ?>" style="font-size:15px;color:blue;">添加</a></div>
	<table cellpadding="0" cellspacing="0" width="100%">
		<tr>
			<th width="">颜色</th>
			<th>色块图</th>
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
						<img src="<?php echo $this->url('upload/color/'.$val['id'].'.png');?>" />
					</td>
					<td align='center'>
						<a href='<?php echo $this->url("Admin","AddColor", array('id'=>$val['id']));?>'>重新上传</a>
					</td>
				</tr>

		<?php	}

		?>
	</table>
</div>
</div>