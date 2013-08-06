<script type="text/javascript" language="javascript">

</script>
<div id="colTwo">
<div class="bg2">
	<div class="title">
		产品列表
	</div>


	<table cellpadding="0" cellspacing="0" width="100%">
		<tr>
			<th width="">产品名</th>
			<th width="">操作</th>
		</tr>
		<?php
			foreach($list as $val){
				?>
				<tr>
					<td align='center'>
						<?php echo $val['name'];?>
					</td>
					<td align='center'>
						<a href='<?php echo $this->url("Admin","EditProductInfo", array('id'=>$val['id']));?>'>编辑</a>
					</td>
				</tr>

		<?php	}

		?>
	</table>
</div>
</div>