<script type="text/javascript" language="javascript">
$(document).ready(function(){
	
});
</script>

<div id="colTwo">
<div class="bg2">
	<div class="title"></div>
	<form action="<?php echo $this->url('Admin', 'DoUploadColor');?>" method="post" enctype="multipart/form-data">
	<table cellpadding="0" cellspacing="0" width="100%">
		<tr>
			<th width="85px">颜色</th>
			<td>
				<input type="text" name="color" value="<?php echo $color?$color['color']:''; ?>" />
				<font color="red"><b>*</b></font>
			</td>
		</tr>
		<tr>
			<th width="85px">色块图</th>
			<td>
				<input type="file" name="file" id="file" style="height:20px;" />
				<font color="red"><b>*(格式: .png 大小: 40px x 40px )</b></font>
			</td>
		</tr>
		<tr>
			<td colspan="2">
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<input id="btn_submit" type="submit" value="提交" />
			</td>
		</tr>
	</table>
	</form>
</div>
</div>