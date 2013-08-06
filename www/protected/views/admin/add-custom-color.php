<script type="text/javascript" language="javascript">
$(document).ready(function(){
	
});
</script>

<div id="colTwo">
<div class="bg2">
	<div class="title"></div>
	<form action="<?php echo $this->url('Admin', 'DoUploadCustomColor');?>" method="post" enctype="multipart/form-data">
	<table cellpadding="0" cellspacing="0" width="100%">
		<tr>
			<th width="85px">颜色</th>
			<td>
				<select name="color_id" id="color_id">
					<?php foreach($color_list as $row){ ?>
					<option value="<?=$row['id']?>" <?php if($custom_color&&$custom_color['color_id']==$row['id']){echo 'selected="selected"';} ?>><?=$row['color']?></option>
					<?php } ?>
				</select>
				<font color="red"><b>*</b></font>
			</td>
		</tr>
		<tr>
			<th width="85px">产品</th>
			<td>
				<select name="car_id" id="car_id">
					<option value="1"  <?php if($custom_color&&$custom_color['car_id']==1){echo 'selected="selected"';} ?> >i-robot-la</option>
					<option value="2"  <?php if($custom_color&&$custom_color['car_id']==2){echo 'selected="selected"';} ?> >i-robot-sc</option>
					<option value="3"  <?php if($custom_color&&$custom_color['car_id']==3){echo 'selected="selected"';} ?> >i-robot-bo</option>
					<option value="4"  <?php if($custom_color&&$custom_color['car_id']==4){echo 'selected="selected"';} ?> >t-robot-w</option>
					<option value="5"  <?php if($custom_color&&$custom_color['car_id']==5){echo 'selected="selected"';} ?> >t-robot-s</option>
				</select>
				<font color="red"><b>*</b></font>
			</td>
		</tr>
		<tr>
			<th width="85px">图</th>
			<td>
				<input type="file" name="file" id="file" style="height:20px;" />
				<font color="red"><b>*(格式: .png)</b></font>
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