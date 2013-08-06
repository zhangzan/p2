<script type="text/javascript" language="javascript">
	function checkSubmit(){
		var obj_title = document.getElementById('title');		/*标题*/
		var obj_type  = document.getElementById('type');		/*类别*/
		var obj_image = document.getElementById('image');		/*图片*/
		/*title是否为空*/
		if(obj_title.value==""){
			alert("文章标题不能为空!");
			return false;
		}
		/*请选择类别*/
		if(obj_type.value==0){
			alert("请选择类别!");
			return false;
		}
		/*检查图片的格式是否正确*/
		if(obj_image.value!=""){
			var strtype = obj_image.value.substring(obj_image.value.length-3,obj_image.value.length);
			strtype=strtype.toLowerCase();
			var strRegex = "(jpg|png|gif|peg)$"; //用于验证图片扩展名的正则表达式
			var re=new RegExp(strRegex);
			//判断图片格式是否正确
			if (!re.test(strtype.toLowerCase())){
				alert("只允许上传一下格式的图片：jpg、png、gif、jpeg");
				return false;
			}
		}

	}
</script>
<div id="colTwo">
<div class="bg2">
	<div class="title">新增新闻</div>
	<?php echo $url?>
	<form method="post" action="<?=$url?>" enctype="multipart/form-data">
	<table cellpadding="0" cellspacing="0" width="100%">
		<tr>
			<th width="70px">标题</th>
			<td>
				<input type="text" name="title" id="title" value="<?php if($act=="edit"){echo str_replace('"', '&#34;', str_replace("'", '&#39;', $news_arr['title']));}?>"  style="height:20px;" size="30"/>
				<font color="red"><b>*</b></font>
			</td>
		</tr>
		<tr>
			<th width="70px">类别</th>
			<td>
				<select name="type" id="type">
					<option value="0" >请选择</option>
					<?php foreach($newsClass as $key=>$val){	?>
								<option value="<?=$val['id']?>" <?php if($act=="edit" && $val['id']==$news_arr['type']){echo "selected='selected'";}?>><?=$val['name']?></option>
					<?php	}?>

				</select>
				<font color="red"><b>*</b></font>
			</td>
		</tr>
		<tr>
			<th width="70px">是否显示</th>
			<td>
				<input type="radio" name="status" value="1"  <?php if($act=="add"){echo 'checked="checked"';}elseif($act=='edit' && $news_arr['status']==1){echo 'checked="checked"';}?>/>显示&nbsp;&nbsp;
				<input type="radio" name="status" value="2" <?php if($act=='edit' && $news_arr['status']==2){echo "checked='checked'";}?> />不显示
				<font color="red"><b>*</b></font>
 			</td>
		</tr>
		<tr>
			<th width="70px">上传图片</th>
			<td>
				<input type="file" name="image" id="image" value=""  style="height:20px;" size="30"/>
				<?php if($act=="edit"){ ?>
					<input type="hidden" name="y_image" value="<?=$news_arr['img']?>" />					
				<?php } ?>
				(<font color="red"><b>*格式要求:jpg、gif、png、jpeg</b></font>)
				<?php if($act=="edit" && $news_arr['img']!=''){ ?>
						&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo "../../".$news_arr['img'];?>" target="_blank">查看图片</a>						
				<?php } ?>
			</td>
		</tr>
		<tr>
			<th width="70px"  valign="top">内容</th>
			<td>
	            <textarea id="content" name="content"  style="width:650px;height:300px;" ><?php if($act=="edit"){echo $news_arr['content'];}?></textarea>
			</td>
		</tr>
		<tr>
			<td colspan="2">
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<input type="submit" value="提交" name="submit"  onclick="return checkSubmit();"/>
				<?php if($act=="add"){?>
					<input type="reset" value="重置"  name="reset"/>
				<?php }else if($act=="edit"){?>
					<input type="button" value="返回" onclick="history.go(-1);"  name="reset"/>
				<?php }?>
				
				<?php if($act=='edit'){ ?>
				<input type="hidden" value="<?=$news_arr['id']?>" name="news_id" />
				<?php } ?>
				<input type="hidden" name="act" value="<?=$act?>">
			</td>
		</tr>
	</table>
	</form>
</div>
</div>