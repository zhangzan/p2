<script type="text/javascript" language="javascript">
	function checkIsNull(){
		var obj_name = document.getElementById("name");
		var obj_url = document.getElementById("url");
		var obj_image_url = document.getElementById("image_url");
		if(obj_name.value==""){
			alert("banner名不能为空!");
			return false;
		}

		if(obj_url.value==""){
			alert("链接地址名不能为空!");
			return false;
		}

	<?php if($act=="add"){
	?>
		if(obj_image_url.value==""){
			alert("图片不能为空不能为空!");
			return false;
		}else{
			var strtype = obj_image_url.value.substring(obj_image_url.value.length-3,obj_image_url.value.length);
			strtype=strtype.toLowerCase();
			var strRegex = "(jpg|png|gif|peg)$"; //用于验证图片扩展名的正则表达式
			var re=new RegExp(strRegex);
			//判断图片格式是否正确
			if (!re.test(strtype.toLowerCase())){
				alert("只允许上传一下格式的图片：jpg、png、gif、jpeg");
				return false;
			}
		}
	<?php } ?>

	}


</script>

<div id="colTwo">
<div class="bg2">
	<div class="title">
		<?php if($act=="add"){echo "新增";}elseif($act=='edit'){echo "编辑";}?>首页滚动图片
	</div>

<form action="<?=$url?>" method="post" enctype="multipart/form-data">
	<table cellpadding="0" cellspacing="0" width="420px">
		<tr>
			<th width="70px">banner名称</th>
			<td><input type="text" name="name" id="name" value="<?php if($act=="edit"){echo $bannerinfo['name'];}?>" size="30" style="height:17px;"/>&nbsp;&nbsp;&nbsp;<font color="red"><b>*</b></font></td>
		</tr>
		<tr>
			<th width="70px">链接地址</th>
			<td><input type="text" name="url" id="url" value="<?php if($act=="edit"){echo $bannerinfo['url'];}?>" size="30" style="height:17px;"/>&nbsp;&nbsp;&nbsp;<font color="red"><b>*</b></font></td>
		</tr>
		<tr>
			<th width="70px" valign="top">图片</th>
			<td>
				<input type="file" name="image_url" id="image_url" size="30" />&nbsp;&nbsp;&nbsp;
				<font color="red"><b>*</b></font>
				<?php
					if($act=="edit"){
						echo "<input type='hidden' name='y_image_url' id='y_image_url' value='".$bannerinfo['image_url']."'>";
						echo "<br/>原图片(<font color='red'>*不上传新图片的话，则原图片保持不变</font>)<br/>"."<img src='../../".$bannerinfo['image_url']."'>";
					}
				?>
			</td>
		</tr>

		<tr>
			<td colspan="2">
				&nbsp;&nbsp;&nbsp;&nbsp;

				<input type="submit" value="<?php if($act=="add"){echo "增加";}elseif($act=="edit"){echo "更新";}?>" onclick="return checkIsNull();"/>
				<input type="button" value="返回" onclick="history.go(-1);" />
				<?php if($act=="edit"){
					echo "<input type='hidden' name='bannerid' id='bannerid' value='".$bannerinfo['id']."'";
				}?>
			</td>
		</tr>
	</table>

</form>
</div>
</div>