<script type="text/javascript" language="javascript">
	function check_submit(){
		var obj_banner_1 = document.getElementById('banner_1');		/*big banner 1*/
		var obj_banner_2 = document.getElementById('banner_2');		/*big banner 2*/
		var obj_banner_3 = document.getElementById('banner_3');		/*big banner 3*/
		var obj_banner_4 = document.getElementById('banner_4');		/*big banner 4*/

		var obj_url_1 = document.getElementById('url_1');		/*链接地址1*/
		var obj_url_2 = document.getElementById('url_2');		/*链接地址2*/
		var obj_url_3 = document.getElementById('url_3');		/*链接地址3*/
		var obj_url_4 = document.getElementById('url_4');		/*链接地址4*/

		if(obj_url_1.value=="" || obj_url_2.value=="" || obj_url_3.value=="" || obj_url_4.value==""){
			alert("链接地址不能为空!!");
			return false;
		}

		/*1*/
		if(obj_banner_1.value!=""){
			var strtype = obj_banner_1.value.substring(obj_banner_1.value.length-3,obj_banner_1.value.length);
			strtype=strtype.toLowerCase();
			var strRegex = "(jpg|png|gif|peg)$"; //用于验证图片扩展名的正则表达式
			var re=new RegExp(strRegex);
			//判断图片格式是否正确
			if (!re.test(strtype.toLowerCase())){
				alert("只允许上传一下格式的图片：jpg、png、gif、jpeg");
				return false;
			}
		}

		/*2*/
		if(obj_banner_2.value!=""){
			var strtype = obj_banner_2.value.substring(obj_banner_2.value.length-3,obj_banner_2.value.length);
			strtype=strtype.toLowerCase();
			var strRegex = "(jpg|png|gif|peg)$"; //用于验证图片扩展名的正则表达式
			var re=new RegExp(strRegex);
			//判断图片格式是否正确
			if (!re.test(strtype.toLowerCase())){
				alert("只允许上传一下格式的图片：jpg、png、gif、jpeg");
				return false;
			}
		}

		/*3*/
		if(obj_banner_3.value!=""){
			var strtype = obj_banner_3.value.substring(obj_banner_3.value.length-3,obj_banner_3.value.length);
			strtype=strtype.toLowerCase();
			var strRegex = "(jpg|png|gif|peg)$"; //用于验证图片扩展名的正则表达式
			var re=new RegExp(strRegex);
			//判断图片格式是否正确
			if (!re.test(strtype.toLowerCase())){
				alert("只允许上传一下格式的图片：jpg、png、gif、jpeg");
				return false;
			}
		}

		/*4*/
		if(obj_banner_4.value!=""){
			var strtype = obj_banner_4.value.substring(obj_banner_4.value.length-3,obj_banner_4.value.length);
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
	<div class="title">
		首页大banner列表
	</div>

<form method="post" action="<?=$url?>" enctype="multipart/form-data">
	<table cellpadding="0" cellspacing="0" width="100%">
		<tr>
			<th width="45px">编号</th>
			<th width="130px">图片（缩略图）</th>
			<th width="120px">最后更新时间</th>
			<th width="	">操作</th>
		</tr>
		<?php
			foreach($bannerlist as $key=>$val){
				?>
				<tr>
					<td align='center'><?=$val['id']?></td>
					<td align='center' >
						<?php
							if(!empty($val['image_url'])){
								echo "<a href='../../".$val['image_url']."' title='点击查看大图' target='_blank'><img style='height:70px' src='../../".$val['image_url']."'></a>";
							}else{
								echo "无";
							}
							echo "<input type='hidden' name='y_image_url[]' value='".$val['image_url']."' >";
						?>
					</td>
					<td align='center'><?=$val['update_time']?></td>
					<td align='left'>
						链接地址：<input type="text" name="url[]" value="<?=$val['url']?>" id="url_<?=$key+1?>"/>&nbsp;&nbsp;&nbsp;<font color="red"><b>*</b></font><br/>
						上传图片：<input type="file" name="banner[]" id="banner_<?=$key+1?>" />&nbsp;&nbsp;
						(<font color="red">* 1000x487 ; 为空，则原图片保持不变</font>)
					</td>
				</tr>

		<?php	}

		?>
	</table>
	<button style="width:50px;height:24px;font-size:12px;display:block;margin-left:auto;margin-right:20px;">提 交</button>
</form>
</div>
</div>