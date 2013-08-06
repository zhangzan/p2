<script type="text/javascript" language="javascript">
var status=<?php echo $info['status'];?>;
$(document).ready(function(){
	$("#status").click(function(){
		if(status==1){
			status=2;
		}else{
			status=1;
		}
	});

	$("#btn_edit_info").click(function(){
		var name=$.trim($("#name").val());
		var main_info=$.trim($("#main_info").val());
		var title1=$.trim($("#title1").val());
		var info1=$.trim($("#info1").val());
		var title2=$.trim($("#title2").val());
		var info2=$.trim($("#info2").val());
		var title3=$.trim($("#title3").val());
		var info3=$.trim($("#info3").val());
		var title4=$.trim($("#title4").val());
		var info4=$.trim($("#info4").val());
		var title5=$.trim($("#title5").val());
		var info5=$.trim($("#info5").val());
		var title6=$.trim($("#title6").val());
		var info6=$.trim($("#info6").val());
		kajax("AjaxAdmin","EditProductInfo",{id:<?php echo $info['id'];?>,
							name:name,
							main_info:main_info,
							title1:title1,
							info1:info1,
							title2:title2,
							info2:info2,
							title3:title3,
							info3:info3,
							title4:title4,
							info4:info4,
							title5:title5,
							info5:info5,
							title6:title6,
							info6:info6,
							status:status
							},function(obj){
								if(obj.code==1){
									alert("修改成功。");
									location.href=get_url("Admin","ProductInfoList");
								}else if(obj.code==2){
									alert("未改动。");
									location.href=get_url("Admin","ProductInfoList");
								}else{
									alert("修改失败。");
								}
		},this);
	});
});
</script>

<div id="colTwo">
<div class="bg2">
	<div class="title">修改产品描述</div>
	
	<table cellpadding="0" cellspacing="0" width="100%">
		<tr>
			<th width="70px">标题</th>
			<td>
				<input type="text" name="name" id="name" value="<?php echo $info['name'];?>"  style="height:20px;" size="30"/>
				<font color="red"><b>*</b></font>
			</td>
		</tr>
		<tr>
			<th width="70px" style="vertical-align:top;">主要描述</th>
			<td>
				<textarea name="main_info" id="main_info" style="width:650px;height:80px;"><?php echo $info['main_info'];?></textarea>
				<font color="red"><b>*</b></font>
			</td>
		</tr>
		<tr>
			<th width="70px" style="vertical-align:top;">细节1标题</th>
			<td>
				<input name="title1" id="title1" value="<?php echo $info['title1'];?>" />
				<font color="red"><b>*</b></font>
			</td>
		</tr>
		<tr>
			<th width="70px" style="vertical-align:top;">细节1内容</th>
			<td>
				<textarea name="info1" id="info1"  style="width:650px;height:50px;"><?php echo $info['info1'];?></textarea>
				<font color="red"><b>*</b></font>
			</td>
		</tr>
		<tr>
			<th width="70px" style="vertical-align:top;">细节2标题</th>
			<td>
				<input name="title2" id="title2" value="<?php echo $info['title2'];?>" />
				<font color="red"><b>*</b></font>
			</td>
		</tr>
		<tr>
			<th width="70px" style="vertical-align:top;">细节2内容</th>
			<td>
				<textarea name="info2" id="info2"  style="width:650px;height:50px;"><?php echo $info['info2'];?></textarea>
				<font color="red"><b>*</b></font>
			</td>
		</tr>
		<tr>
			<th width="70px" style="vertical-align:top;">细节3标题</th>
			<td>
				<input name="title3" id="title3" value="<?php echo $info['title3'];?>" />
				<font color="red"><b>*</b></font>
			</td>
		</tr>
		<tr>
			<th width="70px" style="vertical-align:top;">细节3内容</th>
			<td>
				<textarea name="info3" id="info3"  style="width:650px;height:50px;"><?php echo $info['info3'];?></textarea>
				<font color="red"><b>*</b></font>
			</td>
		</tr>
		<tr>
			<th width="70px" style="vertical-align:top;">细节4标题</th>
			<td>
				<input name="title4" id="title4" value="<?php echo $info['title4'];?>" />
				<font color="red"><b>*</b></font>
			</td>
		</tr>
		<tr>
			<th width="70px" style="vertical-align:top;">细节4内容</th>
			<td>
				<textarea name="info4" id="info4"  style="width:650px;height:50px;"><?php echo $info['info4'];?></textarea>
				<font color="red"><b>*</b></font>
			</td>
		</tr>
		<tr>
			<th width="70px" style="vertical-align:top;">细节5标题</th>
			<td>
				<input name="title5" id="title5" value="<?php echo $info['title5'];?>" />
				<font color="red"><b>*</b></font>
			</td>
		</tr>
		<tr>
			<th width="70px" style="vertical-align:top;">细节5内容</th>
			<td>
				<textarea name="info5" id="info5"  style="width:650px;height:50px;"><?php echo $info['info5'];?></textarea>
				<font color="red"><b>*</b></font>
			</td>
		</tr>
		<tr>
			<th width="70px" style="vertical-align:top;">细节6标题</th>
			<td>
				<input name="title6" id="title6" value="<?php echo $info['title6'];?>" />
				<font color="red"><b>*</b></font>
			</td>
		</tr>
		<tr>
			<th width="70px" style="vertical-align:top;">细节6内容</th>
			<td>
				<textarea name="info6" id="info6"  style="width:650px;height:50px;"><?php echo $info['info6'];?></textarea>
				<font color="red"><b>*</b></font>
			</td>
		</tr>
		<tr>
			<th width="70px" style="vertical-align:top;">不使用以上文字替换</th>
			<td>
				<input type="checkbox" id="status" name="status" <?php echo $info['status']==1?'checked="checked"':'' ?> />
			</td>
		</tr>
		<tr>
			<td colspan="2">
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<button id="btn_edit_info">提交</button>
			</td>
		</tr>
	</table>
	
</div>
</div>