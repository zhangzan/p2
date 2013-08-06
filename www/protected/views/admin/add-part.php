<script type="text/javascript" language="javascript">
$(document).ready(function(){
	
});
</script>

<div id="colTwo">
<div class="bg2">
	<div class="title"></div>
	<form action="<?php echo $this->url('Admin', 'DoAddPart');?>" method="post" enctype="multipart/form-data">
	<table cellpadding="0" cellspacing="0" width="100%">
		<tr>
			<th width="85px">名称</th>
			<td>
				<input type="text" name="name" id="name" style="height:20px;" />
				<font color="red"><b>*</b></font>
			</td>
		</tr>
	<!--
		<tr>
			<th width="85px">车型</th>
			<td>
				<select name="type" id="type">
					<option value="0">请选择</option>
					<option value="1"  >i-robot-la</option>
					<option value="2"  >i-robot-sc</option>
					<option value="3"  >i-robot-bo</option>
					<option value="4"  >t-robot-w</option>
					<option value="5"  >t-robot-s</option>
				</select>
			</td>
		</tr>
	-->
		<tr>
			<th width="85px">价格</th>
			<td>
				￥<input type="text" name="price" id="price" style="height:20px;" />
				<font color="red"><b>*</b></font>
			</td>
		</tr>
		<tr>
			<th width="85px">小图</th>
			<td>
				<input type="file" name="thumbnail" id="thumbnail" style="height:20px;" />
				<font color="red"><b>*(45px x 45px)</b></font>
			</td>
		</tr>
		<tr>
			<th width="85px">大图</th>
			<td>
				<input type="file" name="img" id="img" style="height:20px;" />
				<font color="red"><b>*(300px x 200px)</b></font>
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