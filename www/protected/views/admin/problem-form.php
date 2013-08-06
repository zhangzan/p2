<script type="text/javascript">
	function checkSubmit(){
		var obj_content = document.getElementById("content1");

		if(obj_content.value==""){
			alert("回复内容不能为空");
			return false;
		}

	}

</script>
<div id="colTwo">
<div class="bg2">
	<div class="title"><?php if(empty($problem_info['answer'])){echo "回复";}else{echo "编辑";}?>客户问题</div>
	<form method="post" action="<?=$url?>" enctype="multipart/form-data">
	<table cellpadding="0" cellspacing="0" width="100%">
		<tr>
			<th width="70px">提问内容</th>
			<td>
				<input type="text" name="title" readonly="readonly" disabled="disabled"  value="<?=$problem_info['question']?>"  style="height:20px;" size="30"/>
				<font color="red"><b>*</b></font>
			</td>
		</tr>
		<tr>
			<th width="70px">是否显示</th>
			<td>
				<input type="radio" name="status" value="1"  <?php if(empty($problem_info['answer']) || $problem_info['status']==1){echo 'checked="checked"';}?>/>不显示&nbsp;&nbsp;
				<input type="radio" name="status" value="2" <?php if(!empty($problem_info['answer']) && $problem_info['status']==2){echo "checked='checked'";}?> />显示
				<font color="red"><b>*</b></font>
 			</td>
		</tr>
		<tr>
			<th width="70px"  valign="top">提问时间</th>
			<td>
				<input type="text" readonly="readonly" disabled="disabled"  value="<?=$problem_info['update_time']?>"  style="height:20px;" size="30"/>
			</td>
		</tr>
		<tr>
			<th width="70px"  valign="top">回复内容</th>
			<td>
	            <textarea id="content1"  name="content"><?php if(!empty($problem_info['answer'])){echo $problem_info['answer'];}?></textarea>
			</td>
		</tr>
		<tr>
			<td colspan="2">
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<input type="submit" value="<?php if(empty($problem_info['answer'])){echo "回复";}else{echo "更新";}?>" name="submit"  onclick="return checkSubmit();"/>
				<input type="reset" value="重置"  name="reset"/>
				<input type="button" value="返回" onclick="history.go(-1);"  name="reset"/>
				<input type="hidden" value="<?=$problem_info['id']?>" name="problem_id" />
			</td>
		</tr>
	</table>
	</form>
</div>
</div>