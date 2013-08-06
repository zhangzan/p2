<script type="text/javascript" language="javascript">
$(document).ready(function(){
	
});
</script>

<div id="colTwo">
<div class="bg2">
	<div class="title">上传文件</div>
	<form action="<?php echo $this->url('Admin', 'DoUploadFile', array('up_type'=>1));?>" method="post" enctype="multipart/form-data">
	<table cellpadding="0" cellspacing="0" width="100%">
		<tr>
			<th width="85px">文件</th>
			<td>
				<input type="file" name="file" id="file" style="height:20px;" />
				<font color="red"><b>*</b></font>
			</td>
		</tr>
		<tr>
			<th width="85px">标题</th>
			<td>
				<input type="text" name="title" style="height:20px;" />
			</td>
		</tr>
		<tr>
			<th width="85px" style="vertical-align:top;">文件描述</th>
			<td>
				<textarea name="description" id="description" style="width:400px;height:50px;"></textarea>
			</td>
		</tr>
		<tr>
			<th width="85px">缩略图</th>
			<td>
				<input type="file" name="thumbnail" style="height:20px;" />
				<font color="red"><b>(大小:146px x 75px)( jpg/png/bmp )</b></font>
			</td>
		</tr>
		<tr>
			<th width="85px">允许下载级别</th>
			<td>
				<input type="checkbox" name="level[]" value="1" id="level_1" />一级经销商&nbsp;
				<input type="checkbox" name="level[]" value="2" id="level_2" />二级经销商&nbsp;
				<input type="checkbox" name="level[]" value="3" id="level_3" />三级经销商&nbsp;
				<input type="checkbox" name="level[]" value="4" id="level_4" />四级经销商&nbsp;
				<input type="checkbox" name="level[]" value="5" id="level_5" />五级经销商
			</td>
		</tr>
		<tr>
			<td colspan="2">
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<input id="btn_add_dealer" type="submit" value="提交" />
			</td>
		</tr>
	</table>
	</form>
</div>
</div>