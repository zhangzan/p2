<script type="text/javascript" language="javascript">
$(document).ready(function(){
	
});
</script>

<div id="colTwo">
<div class="bg2">
	<div class="title">修改</div>
	<form action="<?php echo $this->url('Admin', 'DoEditProductApply');?>" method="post" enctype="multipart/form-data">
	<table cellpadding="0" cellspacing="0" width="100%">
		<tr>
			<th width="85px">类别</th>
			<?php $robot_map = array(1=>'i-robot-la',2=>'i-robot-sc',3=>'i-robot-bo',4=>'t-robot-o',5=>'t-robot-w',6=>'t-robot-s'); ?>
			<td>
				<input name="type" type="hidden" value="<?php echo $apply['type'];?>" /><?php echo $robot_map[$apply['type']]; ?>
			</td>
		</tr>
		<tr>
			<th width="85px" style="vertical-align:top;">文件</th>
			<td>
				<?php if($apply['img']){echo "<img width=100 src='".$this->url($apply['img'])."'>";}?>
				<input type="file" name="file" id="file" style="height:20px;" />
				<font color="red"><b></b></font>
			</td>
		</tr>
		<tr>
			<th width="85px">标题</th>
			<td>
				<input type="text" name="title" id="title" value="<?php echo str_replace('"', '&#34;', str_replace("'", '&#39;', $apply['title']));?>" style="height:20px;width:300px;" />
				<font color="red"><b>*</b></font>
			</td>
		</tr>
		<tr>
			<th width="85px" style="vertical-align:top;">描述</th>
			<td>
				<textarea name="text" id="text" style="height:400px;width:600px;"><?php echo $apply['text'];?></textarea>
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