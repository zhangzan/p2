<script type="text/javascript" language="javascript">
function checkInput(){
	if($("#file").val()==""){
		alert("文件不能为空");
		return;
	}
	if($.trim($("#title").val())==""){
		alert("标题不能为空");
		return;
	}
	if($.trim($("#page").val())==""){
		alert("页面不能为空");
		return;
	}
	$("#form1").submit();
}
</script>

<div id="colTwo">
<div class="bg2">
	<div class="title">上传视频(仅插入数据)</div>
	<div>
        <a href="<?=$this->url('Admin','DvList')?>" style="font-size:15px;color:blue;">返回列表</a>&nbsp;&nbsp;
    </div>
	<form id="form1" name="form1" action="<?php echo $this->url('Admin', 'UploadDv', array('act'=>'add2'));?>" method="post" enctype="multipart/form-data">
	<table cellpadding="0" cellspacing="0" width="100%">
		<tr>
			<th width="85px">文件名</th>
			<td>
				<input type="text" name="file" id="file" style="height:20px;" />
				<font color="red"><b>* (.flv 结尾)</b></font>
			</td>
		</tr>
		<tr>
			<th width="85px">标题</th>
			<td>
				<input type="text" name="title" id="title" style="height:20px;" />
				<font color="red"><b>*</b></font>
			</td>
		</tr>
		<tr>
			<th width="85px">页面</th>
			<td>
				<input type="text" name="page" id="page" style="height:20px;" />
				<font color="red"><b>*(产品DV页面填productdv, 尖端科技填technology)</b></font>
			</td>
		</tr>
		<tr>
			<td colspan="2">
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<input id="btn_submit" type="button" value="提交" onclick="checkInput();" />
			</td>
		</tr>
	</table>
	</form>
</div>
</div>