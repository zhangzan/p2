<script type="text/javascript" language="javascript">
$(document).ready(function(){
	
});
</script>

<div id="colTwo">
<div class="bg2">
	<div class="title">添加</div>
	<form action="<?php echo $this->url('Admin', 'DoAddProductList');?>" method="post" enctype="multipart/form-data">
	<table cellpadding="0" cellspacing="0" width="100%">
		<tr>
			<th width="85px">类别</th>
			<td>
				<select name="type" id="type">
					<option value="1">i-robot-la</option>
					<option value="2">i-robot-sc</option>
					<option value="3">i-robot-bo</option>
					<option value="4">t-robot-o</option>
					<option value="5">t-robot-w</option>
					<option value="6">t-robot-s</option>
				</select>
				<font color="red"><b>*</b></font>
			</td>
		</tr>
		<tr>
			<th width="85px">文件</th>
			<td>
				<input type="file" name="file" id="file" style="height:20px;" />
				<font color="red"><b>*(.jpg,.png 大小:240*348)</b></font>
			</td>
		</tr>
		<tr>
			<th width="85px">标题</th>
			<td>
				<input type="text" name="title" id="title" style="height:20px;width:300px;" />
				<font color="red"><b>*</b></font>
			</td>
		</tr>
		<tr>
			<th width="85px" style="vertical-align:top;">描述</th>
			<td>
				<textarea name="text" id="text" style="height:100px;width:400px;"></textarea>
				<font color="red"><b>*</b></font>
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