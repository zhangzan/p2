<script type="text/javascript" language="javascript">
$(document).ready(function(){
	$("#btn_add").click(function(){
		var title = $.trim($("#title").val());
		var count = $.trim($("#count").val());
		var expire_time = $.trim($("#expire_time").val());
		var location = $.trim($("#location").val());
		var experience = $.trim($("#experience").val());
		var education = $.trim($("#education").val());
		var desc = $.trim($("#desc").val());
		var responsibility = $.trim($("#responsibility").val());
		var qualification = $.trim($("#qualification").val());

		if(title==""){
			alert("职位名 不能为空");
			$("#title").focus();
			return;
		}
		
		kajax("AjaxAdmin","AddJob",{title:title,
									count:count,
									expire_time:expire_time,
									location:location,
									experience:experience,
									education:education,
									desc:desc,
									responsibility:responsibility,
									qualification:qualification},function(obj){
								if(obj.code==1){
									alert("添加成功。");console.log(1);
									window.location.href="<?php echo $this->url("Admin","JobList");?>";
								}else{
									alert("添加失败。");
								}
		},this);
	});
});
</script>

<div id="colTwo">
<div class="bg2">
	<div class="title">新增职位</div>
	<table cellpadding="0" cellspacing="0" width="100%">
		<tr>
			<th width="70px">职位名</th>
			<td>
				<input type="text" name="title" id="title" value=""  style="height:20px;" size="30"/>
				<font color="red"><b>*</b></font>
			</td>
		</tr>
		<tr>
			<th width="70px">招聘人数</th>
			<td>
				<input type="text" name="count" id="count" value=""  style="height:20px;" size="30"/>
			</td>
		</tr>
		<tr>
			<th width="70px">截止日期</th>
			<td>
				<input type="text" name="expire_time" id="expire_time" onclick="WdatePicker();"  style="height:20px;" size="30"/>
			</td>
		</tr>
		<tr>
			<th width="70px">工作地点</th>
			<td>
				<input type="text" name="location" id="location" value=""  style="height:20px;" size="30"/>
			</td>
		</tr>
		<tr>
			<th width="70px">工作年限</th>
			<td>
				<input type="text" name="experience" id="experience" value=""  style="height:20px;" size="30"/>
			</td>
		</tr>
		<tr>
			<th width="70px">学历</th>
			<td>
				<input type="text" name="education" id="education" value=""  style="height:20px;" size="30"/>
			</td>
		</tr>
		<tr>
			<th width="70px" style="vertical-align:top;">岗位要求</th>
			<td>
				<textarea name="desc" id="desc" style="width:400px;height:80px;"></textarea>
			</td>
		</tr>
		<tr>
			<th width="70px" style="vertical-align:top;">岗位职责</th>
			<td>
				<textarea name="responsibility" id="responsibility" style="width:400px;height:80px;"></textarea>
			</td>
		</tr>
		<tr>
			<th width="70px" style="vertical-align:top;">任职资格</th>
			<td>
				<textarea name="qualification" id="qualification" style="width:400px;height:80px;"></textarea>
			</td>
		</tr>
		<tr>
			<td colspan="2">
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<button id="btn_add">提交</button>
			</td>
		</tr>
	</table>
	
</div>
</div>