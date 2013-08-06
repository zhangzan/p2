<script type="text/javascript" language="javascript">
$(document).ready(function(){
	$("#btn_submit").click(function(){
		if ($("#file").val()=="") {
			return;
		}
		$("#form1").submit();
	});
});
</script>

<div id="colTwo">
<div class="bg2">
	<div class="title">上传图片</div>
	<div><a href="<?=$this->url('Admin','ProductPicList')?>" style="font-size:15px;color:blue;">返回</a></div>
	<form id="form1" action="<?php echo $this->url('Admin', 'DoUploadProductPic');?>" method="post" enctype="multipart/form-data">
	<table cellpadding="0" cellspacing="0" width="100%">
		<input type="hidden" name="type" value="<?php echo $pic['type'];?>">
		<input type="hidden" name="pos" value="<?php echo $pic['pos'];?>">
		<tr>
			<th width="85px">产品</th>
			<td>
				<?php $robot_map = array(1=>'i-robot-la',2=>'i-robot-sc',3=>'i-robot-bo',4=>'t-robot-o',5=>'t-robot-w',6=>'t-robot-s'); ?>
				<?php echo $robot_map[$pic['type']];?>
			</td>
		</tr>
		<tr>
			<th width="85px">位置</th>
			<td><?php echo $pic['pos'];?></td>
		</tr>
		<tr>
			<th width="85px">图片</th>
			<td>
				<input type="file" name="file" id="file" style="height:20px;" />
				<font color="red"><b>* (635px x 366px)</b></font>
			</td>
		</tr>
		<tr>
			<th width="85px">预览</th>
			<td>
				<img src="<?php echo $this->url($pic['filename']);?>" width=200 />
			</td>
		</tr>
		<tr>
			<td colspan="2">
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<input id="btn_submit" type="button" value="提交" />
			</td>
		</tr>
	</table>
	</form>
</div>
</div>